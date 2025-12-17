<?php
namespace App\Models;

use CodeIgniter\Model;

class CartModel extends Model
{
    protected $table = 'carts';
    protected $primaryKey = 'id';
    
    // PERBAIKAN DISINI: Menambahkan selected_color dan selected_size
    protected $allowedFields = ['user_id', 'product_id', 'qty', 'selected_color', 'selected_size'];
    
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = '';
}