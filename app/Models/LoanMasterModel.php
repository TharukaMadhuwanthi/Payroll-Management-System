<?php

namespace App\Models;

use CodeIgniter\Model;

class LoanMasterModel extends Model
{
    protected $table="loan_master";
    protected $primaryKey="Id";
    protected $allowedFields=['LoanRequestId','RYear','RMonth','RDate','EmployeeCode','LoanType','Capital','MonthlyInstallment','MonthlyInterest','TotalInterest','MonthlyDeduction','RecoverAmount'];
    
       

 public function getMasterDetails() {
               $query = $this->query("
INSERT INTO `loan_master`(`LoanRequestId`, `RYear`, `RMonth`, `RDate`, `EmployeeCode`, `LoanType`, `Capital`, `Reason`, `Guarantor1`, `Guarantor2`, `MonthlyInstallment`, `RecoverAmount`) VALUES (l.*, e.*, g1.FirstName as g1FirstName, g1.LastName as g1LastName, g2.FirstName as g2FirstName, g2.LastName as g2LastName, i.*,l.id as requestid, l.Status as rStatus FROM `loan_master` l LEFT JOIN employee e ON l.Employee=e.EmployeeCode LEFT JOIN employee g1 ON g1.EmployeeCode=l.Guarantor1 LEFT JOIN employee g2 ON g2.EmployeeCode=l.Guarantor2 LEFT JOIN item i ON l.LoanType=i.ItemCode ;");
        $result = $query->getResultArray();
        return $result;
    }
   public function getLoanDetails($EmployeeCode) {
               $query = $this->query("
                   SELECT * FROM `loan_master` l INNER JOIN employee e ON e.EmployeeCode=l.EmployeeCode WHERE l.EmployeeCode='$EmployeeCode' ");

        $result = $query->getResultArray();
        return $result;
    }
   
       public function getGrantLoanDetails() {
               $query = $this->query("
                   SELECT * FROM `loan_master` l INNER JOIN employee e ON e.EmployeeCode=l.EmployeeCode INNER JOIN item i ON i.ItemCode=l.LoanType ");

        $result = $query->getResultArray();
        return $result;
    
}

       }