<?php
	// session_start();
	
	require_once('config.php');
	require_once(LIB_PATH . 'devtools.php');
	require_once(LIB_PATH . 'autoload.php');
	// require_once('vendor/autoload.php');

	$router = new application\core\engine\Router;
	$router->run();