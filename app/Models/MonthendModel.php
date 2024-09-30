<?php

namespace App\Models;

use CodeIgniter\Model;

class MonthendModel extends Model {

    protected $table = "month_end";
    protected $primaryKey = "Id";
    protected $allowedFields = ['Year', 'Month', 'EmployeeCode', 'ItemCode', 'Amount'];

    public function processMonthend() {
        $month_process="month_process";
        $month_end="month_end";
        $query=$this->db->table($month_process)->get();
        if($query->getResult()){
            $data=$query->getResultArray();
            $this->db->table($month_end)->insertBatch($data);
        }
    }
    
    public function emptyMonthProcess() {
         $month_process="month_process";
        
         
         $sql = "DELETE FROM $month_process ";
         $this->db->query($sql);
         
        
    }
      public function getTotalAmount() {
        $query = $this->query("
    SELECT Year,Month,SUM(Amount) AS 'Total' FROM `month_end`  GROUP BY Year,Month ORDER BY Year,Month DESC LIMIT 2;");
     $result = $query->getResultArray();
        return $result;
            }
            
     
            public function getTotalAmountPrevious() {
        $query = $this->query("
    SELECT Year,Month,SUM(Amount) AS 'Total' FROM `monthly_details` wHERE Month=Month-1");
     $result = $query->getResultArray();
        return $result;
            }
            
               public function getBasicAmount() {
        $query = $this->query("
    SELECT Year,Month,SUM(Amount) AS 'Total' FROM `month_end` WHERE ItemCode='100' GROUP BY Year,Month ORDER BY Year,Month DESC LIMIT 1;");
     $result = $query->getResultArray();
        return $result;
            }
            
            
                  public function Analysis() {
        $query = $this->query("
    SELECT Year,Month FROM `month_end` GROUP BY Year,Month ORDER BY Year,Month DESC LIMIT 1;");
     $result = $query->getResultArray();
        return $result;
            }
                public function ViewAdditions($EmployeeCode, $Year, $Month) {
        $query = $this->query("
SELECT m.*,i.* FROM `month_end` m INNER JOIN item i ON m.ItemCode=i.ItemCode WHERE m.ItemCode BETWEEN 101 AND 199 AND m.EmployeeCode='$EmployeeCode' AND Year='$Year' AND Month='$Month'");
        $result = $query->getResultArray();
        return $result;
    }

    public function ViewDeductions($EmployeeCode, $Year, $Month) {
        $query = $this->query("
SELECT m.*,i.* FROM `month_end` m INNER JOIN item i ON m.ItemCode=i.ItemCode WHERE m.ItemCode BETWEEN 201 AND 399 AND m.EmployeeCode='$EmployeeCode' AND Year='$Year' AND Month='$Month'");
        $result = $query->getResultArray();
        return $result;
    }
}
