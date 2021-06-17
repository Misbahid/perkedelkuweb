<?php

namespace App\MainFunction;

use DB;
use Config;
use Session;
use Exception;

class MailFunction {

    public function __construct() {
        
    }

    public function CreatePHPMailer() {
        $mail = new \PHPMailer\PHPMailer\PHPMailer(true);
        $mail->isSMTP();
        $mail->CharSet = "utf-8";
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls';
        $mail->Host = "mail.perkedelku.co.id";
        $mail->Port = 587;
        $mail->Username = "noreply@perkedelku.co.id";
        $mail->Password = "O{Ae88DhmqPw";
        //$mail->SMTPDebug  = 4; 
        return $mail;
    }

    function test_email() {
        try {
            $to = "misbahimt@gmail.com";
            $mail = $this->CreatePHPMailer();
            $mail->setFrom("ekki.rizkia@forisa.co.id", "Testing");
            $mail->addAddress("$to", "Ekki Rizkia");
            $mail->isHTML(true);
            $bodyContent = view('emailtemplate/testing');
            $mail->Subject = "Testing isabogapastry.id";
            $mail->Body = $bodyContent;
            $mail->send();
            $msg = "Send Email Success";
            return $msg;
        } catch (Exception $ex) {
            $msg = $ex->getMessage();
            return $msg;
        }
    }

    function send_home_contact($to, $nama, $telpon, $email, $pesan) {
        try {
            $mail = $this->CreatePHPMailer();
            $mail->setFrom("perkedelku@nutrijell.com", "perkedelku");
            $mail->addAddress("$to", "Admin");
            $mail->isHTML(true);
            $data_send = (object) [
                        'nama' => $nama,
                        'telpon' => $telpon,
                        'email' => $email,
                        'pesan' => $pesan,
            ];
            $bodyContent = view('emailtemplate/send_home_contact')
                    ->with('emaildata', $data_send);
            $mail->Subject = "New Contact From Website";
            $mail->Body = $bodyContent;
            $mail->send();
        } catch (Exception $ex) {
            $msg = $ex->getMessage();
            return $msg;
        }
    }

    function send_article($to, $name, $title_article, $desc_article, $link, $filenamesave_thumb) {
        try {
            $mail = $this->CreatePHPMailer();
            $mail->setFrom("perkedelku@nutrijell.com", "perkedelku");
            $mail->addAddress("$to", "Admin");
            $mail->isHTML(true);
            $mail->AddEmbeddedImage('images/article/' . $filenamesave_thumb, $filenamesave_thumb);
            $data_send = (object) [
                        'name' => $name,
                        'title_article' => $title_article,
                        'desc_article' => $desc_article,
                        'link' => $link,
//                        'image' => $filenamesave_thumb,
            ];
            $bodyContent = view('emailtemplate/send_article')
                    ->with('emaildata', $data_send);
            $mail->Subject = "New Article From Website";
            $mail->Body = $bodyContent;
            $mail->send();
        } catch (Exception $ex) {
            $msg = $ex->getMessage();
            return $msg;
        }
    }

    function send_recipe($to, $name, $title_article, $desc_article, $link, $filenamesave_thumb) {
        try {
            $mail = $this->CreatePHPMailer();
            $mail->setFrom("perkedelku@nutrijell.com", "perkedelku");
            $mail->addAddress("$to", "Admin");
            $mail->isHTML(true);
            $mail->AddEmbeddedImage('images/article/' . $filenamesave_thumb, $filenamesave_thumb);
            $data_send = (object) [
                        'name' => $name,
                        'title_article' => $title_article,
                        'desc_article' => $desc_article,
                        'link' => $link,
//                        'image' => $filenamesave_thumb,
            ];
            $bodyContent = view('emailtemplate/send_recipe')
                    ->with('emaildata', $data_send);
            $mail->Subject = "New Recipe From Website";
            $mail->Body = $bodyContent;
            $mail->send();
        } catch (Exception $ex) {
            $msg = $ex->getMessage();
            return $msg;
        }
    }
    
     function send_product($to, $name, $title_article, $desc_article, $link,$filenamesave_thumb) {
        try {
            $mail = $this->CreatePHPMailer();
            $mail->setFrom("perkedelku@nutrijell.com", "perkedelku");
            $mail->addAddress("$to", "Admin");
            $mail->isHTML(true);
            $mail->AddEmbeddedImage('images/article/'.$filenamesave_thumb, $filenamesave_thumb);
            $data_send = (object) [
                        'name' => $name,
                        'title_article' => $title_article,
                        'desc_article' => $desc_article,
                        'link' => $link,
//                        'image' => $filenamesave_thumb,
            ];
            $bodyContent = view('emailtemplate/send_product')
                    ->with('emaildata', $data_send);
            $mail->Subject = "New Product From Website";
            $mail->Body = $bodyContent;
            $mail->send();
        } catch (Exception $ex) {
            $msg = $ex->getMessage();
            return $msg;
        }
    }

}
