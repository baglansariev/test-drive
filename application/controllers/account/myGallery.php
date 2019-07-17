<?php
    namespace controllers\account;
    use core\engine\Controller;

    class MyGallery extends Controller
    {
        public function index()
        {
            return $this->load->view('Account/my_gallery');
        }
    }