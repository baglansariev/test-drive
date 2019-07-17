<?php
	namespace controllers;

	use core\engine\Controller;

	class TestController extends Controller
	{
		public function index()
		{
			$data['truck'] = ['a', 'b', 'c'];
			return $this->load->view('Test/test', $data);
		}
	}
