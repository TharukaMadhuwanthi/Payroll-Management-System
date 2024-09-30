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

class Payroll extends BaseController {

    public function month() {
        helper('form');

        $user_type = str_replace(' ', '', strtolower(session()->get('UserType')));

        echo view('sys/header');
        echo view('sys/menu_' . $user_type);
        echo view('sys/payroll/month');
        echo view('sys/footer');
    }

    public function month_process() {
        /*  echo $this->request->getPost('Year');
          echo $this->request->getPost('Month'); */

        $employee = new EmployeeModel();
        $emp = $employee->where(['Status' => 'Active', 'Type' => 'Permanent'])->findAll();
        echo $employee->getLastQuery();
        $master = new MasterDetailsModel();
        $monthly = new MonthlyDetailsModel();
        $loan = new LoanMasterModel();
        $process = new MonthProcessModel();
        //$process->truncate();
        $month = new MonthendModel();
        $month->emptyMonthProcess();

        foreach ($emp as $key => $result) {
            //calculate basic salary & w&op
            $basic = $master->where(['EmployeeCode' => $result['EmployeeCode'], 'ItemCode' => '100'])->first();
            /* echo $result['EmployeeCode'];
              echo $basic['Amount'];
              echo '</br>'; */
            if ($basic) {
                $process->save([
                    'Year' => $this->request->getPost('Year'),
                    'Month' => $this->request->getPost('Month'),
                    'EmployeeCode' => $result['EmployeeCode'],
                    'ItemCode' => $basic['ItemCode'],
                    'Amount' => $basic['Amount']]
                );

                $wop = $basic['Amount'] * 0.08;
                $process->save([
                    'Year' => $this->request->getPost('Year'),
                    'Month' => $this->request->getPost('Month'),
                    'EmployeeCode' => $result['EmployeeCode'],
                    'ItemCode' => '242',
                    'Amount' => $wop
                ]);
                /*  $col = $master->where(['EmployeeCode' => $result['EmployeeCode'], 'ItemCode' => '111'])->first();
                  $process->save([
                  'Year' => $this->request->getPost('Year'),
                  'Month' => $this->request->getPost('Month'),
                  'EmployeeCode' => $result['EmployeeCode'],
                  'ItemCode' => '111',
                  'Amount' => $col['Amount']
                  ]);

                  $saturday = $monthly->where(['EmployeeCode' => $result['EmployeeCode'], 'ItemCode' => '110'])->first();
                  if (isset($saturday['ItemCode'])) {
                  $process->save([
                  'Year' => $this->request->getPost('Year'),
                  'Month' => $this->request->getPost('Month'),
                  'EmployeeCode' => $result['EmployeeCode'],
                  'ItemCode' => $saturday['ItemCode'],
                  'Amount' => $saturday['Amount']]
                  );
                  }
                  $allow = $monthly->where(['EmployeeCode' => $result['EmployeeCode'], 'ItemCode' => '105'])->first();
                  if (isset($allow['ItemCode'])) {
                  $process->save([
                  'Year' => $this->request->getPost('Year'),
                  'Month' => $this->request->getPost('Month'),
                  'EmployeeCode' => $result['EmployeeCode'],
                  'ItemCode' => $allow['ItemCode'],
                  'Amount' => $allow['Amount']]
                  );
                  }
                  $fuel = $master->where(['EmployeeCode' => $result['EmployeeCode'], 'ItemCode' => '107'])->first();
                  if (isset($fuel['ItemCode'])) {
                  $process->save([
                  'Year' => $this->request->getPost('Year'),
                  'Month' => $this->request->getPost('Month'),
                  'EmployeeCode' => $result['EmployeeCode'],
                  'ItemCode' => $fuel['ItemCode'],
                  'Amount' => $fuel['Amount']]
                  );
                  }
                  $tele = $master->where(['EmployeeCode' => $result['EmployeeCode'], 'ItemCode' => '106'])->first();
                  if (isset($tele['ItemCode'])) {
                  $process->save([
                  'Year' => $this->request->getPost('Year'),
                  'Month' => $this->request->getPost('Month'),
                  'EmployeeCode' => $result['EmployeeCode'],
                  'ItemCode' => $tele['ItemCode'],
                  'Amount' => $tele['Amount']]
                  );
                  } */

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
                /* $lspecial = $loan->where(['EmployeeCode' => $result['EmployeeCode'], 'LoanType' => '296', 'RecoverAmount>' => '0'])->first();
                  //echo $loan->getLastQuery();
                  if (isset($lspecial['LoanType'])) {
                  $process->save([
                  'Year' => $this->request->getPost('Year'),
                  'Month' => $this->request->getPost('Month'),
                  'EmployeeCode' => $result['EmployeeCode'],
                  'ItemCode' => $lspecial['LoanType'],
                  'Amount' => $lspecial['MonthlyDeduction']]
                  );
                  }
                  $ldistress = $loan->where(['EmployeeCode' => $result['EmployeeCode'], 'LoanType' => '275', 'RecoverAmount>' => '0'])->first();
                  //echo $loan->getLastQuery();
                  if (isset($ldistress['LoanType'])) {
                  $process->save([
                  'Year' => $this->request->getPost('Year'),
                  'Month' => $this->request->getPost('Month'),
                  'EmployeeCode' => $result['EmployeeCode'],
                  'ItemCode' => $ldistress['LoanType'],
                  'Amount' => $ldistress['MonthlyDeduction']]
                  );
                  }
                  $lproperty = $loan->where(['EmployeeCode' => $result['EmployeeCode'], 'LoanType' => '292', 'RecoverAmount>' => '0'])->first();
                  //echo $loan->getLastQuery();
                  if (isset($lproperty['LoanType'])) {
                  $process->save([
                  'Year' => $this->request->getPost('Year'),
                  'Month' => $this->request->getPost('Month'),
                  'EmployeeCode' => $result['EmployeeCode'],
                  'ItemCode' => $lproperty['LoanType'],
                  'Amount' => $lproperty['MonthlyDeduction']]
                  );
                  } */

                /*  $tmgr = $monthly->where(['EmployeeCode' => $result['EmployeeCode'], 'ItemCode' => '106'])->first();
                  if (isset($tmgr['ItemCode'])) {
                  $process->save([
                  'Year' => $this->request->getPost('Year'),
                  'Month' => $this->request->getPost('Month'),
                  'EmployeeCode' => $result['EmployeeCode'],
                  'ItemCode' => $tmgr['ItemCode'],
                  'Amount' => $tmgr['Amount']]
                  );
                  }
                  $colt = $monthly->where(['EmployeeCode' => $result['EmployeeCode'], 'ItemCode' => '107'])->first();
                  if (isset($colt['ItemCode'])) {
                  $process->save([
                  'Year' => $this->request->getPost('Year'),
                  'Month' => $this->request->getPost('Month'),
                  'EmployeeCode' => $result['EmployeeCode'],
                  'ItemCode' => $colt['ItemCode'],
                  'Amount' => $colt['Amount']]
                  );
                  }
                  $upto = $master->where(['EmployeeCode' => $result['EmployeeCode'], 'ItemCode' => '207'])->first();
                  if (isset($upto['ItemCode'])) {
                  $process->save([
                  'Year' => $this->request->getPost('Year'),
                  'Month' => $this->request->getPost('Month'),
                  'EmployeeCode' => $result['EmployeeCode'],
                  'ItemCode' => $upto['ItemCode'],
                  'Amount' => $upto['Amount']]
                  );
                  }
                  $dialog = $monthly->where(['EmployeeCode' => $result['EmployeeCode'], 'ItemCode' => '219'])->first();
                  if (isset($dialog['ItemCode'])) {
                  $process->save([
                  'Year' => $this->request->getPost('Year'),
                  'Month' => $this->request->getPost('Month'),
                  'EmployeeCode' => $result['EmployeeCode'],
                  'ItemCode' => $dialog['ItemCode'],
                  'Amount' => $dialog['Amount']]
                  );
                  }
                  $tax = $master->where(['EmployeeCode' => $result['EmployeeCode'], 'ItemCode' => '208'])->first();
                  if (isset($tax['ItemCode'])) {
                  $process->save([
                  'Year' => $this->request->getPost('Year'),
                  'Month' => $this->request->getPost('Month'),
                  'EmployeeCode' => $result['EmployeeCode'],
                  'ItemCode' => $tax['ItemCode'],
                  'Amount' => $tax['Amount']]
                  );
                  }
                  $ot = $monthly->where(['EmployeeCode' => $result['EmployeeCode'], 'ItemCode' => '121'])->first();
                  if (isset($ot['ItemCode'])) {
                  $process->save([
                  'Year' => $this->request->getPost('Year'),
                  'Month' => $this->request->getPost('Month'),
                  'EmployeeCode' => $result['EmployeeCode'],
                  'ItemCode' => $ot['ItemCode'],
                  'Amount' => $ot['Amount']]
                  );
                  }
                  $language = $master->where(['EmployeeCode' => $result['EmployeeCode'], 'ItemCode' => '129'])->first();
                  if (isset($language['ItemCode'])) {
                  $process->save([
                  'Year' => $this->request->getPost('Year'),
                  'Month' => $this->request->getPost('Month'),
                  'EmployeeCode' => $result['EmployeeCode'],
                  'ItemCode' => $language['ItemCode'],
                  'Amount' => $language['Amount']]
                  );
                  }
                  $stamp = $master->where(['EmployeeCode' => $result['EmployeeCode'], 'ItemCode' => '248'])->first();
                  if (isset($stamp['ItemCode'])) {
                  $process->save([
                  'Year' => $this->request->getPost('Year'),
                  'Month' => $this->request->getPost('Month'),
                  'EmployeeCode' => $result['EmployeeCode'],
                  'ItemCode' => $stamp['ItemCode'],
                  'Amount' => $stamp['Amount']]
                  );
                  }
                  $agrahara = $master->where(['EmployeeCode' => $result['EmployeeCode'], 'ItemCode' => '218'])->first();
                  if (isset($agrahara['ItemCode'])) {
                  $process->save([
                  'Year' => $this->request->getPost('Year'),
                  'Month' => $this->request->getPost('Month'),
                  'EmployeeCode' => $result['EmployeeCode'],
                  'ItemCode' => $agrahara['temCode'],
                  'Amount' => $agrahara['Amount']]
                  );
                  }
                  $ptba = $master->where(['EmployeeCode' => $result['EmployeeCode'], 'ItemCode' => '215'])->first();
                  if (isset($ptba['ItemCode'])) {
                  $process->save([
                  'Year' => $this->request->getPost('Year'),
                  'Month' => $this->request->getPost('Month'),
                  'EmployeeCode' => $result['EmployeeCode'],
                  'ItemCode' => $ptba['temCode'],
                  'Amount' => $ptba['Amount']]
                  );
                  }
                  $psmpa = $master->where(['EmployeeCode' => $result['EmployeeCode'], 'ItemCode' => '211'])->first();
                  if (isset($psmpa['ItemCode'])) {
                  $process->save([
                  'Year' => $this->request->getPost('Year'),
                  'Month' => $this->request->getPost('Month'),
                  'EmployeeCode' => $result['EmployeeCode'],
                  'ItemCode' => $psmpa['temCode'],
                  'Amount' => $psmpa['Amount']]
                  );
                  }
                  $hnb = $master->where(['EmployeeCode' => $result['EmployeeCode'], 'ItemCode' => '214'])->first();
                  if (isset($hnb['ItemCode'])) {
                  $process->save([
                  'Year' => $this->request->getPost('Year'),
                  'Month' => $this->request->getPost('Month'),
                  'EmployeeCode' => $result['EmployeeCode'],
                  'ItemCode' => $hnb['temCode'],
                  'Amount' => $hnb['Amount']]
                  );
                  }
                  $ceylinco = $master->where(['EmployeeCode' => $result['EmployeeCode'], 'ItemCode' => '226'])->first();
                  if (isset($ceylinco['ItemCode'])) {
                  $process->save([
                  'Year' => $this->request->getPost('Year'),
                  'Month' => $this->request->getPost('Month'),
                  'EmployeeCode' => $result['EmployeeCode'],
                  'ItemCode' => $ceylinco['temCode'],
                  'Amount' => $ceylinco['Amount']]
                  );
                  } */
                $gross = new PayrollModel();
                $g = $gross->getGrossPay($result['EmployeeCode'], $this->request->getPost('Year'), $this->request->getPost('Month'));

                $process->save([
                    'Year' => $this->request->getPost('Year'),
                    'Month' => $this->request->getPost('Month'),
                    'EmployeeCode' => $result['EmployeeCode'],
                    'ItemCode' => '200',
                    'Amount' => $g[0]['Amount']
                ]);
                $deduct = new PayrollModel();
                $td = $deduct->getTotalDeduct($result['EmployeeCode'], $this->request->getPost('Year'), $this->request->getPost('Month'));

                $process->save([
                    'Year' => $this->request->getPost('Year'),
                    'Month' => $this->request->getPost('Month'),
                    'EmployeeCode' => $result['EmployeeCode'],
                    'ItemCode' => '400',
                    'Amount' => $td[0]['Amount']
                ]);

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
        // echo 'Month process is done successfully';
        helper('form');

        $employeeModel = new EmployeeModel();
        $itemModel = new ItemModel();
        $monthProcessModel = new MonthProcessModel();

        $employees = $employeeModel->findAll();
        $items = $itemModel->findAll();

        $data['employees'] = $employees;
        $data['items'] = $items;
// Get the amounts for each combination of employee and item
        foreach ($employees as $employee) {
            foreach ($items as $item) {
                $amount = $monthProcessModel
                        ->where('EmployeeCode', $employee['EmployeeCode'])
                        ->where('ItemCode', $item['ItemCode'])
                        ->where($this->request->getPost('Year'))
                        ->where($this->request->getPost('Month'))
                        ->findAll();
//echo $monthProcessModel->getLastQuery();
//  print_r($amount);
                $data['Amount'][$employee['EmployeeCode']][$item['ItemCode']] = $amount;
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

    function month_end() {

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

            echo $loanmaster->getLastQuery();
        }

        $month = new MonthendModel();
        $month->processMonthend();

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

//  $slip = new PayrollModel();
//  $data['list'] = $slip->getPaySlip($this->request->getPost('EmployeeCode'), $this->request->getPost('Year'), $this->request->getPost('Month'));
            $b = new PayrollModel();

//   echo $employee->getLastQuery();
            $data['basic'] = $b->where(['EmployeeCode' => $this->request->getPost('EmployeeCode'), 'Year' => $this->request->getPost('Year'), 'Month' => $this->request->getPost('Month'), 'ItemCode' => '100'])->first();

            /* $add = new PayrollModel();
              $data['list'] = $add->ViewAdditions($this->request->getPost('EmployeeCode'),$this->request->getPost('Year'),$this->request->getPost('Month'));
              } */
            $add = new PayrollModel();
            $data['list'] = $add->ViewAdditions($this->request->getPost('EmployeeCode'), $this->request->getPost('Year'), $this->request->getPost('Month'));

            $deduct = new PayrollModel();
            $data['dlist'] = $deduct->ViewDeductions($this->request->getPost('EmployeeCode'), $this->request->getPost('Year'), $this->request->getPost('Month'));

            $g = new PayrollModel();
            $data['gross'] = $g->where(['EmployeeCode' => $this->request->getPost('EmployeeCode'), 'Year' => $this->request->getPost('Year'), 'Month' => $this->request->getPost('Month'), 'ItemCode' => '200'])->first();

            $td = new PayrollModel();
            $data['totaldeduct'] = $td->where(['EmployeeCode' => $this->request->getPost('EmployeeCode'), 'Year' => $this->request->getPost('Year'), 'Month' => $this->request->getPost('Month'), 'ItemCode' => '400'])->first();

            $n = new PayrollModel();
            $data['net'] = $n->where(['EmployeeCode' => $this->request->getPost('EmployeeCode'), 'Year' => $this->request->getPost('Year'), 'Month' => $this->request->getPost('Month'), 'ItemCode' => '600'])->first();
        }


        $user_type = str_replace(' ', '', strtolower(session()->get('UserType')));

        echo view('Sys/header');
        echo view('Sys/menu_' . $user_type);
        echo view('sys/payroll/payslip', $data);
        echo view('sys/footer');
    }

    /* function paysheet() {
      helper('form');
      /* $workplace = new WorkPlaceModel();

      $data['station_list'] = $workplace->viewWorkPlace(); */

    /* $employee = new EmployeeModel();
      $data['employee_list'] = $employee->findAll();

      $add = new PayrollModel();
      $data['list'] = $add->ViewPaySheet($this->request->getPost('EmployeeCode'), $this->request->getPost('Year'), $this->request->getPost('Month'));

      } */

    function paysheet() {
        helper('form');

        $employeeModel = new EmployeeModel();
        $itemModel = new ItemModel();
        $monthProcessModel = new MonthProcessModel();

        $employees = $employeeModel->findAll();
        $items = $itemModel->findAll();

        $data['employees'] = $employees;
        $data['items'] = $items;

// Get the amounts for each combination of employee and item
        foreach ($employees as $employee) {
            foreach ($items as $item) {
                $amount = $monthProcessModel
                        ->where('EmployeeCode', $employee['EmployeeCode'])
                        ->where('ItemCode', $item['ItemCode'])
                        ->where(($this->request->getPost('Year')))
                        ->where(($this->request->getPost('Month')))
                        ->findAll();
//echo $monthProcessModel->getLastQuery();
//  print_r($amount);
                $data['Amount'][$employee['EmployeeCode']][$item['ItemCode']] = $amount;
            }
        }


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
