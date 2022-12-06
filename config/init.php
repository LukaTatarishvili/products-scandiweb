<?php 

session_start();

require_once 'config.php';

require_once 'helpers/system_helpers.php';

require_once('lib/Template.php'); 

spl_autoload_register(function($class_name) {
	require_once 'lib/'.$class_name. '.php';
});

	