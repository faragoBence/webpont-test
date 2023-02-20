<?php

namespace App\Http\Middleware;

use Exception;
use GuzzleHttp\Client;

class WeatherClient
{
    protected $service;

    protected $config;


    public function __construct()
    {
        $this->config = config('weatherconfig');
    }

    private function buildQueryString(array $params)
    {
        $params['appid'] = $this->config['apiKey'];
        $params['lat'] = $this->config['lat'];
        $params['long'] = $this->config['long'];
        return http_build_query($params);
    }


    public function client()
    {
        $this->service = new Client([
            'base_uri' => $this->config['url'],
            'timeout' => 10.0,
        ]);

        return $this;
    }

    public function fetch($params = [])
    {
        try {
            $route = $this->config['url'] . $this->config['version'] . '/weather?' . $this->buildQueryString($params);
            $response = $this->service->request('GET', $route);
            if ($response->getStatusCode() == 200) {
                return json_decode($response->getBody()->getContents());
            }
            throw new Exception('Unknown error');
        } catch (Exception $e) {
            // Error handling
        }
    }
}
