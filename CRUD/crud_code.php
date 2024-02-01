<?php
require_once('../../config/connection.php');
require_once "../../model/code.php";
require_once "Crud_account.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Crud_code
{
    protected $pdo;
    function __construct()
    {
        $obj = new connection();
        $this->pdo = $obj->getConnection();
    }
    public function getEmail($code)
    {
        $req = "select email from codeverif where code='$code'";
        $res = $this->pdo->query($req);
        $res = $res->fetch(PDO::FETCH_NUM);
        return $res[0];
    }
    public function deleteCode($code)
    {
        if ($this->codeExist($code)) {
            $req = "delete from codeverif where code='$code'";
            $res = $this->pdo->exec($req);
            return $res;
        } else {
            return false;
        }
    }
    public function generateCode($email, $length = 30)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $code = '';
        for ($i = 0; $i < $length; $i++) {
            $code .= $characters[rand(0, $charactersLength - 1)];
        }
        $date_debut = date("Y-m-d h:i:s");
        $date_fin = date("Y-m-d H:i:s", strtotime("+60 minutes"));
        $req = "insert into codeverif values('$code','$date_debut','$date_fin','$email')";
        $res = $this->pdo->exec($req);
        if ($res === false) {
            return $this->generateCode($length, $email);
        } else {
            return $code;
        }
    }
    public function sendCode($email, $msgTitle, $msgContent)
    {
        require "../../vendor/autoload.php";

        $mail = new PHPMailer(true);
        try {
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'zimysisetstage@gmail.com';
            $mail->Password   = 'seyv ustt fqtw cqtq'; // Use a secure method for storing this
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // Use ENCRYPTION_SMTPS for port 465
            $mail->Port       = 465; // Use 587 if you are using ENCRYPTION_STARTTLS
            $mail->SMTPDebug = 0;
            $mail->setFrom('zimysisetstage@gmail.com', 'Zimys');
            $mail->addAddress($email);

            $mail->isHTML(true);
            $mail->Subject = $msgTitle;
            $mail->Body = $msgContent;
            $mail->send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error : {$mail->ErrorInfo}";
        }
    }
    public function verifCode($code)
    {
        $req = "select * from codeverif where code='$code'";
        $res = $this->pdo->query($req);
        $res = $res->fetch(PDO::FETCH_NUM);
        if ($res == null) {
            return false;
        } else {
            $date = date("Y-m-d H:i:s");
            if ($date > $res[2]) {
                return false;
            } else {
                $account = new CRUD();
                $account->verifEmail($res[3]);
                return true;
            }
        }
    }
    function codeExist($code)
    {
        $req = "select * from codeverif where code='$code'";
        $res = $this->pdo->query($req);
        $res = $res->fetch(PDO::FETCH_NUM);
        if ($res == null) {
            return false;
        } else {
            return true;
        }
    }
}
