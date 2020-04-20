<?php

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Admin extends Controller
{
    public function __construct()
    {
        if ($_SESSION['user']['level'] != 'admin') {
            Flasher::setFlash('Anda harus login terlebih dahulu', 'danger');
            header('Location: ' . BASEURL . '/AdminLogin');
            exit;
        }
    }

    public function index()
    {
        $data['judul'] = "Admin";
        $this->view('templates/header', $data);
        $this->view('admin/index', $data);
        $this->view('templates/footer');
    }

    public function logout()
    {
        session_destroy();
        header('Location: ' . BASEURL . '/AdminLogin');
    }

    public function dataSiswa()
    {
        $data['judul'] = "Admin";
        $data['siswa'] = $this->model('Siswa_model')->getAll();
        $this->view('templates/header', $data);
        $this->view('admin/data_siswa', $data);
        $this->view('templates/footer');
    }

    public function exportDataSiswa()
    {
        try {
            $filename = "Report Data Siswa Baru";
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();
            $sheet->setCellValue('A1', 'NSM');
            $sheet->setCellValue('B1', 'NPSN');
            $sheet->setCellValue('C1', 'Status Siswa');
            $sheet->setCellValue('D1', 'Nama Siswa');
            $sheet->setCellValue('E1', 'NISM');
            $sheet->setCellValue('F1', 'NISN');
            $sheet->setCellValue('G1', 'NIK');
            $sheet->setCellValue('H1', 'Tempat Lahir');
            $sheet->setCellValue('I1', 'Tanggal Lahir');
            $sheet->setCellValue('J1', 'Jenis Kelamin');
            $sheet->setCellValue('K1', 'Agama');
            $sheet->setCellValue('L1', 'Hobi');
            $sheet->setCellValue('M1', 'Cita - Cita');
            $sheet->setCellValue('N1', 'Anak Ke-');
            $sheet->setCellValue('O1', 'Jumlah Saudara');
            $sheet->setCellValue('P1', 'Tanggal Masuk');
            $sheet->setCellValue('Q1', 'Tahun Ajaran');
            $sheet->setCellValue('R1', 'Tingkat/Kelas');
            $sheet->setCellValue('S1', 'Kelas Pararel');
            $sheet->setCellValue('T1', 'Jenis Sekolah Asal');
            $sheet->setCellValue('U1', 'NPSN Sekolah Asal');
            $sheet->setCellValue('V1', 'Nama Sekolah Asal');
            $sheet->setCellValue('W1', 'Alamat Sekolah Asal');

            $data = $this->model("Siswa_model")->getAllSiswaWithRelation();
            //        var_dump($data);
            //        die();
            $i = 2;
            foreach ($data['siswa'] as $value) {
                $sheet->setCellValue('A' . $i, $data['madrasah']['NSM']);
                $sheet->setCellValue('B' . $i, $data['madrasah']['NPSN_madrasah']);
                $sheet->setCellValue('C' . $i, $value['status_siswa']);
                $sheet->setCellValue('D' . $i, $value['nama_siswa']);
                $sheet->setCellValue('E' . $i, $value['nism']);
                $sheet->setCellValue('F' . $i, $value['nisn']);
                $sheet->setCellValue('G' . $i, $value['NIK']);
                $sheet->setCellValue('H' . $i, $value['tempat_lahir']);
                $sheet->setCellValue('I' . $i, $value['tanggal_lahir']);
                $sheet->setCellValue('J' . $i, $value['nama_jenis_kelamin']);
                $sheet->setCellValue('K' . $i, $value['nama_agama']);
                $sheet->setCellValue('L' . $i, $value['nama_hobi']);
                $sheet->setCellValue('M' . $i, $value['nama_cita_cita']);
                $sheet->setCellValue('N' . $i, $value['anak_ke']);
                $sheet->setCellValue('O' . $i, $value['jumlah_saudara']);
                $sheet->setCellValue('P' . $i, $value['tanggal_masuk']);
                $sheet->setCellValue('Q' . $i, $value['tahun_ajaran']);
                $sheet->setCellValue('R' . $i, $value['nama_tingkat_kelas']);
                $sheet->setCellValue('S' . $i, $value['nama_kelas_pararel']);
                $sheet->setCellValue('T' . $i, $value['nama_asal_sekolah']);
                $sheet->setCellValue('U' . $i, $value['NPSN_sekolah_asal']);
                $sheet->setCellValue('V' . $i, $value['nama_sekolah_asal']);
                $sheet->setCellValue('W' . $i, $value['alamat_sekolah_asal']);
                $i++;
            }

            $styleArray = [
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    ],
                ],
            ];
            $i = $i - 1;
            $sheet->getStyle('A1:W' . $i)->applyFromArray($styleArray);

            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
            header('Cache-Control: max-age=0');
            header('Cache-Control: max-age=1');

            $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
            $writer->save('php://output');
            exit;
        } catch (Exception $e) {
            var_dump($e->getMessage());
            die();
        }
    }

    public function deleteSiswa($nisn)
    {
        // remove file upload
        $berkas = $this->model('UploadBerkas_model')->getByNisn($nisn);
        foreach ($berkas as $value) {
            unlink(dirname(dirname(__DIR__)) . '/public/upload/berkas/' . $value['nama_berkas']);
        }
        if ($this->model('Siswa_model')->delete($nisn) > 0) {
            Flasher::setFlash('Data berhasil dihapus', 'success');
            header('Location: ' . BASEURL . '/Admin/dataSiswa');
            exit;
        } else {
            Flasher::setFlash('Data gagal dihapus', 'danger');
            header('Location: ' . BASEURL . '/Admin/dataSiswa');
            exit;
        }
    }

    public function lihatSiswa($nisn)
    {
        $data['judul'] = "Lihat Siswa";
        $data['siswa'] = $this->model('Siswa_model')->getSiswaWithRelationByNisn($nisn);
        $this->view('templates/header', $data);
        $this->view('admin/lihat_siswa', $data);
        $this->view('templates/footer');
    }
}
