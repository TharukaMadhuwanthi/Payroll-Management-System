<?php

namespace App\Models;

use CodeIgniter\Model;

class DesignationModel extends Model
{
    protected $table="designation";
    protected $primaryKey="DesId";
    protected $allowedFields=['DesId','DesName'];
}

