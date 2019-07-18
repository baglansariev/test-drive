<?php
	namespace controllers;

	use core\engine\Controller;

	class TestController extends Controller
	{
		public function indexAction()
		{
			$baseResource = $this->yandexDisk->getResource($this->session->get('user')['place_name']);



		}
	}
