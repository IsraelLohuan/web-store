<?php

use \Application\Page;
use \Application\Models\User;
use \Application\Models\Product;
use \Application\Models\Category;

$app->get('/admin/products', function() {
    
    User::verifyLogin();

    $product = new Product();

    $page = new Page();
    
	$page->setTpl("products", [
        "products" => $product->getAllProducts()
    ]);
});

$app->get('/admin/product/delete/{id}', function($request) {
    
    User::verifyLogin();

    $product = new Product();

    $product->editProduct(null, $request->getAttribute("id"), true);

	header("Location: /store-web/admin/products");
    exit;
});

$app->get('/admin/product/edit/{id}', function($request) {
    
    User::verifyLogin();

    $product = new Product();

    $page = new Page();

    $id = $request->getAttribute("id");

    $productEdit = $product->getProductByID($id);

	$page->setTpl("product-edit", [
        "product" => $productEdit,
        "categories" => (new Category())->getAllCategories()
    ]);
});

$app->post('/admin/product/edit/{id}', function($request) {
    
    User::verifyLogin();

    $product = new Product();

    $page = new Page();

    $id = $request->getAttribute("id");

    $productEdit = $product->getProductByID($id);

    $product->editProduct($_POST, $id);
    
    header("Location: /store-web/admin/products");
    exit;
});

$app->get('/admin/product/create', function($request) {
    
    User::verifyLogin();

    $page = new Page();

    $page->setTpl("product-create", [
        "categories" => (new Category())->getAllCategories()
    ]);
});

$app->post('/admin/product/create', function($request) {
    
    User::verifyLogin();

    $product = new Product();

    $page = new Page();

    $product->insert($_POST);

    header("Location: /store-web/admin/products");
    exit;
});
