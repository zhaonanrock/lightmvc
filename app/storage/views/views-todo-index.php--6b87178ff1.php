<?php
// source: D:\phpStudy\mysite\app/views/todo/index.latte

use Latte\Runtime as LR;

class Template6b87178ff1 extends Latte\Runtime\Template
{

	function main()
	{
		extract($this->params);
		
		/**
		* Created by PhpStorm.
		* User: zhaon
		* Date: 2017/6/10
		* Time: 15:42
		*/
		echo "eee";
		foreach ($todos as $todo)
		{
			echo 'Title:',$todo['title'],'Status:',$todo['status'];
		}<?php return get_defined_vars();
	}

}
