<?php
	namespace controllers;

	use core\engine\Controller;

	class HomeController extends Controller
	{

	    public function indexAction()
	    {
	    	$this->view->asset->setMetaDesc('Тестовое описание');
	    	$this->view->asset->setMetaKeys('ключ1, ключ2');
	    	$this->view->asset->setTitle('Главная');

	    	$this->view->asset->setJs('/public/style/owl-carousel/owl-carousel-switcher.js');

            $home_model = $this->load->model('Home/home');
            $albums = $home_model->getAlbums();
            $data['albums'] = array();

            if($albums){
                $divider = 0;
                foreach ($albums as $key => $album) {
                    if($key%14 == 0){
                        $divider++;
                    }
                    $data['albums'][$divider][$key]['id'] = $album['id'];
                    $data['albums'][$divider][$key]['name'] = $album['name'];
                    $data['albums'][$divider][$key]['dir_path'] = $album['dir_path'];
                    $data['albums'][$divider][$key]['main_img'] = '';
                    if($this->yandexDisk->getResource($album['main_img'])->getLink()){
                        $data['albums'][$divider][$key]['main_img'] = $this->yandexDisk->getResource($album['main_img'])->getLink();
                    }
                    $data['albums'][$divider][$key]['user_id'] = $album['user_id'];
                    $data['albums'][$divider][$key]['date_insert'] = $album['date_insert'];
                }
            }
            devPrint($this->yandexDisk->getResource($album['main_img'])->getPreview());
            exit;

	    	$data['header'] = $this->load->controller('common/header');
	    	$data['footer'] = $this->load->controller('common/footer');
	    	$this->view->response('Main/index', $data);
	    }

	    public function albumAction()
        {
            echo 'HI';
        }
	}
