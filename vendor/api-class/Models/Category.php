<?php

namespace Application\Models;

use Application\Models\Api;

class Category extends Api
{
    public function getAllCategories()
    {
        $response = $this->client->request("GET", parent::BASE_URI . "categories", ["decode_content" => false]);

        $statusCode = $response->getStatusCode();

        if($statusCode == 200)
        {
            return json_decode($response->getBody()->getContents(), true);
        }

        return [];
    }

    public function insert(array $data)
    {
        $response = $this->client->request("POST", parent::BASE_URI . "category", [
            "json" => [
                "descricao" => $data["descricao"],
            ],
            "decode_content" => false
        ]);

        return $response->getStatusCode() == 200;
    }

    public function delete($id)
    {
        $data = $this->getCategoryByID($id);

        $response = $this->client->request("PUT", parent::BASE_URI . "category", [
            "json" => [
                "id" => $data["id"],
                "descricao" => $data["descricao"],
                "deleted" => "1"
            ],
            "decode_content" => false
        ]);

        return $response->getStatusCode() == 200;
    }

    public function update(array $data)
    {
        $response = $this->client->request("PUT", parent::BASE_URI . "category", [
            "json" => [
                "id" => $data["id"],
                "descricao" => $data["descricao"],
                "deleted" => "0"
            ],
            "decode_content" => false
        ]);

        return $response->getStatusCode() == 200;
    }

    public function getCategoryByID($id)
    {
        $categories = $this->getAllCategories();

        for($i = 0; $i < count($categories); $i++)
        {
            if($categories[$i]["id"] == "".$id."") {
                return $categories[$i];
            }
        }
    }
}