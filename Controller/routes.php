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
Router::url('dashboard/insert', 'post', 'C_Dashboard::insert');
Router::url('dashboard/delete', 'post', 'C_Dashboard::delete');
Router::url('login', 'post', 'C_Auth::saveLogin');
Router::url('register', 'post', 'C_Auth::saveRegister');
Router::url('logout', 'post', 'C_Auth::Logout');
Router::url('dashboard/edit', 'post', 'C_Dashboard::edit');

new Router();