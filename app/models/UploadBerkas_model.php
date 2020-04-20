<?php

class UploadBerkas_model
{
    private $table = 'upload_berkas';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function checkIfDoneDaftarByAccountIdAdnNisn($id_user)
    {
        $this->db->query("SELECT * FROM siswa_baru WHERE id_account_siswa = {$id_user}");

        if ($this->db->single()) {
            return true;
        }

        return false;
    }

    public function checkIfDoneUploadBerkasByAccountIdAdnNisn($id_user)
    {
        $this->db->query("SELECT siswa_baru.nisn, 
        (SELECT COUNT(*) FROM {$this->table}
         WHERE nisn = siswa_baru.nisn) AS jumlah_berkas
        FROM siswa_baru WHERE siswa_baru.id_account_siswa = {$id_user}");
        $data = $this->db->single();

        if (!empty($data) && $data['jumlah_berkas'] == 4) {
            return true;
        }

        return false;
    }

    public function insert($data)
    {
        try {
            $query = "INSERT INTO {$this->table} 
            VALUES (null, :nama_berkas, :jenis_berkas, :nisn)";
            $this->db->query($query);
            $this->db->bind(':nama_berkas', $data['namaFile']);
            $this->db->bind(':jenis_berkas', $data['jenisBerkas']);
            $this->db->bind(':nisn', $data['nisn']);
            $this->db->execute();
        } catch (Exception $th) {
            var_dump($th->getMessage());
            die();
        }
    }

    public function checkBerkasDoneUpload($value, $nisn)
    {
        $this->db->query("SELECT * FROM {$this->table} WHERE nisn = {$nisn} AND jenis_berkas = '{$value}'");

        if (empty($this->db->single())) {
            return false;
        }

        return true;
    }

    public function getByNisn($nisn)
    {
        $this->db->query("SELECT * FROM {$this->table} WHERE nisn = :nisn");
        $this->db->bind(':nisn', $nisn);
        $this->db->execute();

        return $this->db->resultSet();
    }
}
