<?php

namespace App\Models;

use CodeIgniter\Model;

class CoinModel extends Model {

    protected $table = "coin_analysis";
    protected $primaryKey = "Id";
    protected $allowedFields = ['Id', 'Year', 'Month', 'EmployeeCode', 'NetSalary', 'Coin5000','Coin1000','Coin500','Coin100','Coin50','Coin20','Coin10','Coin5','Coin2','Coin1','CoinCent50','CoinCent25',];

}