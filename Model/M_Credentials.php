<?php

include_once 'config/connection.php';

class M_Credentials{

    static function login($data = [])
    {
        $username = $data['username'];
        $password = $data['password'];
        global $conn;

        $result = $conn->query("SELECT * FROM credentials WHERE username = '$username'");
        if ($result = $result->fetch_assoc()) {
            $hashedPassword = $result['password'];
            $verify = password_verify($password, $hashedPassword);
            if ($verify) {
                return $result;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    

}