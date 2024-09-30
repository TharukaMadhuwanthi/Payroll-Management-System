<?php

namespace App\Models;

use CodeIgniter\Model;

class PayrollModel extends Model {

    protected $table = "month_process";
    protected $primaryKey = "Id";
    protected $allowedFields = ['Id', 'Year', 'Month', 'EmployeeCode', 'ItemCode', 'Amount'];

    public function getGrossPay($EmployeeCode, $Year, $Month) {
        $query = $this->query("
SELECT EmployeeCode,SUM(Amount) AS Amount FROM `month_process` WHERE ItemCode<=199 AND EmployeeCode='$EmployeeCode' AND Year='$Year' AND Month='$Month' GROUP BY EmployeeCode");
        $result = $query->getResultArray();
        return $result;
    }

    public function getTotalDeduct($EmployeeCode, $Year, $Month) {
        $query = $this->query("
SELECT EmployeeCode,SUM(Amount) AS Amount FROM `month_process` WHERE ItemCode>=201 AND ItemCode<=399 AND EmployeeCode='$EmployeeCode' AND Year='$Year' AND Month='$Month' GROUP BY EmployeeCode");
        $result = $query->getResultArray();
        return $result;
    }

    /* public function getPaySlip($EmployeeCode, $Year, $Month) {
      $query = $this->query("
      SELECT EmployeeCode,ItemCode,Amount FROM `month_process` WHERE EmployeeCode='$EmployeeCode' AND Year='$Year' AND Month='$Month' GROUP BY ItemCode");
      $result = $query->getResultArray();
      return $result;
      } */

    public function getPaySlip($EmployeeCode, $Year, $Month) {
        $query = $this->query("
SELECT e.*,i.*,m.* FROM `month_process` m INNER JOIN employee e ON m.EmployeeCode=e.EmployeeCode WHERE m.EmployeeCode='$EmployeeCode' AND Year='$Year' AND Month='$Month' GROUP BY m.ItemCode");
        $result = $query->getResultArray();
        return $result;
    }

    public function ViewAdditions($EmployeeCode, $Year, $Month) {
        $query = $this->query("
SELECT m.*,i.* FROM `month_process` m INNER JOIN item i ON m.ItemCode=i.ItemCode WHERE m.ItemCode BETWEEN 101 AND 199 AND m.EmployeeCode='$EmployeeCode' AND Year='$Year' AND Month='$Month'");
        $result = $query->getResultArray();
        return $result;
    }

    public function ViewDeductions($EmployeeCode, $Year, $Month) {
        $query = $this->query("
SELECT m.*,i.* FROM `month_process` m INNER JOIN item i ON m.ItemCode=i.ItemCode WHERE m.ItemCode BETWEEN 201 AND 399 AND m.EmployeeCode='$EmployeeCode' AND Year='$Year' AND Month='$Month'");
        $result = $query->getResultArray();
        return $result;
    }

    public function fetchData() {
        // Assuming $db is your database connection
        $query = $this->query("
        SELECT EmployeeCode, Item, Amount FROM 'month_process'");
        $result = $query->getResultArray();

        return $result;
    }

    public function getMonthlyLoanDetails() {
        $query = $this->query("
SELECT * FROM `month_process`m WHERE m.ItemCode BETWEEN 250 AND 300");
        $result = $query->getResultArray();
        return $result;
    }

    public function getCoinAnalysis() {
        $query = $this->query("
SELECT
        EmployeeCode,Year,Month,
        Amount as NetSalary, 
     FLOOR(Amount / 5000) as coins_5000,
       FLOOR((Amount % 5000) / 1000) as coins_1000,
       FLOOR(((Amount % 5000) % 1000) / 500) as coins_500,
       FLOOR((((Amount % 5000) % 1000) % 500) / 100) as coins_100,
       FLOOR(((((Amount % 5000) % 1000) % 500) % 100) / 50) as coins_50,
       FLOOR((((((Amount % 5000) % 1000) % 500) % 100) % 50) / 20) as coins_20,
       FLOOR(((((((Amount % 5000) % 1000) % 500) % 100) % 50) % 20) / 10) as coins_10,
       FLOOR((((((((Amount % 5000) % 1000) % 500) % 100) % 50) % 20) % 10) / 5) as coins_5,
       FLOOR(((((((((Amount % 5000) % 1000) % 500) % 100) % 50) % 20) % 10) % 5) / 2) as coins_2,
        FLOOR((((((((((Amount % 5000) % 1000) % 500) % 100) % 50) % 20) % 10) % 5) % 2) / 1) as coins_1,
        FLOOR(((((((((((Amount % 5000) % 1000) % 500) % 100) % 50) % 20) % 10) % 5) % 2) % 1)/0.50) as coins_50,
        FLOOR((((((((((((Amount % 5000) % 1000) % 500) % 100) % 50) % 20) % 10) % 5) % 2) % 1)%0.50)/0.25) as coins_25
   
        FROM month_process WHERE ItemCode='600'");
        $result = $query->getResultArray();
        return $result;
    }
    
    public function getSlipFile() {
        $query = $this->query("
SELECT * FROM `month_end` m INNER JOIN employee e ON m.EmployeeCode=e.EmployeeCode WHERE m.ItemCode='600'");
        $result = $query->getResultArray();
        return $result;
    }
    public function ViewAdditionsSalary($Year, $Month) {
        $query = $this->query("
SELECT m.ItemCode,ItemName,Sum(Amount) AS 'Total'  FROM `month_end` m INNER JOIN item i ON m.ItemCode=i.ItemCode WHERE i.ItemType='Addition' AND m.Year='$Year' AND m.Month='$Month' GROUP BY m.ItemCode ");
        $result = $query->getResultArray();
        return $result;
    }    
       public function ViewDeductionSalary($Year, $Month) {
        $query = $this->query("
SELECT m.ItemCode,ItemName,Sum(Amount) AS 'Total'  FROM `month_end` m INNER JOIN item i ON m.ItemCode=i.ItemCode WHERE i.ItemType='Deduction' AND m.Year='$Year' AND m.Month='$Month' GROUP BY m.ItemCode ");
        $result = $query->getResultArray();
        return $result;
    } 
    public function getNetAmount($Year,$Month) {
        $query = $this->query("
    SELECT Year,Month,SUM(Amount) AS 'Total' FROM `month_end` WHERE ItemCode='600' AND Year='$Year' AND Month='$Month' GROUP BY ItemCode ORDER BY Year,Month DESC LIMIT 1 ;");
     $result = $query->getResultArray();
        return $result;
            }
    
}


