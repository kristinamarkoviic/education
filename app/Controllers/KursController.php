<?php
namespace app\Controllers;
use app\Config\DB;
use app\Models\Kurs;

class KursController extends PageController {
    public function __construct() {
        parent::__construct();
    }
    //paginacija
    public function dohvati_broj() {
        if(isset($_GET['broj'])) {
            $broj = $_GET['broj'];
            try {
                $kurs = new Kurs(DB::instance());
                $kursevi = $kurs->dohvati_kurseve_paginacija($broj);
                $this->json($kursevi);
            }
            catch(\PDOException $ex) {
                $this->json($ex->getMessage(), 500);
            }
        }
        else {
            $this->json(null, 403);
        }
    }
    //ucitavanje home strane
    public function homePage() {
        $kurs = new Kurs(DB::instance());
        $kursevi = $kurs->dohvati_kurseve();
        $this->data['kursevi'] = $kursevi;
        $this->loadView("home",$this->data);
        $this->upisi_log();
    }
    public function dohvati_sve_kurseve() { //dohvatanje svih kurseva upit
        $kurs = new Kurs(DB::instance());
        try {
            $kursevi = $kurs->dohvati_kurseve_home();
            $this->json($kursevi);
        }
        catch(\PDOException $ex) {
            $this->json($ex->getMessage(), 500);
        }
    }
    public function dohvati_sve_search() { //dohvatanje kurseva -SEARCH
        if(isset($_POST['naziv'])) {
            try {
                $kursevi = new Kurs (DB::instance());
                $search ="%".strtolower($_POST['naziv'])."%";
                $search_result = $kursevi->dohvati_kurs_search($search);
                return $this->json($search_result);
            }
            catch(\PDOException $ex) {
                $this->json($ex->getMessage(), 500); //bad request
            }
        }
        else {
            $this->json(null,403);
        }
    }
    public function dohvati_jedan_kurs() { //dohvati jedan kurs
        if(isset($_GET['id'])) {
            try {
                if(isset($_SESSION['user'])) {
                    $kurs = new Kurs(DB::instance());
                    $idKorisnik = $_SESSION['user']->idKorisnik;
                    $jedan_kurs = $kurs->dohvati_kurs_sa_levelima_status($_GET['id'],$idKorisnik);
                    $this->data['singleKurs'] = $jedan_kurs;
                    $this->loadView("single_course", $this->data);
                }
                else {
                    $kurs = new Kurs(DB::instance());
                    $jedan_kurs = $kurs->dohvati_jedan_kurs_sa_levelima($_GET['id']);
                    $this->data['singleKurs'] = $jedan_kurs;
                    $this->loadView("single_course", $this->data);
                    $this->upisi_log();
                }
            }
            catch(\PDOException $ex) {
                $this->json($ex->getMessage(), 500);
            }
        }
        else {
            $this->json(null, 403);
        }
    }
    
}