<?php

namespace App\Models;

use CodeIgniter\Model;

class AgentModel extends Model
{
    protected $table="agent";
    protected $primaryKey="Id";
    protected $allowedFields=['Agent','Email','TelNo','Address','AccountNo'];
    
    public function getAgentDetails($ItemCode=null) {
        $where=null;
            if (!empty($ItemCode)){
                $where=" WHERE i.ItemCode ='$ItemCode' ";
            }
        $query = $this->query("
SELECT * FROM `agent` a LEFT JOIN item i ON a.Agent=i.ItemCode $where GROUP BY i.ItemCode;");
        $result = $query->getResultArray();
        return $result;
    
  }
}