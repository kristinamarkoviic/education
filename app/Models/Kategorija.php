<?php
namespace app\Models;
use app\Config\DB;

class Kategorija {
    private $db;

    public function __construct(DB $db) {
        $this->db = $db;
    }
    
    //funkcija koja vraca sve kategorije
    public function getAll() {
        return $this->db->executeQuery("SELECT * FROM kategorije");
    }
    public function dohvati_kurseve($id) {
        $params = [($id)];
        $upit = "SELECT k.*, t.ime_prezime, t.slika AS t_slika, zanimanje FROM kursevi k INNER JOIN teachers t ON k.idTeacher = t.idTeacher WHERE idKategorija = ?";
        return $this->db->executeAll($upit, $params);
    }
}