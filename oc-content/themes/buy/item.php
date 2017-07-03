<?php 
  // GET IF PAGE IS LOADED VIA QUICK VIEW
  $content_only = (Params::getParam('content_only') == 1 ? true : false);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="<?php echo str_replace('_', '-', osc_current_user_locale()); ?>">
<head>
  <?php osc_current_web_theme_path('head.php') ; ?>
</head>
<?php osc_current_web_theme_path('header.php') ; ?>
<!-- Page Title start -->
<div class="pageTitle">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6">
        <h1 class="page-heading"><?php _e('Ad Detail', 'buy'); ?></h1>
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="breadCrumb"><a href="<?php echo osc_base_url() ; ?>"><?php _e('Home', 'buy'); ?></a> / <span><?php echo ucfirst(osc_item_title()); ?></span></div>
      </div>
    </div>
  </div>
</div>
<!-- Page Title End -->

<div class="listpgWraper">
  <div class="container"> 
    
    <!-- Ad Header start -->
    <div class="advert-header">
      <div class="adinfo">
        <div class="row">
          <div class="col-md-8">
            <h2><?php echo ucfirst(osc_item_title()); ?></h2>
            <div class="ptext"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo osc_format_date(osc_item_pub_date()); ?></div>
            <div class="cateName"> <a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i> <?php echo osc_item_category(); ?></a></div>
            <div class="clearfix"></div>
          </div>
		  <?php if( osc_price_enabled_at_items() ) { ?>
          <div class="col-md-4">
            <div class="adsalary"><?php _e('Price', 'buy'); ?> <strong><?php echo osc_item_formated_price(); ?></strong></div>
          </div>
		  <?php } ?>
        </div>
      </div>
      <div class="adButtons">
		  <?php 
			$mobile = '';
			if($mobile == '') { $mobile = osc_item_city_area(); }      
			if($mobile == '' && osc_item_user_id() <> 0) { $mobile = $item_user['s_phone_mobile']; }      
			if($mobile == '' && osc_item_user_id() <> 0) { $mobile = $item_user['s_phone_land']; }      
			if($mobile == '') { $mobile = __('No phone number', 'buy'); }      
		  ?> 
		<a id="phone-show" class="btn apply" href="#" rel="<?php echo $mobile; ?>" title="<?php echo osc_esc_html(__('Click to show phone number', 'buy')); ?>">
			<i class="fa fa-phone-square" aria-hidden="true"></i> <?php echo osc_esc_html(__('Click to show phone number', 'buy')); ?>
			 <?php 
			   if(strlen($mobile) > 3 and $mobile <> __('No phone number', 'buy')) {
				 echo substr($mobile, 0, strlen($mobile) - 3) . 'XXX'; 
			   } else {
				 echo $mobile;
			   }
			 ?>
        </a>
		<a href="<?php echo osc_item_send_friend_url(); ?>" class="btn"><i class="fa fa-envelope" aria-hidden="true"></i> <?php _e('Send to friend', 'buy'); ?></a>
        <?php if (function_exists('show_printpdf')) { ?>
          <a id="print_pdf" href="<?php echo osc_base_url(); ?>oc-content/plugins/printpdf/download.php?item=<?php echo osc_item_id(); ?>"><i class="fa fa-file-pdf-o"></i> <?php _e('Show PDF sheet', 'buy'); ?></a>
        <?php } ?>
		<?php if (function_exists('print_ad')) { print_ad(); } ?>
		<a href="javascript:void(0)" class="btn"><i class="fa fa-floppy-o" aria-hidden="true"></i> <?php _e('Listing', 'buy'); ?> #<?php echo osc_item_id(); ?></a>
		<a href="#." class="btn"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> <?php _e('Report Abuse', 'buy'); ?></a>
      </div>
    </div>
    
    <!-- ad Detail start -->
    <div class="row">
      <div class="col-md-8"> 
        <!-- ad Description start -->
        <div class="advert-header">
          <div class="contentbox">
            <div class="adimages">
            <?php if( osc_images_enabled_at_items() ) { ?>
			<?php
			if( osc_count_item_resources() > 0 ) {
				$i = 0;
			?>
              <div id="adslider" class="flexslider">
                <ul class="slides">
				<?php for ( $i = 1; osc_has_item_resources(); $i++ ) { ?>
                  <li>
					<img src="<?php echo osc_resource_url(); ?>" alt="<?php echo osc_item_title(); ?>" title="<?php echo osc_item_title(); ?>" />
				  </li>
				<?php } ?>
                </ul>
              </div>
              <div id="adslider" class="flexslider">
                <ul class="slides">
				<?php for ( $i = 0; osc_has_item_resources(); $i++ ) { ?>
                  <li>
					<img src="<?php echo osc_resource_thumbnail_url(); ?>" alt="<?php echo osc_item_title(); ?>" title="<?php echo osc_item_title(); ?>" />
				  </li>
				<?php } ?>
                </ul>
              </div>
			  <?php } else { ?>
              <div id="carousel" class="flexslider">
                <ul class="slides">
                  <li>
					<img src="<?php echo osc_current_web_theme_url('images/no_photo.gif'); ?>" title="" alt="" />
				  </li>
                </ul>
              </div>
			<?php } ?>
            <?php } ?>
            </div>
            <h3><?php _e('Description', 'buy'); ?></h3>
            <p><?php echo osc_item_description(); ?></p>
            <h3><?php _e('Features', 'buy'); ?></h3>
			<?php if( osc_count_item_meta() >= 1 ) { ?>
            <ul>
            <?php while ( osc_has_item_meta() ) { ?>
                <?php if(osc_item_meta_value()!='') { ?>
					<li><strong><?php echo osc_item_meta_name(); ?>:</strong> <?php echo osc_item_meta_value(); ?></li>
                <?php } ?>
            <?php } ?>
            </ul>
			<?php } ?>
          </div>
        </div>
        <!-- Job Description end --> 
        
        <!-- related jobs start -->
        <div class="relatedJobs">
          <h3><?php _e('Ad Detail', 'buy'); ?><?php _e('Related Ads', 'buy'); ?></h3>
          <ul class="searchList">
			<?php if (function_exists('related_ads_start')) {related_ads_start();} ?>
          </ul>
        </div>
      </div>
      <!-- related jobs end -->
      
      <div class="col-md-4">
        <div class="advert-header">
          <div class="advertdetail">
            <h3><?php _e('Share This Ad', 'buy'); ?></h3>
            <div class="social">
			<noindex>
				<!-- uSocial -->
				<script async src="https://usocial.pro/usocial/usocial.js?v=6.1.3.1" data-script="usocial" charset="utf-8"></script>
				<div class="uSocial-Share" data-pid="9d45c1efb08fa1098a9da7c83610e893" data-type="share" data-options="round-rect,style1,default,absolute,horizontal,size24,eachCounter0,counter1,counter-after" data-social="vk,ok,fb,twi,gPlus,mail,bookmarks,print" data-mobile="vi,wa,telegram,sms"></div>
				<!-- /uSocial -->
			</noindex>
			</div>
          </div>
          <!-- Social Icons end --> 
        </div>
        
        <!-- Job Detail start -->
        <div class="advert-header">
          <div class="advertdetail">
            <h3><?php _e('More about this ad', 'buy'); ?></h3>
            <ul class="jbdetail">
              <li class="row">
                <div class="col-md-6 col-xs-6"><?php _e('Ad ID', 'buy'); ?></div>
                <div class="col-md-6 col-xs-6"><span><?php echo osc_item_id(); ?></span></div>
              </li>
			  <?php if(osc_item_city() <> '') { ?>
              <li class="row">
                <div class="col-md-6 col-xs-6"><?php _e('City', 'buy'); ?></div>
                <div class="col-md-6 col-xs-6"><span><?php echo osc_item_city(); ?></span></div>
              </li>
			  <?php } ?>
			  <?php if(osc_item_region() <> '') { ?>
			  <li class="row">
                <div class="col-md-6 col-xs-6"><?php _e('Region', 'buy'); ?></div>
                <div class="col-md-6 col-xs-6"><span><?php echo osc_item_region(); ?></span></div>
              </li>
			  <?php } ?>
              <li class="row">
                <div class="col-md-6 col-xs-6"><?php _e('AD Type', 'buy'); ?></div>
                <div class="col-md-6 col-xs-6"><span><a class="green" href="<?php echo osc_search_category_url();?>"><?php echo osc_item_category(); ?></a></span></div>
              </li>
			  <?php if (osc_item_pub_date() != '') { ?>
              <li class="row">
                <div class="col-md-6 col-xs-6"><?php _e('Ad Posted on', 'buy'); ?></div>
                <div class="col-md-6 col-xs-6"><span><?php echo osc_format_date(osc_item_pub_date()); ?></span></div>
              </li>
			  <?php } ?>
			  <?php if (osc_item_mod_date() != '') { ?>
              <li class="row">
                <div class="col-md-6 col-xs-6"><?php _e('Ad Modified on', 'buy'); ?></div>
                <div class="col-md-6 col-xs-6"><span><?php echo osc_format_date(osc_item_mod_date()); ?></span></div>
              </li>
			  <?php } ?>
              <li class="row">
                <div class="col-md-6 col-xs-6"><?php _e('Ad Viewed', 'buy'); ?></div>
                <div class="col-md-6 col-xs-6"><span><?php echo '<strong>' . osc_item_views() . '</strong>'; ?> <?php echo (osc_item_views() == 1 ? __('view', 'buy') : __('views', 'buy')); ?></span></div>
              </li>
              <li class="row">
				<?php
				  $c_name = '';
				  if(osc_item_contact_name() <> '' and osc_item_contact_name() <> __('Anonymous', 'buy')) {
					$c_name = osc_item_contact_name();
				  }

				  if($c_name == '' and $item_user['s_name'] <> '') { 
					$c_name = $item_user['s_name'];
				  }

				  if($c_name == '') {
					$c_name = __('Anonymous', 'buy');
				  }
				?>
                <div class="col-md-6 col-xs-6"><?php _e('Member Profile', 'buy'); ?></div>
                <div class="col-md-6 col-xs-6">
					<a href="<?php echo osc_user_public_profile_url(osc_item_user_id()); ?>"><?php echo $c_name; ?></a>
				</div>
              </li>
              <li class="row">
                <div class="col-md-6 col-xs-6"><?php _e('Member ID', 'buy'); ?></div>
                <div class="col-md-6 col-xs-6"><span><?php echo osc_user_id() ; ?></span></div>
              </li>
			  <?php if( osc_item_show_email() ) { ?>
              <li class="row">
                <div class="col-md-6 col-xs-6"><?php _e('E-mail', 'buy'); ?></div>
                <div class="col-md-6 col-xs-6"><span><?php echo osc_item_contact_email(); ?></span></div>
              </li>
			  <?php } ?>
			  <?php if(osc_item_user_id() <> 0) { ?>
              <li class="row">
                <div class="col-md-6 col-xs-6"><?php _e('Member Since', 'buy'); ?></div>
                <div class="col-md-6 col-xs-6">
                  <?php if(function_exists('show_feedback_overall')) { ?>
                    <span><?php echo show_feedback_overall(); ?></span>
                  <?php } else { ?>
                    <span><?php echo osc_format_date(osc_user_regdate()); ?></span>
                  <?php } ?>
				</div>
              </li>
			  <?php if(function_exists('seller_post') && !$content_only) { ?>
              <li class="row">
                <div class="col-md-6 col-xs-6"><?php _e('Total Listed Ads', 'buy'); ?></div>
                <div class="col-md-6 col-xs-6"><?php seller_post(); ?><span>(<?php $user = User::newInstance()->findByPrimaryKey(osc_item_user_id());$num_items_user = $user['i_items'];echo $num_items_user;?>)</span></div>
              </li>
			  <?php } ?>
			  <?php } else { ?>
			  <li class="row">
                <div class="col-md-6 col-xs-6"><?php _e('User Name', 'buy'); ?></div>
                <div class="col-md-6 col-xs-6"><span><?php echo $c_name; ?></span></div>
              </li>
			  <?php } ?>
            </ul>
          </div>
        </div>
        
        <!-- Contact user start -->
       <!-- SELLER CONTACT FORM -->
       <?php if( osc_item_is_expired () ) { ?>
         <div class="empty">
           <?php _e('This listing expired, you cannot contact seller.', 'buy') ; ?>
         </div>
       <?php } else if( (osc_logged_user_id() == osc_item_user_id()) && osc_logged_user_id() != 0 ) { ?>
         <div class="empty">
           <?php _e('It is your own listing, you cannot contact yourself.', 'buy') ; ?>
         </div>
       <?php } else if( osc_reg_user_can_contact() && !osc_is_web_user_logged_in() ) { ?>
         <div class="empty">
           <?php _e('You must log in or register a new account in order to contact the advertiser.', 'buy') ; ?>
         </div>
       <?php } else { ?> 
        <div class="advert-header">
          <div class="advertdetail">
            <h3><?php _e('Contact This Seller', 'buy'); ?></h3>
            <div class="formpanel">
            <ul id="error_list"></ul>
            <?php //ContactForm::js_validation(); ?>
            <form action="<?php echo osc_base_url(true) ; ?>" method="post" name="contact_form" id="contact_form">
              <input type="hidden" name="action" value="contact_post" />
              <input type="hidden" name="page" value="item" />
              <input type="hidden" name="id" value="<?php echo osc_item_id() ; ?>" />
			  <?php osc_prepare_user_info() ; ?>
              <div class="formrow">
			    <label><?php _e('Name', 'buy') ; ?></label>
                <?php ContactForm::your_name(); ?>
              </div>
              <div class="formrow">
                <label><span><?php _e('E-mail', 'buy'); ?></span><span class="req">*</span></label>
                <?php ContactForm::your_email(); ?>
              </div>
              <div class="formrow">
			    <label><span><?php _e('Phone number', 'buy'); ?></span></label>
                <?php ContactForm::your_phone_number(); ?>
              </div>
              <div class="formrow">
                <label><span><?php _e('Message', 'buy') ; ?></span><span class="req">*</span></label>
                <?php ContactForm::your_message(); ?>
              </div>
              <div class="formrow">
				<!-- ReCaptcha -->
				<?php osc_show_recaptcha(); ?>
              </div>
              <input type="submit" class="btn" value="<?php _e('Send message', 'buy') ; ?>">
			  <div onclick="document.getElementById('message').value = '';document.getElementById('yourName').value = '';document.getElementById('yourEmail').value = '';" class="clear-button button gray-button round3"><?php _e('Clear', 'buy'); ?></div>
			</form>
            </div>
          </div>
        </div>
		<?php } ?>
        <!-- Google Map start -->
        <div class="advert-header">
          <div class="advertdetail">
            <h3><?php _e('Ad Location', 'buy'); ?></h3>
            <div class="gmap">
				<?php if(function_exists('radius_map_items')) { radius_map_items(); } ?>
            </div>
          </div>
        </div>
        
        <!-- Safety start -->
        <div class="advert-header">
          <div class="advertdetail">
            <h3><?php _e('Stay Safe', 'buy'); ?></h3>
            <div class="gmap">
              <ul class="unorderlist">
                <li><?php _e('Avoid deals that are too good to be true.', 'buy'); ?></li>
                <li><?php _e('Deal with people in your area by meeting face to face to see the item.', 'buy'); ?></li>
                <li><?php _e('Never provide your personal or banking information.', 'buy'); ?></li>
                <li><?php _e('See our Safety tips regarding vehicle buying and selling.', 'buy'); ?></li>
                <li><?php _e('Follow the guide lines about How to shop online more safely?', 'buy'); ?></li>
                <li><?php _e('How to spot scam ads?', 'buy'); ?></li>
                <li><?php _e('How to protect yourself?', 'buy'); ?></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
  <script type="text/javascript">
    <!-- SHOW PHONE NUMBER ON CLICK -->
    jQuery(document).ready(function($) {
      $('#phone-show, .p-desc').click(function(){
        if($(this).attr('href') == '#') {
          $('#phone-show').text($('#phone-show').attr('rel')).css('font-weight', 'bold');
          $('#phone-show').siblings('.p-desc').text('<?php echo osc_esc_js(__('(Click to call)', 'buy')); ?>');
          $('#phone-show, .p-desc').attr('href', 'tel:' + $('#phone-show').attr('rel'));
          return false;
        }
      });
    });
  </script>
     
  <?php if(!$content_only) { ?>
    <!-- JAVASCRIPT AJAX LOADER FOR COUNTRY/REGION/CITY SELECT BOX -->
    <script>
      jQuery(document).ready(function($) {
        $("#countryId").live("change",function(){
          var pk_c_code = $(this).val();
          var url = '<?php echo osc_base_url(true)."?page=ajax&action=regions&countryId="; ?>' + pk_c_code;
          var result = '';

          if(pk_c_code != '') {
            $("#regionId").attr('disabled',false);
            $("#uniform-regionId").removeClass('disabled');
            $("#cityId").attr('disabled',true);
            $("#uniform-cityId").addClass('disabled');

            $.ajax({
              type: "POST",
              url: url,
              dataType: 'json',
              success: function(data){
                var length = data.length;
                
                if(length > 0) {

                  result += '<option value=""><?php _e('Select a region', 'buy'); ?></option>';
                  for(key in data) {
                    result += '<option value="' + data[key].pk_i_id + '">' + data[key].s_name + '</option>';
                  }

                  $("#sRegion-side").before('<div class="selector" id="uniform-regionId"><span><?php _e('Select a region', 'buy'); ?></span><select name="sRegion" id="regionId" ></select></div>');
                  $("#sRegion-side").remove();

                  $("#sCity-side").before('<div class="selector" id="uniform-cityId"><span><?php _e('Select a city', 'buy'); ?></span><select name="sCity" id="cityId" ></select></div>');
                  $("#sCity-side").remove();
                  
                  $("#regionId").val("");
                  $("#uniform-regionId").find('span').text('<?php echo osc_esc_js(__('Select a region', 'buy')); ?>');
                } else {

                  $("#regionId").parent().before('<input placeholder="<?php echo osc_esc_js(__('Enter a region', 'buy')); ?>" type="text" name="sRegion" id="sRegion-side" />');
                  $("#regionId").parent().remove();
                  
                  $("#cityId").parent().before('<input placeholder="<?php echo osc_esc_js(__('Enter a city', 'buy')); ?>" type="text" name="sCity" id="sCity-side" />');
                  $("#cityId").parent().remove();

                  $("#sCity-side").val('');
                }

                $("#regionId").html(result);
                $("#cityId").html('<option selected value=""><?php _e('Select a city', 'buy'); ?></option>');
                $("#uniform-cityId").find('span').text('<?php echo osc_esc_js(__('Select a city', 'buy')); ?>');
              }
             });

           } else {

             // add empty select
             $("#sRegion-side").before('<div class="selector" id="uniform-regionId"><span><?php _e('Select a region', 'buy'); ?></span><select name="sRegion" id="regionId" ><option value=""><?php _e('Select a region', 'buy'); ?></option></select></div>');
             $("#sRegion-side").remove();
             
             $("#sCity-side").before('<div class="selector" id="uniform-cityId"><span><?php _e('Select a city', 'buy'); ?></span><select name="sCity" id="cityId" ><option value=""><?php _e('Select a city', 'buy'); ?></option></select></div>');
             $("#sCity-side").remove();

             if( $("#regionId").length > 0 ){
               $("#regionId").html('<option value=""><?php _e('Select a region', 'buy'); ?></option>');
             } else {
               $("#sRegion-side").before('<div class="selector" id="uniform-regionId"><span><?php _e('Select a region', 'buy'); ?></span><select name="sRegion" id="regionId" ><option value=""><?php _e('Select a region', 'buy'); ?></option></select></div>');
               $("#sRegion-side").remove();
             }

             if( $("#cityId").length > 0 ){
               $("#cityId").html('<option value=""><?php _e('Select a city', 'buy'); ?></option>');
             } else {
               $("#sCity-side").parent().before('<div class="selector" id="uniform-cityId"><span><?php _e('Select a city', 'buy'); ?></span><select name="sCity" id="cityId" ><option value=""><?php _e('Select a city', 'buy'); ?></option></select></div>');
               $("#sCity-side").parent().remove();
             }

             $("#regionId").attr('disabled',true);
             $("#uniform-regionId").addClass('disabled');
             $("#uniform-regionId").find('span').text('<?php echo osc_esc_js(__('Select a region', 'buy')); ?>');
             $("#cityId").attr('disabled',true);
             $("#uniform-cityId").addClass('disabled');
             $("#uniform-cityId").find('span').text('<?php echo osc_esc_js(__('Select a city', 'buy')); ?>');

          }
        });

        $("#regionId").live("change",function(){
          var pk_c_code = $(this).val();
          var url = '<?php echo osc_base_url(true)."?page=ajax&action=cities&regionId="; ?>' + pk_c_code;
          var result = '';

          if(pk_c_code != '') {
            
            $("#cityId").attr('disabled',false);
            $("#uniform-cityId").removeClass('disabled');

            $.ajax({
              type: "POST",
              url: url,
              dataType: 'json',
              success: function(data){
                var length = data.length;
                if(length > 0) {
                  result += '<option selected value=""><?php _e('Select a city', 'buy'); ?></option>';
                  for(key in data) {
                    result += '<option value="' + data[key].pk_i_id + '">' + data[key].s_name + '</option>';
                  }

                  $("#sCity-side").before('<div class="selector" id="uniform-cityId"><span><?php _e('Select a city', 'buy'); ?></span><select name="sCity" id="cityId" ></select></div>');
                  $("#sCity-side").remove();

                  $("#cityId").val("");
                  $("#uniform-cityId").find('span').text('<?php echo osc_esc_js(__('Select a city', 'buy')); ?>');
                } else {
                  result += '<option value=""><?php _e('No cities found', 'buy'); ?></option>';
                  $("#cityId").parent().before('<input type="text" placeholder="<?php echo osc_esc_html(__('Enter a city', 'buy')); ?>" name="sCity" id="sCity-side" />');
                  $("#cityId").parent().remove();
                }
                $("#cityId").html(result);
              }
            });
          } else {
            $("#cityId").attr('disabled',true);
            $("#uniform-cityId").addClass('disabled');
            $("#uniform-cityId").find('span').text('<?php echo osc_esc_js(__('Select a city', 'buy')); ?>');
          }
        });

        if( $("#regionId").attr('value') == "")  {
          $("#cityId").attr('disabled',true);
          $("#uniform-cityId").addClass('disabled');
        }

        if($("#countryId").length != 0) {
          if( $("#countryId").attr('value') == "")  {
            $("#regionId").attr('disabled',true);
            $("#uniform-regionId").addClass('disabled');
          }
        }

        //Make sure when select loads after input, span wrap is correctly filled
        $(".row").on('change', '#cityId, #regionId', function() {
          $(this).parent().find('span').text($(this).find("option:selected" ).text());
        });

      });
    </script>
  <?php } ?>

  <?php if(!$content_only) { ?>
    <?php osc_current_web_theme_path('footer.php') ; ?>
  <?php } ?>		