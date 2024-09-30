<?php

namespace App\Models;

use CodeIgniter\Model;

class DsModel extends Model {

    protected $table = "dsdivision";
    protected $primaryKey = "Id";
    protected $allowedFields = ['Id', 'DistrictId', 'DsName'];
}

