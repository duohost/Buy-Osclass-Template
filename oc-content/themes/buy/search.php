<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="<?php echo str_replace('_', '-', osc_current_user_locale()); ?>">
<head>
  <?php osc_current_web_theme_path('head.php') ; ?>
  <?php if( osc_count_items() == 0 || Params::getParam('iPage') > 0 || stripos($_SERVER['REQUEST_URI'], 'search') )  { ?>
    <meta name="robots" content="noindex, nofollow" />
    <meta name="googlebot" content="noindex, nofollow" />
  <?php } else { ?>
    <meta name="robots" content="index, follow" />
    <meta name="googlebot" content="index, follow" />
  <?php } ?>
</head>

<?php osc_current_web_theme_path('header.php') ; ?>

<!-- Page Title start -->
<div class="pageTitle">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6">
        <h1 class="page-heading"><?php _e('Listings', 'buy'); ?></h1>
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="breadCrumb"><a href="<?php echo osc_base_url() ; ?>"><?php _e('Home', 'buy'); ?></a> / <span><?php _e('Search Result', 'buy'); ?></span></div>
      </div>
    </div>
  </div>
</div>
<!-- Page Title End -->

<div class="listpgWraper">
  <div class="container"> 
    
    <!-- Page Title start -->
    <div class="pageSearch">
      <div class="row">
		<?php if( osc_users_enabled() || ( !osc_users_enabled() && !osc_reg_user_post() )) { ?>
        <div class="col-md-3"><a href="<?php echo osc_item_post_url_in_category(); ?>" class="btn"><i class="fa fa-file-text" aria-hidden="true"></i> <?php _e('Post a Free Ad', 'buy');?></a></div>
        <?php } ?>
		<div class="col-md-9">
          <div class="searchform">
		  <form action="<?php echo osc_base_url(true); ?>" method="get" onsubmit="" class="nocsrf">
			<input type="hidden" name="page" value="search" />
			<input type="hidden" name="cookie-action-side" id="cookie-action-side" value="" />
			<input type="hidden" name="sCategory" value="<?php echo Params::getParam('sCategory'); ?>" />
			<input type="hidden" name="sOrder" value="<?php echo osc_search_order(); ?>" />
			<input type="hidden" name="iOrderType" value="<?php $allowedTypesForSorting = Search::getAllowedTypesForSorting() ; echo $allowedTypesForSorting[osc_search_order_type()]; ?>" />
			<?php foreach(osc_search_user() as $userId) { ?>
			  <input type="hidden" name="sUser[]" value="<?php echo $userId; ?>" />
			<?php } ?>

            <div class="row">
              <div class="col-md-5 col-sm-4">
			    <input type="text" class="form-control" name="sPattern" id="query" value="<?php echo osc_esc_html(osc_search_pattern()); ?>" />
              </div>
			  <?php  if ( osc_count_categories() ) { ?>
              <div class="col-md-3 col-sm-3">
                <?php osc_categories_select('sCategory', null, __('Select a category', 'buy')) ; ?>
              </div>
			  <?php  } ?>
				<?php
				  $current_country = Params::getParam('country') <> '' ? Params::getParam('country') : Params::getParam('sCountry');

				  if($current_country <> '') {
					$aRegions = Region::newInstance()->findByCountry($current_country_code);
				  } else {
					if(osc_count_countries() <= 1) {
					  $aRegions = Region::newInstance()->findByCountry($s_country['pk_c_code']);
					} else {
					  $aRegions = '';
					}
				  }
				?>
              <div class="col-md-3 col-sm-3">
				  <?php if(isset($aRegions) && !empty($aRegions) && $aRegions <> '' && count($aRegions) >= 1) { ?>
					<select class="form-control" id="regionId" name="sRegion" <?php if(Params::getParam('sRegion') == '' && Params::getParam('region')) {?>disabled<?php } ?>>
					  <option value=""><?php _e('Select a region', 'buy'); ?></option>
					  
					  <?php foreach ($aRegions as $region) {?>
						<option value="<?php echo $region['pk_i_id']; ?>" <?php if(Params::getParam('sRegion') == $region['pk_i_id'] or Params::getParam('sRegion') == $region['s_name']) { ?>selected="selected"<?php } ?>><?php echo $region['s_name']; ?></option>
					  <?php } ?>
					</select>
				  <?php } else { ?>
					<input class="form-control" type="text" name="sRegion" id="sRegion-side" value="<?php echo Params::getParam('sRegion'); ?>" placeholder="<?php echo osc_esc_html(__('Enter a region', 'buy')); ?>" />
				  <?php } ?>
				<?php 
				  $current_region = Params::getParam('region') <> '' ? Params::getParam('region') : Params::getParam('sRegion');

				  if(!is_numeric($current_region) && $current_region <> '') {
					$reg = Region::newInstance()->findByName($current_region);
					$current_region = $reg['pk_i_id'];
				  }

				  if($current_region <> '') {
					$aCities = City::newInstance()->findByRegion($current_region);
				  } else {
					$aCities = '';
				  }
				?>
              </div>
              <div class="col-md-1 col-sm-2">
                <button class="btn"><i class="fa fa-search" aria-hidden="true"></i></button>
              </div>
            </div>
		  </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Page Title end --> 
    
    <!-- Search Result and sidebar start -->
    <div class="row">
      <div class="col-md-3 col-sm-5"> 
        <!-- Side Bar start -->
        <div class="sidebar"> 
		  <form action="<?php echo osc_base_url(true); ?>" method="get" onsubmit="" class="nocsrf">
			<input type="hidden" name="page" value="search" />
			<input type="hidden" name="cookie-action-side" id="cookie-action-side" value="" />
			<input type="hidden" name="sCategory" value="<?php echo Params::getParam('sCategory'); ?>" />
			<input type="hidden" name="sOrder" value="<?php echo osc_search_order(); ?>" />
			<input type="hidden" name="iOrderType" value="<?php $allowedTypesForSorting = Search::getAllowedTypesForSorting() ; echo $allowedTypesForSorting[osc_search_order_type()]; ?>" />
			<?php foreach(osc_search_user() as $userId) { ?>
			  <input type="hidden" name="sUser[]" value="<?php echo $userId; ?>" />
			<?php } ?>
			<input type="hidden" name="sCompany" class="sCompany" id="sCompany" value="<?php echo Params::getParam('sCompany');?>" />
			<input type="hidden" id="priceMin" name="sPriceMin" value="<?php echo Params::getParam('sPriceMin'); ?>" size="6" maxlength="6" />
			<input type="hidden" id="priceMax" name="sPriceMax" value="<?php echo Params::getParam('sPriceMax'); ?>" size="6" maxlength="6" />
          <!-- Price -->
		  <?php $aCountries = Country::newInstance()->listAll(); ?>
          <div class="widget" <?php if(count($aCountries) <= 1 ) {?>style="display:none;"<?php } ?>>
            <h4 class="widget-title"><?php _e('Country', 'buy') ; ?></h4>
              <?php
                // IF THERE IS JUST 1 COUNTRY, PRE-SELECT IT TO ENABLE REGION DROPDOWN
                $s_country = Country::newInstance()->listAll();
                if(count($s_country) <= 1) {
                  $s_country = $s_country[0];
                }
              ?>

              <select class="form-control" id="countryId" name="sCountry">
                <option value=""><?php _e('Select a country', 'buy'); ?></option>

                <?php foreach ($aCountries as $country) {?>
                  <?php $country['pk_c_code'] = isset($country['pk_c_code']) ? $country['pk_c_code'] : ''; ?>
                  <?php $s_country['pk_c_code'] = isset($s_country['pk_c_code']) ? $s_country['pk_c_code'] : ''; ?>
                  <option value="<?php echo $country['pk_c_code']; ?>" <?php if(Params::getParam('sCountry') <> '' && (Params::getParam('sCountry') == $country['pk_c_code'] or Params::getParam('sCountry') == $country['s_name']) or $s_country['pk_c_code'] <> '' && $s_country['pk_c_code'] = $country['pk_c_code']) { ?>selected="selected"<?php } ?>><?php echo $country['s_name'] ; ?></option>

                  <?php 
                    if(Params::getParam('sCountry') <> '' && (Params::getParam('sCountry') == $country['pk_c_code'] or Params::getParam('sCountry') == $country['s_name']) or $s_country['pk_c_code'] <> '' && $s_country['pk_c_code'] = $country['pk_c_code']) {
                      $current_country_code = $country['pk_c_code'];
                    } 
                  ?>
                <?php } ?>
              </select>
          </div>
            <?php
              $current_country = Params::getParam('country') <> '' ? Params::getParam('country') : Params::getParam('sCountry');

              if($current_country <> '') {
                $aRegions = Region::newInstance()->findByCountry($current_country_code);
              } else {
                if(osc_count_countries() <= 1) {
                  $aRegions = Region::newInstance()->findByCountry($s_country['pk_c_code']);
                } else {
                  $aRegions = '';
                }
              }
            ?>
          <!-- Price end --> 
          <!-- type -->
          <div class="widget">
            <h4 class="widget-title"><?php _e('Region', 'buy') ; ?></h4>
              <?php if(isset($aRegions) && !empty($aRegions) && $aRegions <> '' && count($aRegions) >= 1) { ?>
                <select class="form-control" id="regionId" name="sRegion" <?php if(Params::getParam('sRegion') == '' && Params::getParam('region')) {?>disabled<?php } ?>>
                  <option value=""><?php _e('Select a region', 'buy'); ?></option>
                  
                  <?php foreach ($aRegions as $region) {?>
                    <option value="<?php echo $region['pk_i_id']; ?>" <?php if(Params::getParam('sRegion') == $region['pk_i_id'] or Params::getParam('sRegion') == $region['s_name']) { ?>selected="selected"<?php } ?>><?php echo $region['s_name']; ?></option>
                  <?php } ?>
                </select>
              <?php } else { ?>
                <input class="form-control" type="text" name="sRegion" id="sRegion-side" value="<?php echo Params::getParam('sRegion'); ?>" placeholder="<?php echo osc_esc_html(__('Enter a region', 'buy')); ?>" />
              <?php } ?>
            <?php 
              $current_region = Params::getParam('region') <> '' ? Params::getParam('region') : Params::getParam('sRegion');

              if(!is_numeric($current_region) && $current_region <> '') {
                $reg = Region::newInstance()->findByName($current_region);
                $current_region = $reg['pk_i_id'];
              }

              if($current_region <> '') {
                $aCities = City::newInstance()->findByRegion($current_region);
              } else {
                $aCities = '';
              }
            ?>
          </div>
          <!-- type end -->
          <!-- type -->
          <div class="widget">
            <h4 class="widget-title"><?php _e('City', 'buy') ; ?></h4>
              <?php if(isset($aCities) && !empty($aCities) && $aCities <> '' && count($aCities) >= 1) { ?>
                <select class="form-control" name="sCity" id="cityId" <?php if(Params::getParam('sCity') == '' && Params::getParam('city') == '') {?>disabled<?php } ?>> 
                  <option value=""><?php _e('Select a city', 'buy'); ?></option>
            
                  <?php if(isset($aCities) && !empty($aCities)) { ?>
                    <?php foreach ($aCities as $city) {?>
                      <option value="<?php echo $city['pk_i_id']; ?>" <?php if(Params::getParam('sCity') == $city['pk_i_id'] or Params::getParam('sCity') == $city['s_name']) { ?>selected="selected"<?php } ?>><?php echo $city['s_name']; ?></option>
                    <?php } ?>
                  <?php } ?>
                </select>
              <?php } else { ?>
                <input class="form-control" type="text" name="sCity" id="sCity-side" value="<?php echo Params::getParam('sCity'); ?>" placeholder="<?php echo osc_esc_html(__('Enter a city', 'buy')); ?>" />
              <?php } ?>
          </div>
          <!-- type end --> 		  
          <!-- Year -->
		  <?php if( osc_price_enabled_at_items() ) { ?>
          <div class="widget">
            <h4 class="widget-title"><?php _e('Price', 'buy'); ?></h4>
            <div class="row">
              <div class="col-md-6">
				<input class="form-control" type="text" placeholder="<?php _e('Min Price', 'buy'); ?>" id="priceMin" name="sPriceMin" value="<?php echo osc_esc_html(osc_search_price_min()); ?>" size="6" maxlength="6" />
              </div>
              <div class="col-md-6">
                <input class="form-control" type="text" placeholder="<?php _e('Max Price', 'buy'); ?>" id="priceMax" name="sPriceMax" value="<?php echo osc_esc_html(osc_search_price_max()); ?>" size="6" maxlength="6" />
              </div>
            </div>
          </div>
		  <?php } ?>
          <!-- Year end -->
          
          <!-- type -->
		  <?php if( osc_images_enabled_at_items() ) { ?>
          <div class="widget">
			<input class="form-control" type="checkbox" name="bPic" id="withPicture" value="1" <?php echo (osc_search_has_pic() ? 'checked="checked"' : ''); ?> />
			<label for="withPicture"><?php _e('Show only listings with photo', 'buy') ; ?></label>
          </div>
		  <?php } ?>
          
          <!-- Top Companies -->
          <div class="widget">
            <h4 class="widget-title"><?php _e('Filters', 'buy'); ?></h4>
            <ul class="optionlist">
				<?php 
				  if(osc_search_category_id()) { 
					osc_run_hook('search_form', osc_search_category_id());
				  } else { 
					osc_run_hook('search_form');
				  } 
				?>
            </ul>
		  </div>
          <!-- Top Companies end --> 
          
          <!-- button -->
          <div class="searchnt">
            <button type="submit" class="btn"><i class="fa fa-search" aria-hidden="true"></i> <?php _e('Search', 'buy') ; ?></button>
          </div>
          <!-- button end-->
		</form>
        </div>
        <!-- Side Bar end --> 
      </div>
      <div class="col-md-9 col-sm-7">
        <div class="sortbybar">
          <div class="row">
            <div class="col-sm-4">
				<?php $def_view = osc_get_preference('def_view', 'buy_theme') == 0 ? 'gallery' : 'list'; ?>
				<?php $old_show = Params::getParam('sShowAs') == '' ? $def_view : Params::getParam('sShowAs'); ?>
				<?php $params['sShowAs'] = 'list'; ?>
				<a href="<?php echo osc_update_search_url($params); ?>" class="listby" data-toggle="tooltip" data-placement="top" data-original-title="<?php echo osc_esc_html(__('Switch to list view', 'buy')); ?>" title="<?php echo osc_esc_html(__('Switch to list view', 'buy')); ?>" <?php echo ($old_show == $params['sShowAs'] ? 'class="active"' : ''); ?>><i class="fa fa-th-list"></i></a>
				<?php $params['sShowAs'] = 'gallery'; ?>
				<a href="<?php echo osc_update_search_url($params); ?>" class="listby" data-toggle="tooltip" data-placement="top" data-original-title="<?php echo osc_esc_html(__('Switch to grid view', 'buy')); ?>" title="<?php echo osc_esc_html(__('Switch to grid view', 'buy')); ?>" <?php echo ($old_show == $params['sShowAs'] ? 'class="active"' : ''); ?>><i class="fa fa-th"></i></a>
			</div>
            <div class="col-sm-4">
              <div class="input-group"> <span class="input-group-addon" id="basic-addon3"><?php _e('Sort By', 'buy') ; ?></span>
				<?php $orders = osc_list_orders(); ?>
				<?php $current_order = osc_search_order(); ?>
				<?php foreach($orders as $label => $params) { ?>
				  <?php $orderType = ($params['iOrderType'] == 'asc') ? '0' : '1'; ?>
				  <?php if(osc_search_order() == $params['sOrder'] && osc_search_order_type() == $orderType) { ?>
					<?php if($current_order == 'dt_pub_date') { ?>
					  <i class="fa fa-sort-amount-asc"></i>
					<?php } else { ?>
					  <?php if($orderType == 0) { ?>
						<i class="fa fa-sort-numeric-asc"></i>
					  <?php } else { ?>
						<i class="fa fa-sort-numeric-desc"></i>
					  <?php } ?>
					<?php } ?>
					<span><?php echo $label; ?></span>
				  <?php } ?>
				<?php } ?>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="found"> <?php echo osc_default_results_per_page_at_search()*(osc_search_page())+1;?> - <?php echo osc_default_results_per_page_at_search()*(osc_search_page()+1)+osc_count_items()-osc_default_results_per_page_at_search();?> <?php echo ' ' . __('of', 'buy') . ' '; ?> <?php echo osc_search_total_items() ?> <?php echo (osc_search_total_items() == 1 ? __('listing', 'buy') : __('listings', 'buy')); ?></div>
            </div>
          </div>
        </div>
        
        <!-- Search List -->
		  <?php if(osc_count_items() == 0) { ?>
			<div class="empty" ><?php printf(__('There are no results matching "%s"', 'buy'), osc_search_pattern()) ; ?></div>
		  <?php } else { ?>
			<?php require($old_show == 'list' ? 'search_list.php' : 'search_gallery.php') ; ?>
		  <?php } ?>
          <!-- ad start -->
        
        <!-- Pagination Start -->
        <div class="pagiWrap">
          <div class="row">
            <div class="col-md-4 col-sm-4">
              <div class="showreslt"><?php echo osc_default_results_per_page_at_search()*(osc_search_page())+1;?> - <?php echo osc_default_results_per_page_at_search()*(osc_search_page()+1)+osc_count_items()-osc_default_results_per_page_at_search();?> <?php echo ' ' . __('of', 'buy') . ' '; ?> <?php echo osc_search_total_items() ?> <?php echo (osc_search_total_items() == 1 ? __('listing', 'buy') : __('listings', 'buy')); ?></div>
            </div>
            <div class="col-md-8 col-sm-8 text-right">
              <ul class="pagination">
                <?php echo osc_search_pagination(); ?>
              </ul>
            </div>
          </div>
        </div>
        <!-- Pagination end --> 
      </div>
    </div>
  </div>
</div>

<!-- JAVASCRIPT FOR PRICE SLIDER IN SEARCH BOX -->
<script>
  <?php
    $max = buy_max_price($search_cat_id, Params::getParam('sCountry'), Params::getParam('sRegion'), Params::getParam('sCity'));
    $max_price = ceil($max['max_price']/25)*25;
    $max_currency = $max['max_currency'];
    $format_sep = osc_get_preference('format_sep', 'buy_theme');
    $format_cur = osc_get_preference('format_cur', 'buy_theme');

    if($format_cur == 0) {
      $format_prefix = $max_currency;
      $format_suffix = '';
    } else if ($format_cur == 1) {
      $format_prefix = '';
      $format_suffix = $max_currency;
    } else {
      $format_prefix = '';
      $format_suffix = '';
    }
  ?>

  $(function() {
    $( "#slider-range" ).slider({
      range: true,
      step: <?php echo $max_price/25; ?>,
      min: 0,
      max: <?php echo $max_price; ?>,
      values: [<?php echo (Params::getParam('sPriceMin') <> '' ? Params::getParam('sPriceMin') : '0'); ?>, <?php echo (Params::getParam('sPriceMax') <> '' ? Params::getParam('sPriceMax') : $max_price); ?> ],
      slide: function( event, ui ) {
        if(ui.values[ 0 ] <= 0) {
          $( "#amount-min" ).text( "<?php _e('Free', 'buy'); ?>" );
          $( "#amount-max" ).text( ui.values[ 1 ] );
          $( "#amount-max" ).priceFormat({prefix: '<?php echo $format_prefix; ?>', suffix: '<?php echo $format_suffix; ?>', thousandsSeparator: '<?php echo $format_sep; ?>', centsLimit: 0});
        } else {
          $( "#amount-min" ).text( ui.values[ 0 ] );
          $( "#amount-max" ).text( ui.values[ 1 ] );
          $( "#amount-min" ).priceFormat({prefix: '<?php echo $format_prefix; ?>', suffix: '<?php echo $format_suffix; ?>', thousandsSeparator: '<?php echo $format_sep; ?>', centsLimit: 0});
          $( "#amount-max" ).priceFormat({prefix: '<?php echo $format_prefix; ?>', suffix: '<?php echo $format_suffix; ?>', thousandsSeparator: '<?php echo $format_sep; ?>', centsLimit: 0});
        }

        if(ui.values[ 0 ] <= 0) { 
          $( "#priceMin" ).val('');
        } else {
          $( "#priceMin" ).val(ui.values[ 0 ]);
        }

        if(ui.values[ 1 ] >= <?php echo $max_price; ?>) {
          $( "#priceMax" ).val('');
        } else {
          $( "#priceMax" ).val(ui.values[ 1 ]);
        }

        $("#cookie-action-side").val('done');
      }
    });
    

    if( $( "#slider-range" ).slider( "values", 0 ) <= 0 ) {
      if( $( "#slider-range" ).slider( "values", 1 ) <= 0 ) {
        $( "#amount-min" ).text( "<?php _e('Free', 'buy'); ?>" );
        $( "#amount-max" ).text( "" );
        $( "#amount-del" ).hide(0);
      } else {
        $( "#amount-min" ).text( "<?php _e('Free', 'buy'); ?>" );
        $( "#amount-max" ).text( $( "#slider-range" ).slider( "values", 1 ) );
        $( "#amount-del" ).show(0);
        $( "#amount-max" ).priceFormat({prefix: '<?php echo $format_prefix; ?>', suffix: '<?php echo $format_suffix; ?>', thousandsSeparator: '<?php echo $format_sep; ?>', centsLimit: 0});
      }
    } else {
      if( $( "#slider-range" ).slider( "values", 0 ) == $( "#slider-range" ).slider( "values", 1 ) ) {
        $( "#amount-min" ).text( "" );
        $( "#amount-max" ).text( $( "#slider-range" ).slider( "values", 0 ) );
        $( "#amount-del" ).hide(0);
        $( "#amount-max" ).priceFormat({prefix: '<?php echo $format_prefix; ?>', suffix: '<?php echo $format_suffix; ?>', thousandsSeparator: '<?php echo $format_sep; ?>', centsLimit: 0});
      } else {
        $( "#amount-min" ).text( $( "#slider-range" ).slider( "values", 0 ) );
        $( "#amount-max" ).text( $( "#slider-range" ).slider( "values", 1 ) );
        $( "#amount-del" ).show(0);
        $( "#amount-min" ).priceFormat({prefix: '<?php echo $format_prefix; ?>', suffix: '<?php echo $format_suffix; ?>', thousandsSeparator: '<?php echo $format_sep; ?>', centsLimit: 0});
        $( "#amount-max" ).priceFormat({prefix: '<?php echo $format_prefix; ?>', suffix: '<?php echo $format_suffix; ?>', thousandsSeparator: '<?php echo $format_sep; ?>', centsLimit: 0});
      }
    }
  });
</script>

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
              $("#uniform-regionId").find('span').text('<?php _e('Select a region', 'buy'); ?>');
            } else {

              $("#regionId").parent().before('<input placeholder="<?php echo osc_esc_js(__('Enter a region', 'buy')); ?>" type="text" name="sRegion" id="sRegion-side" />');
              $("#regionId").parent().remove();
              
              $("#cityId").parent().before('<input placeholder="<?php echo osc_esc_js(__('Enter a city', 'buy')); ?>" type="text" name="sCity" id="sCity-side" />');
              $("#cityId").parent().remove();

              $("#sCity-side").val('');
            }

            $("#regionId").html(result);
            $("#cityId").html('<option selected value=""><?php _e('Select a city', 'buy'); ?></option>');
            $("#uniform-cityId").find('span').text('<?php _e('Select a city', 'buy'); ?>');
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

              $("#sCity-side").before('<div class="selector" id="uniform-cityId"><span><?php _e('Select a city', 'buy'); ?></span><select name="sCity" id="cityId" ></select></div>');
              $("#sCity-side").remove();

              $("#cityId").val("");
              $("#uniform-cityId").find('span').text('<?php _e('Select a city', 'buy'); ?>');
            } else {
              result += '<option value=""><?php _e('No cities found', 'buy'); ?></option>';
              $("#cityId").parent().before('<input type="text" placeholder="<?php echo osc_esc_js(__('Enter a city', 'buy')); ?>" name="sCity" id="sCity-side" />');
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
      $("#uniform-cityId").addClass('disabled');
    } else {
      $("#cityId").attr('disabled',false);
      $("#uniform-cityId").removeClass('disabled');
    }

    if($("#countryId").length != 0) {
      if( $("#countryId").attr('value') == "")  {
        $("#regionId").attr('disabled',true);
        $("#uniform-regionId").addClass('disabled');
      }
    }

    //Make sure when select loads after input, span wrap is correctly filled
    $("#countryId").live('change', function() {
      $(this).parent().find('span').text($(this).find("option:selected" ).text());
    });

    $("#regionId").live('change', function() {
      $(this).parent().find('span').text($(this).find("option:selected" ).text());
    });

    $("#cityId").live('change', function() {
      $(this).parent().find('span').text($(this).find("option:selected" ).text());
    });

  });
</script>

<?php osc_current_web_theme_path('footer.php') ; ?>