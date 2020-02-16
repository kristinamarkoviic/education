<?php
namespace app\Controllers;
use app\Config\DB;
use app\Models\Kurs;
use app\Models\Korisnik;

class AdminController extends PageController {
    //pravljenje konstruktora, ujedno nasledjivanje roditeljskog
    public function __construct() {
        parent::__construct();
    }
    
    //funkcija ucitavanje logs strane
    public function logs() {
        //tu sad idu fje za log
        $korisnik = new Korisnik(DB::instance());
        $korisnik_log = $korisnik->dohvati_sve_aktivne();
        $korisnik_log_page = $korisnik->dohvati_logs();
        $this->data['active_korisnici'] = $korisnik_log;
        $this->data['log_korisnici'] = $korisnik_log_page;
        $this->loadView("logs", $this->data);
        $this->upisi_log();
    }
    //funkcija brisanja kursa
    public function delete_kurs() {
        if(isset($_GET['id'])) {
            try {
                $idKurs = $_GET['id'];
                var_dump($idKurs);
                $kursevi = new Kurs(DB::instance());
                $kurs_delete = $kursevi->delete($idKurs);
                // $this->json(null, 204);
                $this->redirect("index.php?page=home");
            }
            catch(\PDOException $ex) {
                $this->json($ex->getMessage(), 500);
            }
        }
        else {
            $this->json(null, 403);
        }
    }
    //funkcija za prikaz ADMIN PANELA
    public function adminPageKorisnik() {
        try {
            $korisnik = new Korisnik(DB::instance());
            $svi_korisnici  = $korisnik->getUsers();
            $this->data['korisnici'] = $svi_korisnici;
            $this->loadView("adminPageKorisnik", $this->data);
            $this->upisi_log();
        }
        catch(\PDOException $ex) {
            $this->json($ex->getMessage(), 500);
        }
        
    }
    //funkcija za prikaz ADMIN PANELA
    public function adminPageKurs() {
        try {
            $teachers = new Kurs(DB::instance());
            $svi_teachers = $teachers->dohvati_teachers();
            $this->data['teachers'] = $svi_teachers;
            $this->loadView("adminPageKurs", $this->data);
            $this->upisi_log();
        }
        catch(\PDOException $ex) {
            $this->json($ex->getMessage(), 500);
        }
        
    }
    public function insert_course() {
        if (isset($_POST['btnCourseInsert'])) {
            $title_insert = $_POST['title_insert'];
            $description_insert = $_POST['description_insert'];
            $youtube_insert = $_POST['youtube_insert'];
            $time_insert = $_POST['time_insert'];
            $category_insert = $_POST['category_insert'];
            $teachers_insert = $_POST['teachers_insert'];



            $fajl_naziv = $_FILES['photo_insert']['name'];
            $fajl_tmpLokacija = $_FILES['photo_insert']['tmp_name'];
            $fajl_tip = $_FILES['photo_insert']['type'];
            $fajl_velicina = $_FILES['photo_insert']['size'];

            $errors = [];

            $dozvoljeni_tipovi = ['image/jpg', 'image/jpeg', 'image/png'];

            if(!in_array($fajl_tip, $dozvoljeni_tipovi)){
                array_push($errors, "Pogresan tip fajla. - Profil slika");
                $this->redirect("index.php?page=home");
            }
            if($fajl_velicina > 3000000){
                array_push($errors, "Maksimalna velicina fajla je 3MB. - Profil slika");
                $this->redirect("index.php?page=home");

            }
            if(strlen($title_insert) == 0){
                array_push($errors, "Error");
                $this->redirect("index.php?page=home");
            }
            if(strlen($description_insert) == 0){
                array_push($errors, "Error");
                $this->redirect("index.php?page=home");
            }
            if(strlen($youtube_insert) == 0){
                array_push($errors, "Error");
                $this->redirect("index.php?page=home");
            }
            if(strlen($time_insert) == 0){
                array_push($errors, "Error");
                $this->redirect("index.php?page=home");
            }
            if($category_insert == 0) {
                array_push($errors, "Error");
                $this->redirect("index.php?page=home");
            }
            if($teachers_insert == 0) {
                array_push($errors, "Error");
                $this->redirect("index.php?page=home");
            }

            list($sirina, $visina) = getimagesize($fajl_tmpLokacija);


            $postojecaSlika = null;
            switch($fajl_tip){
                case 'image/jpeg':
                    $postojecaSlika = imagecreatefromjpeg($fajl_tmpLokacija);
                    break;
                case 'image/png':
                    $postojecaSlika = imagecreatefrompng($fajl_tmpLokacija);
                    break;
            }

            $course_visina = 360;
            $course_sirina = 203;

            $course_photo = imagecreatetruecolor($course_visina, $course_sirina);

            imagecopyresampled($course_photo, $postojecaSlika, 0, 0, 0, 0, $course_visina, $course_sirina, $sirina, $visina);
            $naziv = time().$fajl_naziv;
//            $putan_course_photo = 'public/img/courses_img/course_photo'.$naziv;
            $putanja_course_photo = $naziv;

            switch($fajl_tip){
                case 'image/jpeg':
                    imagejpeg($course_photo, $putanja_course_photo, 75);
                    break;
                case 'image/png':
                    imagepng($course_photo, $putanja_course_photo);
                    break;
            }

            $putanjaOriginalnaSlika = 'public/img/courses_img/'.$naziv;

            if(move_uploaded_file($fajl_tmpLokacija, $putanjaOriginalnaSlika)){

                $current_time = date("Y-m-d H-i-s", time());
                try {
                    $modelAdmin = new Kurs(DB::instance());
                    $modelAdmin->insert_course($title_insert, $description_insert, $youtube_insert, $putanja_course_photo, $time_insert, $current_time, $category_insert, $teachers_insert);
                    
                    $this->redirect("index.php?page=home");

                } catch (\PDOException $ex){
                    $this->json($ex->getMessage(), 500);
                    $this->redirect("index.php?page=home");
                }
            }


        } else {
            $this->json(null, 403);
        }
    }

    public function update_course() {
        try {

            $kurs = new Kurs(DB::instance());
            $jedan_kurs = $kurs->dohvati_jedan_kurs_sa_levelima($_GET['idCourse']);
            $this->data['singleKurs'] = $jedan_kurs;
            $teachers = new Kurs(DB::instance());
            $svi_teachers = $teachers->dohvati_teachers();
            $this->data['teachers'] = $svi_teachers;

            $this->loadView("update_course", $this->data);
            $this->upisi_log();
        }
        catch (\PDOException $ex) {
            $this->json($ex->getMessage(), 500);
        }
    }

    public function do_update_course() {
        if (isset($_POST['btnCourseInsert'])) {
            $title_insert = $_POST['title_insert'];
            $description_insert = $_POST['description_insert'];
            $youtube_insert = $_POST['youtube_insert'];
            $time_insert = $_POST['time_insert'];
            $category_insert = $_POST['category_insert'];
            $teachers_insert = $_POST['teachers_insert'];
            $idCourse = $_POST['idCourse'];

            $errors = [];


            if(strlen($title_insert) == 0){
                array_push($errors, "Error");
                $this->redirect("index.php?page=home");
            }
            if(strlen($description_insert) == 0){
                array_push($errors, "Error");
                $this->redirect("index.php?page=home");
            }
            if(strlen($youtube_insert) == 0){
                array_push($errors, "Error");
                $this->redirect("index.php?page=home");
            }
            if(strlen($time_insert) == 0){
                array_push($errors, "Error");
                $this->redirect("index.php?page=home");
            }
            if($category_insert == 0) {
                array_push($errors, "Error");
                $this->redirect("index.php?page=home");
            }
            if($teachers_insert == 0) {
                array_push($errors, "Error");
                $this->redirect("index.php?page=home");
            }

                try {
                    $modelAdmin = new Kurs(DB::instance());
                    $modelAdmin->do_update_course($title_insert, $description_insert, $youtube_insert, $time_insert, $category_insert, $teachers_insert, $idCourse);

                    http_response_code(204);
                    $this->redirect("index.php?page=home");

                } catch (\PDOException $ex){
                    $this->json($ex->getMessage(), 500);
//                    $this->redirect("index.php?page=home");
                }



        } else {
            $this->json(null, 403);
        }
    }

    public function do_update_course_photo() {
        if (isset($_POST['btnCourseInsert'])) {
            $idCourse = $_POST['idCourse'];

            $fajl_naziv = $_FILES['photo_insert']['name'];
            $fajl_tmpLokacija = $_FILES['photo_insert']['tmp_name'];
            $fajl_tip = $_FILES['photo_insert']['type'];
            $fajl_velicina = $_FILES['photo_insert']['size'];

            $errors = [];

            $dozvoljeni_tipovi = ['image/jpg', 'image/jpeg', 'image/png'];

            if(!in_array($fajl_tip, $dozvoljeni_tipovi)){
                array_push($errors, "Pogresan tip fajla. - Profil slika");
                $this->redirect("index.php?page=home");
            }
            if($fajl_velicina > 3000000){
                array_push($errors, "Maksimalna velicina fajla je 3MB. - Profil slika");
                $this->redirect("index.php?page=home");

            }
            list($sirina, $visina) = getimagesize($fajl_tmpLokacija);


            $postojecaSlika = null;
            switch($fajl_tip){
                case 'image/jpeg':
                    $postojecaSlika = imagecreatefromjpeg($fajl_tmpLokacija);
                    break;
                case 'image/png':
                    $postojecaSlika = imagecreatefrompng($fajl_tmpLokacija);
                    break;
            }

            $course_visina = 360;
            $course_sirina = 203;

            $course_photo = imagecreatetruecolor($course_visina, $course_sirina);

            imagecopyresampled($course_photo, $postojecaSlika, 0, 0, 0, 0, $course_visina, $course_sirina, $sirina, $visina);
            $naziv = time().$fajl_naziv;
//            $putan_course_photo = 'public/img/courses_img/course_photo'.$naziv;
            $putan_course_photo = $naziv;

            switch($fajl_tip){
                case 'image/jpeg':
                    imagejpeg($course_photo, $putan_course_photo, 75);
                    break;
                case 'image/png':
                    imagepng($course_photo, $putan_course_photo);
                    break;
            }

            $putanjaOriginalnaSlika = 'public/img/courses_img/'.$naziv;

            if(move_uploaded_file($fajl_tmpLokacija, $putanjaOriginalnaSlika)){

                try {
                    $modelAdmin = new Kurs(DB::instance());
                    $modelAdmin->do_update_course_photo($putan_course_photo, $idCourse);

                    http_response_code(204);
                    $this->redirect("index.php?page=home");

                } catch (\PDOException $ex){
                    $this->json($ex->getMessage(), 500);
                    $this->redirect("index.php?page=home");
                }
            }


        } else {
            $this->json(null, 403);
        }
    }

}
