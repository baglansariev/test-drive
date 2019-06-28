<?php
	namespace application\controllers\common;
	use application\core\engine\Controller;

	class FooterController extends Controller
	{
		public function index()
		{
			return $this->load->view('common/footer');
		}
	}
