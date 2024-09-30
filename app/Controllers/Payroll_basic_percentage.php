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
use App\Models\AttendanceModel;

class Payroll extends BaseController {

    public function month() {
        helper('form');

        $user_type = str_replace(' ', '', strtolower(session()->get('UserType')));

        echo view('sys/header');
        echo view('sys/menu_' . $user_type);
        echo view('sys/payroll/month');
        echo view('sys/footer');
    }

    //start month process
    public function month_process() {


        $employee = new EmployeeModel();
        $emp = $employee->where(['Status' => 'Active', 'Type' => 'Permanent'])->findAll();
        //echo $employee->getLastQuery();
        $master = new MasterDetailsModel();
        $monthly = new MonthlyDetailsModel();
        $loan = new LoanMasterModel();
        $process = new MonthProcessModel();
        $process->truncate();
        $month = new MonthendModel();
        $month->emptyMonthProcess();
        $att = new AttendanceModel();

        foreach ($emp as $key => $result) {
            //calculate basic salary & w&op


            $basic = $master->where(['EmployeeCode' => $result['EmployeeCode'], 'ItemCode' => '100'])->first();

            if ($basic !== null) {

                $no_of_days = $att->where(['EmployeeCode' => $result['EmployeeCode'], 'Year' => $this->request->getPost('Year'), 'Month' => $this->request->getPost('Month')])->first();
                if ($no_of_days !== null) {

                    if ($no_of_days['WorkedDays'] == '25') {
                        $basic_salary = $basic['Amount'];
                    } else {
                        $basic_salary = $basic['Amount'] / 25 * $no_of_days['WorkedDays'];
                    }

                    $process->save([
                        'Year' => $this->request->getPost('Year'),
                        'Month' => $this->request->getPost('Month'),
                        'EmployeeCode' => $result['EmployeeCode'],
                        'ItemCode' => $basic['ItemCode'],
                        'Amount' => $basic_salary]
                    );
                }
                $basic = $master->where(['EmployeeCode' => $result['EmployeeCode'], 'ItemCode' => '100'])->first();
                $salary_basic = $basic['Amount'];
                $process->save([
                    'Year' => $this->request->getPost('Year'),
                    'Month' => $this->request->getPost('Month'),
                    'EmployeeCode' => $result['EmployeeCode'],
                    'ItemCode' => '100',
                    'Amount' => $salary_basic
                ]);

                $wop = $basic['Amount'] * 0.08;
                $process->save([
                    'Year' => $this->request->getPost('Year'),
                    'Month' => $this->request->getPost('Month'),
                    'EmployeeCode' => $result['EmployeeCode'],
                    'ItemCode' => '242',
                    'Amount' => $wop
                ]);

                //calculate additions from master
                $additionm = $master->where(['EmployeeCode' => $result['EmployeeCode']])->where('ItemCode BETWEEN 101 AND 199')->findAll();

                // echo $loan->getLastQuery();
                if (isset($additionm)) {
                    foreach ($additionm as $key => $value) {

                        $process->save([
                            'Year' => $this->request->getPost('Year'),
                            'Month' => $this->request->getPost('Month'),
                            'EmployeeCode' => $result['EmployeeCode'],
                            'ItemCode' => $value['ItemCode'],
                            'Amount' => $value['Amount']]
                        );
                    }
                }

                //calculate additions from monthly data

                $additiono = $monthly->where(['EmployeeCode' => $result['EmployeeCode']])->where('ItemCode BETWEEN 101 AND 199')->findAll();

                // echo $loan->getLastQuery();
                if (isset($additiono)) {
                    foreach ($additiono as $key => $value) {

                        $process->save([
                            'Year' => $this->request->getPost('Year'),
                            'Month' => $this->request->getPost('Month'),
                            'EmployeeCode' => $result['EmployeeCode'],
                            'ItemCode' => $value['ItemCode'],
                            'Amount' => $value['Amount']]
                        );
                    }
                }

                //calculate deductions from master data
                $deductionm = $master->where(['EmployeeCode' => $result['EmployeeCode']])->where('ItemCode BETWEEN 201 AND 399')->findAll();

                // echo $loan->getLastQuery();
                if (isset($deductionm)) {
                    foreach ($deductionm as $key => $value) {

                        $process->save([
                            'Year' => $this->request->getPost('Year'),
                            'Month' => $this->request->getPost('Month'),
                            'EmployeeCode' => $result['EmployeeCode'],
                            'ItemCode' => $value['ItemCode'],
                            'Amount' => $value['Amount']]
                        );
                    }
                }

                //calculate deductions from monthly data
                $deductiono = $master->where(['EmployeeCode' => $result['EmployeeCode']])->where('ItemCode BETWEEN 201 AND 399')->findAll();

                // echo $loan->getLastQuery();
                if (isset($deductiono)) {
                    foreach ($deductiono as $key => $value) {

                        $process->save([
                            'Year' => $this->request->getPost('Year'),
                            'Month' => $this->request->getPost('Month'),
                            'EmployeeCode' => $result['EmployeeCode'],
                            'ItemCode' => $value['ItemCode'],
                            'Amount' => $value['Amount']]
                        );
                    }
                }

                //calculate loan data
                $loandata = $loan->where(['EmployeeCode' => $result['EmployeeCode'], 'RecoverAmount>' => '0'])->findAll();
                // echo $loan->getLastQuery();
                if (isset($loandata)) {
                    foreach ($loandata as $key => $value) {

                        $process->save([
                            'Year' => $this->request->getPost('Year'),
                            'Month' => $this->request->getPost('Month'),
                            'EmployeeCode' => $result['EmployeeCode'],
                            'ItemCode' => $value['LoanType'],
                            'Amount' => $value['MonthlyDeduction']]
                        );
                    }
                }
                //calculate grosspay
                $gross = new PayrollModel();
                $g = $gross->getGrossPay($result['EmployeeCode'], $this->request->getPost('Year'), $this->request->getPost('Month'));

                $process->save([
                    'Year' => $this->request->getPost('Year'),
                    'Month' => $this->request->getPost('Month'),
                    'EmployeeCode' => $result['EmployeeCode'],
                    'ItemCode' => '200',
                    'Amount' => $g[0]['Amount']
                ]);

                //calculate total deduction
                $deduct = new PayrollModel();
                $td = $deduct->getTotalDeduct($result['EmployeeCode'], $this->request->getPost('Year'), $this->request->getPost('Month'));

                $process->save([
                    'Year' => $this->request->getPost('Year'),
                    'Month' => $this->request->getPost('Month'),
                    'EmployeeCode' => $result['EmployeeCode'],
                    'ItemCode' => '400',
                    'Amount' => $td[0]['Amount']
                ]);

                //calculate netpay
                $net = ($g[0]['Amount']) - ($td[0]['Amount']);
                $process->save([
                    'Year' => $this->request->getPost('Year'),
                    'Month' => $this->request->getPost('Month'),
                    'EmployeeCode' => $result['EmployeeCode'],
                    'ItemCode' => '600',
                    'Amount' => $net
                ]);
            }
        }

        $summary = new MonthProcessModel();
        $data['list'] = $summary->getMonthSummary($this->request->getPost('Year'), $this->request->getPost('Month'));

        $user_type = str_replace(' ', '', strtolower(session()->get('UserType')));

        echo view('sys/header');
        echo view('sys/menu_' . $user_type);
        echo view('sys/payroll/month_summary', $data);
        echo view('sys/footer');
    }

    public function monthendview() {
        helper('form');
        $month_process = new MonthProcessModel();
        $data['list'] = $month_process->first();

        $user_type = str_replace(' ', '', strtolower(session()->get('UserType')));

        echo view('sys/header');
        echo view('sys/menu_' . $user_type);
        echo view('sys/payroll/monthendview', $data);
        echo view('sys/footer');
    }

    function month_end() {

        $monthend = new MonthendModel();
        $isavaliable = $monthend->where(['Year' => $this->request->getPost('Year'), 'Month' => $this->request->getPost('Month')])->findAll();
        $data['Year'] = $this->request->getPost('Year');
        $data['Month'] = $this->request->getPost('Month');
        //echo count($isavaliable);             
        if (count($isavaliable) <= 0) {
            //update loan details
            $monthly_loan = new PayrollModel();
            $loan_data = $monthly_loan->getMonthlyLoanDetails();

            foreach ($loan_data as $key => $value) {
                $loanmaster = new LoanMasterModel();

                $recover = $loanmaster->where(['EmployeeCode' => $value['EmployeeCode'], 'LoanType' => $value['ItemCode']])->first();

                $last_recover_amount = $recover['RecoverAmount'];

                $new_recover_amount = $last_recover_amount - $value['Amount'];
                $newdata = [
                    "RecoverAmount" => $new_recover_amount
                ];
                $loanmaster->where(['EmployeeCode' => $value['EmployeeCode'], 'LoanType' => $value['ItemCode'], 'RecoverAmount>=' => '0'])->set($newdata)->update();
            }
            $month = new MonthendModel();
            $data['list'] = $month->processMonthend();

            echo $month->getLastQuery();
            $user_type = str_replace(' ', '', strtolower(session()->get('UserType')));
            echo view('sys/header');
            echo view('sys/menu_' . $user_type);
            echo view('sys/payroll/month_end_summary', $data);
            echo view('sys/footer');
        } else {
            $user_type = str_replace(' ', '', strtolower(session()->get('UserType')));
            echo view('sys/header');
            echo view('sys/menu_' . $user_type);
            echo view('sys/payroll/month_end_exist', $data);
            echo view('sys/footer');
        }


        $trunctbl = new MonthProcessModel();
        $trunctbl->truncate();
        // Your existing code...



        /* helper('form');
          $loan = new LoanRequestModel();

          $data['list'] = $loan->getLoanRequest(); */

        /* echo view('sys/header');
          echo view('sys/menu');
          echo view('sys/payroll/view', $data);
          echo view('sys/footer'); */
    }

    function payslip() {
        helper('form');

        $employee = new EmployeeModel();
        $data['employee_list'] = $employee->findAll();
        if ($this->request->getMethod() == 'post') {
            $data['emp'] = $employee->getEmployee($this->request->getPost('EmployeeCode'));

            $b = new MonthendModel();
            $data['basic'] = $b->where(['EmployeeCode' => $this->request->getPost('EmployeeCode'), 'Year' => $this->request->getPost('Year'), 'Month' => $this->request->getPost('Month'), 'ItemCode' => '100'])->first();
//echo $b->getLastQuery();
            $add = new MonthendModel();
            $data['list'] = $add->ViewAdditions($this->request->getPost('EmployeeCode'), $this->request->getPost('Year'), $this->request->getPost('Month'));

            $deduct = new MonthendModel();
            $data['dlist'] = $deduct->ViewDeductions($this->request->getPost('EmployeeCode'), $this->request->getPost('Year'), $this->request->getPost('Month'));

            $g = new MonthendModel();
            $data['gross'] = $g->where(['EmployeeCode' => $this->request->getPost('EmployeeCode'), 'Year' => $this->request->getPost('Year'), 'Month' => $this->request->getPost('Month'), 'ItemCode' => '200'])->first();

            $td = new MonthendModel();
            $data['totaldeduct'] = $td->where(['EmployeeCode' => $this->request->getPost('EmployeeCode'), 'Year' => $this->request->getPost('Year'), 'Month' => $this->request->getPost('Month'), 'ItemCode' => '400'])->first();

            $n = new MonthendModel();
            $data['net'] = $n->where(['EmployeeCode' => $this->request->getPost('EmployeeCode'), 'Year' => $this->request->getPost('Year'), 'Month' => $this->request->getPost('Month'), 'ItemCode' => '600'])->first();

            $pay = new AttendanceModel();
            $data['real'] = $pay->getAttendance();
            
            $days = new AttendanceModel();
            $data['days'] = $days->where(['EmployeeCode' => $this->request->getPost('EmployeeCode'), 'Year' => $this->request->getPost('Year'), 'Month' => $this->request->getPost('Month')])->first();
        }


        $user_type = str_replace(' ', '', strtolower(session()->get('UserType')));

        echo view('Sys/header');
        echo view('Sys/menu_' . $user_type);
        echo view('sys/payroll/payslip', $data);
        echo view('sys/footer');
    }

    /*  function paysheet() {
      helper('form');
      $workplace = new WorkPlaceModel();

      $data['station_list'] = $workplace->viewWorkPlace();

      $employee = new EmployeeModel();
      $data['employee_list'] = $employee->findAll();

      $add = new PayrollModel();
      $data['list'] = $add->ViewPaySheet($this->request->getPost('EmployeeCode'), $this->request->getPost('Year'), $this->request->getPost('Month'));
     */

    function paysheet() {
        helper('form');
        $place = new WorkPlaceModel();
        $data['work_list'] = $place->findAll();

        if ($this->request->getMethod() == 'post') {
            $employeeModel = new EmployeeModel();
            $itemModel = new ItemModel();
            $monthProcessModel = new MonthendModel();
            $station =  new WorkPlaceModel();

            // Fetch all employees and items
            $employees = $employeeModel->where(['WorkPlace' => $this->request->getPost('Place')])->findAll();
            echo $employeeModel->getLastQuery();
            $items = $itemModel->findAll();

            $data['employees'] = $employees;
            $data['items'] = $items;


            // Get the amounts for each combination of employee and item
            foreach ($employees as $employee) {
                foreach ($items as $item) {
                    // Retrieve amounts for the current employee and item
                    $amount = $monthProcessModel
                            ->where('EmployeeCode', $employee['EmployeeCode'])
                            ->where('ItemCode', $item['ItemCode'])
                            ->where(['Year' => $this->request->getPost('Year')]) // Assuming 'Year' is a column name in your database
                            ->where(['Month' => $this->request->getPost('Month')])
                            // Assuming 'Month' is a column name in your database
                            ->findAll();
                    
                
                            

                    // Store the amounts in the data array
                    $data['Amount'][$employee['EmployeeCode']][$item['ItemCode']] = $amount;
                }
            }
        }


        // Load views
        $user_type = str_replace(' ', '', strtolower(session()->get('UserType')));
        echo view('sys/header');
        echo view('sys/menu_' . $user_type);
        echo view('sys/payroll/paysheet', $data);
        echo view('sys/footer');
    }

    public function coin_process() {
        helper('form');

        $user_type = str_replace(' ', '', strtolower(session()->get('UserType')));

        echo view('sys/header');
        echo view('sys/menu_' . $user_type);
        echo view('sys/payroll/coin_view');
        echo view('sys/footer');
    }

    function coin_count() {
        // Load the salary model
        $pay = new PayrollModel();

        // Fetch data from the salary table
        $employees = $pay->getCoinAnalysis();

        // Load the coin model
        $coinModel = new CoinModel();

        $coinModel->where(['Year' => $this->request->getPost('Year'), 'Month' => $this->request->getPost('Month')])->delete();
        // Iterate through employees and insert coin analysis into cointable
        foreach ($employees as $employee) {
            $data = [
                'Year' => $employee['Year'],
                'Month' => $employee['Month'],
                'EmployeeCode' => $employee['EmployeeCode'],
                'NetSalary' => $employee['NetSalary'],
                'Coin5000' => $employee['coins_5000'],
                'Coin1000' => $employee['coins_1000'],
                'Coin500' => $employee['coins_500'],
                'Coin100' => $employee['coins_100'],
                'Coin50' => $employee['coins_50'],
                'Coin20' => $employee['coins_20'],
                'Coin10' => $employee['coins_10'],
                'Coin5' => $employee['coins_5'],
                'Coin2' => $employee['coins_2'],
                'Coin1' => $employee['coins_1'],
                'CoinCent50' => $employee['coins_50'],
                'CoinCent25' => $employee['coins_25'],
            ];

            // Insert into cointable
            $coinModel->insert($data);
        }
        $employee = new EmployeeModel();
        $data['employee_list'] = $employee->findAll();

        $coin = new CoinModel();
        $data['list'] = $coin->findAll();

        $user_type = str_replace(' ', '', strtolower(session()->get('UserType')));

        echo view('sys/header');
        echo view('sys/menu_' . $user_type);
        echo view('sys/payroll/coin_view', $data);
        echo view('sys/footer');
    }

    function slip_file() {

        $employee = new EmployeeModel();
        $data['employee_list'] = $employee->findAll();

        $file = new MonthendModel();
        $data['list'] = $file->findAll();

        $bank = new PayrollModel();
        $data['list'] = $bank->getSlipFile();

        $user_type = str_replace(' ', '', strtolower(session()->get('UserType')));

        echo view('sys/header');
        echo view('sys/menu_' . $user_type);
        echo view('sys/payroll/slip_file', $data);
        echo view('sys/footer');
    }

    function coin_view_form() {

        $employee = new EmployeeModel();
        $data['employee_list'] = $employee->findAll();

        $file = new MonthendModel();
        $data['list'] = $file->findAll();

        $bank = new PayrollModel();
        $data['list'] = $bank->getSlipFile();

        $user_type = str_replace(' ', '', strtolower(session()->get('UserType')));

        echo view('sys/header');
        echo view('sys/menu_' . $user_type);
        echo view('sys/payroll/coin_view_form', $data);
        echo view('sys/footer');
    }

    function salary_analysis() {
        helper('form');
        // Assuming this code is within a controller method

        $add = new PayrollModel();
        $data['list'] = $add->ViewAdditionsSalary($this->request->getPost('Year'), $this->request->getPost('Month'));

        $ded = new PayrollModel();
        $data['listd'] = $ded->ViewDeductionSalary($this->request->getPost('Year'), $this->request->getPost('Month'));

        $n = new PayrollModel();
        $data['net'] = $n->getNetAmount($this->request->getPost('Year'), $this->request->getPost('Month'));

        $user_type = str_replace(' ', '', strtolower(session()->get('UserType')));

        echo view('Sys/header');
        echo view('Sys/menu_' . $user_type);
        echo view('sys/payroll/salary_analysis', $data);
        echo view('sys/footer');
    }
}
