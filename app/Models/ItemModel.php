<?php

namespace App\Models;

use CodeIgniter\Model;

class ItemModel extends Model
{
    protected $table="item";
    protected $primaryKey="Id";
    protected $allowedFields=['ItemCode','ItemName','Description','Status','ItemType'];
}
