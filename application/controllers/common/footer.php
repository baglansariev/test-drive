<?php
	namespace application\controllers\common;
	use application\core\engine\Controller;

	class Footer extends Controller
	{
		public function index()
		{
			return $this->load->view('common/footer');
		}
	}
