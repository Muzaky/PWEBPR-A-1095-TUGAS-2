<?php
include_once 'config/static.php';
include_once 'controller/main.php';
include_once 'function/main.php';


# GET
Router::url('/', 'get', function () {
    view('auth/layout', ['url' => 'login']);
});

Router::url('login', 'get', 'C_Auth::login');
Router::url('register', 'get', 'C_Auth::register');
Router::url('dashboard', 'get', 'C_Dashboard::index');


# POST
Router::url('login', 'post', 'C_Auth::saveLogin');
// Router::url('register', 'post', 'AuthController::saveRegister');

new Router();