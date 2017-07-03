<?php osc_goto_first_locale(); ?>
<!-- Header start -->
<div class="header">
  <div class="container">
    <div class="row">
      <div class="col-md-2 col-sm-3 col-xs-12">
		<a class="logo" href="<?php echo osc_base_url() ; ?>"><?php echo logo_header(); ?></a>
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        </div>
        <div class="clearfix"></div>
      </div>
      <div class="col-md-10 col-sm-12 col-xs-12"> 
        <!-- Nav start -->
        <div class="navbar navbar-default" role="navigation">
          <div class="navbar-collapse collapse" id="nav-main">
			<ul class="nav navbar-nav">
			  <li><a href="<?php echo osc_base_url() ; ?>" ><?php _e('Home', 'buy'); ?></a></li>
			  <?php osc_reset_static_pages(); ?>
			  <?php while(osc_has_static_pages()) { ?>
				<li><a href="<?php echo osc_static_page_url(); ?>" title="<?php echo osc_esc_html(osc_static_page_title()); ?>">
					<?php echo ucfirst(osc_static_page_title());?></a>
				</li>
			  <?php } ?>
			  <li class="dropdown"><a href="#."><?php _e('Categories', 'buy'); ?> <span class="caret"></span></a> 
				<!-- dropdown start -->
				<ul class="dropdown-menu">
				  <?php osc_goto_first_category(); $c = 1; ?>
				  <?php while(osc_has_categories() and $c <= 8) { ?>
					<li><a href="<?php echo osc_search_category_url() ; ?>" title="<?php echo osc_esc_html(osc_category_name()); ?>">
						<?php echo ucfirst(osc_category_name());?></a>
					</li>
				  <?php $c++; } ?>
				</ul>
				<!-- dropdown end --> 
			  </li>
			  <li><a href="news"><?php _e('Blog', 'buy'); ?></a></li>
			  <li><a href="<?php echo osc_contact_url(); ?>"><?php _e('Contact', 'buy'); ?></a></li>
				<?php if( osc_users_enabled() || ( !osc_users_enabled() && !osc_reg_user_post() )) { ?>
					<li class="postad"><a href="<?php echo osc_item_post_url_in_category(); ?>"><?php _e('Post an Ad', 'buy');?></a></li>
				<?php } ?>
				<?php if(osc_users_enabled()) { ?>
				  <?php if( osc_is_web_user_logged_in() ) { ?>
					<li class="register"><a href="<?php echo osc_user_logout_url() ; ?>"><i class="fa fa-sign-out"></i><?php _e('Logout', 'buy') ; ?></a></li>
					<li class="register"><a href="<?php echo osc_user_dashboard_url() ; ?>"><?php _e('My account', 'buy') ; ?></a></li>
				  <?php } else { ?>
					<?php if(osc_user_registration_enabled()) { ?>
					  <li class="register"><a href="<?php echo osc_register_account_url() ; ?>"><?php _e('Sign in', 'buy'); ?></a></li>
					<?php } ?>  
				  <?php } ?>
				<?php } ?>
			</ul>
            <!-- Nav collapes end --> 
          </div>
          <div class="clearfix"></div>
        </div>
        <!-- Nav end --> 
      </div>
    </div>
    <!-- row end --> 
  </div>
  <!-- Header container end --> 
</div>
<!-- Header end -->
<?php osc_show_flash_message(); ?>

<?php View::newInstance()->_erase('countries'); ?>
<?php View::newInstance()->_erase('regions'); ?>
<?php View::newInstance()->_erase('cities'); ?>