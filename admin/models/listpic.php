<?php
/**
 * @copyright   Copyright (C) 2016 Open Source Matters, Inc. All rights reserved. ( https://trangell.com )
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @subpackage  com_MiniUniversity
 */
defined('_JEXEC') or die('Restricted access');

class SnakesmsModelListpic extends JModelAdmin
{

	public function getTable($type = 'listpic', $prefix = 'SnakesmsTable', $config = array())
	{
		return JTable::getInstance($type, $prefix, $config);
	}

	public function getForm($data = array(), $loadData = true)
	{
		$form = $this->loadForm(
			'com_snakesms.listpic',
			'listpic',
			array(
				'control' => 'jform',
				'load_data' => $loadData
			)
		);

		if (empty($form))
		{
			return false;
		}

		return $form;
	}

	public function getScript() 
	{
		return 'administrator/components/com_snakesms/models/forms/listpic.js';
	}

	protected function loadFormData()
	{
		$data = JFactory::getApplication()->getUserState(
			'com_snakesms.edit.listpic.data',
			array()
		);

		if (empty($data)) {
			$data = $this->getItem();
		}

		// if($data->cat_id){
		// $data->cat_id = explode(',', $data->cat_id);
		// }
		return $data;
	}

	protected function canDelete($record) {
		if( !empty( $record->id ) ) {
			return JFactory::getUser()->authorise( "core.delete", "com_snakesms.message." . $record->id );
		}
	}
}
