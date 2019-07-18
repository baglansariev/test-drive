<?php
    namespace controllers\account;
    use core\engine\Controller;

    class ColumnLeft extends Controller
    {
        public function index()
        {
            $data = array();
            if($this->session->has('user')){
                $data['user_fullname'] = $this->session->get('user')['fullname'];
            }
            return $this->load->view('Account/column_left', $data);
        }
    }