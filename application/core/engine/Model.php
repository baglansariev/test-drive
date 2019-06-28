<?php
	namespace application\core\engine;

	use application\core\lib\Db;

	abstract class Model
	{
		public $db;

		public function __construct()
		{
			$this->db = new Db;
		}
	}
