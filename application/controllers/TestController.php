<?php
	namespace controllers;

	use core\engine\Controller;

	class TestController extends Controller
	{
		public function indexAction()
		{
		    if($this->request->has('image', 'files')){
		        $newPath = IMAGES_PATH . 'test/' . $this->request->files['image']['name'];
                move_uploaded_file($this->request->files['image']['tmp_name'], $newPath);
                $img = imagecreatefromjpeg($newPath);
                imagefilter($img, IMG_FILTER_CONTRAST, -10);

                echo '<img src="/public/images/test/6.jpg">';

            }
            $this->view->response('Test/test');
		}
	}
