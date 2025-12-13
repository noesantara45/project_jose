<?php
namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
protected $table = 'orders';
protected $primaryKey = 'id';
protected $allowedFields = [
'user_id', 'invoice_number', 'total_price', 'payment_status',
'order_status', 'snap_token', 'recipient_name', 'recipient_phone',
'shipping_address', 'courier', 'tracking_number'
];
protected $useTimestamps = true;
protected $createdField = 'created_at';
protected $updatedField = 'updated_at';
}