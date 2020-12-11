<?php

use \Application\Page;
use \Application\Models\User;

$app->get('/admin/dashboard', function() {
    
    User::verifyLogin();

	$page = new Page();

	$page->setTpl("index");
});

$app->get('/admin/login', function() {
    
	$page = new Page([
        "header" => false, 
        "footer" => false
    ]);

	$page->setTpl("login", ["error" => User::getError()]);
});

$app->post('/admin/login', function() {

    (new User())->login($_POST["login"], $_POST["password"]);
    
	header("Location: /store-web/admin/dashboard");
	exit;
});