<?php
/**
 * @copyright   Copyright (C) 2016 Open Source Matters, Inc. All rights reserved. ( https://trangell.com )
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @subpackage  com_BackPic
 */
defined('_JEXEC') or die('Restricted access');

abstract class SnakesmsHelper {

	public static function addSubmenu($submenu) 
	{

		JSubMenuHelper::addEntry(
			'<i class="fa fa-angle-double-left"></i>' . JText::_("COM_BACKPIC_ADMIN_PANEL_HOME"),
			'index.php?option=com_snakesms',
			$submenu == 'home'
		);

		$document = JFactory::getDocument();
		$document->addStyleDeclaration('.icon-48-backpic ' .
		                               '{background-image: url(../media/com_snakesms/images/tux-48x48.png);}');
		if ($submenu == 'categories') 
		{
			$document->setTitle(JText::_('COM_BACKPIC_ADMINISTRATION_CATEGORIES'));
		}
	}

	public static function getActions($messageId = 0) {	
		$result	= new JObject;

		if (empty($messageId)) {
			$assetName = 'com_snakesms';
		}
		else {
			$assetName = 'com_snakesms.message.'.(int) $messageId;
		}

		$actions = JAccess::getActions('com_snakesms', 'component');

		foreach ($actions as $action) {
			$result->set($action->name, JFactory::getUser()->authorise($action->name, $assetName));
		}

		return $result;
	}
}
