<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="<?php echo str_replace('_', '-', osc_current_user_locale()); ?>">
<head>
  <?php osc_current_web_theme_path('head.php') ; ?>
  <meta name="robots" content="noindex, nofollow" />
  <meta name="googlebot" content="noindex, nofollow" />
  <script type="text/javascript" src="<?php echo osc_current_web_theme_js_url('jquery.validate.min.js') ; ?>"></script>
  <script type="text/javascript">var RecaptchaOptions = {theme : 'white',custom_theme_widget: 'recaptcha_widget'};</script>
</head>
  <?php osc_current_web_theme_path('header.php') ; ?>

<!-- Page Title start -->
<div class="pageTitle">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6">
        <h1 class="page-heading"><?php _e("Contact us", 'buy'); ?></h1>
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="breadCrumb"><a href="/"><?php _e("Home", 'buy'); ?></a> / <span><?php _e("Contact us", 'buy'); ?></span></div>
      </div>
    </div>
  </div>
</div>
<!-- Page Title End --> 

<!-- Contact us -->
<div class="inner-page">
  <div class="container">
    <div class="contact-wrap">
      <div class="title"> <span><?php _e("We Are Here For Your Help", 'buy'); ?></span>
        <h2><?php _e("GET IN TOUCH FAST", 'buy'); ?></h2>
        <p><?php _e("Vestibulum at magna tellus. Vivamus sagittis nunc aliquet. Vivamin orci aliquam", 'buy'); ?><br>
          <?php _e("eros vel saphicula. Donec eget ultricies ipsmconsequat.", 'buy'); ?></p>
      </div>
      <div class="row"> 
        <!-- Contact Info -->
        
        <div class="contact-now">
          <div class="col-md-4 column">
            <div class="contact"> <span><i class="fa fa-home"></i></span>
              <div class="information"> <strong><?php _e("Address:", 'buy'); ?></strong>
                <p><?php _e("8500 lorem, New Ispum, Dolor amet sit 12301", 'buy'); ?></p>
              </div>
            </div>
          </div>
          <!-- Contact Info -->
          <div class="col-md-4 column">
            <div class="contact"> <span><i class="fa fa-envelope"></i></span>
              <div class="information"> <strong><?php _e("Email Address:", 'buy'); ?></strong>
                <p><?php _e("investigate@your-site.com", 'buy'); ?></p>
                <p><?php _e("investigate@your-site.com", 'buy'); ?></p>
              </div>
            </div>
          </div>
          <!-- Contact Info -->
          <div class="col-md-4 column">
            <div class="contact"> <span><i class="fa fa-phone"></i></span>
              <div class="information"> <strong><?php _e("Phone No:", 'buy'); ?></strong>
                <p><?php _e("+12 345 67 09", 'buy'); ?></p>
                <p><?php _e("+12 345 67 09", 'buy'); ?></p>
              </div>
            </div>
          </div>
          <!-- Contact Info --> 
        </div>
        <div class="col-md-4 column"> 
          <!-- Google Map -->
          <div class="googlemap">
            <!-- Your Map -->
          </div>
        </div>
        
        <!-- Contact form -->
        <div class="col-md-8 column">
          <div class="contact-form">
            <div id="message"></div>
		    <form action="<?php echo osc_base_url(true) ; ?>" method="post" name="contact" id="contact">
			<input type="hidden" name="page" value="contact" />
			<input type="hidden" name="action" value="contact_post" />
              <div class="row">
			<?php if(osc_is_web_user_logged_in()) { ?>
			  <input type="hidden" name="yourName" value="<?php echo osc_esc_html( osc_logged_user_name() ); ?>" />
			  <input type="hidden" name="yourEmail" value="<?php echo osc_logged_user_email();?>" />
			<?php } else { ?>
			  <div class="col-md-6">
				<label for="yourName"><span><?php _e('Your name', 'buy'); ?></span></label> 
				<?php ContactForm::your_name() ; ?>
				<div class="small-info"><?php _e('Your Real name or Username', 'buy'); ?></div>
			  </div>

			  <div class="col-md-6">
				<label for="yourEmail"><span><?php _e('Your e-mail address', 'buy'); ?></span><div class="req">*</div></label>
				<?php ContactForm::your_email(); ?>
				<div class="small-info"><?php _e('We can contact you back', 'buy'); ?></div>
			  </div>
			<?php } ?>
                <div class="col-md-6">
				  <label for="subject"><span><?php _e("Subject", 'buy'); ?></span><div class="req">*</div></label>
				  <?php ContactForm::the_subject() ; ?>
				  <div class="small-info"><?php _e('Summary of reason to contact', 'buy'); ?></div>
                </div>
                <div class="col-md-12">
					<?php ContactForm::your_message() ; ?>
					<div class="req-what"><div class="req">*</div><div class="small-info"><?php _e('This field is required', 'buy'); ?></div></div>
                </div>
                <div class="col-md-12">
                  <?php osc_show_recaptcha(); ?>
                </div>
                <div class="col-md-12">
                  <button class="button" type="submit" id="submit"><?php _e('Send message', 'buy'); ?></button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
  <?php ContactForm::js_validation() ; ?>
  <?php osc_current_web_theme_path('footer.php') ; ?>