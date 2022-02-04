<?php

namespace App\service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class CoverSelector
{

    public const API_ENTRY_POINT = 'https://covers.openlibrary.org/b/isbn/';

    public const SUCCESS_STATUS = 200;

    private HttpClientInterface $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    public function generateCover(string $cover): string
    {
        $response = $this->client->request('GET', self::API_ENTRY_POINT . $cover .'jpg');
        if ($response->getStatusCode() !== self::SUCCESS_STATUS) {
            throw new Exception('Error while fetching definition');
        }

        return $response->toArray();
    }
}