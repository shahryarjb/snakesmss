<?php
/**
 * @copyright   Copyright (C) 2016 Open Source Matters, Inc. All rights reserved. ( https://trangell.com )
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @subpackage  com_MiniUniversity
 */
defined('_JEXEC') or die('Restricted access');

class SnakesmsControllerSender extends JControllerAdmin {
	public function getModel($name = 'sender', $prefix = 'SnakesmsModel', $config = array('ignore_request' => true))
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

    		$length = strlen(utf8_decode($sms) );
    		$count = 0;
    		$rtl_chars_pattern = '/[\x{0590}-\x{05ff}\x{0600}-\x{06ff}]/u';
		if(preg_match($rtl_chars_pattern, $sms)) {

			        if($length <= 70) {
			            $count = 1;
			        }else if($length > 70 && $length < 134) {
			             $count = 2;
			        }else if ($length > 134 && $length < 201) {
			             $count = 3;
			        }else if ($length > 201 && $length < 268) {
			             $count = 4;
			        }else if ($length > 268 && $length < 335) {
			             $count = 5;
			        }else if ($length > 335 && $length < 402) {
			             $count = 6;
			        }else if ($length > 402 && $length < 469) {
			             $count = 7;
			        }else if ($length > 469 && $length < 536) {
			             $count = 8;
			        }
			}else {

			        if($length <= 160) {
			             $count = 1;
			        }else if($length > 160 && $length < 306) {
			             $count = 2;
			        }else if ($length > 306 && $length < 459) {
			             $count = 3;
			        }else if ($length > 459 && $length < 612) {
			             $count = 4;
			        }else if ($length > 612 && $length < 765) {
			             $count = 5;
			        }else if ($length > 765 && $length < 918) {
			             $count = 6;
			        }
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
			$client->SendSms($parameters)->SendSmsResult;
			$db = JFactory::getDbo();
			$query	= $db->getQuery(true);
			$query->clear();
			$query->insert($db->quoteName('#__trangell_sms_logs'));
			$query->set($db->qn('count').' = '.$db->q(count($allusers)));
			$query->set($db->qn('smsnumb').' = '.$db->q(intval($count)));		
			$db->setQuery((string)$query);
			$db->execute();
			
			$app->redirect(JRoute::_($link), "مبلغ باقی مانده از حساب شما {$getcreditresultintval} می باشد. تعداد واحد پیامک : {$count}", $msgType='Error'); 
			$app->close();	
		 } catch (SoapFault $ex) {
		    	echo $ex->faultstring;
		}
	}
}
