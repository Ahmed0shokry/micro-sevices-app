<?php


namespace App\Traits;

use GuzzleHttp\Client;

trait ConsumesExternalService
{
    public function performRequest($method, $serviceUrl, $formParams = [], $headers = []) {
        $client = new Client();
        $response = $client->request(
            $method,
            $serviceUrl,
            ['form_params' => $formParams, 'headers' => $headers]
        );
        return $response->getBody()->getContents();
    }
}
