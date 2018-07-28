<?php
// connect tcp server
$client = new swoole_client(SWOOLE_SOCK_TCP);

if (!$client->connect("127.0.0.1", 9501)) {
	echo "connect fail";
	exit;
}

//php cli const
fwrite(STDOUT, "plase input you message");
$msg = trim(fgets(STDIN));

//send message tcp server
$client->send("$msg");

$result = $client->recv();
echo $result;
