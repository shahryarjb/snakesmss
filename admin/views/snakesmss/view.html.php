<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_TinyPayment
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

/**
 * Teachers View
 *
 * @since  0.0.1
 */
class SnakesmsViewSnakesmss extends JViewLegacy
{
	/**
	 * Display the TinyPayment view
	 *
	 * @param   string  $tpl  The name of the template file to parse; automatically searches through the template paths.
	 *
	 * @return  void
	 */
	function display($tpl = null)
	{
		
		// Get application
		$app = JFactory::getApplication();
		$context = "snakesms.list.admin.snakesms";
		// Get data from the model
		$this->items		= $this->get('Items');
		$this->pagination	= $this->get('Pagination');
		$this->state		= $this->get('State');
		$this->filter_order	= $app->getUserStateFromRequest($context.'filter_order', 'filter_order', 'greeting', 'cmd');
		$this->filter_order_Dir = $app->getUserStateFromRequest($context.'filter_order_Dir', 'filter_order_Dir', 'asc', 'cmd');
		$this->filterForm    	= $this->get('FilterForm');
		$this->activeFilters 	= $this->get('ActiveFilters');

		// What Access Permissions does this user have? What can (s)he do?
		$this->canDo = SnakesmsHelper::getActions();

		// Check for errors.
		if (count($errors = $this->get('Errors')))
		{
			JError::raiseError(500, implode('<br />', $errors));

			return false;
		}

		// Set the submenu
		// TinyPaymentHelper::addSubmenu('tinypayments');

		// Set the toolbar and number of found items
		$this->addToolBar();

		// Display the template
		parent::display($tpl);

		// Set the document
		$this->setDocument();
	}

	/**
	 * Add the page title and toolbar.
	 *
	 * @return  void
	 *
	 * @since   1.6
	 */
	protected function addToolBar()
	{
		$title = JText::_('ذخیره پرداخت ها');

		
		//  if ($this->pagination->total)
		// {
		// 	$title .= "<span style='font-size: 0.5em; vertical-align: middle;'>(" . $this->pagination->total . ")</span>";
		// }
		

		JToolBarHelper::title($title, 'snakesms');

		if ($this->canDo->get('core.create')) 
		{
			JToolBarHelper::addNew('snakesms.add', 'JTOOLBAR_NEW');
		}
		if ($this->canDo->get('core.edit')) 
		{
			JToolBarHelper::editList('snakesms.edit', 'JTOOLBAR_EDIT');
		}
		if ($this->canDo->get('core.delete')) 
		{
			JToolBarHelper::deleteList('', 'snakesmss.delete', 'JTOOLBAR_DELETE');
		}
		if ($this->canDo->get('core.admin')) 
		{
			JToolBarHelper::divider();
			JToolBarHelper::preferences('com_snakesms');
		}
	}
	/**
	 * Method to set up the document properties
	 *
	 * @return void
	 */
	protected function setDocument() 
	{
		$document = JFactory::getDocument();
		$document->setTitle(JText::_('صفحه ذخیره پرداخت ها'));
	}
}
