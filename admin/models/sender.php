<?php
/**
 * @copyright   Copyright (C) 2016 Open Source Matters, Inc. All rights reserved. ( https://trangell.com )
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @subpackage  com_MiniUniversity
 */
defined('_JEXEC') or die('Restricted access');

class SnakesmsModelSender extends JModelList
{

	public function __construct($config = array())
	{
		if (empty($config['filter_fields']))
		{
			$config['filter_fields'] = array(
				'id'
			);
		}

		parent::__construct($config);
	}

	protected function getListQuery()
	{
		$db    = JFactory::getDbo();
		$query = $db->getQuery(true);
		$query->select('*')
				  ->from('#__trangell_sms_logs');
		$search = $this->getState('filter.search');
		if (!empty($search))
		{
			$like = $db->quote('%' . $search . '%');
			$query->where('name LIKE ' . $like);
		}
		$orderCol	= $this->state->get('list.ordering', 'id');
		$orderDirn 	= $this->state->get('list.direction', 'asc');

		$query->order($db->escape($orderCol) . ' ' . $db->escape($orderDirn));
		return $query;

	 }

	function allusers() {
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		$query->select('mobile');
		$query->from($db->quoteName('#__trangell_sms'));
		$db->setQuery($query);
		$column= $db->loadColumn();
		$b = '"' . implode('","',$column)  . '"';
		$c = explode(",", $b);
		return $c;
	 }

	 function price(){
	 	ini_set("soap.wsdl_cache_enabled", "0");
		  try {
			$client = new SoapClient("http://87.107.121.54/post/send.asmx?wsdl");
			$getcreditresultintval = intval($client->GetCredit(array("username"=>"khatoghalam","password"=>"Ali@1654"))->GetCreditResult);
			echo $getcreditresultintval;
		 } catch (SoapFault $ex) {
		    	echo $ex->faultstring;
		    }
		
	 }
}
?>
