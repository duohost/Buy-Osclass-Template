<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="<?php echo str_replace('_', '-', osc_current_user_locale()); ?>">
<head>
  <?php osc_current_web_theme_path('head.php') ; ?>
  <meta name="robots" content="noindex, nofollow" />
  <meta name="googlebot" content="noindex, nofollow" />
  <script type="text/javascript" src="<?php echo osc_current_web_theme_js_url('jquery.validate.min.js') ; ?>"></script>
</head>
<body>
  <?php UserForm::js_validation() ; ?>
  <?php osc_current_web_theme_path('header.php') ; ?>
<!-- Page Title start -->
<div class="pageTitle">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6">
        <h1 class="page-heading"><?php _e('Register', 'buy'); ?></h1>
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="breadCrumb"><a href="/"><?php _e('Home', 'buy'); ?></a> / <span><?php _e('Register', 'buy'); ?></span></div>
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
          
          <div class="alert alert-success" role="alert"><strong><?php _e('Well done!', 'buy'); ?></strong> <?php _e('Your account successfully created.', 'buy'); ?></div>
          <div class="alert alert-warning" role="alert"><strong><?php _e('Warning!', 'buy'); ?></strong> <?php _e('Better check yourself, you re not looking too good.', 'buy'); ?></div>
          <div class="alert alert-danger" role="alert"><strong><?php _e('Oh snap!', 'buy'); ?></strong> <?php _e('Change a few things up and try submitting again.', 'buy'); ?></div>
          <div class="userbtns">
            <ul class="nav nav-tabs">
              <li class="active"><a data-toggle="tab" href="#wsell"><?php _e('I want to sell', 'buy'); ?></a></li>
            </ul>
          </div>
          <div class="tab-content">
            <div id="wsell" class="formpanel tab-pane fade in active">
			  <form name="register" id="register" action="<?php echo osc_base_url(true) ; ?>" method="post" >
			  <input type="hidden" name="page" value="register" />
			  <input type="hidden" name="action" value="register_post" />
				  <div class="formrow">
				    <input id="s_name" type="text" class="form-control" placeholder="<?php _e('Name', 'buy') ; ?>" name="s_name" value="">
				  </div>
				  <div class="formrow">
					<input id="s_password" class="form-control" placeholder="<?php _e('Password', 'buy') ; ?>" type="password" name="s_password" value="" autocomplete="off">
				  </div>
				  <div class="formrow">
					<input id="s_password2" class="form-control" placeholder="<?php _e('Re-type password', 'buy') ; ?>" type="password" name="s_password2" value="" autocomplete="off">
				  </div>
					<p id="password-error" style="display:none;">
					  <div class="alert alert-success" role="alert"><strong><?php _e('Passwords don\'t match', 'buy') ; ?>.</strong></div>
					</p>
				  <div class="formrow">
					<input id="s_email" class="form-control" placeholder="<?php _e('E-mail', 'buy') ; ?>" type="text" name="s_email" value="">
				  </div>
				  <div class="formrow">
					<input id="s_phone_mobile" type="text" name="s_phone_mobile" value="" class="form-control" placeholder="<?php _e('Mobile Phone', 'buy'); ?>">
				  </div>
				  <div class="formrow">
					<?php osc_run_hook('user_register_form') ; ?>
					<script type="text/javascript">var RecaptchaOptions = {theme : 'white'};</script>
					<?php osc_show_recaptcha('register'); ?>
				  </div>
				  <div class="formrow">
					<input type="checkbox" value="agree text" name="agree" />
					<?php _e('This field is required', 'buy'); ?>
				  </div>
				  <input type="submit" class="btn" value="<?php _e('Create account', 'buy') ; ?>">
			   </form>
            </div>
          </div>
          <div class="newuser"><i class="fa fa-user" aria-hidden="true"></i> <?php _e('Already a Member?', 'buy') ; ?> <a href="/user/login"><?php _e('Login Here', 'buy') ; ?></a></div>
          <div class="socialLogin">
            <h5><?php _e('Login Or Register with Social', 'buy') ; ?></h5>
            <?php if (function_exists('Authenhfic_Login')) { Authenhfic_Login(); } ?>
		  </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php osc_current_web_theme_path('footer.php') ; ?>