<?php

include_once(__DIR__ . "/../dao/GatoDao.php");

class GatoController {

    public function listar() {
        $GatoDao = new GatoDao();

        return $GatoDao->list();
    }

}