<?php
namespace app\Controllers;

use app\Config\DB;
use app\Models\Korisnik;

class LoginController extends Controller {
    public function logout() {
        if(isset($_SESSION['user'])){
           $model = new Korisnik(DB::instance());
           $model->obrisi_aktivnog($_SESSION['user']->idKorisnik);
           unset($_SESSION['user']);
           $this->redirect("index.php?page=home");
        }
    }
    public function log() {
        if(isset($_POST["btnLogin"])) {
            $email = $_POST['email_log'];
            $password = $_POST['password_log'];
            $errors = [];
            
            $rePassword="/(?=.*[a-z])(?=.*[0-9])(?=.{8,})/";

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = "Mail is not in good format!";
            }
            if(!$password){
                $errors[]="Password is a required field";
            }
            else if(!preg_match($rePassword,$password)){
                $errors[]="Password must contain only lowercase letters and numbers, atleast 8 characters long.";
            }
            if(count($errors) > 0) {
                $this->json($errors, 422);
                $this->redirect("index.php?page=home");
                exit; // rez rec za da ne moram pisati else , vec ako ima greske prekine svaki rad
            }
            $password = md5($password);
            try {
                $model = new Korisnik(DB::instance());
                // var_dump($model);
                $user = $model->login($email, $password);
                if($user == null) {
                    $this->redirect("index.php?page=home");
                    exit;
                }
                
                $_SESSION['user'] = $user;
                $_SESSION['admin'] = $user->idUloga  == 1;
                $_SESSION['korisnik'] = $user->idUloga  == 2;

                $model->dodaj_aktivnog($_SERVER['REMOTE_ADDR'], $_SESSION['user']->idKorisnik);

                $this->redirect("index.php?page=home");
            }
            catch(\PDOException $ex) {
                $this->json($ex->getMessage(), 500);
            }
        }
        else {
            $this->redirect("index.php?page=home");
        }
    }
}



