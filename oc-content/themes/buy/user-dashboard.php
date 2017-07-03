<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="<?php echo str_replace('_', '-', osc_current_user_locale()); ?>">
<head>
  <?php osc_current_web_theme_path('head.php') ; ?>
  <meta name="robots" content="noindex, nofollow" />
  <meta name="googlebot" content="noindex, nofollow" />
</head>
  <?php osc_current_web_theme_path('header.php'); ?>

<!-- Page Title start -->
<div class="pageTitle">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6">
        <h1 class="page-heading"><?php echo _e('Dashboard', 'buy'); ?></h1>
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="breadCrumb"><span><?php echo __('Hello', 'buy') . ' <span class="bold">' . osc_logged_user_name() . '</span>, ' .__('welcome to your account', 'buy'); ?>!</span></div>
      </div>
    </div>
  </div>
</div>
<!-- Page Title End -->

<div class="inner-page">
  <div class="container">
    <div class="row">
      <div class="col-md-3 col-sm-4">
        <ul class="usernavdash">
			<?php echo osc_private_user_menu() ; ?>
        </ul>
        <div class="adimages">
			<img src="<?php echo osc_current_web_theme_url('images/large-ad.jpg') ; ?>" alt="google ad">
		</div>
      </div>
      <div class="col-md-9 col-sm-8">
        <ul class="row profilestat">
          <li class="col-md-2 col-sm-4 col-xs-6">
            <div class="inbox"> <i class="fa fa-eye" aria-hidden="true"></i>
              <h6>
				<?php
					$logged_user = User::newInstance()->findByPrimaryKey(osc_logged_user_id());
					echo $logged_user['i_items'];
				?>
			  </h6>
              <strong><?php echo _e('Your Ads', 'buy'); ?></strong> </div>
          </li>
          <li class="col-md-2 col-sm-4 col-xs-6">
            <div class="inbox"> <i class="fa fa-tachometer" aria-hidden="true"></i>
              <h6><?php echo osc_total_active_items() ; ?></h6>
              <strong><?php echo _e('Active Ads', 'buy'); ?></strong> </div>
          </li>
          <li class="col-md-2 col-sm-4 col-xs-6">
            <div class="inbox"> <i class="fa fa-clock-o" aria-hidden="true"></i>
              <h6><?php echo osc_total_items_today() ; ?></h6>
              <strong><?php echo _e('Ads Today', 'buy'); ?></strong> </div>
          </li>
          <li class="col-md-2 col-sm-4 col-xs-6">
            <div class="inbox"> <i class="fa fa-user" aria-hidden="true"></i>
              <h6><?php echo _e('21', 'buy'); ?></h6>
              <strong><?php echo _e('Followers', 'buy'); ?></strong> </div>
          </li>
          <li class="col-md-2 col-sm-4 col-xs-6">
            <div class="inbox"> <i class="fa fa-briefcase" aria-hidden="true"></i>
              <h6><?php echo _e('2', 'buy'); ?></h6>
              <strong><?php echo _e('Business Pro', 'buy'); ?></strong> </div>
          </li>
          <li class="col-md-2 col-sm-4 col-xs-6">
            <div class="inbox"> <i class="fa fa-envelope-o" aria-hidden="true"></i>
              <h6><?php echo _e('11', 'buy'); ?></h6>
              <strong><?php echo _e('Messages', 'buy'); ?></strong> </div>
          </li>
        </ul>
        <div class="instoretxt">
          <div class="credit"><?php echo _e('Your on site available credit is:', 'buy'); ?> <strong><?php echo _e('$99.00', 'buy'); ?></strong></div>
          <a href="#."><?php echo _e('Update Package', 'buy'); ?></a> <a href="#." class="history"><?php echo _e('Payment History', 'buy'); ?></a>
 	    </div>

        <div class="myads">
          <h3><?php echo _e('My Recent Ads', 'buy'); ?></h3>
          <ul class="searchList">
            <!-- ad start -->
		  <?php if(osc_count_items() == 0) { ?>
			<div class="empty"><?php _e('No listings have been added yet', 'buy'); ?></div>
		  <?php } else { ?>
			<?php $c = 1; ?>
			<?php while(osc_has_items()) { ?>
            <li>
              <div class="row">
                <div class="col-md-2 col-sm-4">
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
					<?php if(osc_item_is_premium()) { ?>
					  <div class="new">
						<span class="top"><?php _e('top', 'buy'); ?></span>
						<span class="bottom"><?php _e('item', 'buy'); ?></span>
					  </div>
					<?php } ?>
				  </div>
                </div>
                <div class="col-md-10 col-sm-8">
                  <div class="jobinfo">
                    <div class="row">
                      <div class="col-md-8 col-sm-7">
                        <h3><a href="<?php echo osc_item_url(); ?>"><?php echo osc_item_title(); ?></a></h3>
                        <div class="cateName"> <a href="<?php echo osc_search_url(array('sCategory' => osc_item_category_id())); ?>"><?php echo osc_item_category(); ?></a></div>
                        <div class="location"><i class="fa fa-map-marker" aria-hidden="true"></i> <span><?php echo osc_item_city(); ?></span></div>
                        <div class="clearfix"></div>
                        <p><?php echo osc_highlight(osc_item_description(), 100); ?></p>
                        <div class="listbtn"><a href="<?php echo osc_item_url(); ?>"><?php _e('View Details', 'buy'); ?></a></div>
                      </div>
                      <div class="col-md-4 col-sm-5 text-right">
                        <div class="adprice"><?php if( osc_price_enabled_at_items() ) { echo osc_format_price(osc_item_price()); } ?></div>
						<a href="<?php echo osc_item_edit_url(); ?>" class="editad"><i class="fa fa-wrench"></i>&nbsp;<?php _e('Edit', 'buy'); ?></a>
						<?php if(osc_item_is_inactive()) {?>
						<a href="<?php echo osc_item_activate_url();?>" ><i class="fa fa-rocket"></i>&nbsp;<?php _e('Activate', 'buy'); ?></a>
						<?php } ?>
  					  </div>
                    </div>
                  </div>
                </div>
              </div>
            </li>
            <?php $c++; ?>
            <?php } ?>
			<?php } ?>
            <!-- ad end --> 
          </ul>
        </div>
		<div class="instoretxt">
		  <div class="count-alerts round2">
			<?php $alerts = Alerts::newInstance()->findByUser( osc_logged_user_id()); ?>
			<h5><i class="fa fa-bell-o"></i>&nbsp;<?php echo __('You have', 'buy') . ' <strong>' . count($alerts) . '</strong> ' . __('alerts, you can check them in section', 'buy'); ?> <a href="<?php echo osc_user_alerts_url(); ?>"><?php echo _e('Manage your alerts', 'buy'); ?></a></h5>
		  </div>

		  <?php $u = User::newInstance()->findByPrimaryKey(osc_logged_user_id()); ?>

		  <?php if($u['s_website'] == '' or ($u['s_phone_land'] == '' and $u['s_phone_mobile'] == '') or $u['s_country'] == '' or $u['s_region'] == '' or $u['s_city'] == '' or $u['s_address'] == '') { ?>
			<div class="inform-profile">
			  <h5><i class="fa fa-warning"></i>&nbsp;<?php echo __('You profile is not complete!', 'buy'); ?></h5>

			  <div class="i-block">
				<span class="descr"><?php echo _e('We found that your profile is still not complete! Take a minute and enter as much information as possible, this will help you sell your stuffs faster.', 'buy'); ?></span>

				<?php if($u['s_phone_land'] == '' and $u['s_phone_mobile'] == '') { ?><span class="entry"><i class="fa fa-exclamation"></i>&nbsp;<?php echo _e('No phone number was entered. You should enter at least 1 phone number to your mobile or land phone', 'buy'); ?></span><?php } ?>
				<?php if($u['s_website'] == '') { ?><span class="entry"><i class="fa fa-exclamation"></i>&nbsp;<?php echo _e('You did not entered your website', 'buy'); ?></span><?php } ?>
				<?php if($u['s_country'] == '') { ?><span class="entry"><i class="fa fa-exclamation"></i>&nbsp;<?php echo _e('Country was not entered', 'buy'); ?></span><?php } ?>
				<?php if($u['s_region'] == '') { ?><span class="entry"><i class="fa fa-exclamation"></i>&nbsp;<?php echo _e('Region was not entered', 'buy'); ?></span><?php } ?>
				<?php if($u['s_city'] == '') { ?><span class="entry"><i class="fa fa-exclamation"></i>&nbsp;<?php echo _e('City was not entered', 'buy'); ?></span><?php } ?>
				<?php if($u['s_address'] == '') { ?><span class="entry"><i class="fa fa-exclamation"></i>&nbsp;<?php echo _e('Address was not entered', 'buy'); ?></span><?php } ?>
			  </div>
			</div>
		  <?php } else { ?>
			<div class="inform-profile-ok"><i class="fa fa-thumbs-o-up"></i>&nbsp;<?php echo _e('Your profile is complete!', 'buy'); ?></div>
		  <?php } ?>
		</div>
      </div>
    </div>
  </div>
</div>
<?php osc_current_web_theme_path('footer.php') ; ?>