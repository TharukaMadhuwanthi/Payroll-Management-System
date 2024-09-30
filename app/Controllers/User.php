<?php

namespace App\Controllers;

use App\Models\UserModel;

class User extends BaseController {

    public function index() {
        helper(['form']);
        echo view('web/index');
    }

    public function login() {
        helper(['form']);
        $data = array();
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
                $model = new UserModel();
                $user = $model->where('Username', $this->request->getVar('username'))->first();
                $this->setUserSession($user);
                return redirect()->to('sys/dashboard');
            }
        }
        return view('web/index');
    }

    private function setUserSession($user) {
        $data = [
            'UserId' => $user['UserId'],
            'UserName' => $user['Username'],
            'UserType' => $user['UserType'],
            'ProfileImage' => $user['profile_image'],
            'isLoggedIn' => true,
        ];

        session()->set($data);
        return true;
    }

    public function logout() {
        session()->destroy();
        return redirect()->to('web');
    }
    
    
    public function resetpassword() {
        helper(['form']);
        echo view('sys/user_account/reset_password');
    }
    
    public function SentRestLink(){
        helper('form');
        if ($this->request->getMethod() == 'post') {
            $rules = [
                'email' => 'required|valid_email',
            ];
            if (!$this->validate($rules)) {
                return view('user_account/reset_password');
            }
            $email = $this->request->getPost('email');
            $usermodel = new UserAccountModel();
            $user = $usermodel->where('Email', $email)->get()->getRow();
            if (!$user) {
                $data['error']='Email not found';
                return redirect()->to('useraccount/resetpassword',$data)->with('error', 'Email not found.');
            }
            $token = bin2hex(random_bytes(16)); // Generate a random token
            $expiry = date('Y-m-d H:i:s', strtotime('+1 hour'));

            $resettoken = new ResettokenModel();
            $resettoken->save([
                'user_id' => $user->Id,
                'token' => $token,
                'created_at' => $expiry,
            ]);

            $resetLink = site_url("user_account/reset_password/$token");
            $email = \Config\Services::email();
            $email->setTo($this->request->getPost('email'));
            $email->setFrom('madhuwanthitharuka@gmail.com');
            $email->setSubject('Password Reset Link');

            $email->setMessage("Click the following link to reset your password: $resetLink");
            $email->send();
        }
        return redirect()->to('user/resetpassword')->with('success', 'Reset link sent to your email.');
    }
}
