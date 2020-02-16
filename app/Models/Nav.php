<?php
namespace app\Models;
use app\Config\DB;

class Nav {
    private $db;

    public function __construct(DB $db) {
        $this->db = $db;
    }

    public function getMenu() {
        return $this->db->executeQuery("SELECT * FROM meni");
    }
}