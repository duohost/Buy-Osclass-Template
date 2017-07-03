<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="<?php echo str_replace('_', '-', osc_current_user_locale()); ?>">
  <head>
    <?php osc_current_web_theme_path('head.php') ; ?>
    <meta name="robots" content="noindex, nofollow" />
    <meta name="googlebot" content="noindex, nofollow" />
  </head>
    <?php osc_current_web_theme_path('header.php') ; ?>
    <?php osc_reset_static_pages(); ?>

	<!-- Page Title start -->
	<div class="pageTitle">
	  <div class="container">
		<div class="row">
		  <div class="col-md-6 col-sm-6">
			<h1 class="page-heading"><?php echo osc_static_page_title(); ?></h1>
		  </div>
		  <div class="col-md-6 col-sm-6">
			<div class="breadCrumb"><a href="/"><?php _e("Home", 'buy'); ?></a> / <span><?php echo osc_static_page_title(); ?></span></div>
		  </div>
		</div>
	  </div>
	</div>
	<!-- Page Title End -->

	<div class="about-wraper"> 
	  <!-- About -->
	  <div class="container">
		<div class="section">
		  <div class="row">
			<div class="col-md-12">
			  <h2><?php echo osc_static_page_title(); ?></h2>
			  <p><?php echo osc_static_page_text(); ?></p>
			</div>
		  </div>
		</div>
	  </div>
	</div>
    <?php osc_current_web_theme_path('footer.php') ; ?>