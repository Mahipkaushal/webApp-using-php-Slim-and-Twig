<?php

$app->get('/', 'HomeController:index')->setName('home');

$app->group('/auth', function() use ($app) {

	$app->get('/login', 'AuthController:getLogin')->setName('auth.login');

	$app->post('/login', 'AuthController:postLogin');

});

$app->group('/expense', function() use ($app) {

	$app->get('/home', 'ExpenseController:getHome')->setName('expense.home');

	$app->get('/logout', 'ExpenseController:logout')->setName('expense.logout');

})->add(new \App\Middleware\TokenMiddleware($app->getContainer()));