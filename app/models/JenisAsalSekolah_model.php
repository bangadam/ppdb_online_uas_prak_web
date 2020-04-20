<?php

class JenisAsalSekolah_model
{
    private $table = 'asal_sekolah';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAll()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getByIdJenjangSekolah($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_jenjang_sekolah = :id_jenjang_sekolah');
        $this->db->bind('id_jenjang_sekolah', $id);
        return $this->db->resultSet();
    }
}
