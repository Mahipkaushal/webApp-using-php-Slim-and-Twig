<?php

namespace App\Auth;

use App\Models\User;

class Auth {
    public $timestamps = false;
    
    public function user() {
        if($this->check()) {
            $sql = "SELECT * FROM `" . DB_PREFIX . "users` WHERE user_id = '" . $_SESSION['user'] . "'";
            $query = $this->db->query($sql);
            return $query->row;
        } else {
            return false;
        }
    }
    
    public function check() {
        return isset($_SESSION['user']);
    }
    
    public function attempt($username, $password) {
        $user = User::where('username', $username)->first();
        if(!$user) {
            return false;
        }
        
        if(password_verify($password, $user->password)) {
            $_SESSION['user'] = $user->user_id;
            return true;
        }
        
        return false;
    }
    
    public function logout() {
        unset($_SESSION['user']);
    }
}