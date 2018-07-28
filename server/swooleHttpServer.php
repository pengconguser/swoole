<?php

/**
 *
 *
 */

$http = new swoole_http_server("0.0.0.0", 8811);

$http->on('request', function ($request, $response) {
	$message = json_encode($request->get);
	$response->end("<h1>$message</h1>");
});

$http->start();