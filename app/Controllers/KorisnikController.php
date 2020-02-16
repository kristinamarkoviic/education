<?php

namespace app\Controllers;
use app\Config\DB;
use app\Models\Korisnik;
use app\Models\Kurs;

class KorisnikController extends PageController {
    //pravljenje konstruktora, ujedno nasledjivanje roditeljskog
    public function __construct() {
        parent::__construct();
    }
    //funkcija UPDATE korisnika A.PANEL
    public function update_korisnici() {
        if(isset($_POST['poslato'])) {
            //dohvati
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $idKorisnik = $_POST['id'];
            $idUloga = $_POST['idUloga'];
            $registrovan_vreme = date("Y-m-d H-i-s", time());
            try {
                $korisnik = new Korisnik(DB::instance());
                $korisnik_update = $korisnik->update($idKorisnik,$first_name,$last_name,$email,$password,$registrovan_vreme, $idUloga);
                return $this->json(null, 204); 
            }
            catch(\PDOException $ex) {
                $this->json($ex->getMessage(), 500);
            }
        }
        else {
            $this->json(null, 403);
        }
    }
    //funkcija DOHVATANJA JEDNOG korisnika A.PANEL
    public function dohvati_jednog_korisnika() {
        if(isset($_POST['id'])) {
            try {
                $idKorisnik = $_POST['id'];
                $korisnik = new Korisnik(DB::instance()); 
                $korisnik_single = $korisnik->dohvati_jednog($idKorisnik);
                return $this->json($korisnik_single);
            }
            catch(\PDOException $ex) {
                $this->json($ex->getMessage(), 500);
            }
        }
        else {
            $this->json(null, 403);
        }
    }
    //funkcija INSERT korisnika A.PANEL
    public function insert_korisnici() {
        if(isset($_POST['poslato'])) {
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
                $korisnik = new Korisnik(DB::instance());
                $password = md5($password);
                $korisnik_insert = $korisnik->insert($first_name,$last_name,$email,$password,$registrovan_vreme,$token);
                return $this->json(null, 201);
            }
            catch(\PDOException $ex) {
                $this->json($ex->getMessage(), 500);
            }
        }
        else {
            $this->json(null, 403);
        }
    }
    //funkcija DELETE korisnika A.PANEL
    public function delete_korisnici() {
        if(isset($_POST['id'])){
            try {
                $idKorisnik = $_POST['id'];
                $korisnik = new Korisnik(DB::instance());
                $korisnik_delete = $korisnik->delete($idKorisnik);
                return $this->json(null, 204);
            }
            catch(\PDOException $ex) {
                $this->json($ex->getMessage(), 500);
            }
        }
        else {
            $this->json(null, 403);
        }
    }
    //funkcija za SEARCH korisnika A.PANEL
    public function search_korisnici() {
        if(isset($_POST['search'])) {
            $search ="%".strtolower($_POST['search'])."%";
            try {
                $korisnik = new Korisnik(DB::instance());
                $vrati_korisnike = $korisnik->search($search);
                return $this->json($vrati_korisnike);
            }
            catch(\PDOException $ex) {
                $this->json($ex->getMessage(), 500);
            }
        }
        else {
            $this->json(null,403);
        }
    }
    
    //funkcija za ispis korisnika A.PANEL
    public function korisnici_svi() {
        $korisnik = new Korisnik(DB::instance());
        try {
            $svi_korisnici = $korisnik->getUsers();
            return $this->json($svi_korisnici);
        }
        catch(\PDOException $ex) {
            $this->json($ex->getMessage(), 500);
        }
    }
    
    //funkcija za prikaz korisnikove strane i ucitavanje kurseva korisnika na istoj
    public function usersPage() { 
        if(isset($_SESSION['user'])) {
            try {
                $korisnik = new Korisnik(DB::instance());
                $id = $_SESSION['user']->idKorisnik;
                $korisnik_kurs = $korisnik->dohvati_kurseve_korisnika($id);
                $this->data['korisnik_kursevi'] = $korisnik_kurs;
                $this->loadView("usersPage", $this->data);
                $this->upisi_log();
            }
            catch(\PDOException $ex) {
                $this->json($ex->getMessage(), 500);
            }
        }
        else {
            $this->json(null, 403);
        }
        
    }
    //funkcija za dodavanje u bazu kursa kojeg korisnik zeli
    public function dodaj_kurs_korisniku() {
        //ovde pitam za sessiju i za id sto je poslat iz baze
        if(isset($_GET['id'])) {
            try {
                $id = $_GET['id'];
                $idKorisnik = $_SESSION['user']->idKorisnik;
                $korisnik = new Korisnik(DB::instance());
                $kurs_korisnik = $korisnik->insert_korisnik_kurs($id,$idKorisnik);
                return $this->json(null, 201);
            }
            catch(\PDOException $ex) {
                $this->json($ex->getMessage(), 500);
            }
        }
        else {
            $this->json(null, 403);
        }
    }
    //funkcija za brisanje kursa i menjanje statusa poruke u UNFOLLOW
    public function ukloni_kurs_korisniku() {
        //ovde pitam za sessiju i za id sto je poslat iz baze
        if(isset($_GET['id'])) {
            try {
                $id = $_GET['id'];
                $idKorisnik = $_SESSION['user']->idKorisnik;
                $korisnik = new Korisnik(DB::instance());
                $kurs_korisnik = $korisnik->update_korisnik_kurs($id,$idKorisnik);
                return $this->json(null, 204);
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