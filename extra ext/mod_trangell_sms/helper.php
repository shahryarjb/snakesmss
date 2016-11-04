<?php
 defined('_JEXEC') or die; 
/**
 * @package     Joomla.Site module
 * @subpackage  mod_trangell_sms
 * @author      trangell team https://trangell.com
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
class modTRANGELLsms {

        private function getlikeMobilenumber($numbers){
            //private function for  (cheak mobile number in the db)
            $db     = JFactory::getDbo();
            $query  = $db->getQuery(true);
            $query->select('*');
            $query->from($db->qn('#__trangell_sms'));
            $query->where($db->qn('mobile')." = ".$db->q($numbers));
            $db->setQuery($query);
            $count  = $db->loadRow();
            return($count);
        }//end private function

   function getPostData() {
       $jinput  = JFactory::getApplication()->input;
       $app     = JFactory::getApplication();

       $name    = $jinput->post->getString('name', '');
       $mobile  = $jinput->post->getString('mobile', '');

       if(!empty($name) AND !empty($mobile)){ //cheak empty $var
            if(!is_numeric($mobile) == 1 || strlen($mobile) != 11){ // cheak numeric char for mobile
                    $app->redirect(JURI::root(), 'لطفا از کاراکتر های عددی برای وارد کردن شماره موبایل استفاده کنید.شماره موبایل شما باید ۱۱ رقم باشد.', $msgType='Error');
                    return false; 
            }
            // cheak mobile in db if empty == true
            if(empty($this->getlikeMobilenumber($mobile))){
                echo $name . "<br>" . $mobile;
                $db		= JFactory::getDbo();
		        $query	= $db->getQuery(true);
        		$query->clear();
                $query->insert($db->quoteName('#__trangell_sms'));
									$query->set($db->qn('name').' = '.$db->q($name));
									$query->set($db->qn('mobile').' = '.$db->q($mobile));	
									$db->setQuery((string)$query);
                                    $db->execute();
                //suc message == save db                 
                $app->redirect(JURI::root(), 'شماره شما ثبت شد.', $msgType='message');       
            }else{
                //repeat mobile number != save db
                $app->redirect(JURI::root(), 'شماره ای که وارد کردید در سایت ثبت شده است.', $msgType='Error');
                return false; 
            }
        }
   }// end function getPostData
   
}//end class
?>