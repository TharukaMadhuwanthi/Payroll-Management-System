<?php

namespace App\Models;

use CodeIgniter\Model;

class WorkPlaceModel extends Model
{
    protected $table="work_place";
    protected $primaryKey="PlaceId";
    protected $allowedFields=['PlaceId','Place'];
    
        public function getEmployeeCount($PlaceId=null) {
            $where=null;
            if (!empty($PlaceId)){
                $where=" WHERE w.PlaceId ='$PlaceId' ";
            }
        $query = $this->query("
SELECT w.PlaceId, w.Place, COUNT(e.EmployeeCode) AS 'Num_employee' FROM `work_place`w LEFT JOIN employee e ON e.WorkPlace=w.PlaceId $where GROUP BY w.PlaceId ");
        $result = $query->getResultArray();
        return $result;
    }
}

