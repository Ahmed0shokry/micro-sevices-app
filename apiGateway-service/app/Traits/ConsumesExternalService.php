<?php


namespace App\Traits;

use GuzzleHttp\Client;

trait ConsumesExternalService
{
    public function performRequest($method, $serviceUrl, $formParams = [], $headers = []) {
        $client = new Client(['base_uri' => $this->baseUrl]);
        if(isset($this->secret)) {
            $headers['Authorization'] = $this->secret;
        }
        $response = $client->request(
            $method,
            $serviceUrl,
            ['form_params' => $formParams, 'headers' => $headers]
        );
        return $response->getBody()->getContents();
    }
}
