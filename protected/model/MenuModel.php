<?php
class MenuModel {
	
	function getMenu()
	{
		//暂时二级菜单
		return array(
					array(
						'id'=>'main',
						'title'=>'首页',
						'icon'=>'icon-home',
						'url'=>url('admin/main','index'), 
						'sub'=>null 
					),
					array(
						'id'=>'systemconfig',
						'title'=>'系统配置',
						'icon'=>'icon-settings',
						'url'=>'javascript:;', 
						'sub'=>array(
							array(
								'id'=>'chatconfig',
								'title'=>'网站配置',
								'icon'=>'icon-settings',
								'url'=>url('admin/webconfig','index'),
							),
						) 
					),
				);
	}
}