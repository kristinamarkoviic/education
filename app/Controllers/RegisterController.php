<?php

namespace app\Controllers;

use app\Config\DB;
use app\Models\Korisnik;

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';
// $model_korisnik = new Korisnik(DB::instance());


class RegisterController extends PageController {

    public function __construct() {
        parent::__construct();
    }

    public function registerConfirmPage() {
        $this->loadView("confirmRegistration", $this->data); //strana na kojoj se nalazi potvrda o registraciji
        $model_korisnik = new Korisnik(DB::instance());
        //iz url adrese uzmi token
        $model_korisnik->confirmRegistration($_GET['token']);
    }

    public function register() {
        if(isset($_POST['btnRegister'])) {
            $model_korisnik = new Korisnik(DB::instance());

            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $token = sha1(rand()) . time();
            $registrovan_vreme = date("Y-m-d H-i-s", time());

            $errors = []; //array za greske
            //reg za ime i prezime koliko moze
            $regName = "/^[A-Z][a-z]{2,13}(\s[A-Z][a-z]{2,13})*$/";
            $rePassword="/(?=.*[a-z])(?=.*[0-9])(?=.{8,})/"; // mora biti veca od 6 i mora imati barem jedan broj

            if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = "Mail - Wrong Format";
            }
            if(!preg_match($rePassword, $password)) {
                $errors[] = "Password - Wrong Format";
            }
            if(!preg_match($regName, $first_name)) {
                $errors[] = "First Name error";
            }
            if(!preg_match($regName, $last_name)) {
                $errors[] = "LAST NAME ERROR";
            }

            if(count($errors) > 0) {
                $this->json($errors, 422);
                exit;
            }
            try {
                $password = md5($password);
                $model_korisnik = new Korisnik(DB::instance());
                $model_korisnik->insertUser($first_name,$last_name,$email,$password, $registrovan_vreme, $token);
                $this->json(null, 201);
                //Mailer
                $mail = new PHPMailer(true);

                try {
                    //Server settings
                    $mail->SMTPDebug = 0;

                    $mail->isSMTP();
                    $mail->Host = 'smtp.gmail.com';

                    $mail->SMTPAuth = true;
                    $mail->Username = 'kikicakikic185@gmail.com';
                    $mail->Password = 'dalijeovokikica185?';
                    $mail->SMTPSecure = 'tls';
                    $mail->Port = 587;

                    $mail->setFrom('kikicakikic185@gmail.com', 'Education Team, please confirm your registration');
                    $mail->addAddress($email);
                    $mail->isHTML(true);
                    // Set email format to HTML
                    $mail->Subject = 'Activation Education site';
                    $mail->Body    = "Activate your account by clicking on: <a href='http://localhost:0080/kursevi/index.php?page=confirmRegistration&token={$token}'>LINK</a>";
                    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                    $mail->send();
                } catch (Exception $e) {
                    var_dump("Message could not be sent. Mailer Error: {$mail->ErrorInfo}");
                }

            } catch (\PDOException $ex) {
                $this->json($ex, 500);
            }
        } else { //endif isset
            $this->json(null, 403);
        }


    }
}