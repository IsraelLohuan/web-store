<?php

use \Application\Page;
use \Application\Models\User;
use \Application\Models\Order;

$app->get('/admin/orders', function() {
    
    User::verifyLogin();

    $order = new Order();

	$page = new Page();

	$page->setTpl("orders", [
        "orders" => $order->getAllOrders()
    ]);
});

$app->get("/admin/order/delete/{id}", function($request) {

    User::verifyLogin();

    $order = new Order();

    $order->editOrder($_POST, $request->getAttribute("id"), true);

    header("Location: /store-web/admin/orders");
    exit;
});

$app->get("/admin/order/address/{id}", function($request) {

    User::verifyLogin();

    $order = new Order();

    $page = new Page();

    $page->setTpl("order-address", [
        "endereco" => $order->getAddressByOrderID($request->getAttribute("id"))
    ]);
});

$app->get("/admin/order/products/{id}", function($request) {

    User::verifyLogin();

    $order = new Order();

    $page = new Page();

    $id = $request->getAttribute("id");

    $items = $order->getOrderByID($id)["items"];

    $page->setTpl("order-products", [
        "products" => $items
    ]);
});


$app->get("/admin/order/{id}", function($request) {

    User::verifyLogin();

    $order = new Order();

    $page = new Page();

    $id = $request->getAttribute("id");

    $statusAtual = $order->getOrderByID($id)["status_pedido_id"];

	$page->setTpl("order-edit", [
        "order_id" => $id,
        "status_id_atual" => $statusAtual,
        "status" => $order->getAllStatus()
    ]);
});

$app->post("/admin/order/edit/{id}", function($request) {

    User::verifyLogin();

    $order = new Order();

    $order->editOrder($_POST, $request->getAttribute("id"));

    header("Location: /store-web/admin/orders");
    exit;
});
