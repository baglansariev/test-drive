<?php
    namespace controllers\account;
    use core\engine\Controller;

    class Upload extends Controller
    {
        public function index()
        {
            return $this->load->view('Account/upload');
        }
    }