<?php

namespace App\Controllers;

use App\Models\UsersModel;

class UserAuth extends BaseController
{
    protected $AuthModel;
    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->session = session();
        $this->AuthModel = new UsersModel();
    }
    public function index()
    {
        return view('Auth/Login',[
            'title'=>"Halaman Login"
        ]);
    }
    public function Register()
    {
        return view('Auth/Register',[
            'title'=>'Halaman Registrasi'
        ]);
    }
    public function Regist(){
        if($this->request->getPost()){
            $data = $this->request->getPost();
            $this->validation->run($data,'Registrasi');
            $errors = $this->validation->getErrors();
            if(!$errors){
                $name = $this->request->getPost('name');
                $email = $this->request->getPost('email');
                $password = password_hash($this->request->getPost('password'),PASSWORD_BCRYPT);
                $values = [
                    'name' => $name,
                    'email' => $email,
                    'password' => $password,
                ];
                $this->AuthModel->save($values);
                $this->session->setFlashdata('success', 'Akun Berhasil Didaftarkan!');
                return redirect()->to('/UserAuth');
            }
            $this->session->setFlashdata('fail', $errors);
            return redirect()->to('/UserAuth/Register')->withInput();
        }
    }
    public function SignIn(){
        if($this->request->getPost()){
            
            $data = $this->request->getPost();
            $this->validation->run($data,'SignIn');
            $errors = $this->validation->getErrors();
            if(!$errors){
                $name = $this->request->getPost('name');
                $userInfo =$this->AuthModel->where('name', $name)->first();
                $password = password_verify($this->request->getPost('password'),$userInfo['password']);
                if (!$password) {
                    session()->setFlashdata('failPassword', 'Password Salah!');
                    return redirect()->to('/UserAuth')->withInput();
                } else {
                    $user_name = $userInfo['name'];
                    $role = $userInfo['role'];            
                    session()->set('loggedUser', $user_name);
                    session()->set('role',$role);       
                    }
                    
                    return redirect()->to('/Home');
            }
            $this->session->setFlashdata('fail', $errors);
            return redirect()->to('/UserAuth')->withInput();
     }
    }
    public function Logout()
    {
        if (session()->has('loggedUser')) {
            session()->remove('loggedUser');
            session()->remove('role');
            return redirect()->to('/UserAuth?access=out')->with('fail', 'You are Logged out');
        }
    }
}