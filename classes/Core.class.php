<?php

abstract class Core{

    public static $db;

    public function get_body() {

        if($_POST) {
            $this->obr();
        }
        $this->get_header();

    abstract function get_content();

}


