<?php
require_once __DIR__ . '/../PHPMailer/SergejMailer.php';

class Mail {

    public static function send($data) {

        $to = $data['mail'];
        $subject = 'Account aktivieren';
        $message = DIR . 'user/activate/' . $to . '/' . $data['code'];

        $mail = new SergejMailer();
        return $mail->send($to, $subject, $message);
    }
}