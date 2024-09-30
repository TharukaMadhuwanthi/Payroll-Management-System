<?php

namespace App\Models;

use CodeIgniter\Model;

class SubstitutionModel extends Model {

    protected $table = "substitution";
    protected $primaryKey = "Id";
    protected $allowedFields = [ 'Year', 'Month', 'Date','Employee','SubstitutedEmployee','Availability'];

    public function getAttendance($EmployeeCode=null) {
         $where=null;
            if (!empty($EmployeeCode)){
                $where=" WHERE e.EmployeeCode ='$EmployeeCode' ";
            }
        $query = $this->query("
      
        SELECT s.*, e.*, b.FirstName as subFirstName, b.LastName as subLastName, s.Employee as Employee FROM `substitution` s LEFT JOIN employee e ON s.Employee=e.EmployeeCode LEFT JOIN employee b ON b.EmployeeCode=s.SubstitutedEmployee $where");

        $result = $query->getResultArray();
        return $result;
    }
}



