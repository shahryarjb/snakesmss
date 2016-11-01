<?php
/**
 * @copyright   Copyright (C) 2016 Open Source Matters, Inc. All rights reserved. ( https://trangell.com )
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @subpackage  com_TinyPayment
 */
defined('_JEXEC') or die('Restricted access');


class SnakesmsModelSnakesmss extends JModelList
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

	function test(){
		echo "goz";
	}

	protected function getListQuery() {
		$db    = JFactory::getDbo();
		$query = $db->getQuery(true);

		$query->select('*')
			  ->from($db->quoteName('#__trangell_sms'));

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
}
