<?php
namespace Models;

use Core\Database;
use PDO;

class UserModel extends Database {
    public function getOne($column = "id", $value)
    {
        $this->query("SELECT * FROM user WHERE $column=:value");
        $this->bind(":value", $value, PDO::PARAM_STR);

        return $this->resultOne();
    }


    public function auth($username, $password)
    {
        $this->query("SELECT `username`, `photo`, `password`, `role` FROM user WHERE `username`=:username LIMIT 1");
        $this->bind(":username", $username, PDO::PARAM_STR);

        $result = $this->resultOne();

        if($result) {
            $passwordHash = $result["password"];
            
            $isPasswordVerified = password_verify($password, $passwordHash);
    
            if($isPasswordVerified) {
                return [
                    "username" => $result["username"], 
                    "role" => $result["role"],
                    "photo" => $result["photo"], 
                ];
            }
        }

        return false;
    }

    public function store($data)
    {
        $username = $data["username"];
        $email = $data["email"];

        // Cek apakah username dan email sudah ada
        $isUsernameExist = $this->getOne("username", $username);
        if($isUsernameExist) return false;

        $isEmailExist = $this->getOne("email", $email);;
        if($isEmailExist) return false;

        $password = password_hash($data["password"], PASSWORD_BCRYPT);
        
        $this->query("INSERT INTO user (`username`, `email`, `role`, `password`)
                        VALUES (:username, :email, :role, :password)");

        $this->bind(":username", $username, PDO::PARAM_STR);
        $this->bind(":email", $email, PDO::PARAM_STR);
        $this->bind(":role", "admin", PDO::PARAM_STR);
        $this->bind(":password", $password, PDO::PARAM_STR);

        return $this->rows();
    }
}