<?php
	namespace controllers\common;
	use core\engine\Controller;

	class Footer extends Controller
	{
		public function index()
		{
			return $this->load->view('common/footer');
		}
	}
