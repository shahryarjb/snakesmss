<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_backpic
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted Access');

JHtml::_('formbehavior.chosen', 'select');

$listOrder     = $this->escape($this->filter_order);
$listDirn      = $this->escape($this->filter_order_Dir);
echo "</br>";
?>
<form action="index.php?option=com_snakesms&view=listpics" method="post" id="adminForm" name="adminForm">
	<div class="row-fluid">
		<div class="span6">

		<!---- cod search va  ..... khode joomla  -->
			<?php echo JText::_('COM_BACKPIC_TEACHERS_FILTER'); ?>
			<?php
				echo JLayoutHelper::render(
					'joomla.searchtools.default',
					array('view' => $this)
				);
			?>
		<!---- cod search va  ..... khode joomla  -->
		</div>
	</div>
	<table class="table table-striped table-hover">
		<thead>
		<tr>
		<!---- header balaye filde -->
			<th width="1%"><?php echo JText::_('COM_BACKPIC_NUM'); ?></th>
			<th width="2%">
				<?php echo JHtml::_('grid.checkall'); ?>
			</th>
			<th width="20%">
				<?php echo JHtml::_('grid.sort', 'COM_BACKPIC_TEACHERS_NAME', 'name', $listDirn, $listOrder); ?>
			</th>
			<th width="70%">
				<?php echo JHtml::_('grid.sort','' , 'disctich', $listDirn, $listOrder); ?>
			</th>
			<th width="5%">
				<?php echo JHtml::_('grid.sort', 'COM_BACKPIC_PUBLISHED', 'published', $listDirn, $listOrder); ?>
			</th>
			<th width="2%">
				<?php echo JHtml::_('grid.sort', 'COM_BACKPIC_ID', 'id', $listDirn, $listOrder); ?>
			</th>
		<!---- header balaye filde -->
		</tr>
		</thead>
		<tfoot>
			<tr>
				<td colspan="5">
					<?php echo $this->pagination->getListFooter(); ?>
				</td>
			</tr>
		</tfoot>
		<tbody>
			<?php if (!empty($this->items)) : ?>
				<?php foreach ($this->items as $i => $row) :
					$link = JRoute::_('index.php?option=com_snakesms&task=listpic.edit&id=' . $row->id);
				?>
					<tr>
						<td><?php echo $this->pagination->getRowOffset($i); ?></td>
						<td>
							<?php echo JHtml::_('grid.id', $i, $row->id); ?>
						</td>
						<td>
							<a href="<?php echo $link; ?>" title="<?php echo JText::_('COM_BACKPIC_EDIT_TEACHER'); ?>">
		<?php echo $row->name; ?>
							</a>
						</td>
						<td>

						</td>
						<td align="center">
							<?php echo $row->mobile; ?>
						</td>
						<td align="center">
							<?php echo $row->id; ?>
						</td>
					</tr>
				<?php endforeach; ?>
			<?php endif; ?>
		</tbody>
	</table>
	<input type="hidden" name="task" value=""/>
	<input type="hidden" name="boxchecked" value="0"/>
	<input type="hidden" name="filter_order" value="<?php echo $listOrder; ?>"/>
	<input type="hidden" name="filter_order_Dir" value="<?php echo $listDirn; ?>"/>
	<?php echo JHtml::_('form.token'); ?>
</form>

