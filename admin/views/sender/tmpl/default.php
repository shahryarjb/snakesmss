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
JHtml::stylesheet(JURI::root().'components/com_tinypayment/ui/dist/css/customadmin.css');
JHtml::stylesheet(JURI::root().'components/com_tinypayment/ui/dist/css/custom.css');
JHtml::stylesheet('https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css');
JHtml::script('http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js');

$user = JFactory::getUser();

$listOrder     = $this->escape($this->filter_order);
$listDirn      = $this->escape($this->filter_order_Dir);
$model = $this->getModel('sender');
?>

<form action="index.php?option=com_snakesms&view=listpics" method="post" id="adminForm" name="adminForm">

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
					<a href="index.php?option=com_snakesms&view=listpics">
					  <i class="fa fa-home" aria-hidden="true"></i>
             کاربران ثبت شده
					</a>
				</li>

 <li class="lisidbars">
          <a href="index.php?option=com_snakesms&view=sender">
            <i class="fa fa-home" aria-hidden="true"></i>
             ارسال انبوه
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
              <h3>شارژ باقی مانده</h3>
              <i class="fa fa-file-text-o"></i> 
	<?php intval($model->price()); ?>
            </div>
            <div class="span4 borders a2">
              <h3>تعداد کاربران</h3>
              <i class="fa fa-flask"></i>
	<?php echo count($model->allusers()); ?>
            </div>
            <div class="span4 borders a3">
              <h3>دفعات ارسال</h3>
              <i class="fa fa-diamond"></i>
<?php echo count($this->items); ?>
            </div>
          </div>
            <div class="clearfix"></div>
            <div class="margin"></div>
            <div class="clearfix"></div>

<div class="span6">
			<?php
				echo JLayoutHelper::render(
					'joomla.searchtools.default',
					array('view' => $this)
				);
			?>
		</div>




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
            <?php if (!empty($this->items)) : ?>
            	<div style=" background: rgba(218, 218, 218, 0.17); padding: 8px; border-radius: 5px;">
            	<p> پیام ارسال خود را در کادر زیر قرار بدهید و بعد روی دکمه ارسال پیامک کلیک کنید </p>
            	<textarea name="sms" id="sms" rows="7" cols="100" style="min-width:98%" onkeyup="countChar(this)"></textarea>
                  <span style="float: right">تعداد کاراکتر : </span><div id="charNum" style="float: right"></div>
                  </br>
                    <div class="clearfix"></div>
                  <span id="txt"><span>
                  <div class="clearfix"></div>
            	</div>
            	</br>
              <h3 class="box-title"><i class="fa fa-file-text-o"></i> لیست پیام های ارسال شده</h3>
				<div class="row-fluid">
				<div class="span12">
				<div class="box-body table-responsive no-padding">
                            <table class="table table-hover">
                              <tbody>
								<tr>
									<th>شناسه</th>
									<th>تاریخ ارسال</th>
									<th>تعداد کاربران ارسال شده</th>
                                                      <th>واحد پیامک</th>
								</tr>
								<?php foreach ($this->items as $i => $row) :
				?>             
								<tr>         
								<td><?php echo $row->id; ?> </td>
								<td>
								<?php echo $row->time; ?>
								</td>
								<td> <?php echo $row->count; ?></td>
                                                 <td> <?php echo intval($row->smsnumb); ?></td>
                                </tr>
 <?php endforeach; ?>
                            </tbody>
                            </table>
                           
			<?php endif; ?>
                        </div>
</div> 




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

	<input type="hidden" name="task" value=""/>
	<input type="hidden" name="boxchecked" value="0"/>
	<input type="hidden" name="filter_order" value="<?php echo $listOrder; ?>"/>
	<input type="hidden" name="filter_order_Dir" value="<?php echo $listDirn; ?>"/>
	<?php echo JHtml::_('form.token'); ?>
</form>
<script>
      function countChar(val) {
        var len = val.value.length;
        var count = $('#charNum').text(len);
        var arabic = /[\u0600-\u06FF]/;
        if(arabic.test($("textarea#sms").val())){
              if(len <= 70) {
                    $("span#txt").text("واحد پیامک : 1");
              }else if(len > 70 && len < 134) {
                    $("span#txt").text("واحد پیامک : 2");
              }else if (len > 134 && len < 201) {
                    $("span#txt").text("واحد پیامک : 3");
              }else if (len > 201 && len < 268) {
                    $("span#txt").text("واحد پیامک : 4");
              }else if (len > 268 && len < 335) {
                    $("span#txt").text("واحد پیامک : 5");
              }else if (len > 335 && len < 402) {
                    $("span#txt").text("واحد پیامک : 6");
              }else if (len > 402 && len < 469) {
                    $("span#txt").text("واحد پیامک : 7");
              }else if (len > 469 && len < 536) {
                    $("span#txt").text("واحد پیامک : 8");
              }
        }else {
              if(len <= 160) {
                    $("span#txt").text("واحد پیامک : 1");
              }else if(len > 160 && len < 306) {
                    $("span#txt").text("واحد پیامک : 2");
              }else if (len > 306 && len < 459) {
                    $("span#txt").text("واحد پیامک : 3");
              }else if (len > 459 && len < 612) {
                    $("span#txt").text("واحد پیامک : 4");
              }else if (len > 612 && len < 765) {
                    $("span#txt").text("واحد پیامک : 5");
              }else if (len > 765 && len < 918) {
                    $("span#txt").text("واحد پیامک: 6");
              }
        }

      };
    </script>