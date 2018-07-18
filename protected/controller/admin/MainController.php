<?php
class MainController extends BaseController{ 
	 
	function actionIndex()
	{
		$keyword=arg('keyword','');
		$this->keyword=$keyword;
		$page = (int)arg("p", 1);
		
		$tab=new model('sq_list');
		
		$where=null;
		if($keyword)
		{
			$where=array("username LIKE :keyword or phone LIKE :keyword ",':keyword'=>"%{$keyword}%");
		}
		
		$this->rows = $tab->findAll($where, "state,id DESC", "*", array($page, 10));
		$this->pager= $tab->page;
	}
	function actionSet()
	{
		$id=arg('id');
		$state=arg('state');
		$tab=new model('sq_list');
		$tab->update(array('id'=>$id),array('state'=>$state));
	}
   
} 