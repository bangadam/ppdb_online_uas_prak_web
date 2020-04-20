<?php

class AdminLogin extends Controller
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
        $data['judul'] = "Admin Login";
        $this->view('templates/header', $data);
        $this->view('admin/login', $data);
        $this->view('templates/footer');
    }

    public function login()
    {
        $user = $this->model('Admin_model')->loginAccount($_POST);
        if (count($user) > 0) {
            $_SESSION['user']['id_user'] = $user['id_admin'];
            $_SESSION['user']['email'] = $_POST['username'];
            $_SESSION['user']['level'] = 'admin';
            header('Location: ' . BASEURL . '/Admin');
            exit;
        } else {
            Flasher::setFlash('Username atau Password anda salah', 'danger');
            header('Location: ' . BASEURL . '/AdminLogin');
            exit;
        }
    }
}
