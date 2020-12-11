<?php

use \Application\Page;
use \Application\Models\User;
use \Application\Models\Category;

$app->get('/admin/categories', function() {
    
    User::verifyLogin();

    $category = new Category();

	$page = new Page();

	$page->setTpl("categories", [
        "categories" => $category->getAllCategories()
    ]);
});

$app->get('/admin/categories/create', function() {
    
    User::verifyLogin();

    $category = new Category();

	$page = new Page();

	$page->setTpl("categories-create");
});

$app->post('/admin/categories/create', function() {
    
    User::verifyLogin();

    $category = new Category();

    $category->insert($_POST);

    header("Location: /store-web/admin/categories");
    exit;
});

$app->get('/admin/categories/delete/{id}', function($request) {
    
    User::verifyLogin();

    $category = new Category();

    $id = $request->getAttribute("id");

    $category->delete($id);

    header("Location: /store-web/admin/categories");
    exit;
});

$app->get('/admin/categories/edit/{id}', function($request) {
    
    User::verifyLogin();

    $category = new Category();

    $id = $request->getAttribute("id");

    $data = $category->getCategoryByID($id);

    $page = new Page();

    $page->setTpl("categories-edit", [
        "category" => $data
    ]);
});

$app->post('/admin/categories/edit/{id}', function($request) {
    
    User::verifyLogin();

    $data = array(
        "id" => $request->getAttribute("id"),
        "descricao" => $_POST["descricao"]
    );

    $category = new Category();

    $category->update($data);

    header("Location: /store-web/admin/categories");
    exit;
});