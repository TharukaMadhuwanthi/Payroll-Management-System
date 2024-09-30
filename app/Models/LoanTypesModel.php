<?php

namespace App\Models;

use CodeIgniter\Model;

class LoanTypesModel extends Model
{
    protected $table="loan_types";
    protected $primaryKey="id";
    protected $allowedFields=['ItemCode','Capital','MonthlyInterest','NumInstallments'];
    
       
 public function getLoanTypes($ItemCode=null) {
             $where=null;
            if (!empty($ItemCode)){
                $where=" WHERE l.ItemCode ='$ItemCode' ";
            }
        $query = $this->query("
SELECT * FROM `loan_types` l LEFT JOIN item i ON l.ItemCode=i.ItemCode $where GROUP BY l.ItemCode");
        $result = $query->getResultArray();
        return $result;
    }
    

     public function getLoanTypeDetails() {
        $query = $this->query("
   SELECT * FROM `item`  WHERE ItemCode BETWEEN 250 AND 300");
    $result = $query->getResultArray();
        return $result;

    }
    
     }