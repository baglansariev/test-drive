<?php
    namespace application\controllers\account;
    use application\core\engine\Controller;

    class PersonalData extends Controller
    {
        public function index()
        {
            $account_model = $this->load->model('account/account');
            $data = array();

            $user = $account_model->getUserData($this->session->get('user_email'));
            $data['user_data'] = array();

            if($user){
                $data['user_fullname'] = $user['user_fullname'];
                $data['user_email'] = $user['user_email'];
                $data['user_place'] = $user['place_name'];
            }

            return $this->load->view('Account/personal_data', $data);
        }
    }