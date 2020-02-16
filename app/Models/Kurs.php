<?php

namespace app\Models;
use app\Config\DB;

class Kurs {
    public $db;
    public function __construct(DB $db){
        $this->db = $db;
    }
    //funkcija za paginaciju kurseva
    public function dohvati_kurseve_paginacija($broj) {
        $limit = $broj * 3;
        $upit = "SELECT k.*, t.ime_prezime, t.slika AS t_slika, zanimanje FROM kursevi k  INNER JOIN teachers t ON k.idTeacher = t.idTeacher LIMIT $limit, 3";
        return $this->db->executeQuery($upit);
    }
    //funkcija prebrojavanje broja kurseva za paginaciju
    public function broj_kurseva() {
        return $this->db->executeQuery("SELECT COUNT(*) AS broj FROM kursevi");
    }
    //finkcija DELETE jednog kursa
    public function delete($idKurs) {
        $params = [($idKurs)];
        $upit = "DELETE FROM kursevi WHERE idKurs = ?";
        return $this->db->insert_fja($upit, $params);
    }
    //funkcija za dohvatanje svih kurseva
    public function dohvati_kurseve() { //kursevi svi - upit
        $upit = "SELECT k.*, t.ime_prezime, t.slika AS t_slika, zanimanje FROM kursevi k  INNER JOIN teachers t ON k.idTeacher = t.idTeacher";
        return $this->db->executeQuery($upit);
    }
    //funkcija za dohvatanje inicijalnih kurseva na home strani
    public function dohvati_kurseve_home() {
        $upit = "SELECT k.*, t.ime_prezime, t.slika AS t_slika, zanimanje FROM kursevi k  INNER JOIN teachers t ON k.idTeacher = t.idTeacher LIMIT 0,3";
        return $this->db->executeQuery($upit);
    }
    //upit za search executeAll()
    public function dohvati_kurs_search($search) { //izlistani kursevi na osnovu unosa korisnika u serach polju - UPIT
        $params = [($search)];
        $upit = "SELECT k.*, t.ime_prezime, t.slika AS t_slika, zanimanje FROM kursevi k  INNER JOIN teachers t ON k.idTeacher = t.idTeacher WHERE LOWER(k.naziv) LIKE ?";
        return $this->db->executeAll($upit, $params);
    }
    // pomocna funkcija za dohvatanje jednog kursa
    public function dohvati_kurs($id) {
        $params = [($id)];
        $upit = "SELECT k.*, t.ime_prezime, t.idTeacher, t.slika AS t_slika, zanimanje, ka.idKategorija, ka.naziv AS naziv_kat  FROM kursevi k  INNER JOIN teachers t ON k.idTeacher = t.idTeacher INNER JOIN kategorije ka ON ka.idKategorija = k.idKategorija WHERE k.idKurs = ?";
        return $this->db->executeOneRow($upit, $params);
    }
    // pomocna funkcija za dohvatanje kursa i njegovih levela
    public function dohvati_kurs_levele($id) {
        $params = [($id)];
        $upit = "SELECT l.* FROM leveli l INNER JOIN kursevi_leveli kl ON l.idLevel = kl.idLevel INNER JOIN kursevi k ON k.idKurs  = kl.idKurs WHERE k.idKurs  = ?";
        return $this->db->executeAll($upit, $params);
    }
    //funkcija proverava status
    public function proveri_status_korisnika($id, $idKorisnik) {
        $params = [$id, $idKorisnik];
        $upit = "SELECT status FROM korisnici_kursevi WHERE idKurs = ? AND idKorisnik = ?";
        return $this->db->executeOneRow($upit, $params);
    }
    public function dohvati_kurs_sa_levelima_status($id, $idKorisnik) {
        $status = $this->proveri_status_korisnika($id, $idKorisnik);
        $jedan_kurs = $this->dohvati_kurs($id);
        $jedan_level = $this->dohvati_kurs_levele($id);
        $jedan_kurs->jedan_level = $jedan_level;
        $jedan_kurs->status = $status;
        return $jedan_kurs;
    }
    //upit za dohvatanje jednog kursa
    public function dohvati_jedan_kurs_sa_levelima($id) {
        $jedan_kurs = $this->dohvati_kurs($id);
        $jedan_level = $this->dohvati_kurs_levele($id);
        
        //ovde sad za levele
        $jedan_kurs->jedan_level = $jedan_level;
        return $jedan_kurs;
    }
    public function dohvati_teachers() {
        $upit = "SELECT * FROM teachers";
        return $this->db->executeQuery($upit);
    }
    public function insert_course($title_insert, $description_insert, $youtube_insert, $putan_course_photo, $time_insert, $current_time, $category_insert, $teachers_insert) {
        $params = [
            $title_insert,
            $description_insert,
            $youtube_insert,
            $putan_course_photo,
            $time_insert,
            $current_time,
            $category_insert,
            $teachers_insert
        ];
        $upit  = "INSERT INTO kursevi VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?)";

        $this->db->insert_fja($upit, $params);
    }

    public function do_update_course($title_insert, $description_insert, $youtube_insert, $time_insert, $category_insert, $teachers_insert, $idCourse) {
        $params = [
            $title_insert,
            $description_insert,
            $youtube_insert,
            $time_insert,
            $category_insert,
            $teachers_insert,
            $idCourse
        ];

        $upit = "UPDATE kursevi SET naziv = ?, opis = ?, youtube_link = ?, vreme_trajanja = ?, idKategorija = ?, idTeacher = ? WHERE idKurs = ?";

        $this->db->insert_fja($upit, $params);
    }

    public function do_update_course_photo($putan_course_photo, $idCourse) {
        $params = [
            $putan_course_photo,
            $idCourse
        ];

        $upit = "UPDATE kursevi SET slika = ? WHERE idKurs = ?";

        $this->db->insert_fja($upit, $params);
    }

}