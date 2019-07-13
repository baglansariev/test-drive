<?php
	namespace application\core\engine;

	use application\core\engine\View;
	use application\core\lib\Request;

	class Router
	{
		public $routes;
		public $request;
		public $view;
		protected $params = [];

	    public function __construct()
	    {
	        $this->routes = require_once(ROUTES_PATH . 'routes.php');
	        $this->request = new Request;
	        $this->view = new View;
	        $this->request->session->start();
	    }

	    public function match()
	    {	
	    	foreach ($this->routes as $key => $val) {
	    		if(preg_match("#^$key$#", $this->request->getUri())){
	    			$this->params = $val;
	    			return true;
	    		}
	    	}
	    	return false;
	    }
	    public function run()
	    {
	    	if($this->match()){
	    		$path = 'application\controllers\\'.ucfirst($this->params['controller']).'Controller';
	    		$action = $this->params['action'].'Action';
	    		$controller = new $path();
	    		$controller->$action();
	    	}
	    	else{
	    		$this->view->errorResponse('errors/404', 404);
	    	}
	    }
	}