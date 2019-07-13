<?php
    namespace application\controllers\account;
    use application\core\engine\Controller;

    class PersonalData extends Controller
    {
        public function index()
        {
            return $this->load->view('Account/personal_data');
        }
    }