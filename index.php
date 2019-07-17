<?php

	require_once('config.php');
	require_once(LIB_PATH . 'devtools.php');
	require_once(LIB_PATH . 'autoload.php');

	if(file_exists('vendor/autoload.php')){
        require_once('vendor/autoload.php');
    }

	$router = new core\engine\Router;
	$router->run();