<?php

namespace App\Models;

use CodeIgniter\Model;

class InstructionsModel extends Model {

    protected $table = "instructions";
    protected $primaryKey = "Id";
    protected $allowedFields = ['InstructionNo', 'Year', 'Month','Date', 'Instruction'];

   
}

