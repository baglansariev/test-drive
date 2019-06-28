<?php
	namespace application\controllers\common;
	use application\core\engine\Controller;

	class HeaderController extends Controller
	{
		public function index()
		{
			return $this->load->view('common/header');
		}
	}
