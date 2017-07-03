<!--Footer-->
<div class="footerWrap">
  <div class="container">
    <div class="row"> 
      <!--About Us-->
      <div class="col-md-3 col-sm-12">
        <div class="ft-logo">
			<a class="logo" href="<?php echo osc_base_url() ; ?>"><?php echo logo_header(); ?></a>
		</div>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam et consequat elit. Proin molestie eros sed urna auctor lobortis. Integer eget scelerisque arcu. Pellentesque scelerisque pellentesque nisl, sit amet aliquam mi pellentesque fringilla. Ut porta augue a libero pretium laoreet...</p>
      </div>
      <!--About us End--> 
      
      <!--Quick Links-->
      <div class="col-md-2 col-sm-6">
        <h5>Quick Links</h5>
        <!--Quick Links menu Start-->
        <ul class="quicklinks">
          <li><a href="#.">About Us </a></li>
          <li><a href="#.">Careers</a></li>
          <li><a href="#.">All Categories</a></li>
          <li><a href="#.">Contact Us</a></li>
          <li><a href="#.">Post an Ad</a></li>
          <li><a href="#.">Privacy Policy</a></li>
          <li><a href="#.">Blog</a></li>
        </ul>
      </div>
      <!--Quick Links menu end--> 
      
      <!--Jobs By Industry-->
      <div class="col-md-3 col-sm-6">
        <h5>Help Center</h5>
        <!--Industry menu Start-->
        <ul class="quicklinks">
          <li><a href="#.">Help &amp; Support</a></li>
          <li><a href="#.">FAQs</a></li>
          <li><a href="#.">Account Issue</a></li>
          <li><a href="#.">Fake Ads</a></li>
          <li><a href="#.">Buy Membership</a></li>
          <li><a href="#.">Terms of Services</a></li>
          <li><a href="#.">History</a></li>
        </ul>
        <!--Industry menu End-->
        <div class="clear"></div>
      </div>
      
      <!--Latest Articles-->
      <div class="col-md-4 col-sm-12">
        <h5>Contact Us</h5>
        <div class="address"> 123 Lorem Road Suite A<br>
          New York, NY 123456</div>
        <div class="email"> <a href="mailto:newapp@salonstudios.com">support@yourdomain.com</a> </div>
        <div class="phone"> <a href="tel:001234567890">(+1) 123.456.7890</a></div>
        
        <!-- Social Icons -->
        <div class="social">
			<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo osc_base_url(); ?>" target="_blank"> <i class="fa fa-facebook-square" aria-hidden="true"></i></a>
			<a href="https://twitter.com/home?status=<?php echo osc_base_url(); ?>%20-%20<?php _e('your', 'buy'); ?>%20<?php _e('classifieds', 'buy'); ?>" target="_blank"><i class="fa fa-twitter-square" aria-hidden="true"></i></a>
			<a href="https://plus.google.com/share?url=<?php echo osc_base_url(); ?>" target="_blank"><i class="fa fa-google-plus-square" aria-hidden="true"></i></a>
			<a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo osc_base_url(); ?>&title=<?php echo osc_esc_html(__('My', 'buy')); ?>%20<?php _e('classifieds', 'buy'); ?>&summary=&source=" target="_blank"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a>
			<a href="#." target="_blank"><i class="fa fa-youtube-square" aria-hidden="true"></i></a>
		</div>
        <!-- Social Icons end --> 
        
      </div>
    </div>
  </div>
</div>
<!--Footer end--> 

<!--Copyright-->
<div class="copyright">
  <div class="container">
    <div class="bttxt">Copyright &copy; 2017 Your Company Name. All Rights Reserved. Design by: <a href="http://osthemes.ru" target="_blank">OsThemes</a></div>
  </div>
</div>

<!-- Bootstrap's JavaScript --> 
<script src="<?php echo osc_current_web_theme_url('js/jquery-2.1.4.min.js') ; ?>" ></script> 
<script src="<?php echo osc_current_web_theme_url('js/bootstrap.min.js') ; ?>" ></script> 

<!-- Owl carousel --> 
<script src="<?php echo osc_current_web_theme_url('js/owl.carousel.js') ; ?>" ></script> 

<script src="<?php echo osc_current_web_theme_url('js/jquery.flexslider.js') ; ?>" ></script> 

<!-- Custom js --> 
<script src="<?php echo osc_current_web_theme_url('js/script.js') ; ?>" ></script>
<script>
jQuery(document).ready(function($) {
  var addQuery = '<?php echo osc_esc_js(__('Enter name of item', 'buy')); ?>' ;

  if($('input[name=add_title]').val() == addQuery) {
    $('input[name=add_title]').css('color', 'gray');
  }
  $('input[name=add_title]').click(function(){
    if($('input[name=add_title]').val() == addQuery) {
      $('input[name=add_title]').val('');
      $('input[name=add_title]').css('color', '');
    }
  });
  $('input[name=add_title]').blur(function(){
    if($('input[name=add_title]').val() == '') {
      $('input[name=add_title]').val(addQuery);
      $('input[name=add_title]').css('color', 'gray');
    }
  });
  $('input[name=add_title]').keypress(function(){
    $('input[name=add_title]').css('background','');
  });
});
</script>

<?php if (1==2) { 
  $cat = osc_search_category_id();
  $cat = $cat[0];

  echo 'Page: ' . Params::getParam('page') . '<br />';
  echo 'Param Country: ' . Params::getParam('sCountry') . '<br />';
  echo 'Param Region: ' . Params::getParam('sRegion') . '<br />';
  echo 'Param City: ' . Params::getParam('sCity') . '<br />';
  echo 'Param Locator: ' . Params::getParam('sLocator') . '<br />';
  echo 'Param Category: ' . Params::getParam('sCategory') . '<br />';
  echo 'Search Region: ' . osc_search_region() . '<br />';
  echo 'Search City: ' . osc_search_city() . '<br />';
  echo 'Search Category: ' . $cat . '<br />';
  echo 'Param Locator: ' . Params::getParam('sLocator') . '<br />';
  echo '<br/> ------------------------------------------------- </br>';
  echo 'Cookie Category: ' . mb_get_cookie('buy-sCategory') . '<br />';
  echo 'Cookie Country: ' . mb_get_cookie('buy-sCountry') . '<br />';
  echo 'Cookie Region: ' . mb_get_cookie('buy-sRegion') . '<br />';
  echo 'Cookie City: ' . mb_get_cookie('buy-sCity') . '<br />';
  echo '<br/> ------------------------------------------------- </br>';

  echo '<br/>';
  echo '<br/>';
  echo 'end<br/>';

}
?>
</body>
</html>