<?php

require_once("class/Database.php");
require_once("template/header.php");
require_once("class/Form.php");

class Main
{
    private $konfig = [];
    public function __construct($namaModul)
    {
        $this->konfig = $namaModul;
    }
    public function x($namaUrl)
    {
        if (array_key_exists($namaUrl, $this->konfig)) {
            require($this->konfig[$namaUrl]);
        } else {
            require($this->konfig["home"]);
        }
    }
}

$url = [
    "home" => "modul/home.php",
    "add" => "modul/Artikel/add.php",
    "update" => "modul/Artikel/update.php",
    "delete" => "modul/Artikel/delete.php"
];
$main = new Main($url);
$main->x(@$_REQUEST["mod"]);
require_once("template/footer.php");
