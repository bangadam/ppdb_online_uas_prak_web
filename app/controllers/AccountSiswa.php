<?php

class AccountSiswa extends Controller
{
    public function login()
    {
        $user = $this->model('AccountSiswa_model')->loginAccount($_POST);
        if (count($user) > 0 && $user['is_confirmation'] == 1) {
            $_SESSION['user']['id_user'] = $user['id_account_siswa'];
            $_SESSION['user']['email'] = $_POST['email'];
            $_SESSION['user']['level'] = 'siswa';
            header('Location: ' . BASEURL . '/Siswa');
            exit;
        } else {
            Flasher::setFlash('Email atau Password Salah dan pastikan email anda sudah terverifikasi', 'danger');
            header('Location: ' . BASEURL . '/Home');
            exit;
        }
    }

    public function register()
    {
        try {
            if ($this->model('AccountSiswa_model')->registerAccount($_POST) > 0) {
                $this->sendEmail($_POST['email']);
                Flasher::setFlash('Pendaftaran akun berhasil, Silahkan cek email anda untuk konfirmasi akun', 'success');
                header('Location: ' . BASEURL . '/Home');
                exit;
            } else {
                Flasher::setFlash('Pendaftaran akun gagal', 'danger');
                header('Location: ' . BASEURL . '/Home');
                exit;
            }
        } catch (Exception $e) {
            Flasher::setFlash('Maaf, Email ini Sudah Terdaftar', 'danger');
            header('Location: ' . BASEURL . '/Home');
            die();
        }
    }

    public function sendEmail($email)
    {
        try {
            $mail = new PHPMailer\PHPMailer\PHPMailer();

            //Enable SMTP debugging. 
            $mail->SMTPDebug = 0;
            //Set PHPMailer to use SMTP.
            $mail->isSMTP();
            $mail->SMTPAuth = true;
            //Set SMTP host name                          
            //        $mail->Host = "smtp.mailtrap.io";
            $mail->Host = "smtp.gmail.com";
            //Set this to true if SMTP host requires authentication to send email
            $mail->SMTPAuth = true;
            //Provide username and password     
            $mail->Username = "dafanamikaze@gmail.com";
            $mail->Password = "arekgedangan";
            //If SMTP requires TLS encryption then set it
            $mail->SMTPSecure = "tls";
            //Set TCP port to connect to 
            $mail->Port = 587;

            $mail->From = "sekolahxyz@sekolah.ac.id";
            $mail->FromName = "Admin";

            $mail->addAddress($email, $email);

            $mail->isHTML(true);

            $mail->Subject = "Panitia PSB Sekolah XYZ";

            $body = '<!DOCTYPE html><html><head> <meta charset="utf-8"> <meta http-equiv="x-ua-compatible" content="ie=edge"> <title>Email Confirmation</title> <meta name="viewport" content="width=device-width, initial-scale=1"> <style type="text/css"> body, table, td, a{-ms-text-size-adjust: 100%; /* 1 */ -webkit-text-size-adjust: 100%; /* 2 */}/** * Remove extra space added to tables and cells in Outlook. */ table, td{mso-table-rspace: 0pt; mso-table-lspace: 0pt;}/** * Better fluid images in Internet Explorer. */ img{-ms-interpolation-mode: bicubic;}/** * Remove blue links for iOS devices. */ a[x-apple-data-detectors]{font-family: inherit !important; font-size: inherit !important; font-weight: inherit !important; line-height: inherit !important; color: inherit !important; text-decoration: none !important;}/** * Fix centering issues in Android 4.4. */ div[style*="margin: 16px 0;"]{margin: 0 !important;}body{width: 100% !important; height: 100% !important; padding: 0 !important; margin: 0 !important;}/** * Collapse table borders to avoid space between cells. */ table{border-collapse: collapse !important;}a{color: #1a82e2;}img{height: auto; line-height: 100%; text-decoration: none; border: 0; outline: none;}</style></head><body style="background-color: #e9ecef;"> <div class="preheader" style="display: none; max-width: 0; max-height: 0; overflow: hidden; font-size: 1px; line-height: 1px; color: #fff; opacity: 0;"> A preheader is the short summary text that follows the subject line when an email is viewed in the inbox. </div><table border="0" cellpadding="0" cellspacing="0" width="100%"> <tr> <td align="center" bgcolor="#e9ecef"> </td></tr><tr> <td align="center" bgcolor="#e9ecef"><!--[if (gte mso 9)|(IE)]> <table align="center" border="0" cellpadding="0" cellspacing="0" width="600"> <tr> <td align="center" valign="top" width="600"><![endif]--> <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;"> <tr> <td align="center" bgcolor="#ffffff" style="padding: 36px 24px 0; font-family: Helvetica, Arial, sans-serif; border-top: 3px solid #d4dadf;"> <h1 style="margin: 0; font-size: 32px; font-weight: 700; letter-spacing: -1px; line-height: 48px;">Konfirmasi akun anda</h1> </td></tr></table><!--[if (gte mso 9)|(IE)]> </td></tr></table><![endif]--> </td></tr><tr> <td align="center" bgcolor="#e9ecef"> <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;"> <tr> <td align="left" bgcolor="#ffffff" style="padding: 24px; font-family: Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;"> </td></tr><tr> <td align="left" bgcolor="#ffffff"> <table border="0" cellpadding="0" cellspacing="0" width="100%"> <tr> <td align="center" bgcolor="#ffffff" style="padding: 12px;"> <table border="0" cellpadding="0" cellspacing="0"> <tr> <td align="center" bgcolor="#1a82e2" style="border-radius: 6px;"> <a href="http://localhost:8888/ppdb_online_uas_web/public/accountsiswa/confirm/' . $email . '" target="_blank" style="display: inline-block; padding: 16px 36px; font-family: Helvetica, Arial, sans-serif; font-size: 16px; color: #ffffff; text-decoration: none; border-radius: 6px;">Konfirmasi akun</a> </td></tr></table> </td></tr></table> </td></tr><tr> <td align="center" bgcolor="#ffffff" style="padding: 24px; font-family: Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px; border-bottom: 3px solid #d4dadf"> <p style="margin: 0;">Developed with love by bangadam.dev</p></td></tr></table> </td></tr></table></body></html>';

            $mail->Body = $body;

            if (!$mail->send()) {
                echo "Mailer Error: " . $mail->ErrorInfo;
                die();
            }
        } catch (\Exception $th) {
            var_dump($th->getMessage());
            die();
        }
    }

    public function confirm($email)
    {
        if ($this->model('AccountSiswa_model')->confirmAccountByEmail($email) > 0) {
            Flasher::setFlash('Akun berhasil dikonfirmasi, silahkan Login', 'success');
            header('Location: ' . BASEURL . '/Home');
            exit;
        } else {
            Flasher::setFlash('Akun gagal dikonfirmasi', 'danger');
            header('Location: ' . BASEURL . '/Home');
            exit;
        }
    }
}
