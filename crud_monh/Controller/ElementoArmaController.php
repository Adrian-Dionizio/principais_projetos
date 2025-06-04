<?php

include_once(__DIR__ . "/../dao/ElementoArmaDao.php");

class ElementoArmaController {

    public function listar() {
        $ElementoArmaDao = new ElementoArmaDao();

        return $ElementoArmaDao->list();
    }

}