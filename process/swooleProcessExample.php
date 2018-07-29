<?php

//创建进程异步处理任务的实例


$urls=[
	  'http://baidu.com',
	  'http://sina.com.cn',
	  'http://qq,com',
	  'http://baidu.com?seach=singwa',
	  'http://baidu.com?seach=singwa2',
	  'http://baidu.com?seach=imooc',
];

//sync
// foreach($urls as $url){
// 	  $content[]=file_get_contents($url);
// }

//async  开启6个子进程

$works=[];
for($i=0;$i<6;$i++){
	     $process=new swoole_process(function(swoole_process $worker)use($i,$urls){
	     		//curl
	     $content=curlData($urls[$i]);
	     // echo $content.PHP_EOL;
	     //写入数据到管道当中
	     $worker->write($content);
	     },true);
	     $pid=$process->start();
	     $works[$pid]=$process;

}

foreach($works as $process){
	 echo $process->read();
}

//模拟请求耗时1秒
function curlData($url){
	//curl
	sleep(1);

	return $url."sucess".PHP_EOL;
}