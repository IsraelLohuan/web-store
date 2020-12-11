<?php

namespace Application\Models;

use Application\Models\Api;

class User extends Api
{
    public static $errorLogin = "ERROR_LOGIN";
    public static $userLogged = "USER_LOGGED";
    private $fields = [
        "id",
        "nome",
        "data_cadastro",
        "telefone",
        "file_name",
        "email",
        "deleted",
        "senha",
        "admin"
    ];

    public static function verifyLogin()
    {
        if(!isset($_SESSION[User::$userLogged])) {
            header("Location: /store-web/admin/login");
            exit;
        } 
    }

    public function login($email, $password) 
    {
        $response = $this->client->request("GET", parent::BASE_URI . "auth/".$email."/".$password, ["decode_content" => false]);

        $statusCode = $response->getStatusCode();

        if($statusCode == 204) 
        {
            User::setError("Usuário ou senha inválido(s)!");
        } 
        else if($statusCode != 200) 
        {
            User::setError("Nao foi possível realizar o Login!");
        } 
        else 
        {
            $userJson = json_decode($response->getBody()->getContents(), true);

            if($userJson[0]["admin"] === "0") {
                User::setError("Necessário permissao de Administrador, para acesso do Gerencial!");
            } else {
                User::setUserLogged($userJson);
            }
        }
    }

    public function getAllUsers()
    {
        $response = $this->client->request("GET", parent::BASE_URI . "persons", ["decode_content" => false]);

        $statusCode = $response->getStatusCode();

        if($statusCode == 200)
        {
            return json_decode($response->getBody()->getContents(), true);
        }

        return [];
    }

    public function getUser($email)
    {
        $response = $this->client->request("GET", parent::BASE_URI . "person/" . $email, ["decode_content" => false]);

        $statusCode = $response->getStatusCode();

        if($statusCode == 200)
        {
            return json_decode($response->getBody()->getContents(), true);
        }

        return [];
    }

    public function insert($value)
    {
        if(!isset($value["admin"])) {
            $value["admin"] = 0;
        }

        $response = $this->client->request("POST", parent::BASE_URI . "person", [
            "json" => [
                "nome" => $value["nome"],
                "telefone" => $value["telefone"],
                "email" => $value["email"],
                "senha" => $value["senha"],
                "admin" => $value["admin"],
                "documento" => $value["documento"],
                "file_name" => "default.png"
            ],
            "decode_content" => false
        ]);

        return $response->getStatusCode() == 200;
    }

    public function editUser($value, $email, $deleted = false)
    {
        if(!isset($value["admin"])) {
            $value["admin"] = 0;
        }

        $userData = $this->getUser($email)[0];

        if($deleted) {
            $value["deleted"] = "1";
        }

        for($i = 0; $i < count($this->fields); $i++) {

            $indexName = $this->fields[$i];

            if(!array_key_exists($indexName, $value)) {

                $value[$indexName] = $userData[$indexName];
            }
        }

        $response = $this->client->request("PUT", parent::BASE_URI . "person", [
            "json" => [
                "id" => $value["id"],
                "nome" => $value["nome"],
                "data_cadastro" => $value["data_cadastro"],
                "telefone" => $value["telefone"],
                "file_name" => $value["file_name"],
                "email" => $value["email"],
                "deleted" => $value["deleted"],
                "senha" => $value["senha"],
                "admin" => $value["admin"]
            ],
            "decode_content" => false
        ]);

        return $response->getStatusCode() == 200;
    }

    public static function setUserLogged($user) 
    {
        $_SESSION[User::$userLogged] = $user;
    }

    public static function setError($error) 
    {
        $_SESSION[User::$errorLogin] = $error;
        User::setUserLogged(null);
    }

    public static function errorClear()
    {
        $_SESSION[User::$errorLogin] = "";
    }

    public static function getError()
    {
        $message = (isset($_SESSION[User::$errorLogin]) && $_SESSION[User::$errorLogin]) ? $_SESSION[User::$errorLogin] : "";

        User::errorClear();

        return $message;
    }
}