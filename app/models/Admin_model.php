<?php

class Admin_model
{
    private $table = 'admin';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function loginAccount($data): array
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE username = :username AND password= :password');
        $this->db->bind('username', $data['username']);
        $this->db->bind('password', md5($data['password']));
        return $this->db->single();
    }
}
