<?php
namespace controllers\account;
use core\engine\Controller;

class Agreement extends Controller
{
    public function index()
    {
        return $this->load->view('Account/agreement');
    }
}