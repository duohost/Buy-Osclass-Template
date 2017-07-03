<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="<?php echo str_replace('_', '-', osc_current_user_locale()) ; ?>">
<head>
  <?php osc_current_web_theme_path('head.php') ; ?>
</head>
<body>
<?php osc_current_web_theme_path('header.php') ; ?>
<!-- Search start -->
<?php osc_current_web_theme_path('inc.search.php') ; ?>
<!-- Search End --> 

<!-- Featured Ads start -->
<?php if(function_exists('popular_ads_start')) { ?>
<div class="section">
  <div class="container"> 
    <!-- title start -->
    <div class="titleTop">
      <h3><?php _e('Popular', 'buy'); ?> <span><?php _e('listings', 'buy'); ?></span></h3>
      <p><?php _e('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc varius, orci id facilisis egestas, neque purus sagittis arcu, nec maximus quam odio nec elit Pellentesque eget ipsum mattis', 'buy'); ?></p>
    </div>
    <!-- title end -->
    
    <ul class="gridlist itemgrid">
	<?php popular_ads_start(); ?>
	<?php if( osc_count_items() > 0) { ?>
    <?php $c = 1; ?>
    <?php while( osc_has_items() ) { ?>
      <li class="item <?php echo $c; ?>">
        <div class="adimg">
			<?php if(osc_count_item_resources()) { ?>
				<a href="<?php echo osc_item_url(); ?>">
					<img src="<?php echo osc_resource_thumbnail_url(); ?>" title="<?php echo osc_esc_html(osc_item_title()); ?>" alt="<?php echo osc_esc_html(osc_item_title()); ?>" />
				</a>
			<?php } else { ?>
				<a href="<?php echo osc_item_url(); ?>">
					<img src="<?php echo osc_current_web_theme_url('images/no-image.png'); ?>" title="<?php echo osc_esc_html(osc_item_title()); ?>" alt="<?php echo osc_esc_html(osc_item_title()); ?>" />
				</a>
			<?php } ?>
		</div>
        <div class="innerad">
          <h3><a class="title" href="<?php echo osc_item_url(); ?>"><?php echo osc_highlight(osc_item_title(), 30); ?></a></h3>
          <div class="row location">
            <div class="col-md-6"><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo osc_highlight(osc_item_city(), 7); ?></div>
            <?php
              $now = time();
              $your_date = strtotime(osc_item_pub_date());
              $datediff = $now - $your_date;
              $item_d = floor($datediff/(60*60*24));

              if($item_d == 0) {
                $item_date = __('today', 'buy');
              } else if($item_d == 1) {
                $item_date = __('yesterday', 'buy');
              } else {
                $item_date = date(osc_get_preference('date_format', 'buy_theme'), $your_date);
              }
            ?>
            <div class="col-md-6"><i class="fa fa-clock-o" aria-hidden="true"></i><?php echo $item_date; ?></div>
          </div>
          <?php if( osc_price_enabled_at_items() ) { ?>
            <div class="price"><?php if(osc_item_price() <> 0 and osc_item_price() <> '') { ?><?php _e('now', 'buy'); ?> <?php } ?><span><?php echo osc_item_formated_price(); ?></span></div>
          <?php } ?>
        </div>
        <?php if(osc_item_is_premium()) { ?>
          <div class="new">
            <span class="top"><?php _e('top', 'buy'); ?></span>
            <span class="bottom"><?php _e('item', 'buy'); ?></span>
          </div>
        <?php } ?>
      </li>
    <?php $c++; ?>
    <?php } ?>
    <?php } else { ?>
		<div class="empty"><?php _e('No popular listings', 'buy'); ?></div>
    <?php } ?>
    <?php popular_ads_end(); ?>
    </ul>
  </div>
</div>
<?php } ?>
<!-- Featured Ads end --> 

<!-- Categories start -->
<div class="section catewrap">
  <div class="container"> 
    <!-- title start -->
    <div class="titleTop">
      <h3><?php _e('Browse', 'buy'); ?> <span><?php _e('Categories', 'buy'); ?></span></h3>
      <p><?php _e('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc varius, orci id facilisis egestas, neque purus sagittis arcu, nec maximus quam odio nec elit Pellentesque eget ipsum mattis', 'buy'); ?></p>
    </div>
	<ul class="categoryList row">
	<?php osc_goto_first_category(); ?>
	<?php while( osc_has_categories() ) { ?>
	<?php $search_params['sCategory'] = osc_category_id(); ?>
		<li class="col-md-2 col-sm-3 col-xs-6" id="ct<?php echo osc_category_id(); ?>">
			<?php $cat_id = osc_category_id(); ?>
			<a href="<?php echo osc_search_url($search_params); ?>" >
				<img src="<?php echo osc_current_web_theme_url();?>images/small_cat/<?php echo osc_category_id();?>.png" alt="<?php echo osc_category_name(); ?>" />
				<span><?php echo osc_category_name(); ?> <i>(<?php echo osc_category_total_items(); ?>)</i></span>
			</a>
		</li>
	<?php } ?>
	</ul>
  </div>
</div>
<!-- Categories ends --> 

<!-- Latest Ads start -->
<div class="section">
  <div class="container"> 
    <!-- title start -->
    <div class="titleTop">
      <h3><?php _e('Latest', 'buy'); ?> <span><?php _e('listings', 'buy'); ?></span></h3>
      <p><?php _e('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc varius, orci id facilisis egestas, neque purus sagittis arcu, nec maximus quam odio nec elit Pellentesque eget ipsum mattis', 'buy'); ?></p>
    </div>
    <!-- title end -->
    <?php if( osc_count_latest_items() > 0) { ?>
    <ul class="row gridlist">
      <?php $c = 1; ?>
      <?php while( osc_has_latest_items() ) { ?>
      <li class="col-md-3 col-sm-6">
        <div class="adimg">
		<?php if(osc_count_item_resources()) { ?>
			<a href="<?php echo osc_item_url(); ?>">
				<img src="<?php echo osc_resource_thumbnail_url(); ?>" title="<?php echo osc_esc_html(osc_item_title()); ?>" alt="<?php echo osc_esc_html(osc_item_title()); ?>" />
			</a>
		<?php } else { ?>
			<a href="<?php echo osc_item_url(); ?>">
				<img src="<?php echo osc_current_web_theme_url('images/no-image.png'); ?>" title="<?php echo osc_esc_html(osc_item_title()); ?>" alt="<?php echo osc_esc_html(osc_item_title()); ?>" />
			</a>
		<?php } ?>
		</div>
        <div class="innerad">
          <h3><a href="<?php echo osc_item_url(); ?>"><?php echo osc_highlight(osc_item_title(), 35); ?></a></h3>
          <div class="row location">
            <div class="col-md-6"><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo osc_highlight(osc_item_city(), 7); ?></div>
            <div class="col-md-6"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo $item_date; ?></div>
          </div>
          <?php if( osc_price_enabled_at_items() ) { ?>
            <div class="price"><?php echo osc_item_formated_price(); ?></div>
          <?php } ?>
        </div>
      </li>
      <?php $c++; ?>
      <?php } ?>
    </ul>
    <?php } else { ?>
      <div class="viewallbtn"><?php _e('No latest listings', 'buy'); ?></div>
    <?php } ?>
    
    <?php View::newInstance()->_erase('items') ; ?>
	<?php if( osc_count_latest_items() == osc_max_latest_items() ) { ?>
    <div class="viewallbtn">
		<a href="<?php echo osc_search_url() ; ?>" ><?php _e('View All Latest Ads', 'buy'); ?></a>
	</div>
	<?php } ?>
    <div class="wideBanner margintop40">
		<img src="<?php echo osc_current_web_theme_url('images/google-ad-wide.jpg') ; ?>" alt="">
	</div>
  </div>
</div>
<!-- Latest Ads end --> 

<!-- How it Works start -->
<div class="section whitebg howitwrap">
  <div class="container">
    <ul class="howlist row">
      <!--step 1-->
      <li class="col-md-4 col-sm-4">
        <div class="iconcircle"><i class="fa fa-user" aria-hidden="true"></i></div>
        <h4><?php _e('Create a Free Account', 'buy'); ?></h4>
        <p><?php _e('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incidid ut labore et dolore magna aliqua.', 'buy'); ?></p>
      </li>
      <!--step 1 end--> 
      
      <!--step 2-->
      <li class="col-md-4 col-sm-4">
        <div class="iconcircle"><i class="fa fa-black-tie" aria-hidden="true"></i></div>
        <h4><?php _e('Post your Free Ad', 'buy'); ?></h4>
        <p><?php _e('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incidid ut labore et dolore magna aliqua.', 'buy'); ?></p>
      </li>
      <!--step 2 end--> 
      
      <!--step 3-->
      <li class="col-md-4 col-sm-4">
        <div class="iconcircle"><i class="fa fa-file-text" aria-hidden="true"></i></div>
        <h4><?php _e('Sold or Buy', 'buy'); ?></h4>
        <p><?php _e('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incidid ut labore et dolore magna aliqua.', 'buy'); ?></p>
      </li>
      <!--step 3 end-->
    </ul>
  </div>
</div>
<!-- How it Works Ends --> 

<!-- App Start -->
<div class="appwraper">
  <div class="container"> 
    
    <!--app info Start-->
    <div class="titleTop">
      <h3><?php _e('Download Our App', 'buy'); ?></h3>
    </div>
    <div class="subtitle2"><?php _e('A world market in your hand', 'buy'); ?></div>
    <p><?php _e('Aliquam vestibulum cursus felis. In iaculis iaculis sapien ac condimentum. Vestibulum congue posuere lacus, id tincidunt nisi porta sit amet. Suspendisse et sapien varius, pellentesque dui non, semper orci.', 'buy'); ?></p>
    <div class="appbtn">
		<a href="#" data-toggle="tooltip" data-placement="bottom" title="Download From Play Store"><i class="fa fa-android" aria-hidden="true"></i> <?php _e('Download', 'buy'); ?></a>
		<a href="#" data-toggle="tooltip" data-placement="bottom" title="Download From App Store"><i class="fa fa-apple" aria-hidden="true"></i> <?php _e('Download', 'buy'); ?></a>
		<a href="#" data-toggle="tooltip" data-placement="bottom" title="Download From Windows Store"><i class="fa fa-windows" aria-hidden="true"></i> <?php _e('Download', 'buy'); ?></a>
	</div>
    <!--app info end--> 
    
  </div>
</div>
<!-- App End --> 

<!-- Ads By Cities start -->
<div class="section">
  <div class="container"> 
    <!-- title start -->
    <div class="titleTop">
      <h3><?php _e('Ads By', 'buy'); ?> <span><?php _e('Cities', 'buy'); ?></span></h3>
      <p><?php _e('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc varius, orci id facilisis egestas, neque purus sagittis arcu, nec maximus quam odio nec elit Pellentesque eget ipsum mattis', 'buy'); ?></p>
    </div>
    <!-- title end -->
    <div class="topsearchwrap">
	<?php if(osc_count_list_cities()>0) {?>
      <ul class="row catelist">
      <?php while(osc_has_list_cities()) { ?>
          <li class="col-md-3 col-sm-6"><a href="<?php echo osc_search_url(array('sCity' => osc_list_city_name()));?>"><?php echo osc_list_city_name();?> <span>(<?php echo osc_list_city_items();?> <?php _e('Items', 'buy'); ?>)</span></a></li>
      <?php } ?>
      </ul>
	<?php } ?>
    </div>
    <div class="wideBanner margintop40">
		<img src="<?php echo osc_current_web_theme_url('images/google-ad-wide.jpg') ; ?>" alt="">
	</div>
  </div>
</div>
<!-- Ads By Cities ends -->
<?php osc_current_web_theme_path('footer.php') ; ?>