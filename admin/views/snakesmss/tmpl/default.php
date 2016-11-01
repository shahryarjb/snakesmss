<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_miniuniversity
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted Access');
JHtml::stylesheet(JURI::root().'components/com_tinypayment/ui/dist/css/customadmin.css');
JHtml::stylesheet(JURI::root().'components/com_tinypayment/ui/dist/css/custom.css');
JHtml::stylesheet('https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css');

JHtml::_('formbehavior.chosen', 'select');
$user = JFactory::getUser();

$model = $this->getModel('snakesmss');

?>
<div class="container-fluid">
  <div class="row-fluid">
    <div class="span12">
    <div class="row-fluid">
    <div class="span3 mainsid">
      <div class="span12 logo-admin">

            <a href="index.php?option=com_khatoghalam_racing&view=userinfo&layout=userinfo">
                      <img src="http://localhost:8888/mina/admin.jpg" class="img-circle admin-students-circle" alt="User Image" style="box-shadow: 1px 1px 1px #dadada;">
             </a>
              <div class="clearfix"></div>
              <div class="row-fluid margin"></div>
              <div class="text-back-top">
 	<?php if (!$user->guest) {  
                echo htmlspecialchars($user->name, ENT_COMPAT, 'UTF-8');
              } ?>
              </div>

      </div>

<!--  <div class="span12"> -->
  <div class="row-fluid">
      <ul class="sidbarsICo">
      <!-- <div class="margin"></div> -->
 <li class="lisidbars">
					<a href="index.php?option=com_tinypayment&view=storepayments">
					  <i class="fa fa-home" aria-hidden="true"></i>
             ذخیره پرداخت ها
					</a>
				</li>


 <li class="lisidbars">
					<a href="index.php?option=com_tinypayment&view=outputs">
					  <i class="fa fa-file-text-o" aria-hidden="true"></i>
             دریافت خروجی
					</a>
				</li>

 <li class="lisidbars">
          <a href="index.php?option=com_tinypayment&view=statistics">
            <i class="fa fa-balance-scale" aria-hidden="true"></i>
           آمار
          </a>
        </li>

 <li class="lisidbars">
	<a href="index.php?option=com_tinypayment&view=guide">
					  <i class="fa fa-diamond" aria-hidden="true"></i>
             راهنما
					</a>
				</li>
      <div class="clearfix"></div>
      </ul>
      <!-- </div> -->
      </div>
    </div><!-- sidbar -->

    <div class="span9 intab">
      <div class="row-fluid">
        <!-- <div class="span12">
          <div class="callout callout-info">
          <h4><i class="fa fa-info"></i> توجه:</h4>
مدیریت محترم توجه داشته باشید از زمان ثبت این ترانکش  ۱۲ ساعت ۲۲ دقیقه  می میگذرد و آخرین ویرایش شما  در تاریخ ۱۱/۲/۱۳۹۵ بوده است.
          </div>
        </div>
      </div> -->
      <div class="clearfix"></div>


<div class="clearfix"></div>
      <div class="row-fluid margin">
        <div class="span12">
          <div class="row-fluid">
            <div class="span4 borders a1">
              <h3>تعداد کل تراکنش ها</h3>
              <i class="fa fa-file-text-o"></i> 
3
            </div>
            <div class="span4 borders a2">
              <h3>تراکنشات ناموفق</h3>
              <i class="fa fa-flask"></i>
             2
            </div>
            <div class="span4 borders a3">
              <h3>تراکنشات موفق</h3>
              <i class="fa fa-diamond"></i>
               3
            </div>
          </div>
            <div class="clearfix"></div>
            <div class="margin"></div>
            <div class="clearfix"></div>

<form action="index.php?option=com_snakesms&view=snakesmss" method="post" id="adminForm" name="adminForm">
<div class="span6">
			<?php echo JText::_('جستجوی فاکتور'); ?>
			<?php
				// echo JLayoutHelper::render(
				// 	'joomla.searchtools.default',
				// 	array('view' => $this)
				// );
			?>
		</div>
</form>




      <div class="clearfix"></div>
      <div class="row-fluid margin">
        <div class="span12">

            <div class="clearfix"></div>
            <div class="margin"></div>
            <div class="clearfix"></div>
            <div class="row-fluid margin">
              <div class="span12 scrolled">
                <!-- start span12 info boards -->
                    <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-file-text-o"></i>جدول اطلاعات پرداخت</h3>
              <form action="index.php?option=com_snakesms&view=snakesmss" method="post" id="adminForm" name="adminForm">
		<?php if (!empty($this->items)) : ?>
			
				<div class="row-fluid">
				<div class="span12">
				<div class="box-body table-responsive no-padding">
                            <table class="table table-hover">
                              <tbody>
								<tr>
									<th> <?php echo JHtml::_('grid.checkall'); ?></th>
									<th>ردیف</th>
									<th>عنوان پرداخت</th>
									<th>مبلغ (ریال)</th>
								</tr>
								<?php foreach ($this->items as $i => $row) :
				$link = JRoute::_('index.php?option=com_snakesms&task=snakesms.edit&id=' . $row->id);
				?>             
								<tr>
								<td>
								<?php echo JHtml::_('grid.id', $i, $row->id); ?>
								</td>            
								<td><?php echo $row->id; ?> </td>
								<td>
								<a href="<?php echo $link; ?>" title="<?php echo JText::_('مشاهده کامل اطلاعات پرداخت'); ?>">
								<?php echo $row->name; ?>
								</a>
								</td>
								<td><?php echo $row->mobile; ?></td>
                                </tr>
 <?php endforeach; ?>
                            </tbody>
                            </table>                   
			<?php endif; ?>
                        </div>
</div> 
	<input type="hidden" name="task" value=""/>
	<input type="hidden" name="boxchecked" value="0"/>
	<?php echo JHtml::_('form.token'); ?>
</form>



</div>

          </div>
          <!-- /.box -->

              </div> <!-- span12 info boards-->
            </div>

           
            </div>
        </div>
      </div>  



    </div><!-- content -->

    </div>
    </div> <!-- Main span12 -->
  </div>  <!-- row-fluid -->
  <div class="clearfix"></div>
      <div class="row-fluid margin">
        <div class="span5 cright">
            Copyright © 2016 Trangell Team. All Rights Reserved.
        </div>
      </div>
</div>  <!-- Main container-fluid -->
<div class="clearfix"></div>
<div class="margin"></div>
