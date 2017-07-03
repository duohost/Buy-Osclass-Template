<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="<?php echo str_replace('_', '-', osc_current_user_locale()); ?>">
<head>
  <?php osc_current_web_theme_path('head.php') ; ?>
  <meta name="robots" content="noindex, nofollow" />
  <meta name="googlebot" content="noindex, nofollow" />
  <script type="text/javascript" src="<?php echo osc_current_web_theme_js_url('jquery.validate.min.js') ; ?>"></script>
  <script type="text/javascript">var RecaptchaOptions = {theme : 'white', custom_theme_widget: 'recaptcha_widget'};</script>
</head>
<?php osc_current_web_theme_path('header.php') ; ?>
<!-- Page Title start -->
<div class="pageTitle">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6">
        <h1 class="page-heading"><?php _e("Send message to friend", 'buy'); ?></h1>
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="breadCrumb"><a href="/"><?php _e("Home", 'buy'); ?></a> / <span><?php _e("Send message to friend", 'buy'); ?></span></div>
      </div>
    </div>
  </div>
</div>
<!-- Page Title End -->

<div class="listpgWraper">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <div class="userccount">
          <h5><?php _e("Send message to friend", 'buy'); ?></h5>
          <p><?php echo __('Send to a friend note about', 'buy') . ' '; ?><a href="<?php echo osc_item_url( ); ?>"><?php echo osc_item_title(); ?></a></p>
          
          <!-- form -->
		  <form id="sendfriend" name="sendfriend" action="<?php echo osc_base_url(true); ?>" method="post">
			<input type="hidden" name="action" value="send_friend_post" />
			<input type="hidden" name="page" value="item" />
			<input type="hidden" name="id" value="<?php echo osc_item_id(); ?>" />
          <div class="formpanel">
			<?php if(osc_is_web_user_logged_in()) { ?>
			  <input type="hidden" name="yourName" value="<?php echo osc_esc_html( osc_logged_user_name() ); ?>" />
			  <input type="hidden" name="yourEmail" value="<?php echo osc_logged_user_email();?>" />
			<?php } else { ?>
            <div class="formrow">
              <label for="yourName"><span><?php _e('Your name', 'buy'); ?></span> *</label> 
              <?php SendFriendForm::your_name(); ?>
              <div class="small-info"><?php _e('Your Real name or Username', 'buy'); ?></div>
            </div>
			<?php }; ?>
			<div class="formrow">
			  <label for="friendName"><span><?php _e("Your friend's name", 'buy'); ?></span> *</label>
			  <?php SendFriendForm::friend_name(); ?>
			  <div class="small-info"><?php _e('Real name or username of friend', 'buy'); ?></div>
            </div>
			<?php if(!osc_is_web_user_logged_in()) { ?>
			<div class="formrow">
				<label for="yourEmail"><span><?php _e('Your e-mail address', 'buy'); ?></span> *</label>
				<?php SendFriendForm::your_email(); ?>
				<div class="small-info"><?php _e('Friend can contact you back', 'buy'); ?></div>
            </div>
			<?php } ?>
			<div class="formrow">
			  <label for="friendEmail"><span><?php _e("Your friend's e-mail address", 'buy'); ?></span> *</label>
			  <?php SendFriendForm::friend_email(); ?>
			  <div class="small-info"><?php _e('Where your friend receive mail', 'buy'); ?></div>
            </div>
			<div class="formrow">
              <?php SendFriendForm::your_message(); ?>
            </div>
			<div class="formrow">
			  <div class="req-what">* <?php _e('This field is required', 'buy'); ?></div>
            </div>
			<div class="formrow">
				<?php osc_show_recaptcha(); ?>
			</div>
            <input type="submit" class="btn" value="<?php _e('Send message', 'buy'); ?>">
          </div>
		  </form>
          <!-- form  end--> 
          
        </div>
      </div>
    </div>
  </div>
</div>
<?php SendFriendForm::js_validation(); ?>
<?php osc_current_web_theme_path('footer.php') ; ?>