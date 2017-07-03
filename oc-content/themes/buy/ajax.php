<?php
define('ABS_PATH', dirname(dirname(dirname(dirname(__FILE__)))) . '/');
require_once ABS_PATH . 'oc-load.php';
require_once ABS_PATH . 'oc-content/themes/buy/functions.php';

// Ajax clear cookies
if($_GET['clearCookieSearch'] == 'done') {
  mb_set_cookie('buy-sCategory', '');
  mb_set_cookie('buy-sPattern', '');
  mb_set_cookie('buy-sPriceMin', '');
  mb_set_cookie('buy-sPriceMax', '');
}

if($_GET['clearCookieLocation'] == 'done') {
  mb_set_cookie('buy-sCountry', '');
  mb_set_cookie('buy-sRegion', '');
  mb_set_cookie('buy-sCity', '');
  mb_set_cookie('buy-sLocator', '');
}

if($_GET['clearCookieAll'] == 'done') {
  mb_set_cookie('buy-sCategory', '');
  mb_set_cookie('buy-sPattern', '');
  mb_set_cookie('buy-sPriceMin', '');
  mb_set_cookie('buy-sPriceMax', '');
  mb_set_cookie('buy-sCountry', '');
  mb_set_cookie('buy-sRegion', '');
  mb_set_cookie('buy-sCity', '');
  mb_set_cookie('buy-sLocator', '');
}

//echo 'test string';
?>