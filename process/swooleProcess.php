<?php

/*
  php swoole创建进程
 
*/

  $process=new swoole_process(function(swoole_process $process){
  		  //todo something 子进程处理
  		  // echo "process";
  		  $process->exec("/usr/bin/php",[__DIR__.'/../server/swooleHttpServer.php']);//执行外部程序
  },false);

  //启动子进程 输出子进程pid
  $pid=$process->start();
  echo $pid.PHP_EOL;

  //结束时自动回收子进程
  swoole_process::wait();
