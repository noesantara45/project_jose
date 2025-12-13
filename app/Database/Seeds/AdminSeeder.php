<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run()
    {
        // Data admin default
        $data = [
            [
                'username' => 'admin',
                'password_hash' => password_hash('admin123', PASSWORD_DEFAULT),
                'name' => 'Super Admin',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'username' => 'manager',
                'password_hash' => password_hash('manager123', PASSWORD_DEFAULT),
                'name' => 'Manager Toko',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'username' => 'staff',
                'password_hash' => password_hash('staff123', PASSWORD_DEFAULT),
                'name' => 'Staff Admin',
                'created_at' => date('Y-m-d H:i:s'),
            ],
        ];

        // Insert data
        foreach ($data as $admin) {
            $this->db->table('admins')->insert($admin);
        }

        echo "Admin seeder berhasil dijalankan!\n";
        echo "Login credentials:\n";
        echo "1. Username: admin | Password: admin123\n";
        echo "2. Username: manager | Password: manager123\n";
        echo "3. Username: staff | Password: staff123\n";
    }
}