<?php

class Home extends Controller
{
    public function __construct()
    {
        if (!empty($_SESSION['user']) && $_SESSION['user']['level'] == 'admin') {
            header('Location: ' . BASEURL . '/Admin');
            exit;
        }
    }

    public function index()
    {
        $data['judul'] = 'Home';
        $this->view('templates/header', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }
}
