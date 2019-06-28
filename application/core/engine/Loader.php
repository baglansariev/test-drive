<?php
	namespace application\core\engine;

	class Loader
	{

		public function view($view, $arr = [])
		{

			$file = VIEWS_PATH. $view . '.php';

			if(file_exists($file)){
				extract($arr);

				ob_start();
				require_once($file);
				$output = ob_get_clean();
			}

			return $output;
		}

		public function controller($controller)
		{
			$parts = explode('/', $controller);

			if(is_array($parts)){
				ucfirst($parts[count($parts)-1]);
				$parts = implode('\\', $parts);
			}

			$path = 'application\controllers\\'.$parts;

			if(class_exists($path)){
				$controller =  new $path;
			}
			else{
				return 'Class (' . $path . ') does not exist';
			}

			$method = 'index';

			if(method_exists($controller, $method)){
				return $controller->$method();
			}
			else{
                return $controller;
			}
		}

		public function model($model)
		{
			$parts = explode('/', $model);

			if(is_array($parts)){
				ucfirst($parts[count($parts)-1]);
				$parts = implode('\\', $parts);
			}

			$path = 'application\models\\'.$parts;

			if(class_exists($path)){
				return  new $path;
			}
		}
	}
