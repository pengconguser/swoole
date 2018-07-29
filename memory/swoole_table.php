<?php

/*

 自旋锁实现内存表.
*/

 $table=new swoole_table(1024);

 //内存表增加一行
 $table->column('id',$table::TYPE_INT,4);
 $table->column('name',$table::TYPE_STRING,64);
 $table->column('age',$table::TYPE_INT,3);
 $table->create();


 $table->set('peng_cong',['id'=>1,'name'=>'peng','age'=>24]);

 //第二种设置的方式
 $table['pengcong_2']=[
 	  'id'=>2,
 	  'name'=>'pengcong_2',
 	  'age'=>31
 ];

 var_dump($table->get('peng_cong'));
 var_dump($table->get('pengcong_2'));


 //删除
 $table->del('pengcong_2');

var_dump($table->get('pengcong_2'));