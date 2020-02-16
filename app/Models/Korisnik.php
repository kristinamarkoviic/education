<?php
namespace app\Models;
use app\Config\DB;

class Korisnik {
    private $db;

    public function __construct(DB $db){
        $this->db = $db;
    }
    //funkcija za dodaj log
    public function dodaj_log($idKorisnik, $ipAdress, $page, $time ) {
        $params = [
            $idKorisnik,
            $ipAdress,
            $page,
            $time
        ];
        $upit = "INSERT INTO logs_korisnici VALUES (NULL, ?, ?, ?, ?) ";
        $this->db->insert_fja($upit , $params);
    }
    //funkcija dohvatanja LOGS za korisnike A.PANEL
    public function dohvati_logs() {
        return $this->db->executeQuery("SELECT k.*, lk.* FROM korisnici k INNER JOIN logs_korisnici lk ON k.idKorisnik = lk.idKorisnik ORDER BY time DESC");
    }
    //funkcija upisivanje aktivnih korisnika A.PANEL
    public function dodaj_aktivnog($ipAdress, $idKorisnik){
        $params = [$idKorisnik, $ipAdress];
        $query = "INSERT INTO active_korisnici VALUES (NULL, ?, ?)";
        $this->db->insert_fja($query, $params);
    }
    //funkcija brisanja aktivnih korisnika A.PANEL
    public function obrisi_aktivnog($idKorisnik){
        $params = [($idKorisnik)];
        $query = "DELETE FROM active_korisnici WHERE idKorisnik = ?";
        $this->db->insert_fja($query, $params);
    }
    //funkcija dohvatanja aktivnih korisnika A.PANEL
    public function dohvati_sve_aktivne() {
        return $this->db->executeQuery("SELECT k.*, ak.* FROM korisnici k JOIN active_korisnici ak on k.idKorisnik = ak.idKorisnik");
    }
    //funkcija - upit UPDATE KORISNIKA ADMIN PANEL
    public function update($idKorisnik,$first_name,$last_name,$email,$password,$registrovan_vreme, $idUloga) {
        $params = [
            $first_name,
            $last_name,
            $email,
            $password,
            $registrovan_vreme,
            $idUloga,
            $idKorisnik
        ];
        $upit = "UPDATE korisnici SET ime = ?, prezime = ?, email = ?, password = ?, registrovan_vreme = ?, idUloga = ?  WHERE idKorisnik = ?";
        return $this->db->insert_fja($upit, $params);
    }
    //funkcija - upit DOHVATI JEDNOG KORISNIKA A.PANEL
    public function dohvati_jednog($idKorisnik) {
        $params =[($idKorisnik)];
        $upit = "SELECT * FROM korisnici WHERE idKorisnik = ?";
        return $this->db->executeOneRow($upit, $params);
    }

    //funkcija - upit INSERT KORISNIKA ADMIN PANEL
    public function insert($first_name,$last_name,$email,$password, $registrovan_vreme, $token) {
        
        $params = [
            $first_name,
            $last_name,
            $email,
            $password,
            $registrovan_vreme,
            $token
        ];

        $upit = "INSERT INTO korisnici (idKorisnik, ime , prezime , email , password , registrovan_vreme, token, status,  idUloga)
        VALUES (NULL, ?, ?, ?, ?, ?, ?, 0, 2)";
        
        return $this->db->insert_fja($upit,$params);
        
    }
    //funkcija - upit DOHVATI SVE KORISNIKE ADMIN PANEL
    public function getUsers() {
        return $this->db->executeQuery("SELECT k.*, u.naziv AS uloga FROM korisnici k INNER JOIN uloge u ON k.idUloga = u.idUloga");
    }
    //funkcija - upit SEARCH  KORISNIKE ADMIN PANEL
    public function search($korisnik) {
        $params = [($korisnik)];

        $upit  = "SELECT k.*, u.naziv AS uloga FROM korisnici k INNER JOIN uloge u ON k.idUloga = u.idUloga WHERE LOWER(k.ime) OR LOWER(k.prezime) OR LOWER(k.email) LIKE ? ";
        
        return $this->db->executeAll($upit, $params);
    }
    //funkcija - upit DELETE KORISNIKA ADMIN PANEL
    public function delete($idKorisnik) {
        $params = [($idKorisnik)];

        $upit = "DELETE FROM korisnici WHERE idKorisnik = ?";

        return $this->db->insert_fja($upit,$params);
    }
    //funkcija - upit REGISTRACIJA KORISNIKA 
    public function insertUser($first_name,$last_name,$email,$password, $registrovan_vreme, $token) {
        $query = "INSERT INTO korisnici (idKorisnik, ime , prezime , email , password , registrovan_vreme, token, status,  idUloga)
        VALUES (NULL, ?, ?, ?, ?, ?, ?, 0, 2)";
        
        $params = [
            $first_name,
            $last_name,
            $email,
            $password,
            $registrovan_vreme,
            $token
        ];

        return $this->db->insert_fja($query, $params);
    }
    //funkcija - upit POTVRDA REGISTRACIJE KORISNIKA 
    public function confirmRegistration($token) {
        $params = [($token)];

        $upit = "UPDATE korisnici SET status = 1 WHERE token = ?";

        return $this->db->insert_fja($upit, $params);
    }
    //funkcija - upit LOGIN  KORISNIKA 
    public function login($email, $password) {
        $params = [$email, $password];

        $query = "SELECT * FROM korisnici WHERE email = ? AND password = ? AND status = 1";

        $data = $this->db->executeAll($query, $params);
        if(!count($data)) {
            return null;
        }
        return $data[0];
    }
    //funkcija dohvatanja svih kurseva za jednog korisnika
    public function dohvati_kurseve_korisnika($id) {
        $params = [($id)];

        $query = "SELECT k.ime, k.prezime, k.email, kurs.* FROM korisnici k INNER JOIN korisnici_kursevi kk ON k.idKorisnik = kk.idKorisnik INNER JOIN kursevi kurs ON kk.idKurs = kurs.idKurs WHERE k.idKorisnik = ? AND kk.status = 'follow' ";
        
        return $this->db->executeAll($query,$params);
    }
    //funkcija za dodavanje kursa korisniku
    public function insert_korisnik_kurs($id,$idKorisnik) {
        $params = [$id,$idKorisnik];

        $query = "INSERT INTO korisnici_kursevi (idKursKorisnik,idKurs,idKorisnik, status) VALUES (NULL, ?, ?, 'follow')";

        return $this->db->insert_fja($query,$params);
    }
    //funkcija za brisanje kursa korisniku
    public function update_korisnik_kurs($id, $idKorisnik) {
        $params = [$id,$idKorisnik];

        $query = "UPDATE korisnici_kursevi SET status = 'unfollow' WHERE idKurs = ? AND idKorisnik = ?";

        return $this->db->insert_fja($query,$params);
    }
}