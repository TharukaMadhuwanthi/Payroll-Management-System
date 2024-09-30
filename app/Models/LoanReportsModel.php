<?php

namespace App\Models;

use CodeIgniter\Model;

class LoanReportsModel extends Model
{
    protected $table="loan_master";
    protected $primaryKey="id";
    protected $allowedFields=['ItemCode','Amount','MonthlyInterest','NumInstallments'];
    
       

 public function getMasterDetails() {
        $query = $this->query("
SELECT * FROM `loan_master` l LEFT JOIN item i ON l.ItemCode=i.ItemCode ");
        $result = $query->getResultArray();
        return $result;
    }
     public function getLoanMasterDetails() {
        $query = $this->query("
   SELECT * FROM `item`  WHERE ItemCode BETWEEN 250 AND 300");
    $result = $query->getResultArray();
        return $result;

    }
      public function getLoanProceedDetails() {
        $query = $this->query("
   SELECT Amount, MonthlyInterest, NumInstallments FROM loan_master");
    $result = $query->getResultArray();
    if($result->num_rows >0){
        while ($row = $result->fetch_assoc()){
            $value1=$row['Amount'];
            $value2=$row['Month1yInterestss'];
            
            $sum=$value1+$value2;
            
    }}
 else {
            echo "No result";
 }
    
        return $result;

    }
     }