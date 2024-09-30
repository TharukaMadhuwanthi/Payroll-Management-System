<?php

namespace App\Models;

use CodeIgniter\Model;

class CommonEntriesModel extends Model {

    protected $table = "common_entries";
    protected $primaryKey = "Id";
    protected $allowedFields = ['Year', 'Month','EmployeeCode', 'ItemCode','Amount'];

   
}
