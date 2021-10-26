<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class AdminLinkCheckService
{
    public function checkLink($link){
        $client = new Client([
            'header' => [
                'Accept' => 'application/json',
                'Content-Type' => 'application/x-www-form-urlencoded'
            ],
            'verify' => false,
            'http_errors' => true
        ]);


        try {
            $client->request('GET',  $link);
            return 'no error';
        } catch (ClientException $e) {
            return $e->getCode();

        }
    }
}
