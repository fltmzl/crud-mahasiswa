<?php
namespace Models;

use Core\Database;
use PDO;

class UserModel extends Database {
    public function auth($username, $password)
    {
        $this->query("SELECT `username`, `password`, `role` FROM user WHERE `username`=:username LIMIT 1");
        $this->bind(":username", $username, PDO::PARAM_STR);

        $result = $this->resultOne();
        $passwordHash = $result["password"];
        
        $isPasswordVerified = password_verify($password, $passwordHash);

        if($isPasswordVerified) {
            return [
                "username" => $result["username"], 
                "role" => $result["role"]
            ];
        }
    }

    public function store($data)
    {
        $username = $data["username"];
        $email = $data["email"];
        $password = password_hash($data["password"], PASSWORD_BCRYPT);
        
        $this->query("INSERT INTO user (`username`, `email`, `role`, `password`)
                        VALUES (:username, :email, :role, :password)");

        $this->bind(":username", $username, PDO::PARAM_STR);
        $this->bind(":email", $email, PDO::PARAM_STR);
        $this->bind(":role", "user", PDO::PARAM_STR);
        $this->bind(":password", $password, PDO::PARAM_STR);

        return $this->rows();
    }
}