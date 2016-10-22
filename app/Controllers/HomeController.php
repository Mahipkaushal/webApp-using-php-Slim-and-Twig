<?php

namespace App\Controllers;

use Slim\Views\Twig as View;

class HomeController extends Controller {
    
    public function index($request, $response) {
        $this->flash->addMessage('error', 'This is Flash Error message');
        $vars = [
            'page' => [
            'title'         => 'Expense Manager',
            'description'   => 'Welcome to the official Expense Manager',
            'author'        => 'Mahip Kaushal'
            ],
        ];        
        return $this->view->render($response, 'home.twig', $vars);
    }
    
}