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
        <h1 class="page-heading"><?php _e('My Active Ads', 'buy') ; ?></h1>
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="breadCrumb"><a href="<?php echo osc_base_url() ; ?>"><?php _e('Home', 'buy') ; ?></a> <span><?php _e('My Active Ads', 'buy') ; ?></span></div>
      </div>
    </div>
  </div>
</div>
<!-- Page Title End -->

<div class="inner-page">
  <div class="container">
    <div class="row">
      <div class="col-md-3 col-sm-4">
        <ul class="usernavdash">
          <?php echo osc_private_user_menu() ; ?>
        </ul>
        <div class="adimages"> <img src="<?php echo osc_current_web_theme_url('images/large-ad.jpg') ; ?>" alt="google ad"> </div>
      </div>
      <div class="col-md-9 col-sm-8">
        <div class="myads">
          <h3><?php _e('My Active Ads', 'buy') ; ?></h3>
          <ul class="searchList">
			<?php if(osc_count_items() == 0) { ?>
			  <div class="empty"><?php _e("You did not publish any listings yet", 'buy'); ?></div>
			<?php } else { ?>
            <!-- ad start -->
			<?php while(osc_has_items()) { ?>
            <li>
              <div class="row">
                <div class="col-md-2 col-sm-4">
                  <div class="adimg">
					<?php if(osc_count_item_resources()) { ?>
						<a href="<?php echo osc_item_url(); ?>">
							<img src="<?php echo osc_resource_thumbnail_url(); ?>" title="<?php echo osc_esc_html(osc_item_title()); ?>" alt="<?php echo osc_esc_html(osc_item_title()); ?>" />
						</a>
					<?php } else { ?>
						<a href="<?php echo osc_item_url(); ?>">
							<img src="<?php echo osc_current_web_theme_url('images/no-image.png'); ?>" title="<?php echo osc_esc_html(osc_item_title()); ?>" alt="<?php echo osc_esc_html(osc_item_title()); ?>" />
						</a>
					<?php } ?>
					<?php if(osc_item_is_premium()) { ?>
					  <div class="new">
						<span class="top"><?php _e('top', 'buy'); ?></span>
						<span class="bottom"><?php _e('item', 'buy'); ?></span>
					  </div>
					<?php } ?>
				  </div>
                </div>
                <div class="col-md-10 col-sm-8">
                  <div class="jobinfo">
                    <div class="row">
                      <div class="col-md-8 col-sm-7">
                        <h3><a href="<?php echo osc_item_url(); ?>"><?php echo osc_item_title(); ?></a></h3>
                        <div class="cateName"> <a href="<?php echo osc_search_url(array('sCategory' => osc_item_category_id())); ?>"><?php echo osc_item_category(); ?></a></div>
                        <div class="location"><i class="fa fa-map-marker" aria-hidden="true"></i> <span><?php echo osc_item_city(); ?></span></div>
                        <div class="clearfix"></div>
                        <p><?php echo osc_highlight(osc_item_description(), 100); ?></p>
                        <div class="listbtn"><a href="<?php echo osc_item_url(); ?>"><?php _e('View Details', 'buy'); ?></a></div>
                      </div>
                      <div class="col-md-4 col-sm-5 text-right">
					  <?php if( osc_price_enabled_at_items() ) { ?>
						<div class="adprice"><?php echo osc_item_formated_price(); ?></div>
					  <?php } ?>
					    <a href="<?php echo osc_item_edit_url(); ?>" class="editad" rel="nofollow"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> <?php _e('Edit', 'buy'); ?></a>
						<span class="pendingad"><a onclick="return confirm('<?php _e('Are you sure you want to delete this listing? This action cannot be undone.', 'buy'); ?>')" href="<?php echo osc_item_delete_url(); ?>" rel="nofollow"><i class="fa fa-trash-o"></i>&nbsp;<?php _e('Delete', 'buy'); ?></a></span>
					  </div>
                    </div>
                  </div>
                </div>
              </div>
            </li>
			<?php } ?>
            <!-- ad end --> 
			  <div class="paginate">
				<?php for($i = 0 ; $i < osc_list_total_pages() ; $i++) {
				  if($i == osc_list_page()) {
					printf('<a class="searchPaginationSelected" href="%s">%d</a>', osc_user_list_items_url($i + 1), ($i + 1));
				  } else { 
					printf('<a class="searchPaginationNonSelected" href="%s">%d</a>', osc_user_list_items_url($i + 1), ($i + 1));
				  }
				} ?>
			  </div>
			<?php } ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<?php osc_current_web_theme_path('footer.php') ; ?>