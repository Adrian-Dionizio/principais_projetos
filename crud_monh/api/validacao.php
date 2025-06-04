<?php
include_once(__DIR__ . "/../model/Cacador.php");

class CacadorService {

    public function validarDados(Cacador $cacador) {

        $erros = array();

        if(! $cacador->getNome())
            array_push($erros, "Informe o nome!");

        if(! $cacador->getArma())
            array_push($erros, "Informe a Arma!");

        if(! $cacador->getGenero())
            array_push($erros, "Informe se o genero!");

        if(! $cacador->getGato())
            array_push($erros, "Informe o gato!");

        if(! $cacador->getElementosArmas())
            array_push($erros, "Informe o Elemento da Arma!");


        return $erros;
    }
}