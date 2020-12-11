<?php

use \Application\Page;
use \Application\Models\User;

$app->get('/admin/users', function() {
    
    User::verifyLogin();

    $user = new User();

	$page = new Page();

	$page->setTpl("users", [
        "users" => $user->getAllUsers()
    ]);
});

$app->get('/admin/user/{email}', function($request) {
    
    User::verifyLogin();

    $user = new User();

	$page = new Page();

    $email = $request->getAttribute("email");

	$page->setTpl("user-edit", [
        "user" => $user->getUser($email)[0],
    ]);
});

$app->get('/admin/user', function() {
    
    User::verifyLogin();

	$page = new Page();

	$page->setTpl("user-create");
});

$app->post('/admin/user/create', function() {
    
    User::verifyLogin();

    $user = new User();

    $user->insert($_POST);
    
	header("Location: /store-web/admin/users");
    exit;
});

$app->post('/admin/user/edit/{email}', function($request) {
    
    User::verifyLogin();

    $user = new User();

    $email = $request->getAttribute("email");

    $user->editUser($_POST, $email);

    header("Location: /store-web/admin/users");
    exit;
});

$app->get('/admin/user/delete/{email}', function($request) {
    
    User::verifyLogin();

    $user = new User();

    $email = $request->getAttribute("email");

    $user->editUser($_POST, $email, true);

    header("Location: /store-web/admin/users");
    exit;
});