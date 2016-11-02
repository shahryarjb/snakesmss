<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_miniuniversity
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access
defined('_JEXEC') or die('Restricted access');
JHtml::_('behavior.formvalidation');
?>
<form action="<?php echo JRoute::_('index.php?option=com_snakesms&layout=edit&id=' . (int) $this->item->id); ?>"
    method="post" name="adminForm" id="adminForm" class="form-validate">
    <div class="form-horizontal">
				<div class="row-fluid">
					<div class="span12">
							<div class="control-group">
							<?php echo $this->form->getInput('id'); ?>
								<div class="control-label"> <?php echo $this->form->getLabel('name'); ?></div>
								<div class="controls"><?php echo $this->form->getInput('name'); ?></div>
							</div>
							<!--  -->
							<div class="control-group">
								<div class="control-label"> <?php echo $this->form->getLabel('mobile'); ?></div>
								<div class="controls"><?php echo $this->form->getInput('mobile'); ?></div>
							</div>
					</div>
				</div>
	</div>

	<input type="hidden" name="task" value="listpic.edit" />
	<?php echo JHtml::_('form.token'); ?>
</form>
