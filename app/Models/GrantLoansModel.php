<?php

namespace App\Models;

use CodeIgniter\Model;

class GrantLoansModel extends Model
{
    protected $table="loan_master";
    protected $primaryKey="Id";
    protected $allowedFields=['LoanRequestId','RYear','RMonth','RDate','EmployeeCode','LoanType','Capital','MonthlyInstallment','MonthlyInterest','TotalInterest','MonthlyDeduction','RecoverAmount'];
    
    
         public function getGrantLoanDetails($loanrequestid=null) {
$query = $this->query("
  SELECT t.*, l.*, e.*, g1.FirstName as g1FirstName, g1.LastName as g1LastName, g2.FirstName as g2FirstName, g2.LastName as g2LastName, i.*,l.id as requestid FROM `loan_request` l LEFT JOIN employee e ON l.Employee=e.EmployeeCode LEFT JOIN employee g1 ON g1.EmployeeCode=l.Guarantor1 LEFT JOIN employee g2 ON g2.EmployeeCode=l.Guarantor2 LEFT JOIN item i ON l.LoanType=i.ItemCode LEFT JOIN loan_types t ON t.ItemCode=l.LoanType WHERE l.Status='1' AND l.Id='$loanrequestid'");
    $result = $query->getResultArray();
        return $result;

    }
 
}



