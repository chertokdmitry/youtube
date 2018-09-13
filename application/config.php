<?php
return array(
  'sitename' => 'Youtube News',
  'encode' => 'utf-8',
  'cookietime' => 3600,
  'version' => '1.0.0 ',
  'youtubekey' => 'AIzaSyA_3i0GohYnjCPeFCcEr1LZCccu3aSoguk',  
  'default_module' => 'index',
  'default_controller' => 'index',
  'default_action' => 'index',
  'time' => include 'time.php',
  'router' => array(
  '([a-z0-9+_\-]+)/([a-z0-9+_\-]+)/([a-z0-9+_\-]+)' => 'controller/action/id')
);