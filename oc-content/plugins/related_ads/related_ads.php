		<!-- Related listings -->
        <!-- ad start -->
		<?php if( osc_count_items() > 0) { ?>
        <?php $c = 1; ?>
        <?php while( osc_has_items() ) { ?>
            <li>
              <div class="row">
                <div class="col-md-2 col-sm-4">
                  <div class="adimg">
					<?php if( osc_images_enabled_at_items() ) { ?>
					  <?php if(osc_count_item_resources()) { ?>
						<img src="<?php echo osc_resource_thumbnail_url(); ?>" title="<?php echo osc_item_title(); ?>" alt="<?php echo osc_item_title(); ?>" />
					  <?php } ?>
					<?php } else { ?>
					  <img src="<?php echo osc_current_web_theme_url('images/no-image.png'); ?>" title="<?php echo osc_item_title(); ?>" alt="<?php echo osc_item_title(); ?>" />
					<?php } ?>
				  </div>
                </div>
                <div class="col-md-10 col-sm-8">
                  <div class="jobinfo">
                    <div class="row">
                      <div class="col-md-8 col-sm-7">
                        <h3><a href="<?php echo osc_item_url(); ?>"><?php echo osc_highlight(osc_item_title(), 60); ?></a></h3>
                        <div class="cateName"> <i class="fa fa-angle-double-right" aria-hidden="true"></i> <a href="#."><?php echo osc_item_category(); ?></a> </div>
                        <div class="location"><i class="fa fa-map-marker" aria-hidden="true"></i> <span><?php echo osc_item_city(); ?></span></div>
                        <div class="clearfix"></div>
                        <p><?php echo osc_highlight(osc_item_description(), 70); ?></p>
                        <div class="listbtn"><a href="#."><?php _e('View Details', 'patricia'); ?></a></div>
                      </div>
                      <div class="col-md-4 col-sm-5 text-right">
					  <?php if( osc_price_enabled_at_items() ) { ?>
						<div class="adprice"><?php echo osc_item_formated_price(); ?></div>
					  <?php } ?>
                        <div class="adverify"><i class="fa fa-check-square-o" aria-hidden="true"></i> <?php _e('Verified Seller', 'patricia'); ?></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </li>
        <?php $c++; ?>
		<?php } ?>
		<?php } else { ?>
			<div class="empty"><?php _e('No Related listings', 'patricia'); ?></div>
		<?php } ?>  
        <!-- ad end --> 