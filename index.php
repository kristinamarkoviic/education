<?php

require_once "app/Config/autoload.php";
require "app/Config/config.php";

use app\Config\DB;
// use app\Controllers\HomeController;
use app\Controllers\RegisterController;
use app\Controllers\LoginController;
use app\Controllers\PageController;
use app\Controllers\KategorijeController;
use app\Controllers\KursController;
use app\Controllers\KorisnikController;
use app\Controllers\AdminController;

// $home = new HomeController();
$page = new PageController();
$kategorije = new KategorijeController();
$kursevi = new KursController();
$register = new RegisterController();
$login = new LoginController();
$korisnik = new KorisnikController();
$admin = new AdminController();


if(isset($_GET['page'])){
    switch($_GET['page']) {
        case "home":
            $kursevi->homePage();
        break;
        case "contact":
            $page->contactPage();
        break;
        case "register":
            $register->register();
        break;
        case "confirmRegistration":
            $register->registerConfirmPage();
        break;
        case "login":
            $login->log();
        break;
        case "logout":
            $login->logout();
        break;
        case "kategorije":
            $kategorije->dohvati_kurs_kategorije();
        break;
        case "kursevi_svi":
            $kursevi->dohvati_sve_kurseve();
        break;
        case "search_kurs": 
            $kursevi->dohvati_sve_search();
        break;
        case "single_kurs":
            $kursevi->dohvati_jedan_kurs();
        break;
        case "usersPage":
            $korisnik->usersPage();
        break;
        case "korisnik_kursevi_insert":
            $korisnik->dodaj_kurs_korisniku();
        break;
        case "korisnik_kursevi_update":
            $korisnik->ukloni_kurs_korisniku();
        break;
        case "adminPageKorisnik":
            $admin->adminPageKorisnik();
        break;
        case "adminPageKurs":
            $admin->adminPageKurs();
        break;
        case "korisnici_svi":
            $korisnik->korisnici_svi();
        break;
        case "search_korisnici":
            $korisnik->search_korisnici();
        break;
        case "delete_korisnika":
            $korisnik->delete_korisnici();
        break;
        case "insert_korisnika":
            $korisnik->insert_korisnici();
        break;
        case "dohvati_korisnika":
            $korisnik->dohvati_jednog_korisnika();
        break;
        case "update_korisnika":
            $korisnik->update_korisnici();
        break;
        case "delete_kurs":
            $admin->delete_kurs();
        break;
        case "logs":
            $admin->logs();
        break;
        case "insert_course":
            $admin->insert_course();
        break;
        case "update_course":
            $admin->update_course();
        break;
        case "do_update_course":
            $admin->do_update_course();
        break;
        case "do_update_course_photo":
            $admin->do_update_course_photo();
        break;
        case "paginacija":
            $kursevi->dohvati_broj();
        break;
        case "404":
            $page->page404();
        break;
    }
} else {
    $kursevi->homePage();
}
