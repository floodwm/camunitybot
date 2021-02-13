<?php

namespace Http;

use GuzzleHttp\Client;

class http
{
    public $apiUrl;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function request($method, $url, $params)
    {

        $params_arr = [];

        foreach ($params as $key => &$val) {
            if (!is_numeric($val) && !is_string($val)) {
                $val = json_encode($val);
            }
            $params_arr[] = urlencode($key) . '=' . urlencode($val);
        }

        $query_string = implode('&', $params_arr);

        $apiUrl = $url . '/' . $method;

        $res = $this->client->request('POST', $apiUrl, $params_arr);
    }


}