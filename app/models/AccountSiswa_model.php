<?php

class AccountSiswa_model
{
    private $table = 'account_siswa';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function loginAccount($data)
    {
        try {
            $this->db->query('SELECT * FROM ' . $this->table . ' WHERE email = :email AND password= :password AND is_confirmation = :confirm');
            $this->db->bind('email', $data['email']);
            $this->db->bind('password', md5($data['password']));
            $this->db->bind('confirm', 1);
            return $this->db->single();
        } catch (Exception $th) {
            var_dump($th->getMessage());
            die();
        }
    }

    public function registerAccount($data): int
    {
        $query = "INSERT INTO account_siswa
                    VALUES
                  (null, :username, :password, :email, 0)";

        $this->db->query($query);
        $this->db->bind('username', $data['username']);
        $this->db->bind('password', md5($data['password']));
        $this->db->bind('email', $data['email']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function confirmAccountByEmail($email): int
    {
        $query = "UPDATE account_siswa SET
                    is_confirmation = :confirm
                  WHERE email = :email";

        $this->db->query($query);
        $this->db->bind('confirm', 1);
        $this->db->bind('email', $email);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function checkIfDoneDaftar($id_account)
    {
        try {
            $this->db->query("SELECT nisn FROM siswa_baru WHERE id_account_siswa = {$id_account}");
            if ($this->db->single()) {
                return true;
            }

            return false;
        } catch (Exception $th) {
            var_dump($th->getMessage());
            die();
        }
    }

    public function getNisnIfDoneDaftar($id_account)
    {
        $this->db->query("SELECT nisn FROM siswa_baru WHERE id_account_siswa = {$id_account}");

        if ($this->db->single()) {
            return $this->db->single();
        }

        return null;
    }
}
