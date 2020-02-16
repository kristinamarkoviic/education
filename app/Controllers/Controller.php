<?php 

namespace app\Controllers;
use app\Config\DB;
use app\Models\Nav;
use app\Models\Korisnik;

class Controller {

    
    protected function loadView($view, $data = null) {
        require_once "app/Views/fixed/head.php";
        require_once "app/Views/fixed/header.php";
        require_once "app/Views/fixed/nav.php";
        require_once 'app/Views/pages/' . $view . ".php";
        require_once 'app/Views/fixed/footer.php';
    }

    protected function redirect($page) {
        header("Location: " . $page);
    }

    protected function json($data = null, $statusCode = 200) {
        header("Content-type: application/json");
        http_response_code($statusCode);
        echo json_encode($data);
    }
    //funkcija za dodavanje loga 
    public function upisi_log() {
        $time = date("Y-m-d H-i-s", time());

        if(isset($_SESSION['user'])) {
            $idKorisnik = $_SESSION['user']->idKorisnik;
        }
        else {
            $idKorisnik = 8; //korisnik obelezen kao neautorizovan u bazi
        }

        $page = explode(".php",$_SERVER['REQUEST_URI']);

        if($page[1] == "") {
            $page[1] = "home";
        }
        $ipAdress = $_SERVER['REMOTE_ADDR'];
        $korisnik = new Korisnik(DB::instance());
        $korisnik_log = $korisnik->dodaj_log($idKorisnik, $ipAdress, $page[1], $time );
    }
    

}