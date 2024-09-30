<?php

namespace App\Models;

use CodeIgniter\Model;

class SubMonthendModel extends Model {

    protected $table = "sub_month_end";
    protected $primaryKey = "Id";
    protected $allowedFields = ['Year', 'Month', 'EmployeeCode', 'ItemCode', 'Amount'];

    public function processMonthend() {
        $month_process="sub_month_process";
        $month_end="sub_month_end";
        $query=$this->db->table($month_process)->get();
        if($query->getResult()){
            $data=$query->getResultArray();
            $this->db->table($month_end)->insertBatch($data);
        }
    }
}

