<?php
require 'vendor/autoload.php';

$app = new Slim\App();
header('Access-Control-Allow-Origin: *');

$app->get('/', function ($request, $response, $args) {
    $response->write("Welcome to Slim!");
    return $response;
});

require 'google_maps_area.php';
require 'google_maps_markers.php';
require 'laws.php';

$app->run();