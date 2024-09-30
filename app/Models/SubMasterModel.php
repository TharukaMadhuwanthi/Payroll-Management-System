<?php

namespace App\Models;

use CodeIgniter\Model;

class SubMasterModel extends Model
{
    protected $table="sub_master";
    protected $primaryKey="Id";
    protected $allowedFields=['ItemCode','Amount'];
    
      public function getSubItem($ItemCode=null) {
                  $where=null;
            if (!empty($ItemCode)){
                $where=" WHERE i.ItemCode ='$ItemCode' ";
            }
        $query = $this->query("
SELECT * FROM `sub_master` s INNER JOIN item i ON s.ItemCode=i.ItemCode $where");
        $result = $query->getResultArray();
        return $result;
    }
}


