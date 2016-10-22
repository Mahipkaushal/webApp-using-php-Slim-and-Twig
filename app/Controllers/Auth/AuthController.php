<?php

namespace App\Controllers\Auth;

use App\Models\User;
use App\Controllers\Controller;
use Respect\Validation\Validator as v;

class AuthController extends Controller {
    
    public function getLogin($request, $response) {
        return $this->view->render($response, 'auth/login.twig');
    }
    
    public function postLogin($request, $response) {
        $json = array();
        
        $auth = $this->auth->attempt(
            $request->getParam('username'),
            $request->getParam('password')
        );
        
        
        if(!$auth) {
            $json['error']['code'] = 401;
            $json['error']['message'] = 'Username or Password does not match!';
        } else {
            $json['success'] = 'Login Successful!';
        }
        
        $response = $json;
    
        return json_encode($response);
    }
    
    public function logout($request, $response) {
        $this->auth->logout();
        return $this->view->render($response, 'auth/login.twig');
    }
}