<?php

class Siswa_model
{
    private $table = "siswa_baru";
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function insert($data)
    {
        try {
            $query = "INSERT INTO " . $this->table . "
                    VALUES
                  (
                    :nisn,
                    :no_pendaftaran,
                    :status_siswa,
                    :nama_siswa,
                    :NIK,
                    :tempat_lahir,
                    :tanggal_lahir,
                    :id_jenis_kelamin,
                    :id_agama,
                    :id_hobi,
                    :id_cita_cita,
                    :jumlah_saudara,
                    :tanggal_masuk,
                    :tahun_ajaran,
                    :id_tingkat_kelas,
                    :id_kelas_pararel,
                    :anak_ke,
                    :NPSN_sekolah_asal,
                    :nama_sekolah_asal,
                    :alamat_sekolah_asal,
                    :id_account_siswa,
                    :nama_ayah,
                    :nama_ibu,
                    :pekerjaan_ayah,
                    :pekerjaan_ibu,
                    :penghasilan_ayah,
                    :penghasilan_ibu,
                    :alamat_ayah,
                    :alamat_ibu,
                    :no_telp_ortu,
                    :nism,
                    :id_asal_sekolah
                  )";

            $this->db->query($query);

            $this->db->bind(':nisn', $data['primary']['nisn_siswa']);
            $this->db->bind(':no_pendaftaran', $data['secondary']['no_pendaftaran']);
            $this->db->bind(':status_siswa', $data['secondary']['status_siswa']);
            $this->db->bind(':nama_siswa', $data['primary']['nama_siswa']);
            $this->db->bind(':NIK', $data['primary']['nik']);
            $this->db->bind(':tempat_lahir', $data['primary']['tempat_lahir']);
            $this->db->bind(':tanggal_lahir', $data['primary']['tanggal_lahir']);
            $this->db->bind(':id_jenis_kelamin', $data['primary']['jenis_kelamin']);
            $this->db->bind(':id_agama', $data['primary']['agama']);
            $this->db->bind(':id_hobi', $data['primary']['hobi']);
            $this->db->bind(':id_cita_cita', $data['primary']['cita_cita']);
            $this->db->bind(':jumlah_saudara', $data['primary']['jumlah_saudara']);
            $this->db->bind(':tanggal_masuk', $data['secondary']['tanggal_masuk']);
            $this->db->bind(':tahun_ajaran', $data['secondary']['tahun_ajaran']);
            $this->db->bind(':id_tingkat_kelas', $data['primary']['tingkat_kelas_siswa']);
            $this->db->bind(':id_kelas_pararel', $data['primary']['kelas_pararel_siswa']);
            $this->db->bind(':anak_ke', $data['primary']['anak_ke']);
            $this->db->bind(':NPSN_sekolah_asal', $data['primary']['npsn_asal_sekolah']);
            $this->db->bind(':nama_sekolah_asal', $data['primary']['nama_asal_sekolah']);
            $this->db->bind(':alamat_sekolah_asal', $data['primary']['alamat_asal_sekolah']);
            $this->db->bind(':id_account_siswa', $data['secondary']['id_account_siswa']);
            $this->db->bind(':nama_ayah', $data['primary']['nama_ayah']);
            $this->db->bind(':nama_ibu', $data['primary']['nama_ibu']);
            $this->db->bind(':pekerjaan_ayah', $data['primary']['pekerjaan_ayah']);
            $this->db->bind(':pekerjaan_ibu', $data['primary']['pekerjaan_ibu']);
            $this->db->bind(':penghasilan_ayah', $data['primary']['penghasilan_ayah']);
            $this->db->bind(':penghasilan_ibu', $data['primary']['penghasilan_ibu']);
            $this->db->bind(':alamat_ayah', $data['primary']['alamat_ayah']);
            $this->db->bind(':alamat_ibu', $data['primary']['alamat_ibu']);
            $this->db->bind(':no_telp_ortu', $data['primary']['no_telp']);
            $this->db->bind(':nism', $data['secondary']['nism']);
            $this->db->bind(':id_asal_sekolah', $data['primary']['jenis_asal_sekolah']);

            $this->db->execute();

            // save data upload berkas
            // $jenis_berkas = ['foto', 'ijazah', 'akta', 'kartu_keluarga'];
            // foreach ($jenis_berkas as $key => $value) {
            //     $query = "INSERT INTO upload_berkas 
            //     VALUES (null, :nama_berkas, :jenis_berkas, :nisn)";
            //     $this->db->query($query);
            //     $this->db->bind(':nama_berkas', $data['berkas'][$key]['nama_berkas']);
            //     $this->db->bind(':jenis_berkas', $data['berkas'][$key]['jenis_berkas']);
            //     $this->db->bind(':nisn', $data['primary']['nisn_siswa']);
            //     $this->db->execute();
            // }

            return true;
        } catch (Exception $e) {
            var_dump($e->getMessage());
            die();
        }
    }

    public function getSiswaWithRelationByIdAccountSiswa($id_account_siswa)
    {
        try {
            $query = "SELECT
            *
        FROM
            siswa_baru
            LEFT JOIN agama ON siswa_baru.id_agama = agama.id_agama
            LEFT JOIN jenis_kelamin ON siswa_baru.id_jenis_kelamin = jenis_kelamin.id_jenis_kelamin
            LEFT JOIN hobi ON siswa_baru.id_hobi = hobi.id_hobi
            LEFT JOIN cita_cita ON siswa_baru.id_cita_cita = cita_cita.id_cita_cita
            LEFT JOIN tingkat_kelas ON siswa_baru.id_tingkat_kelas = tingkat_kelas.id_tingkat_kelas
            LEFT JOIN kelas_pararel ON siswa_baru.id_kelas_pararel = kelas_pararel.id_kelas_pararel
            LEFT JOIN asal_sekolah ON siswa_baru.id_asal_sekolah = asal_sekolah.id_asal_sekolah
            WHERE siswa_baru.id_account_siswa = {$id_account_siswa}
            ";

            $this->db->query($query);
            $data = $this->db->resultSet()[0];
            $query = "SELECT * FROM upload_berkas WHERE nisn = {$data['nisn']}";
            $this->db->query($query);
            $data['berkas'] = $this->db->resultSet();
            return $data;
        } catch (Exception $e) {
            var_dump($e->getMessage());
            die();
        }
    }

    public function getAll()
    {
        try {
            $query = "SELECT * FROM siswa_baru LEFT JOIN jenis_kelamin ON siswa_baru.id_jenis_kelamin = jenis_kelamin.id_jenis_kelamin";
            $this->db->query($query);
            return $this->db->resultSet();
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getAllSiswaWithRelation()
    {
        try {
            $query = "SELECT
            *
        FROM
            siswa_baru
            LEFT JOIN agama ON siswa_baru.id_agama = agama.id_agama
            LEFT JOIN jenis_kelamin ON siswa_baru.id_jenis_kelamin = jenis_kelamin.id_jenis_kelamin
            LEFT JOIN hobi ON siswa_baru.id_hobi = hobi.id_hobi
            LEFT JOIN cita_cita ON siswa_baru.id_cita_cita = cita_cita.id_cita_cita
            LEFT JOIN tingkat_kelas ON siswa_baru.id_tingkat_kelas = tingkat_kelas.id_tingkat_kelas
            LEFT JOIN kelas_pararel ON siswa_baru.id_kelas_pararel = kelas_pararel.id_kelas_pararel
            LEFt JOIN asal_sekolah ON siswa_baru.id_asal_sekolah = asal_sekolah.id_asal_sekolah
            ";

            $this->db->query($query);
            $data['siswa'] = $this->db->resultSet();

            $query = "SELECT * FROM madrasah";
            $this->db->query($query);
            $data['madrasah'] = $this->db->resultSet()[0];

            return $data;
        } catch (Exception $e) {
            var_dump($e->getMessage());
            die();
        }
    }

    public function delete($nisn)
    {
        try {
            $query = "DELETE FROM upload_berkas WHERE nisn = :nisn";
            $this->db->query($query);
            $this->db->bind('nisn', $nisn);

            $this->db->execute();

            $query = "DELETE FROM {$this->table} WHERE nisn = :nisn";

            $this->db->query($query);
            $this->db->bind('nisn', $nisn);

            $this->db->execute();

            return $this->db->rowCount();
        } catch (Exception $th) {
            var_dump($th->getMessage());
            die();
        }
    }

    public function getSiswaWithRelationByNisn($nisn)
    {
        try {
            $query = "SELECT
            *
        FROM
            siswa_baru
            LEFT JOIN agama ON siswa_baru.id_agama = agama.id_agama
            LEFT JOIN jenis_kelamin ON siswa_baru.id_jenis_kelamin = jenis_kelamin.id_jenis_kelamin
            LEFT JOIN hobi ON siswa_baru.id_hobi = hobi.id_hobi
            LEFT JOIN cita_cita ON siswa_baru.id_cita_cita = cita_cita.id_cita_cita
            LEFT JOIN tingkat_kelas ON siswa_baru.id_tingkat_kelas = tingkat_kelas.id_tingkat_kelas
            LEFT JOIN kelas_pararel ON siswa_baru.id_kelas_pararel = kelas_pararel.id_kelas_pararel
            LEFT JOIN asal_sekolah ON siswa_baru.id_asal_sekolah = asal_sekolah.id_asal_sekolah
            WHERE siswa_baru.nisn = {$nisn}
            ";

            $this->db->query($query);
            $data = $this->db->resultSet()[0];
            $query = "SELECT * FROM upload_berkas WHERE nisn = {$nisn}";
            $this->db->query($query);
            $data['berkas'] = $this->db->resultSet();
            return $data;
        } catch (Exception $e) {
            var_dump($e->getMessage());
            die();
        }
    }
}
