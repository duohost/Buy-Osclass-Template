<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="<?php echo str_replace('_', '-', osc_current_user_locale()); ?>">
<head>
  <?php osc_current_web_theme_path('head.php'); ?>
  <meta name="robots" content="noindex, nofollow" />
  <meta name="googlebot" content="noindex, nofollow" />
</head>
<?php osc_current_web_theme_path('header.php'); ?>
<!-- Page Title start -->
<div class="pageTitle">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6">
        <h1 class="page-heading"><?php _e('Change your password', 'buy'); ?></h1>
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="breadCrumb"><a href="<?php echo osc_base_url() ; ?>"><?php _e('Home', 'buy'); ?></a> / <span><?php _e('Change your password', 'buy'); ?></span></div>
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
          <h5><?php _e('Change your password', 'buy'); ?></h5>
          <p><?php _e('Nam ea eripuit assueverit, invenire delicatissimi ad pro, an dicam principes duo. Paulo prodesset duo ad. Duo eu summo verear. Natum gubergren definitionem id usu, graeco cetero ius ut.', 'buy'); ?></p>
          
          <!-- form -->
          <div class="formpanel">
			<form action="<?php echo osc_base_url(true); ?>" method="post">
				<input type="hidden" name="page" value="user" />
				<input type="hidden" name="action" value="change_password_post" />
				<div class="formrow">
				  <input type="password" class="form-control" placeholder="<?php _e('Current password', 'buy'); ?> *" name="password" id="password" value="" />
				</div>
				<div class="formrow">
				  <input type="password" class="form-control" placeholder="<?php _e('New password', 'buy'); ?> *" name="new_password" id="new_password" value="" />
				</div>
				<div class="formrow">
				  <input type="password" class="form-control" placeholder="<?php _e('Repeat new password', 'buy'); ?> *" name="new_password2" id="new_password2" value="" />
				</div>
				<input type="submit" class="btn" value="<?php _e('Update', 'buy'); ?>">
			</form>
          </div>
          <!-- form  end--> 
          
        </div>
      </div>
    </div>
  </div>
</div>
<?php osc_current_web_theme_path('footer.php'); ?>