<?php

namespace App\Controllers;
use App\Models\UserAccountModel;
use App\Models\LoanRequestModel;
use App\Models\InstructionsModel;
use App\Models\EmployeeModel;
use App\Models\MonthendModel;
use App\Models\ItemModel;

class Sys extends BaseController {

    public function index() {
        helper(['form']);
        echo view('web/index');
    }

    public function dashboard() {
        $lr=new LoanRequestModel();
        $data['lr']=$lr->findAll();
        
        $ins=new InstructionsModel();
        $data['ins']=$ins->findAll();
        
        $emp=new EmployeeModel();
        $data['emp_list']=$emp->findAll();
        
        $tot=new MonthendModel();
        $data['ttl']=$tot->getTotalAmount();
        
        $totp=new MonthendModel();
        $data['ttlp']=$totp->getTotalAmountPrevious();
        
        
        $b=new MonthendModel();
        $data['basic']=$b->getBasicAmount();
        
         $anly=new MonthendModel();
        $data['an']=$anly->Analysis();
        
        $employee=new EmployeeModel();
        $data['emp']=$employee->findAll();
        
         $itemlist=new ItemModel();
        $data['items']=$itemlist->findAll();
        
        $user = new UserAccountModel();
        $data['$user_list']=$user->findAll();
       $user_type = str_replace(' ','',strtolower(session()->get('UserType')));
      
        echo view('Sys/header');
        echo view('Sys/menu_' . $user_type);
        echo view('Sys/content_' . $user_type,$data);
        echo view('Sys/footer');
        
       
    }

    public function sendmail() {
        $email = \Config\Services::email();
        $email->setTo('mpsarathw@gmail.com');
        $email->setFrom('madhuwanthitharuka@gmail.com', 'Your Name');
        $email->setSubject('Tharuka');
        $msg='<h1>Account verification</h1>';
        $msg.='<a href="http://localhost/pms/sys/verifymyaccount/999">Click Here to verify my account</a>';
        $email->setMessage($msg);
        if ($email->send()) {
            echo 'Email sent successfully';
        } else {
            echo 'Email could not be sent';
            echo $email->printDebugger(['headers']);
        }
    }
    
    public function verifymyaccount($userid=null) {
        echo 'you are verified now';
        echo '<br>';
        echo $userid;
    }
}
