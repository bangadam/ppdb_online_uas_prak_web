<?php

class TingkatKelas_model
{
    private $table = "tingkat_kelas";
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

    public function getByIdJenjangKelas($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_jenjang_sekolah = :id_jenjang_sekolah');
        $this->db->bind('id_jenjang_sekolah', $id);
        return $this->db->resultSet();
    }
}
