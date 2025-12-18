<?php

namespace App\Controllers\Landing;

use App\Controllers\BaseController;
use Midtrans\Config;
use Midtrans\Notification as MidtransNotification;

class Notification extends BaseController
{
    public function index()
    {
        // Set Konfigurasi
        Config::$serverKey = getenv('MIDTRANS_SERVER_KEY');
        Config::$isProduction = (getenv('MIDTRANS_IS_PRODUCTION') === 'true');
        Config::$isSanitized = true;
        Config::$is3ds = true;

        try {
            $notif = new MidtransNotification();

            $transaction = $notif->transaction_status;
            $type = $notif->payment_type;
            $orderId = $notif->order_id; // Ini adalah invoice_number (misal: INV/2025/...)
            $fraud = $notif->fraud_status;

            // Logika Status
            $paymentStatus = null;
            if ($transaction == 'capture') {
                if ($type == 'credit_card') {
                    if ($fraud == 'challenge') {
                        $paymentStatus = 'pending';
                    } else {
                        $paymentStatus = 'paid';
                    }
                }
            } else if ($transaction == 'settlement') {
                $paymentStatus = 'paid';
            } else if ($transaction == 'pending') {
                $paymentStatus = 'pending';
            } else if ($transaction == 'deny') {
                $paymentStatus = 'failed';
            } else if ($transaction == 'expire') {
                $paymentStatus = 'expired';
            } else if ($transaction == 'cancel') {
                $paymentStatus = 'cancelled';
            }

            // --- UPDATE DATABASE ---
            $db = \Config\Database::connect();
            
            // 1. Cari Order berdasarkan Invoice Number
            $order = $db->table('orders')->where('invoice_number', $orderId)->get()->getRow();

            if ($order) {
                // 2. Simpan Log Pembayaran ke tabel 'payments' (Tabel baru yang kita buat tadi)
                $dataPayment = [
                    'order_id'           => $order->id,
                    'payment_type'       => $type,
                    'transaction_id'     => $notif->transaction_id,
                    'transaction_time'   => $notif->transaction_time,
                    'transaction_status' => $transaction,
                    'va_number'          => $notif->va_numbers[0]->va_number ?? null, // Ambil VA jika ada
                    'bank'               => $notif->va_numbers[0]->bank ?? null,
                    'status_message'     => $notif->status_message ?? 'Status updated via webhook'
                ];
                $db->table('payments')->insert($dataPayment);

                // 3. Update Status Utama di tabel 'orders'
                // Kita hanya update jika statusnya 'paid' atau jika sebelumnya belum paid
                if ($paymentStatus && $order->payment_status != 'paid') {
                    $updateData = ['payment_status' => $paymentStatus];
                    
                    // Jika paid, ubah order_status jadi processing (siap dikemas)
                    if ($paymentStatus == 'paid') {
                        $updateData['order_status'] = 'processing';
                    } else if ($paymentStatus == 'expired' || $paymentStatus == 'cancelled') {
                        $updateData['order_status'] = 'cancelled';
                    }

                    $db->table('orders')->where('id', $order->id)->update($updateData);
                }
            }

            // Beri respon 200 OK ke Midtrans
            return $this->response->setStatusCode(200);

        } catch (\Exception $e) {
            // Log error jika perlu
            return $this->response->setStatusCode(500)->setBody($e->getMessage());
        }
    }
}