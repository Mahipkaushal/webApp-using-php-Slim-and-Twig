<?php

namespace App\Controllers;

use App\Models\User;
use Slim\Views\Twig as View;

class HomeController extends Controller {
    
    public function index($request, $response) {
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