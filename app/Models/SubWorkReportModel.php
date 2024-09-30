<?php

namespace App\Models;

use CodeIgniter\Model;

class SubWorkReportModel extends Model
{
    protected $table="sub_work_report";
    protected $primaryKey="Id";
    protected $allowedFields=['Year','Month','SubstitutedEmployee','WorkDays'];


}