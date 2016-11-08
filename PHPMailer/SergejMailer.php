<?php
/**
 * Created by PhpStorm.
 * User: dennis
 * Date: 10.10.16
 * Time: 16:22
 */

class SergejMailer{

    public function __construct(){
        require_once 'PHPMailerAutoload.php';
    }

    private function getMailer()
    {
        $mail = new PHPMailer();

        $mail->IsSMTP();
        $mail->SMTPDebug = 1;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls';
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 587;
        $mail->Username = "";
        $mail->Password = "";
        $mail->FromName = "Splendr";

        return $mail;
    }

    public function send($email, $subject, $content){

        $mailer = $this->getMailer();

        $message = htmlspecialchars_decode($content);
        if(preg_match('%(<.*>.*</.*>)%i', $message, $regs)) {
            $mailer->isHTML(true);
        }

        $mailer->Subject = $subject;
        $mailer->msgHTML( $message );
        $mailer->clearAddresses();
        $mailer->addAddress($email);

        $res = $mailer->send();
        return $res;
    }
}