<?php 
defined('_JEXEC') or die; 

/**
 * @package     Joomla.Site module
 * @subpackage  mod_instainfo
 * @author      trangell team https://trangell.com
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
//JHtml::stylesheet('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css');
//JHtml::script('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js');
JHtml::stylesheet(JURI::root().'modules/mod_trangell_sms/css/sms.css');

$test = new modTRANGELLsms();
$test->getPostData();
?>

<p class="admin-text">
این پیغام مدیریت می باشد تا به شما این اطمینان را بدهد که شماره شما سو استفاده نمی گردد.
</p>
<form method="POST" action="">
    <p>نام و نام خانوادگی :</p>
    <input id="name" name="name" type="text" placeholder="ترانگل"></input>
    <div class="clearfix"></div>
    <span id="namespn" style="color: red;font-size: 11px;">لطفا نام خود را فارسی وارد کنید</span>
    <p>شماره موبایل :</p>
    <input id="mobile" name="mobile" type="text" placeholder="09368094936"></input>
     <div class="clearfix"></div>
    <span id="mobspn" style="color: red;font-size: 11px;">شماره موبایل با 09 باید شروع شود</span>
    <input id="submit" name="submit" type="submit" value="ارسال"></input>
</form>
<script type="text/javascript" src="modules/mod_trangell_sms/css/jquery-1.11.3.min.js"></script>
<script>
    var mobileRegex = /09[0123][0-9]{7}/;
    var nameRegex = /^[\u0600-\u06FF\s]+$/;
    jQuery(document).ready(function(){
        jQuery("#submit").hide();
        jQuery("#namespn").hide();
        jQuery("#mobspn").hide();
        var i = 0;
        jQuery('input#name').keydown(function () {
          if (nameRegex.test( jQuery(this).val())) {
              jQuery(this).removeClass('invalid');
              jQuery(this).addClass('valid');
              i = 1;
              jQuery("#namespn").hide();
         } else {
              jQuery(this).removeClass('valid');
              jQuery(this).addClass('invalid');
              i = 0;
              jQuery("#namespn").hide();
         }
		 if( jQuery(this).val().length >= 60 ||  jQuery(this).val().length <= 4 ) {
			  jQuery(this).addClass('invalid');
              i = 0;
              jQuery("#namespn").show();
		 }
         if( jQuery(this).val() == ""){
              jQuery(this).removeClass("invalid")
              jQuery(this).removeClass("valid")
              i = 0;
              jQuery("#namespn").hide();
         }
         });

        jQuery('input#mobile').keydown(function () {
            if (mobileRegex.test(jQuery(this).val()) && i == 1) {
                jQuery(this).removeClass('invalid');
                jQuery(this).addClass('valid');
                jQuery("#submit").show();
                jQuery("#mobspn").hide();
            }
               
            if(jQuery(this).val().length >= 11 || jQuery(this).val().length < 10) {
                 if(jQuery(this).hasClass('valid')){
                  jQuery(this).removeClass('valid');
                }
                jQuery(this).addClass('invalid');
                jQuery("#submit").hide();
                jQuery("#mobspn").show();
            }
              
         
            if(jQuery(this).val() == ""){
                jQuery(this).removeClass("invalid")
                jQuery(this).removeClass("valid")
                jQuery("#mobspn").hide();
            }
        });
          
    });
       
</script>
