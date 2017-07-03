<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="<?php echo str_replace('_', '-', osc_current_user_locale()); ?>">
<head>
  <?php osc_current_web_theme_path('head.php') ; ?>
  <meta name="robots" content="noindex, nofollow" />
  <meta name="googlebot" content="noindex, nofollow" />

  <!-- only item-post.php -->
  <script type="text/javascript" src="<?php //echo osc_current_web_theme_js_url('jquery.validate.min.js') ; ?>"></script>

  <?php if(osc_get_preference('image_upload', 'buy_theme') <> 1) { ?>
    <?php if(osc_images_enabled_at_items()) { ItemForm::photos_javascript(); } ?>
  <?php } ?>

  <?php if(osc_images_enabled_at_items() && !modern_is_fineuploader() && osc_get_preference('image_upload', 'buy_theme') == 1) { ItemForm::photos_javascript(); } ?>

  <script type="text/javascript">
  <?php if(osc_get_preference('image_upload', 'buy_theme') <> 1) { ?>
    function uniform_input_file(){
      photos_div = $('div.photos');
      $('div',photos_div).each(
        function(){
          if( $(this).find('div.uploader').length == 0  ){
            divid = $(this).attr('id');
            if(divid != 'photos'){
              divclass = $(this).hasClass('box');
              if( !$(this).hasClass('box') & !$(this).hasClass('uploader') & !$(this).hasClass('row')){
                $("div#"+$(this).attr('id')+" input:file").uniform({fileDefaultText: fileDefaultText,fileBtnText: fileBtnText});
              }
            }
          }
        }
      );
    }
    <?php } ?>
    
    setInterval("uniform_plugins()", 250);
    function uniform_plugins() {
      
      var content_plugin_hook = $('#plugin-hook').text();
      content_plugin_hook = content_plugin_hook.replace(/(\r\n|\n|\r)/gm,"");
      if( content_plugin_hook != '' ){
        
        var div_plugin_hook = $('#plugin-hook');
        var num_uniform = $("div[id*='uniform-']", div_plugin_hook ).size();
        if( num_uniform == 0 ){
          if( $('#plugin-hook input:text').size() > 0 ){
            $('#plugin-hook input:text').uniform();
          }
          if( $('#plugin-hook select').size() > 0 ){
            $('#plugin-hook select').uniform();
          }
        }
      }
    }

    <?php if(osc_locale_thousands_sep()!='' || osc_locale_dec_point() != '') { ?>
    $().ready(function(){
      $("#price").blur(function(event) {
        var price = $("#price").attr("value");
        <?php if(osc_locale_thousands_sep()!='') { ?>
        while(price.indexOf('<?php echo osc_esc_js(osc_locale_thousands_sep());  ?>')!=-1) {
          price = price.replace('<?php echo osc_esc_js(osc_locale_thousands_sep());  ?>', '');
        }
        <?php }; ?>
        <?php if(osc_locale_dec_point()!='') { ?>
        var tmp = price.split('<?php echo osc_esc_js(osc_locale_dec_point())?>');
        if(tmp.length>2) {
          price = tmp[0]+'<?php echo osc_esc_js(osc_locale_dec_point())?>'+tmp[1];
        }
        <?php }; ?>
        $("#price").attr("value", price);
      });
    });
    <?php }; ?>

  </script>
  <!-- end only item-post.php -->
</head>
<body>
  <h1 class="item_adding"></h1>

  <?php 
    $def_cat['fk_i_category_id'] = Params::getParam('sCategory'); 
    $country = Country::newInstance()->listAll();

    if(osc_is_web_user_logged_in()) {

      // GET LOCATION OF LOGGED USER
      $cookie_loc = osc_user();

      // IF THERE IS JUST 1 COUNTRY, PRE-SELECT IT TO ENABLE REGION DROPDOWN
      if(count($country) == 1) {
        $country = $country[0];
        $cookie_loc['fk_c_country_code'] = $country['pk_c_code'];
      }
    } else {

      // GET LOCATION FROM SEARCH
      if(Params::getParam('sCountry') <> '') {    
        if(strlen(Params::getParam('sCountry')) == 2) {
          $cookie_loc['fk_c_country_code'] = Params::getParam('sCountry');
        } else {
          $country = Country::newInstance()->findByName(Params::getParam('sCountry'));
          $cookie_loc['fk_c_country_code'] = $country['pk_c_code'];
        }
      } else {
        // IF THERE IS JUST 1 COUNTRY, PRE-SELECT IT TO ENABLE REGION DROPDOWN
        if(count($country) == 1) {
          $country = $country[0];
          $cookie_loc['fk_c_country_code'] = $country['pk_c_code'];
        }
      }

      if(Params::getParam('sRegion') <> '') {
        if(is_numeric(Params::getParam('sRegion'))) {
          $cookie_loc['fk_i_region_id'] = Params::getParam('sRegion');
        } else {
          $region = Region::newInstance()->findByName(Params::getParam('sRegion'));
          $cookie_loc['fk_i_region_id'] = $region['pk_i_id'];
        }
      }
    }
    if(Params::getParam('sCity') <> '') {
      if(is_numeric(Params::getParam('sCity'))) {
        $cookie_loc['fk_i_city_id'] = Params::getParam('sCity');
      } else {
        $city = City::newInstance()->findByName(Params::getParam('sCity'), $cookie_loc['fk_i_region_id']);
        $cookie_loc['fk_i_city_id'] = $city['pk_i_id'];
      }
    }
    
    if($cookie_loc['fk_c_country_code'] <> '') {
      $region_list = Region::newInstance()->findByCountry($cookie_loc['fk_c_country_code']);
    } else {
      $region_list = RegionStats::newInstance()->listRegions("%%%%", ">=");
    }

    if($cookie_loc['fk_i_region_id'] <> '') {
      $city_list = City::newInstance()->findByRegion($cookie_loc['fk_i_region_id']);
    }
  ?>

  <?php osc_current_web_theme_path('header.php') ; ?>

<!-- Page Title start -->
<div class="pageTitle">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6">
        <h1 class="page-heading"><?php _e('Post Job', 'buy'); ?></h1>
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="breadCrumb"><a href="/"><?php _e('Home', 'buy'); ?></a> / <span><?php _e('Post Job', 'buy'); ?></span></div>
      </div>
    </div>
  </div>
</div>
<!-- Page Title End -->

<div class="listpgWraper">
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="userccount">
          <div class="formpanel"> 
		  <form name="item" action="<?php echo osc_base_url(true);?>" method="post" enctype="multipart/form-data">
			<input type="hidden" name="action" value="item_add_post" />
			<input type="hidden" name="page" value="item" />
            <!-- Ad Information -->
            <h5><?php _e('Ad Information', 'buy'); ?></h5>
            <div class="row">
              <div class="col-md-12">
                <div class="formrow">
                  <?php ItemForm::multilanguage_title_description(); ?>
                </div>
              </div>
			  
			  <?php if(osc_get_preference('drop_cat', 'buy_theme') == 1) { ?>
				<div class="col-md-12 catshow multiple">
				  <div class="formrow">
					<?php ItemForm::category_multiple_selects(null, $def_cat, __('Select a category', 'buy')); ?>
				  </div>
				</div>
			  <?php } else { ?>
				<div class="col-md-12 catshow">
					<div class="formrow">
						<?php ItemForm::category_select(null, $def_cat, __('Select a category', 'buy')); ?>
					</div>
				</div>
			  <?php } ?>
			  <?php if( osc_price_enabled_at_items() ) { ?>
              <div class="col-md-4">
                <div class="formrow">
				  <input id="price" class="form-control" placeholder="<?php _e('Ad Price', 'buy'); ?>" type="text" name="price" value="">
                </div>
              </div>
			  <div class="col-md-4">
                <div class="formrow">
				  <?php ItemForm::currency_select(); ?>
                </div>
              </div>
              <div class="col-md-4">
                <div class="formrow">
				  <select class="form-control" id="PriceSelect">
					  <option value="0"><?php _e('Select option', 'buy'); ?></option>
					  <option value="1"><?php _e('Free', 'buy'); ?></option>
					  <option value="2"><?php _e('Check with seller', 'buy'); ?></option>
				  </select> 
                </div>
              </div>
			  <?php } ?>
			  <!-- SELLER INFORMATION -->
				<?php
				  $def = osc_user();

				  $user_info = '';
				  $user_info['s_contact_name'] = isset($def['s_name']) ? $def['s_name'] : '';
				  $user_info['s_city_area'] = isset($def['s_phone_mobile']) ? $def['s_phone_mobile'] : '';
				  $user_info['s_contact_email'] = isset($def['s_email']) ? $def['s_email'] : '';
				?>
              <div class="col-md-4 <?php if(osc_is_web_user_logged_in() ) { ?>logged<?php } ?>">
                <div class="formrow">
					<label for="contactName"><?php _e('Name', 'buy'); ?></label>
					<?php ItemForm::contact_name_text($user_info) ; ?>
                </div>
              </div>
              <div class="col-md-4">
                <div class="formrow">
					<label for="phone"><?php _e('Mobile Phone', 'buy'); ?></label>
					<?php ItemForm::city_area_text($user_info) ; ?>
                </div>
              </div>
              <div class="col-md-4">
                <div class="formrow">
					<label for="contactEmail"><span><?php _e('E-mail', 'buy'); ?></span><span class="req">*</span></label>
					<?php ItemForm::contact_email_text($user_info) ; ?>
                </div>
              </div>
              <div class="col-md-6">
                <div class="formrow">
					<div id="novy_email_check">
					  <?php ItemForm::show_email_checkbox() ; ?>
					</div>
					<label for="showEmail" id="novy_email_show"><?php _e('Show email on listing page', 'buy'); ?></label>
                </div>
              </div>
              <div class="col-md-12">
                <div class="formrow">
					<div class="box photos photoshow <?php if(osc_get_preference('image_upload', 'buy_theme') == 1) { echo 'drag_drop'; } ?>">
					  <div id="photos">
						<?php if(osc_images_enabled_at_items()) {
						  if(modern_is_fineuploader() && osc_get_preference('image_upload', 'buy_theme') == 1) {
							ItemForm::ajax_photos();
							echo '</div>';
						} else { ?>
						  <div class="row">
							<input type="file" name="photos[]" multiple />
						  </div>
						</div>
						<a id="new-pho" href="#" onclick="addNewPhotoBuy(); uniform_input_file(); return false;"><?php _e('Add new photo', 'buy'); ?></a>
					  <?php } ?>
					</div>
					<?php } ?>
                </div>
				<br/>
              </div>
			  <br/>
			  <?php $country = Country::newInstance()->listAll(); ?>
              <div class="col-md-4 <?php if(count($country) == 1) { ?>style="display:none;"<?php } ?>">
                <div class="formrow">
					<label for="regionId"><?php _e('Country', 'buy'); ?></label>
					<?php ItemForm::country_select(Country::newInstance()->listAll(), $cookie_loc); ?>
                </div>
              </div>
              <div class="col-md-4">
                <div class="formrow">
					<label for="regionId"><?php _e('Region', 'buy'); ?></label>
					<?php ItemForm::region_select($region_list, $cookie_loc); ?>
                </div>
              </div>
              <div class="col-md-4">
                <div class="formrow">
					<?php ItemForm::city_select($city_list, $cookie_loc); ?>
                </div>
              </div>
			  <div class="col-md-12">
                <div class="formrow">
					<label for="address"><?php _e('Address', 'buy'); ?></label>
					<?php ItemForm::address_text(osc_user()); ?>
                </div>
              </div>
              <div class="col-md-12">
                <div class="formrow">
                  <?php ItemForm::plugin_post_item(); ?>
                </div>
              </div>
			  <script type="text/javascript">var RecaptchaOptions = { theme : 'clean' };</script>
			  <?php if( osc_recaptcha_items_enabled() ) {?>
				<div class="col-md-12">
				  <div class="formrow">
					<?php osc_show_recaptcha(); ?>
				  </div>
				</div>
			  <?php }?>
            </div>
            <br>
            <input type="submit" class="btn" id="blue" value="<?php _e('Publish item', 'buy'); ?>">
			</form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
  <!-- JAVASCRIPT FOR PRICE ALTERNATIVES -->
  <script type="text/javascript">
    document.getElementById("PriceSelect").onchange = function(){ 
      if (document.getElementById("PriceSelect").value == 0) {
        document.getElementById("price").readOnly=false;
        document.getElementById("price").style.backgroundColor="#ffffff";
        document.getElementById("price").style.color="#444444";
      } else if (document.getElementById("PriceSelect").value == 1) {
        document.getElementById("price").value = 0;
        document.getElementById("price").readOnly=true;
        document.getElementById("price").style.backgroundColor="#f6f6f6";
        document.getElementById("price").style.color="#f6f6f6";
      } else if (document.getElementById("PriceSelect").value == 2) {
        document.getElementById("price").value = "";
        document.getElementById("price").readOnly=true;
        document.getElementById("price").style.backgroundColor="#f6f6f6";
        document.getElementById("price").style.color="#f6f6f6";
      }
    }

    // ADD TITLE TO INPUT WHEN FAST PUBLISH FROM FOOTER IS USED
    jQuery(document).ready(function($) {
      var add_title = '<?php echo Params::getParam('add_title'); ?>';

      if(add_title != '') {
        $('input[name^="title"]').val(add_title);
      }
    });

    $("#catId").click(function(){
      var cat_id = $(this).val();
      var url = '<?php echo osc_base_url(); ?>index.php';
      var result = '';

      if(cat_id != '') {
        if(catPriceEnabled[cat_id] == 1) {
          $("#price").closest("div").show();
        } else {
          $("#price").closest("div").hide();
          $('#price').val('') ;
        }

        $.ajax({
          type: "POST",
          url: url,
          data: 'page=ajax&action=runhook&hook=item_form&catId=' + cat_id,
          dataType: 'html',
          success: function(data){
          $("#plugin-hook").html(data);
        }
      });
    }
  });
  </script>

  <?php if(osc_get_preference('image_upload', 'buy_theme') <> 1) { ?>
  <script>
    var photoIndex = 0;
    function gebi(id) { return document.getElementById(id); }
    function ce(name) { return document.createElement(name); }
    function re(id) {
      var e = gebi(id);
      e.parentNode.removeChild(e);
    }

    function addNewPhotoBuy() {
      var max = <?php echo osc_max_images_per_item(); ?>;
      var num_img = $('input[name="photos[]"]').size() + $("a.delete").size();
      if((max!=0 && num_img<max) || max==0) {
        var id = 'p-' + photoIndex++;

        var i = ce('input');
        i.setAttribute('type', 'file');
        i.setAttribute('name', 'photos[]');

        var a = ce('a');
        a.style.fontSize = 'x-small';
        a.style.paddingLeft = '10px';
        a.setAttribute('href', '#');
        a.setAttribute('divid', id);
        a.onclick = function() { re(this.getAttribute('divid')); return false; }
        a.appendChild(document.createTextNode('<?php echo osc_esc_js(__('Remove')); ?>'));

        var d = ce('div');
        d.setAttribute('id', id);
        d.setAttribute('style','padding: 4px 0;')

        d.appendChild(i);
        d.appendChild(a);

        gebi('photos').appendChild(d);

      } else {
        alert('<?php echo osc_esc_js(__('Sorry, you have reached the maximum number of images per listing')); ?>');
      }
    }
    // Listener: automatically add new file field when the visible ones are full.
    setInterval("add_file_field()", 250);
    /**
     * Timed: if there are no empty file fields, add new file field.
     */
    function add_file_field() {
      var count = 0;
      $('input[name="photos[]"]').each(function(index) {
        if ( $(this).val() == '' ) {
          count++;
        }
      });
      var max = <?php echo osc_max_images_per_item(); ?>;
      var num_img = $('input[name="photos[]"]').size() + $("a.delete").size();
      if (count == 0 && (max==0 || (max!=0 && num_img<max))) {
        addNewPhotoBuy();uniform_input_file(); return false;
      }
    }
  </script>
  <?php } ?>

  <!-- ADD CAMERA ICON TO PICTURE BOX -->
  <script>
    jQuery(document).ready(function($) {
      $('#photos .qq-upload-button>div').prepend('<i class="fa fa-camera"></i>&nbsp;</i>');
    });
  </script>

  <!-- JAVASCRIPT AJAX LOADER FOR COUNTRY/REGION/CITY SELECT BOX -->
  <script>
    jQuery(document).ready(function($) {
      <?php if($def_cat['fk_i_category_id'] <> 0 and $def_cat['fk_i_category_id'] <> '' && osc_get_preference('drop_cat', 'buy_theme') == 1) { ?>
        draw_select(osc.item_post.category_tree_id.length + 1, $("#catId").val());
      <?php } ?>

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

                $("#region").before('<div class="selector" id="uniform-regionId"><span><?php _e('Select a region', 'buy'); ?></span><select name="regionId" id="regionId" ></select></div>');
                $("#region").remove();

                $("#city").before('<div class="selector" id="uniform-cityId"><span><?php _e('Select a city', 'buy'); ?></span><select name="cityId" id="cityId" ></select></div>');
                $("#city").remove();
                
                $("#regionId").val("");
                $("#uniform-regionId").find('span').text('<?php _e('Select a region', 'buy'); ?>');
              } else {

                $("#regionId").parent().before('<input placeholder="<?php echo osc_esc_js(__('Enter a region', 'buy')); ?>" type="text" name="sRegion" id="region" />');
                $("#regionId").parent().remove();
                
                $("#cityId").parent().before('<input placeholder="<?php echo osc_esc_js(__('Enter a city', 'buy')); ?>" type="text" name="sCity" id="city" />');
                $("#cityId").parent().remove();

                $("#city").val('');
              }

              $("#regionId").html(result);
              $("#cityId").html('<option selected value=""><?php _e('Select a city', 'buy'); ?></option>');
              $("#uniform-cityId").find('span').text('<?php _e('Select a city', 'buy'); ?>');
              $("#cityId").attr('disabled',true);
              $("#uniform-cityId").addClass('disabled');
            }
           });

         } else {

           // add empty select
           $("#region").before('<div class="selector" id="uniform-regionId"><span><?php _e('Select a region', 'buy'); ?></span><select name="regionId" id="regionId" ><option value=""><?php _e('Select a region', 'buy'); ?></option></select></div>');
           $("#region").remove();
           
           $("#city").before('<div class="selector" id="uniform-cityId"><span><?php _e('Select a city', 'buy'); ?></span><select name="cityId" id="cityId" ><option value=""><?php _e('Select a city', 'buy'); ?></option></select></div>');
           $("#city").remove();

           if( $("#regionId").length > 0 ){
             $("#regionId").html('<option value=""><?php _e('Select a region', 'buy'); ?></option>');
           } else {
             $("#region").before('<div class="selector" id="uniform-regionId"><span><?php _e('Select a region', 'buy'); ?></span><select name="regionId" id="regionId" ><option value=""><?php _e('Select a region', 'buy'); ?></option></select></div>');
             $("#region").remove();
           }

           if( $("#cityId").length > 0 ){
             $("#cityId").html('<option value=""><?php _e('Select a city', 'buy'); ?></option>');
           } else {
             $("#city").parent().before('<div class="selector" id="uniform-cityId"><span><?php _e('Select a city', 'buy'); ?></span><select name="cityId" id="cityId" ><option value=""><?php _e('Select a city', 'buy'); ?></option></select></div>');
             $("#city").parent().remove();
           }

           $("#regionId").attr('disabled',true);
           $("#uniform-regionId").addClass('disabled');
           $("#uniform-regionId").find('span').text('<?php _e('Select a region', 'buy'); ?>');
           $("#cityId").attr('disabled',true);
           $("#uniform-cityId").addClass('disabled');
           $("#uniform-cityId").find('span').text('<?php _e('Select a city', 'buy'); ?>');

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

                $("#city").before('<div class="selector" id="uniform-cityId"><span><?php _e('Select a city', 'buy'); ?></span><select name="cityId" id="cityId" ></select></div>');
                $("#city").remove();

                $("#cityId").val("");
                $("#uniform-cityId").find('span').text('<?php _e('Select a city', 'buy'); ?>');
              } else {
                result += '<option value=""><?php _e('No cities found', 'buy'); ?></option>';
                $("#cityId").parent().before('<input type="text" placeholder="<?php echo osc_esc_js(__('Enter a city', 'buy')); ?>" name="sCity" id="city" />');
                $("#cityId").parent().remove();
              }
              $("#cityId").html(result);
            }
          });
        } else {
          $("#cityId").attr('disabled',true);
          $("#uniform-cityId").addClass('disabled');
          $("#uniform-cityId").find('span').text('<?php _e('Select a city', 'buy'); ?>');
        }
      });

      if( $("#regionId").attr('value') == "")  {
        $("#cityId").attr('disabled',true);
        $("#city").attr('disabled',true);
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
      
      //DISABLE NAME & EMAIL INPUTS FOR LOGGED IN USER
      $('.add_item .seller_info.logged input#contactName, .add_item .seller_info.logged input#contactEmail').prop('disabled', true);

    });
  </script>

  <script>
    jQuery(document).ready(function($) {

      // TITLE REMAINING CHARACTERS
      var title_max = <?php echo osc_max_characters_per_title(); ?>;
      $('.add_item .title input').attr('maxlength', title_max);
      $('.add_item .title label').append('<div class="title-max-char max-char"></div>');
      $('.title-max-char').html(title_max + ' ' + '<?php _e('characters remaining', 'buy'); ?>');

      $('ul.tabbernav li a').live('click', function(){
        var title_length = $('.add_item .title input:visible').val().length;
        var title_remaining = title_max - title_length;

        $('.title-max-char').html(title_remaining + ' ' + '<?php _e('characters remaining', 'buy'); ?>');

        $('.title-max-char').removeClass('orange').removeClass('red');
        if(title_remaining/title_length <= 0.2 && title_remaining/title_length > 0.1) {
          $('.title-max-char').addClass('orange');
        } else if (title_remaining/title_length <= 0.1) {
          $('.title-max-char').addClass('red');
        }
      });

      $('.add_item .title input:visible').keyup(function() {
        var title_length = $(this).val().length;
        var title_remaining = title_max - title_length;

        $('.title-max-char').html(title_remaining + ' ' + '<?php _e('characters remaining', 'buy'); ?>');

        $('.title-max-char').removeClass('orange').removeClass('red');
        if(title_remaining/title_length <= 0.2 && title_remaining/title_length > 0.1) {
          $('.title-max-char').addClass('orange');
        } else if (title_remaining/title_length <= 0.1) {
          $('.title-max-char').addClass('red');
        }
      });

      // DESCRIPTION REMAINING CHARACTERS
      var desc_max = <?php echo osc_max_characters_per_description(); ?>;
      $('.add_item .description textarea').attr('maxlength', desc_max);
      $('.add_item .description label').append('<div class="desc-max-char max-char"></div>');
      $('.desc-max-char').html(desc_max + ' ' + '<?php _e('characters remaining', 'buy'); ?>');

      $('ul.tabbernav li a').live('click', function(){
        var desc_length = $('.add_item .description textarea:visible').val().length;
        var desc_remaining = desc_max - desc_length;

        $('.desc-max-char').html(desc_remaining + ' ' + '<?php _e('characters remaining', 'buy'); ?>');

        $('.desc-max-char').removeClass('orange').removeClass('red');

        if(desc_remaining/desc_length <= 0.2 && desc_remaining/desc_length > 0.1) {
          $('.desc-max-char').addClass('orange');
        } else if (desc_remaining/desc_length <= 0.1) {
          $('.desc-max-char').addClass('red');
        }
      });

      $('.add_item .description textarea:visible').keyup(function() {
        var desc_length = $(this).val().length;
        var desc_remaining = desc_max - desc_length;

        $('.desc-max-char').html(desc_remaining + ' ' + '<?php _e('characters remaining', 'buy'); ?>');

        $('.desc-max-char').removeClass('orange').removeClass('red');
        if(desc_remaining/desc_length <= 0.2 && desc_remaining/desc_length > 0.1) {
          $('.desc-max-char').addClass('orange');
        } else if (desc_remaining/desc_length <= 0.1) {
          $('.desc-max-char').addClass('red');
        }
      });
    });

    // CATEGORY CHECK IF PARENT
    <?php if(!osc_selectable_parent_categories()) { ?>
      jQuery(document).ready(function($) {
        if(typeof window['categories_' + $('#catId').val()] !== 'undefined'){
          if(eval('categories_' + $('#catId').val()) != '') {
            $('#catId').val('');
          }
        }
      });

      $('#catId').live('change', function(){
        if(typeof window['categories_' + $(this).val()] !== 'undefined'){
          if(eval('categories_' + $(this).val()) != '') {
            $(this).val('');
          }
        }
      });
    <?php } ?>

    // PLACEHOLDERS FOR TITLE AND DESCRIPTION
    jQuery(document).ready(function($) {
      $('.title input').attr('placeholder', '<?php echo osc_esc_js(__('Attractive title brings more customers...', 'buy')); ?>')
      $('.description textarea').attr('placeholder', '<?php echo osc_esc_js(__('Describe your item as much as possible...', 'buy')); ?>')
    });
  </script>
  <script>
    jQuery(document).ready(function($) {
      $('.button').click(function(){
        $('select.error').parent().addClass('error');
        $('select.valid').parent().addClass('valid');
        $('#catId').parent().find('select').removeClass('error').removeClass('valid');
        $('#catId.error').parent().find('select').last().addClass('error');
        $('#catId.valid').parent().find('select').last().addClass('valid');
      });

      $('select').change(function(){
        if($(this).val() != '' && $(this).val() != 0) {
          $(this).parent().removeClass('error');
          $(this).parent().addClass('valid');
        } else {
          $(this).parent().removeClass('valid');
          $(this).parent().addClass('error');
        }
      });
    });
  </script>
<?php osc_current_web_theme_path('footer.php') ; ?>