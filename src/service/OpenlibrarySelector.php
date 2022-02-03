<?php

namespace App\service;

use http\Env\Response;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class OpenlibrarySelector
{
    private $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }
    public function getData($title):string
    {
       $title = strtolower(trim($title));
        $cleanTitle = (str_replace(" ","+",$title));
        $response = $this->client->request(
            'GET',
            'http://openlibrary.org/search.json?q=' .$cleanTitle
        );
        return $response->toArray()['q'];
    }
}