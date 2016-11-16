<?php

namespace App\Controllers\Expense;

use App\Controllers\Controller;
use Slim\Views\Twig as View;

class ExpenseController extends Controller {

	public function getHome($request, $response) {
		
		$json = array();

		if(!$request->getAttribute('error')){
			$user = $request->getAttribute('user');			
	        $vars = [
	            'user'	=> [
	            	'user_id'	=>	$user['user_id'],
	            	'username'	=>	$user['username'],
	            	'token'		=>	$request->getAttribute('token')
	            ],
	        ];
	        $json['html'] = $this->view->fetch('expense/home.twig', $vars);
	    } else {
	    	$json['error']['code'] = 401;
	    	$json['error']['message'] = $request->getAttribute('message');
	    }
        
        return json_encode($json);
    }

    public function logout($request, $response) {
    	$json = array();

    	if(!$request->getAttribute('error')){
    		
    		$user = $request->getAttribute('user');
    		$user_id = $user['user_id'];
        	$this->token->deleteToken($user_id);

        	$json['success'] = 'Logout Successful!';
        }

        return json_encode($json);
    }

}