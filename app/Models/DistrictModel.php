<?php

namespace App\models;
use CodeIgniter\Model;
class DistrictModel extends Model
{
    protected $tabel="district1";
    protected $primaryKey="DistrictId";
    protected $allowedFields=['DistrictId','DistrictName'];
}

