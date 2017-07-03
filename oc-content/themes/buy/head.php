<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<title><?php echo meta_title() ; ?></title>
<meta name="title" content="<?php echo osc_esc_html(meta_title()); ?>" />

<?php if( meta_description() != '' ) { ?>
  <meta name="description" content="<?php echo osc_esc_html(meta_description()); ?>" />
<?php } ?>

<?php if( function_exists('meta_keywords') ) { ?>
  <?php if( meta_keywords() != '' ) { ?>
    <meta name="keywords" content="<?php echo osc_esc_html(meta_keywords()); ?>" />
  <?php } ?>
<?php } ?>

<?php if( osc_get_canonical() != '' ) { ?>
  <link rel="canonical" href="<?php echo osc_get_canonical(); ?>"/>
<?php } ?>

<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="Cache-Control" content="no-cache" />
<meta http-equiv="Expires" content="Mon, 01 Jul 1970 00:00:00 GMT" />
<meta name="robots" content="index, follow" />
<meta name="googlebot" content="index, follow" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<?php osc_get_item_resources(); ?>
<?php if(osc_is_ad_page()) { ?><meta property="og:image" content="<?php echo osc_resource_url(); ?>" /><?php } ?>

<script type="text/javascript">
  var fileDefaultText = '<?php echo osc_esc_js( __('No file selected', 'buy') ) ; ?>';
  var fileBtnText     = '<?php echo osc_esc_js( __('Choose File', 'buy') ) ; ?>';
</script>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
  <script src="<?php echo osc_current_web_theme_url('js/html5shiv.min.js') ; ?>" ></script>
  <script src="<?php echo osc_current_web_theme_url('js/respond.min.js') ; ?>" ></script>
<![endif]-->

<?php
osc_enqueue_style('owl', osc_current_web_theme_url('css/owl.carousel.css'));
osc_enqueue_style('bootstrap', osc_current_web_theme_url('css/bootstrap.min.css'));
osc_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css');
osc_enqueue_style('main', osc_current_web_theme_url('css/main.css'));

osc_register_script('global', osc_current_web_theme_js_url('global.js'));

osc_enqueue_script('jquery');
osc_enqueue_script('global');

osc_enqueue_script('jquery-ui');
?>
<?php buy_manage_cookies(); ?>
<?php osc_run_hook('header') ; ?>