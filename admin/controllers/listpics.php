<?php
/**
 * @copyright   Copyright (C) 2016 Open Source Matters, Inc. All rights reserved. ( https://trangell.com )
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @subpackage  com_MiniUniversity
 */
defined('_JEXEC') or die('Restricted access');

class SnakesmsControllerListpics extends JControllerAdmin {
	public function getModel($name = 'listpic', $prefix = 'SnakesmsModel', $config = array('ignore_request' => true))
	{
		$model = parent::getModel($name, $prefix, $config);

		return $model;
	}

	public function csv2() {
		JSession::checkToken( 'post' ) or die( 'Invalid Token' );
		$model = $this->getModel('listpics');
		$allusers = $model->allusers();
		$app = JFactory::getApplication();
		$link = "index.php?option=com_snakesms";
		$jinput = JFactory::getApplication()->input;
		$sms = $jinput->post->getString('sms', '');
		if (empty($sms)) {
			$app->redirect(JRoute::_($link), "برای ارسال پیامک نیاز به یک پیغام دارید لطفا کادر زیر را پر کنید", $msgType='Error'); 
			$app->close();	
		}
		ini_set("soap.wsdl_cache_enabled", "0");
		  try {
			$client = new SoapClient("http://87.107.121.54/post/send.asmx?wsdl");
		    	$parameters['username'] = "khatoghalam";
		    	$parameters['password'] = "Ali@1654";
		    	$parameters['from'] = "50001000600061";
		    	$parameters['to'] = $allusers;
		    	$parameters['text'] =iconv("UTF-8", 'UTF-8//TRANSLIT',"{$sms}");
		    	$parameters['isflash'] = true;
		    	$parameters['udh'] = "";
		    	$parameters['recId'] = array(0);
		    	$parameters['status'] = 0x0;
			$getcreditresultintval = intval($client->GetCredit(array("username"=>"khatoghalam","password"=>"Ali@1654"))->GetCreditResult);
			echo $client->SendSms($parameters)->SendSmsResult;
			$app->redirect(JRoute::_($link), "مبلغ باقی مانده از حساب شما {$getcreditresultintval} می باشد", $msgType='Error'); 
			$app->close();	
		 } catch (SoapFault $ex) {
		    	echo $ex->faultstring;
		}
	}
}
