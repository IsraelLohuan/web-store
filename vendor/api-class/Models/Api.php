<?php

namespace Application\Models;

use GuzzleHttp\Client;

class Api
{
    public const BASE_URI = "http://localhost/api-store/";
    
    protected $client;

    public function __construct()
    {
        $this->client = new Client([
            "base_uri" => self::BASE_URI, 
            "timeout" => 10.0]
        );
    }
}