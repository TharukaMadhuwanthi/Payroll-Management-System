<?php

namespace App\Controllers;

use App\Models\LoanMasterModel;
use App\Models\ItemModel;
use App\Models\LoanRequestModel;
use App\Models\PayrollModel;
use App\Models\EmployeeModel;
use App\Models\MasterDetailsModel;
use App\Models\MonthProcessModel;
use App\Models\MonthlyDetailsModel;
use App\Models\WorkPlaceModel;
use App\Models\MonthendModel;
use App\Models\CoinModel;
use App\Models\SubstitutionModel;
use App\Models\SubMonthProcessModel;
use App\Models\SubMasterModel;
use App\Models\SubMonthendModel;

class Subpayroll extends BaseController {

    public function sub_month() {
        helper('form');

        $user_type = str_replace(' ', '', strtolower(session()->get('UserType')));

        echo view('sys/header');
        echo view('sys/menu_' . $user_type);
        echo view('sys/subpayroll/sub_month');
        echo view('sys/footer');
    }

    public function test() {
        echo 'test';
    }

    public function month_process() {


        $employee = new EmployeeModel();
        $emp = $employee->where(['Status' => 'Active', 'Type' => 'Temporary'])->findAll();
        // echo $employee->getLastQuery();

        $sub = new SubstitutionModel();
        $master = new MasterDetailsModel();
        $monthly = new MonthlyDetailsModel();
        $loan = new LoanMasterModel();
        $submaster = new SubMasterModel();
        $master = $submaster->findAll();
        $process = new SubMonthProcessModel();
        $process->truncate();

        foreach ($emp as $key => $result) {
            foreach ($master as $key => $r2) {
                $work = new SubMonthProcessModel();
                $tmgr = $work->getWorkReport($result['EmployeeCode'], $this->request->getPost('Year'), $this->request->getPost('Month'));

                if ($r2['ItemCode'] == '106') {

                    $process->save([
                        'Year' => $this->request->getPost('Year'),
                        'Month' => $this->request->getPost('Month'),
                        'EmployeeCode' => $result['EmployeeCode'],
                        'Days' => $tmgr[0]['Days'],
                        'ItemCode' => '221',
                        'Rate' => $r2['Amount'],
                        'Amount' => $tmgr[0]['Days'] * $r2['Amount'] * 0.08]
                    );
                      $process->save([
                        'Year' => $this->request->getPost('Year'),
                        'Month' => $this->request->getPost('Month'),
                        'EmployeeCode' => $result['EmployeeCode'],
                        'Days' => $tmgr[0]['Days'],
                        'ItemCode' => '106',
                        'Rate' => $r2['Amount'],
                        'Amount' => $tmgr[0]['Days'] * $r2['Amount']]
                    );
                } else {
                    if($r2['ItemCode']!='221'){

                    $process->save([
                        'Year' => $this->request->getPost('Year'),
                        'Month' => $this->request->getPost('Month'),
                        'EmployeeCode' => $result['EmployeeCode'],
                        'Days' => $tmgr[0]['Days'],
                        'ItemCode' => $r2['ItemCode'],
                        'Rate' => $r2['Amount'],
                        'Amount' => $tmgr[0]['Days'] * $r2['Amount']]
                    );
                }
                }
            }
        }
        
        $user_type = str_replace(' ', '', strtolower(session()->get('UserType')));
        echo view('sys/header');
        echo view('sys/menu_' . $user_type);
        echo view('sys/subpayroll/sub_success');
        echo view('sys/footer');

        /*    function month_end() {
          helper('form');
          /* $month = new MonthendModel();
          $month->processMonthend(); */

        /*     echo view('sys/header');
          echo view('sys/menu');
          echo view('sys/subpayroll/sub_month_end');
          echo view('sys/footer');
          } */
    }

    public function monthendview() {
        helper('form');
        $month_process = new SubMonthProcessModel();
        $data['list'] = $month_process->first();

        $user_type = str_replace(' ', '', strtolower(session()->get('UserType')));

        echo view('sys/header');
        echo view('sys/menu_' . $user_type);
        echo view('sys/subpayroll/monthendview', $data);
        echo view('sys/footer');
    }

    function month_end() {


        $month = new SubMonthendModel();
        $data['list'] = $month->processMonthend();

        $user_type = str_replace(' ', '', strtolower(session()->get('UserType')));
        echo view('sys/header');
        echo view('sys/menu_' . $user_type);
        echo view('sys/payroll/sub_end_success', $data);
        echo view('sys/footer');
    }
}
