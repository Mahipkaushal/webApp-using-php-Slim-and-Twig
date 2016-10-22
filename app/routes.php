<?php

$app->get('/', 'HomeController:index')->setName('home');

$app->get('/auth/login', 'AuthController:getLogin')->setName('auth.login');

$app->post('/auth/login', 'AuthController:postLogin');

$app->get('/auth/logout', 'AuthController:logout')->setName('auth.logout');