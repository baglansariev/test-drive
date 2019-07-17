<?php
    namespace controllers\account;
    use core\engine\Controller;

    class ColumnLeft extends Controller
    {
        public function index()
        {
            $data = array();
            if($this->session->has('user_fullname')){
                $data['user_fullname'] = $this->session->get('user_fullname');
            }
            return $this->load->view('Account/column_left', $data);
        }
    }