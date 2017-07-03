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
        <h1 class="page-heading"><?php _e("Login", 'buy');?></h1>
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="breadCrumb"><a href="#"><?php _e("Home", 'buy');?></a> / <span><?php _e("Login", 'buy');?></span></div>
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
          <h5><?php _e("User Login", 'buy');?></h5>
          <!-- login form -->
          <div class="formpanel">
			  <form action="<?php echo osc_base_url(true); ?>" method="post" >
				  <input type="hidden" name="page" value="login" />
				  <input type="hidden" name="action" value="login_post" />
				  <div class="formrow">
				    <input id="email" class="form-control" placeholder="<?php _e('E-mail', 'buy'); ?>" type="text" name="email" value="">
				  </div>
				  <div class="formrow">
				    <input id="password" class="form-control" placeholder="<?php _e('Password', 'buy'); ?>" type="password" name="password" value="" autocomplete="off">
				  </div>
				  <input type="submit" class="btn" value="<?php _e("Log in", 'buy');?>">
			  </form>
          </div>
          <!-- login form  end--> 
          
          <!-- sign up form -->
          <div class="newuser"><i class="fa fa-user" aria-hidden="true"></i> <a href="<?php echo osc_recover_user_password_url() ; ?>"><?php _e("Forgot password", 'buy') ; ?></a></div>
          <!-- sign up form end-->
          
          <div class="socialLogin">
            <h5><?php _e("Login Or Register with Social", 'buy');?></h5>
			<?php if (function_exists('Authenhfic_Login')) { Authenhfic_Login(); } ?>
		  </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php osc_current_web_theme_path('footer.php') ; ?>