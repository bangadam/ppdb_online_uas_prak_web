<?php

class KelasPararel_model
{
    private $table = "kelas_pararel";
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

    public function getByIdTingkatKelas($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_tingkat_kelas = :id_tingkat_kelas');
        $this->db->bind('id_tingkat_kelas', $id);
        return $this->db->resultSet();
    }
}
