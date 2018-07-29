<?php

/**
*  Created by stack
*  User:peng
*  Date:2018-3-13
*/


$redisClient=new swoole_redis;//Swoole\Redis
$redisClient->connect('127.0.0.1',6379,function(swoole_redis $redisClient,$result){
		  echo "connect".PHP_EOL;
		  var_dump($result.PHP_EOL);

		  //同步redis  (new Redis())->set('key',2);
		  $redisClient->set('shuaiqi',time(),function(swoole_redis $redisClient,$result){
		  	  var_dump($result.PHP_EOL);
		  });

		  //异步读取
		  $redisClient->get('shuaiqi',function(swoole_redis $redisClient,$result){
		  		var_dump($result);
		  });

		  //执行完毕关闭redis连接
		  $redisClient->close();
});

echo "start".PHP_EOL;