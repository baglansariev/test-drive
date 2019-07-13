<?php
namespace application\controllers\account;
use application\core\engine\Controller;

class Agreement extends Controller
{
    public function index()
    {
        return $this->load->view('Account/agreement');
    }
}