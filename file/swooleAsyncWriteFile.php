<?php

$content = date('Y-m-d H:i:s') . PHP_EOL;

swoole_async_writefile(__DIR__ . "/demo1.txt", $content, function ($filename) {
	echo "success" . PHP_EOL;

	echo "filename:" . $filename . PHP_EOL;
}, FILE_APPEND);

echo "start" . PHP_EOL;