<?php

namespace App\Auth;

<<<<<<< HEAD
use App\Controllers\Controller;
use App\Models\User;

class Auth extends Controller {

    protected $user;
    protected $container;

    public function __construct($container) {
        $this->container = $container;
        $this->user = new User($this->container);
    }

    public function user() {
        return true;
    }

    public function check() {
        return true;
    }

    public function validateToken($request) {
        if($request) {
            return $this->token->validateToken($request);
=======
use App\Models\User;

class Auth {
    public $timestamps = false;
    
    public function user() {
        if($this->check()) {
            $sql = "SELECT * FROM `" . DB_PREFIX . "users` WHERE user_id = '" . $_SESSION['user'] . "'";
            $query = $this->db->query($sql);
            return $query->row;
>>>>>>> 93a1ca385c20b137c9fbc0bf0057bf0148d07729
        } else {
            return false;
        }
    }
    
<<<<<<< HEAD
    public function attempt($username, $password) {
        $user = array();
        
        $data = array(
            'username'      =>  $username,
            'password'      =>  $password
        );

        $userData = $this->user->login($data);

        if($userData) {
            $token = $this->token->generateToken($userData['user_id']);
            $user['username'] = $userData['username'];
            $user['token'] = $token;
            return $user;
        } else {
            return false;
        }
    }
    
=======
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
>>>>>>> 93a1ca385c20b137c9fbc0bf0057bf0148d07729
}