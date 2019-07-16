<?php
	namespace application\controllers\common;
	use application\core\engine\Controller;

	class Header extends Controller
	{
		public function index()
		{
		    $data = array();
            $data['account_text'] = 'Кабинет';

		    if($this->session->has('user_fullname')){
                $data['account_text'] = $this->session->get('user_fullname');
            }

			return $this->load->view('common/header', $data);
		}
	}
