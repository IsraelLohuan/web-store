<?php

namespace Application\Models;

use Application\Models\Api;
use \Application\Mailer;

class Order extends Api
{
    public function getAddressByOrderID($id)
    {
        $response = $this->client->request("GET", parent::BASE_URI . "endereco/" . $id, ["decode_content" => false]);

        $statusCode = $response->getStatusCode();

        if($statusCode == 200)
        {
            return json_decode($response->getBody()->getContents(), true)[0];
        }

        return [];
    }

    public function getAllStatus()
    {
        $response = $this->client->request("GET", parent::BASE_URI . "orderstatus", ["decode_content" => false]);

        $statusCode = $response->getStatusCode();

        if($statusCode == 200)
        {
            return json_decode($response->getBody()->getContents(), true);
        }

        return [];
    }

    public function getAllOrders()
    {
        $response = $this->client->request("GET", parent::BASE_URI . "orders", ["decode_content" => false]);

        $statusCode = $response->getStatusCode();

        if($statusCode == 200)
        {
            return json_decode($response->getBody()->getContents(), true);
        }

        return [];
    }

    public function getOrderByID($id)
    {
        $response = $this->client->request("GET", parent::BASE_URI . "order/" .$id, ["decode_content" => false]);

        $statusCode = $response->getStatusCode();

        if($statusCode == 200)
        {
            return json_decode($response->getBody()->getContents(), true)[0];
        }

        return [];
    }

    public function editOrder($data, $id, $deleted = false)
    {
        $order = $this->getOrderByID($id);
       
        if($deleted) {
            $order["deleted"] = "1";
        } else {
            $order["status_pedido_id"] = $data["status_pedido_id"];
        }

        $response = $this->client->request("PUT", parent::BASE_URI . "order", [
            "json" => [
                "id" => $order["id"],
                "valor_total" => $order["valor_total"],
                "id_pessoa" => $order["id_pessoa"],
                "status_pedido_id" => $order["status_pedido_id"],
                "endereco_id" => $order["endereco_id"],
                "deleted" => $order["deleted"],
                "items" => $order["items"]
            ],
            ["decode_content" => false]
        ]);

        $mailer = new Mailer(
            $order['email'], 
            $order['cliente'], 
            "Atualização de pedido", 
            "status_order_update",
            array("name" => $order["cliente"], "status" => $this->getOrderByID($id)["status"])
        );				

        $mailer->send();

        return $response->getStatusCode() == 200;
    }
}