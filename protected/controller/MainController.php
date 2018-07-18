<?php
class MainController extends Controller{
	 
	function init(){
		 
	}

    function actionIndex()
	{
		
	}	
	function  addFail($key,$msg)
	{
		echo json_encode(array('result'=>0,'msg'=>$msg,'key'=>$key));
		exit;
	}
	
	var $depositList=array('1000以上','3000元以上','5000元以上','1万元以上','5万元以上','10万元以上');
	function actionAdd()
	{
		 header('Content-type: application/json'); 
		$username=arg('username');
		$phone=arg('phone');
		$vcode=arg('vcode');
		$deposit=arg('deposit');
		if($username==''||strlen($username)>20)
		{
			$this->addFail('username','请输入正确用户名');
		}
		if(!preg_match("/^1[34578]\d{9}$/", $phone) )
		{
			$this->addFail('phone','请输入正确手机号');
		}
		if($username==''||strlen($username)>20)
		{
			$this->addFail('username','请输入正确用户名');
		}
		if($deposit==''||$deposit<0||$deposit>(count($this->depositList)-1))
		{
			$this->addFail('deposit','请选择存款金额');
		}
		$deposit=$this->depositList[$deposit];
		
		$tab=new model('sq_vcode');
		//10分钟内的最后一条短信
		$row=$tab->find(array('phone'=>$phone,'vcode'=>$vcode));
		if(!$row)
		{
			$this->addFail('vcode','验证码错误');
		}
		if(strtotime($row['created'].' +10 minute')<time())
		{
			$this->addFail('vcode','验证码超时');
		}
		
		$tab=new model('sq_list');
		if($tab->findCount(array('phone'=>$phone))>0)
		{
			$this->addFail('phone','手机号已申请');
		}
		if($tab->findCount(array('username'=>$username))>0)
		{
			$this->addFail('username','该帐号已经申请');
		}
		$tab->create(array('username'=>$username,'phone'=>$phone,'deposit'=>$deposit));
		echo json_encode(array('result'=>1,'msg'=>'申请成功'));
	}
	function actionSendvcode()
	{
		header('Content-type: application/json'); 
		$phone=arg('phone');
		
		$tab=new model('sq_list');
		if($tab->findCount(array('phone'=>$phone))>0)
		{
			$this->_returnFail('手机号已存在'); 
		}
		 
		$tab=new model('sq_vcode');
		$ip=$_SERVER['REMOTE_ADDR'];
		
		if(!preg_match("/^1[34578]\d{9}$/", $phone)){
			$this->_returnFail('手机号不正确');
		}
		//10分钟四条短信,则不再发送
		//1小时10条 ,则不再发送
		$created=strtotime('Y-m-d H:i:s',strtotime('-10 minute'));
		if($tab->findCount(array('(ip=:ip OR phone=:phone) AND created>:created',':ip'=>$ip,':phone'=>$phone,':created'=>$created))>5)
		{
			$this->_returnFail('发送验证码太频繁1!');
		}
		$created=strtotime('Y-m-d H:i:s',strtotime('-1 hour'));
		if($tab->findCount(array('(ip=:ip OR phone=:phone) AND created>:created',':ip'=>$ip,':phone'=>$phone,':created'=>$created))>10)
		{
			$this->_returnFail('发送验证码太频繁2!');
		}
		$vcode=mt_rand(100000,999999);
		$tab->create(array('phone'=>$phone,'ip'=>$ip,'vcode'=>$vcode));
		$conf=new T_web_config();
		$content=$conf->data('vcode_msg');
		$content=str_replace('$vcode',$vcode,$content); 
		$content=urlencode($content);
		
		$incid=$conf->data('incid');
		//发送短信的地方删掉 
		
		 
		echo json_encode(array('result'=>1,'msg'=>'发送成功'));
	}
	function _returnFail($msg)
	{
		echo json_encode(array('result'=>0,'msg'=>$msg));
		exit;
	}
} 