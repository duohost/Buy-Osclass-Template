<?php
  $locales = __get('locales');
  $user = osc_user();
?>

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
        <h1 class="page-heading"><?php _e('Edit Profile', 'buy') ; ?></h1>
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="breadCrumb"><a href="<?php echo osc_base_url() ; ?>"><?php _e('Home', 'buy') ; ?></a> / <span><?php _e('Edit Profile', 'buy') ; ?></span></div>
      </div>
    </div>
  </div>
</div>
<!-- Page Title End -->

<div class="listpgWraper">
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="userccount">
          <div class="formpanel"> 
			<?php UserForm::location_javascript(); ?>
			<form action="<?php echo osc_base_url(true) ; ?>" method="post">
			<input type="hidden" name="page" value="user" />
			<input type="hidden" name="action" value="profile_post" />
            <!-- Personal Information -->
            <h5><?php _e('Personal Information', 'buy') ; ?></h5>
            <div class="row">
              <div class="col-md-6">
                <div class="formrow">
					<div class="row">
					  <label for="name"><span><?php _e('Name', 'buy') ; ?></span><span class="req">*</span></label>
					  <?php UserForm::name_text(osc_user()) ; ?>
					</div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="formrow">
					<div class="row">
					  <label for="email"><span><?php _e('E-mail', 'buy') ; ?></span><span class="req">*</span></label>
					  <span class="update">
						<?php echo osc_user_email() ; ?><br />
						<a href="<?php echo osc_change_user_email_url() ; ?>"><?php _e('Modify e-mail', 'buy') ; ?></a>
						<br />
						<a href="<?php echo osc_change_user_password_url() ; ?>" ><?php _e('Modify password', 'buy') ; ?></a>
					  </span>
					</div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="formrow">
					<div class="row">
					  <label for="phoneMobile"><span><?php _e('Mobile phone', 'buy'); ?></span><span class="req">*</span></label>
					  <?php UserForm::mobile_text(osc_user()) ; ?>
					</div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="formrow">
					<div class="row">
					  <label for="phoneLand"><?php _e('Land Phone', 'buy') ; ?></label>
					  <?php UserForm::phone_land_text(osc_user()) ; ?>
					</div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="formrow">
					<div class="row">
					  <label for="info"><?php _e('Some info about you', 'buy') ; ?></label>
					  <?php UserForm::multilanguage_info($locales, osc_user()); ?>
					</div>
					<div class="req-what"><div class="req">*</div><div class="small-info"><?php _e('This field is required', 'buy'); ?></div></div>
                </div>
              </div>
            </div>
            <hr>
            
            <!-- Skills -->
            <h5><?php _e('Business information & location', 'buy'); ?></h5>
            <div class="row">
              <div class="col-md-6">
                <div class="formrow">
					<div class="row">
					  <label for="user_type"><?php _e('User type', 'buy') ; ?></label>
					  <?php UserForm::is_company_select(osc_user()) ; ?>
					</div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="formrow">
					<div class="row">
					  <label for="webSite"><?php _e('Website', 'buy') ; ?></label>
					  <?php UserForm::website_text(osc_user()) ; ?>
					</div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="formrow">
					<?php $user = osc_user(); ?>
					<?php $country = Country::newInstance()->listAll(); ?>

					<?php 
					  if(count($country) <= 1) {
						$u_country = Country::newInstance()->listAll();
						$u_country = $u_country[0];
						$user['fk_c_country_code'] = $u_country['pk_c_code'];
					  }
					?>

					<div class="row" <?php if(count($country) == 1) { ?>style="display:none;"<?php } ?>>
					  <label for="country"><span><?php _e('Country', 'buy') ; ?></span><span class="req">*</span></label>
					  <?php UserForm::country_select(Country::newInstance()->listAll(), osc_user()); ?>
					</div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="formrow">
					<div class="row">
					  <label for="region"><span><?php _e('Region', 'buy') ; ?></span><span class="req">*</span></label>
					  <?php UserForm::region_select(osc_get_regions($user['fk_c_country_code']), osc_user()) ; ?>
					</div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="formrow">
					<div class="row">
					  <label for="city"><span><?php _e('City', 'buy') ; ?></span><span class="req">*</span></label>
					  <?php UserForm::city_select(osc_get_cities($user['fk_i_region_id']), osc_user()) ; ?>
					</div>
                </div>
              </div>
			  <div class="col-md-12">
                <div class="formrow">
					<div class="row">
					  <label for="address"><?php _e('Address', 'buy') ; ?></label>
					  <?php UserForm::address_text(osc_user()) ; ?>
					</div>
                </div>
              </div>
			  <div class="col-md-12">
                <div class="formrow">
                  <?php osc_run_hook('user_form') ; ?>
                </div>
              </div>
            </div>
            <hr>
			<br>
			  <button type="submit" id="blue" class="btn"><?php _e('Update profile', 'buy') ; ?></button>
			<br/>
			  <?php //if (strpos($_SERVER[HTTP_HOST],'os-themes') === false) { ?>
				<a id="uniform-gray" class="btn" href="<?php echo osc_base_url(true).'?page=user&action=delete&id='.osc_user_id().'&secret='.$user['s_secret']; ?>" onclick="return confirm('<?php _e('Are you sure you want to delete your account? This action cannot be undone', 'buy'); ?>?')"><span><?php _e('Delete account', 'buy'); ?></span></a>
			  <?php //} ?>
		  </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php osc_current_web_theme_path('footer.php') ; ?>