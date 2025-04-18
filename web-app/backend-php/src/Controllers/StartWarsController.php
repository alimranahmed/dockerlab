<?php

namespace Alimranahmed\PlainPHP\Controllers;

use GuzzleHttp\Client;

class StartWarsController
{
    public function __invoke(): void
    {
        $client = new Client();
        $response = $client->get('https://swapi.dev/api/films');
        $data = json_decode($response->getBody()->getContents(), true);

//        echo "<pre>";
//        echo json_encode(json_decode($response->getBody()->getContents(), true), JSON_PRETTY_PRINT);
//        echo "</pre>";kk
        foreach ($data['results'] as $film) {
            echo $film['title'].'<br>';
        }
    }
}