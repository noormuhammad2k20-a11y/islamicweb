<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Boot laravel
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$request = Request::create('/prayer-times/karachi', 'GET');
$response = $kernel->handle($request);

echo "Status Code for /prayer-times/karachi: " . $response->getStatusCode() . "\n";

$request2 = Request::create('/islamic-calendar', 'GET');
$response2 = $kernel->handle($request2);

echo "Status Code for /islamic-calendar: " . $response2->getStatusCode() . "\n";

$request3 = Request::create('/islamic-date-today', 'GET');
$response3 = $kernel->handle($request3);

echo "Status Code for /islamic-date-today: " . $response3->getStatusCode() . "\n";

$kernel->terminate($request, $response);
