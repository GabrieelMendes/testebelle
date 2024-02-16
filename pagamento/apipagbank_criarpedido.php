<?php
require_once('../vendor/autoload.php');

$client = new \GuzzleHttp\Client();

$response = $client->request('POST', 'https://sandbox.api.pagseguro.com/orders', [
    'headers' => [
        'Authorization' => 'Bearer SEU_TOKEN_AQUI',
        'accept' => 'application/json',
        'content-type' => 'application/json',
    ],
    'json' => [ /* Seus dados aqui */ ],
]);

echo $response->getBody();
