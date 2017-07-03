<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="<?php echo str_replace('_', '-', osc_current_user_locale()); ?>">
  <head>
    <?php osc_current_web_theme_path('head.php') ; ?>
    <meta name="robots" content="noindex, nofollow" />
    <meta name="googlebot" content="noindex, nofollow" />
    <script type="text/javascript" src="<?php echo osc_current_web_theme_js_url('jquery.validate.min.js') ; ?>"></script>
  </head>
    <?php osc_current_web_theme_path('header.php') ; ?>
	<!-- Page Title start -->
	<div class="pageTitle">
	  <div class="container">
		<div class="row">
		  <div class="col-md-6 col-sm-6">
			<h1 class="page-heading"><?php _e('404 Error Page', 'buy'); ?></h1>
		  </div>
		  <div class="col-md-6 col-sm-6">
			<div class="breadCrumb"><a href="<?php echo osc_base_url();?>"><?php _e('Home', 'buy'); ?></a> / <span><?php _e('404 Error', 'buy'); ?></span></div>
		  </div>
		</div>
	  </div>
	</div>
	<!-- Page Title End -->

	<div class="error-page-wrap">
	  <div class="container">
		<div class="errormain">
		  <h2><?php _e('404', 'buy'); ?></h2>
		  <h3><?php _e('Page was not Found', 'buy'); ?></h3>
		  <div class="error-msg">
			<p><?php _e('Whoops, something is wrong', 'buy'); ?></p>
			<p><?php _e('We are sorry, but the Web address you have entered is no longer available.', 'buy'); ?></p>
			<p><?php _e('To find a correct listing, please use search box above.', 'buy'); ?></p>
			<a href="<?php echo osc_base_url();?>" class="btn"><?php _e('Go to Home Page', 'buy'); ?></a> </div>
		</div>
	  </div>
	</div>
    <?php osc_current_web_theme_path('footer.php') ; ?>