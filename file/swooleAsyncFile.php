<?php

/**
 *  Async read file
 */

$result = swoole_async_readfile(__DIR__ . "/demo.txt", function ($filename, $fileContent) {
	echo "filename:" . $filename . PHP_EOL;

	echo "fileContent:" . $fileContent . PHP_EOL;
});

var_dump($result);
echo "start" . PHP_EOL;