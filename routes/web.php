<?php

$router->get('/weathers', ['uses' => 'Controller@weathers']);
$router->get('/weathers/{cityName}', ['uses' => 'Controller@bycity']);


