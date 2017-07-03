<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="<?php echo str_replace('_', '-', osc_current_user_locale()); ?>">
<head>
  <?php osc_current_web_theme_path('head.php') ; ?>
  <meta name="robots" content="noindex, nofollow" />
  <meta name="googlebot" content="noindex, nofollow" />
</head>
<?php osc_current_web_theme_path('header.php') ; ?>
<!-- Page Title start -->
<div class="pageTitle">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6">
        <h1 class="page-heading">Forgot Password</h1>
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="breadCrumb"><a href="#">Home</a> / <span>Forgot Password</span></div>
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
          <h5><?php _e('Recover your password', 'buy'); ?></h5>
          <p>Nam ea eripuit assueverit, invenire delicatissimi ad pro, an dicam principes duo. Paulo prodesset duo ad. Duo eu summo verear. Natum gubergren definitionem id usu, graeco cetero ius ut.</p>
          
          <!-- form -->
          <div class="formpanel">
		  <form action="<?php echo osc_base_url(true) ; ?>" method="post" >
		  <input type="hidden" name="page" value="login" />
		  <input type="hidden" name="action" value="forgot_post" />
		  <input type="hidden" name="userId" value="<?php echo osc_esc_html(Params::getParam('userId')); ?>" />
		  <input type="hidden" name="code" value="<?php echo osc_esc_html(Params::getParam('code')); ?>" />
            <div class="formrow">
              <input type="text" class="form-control" placeholder="Enter Email Address">
            </div>
			<div class="formrow">
				<div>
				  <label for="new_email"><?php _e('New pasword', 'buy') ; ?></label><br />
				  <input type="password" name="new_password" value="" />
				</div>
            </div>
			<div class="formrow">
			  <label for="new_email"><?php _e('Repeat new pasword', 'buy') ; ?></label><br />
			  <input type="password" class="form-control" name="new_password2" value="" />
            </div>
            <input type="submit" class="btn" value="<?php _e('Change password', 'buy') ; ?>">
		  </form>
          </div>
          <!-- form  end--> 
          
        </div>
      </div>
    </div>
  </div>
</div>
<?php osc_current_web_theme_path('footer.php') ; ?>