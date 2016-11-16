<?php

namespace App\Controllers\Auth;

<<<<<<< HEAD
=======
use App\Models\User;
>>>>>>> 93a1ca385c20b137c9fbc0bf0057bf0148d07729
use App\Controllers\Controller;
use Respect\Validation\Validator as v;

class AuthController extends Controller {
    
    public function getLogin($request, $response) {
<<<<<<< HEAD
        $json = array();
        $vars = [];
        $json['html'] = $this->view->fetch('auth/login.twig', $vars);
        return json_encode($json);
=======
        return $this->view->render($response, 'auth/login.twig');
>>>>>>> 93a1ca385c20b137c9fbc0bf0057bf0148d07729
    }
    
    public function postLogin($request, $response) {
        $json = array();
<<<<<<< HEAD

=======
        
>>>>>>> 93a1ca385c20b137c9fbc0bf0057bf0148d07729
        $auth = $this->auth->attempt(
            $request->getParam('username'),
            $request->getParam('password')
        );
        
        
        if(!$auth) {
<<<<<<< HEAD
            $json['error']['type'] = 'error';
            $json['error']['code'] = 401;
            $json['error']['message'] = 'Username or Password does not match!';
        } else {
            $json['user'] = $auth;
=======
            $json['error']['code'] = 401;
            $json['error']['message'] = 'Username or Password does not match!';
        } else {
>>>>>>> 93a1ca385c20b137c9fbc0bf0057bf0148d07729
            $json['success'] = 'Login Successful!';
        }
        
        $response = $json;
    
        return json_encode($response);
    }
    
    public function logout($request, $response) {
<<<<<<< HEAD
        $this->auth->logout($request);
=======
        $this->auth->logout();
>>>>>>> 93a1ca385c20b137c9fbc0bf0057bf0148d07729
        return $this->view->render($response, 'auth/login.twig');
    }
}