<?php
	namespace application\controllers;

	use application\core\engine\Controller;

	class HomeController extends Controller
	{

	    public function indexAction()
	    {
	    	$this->view->asset->setMetaDesc('Тестовое описание');
	    	$this->view->asset->setMetaKeys('ключ1, ключ2');
	    	$this->view->asset->setTitle('Главная');

	    	$this->view->asset->setJs('/public/style/owl-carousel/owl-carousel-switcher.js');

            // $client  =  new  Google_Client();
            // $client -> setApplicationName ("test-drive");
            // $client -> setDeveloperKey ("731952689658-eu3fmraurvugpc2e0df13f6393gm2grb.apps.googleusercontent.com ");
            // $client->SetClientSecret("ow32ubZA_Dv8jhFtyzqQJV52");
            // $client->SetRedirectUri($_SERVER['REQUEST_URI']);

	    	$data['header'] = $this->load->controller('common/header');
	    	$data['footer'] = $this->load->controller('common/footer');
	    	$this->view->response('Main/index', $data);
	    }
	}
