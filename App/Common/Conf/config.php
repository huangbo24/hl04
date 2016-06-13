<?php
return array(
	//'配置项'=>'配置值'
	
		// 默认控制器名称
		'DEFAULT_CONTROLLER'    =>  'Index',
		// 默认操作名称
		'DEFAULT_ACTION'        =>  'index',
		
		
		/* 数据库设置 */
		'DB_TYPE'     => 'mysql',     // 数据库类型
		'DB_HOST'     => '192.168.2.200', // 服务器地址
		'DB_NAME'     => 'hb00001',   // 数据库名
		'DB_USER'     => 'huangbo',      // 用户名
		'DB_PWD'      => 'bo456123',          // 密码
		'DB_PORT'     => '3306',          // 端口
		'DB_PREFIX'   => 'mm_',       // 数据库表前缀

		//使用的模板引擎名
		'TMPL_ENGINE_TYPE'     => 'Smarty',
		
		// 默认false 表示URL区分大小写 true则表示不区分大小写
		'URL_CASE_INSENSITIVE'  => false,
		
		//开启错误跟踪
		//SHOW_PAGE_TRACE=> true,
		
		
		// 显示错误信息		
		//'SHOW_ERROR_MSG'   =>  true,  
		
);