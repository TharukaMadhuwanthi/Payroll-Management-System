<?php

namespace App\Models;

use CodeIgniter\Model;

class CustomerModel extends Model
{
    protected $table="customer";
    protected $primaryKey ="CustomerId";
    protected $allowedFields =['CustomerId','FirstName','LastName','Email','UserId'];
    
}
