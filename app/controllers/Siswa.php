<?php

class Siswa extends Controller
{
    private $ifAccountDoneDaftar = false;
    private $ifAccountDoneUploadBerkas = false;
    private $nisnAccountSiswa = null;
    private $id_user = null;
    private $data = null;
    private $checkBerkasDoneUpload = [
        'file_foto_diri' => false,
        'file_ijazah_sebelumnya' => false,
        'file_akta' => false,
        'file_kartu_keluarga' => false,
    ];

    public function __construct()
    {
        $this->id_user = $_SESSION['user']['id_user'];

        if ($_SESSION['user']['level'] != 'siswa') {
            Flasher::setFlash('Anda harus login terlebih dahulu', 'danger');
            header('Location: ' . BASEURL . '/Home');
            exit;
        }

        // check jika akun sudah melakukan pendaftaran
        if ($this->model('AccountSiswa_model')->checkIfDoneDaftar($this->id_user)) {
            $this->ifAccountDoneDaftar = true;
            $this->data['ifAccountDoneDaftar'] = $this->ifAccountDoneDaftar;
        } else {
            $this->ifAccountDoneDaftar = false;
            $this->data['ifAccountDoneDaftar'] = $this->ifAccountDoneDaftar;
        }
        // check jika akun sudah upload semua berkas
        if ($this->model('UploadBerkas_model')->checkIfDoneUploadBerkasByAccountIdAdnNisn($this->id_user)) {
            $this->ifAccountDoneUploadBerkas = true;
            $this->data['ifAccountDoneUploadBerkas'] = $this->ifAccountDoneUploadBerkas;
        } else {
            $this->ifAccountDoneUploadBerkas = false;
            $this->data['ifAccountDoneUploadBerkas'] = $this->ifAccountDoneUploadBerkas;
        }

        // get nisn account siswa jika sudah mengisi form pendaftaran
        if (!empty($this->model('AccountSiswa_model')->getNisnIfDoneDaftar($this->id_user))) {
            $this->nisnAccountSiswa = $this->model('AccountSiswa_model')->getNisnIfDoneDaftar($this->id_user)['nisn'];
        }

        // check setiap jenis file berkas yang sudah diupload
        if ($this->nisnAccountSiswa != null) {
            $jenis = [
                'file_foto_diri',
                'file_ijazah_sebelumnya',
                'file_akta',
                'file_kartu_keluarga',
            ];
            foreach ($jenis as $value) {
                $result = $this->model('UploadBerkas_model')->checkBerkasDoneUpload($value, $this->nisnAccountSiswa);
                if ($result) {
                    $this->checkBerkasDoneUpload[$value] =  true;
                }
            }
        }
    }

    public function index()
    {
        $this->data['judul'] = 'Dashboard Siswa Baru';
        $this->view('templates/header', $this->data);
        $this->view('siswa/index');
        $this->view('templates/footer');
    }

    public function logout()
    {
        session_destroy();
        header('Location: ' . BASEURL . '/Home');
    }

    public function pendaftaranSiswa()
    {
        if ($this->data['ifAccountDoneDaftar']) {
            Flasher::setFlash('Upload berkas persyaratan siswa baru', 'danger');
            header('Location: ' . BASEURL . '/Siswa/UploadBerkas');
            exit;
        }

        $this->data['judul'] = 'Dashboard Siswa Baru';
        $this->data['jenis_kelamin'] = $this->model("JenisKelamin_model")->getAll();
        $this->data['agama'] = $this->model("Agama_model")->getAll();
        $this->data['hobi'] = $this->model("Hobi_model")->getAll();
        $this->data['cita_cita'] = $this->model("CitaCita_model")->getAll();
        $this->data['jenjang_sekolah'] = $this->model("JenjangSekolah_model")->getAll();
        $this->view('templates/header', $this->data);
        $this->view('siswa/pendaftaran-siswa', $this->data);
        $this->view('templates/footer');
    }

    public function pendaftaranSiswaPost()
    {
        $this->data['primary'] = $_POST;
        $madrasah = $this->model('Madrasah_model')->getAll();
        $NISM = $this->nismGenerator($madrasah);
        $no_pendaftaran = $this->noPendaftaranGenerator();
        $this->data['secondary'] = [
            'status_siswa' => "Siswa Baru",
            'tanggal_masuk' => date('Y-m-d'),
            'tahun_ajaran' => date('Y') . '/' . date('Y', strtotime("1 years")),
            'id_account_siswa' => $this->id_user,
            'nism' => $NISM,
            'no_pendaftaran' => $no_pendaftaran
        ];
        // $this->data['berkas'] = [
        //     [
        //         'nama_berkas' => $_FILES['file_foto_diri']['name'],
        //         'jenis_berkas' => 'foto'
        //     ],
        //     [
        //         'nama_berkas' => $_FILES['file_ijazah_sebelumnya']['name'],
        //         'jenis_berkas' => 'ijazah'
        //     ],
        //     [
        //         'nama_berkas' => $_FILES['file_akta']['name'],
        //         'jenis_berkas' => 'akta'
        //     ],
        //     [
        //         'nama_berkas' => $_FILES['file_kartu_keluarga']['name'],
        //         'jenis_berkas' => 'kartu_keluarga'
        //     ],
        // ];
        // upload file berkas
        // $this->uploadSemuaBerkas();

        if ($this->model("Siswa_model")->insert($this->data)) {
            Flasher::setFlash('Pendaftaran siswa baru berhasil', 'success');
            header('Location: ' . BASEURL . '/siswa');
            exit;
        } else {
            Flasher::setFlash('Pendaftaran siswa baru gagal', 'danger');
            header('Location: ' . BASEURL . '/siswa');
        }
    }

    public function nismGenerator($madrasah)
    {
        $nism = $madrasah['NSM'] . date('y') . mt_rand(1, 999);
        return $nism;
    }

    public function noPendaftaranGenerator()
    {
        $no_pendaftaran = mt_rand(0000000001, 9999999999);
        return $no_pendaftaran;
    }

    public function uploadSemuaBerkas()
    {
        $jenisBerkas = $_POST['jenis_berkas'];
        $nameFile = $_FILES['file']['name'];
        $tempName = $_FILES['file']['tmp_name'];
        $data['namaFile'] = mt_rand(1, 999) . $nameFile;
        $data['jenisBerkas'] = $jenisBerkas;
        $data['nisn'] = $this->nisnAccountSiswa;
        $this->model('UploadBerkas_model')->insert($data);

        switch ($jenisBerkas) {
            case 'file_foto_diri':
                $jenis = "Foto Diri";
                $dirUpload = dirname(dirname(__DIR__)) . "/public/upload/berkas/";
                move_uploaded_file($tempName, $dirUpload . $data['namaFile']);
                break;
            case 'file_ijazah_sebelumnya':
                $jenis = "Ijazah";
                $dirUpload = dirname(dirname(__DIR__)) . "/public/upload/berkas/";
                move_uploaded_file($tempName, $dirUpload . $data['namaFile']);
                break;
            case 'file_akta':
                $jenis = "Akta";
                $dirUpload = dirname(dirname(__DIR__)) . "/public/upload/berkas/";
                move_uploaded_file($tempName, $dirUpload . $data['namaFile']);
                break;
            case 'file_kartu_keluarga':
                $jenis = "Kartu Keluarga";
                $dirUpload = dirname(dirname(__DIR__)) . "/public/upload/berkas/";
                move_uploaded_file($tempName, $dirUpload . $data['namaFile']);
                break;
        }

        Flasher::setFlash('Upload Berkas ' . $jenis . ' Berhasil', 'success');
        header('Location: ' . BASEURL . '/Siswa');
        exit;
    }

    public function getJenisAsalSekolahByIdJenjangSekolah($id)
    {
        echo json_encode($this->model('JenisAsalSekolah_model')->getByIdJenjangSekolah($id));
    }

    public function getTingkatKelasByIdJenjangSekolah($id)
    {
        echo json_encode($this->model('TingkatKelas_model')->getByIdJenjangKelas($id));
    }

    public function getKelasPararelByIdTingkatKelas($id)
    {
        echo json_encode($this->model('KelasPararel_model')->getByIdTingkatKelas($id));
    }

    public function lihatDataDiri()
    {
        $this->data['judul'] = "Lihat Data Diri";
        $this->data['ifAccountDoneDaftar'] = $this->ifAccountDoneDaftar;
        $this->data['siswa'] = $this->model('Siswa_model')->getSiswaWithRelationByIdAccountSiswa($this->id_user);
        $this->view('templates/header', $this->data);
        $this->view('siswa/lihat_data_diri', $this->data);
        $this->view('templates/footer');
    }

    public function uploadBerkas()
    {
        if (!$this->ifAccountDoneDaftar) {
            Flasher::setFlash('Isi Form Pengisian Identitas diri dan Sekolah siswa baru terlebih dahulu', 'danger');
            header('Location: ' . BASEURL . '/Siswa/pendaftaranSiswa');
            exit;
        }

        $this->data['judul'] = 'Upload Berkas Persyaratan';
        $this->data['checkBerkasDoneUpload'] = $this->checkBerkasDoneUpload;
        $this->view('templates/header', $this->data);
        $this->view('siswa/upload_berkas', $this->data);
        $this->view('templates/footer');
    }

    public function cetakDataDiri()
    {
        $this->data['judul'] = "Cetak Data Diri";
        $this->data['ifAccountDoneDaftar'] = $this->ifAccountDoneDaftar;
        $this->data['siswa'] = $this->model('Siswa_model')->getSiswaWithRelationByIdAccountSiswa($this->id_user);
        $this->view('siswa/cetak_data_diri', $this->data);
    }
}
