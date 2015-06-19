<?php
require __DIR__ . '/vendor/autoload.php';

$guzzle = New \GuzzleHttp\Client(['headers' => ["Origin" => 'https://open.spotify.com']]);


$oauth_token = json_decode($guzzle->get("https://open.spotify.com/token")->getBody(), true)['t'];

$csrf_token = json_decode($guzzle->get("https://random.spotilocal.com:4371/simplecsrf/token.json", [
    //'debug' => true,
    'query' => [
        'ref' => '',
        'cors' => '',
    ]
])->getBody(), true)['token'];



//pause test
$response = $guzzle->get("https://random.spotilocal.com:4371/remote/pause.json", [
    //'debug' => true,
    'query' => [
        'ref' => '',
        'cors' => '',
        'oauth' => $oauth_token,
        'csrf' => $csrf_token
    ]
])->getBody();

echo $response;


