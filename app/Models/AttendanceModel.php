<?php

namespace App\Models;

use CodeIgniter\Model;

class AttendanceModel extends Model {

    protected $table = "attend";
    protected $primaryKey = "Id";
    protected $allowedFields = ['EmployeeCode','Year','Month', 'WorkedDays'];

    public function getAttendance() {
        $query = $this->query("
SELECT * FROM `attendance` a LEFT JOIN employee e ON a.EmployeeCode=e.Id ");
        $result = $query->getResultArray();
        return $result;
    }
}

