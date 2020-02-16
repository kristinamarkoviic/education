<?php

namespace app\Controllers;

use app\Config\DB;
use app\Models\Nav;
use app\Models\Kategorija;
//kontroler za ucitavanje svih strana 
class PageController extends Controller {

    // public function __construct() {
    //     parent::__construct();
    // }
    protected $data;
    public function __construct()
    {
        $kategorije = new Kategorija(DB::instance());
        $navigacija = new Nav(DB::instance());
        $kategorije_data = $kategorije->getAll();
        $meni = $navigacija->getMenu();
        $this->data = [
            'menu' => $meni,
            'kategorije' => $kategorije_data
        ];
    }
    //funkcija ucitavanja contact strane
    public function contactPage() {
        $this->loadView("contact", $this->data);
    }
    //funkcija ucitavanja 404 (not found) strane
    public function page404() {
        $this->loadView("404", $this->data);
    }
}