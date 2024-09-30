<?php

namespace App\Models;

use CodeIgniter\Model;

class OtModel extends Model {

    protected $table = "ot";
    protected $primaryKey = "Id";
    protected $allowedFields = ['Year', 'Month', 'Date', 'Employee', 'MonthOT', 'YearOT', 'Hours', 'Reason', 'Status'];

    public function getOtRequestbyRequestId($EmployeeCode = null, $requestid = null) {
        $query = $this->query("
SELECT o.*, e.*,o.id as Orequestid FROM `ot` o LEFT JOIN employee e ON o.Employee=e.EmployeeCode WHERE o.id='$requestid' AND o.Employee='$EmployeeCode'");
        $result = $query->getResultArray();
        return $result;
    }

    public function requestOT($EmployeeCode=null) {
          $where=null;
            if (!empty($EmployeeCode)){
                $where=" WHERE e.EmployeeCode ='$EmployeeCode' ";
            }
        $query = $this->query("
SELECT o.*, e.*,o.id as Orequestid, o.Status as OStatus FROM `ot` o LEFT JOIN employee e ON o.Employee=e.EmployeeCode $where");
        $result = $query->getResultArray();
        return $result;
    }
}
