<?php
namespace app\Controllers;
use app\Config\DB;
use app\Models\Kategorija;

class KategorijeController extends PageController {

    public function __construct() {
        parent::__construct();
    }
    public function dohvati_kurs_kategorije() {
        if(isset($_POST['id'])) {
            $idKat=$_POST['id'];
            try {
                $kategorije = new Kategorija(DB::instance());
                $kursevi = $kategorije->dohvati_kurseve($idKat);
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
}