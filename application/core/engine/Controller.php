<?php
	namespace application\core\engine;

	use application\core\engine\View;
	use application\core\engine\Loader;
	use application\core\lib\Request;

	abstract class Controller
	{
		public $request;
		public $load;

		public function __construct()
		{
			$this->request = new Request;
			$this->load = new Loader;
			$this->view = new View;
		}
	}