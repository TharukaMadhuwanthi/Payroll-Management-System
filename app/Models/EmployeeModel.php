<?php

namespace App\Models;

use CodeIgniter\Model;

class EmployeeModel extends Model {

    protected $table = "employee";
    protected $primaryKey = "Id";
    protected $allowedFields = ['EmployeeCode', 'Title', 'FirstName', 'LastName', 'DOB', 'NIC', 'Type', 'AppointmentDate', 'Designation', 'WorkPlace', 'Email', 'TelNo', 'Address','BankCode','BranchCode', 'AccountNo', 'Status'];

     public function getEmployeeDetails($EmployeeCode=null) {
          $where=null;
            if (!empty($EmployeeCode)){
                $where=" WHERE e.EmployeeCode ='$EmployeeCode' ";
            }
        $query = $this->query("
SELECT * FROM `employee` e LEFT JOIN designation d ON e.Designation=d.DesId LEFT JOIN work_place w ON e.WorkPlace=w.PlaceId $where GROUP BY e.EmployeeCode ;");
        $result = $query->getResultArray();
        return $result;
    }
    
    public function getEmployee($EmployeeCode) {
        $query = $this->query("
SELECT e.*, d.*, w.* FROM `employee` e INNER JOIN designation d ON e.Designation=d.DesId INNER JOIN work_place w ON w.PlaceId=e.WorkPlace WHERE e.EmployeeCode='$EmployeeCode' ");
        $result = $query->getResultArray();
        return $result;
    }
    
     public function getProfile($emp) {
        $query = $this->query("
SELECT * FROM `employee` e INNER JOIN user_account a ON e.EmployeeCode=a.Name WHERE e.EmployeeCode='$emp' ");
        $result = $query->getResultArray();
        return $result;
    }
    
 public function updateEmployeeDetails() {
               $query = $this->query("
                   SELECT * FROM `employee` e INNER JOIN work_place w ON e.WorkPlace=w.PlaceId INNER JOIN designation d ON d.DesId=e.Designation ");

        $result = $query->getResultArray();
        return $result;
    
}

public function getUpdateEmployeeDetails($EmployeeCode=null) {
$query = $this->query("
 SELECT * FROM `employee` e INNER JOIN work_place w ON e.WorkPlace=w.PlaceId INNER JOIN designation d ON d.DesId=e.Designation  WHERE  e.EmployeeCode='$EmployeeCode'");
    $result = $query->getResultArray();
        return $result;

    }
    
}
