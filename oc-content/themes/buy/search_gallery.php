    <ul class="row gridlist">
      <?php $c = 1; ?>
      <?php while( osc_has_items() ) { ?>
      <li class="col-md-4">
        <div class="adimg">
			<?php if(osc_images_enabled_at_items() and osc_count_item_resources() > 0) { ?>
				<a href="<?php echo osc_item_url(); ?>">
					<img src="<?php echo osc_resource_thumbnail_url(); ?>" title="<?php echo osc_esc_html(osc_item_title()); ?>" alt="<?php echo osc_esc_html(osc_item_title()); ?>" />
				</a>
			<?php } else { ?>
				<a href="<?php echo osc_item_url(); ?>">
					<img src="<?php echo osc_current_web_theme_url('images/no-image.png'); ?>" title="<?php echo osc_esc_html(osc_item_title()); ?>" alt="<?php echo osc_esc_html(osc_item_title()); ?>" />
				</a>
			<?php } ?>
		</div>
        <div class="innerad">
          <h5><a href="<?php echo osc_item_url(); ?>"><?php echo osc_highlight(osc_item_title(), 15); ?></a></h5>
          <div class="row location">
            <div class="col-md-6"><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo osc_highlight(osc_item_city(), 7); ?></div>
            <?php
              $now = time();
              $your_date = strtotime(osc_item_pub_date());
              $datediff = $now - $your_date;
              $item_d = floor($datediff/(60*60*24));

              if($item_d == 0) {
                $item_date = __('today', 'buy');
              } else if($item_d == 1) {
                $item_date = __('yesterday', 'buy');
              } else {
                $item_date = date(osc_get_preference('date_format', 'buy_theme'), $your_date);
              }
            ?>
            <div class="col-md-6"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo $item_date; ?></div>
          </div>
		  <?php if( osc_price_enabled_at_items() ) { ?>
          <div class="price"><?php echo osc_item_formated_price(); ?></div>
		  <?php } ?>
        </div>
        <?php if(osc_item_is_premium()) { ?>
          <div class="new">
            <span class="top"><?php _e('top', 'buy'); ?></span>
            <span class="bottom"><?php _e('item', 'buy'); ?></span>
          </div>
        <?php } ?>
      </li>
      <?php $c++; ?>
      <?php } ?>
	  <?php View::newInstance()->_erase('items') ; ?>
	</ul>