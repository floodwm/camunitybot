<?php


namespace Bots;


use GuzzleHttp\Client;

class Translate
{
    public function translate($text)
    {
        $headers = [
            'accept' => 'application/json',
            'Authorization' => 'a_QOU3sPjVIaqMs5Oii3aLBLWuldi1IfkYFvgBI0ueNo6dJcjcm457vwg83uAbxxPdU7xgha3raWlxvJwt',
            'Content-Type' => 'application/json',
        ];
        $client = new Client([ 'headers' => $headers ]);
        $url = 'https://api-b2b.backenster.com/b1/api/v3/';
        $params = [
            "from" => "en_GB",
            "to" =>"ru_RU",
            "data" => $text,
            "platform" => "api"
        ];
        $res = $client->request('POST', $url . '/translate', array('query' => $params));

        return $res->getBody()->getContents();
    }
}