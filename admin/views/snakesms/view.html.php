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
 * Teacher View
 *
 * @since  0.0.1
 */
class SnakesmsViewSnakesms extends JViewLegacy
{
	protected $form;
	protected $item;
	protected $script;
	protected $canDo;

	/**
	 * Display the Hello World view
	 *
	 * @param   string  $tpl  The name of the template file to parse; automatically searches through the template paths.
	 *
	 * @return  void
	 */
	public function display($tpl = null)
	{
		// Get the Data
		$this->form = $this->get('Form');
		$this->item = $this->get('Item');
		$this->script = $this->get('Script');

		// What Access Permissions does this user have? What can (s)he do?
		$this->canDo = snakesmsHelper::getActions($this->item->id);

		// Check for errors.
		if (count($errors = $this->get('Errors')))
		{
			JError::raiseError(500, implode('<br />', $errors));

			return false;
		}

		// Set the toolbar
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
		$input = JFactory::getApplication()->input;

		// Hide Joomla Administrator Main menu
		$input->set('hidemainmenu', true);

		$isNew = ($this->item->id == 0);

		JToolBarHelper::title($isNew ? JText::_('COM_MINIUNIVERSITY_MANAGER_TEACHER_NEW')
		                             : JText::_('صفحه نمایش فاکتور'), 'tinypayment');
		// Build the actions for new and existing records.
		if ($isNew)
		{
			// For new records, check the create permission.
			if ($this->canDo->get('core.create')) 
			{
				JToolBarHelper::apply('snakesms.apply', 'JTOOLBAR_APPLY');
				JToolBarHelper::save('snakesms.save', 'JTOOLBAR_SAVE');
				
			}
			JToolBarHelper::cancel('snakesms.cancel', 'JTOOLBAR_CANCEL');
		}
		else
		{
			if ($this->canDo->get('core.edit'))
			{
				// We can save the new record
				JToolBarHelper::apply('snakesms.apply', 'JTOOLBAR_APPLY');
				JToolBarHelper::save('snakesms.save', 'JTOOLBAR_SAVE');
 
			}
		
			JToolBarHelper::cancel('snakesms.cancel', 'JTOOLBAR_CLOSE');
		}
		
	}
	/**
	 * Method to set up the document properties
	 *
	 * @return void
	 */
	protected function setDocument() 
	{
		$isNew = ($this->item->id == 0);
		$document = JFactory::getDocument();
		$document->setTitle($isNew ? JText::_('COM_MINIUNIVERSITY_TEACHER_CREATING')
		                           : JText::_('نمایش اطلاعات فاکتور کاربر'));
		$document->addScript(JURI::root() . $this->script);
		
		JText::script('COM_MINIUNIVERSITY_TEACHER_ERROR_UNACCEPTABLE');
	}
}
