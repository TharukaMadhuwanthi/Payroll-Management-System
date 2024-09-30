<?php

namespace App\Controllers;

use App\Models\EmployeeModel;
use App\Models\UserAccountModel;
use App\Models\ResettokenModel;

class Useraccount extends BaseController {

    public function index() {
        
    }
public function login() {
        helper(['form']);
        $data = array();
        
        $useracc = new UserAccountModel();
        $user = $useracc->where(['Status' => 'Active'])->findAll();
        
        if ($this->request->getMethod() == 'post') {
            $rules = [
                'username' => ['label' => 'Username', 'rules' => 'required'],
                'password' => ['label' => 'Password', 'rules' => 'required|validateUser[username,password]'],
            ];
            $errors = [
                'password' => [
                    'validateUser' => 'You are entering the wrong username or Password'
                ]
            ];

            if (!$this->validate($rules, $errors)) {
                $data['validation'] = $this->validator;
            } else {
                                
                $model = new UserAccountModel();
                $user = $model->where('Username', $this->request->getVar('username'))->first();
                
                $this->setUserSession($user);
                return redirect()->to('sys/dashboard');
            }
        }
        return view('web/index');
    }

    private function setUserSession($user) {
        $data = [
            'Id' => $user['Id'],
            'UserName' => $user['Username'],
            'UserType' => $user['UserType'],
            
           'EmployeeCode'=> $user['Name'],
            'isLoggedIn' => true,
        ];

        session()->set($data);
        return true;
    }

    public function logout() {
        session()->destroy();
        return redirect()->to('web');
    }
    
    public function add() {
        helper('form');
        $data = array();
        $employee = new EmployeeModel();
        $data['employee_list'] = $employee->findAll();
        //check form is submit as post

        if ($this->request->getMethod() == 'post') {
            $rules = [
                'Email' => ['label' => 'Email', 'rules' => 'required'],
                'UserType' => ['label' => 'UserType', 'rules' => 'required'],
                'Status' => ['label' => 'Status', 'rules' => 'required'],
                'Username' => ['label' => 'Username', 'rules' => 'required'],
                'Password' => ['label' => 'Password', 'rules' => 'required|min_length[10]'],
            ];

            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
            } else {
                $user_account = new UserAccountModel();
                $user_account->save([
                    'Name' => $this->request->getPost('EmployeeCode'),
                    'Email' => $this->request->getPost('Email'),
                    'UserType' => $this->request->getPost('UserType'),
                    'Status' => $this->request->getPost('Status'),
                    'Username' => $this->request->getPost('Username'),
                    'Password' => $this->request->getPost('Password'),
                ]);
               // echo $user_account->getLastQuery();
                $data['msg'] = "User Account Created...!";
            }
        }
        
        $user_type = str_replace(' ', '', strtolower(session()->get('UserType')));
        
        echo view('sys/header');
        echo view('sys/menu_' . $user_type);
        echo view('sys/user_account/add', $data);
        echo view('sys/footer');
    }

    public function reset_password() {
      helper(['form']);
      echo view('sys/user_account/reset_password');
      } 

    

    public function SendResetLink() {
        helper('form');
        if ($this->request->getMethod() == 'post') {
            $rules = [
                'email' => 'required|valid_email',
            ];
            if (!$this->validate($rules)) {
                
                $user_type = str_replace(' ', '', strtolower(session()->get('UserType')));
                
                return view('sys/user_account/reset_password');
                return view('sys/header');
                echo view('sys/menu_' . $user_type);
                return view('sys/footer');
            }
            $email = $this->request->getPost('email');
            $usermodel = new UserAccountModel();
            $user = $usermodel->where('Email', $email)->get()->getRow();
            if (!$user) {
                $data['error'] = 'Email not found';
                // return redirect()->to('sys/user_account/reset_password',$data)->with('error', 'Email not found.');
                $data['error'] = 'Email not found.';
                return view('sys/user_account/reset_password', $data);
            }
            $token = bin2hex(random_bytes(16)); // Generate a random token
            $expiry = date('Y-m-d H:i:s', strtotime('+1 hour'));

            $resettoken = new ResettokenModel();
            $resettoken->save([
                'user_id' => $user->Id,
                'token' => $token,
                'created_at' => $expiry,
            ]);

            $resetLink = site_url("useraccount/resetpassword/$token");
            $email = \Config\Services::email();
            $email->setTo($this->request->getPost('email'));
            $email->setFrom('madhuwanthitharuka@gmail.com');
            $email->setSubject('Password Reset Link');

            $email->setMessage("Click the following link to reset your password: $resetLink");
            $email->send();
        }
        $data['error'] = 'Email has been sent.';
        return view('sys/user_account/reset_password', $data);
    }

    //return redirect()->to('sys/user_account/reset_password')->with('success', 'Reset link sent to your email.');

public function resetpassword($token) {
        helper('form');
        $resettokenmodel = new ResettokenModel();
        $resetToken = $resettokenmodel->where('token', $token)->get()->getRow();

        if (!$resetToken) {
            //return redirect()->to('user/resetpassword')->with('error', 'Invalid reset token.');
            $data['error'] = 'Invalid token.';
            return view('sys/user_account/reset_password', $data);
        }
 $data['token'] = $token;
        $expiryTime = strtotime($resetToken->created_at);
        if ($expiryTime < time()) {
            $data['error'] = 'Token has been expired.';
            return view('sys/user_account/reset_password', $data);
        }
       
        return view('sys/user_account/reset_password_form', $data);
    }

    public function save_reset_password() {
        helper('form');
        if ($this->request->getMethod() == 'post') {
            $rules = [
                'token' => 'required',
                'new_password' => 'required|min_length[6]', // Adjust validation rules as needed
            ];
            $token = $this->request->getPost('token');
            $data['token'] = $token;
            if (!$this->validate($rules)) {
                return view('sys/user_account/reset_password_form', $data); // Reload the form with validation errors
            }

            $resettokenmodel = new ResettokenModel();
            $resetToken = $resettokenmodel->where('token', $token)->get()->getRow();

            if (!$resetToken) {
                $data['error'] = 'Invalid reset token.';
                return view('sys/user_account/reset_password_form', $data);
            }

            $expiryTime = strtotime($resetToken->created_at);
            if ($expiryTime < time()) {
                $data['error'] = 'Reset token has expired.';
                return view('sys/user_account/reset_password_form', $data);
            }
            $newPassword = $this->request->getPost('new_password');
            $usermodel = new UseraccountModel();
            $usermodel->update(['UserId' => $resetToken->user_id], ['Password' => $newPassword]);
            $resettokenmodel->where('token', $token)->delete();
            return redirect()->to('user/login')->with('success', 'Password reset successfully.');
        }
    }

    public function view() {
        helper('form');
         $employee = new UserAccountModel();
        if ($this->request->getMethod() == 'post') {
            $data['list'] = $employee->viewUserDetails($this->request->getPost('EmployeeCode'));
        } else {
            $data['list'] = $employee->viewUserDetails();
        }

        
        $user_type = str_replace(' ', '', strtolower(session()->get('UserType')));

        echo view('sys/header');
        echo view('sys/menu_' . $user_type);
        echo view('sys/user_account/view', $data);
        echo view('sys/footer');
    }

    public function edit() {
        
        $user_type = str_replace(' ', '', strtolower(session()->get('UserType')));
        
        echo view('sys/header');
        echo view('sys/menu_' . $user_type);
        echo view('sys/user_account/edit');
        echo view('sys/footer');
    }
}
