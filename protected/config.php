<?php 
date_default_timezone_set('PRC'); 
define('I', '/i');
session_start();
/*
$config = array(
	'rewrite' => array(
		'admin/index.html' => 'admin/main/index',
		'admin/<c>_<a>.html'    => 'admin/<c>/<a>', 
        	'<m>/<c>/<a>'          => '<m>/<c>/<a>',
		'<c>/<a>'          => '<c>/<a>',
		'/'                => 'main/index',
	),
);  */

return array( // 调试配置
		'debug' => 1,
		'mysql' => array(

				'MYSQL_HOST' => 'localhost',
				'MYSQL_PORT' => '3306',
				'MYSQL_USER' => 'shenqing',
				'MYSQL_DB'   => 'shenqing',
				'MYSQL_PASS' => '986532741',
				'MYSQL_CHARSET' => 'utf8',

		));
