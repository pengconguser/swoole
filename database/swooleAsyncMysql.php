<?php

$db = new swoole_mysql;

$server = [
	'host' => '127.0.0.1',
	'port' => 3306,
	'user' => 'root',
	'password' => 'localdb001',
	'database' => 'demo',
	'charset' => 'utf8', //指定字符集
	'timeout' => 2, // 可选：连接超时时间（非查询超时时间），默认为SW_MYSQL_CONNECT_TIMEOUT（1.0）
];

$db->connect($server, function ($db, $response) {
	if ($response === false) {
		var_dump($db->connect_errno, $db->connect_error);
		die;
	}

	$sql = 'show tables';
	$db->query($sql, function (swoole_mysql $db, $response) {
		if ($response === false) {
			var_dump($db->error, $db->errno);
		} elseif (!empty($response)) {
			var_dump($db->affected_rows, $db->insert_id);
		}
		var_dump($response);
		$db->close();
	});
});
