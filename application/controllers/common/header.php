<?php
	namespace controllers\common;
	use core\engine\Controller;

	class Header extends Controller
	{
		public function index()
		{
		    $data = array();
            $data['account_text'] = 'Кабинет';

		    if($this->session->has('user_fullname')){
                $data['account_text'] = $this->session->get('user')['fullname'];
            }

			return $this->load->view('common/header', $data);
		}
	}
