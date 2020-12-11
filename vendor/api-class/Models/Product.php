<?php

namespace Application\Models;

use Application\Models\Api;

class Product extends Api
{
    public function getAllProducts()
    {
        $response = $this->client->request("GET", parent::BASE_URI . "products", ["decode_content" => true]);

        $statusCode = $response->getStatusCode();

        if($statusCode == 200)
        {
            return json_decode($response->getBody()->getContents(), true);
        }

        return [];
    }

    public function getProductByID($id) 
    {
        $response = $this->client->request("GET", parent::BASE_URI . "product/" . $id, ["decode_content" => false]);

        $statusCode = $response->getStatusCode();

        if($statusCode == 200)
        {
            return json_decode($response->getBody()->getContents(), true)[0];
        }

        return [];
    }

    public function editProduct($data, $id, $deleted = false)
    {
        $product = $this->getProductByID($id);
       
        if($deleted) {
            $product["deleted"] = "1";
        } else {

            if(!isset($data["destaque"])) {
                $data["destaque"] = 0;
            }

            if(!isset($data["masculino"])) {
                $data["masculino"] = 0;
            }

            if(isset($data["filename"])) {
                $product["filename"] = $data["filename"];
            }

            $product["preco"] = $data["preco"];
            $product["descricao"] = $data["descricao"];
            $product["destaque"] = $data["destaque"];
            $product["desconto"] = $data["desconto"];
            $product["masculino"] = $data["masculino"];
            $product["produto_categoria_id"] = $data["produto_categoria_id"];
            $product["titulo"] = $data["titulo"];
        }

        $response = $this->client->request("PUT", parent::BASE_URI . "product", [
            "json" => [
                "id" => $product["id"],
                "preco" => $product["preco"],
                "descricao" => $product["descricao"],
                "destaque" => $product["destaque"],
                "deleted" => $product["deleted"],
                "desconto" => $product["desconto"],
                "masculino" => $product["masculino"],
                "produto_categoria_id" => $product["produto_categoria_id"],
                "titulo" => $product["titulo"],
                "filename" => $product["filename"],
            ],
            ["decode_content" => false]
        ]);

        return $response->getStatusCode() == 200;
    }

    public function insert($data)
    {
        if(!isset($data["destaque"])) {
            $data["destaque"] = 0;
        }

        if(!isset($data["masculino"])) {
            $data["masculino"] = 0;
        }

        $response = $this->client->request("POST", parent::BASE_URI . "product", [
            "json" => [
                "preco" => $data["preco"],
                "descricao" => $data["descricao"],
                "destaque" => $data["destaque"],
                "desconto" => $data["desconto"],
                "masculino" => $data["masculino"],
                "produto_categoria_id" => $data["produto_categoria_id"],
                "titulo" => $data["titulo"],
                "filename" => "default.png"
            ],
            ["decode_content" => false]
        ]);

        return $response->getStatusCode() == 200;
    }
}
