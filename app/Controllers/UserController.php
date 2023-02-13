<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Model;

class UserController extends BaseController
{
    public function index()
    {

        helper(['form']);
        $data = [];

        if ($this->request->getMethod() == "post") {

            $rules = [
                "email" => "required|min_length[6]|max_length[50]|valid_email",
                "password" => "required|min_length[8]|max_length[255]|validateUser[email, password]",
            ];

            $passwordError = [
                "password" => ["validateUser" => "Email or Password does not match"]
            ];

            if (!$this->validate($rules, $passwordError)) {  
                $data['validation'] = $this->validator;
                session()->destroy();
            } else {
                $model = new UserModel();
                $user = $model->where("email", $this->request->getPost("email"))->first();
                

                $this->setUserSession($user);

                return redirect()->to(base_url("/dashboard"));
            }
        }



        return view("pages/login.php", $data);
    }

    public function register()
    {

        helper(['form']);
        $data = [];

        if ($this->request->getMethod() == "post") {

            $rules = [
                "firstname" => "required|min_length[3]|max_length[20]",
                "email" => "required|min_length[6]|max_length[50]|valid_email|is_unique[users.email]",
                "password" => "required|min_length[8]|max_length[255]",
                "password_confirm" => "matches[password]",
            ];
            if(! $this->validate($rules)){
                $data['validation'] = $this->validator;
            }else{

                $model = new UserModel();
    
                $newData = [
                    "firstname" => $this->request->getPost("firstname"),
                    "email" => $this->request->getPost("email"),
                    "password" => $this->request->getPost("password"),
                ];
    
                $model->save($newData);
                $session = session();
                $session->setFlashdata("success", "successfully Registered");
    
                return redirect()->to(base_url("/"));
            }
        }

        return view("pages/signup.php", $data);
    }

    private function setUserSession($user){
        $data = [
            "id" => $user['id'],
            "firstname" => $user['firstname'],
            "email" => $user['email'],
            "password" => $user['password'],
            "isLoggedIn" => true
        ];
        session()->set($data);
    }

}
