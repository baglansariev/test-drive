<?php
	namespace controllers;

	use core\engine\Controller;

	class TestController extends Controller
	{
		public function indexAction()
		{
		    $resource = $this->yandexDisk->getResource($this->session->get('user')['place_name']);
			devPrint($resource->items[0]->path);

		}
	}
