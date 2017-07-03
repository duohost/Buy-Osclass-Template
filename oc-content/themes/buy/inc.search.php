<?php
  //$sQuery = osc_get_preference('keyword_placeholder', 'buy_theme');
  $sQuery = __('Search in', 'buy') . ' ' . osc_total_active_items() . ' ' .  __('listings', 'buy');
?>
<div class="searchwrap">
  <div class="container">
    <h3><?php _e('World Largest Classifieds Site', 'sofia'); ?></h3>
    <p><?php _e('Search from over 99,00,000 Active ads &amp; Post free unlimited classifieds ads!', 'sofia'); ?></p>
	<form action="<?php echo osc_base_url(true); ?>" method="get">
	<input type="hidden" name="page" value="search" />
	<input type="hidden" name="cookie-action" id="cookie-action" value="" />
    <div class="searchbar row">
      <div class="col-md-8">
		<input type="text" name="sPattern" class="form-control" placeholder="<?php echo osc_esc_html($sQuery); ?>" value="<?php if(Params::getParam('sPattern') <> '') { echo Params::getParam('sPattern'); } ?>" />
      </div>
      <div class="col-md-2">
		<?php if ( osc_count_categories() ) { ?>
		  <?php mb_categories_select('sCategory', Params::getParam('sCategory'), __('Select a category', 'buy')); ?>
		<?php  } ?> 
      </div>
      <div class="col-md-2">
        <input type="submit" class="btn" value="<?php _e('Search Ad', 'sofia'); ?>">
      </div>
    </div>
	</form>
  </div>
</div>

<script>
$('.clear-cookie').click(function(){
  // Clear all search parameters
  $.ajax({
    url: "<?php echo osc_base_url(); ?>oc-content/themes/buy/ajax.php?clearCookieAll=done",
    type: "GET",
    success: function(response){
      //alert(response);
    }
  });

  $('#sCategory').val('');
  $('#uniform-sCategory').text('<?php _e('Select a category', 'buy'); ?>');
});

$('#sCategory').change(function(){
  $('#cookie-action').val('done');
});

// Category click list action
$('#inc-cat-list li').click(function(){
  var sQuery = '<?php echo osc_esc_js( $sQuery ); ?>';
  $('#sCategory').val($(this).attr('rel'));

  if($('input[name=sPattern]').val() == sQuery) {
    $('input[name=sPattern]').val('');
  }

  $('#inc-cat-box').stop(true, true).fadeOut(time);

  $(this).attr('rel', '');
  $('#cookie-action').val('done');
  $('.search').submit();
});

</script>