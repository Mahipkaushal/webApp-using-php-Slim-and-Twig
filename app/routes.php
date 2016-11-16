<?php

$app->get('/', 'HomeController:index')->setName('home');

<<<<<<< HEAD
$app->group('/auth', function() use ($app) {

	$app->get('/login', 'AuthController:getLogin')->setName('auth.login');

	$app->post('/login', 'AuthController:postLogin');

});

$app->group('/expense', function() use ($app) {

	$app->get('/home', 'ExpenseController:getHome')->setName('expense.home');

	$app->get('/logout', 'ExpenseController:logout')->setName('expense.logout');

})->add(new \App\Middleware\TokenMiddleware($app->getContainer()));
=======
$app->get('/auth/login', 'AuthController:getLogin')->setName('auth.login');

$app->post('/auth/login', 'AuthController:postLogin');

$app->get('/auth/logout', 'AuthController:logout')->setName('auth.logout');
>>>>>>> 93a1ca385c20b137c9fbc0bf0057bf0148d07729
