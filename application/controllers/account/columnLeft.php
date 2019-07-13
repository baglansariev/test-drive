<?php
    namespace application\controllers\account;
    use application\core\engine\Controller;

    class ColumnLeft extends Controller
    {
        public function index()
        {
            return $this->load->view('Account/column_left');
        }
    }