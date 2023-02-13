<?php 

 namespace App\Models;

 use CodeIgniter\Model;


 class UserModel extends Model{
    protected $table = "users";
    protected $allowedFields = ["firstname", "email", "password", "created_at", "updated_at"];
    protected $beforeInsert = ["beforeInsert"];
    protected $beforeUpdate = ["beforeUpdate"];


    protected function beforeInsert($data = null){
        $data = $this->passwordHarsh($data);
        return $data;
    }

    protected function beforeUpdate($data = null){
        $data = $this->passwordHarsh($data);
        return $data;
    }

    protected function passwordHarsh($data){
        if(isset($data['data']['password'])){
            $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
            return $data;
        }
    }

 }