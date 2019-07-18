<?php
    namespace controllers\account;
    use core\engine\Controller;

    class Upload extends Controller
    {
        public function index()
        {
//            if($this->request->has('album_files', 'files')){
//                devPrint($this->request->files['album_files']);
//            }
            return $this->load->view('Account/upload');
        }
    }