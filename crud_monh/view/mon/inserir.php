<?php

include_once(__DIR__ . "/../../model/Cacador.php");
include_once(__DIR__ . "/../../model/Gato.php");
include_once(__DIR__ . "/../../model/ElementoArma.php");

include_once(__DIR__ . "/../../controller/CacadorController.php");

$msgErro = "";
$cacadores = null;

if(isset($_POST['nome'])) {
    //Capturando os dados do formulário
    $nome = trim($_POST['nome']) ? trim($_POST['nome']) : null;
    $arma = trim($_POST['armas']) ? trim($_POST['armas']) : null;
    $genero = trim($_POST['genero']) ? trim($_POST['genero']) : null;

    $gato = $_POST['gato'];
    $eleA = $_POST['elementoArma'];

    //Criando o objeto aluno para inserir
    $cacadores = new Cacador();
    $cacadores->setId(0);
    $cacadores->setNome($nome);
    $cacadores->setArma($arma);
    $cacadores->setGenero($genero);

    if($gato) {
        $GatoObj = new Gato();
        $GatoObj->setGatoId($gato);
        $cacadores->setGato($GatoObj);
    } else
    $cacadores->setGato(null);

    if($eleA) {
        $eleAObj = new ElementoArma();
        $eleAObj->setElementosArmasId($eleA);
        $cacadores->setElementosArmas($eleAObj);
    } else
    $cacadores->setElementosArmas(null);

    //print_r($cacadores);

    //Chamando a rotina do controller para inserir o aluno/*
    $CacadorCont = new CacadorController();
    $erros = $CacadorCont->inserir($cacadores);
    $msgErro = implode("<br>", $erros);
    /*if(count($erros) <= 0) {
        //Redirecionando para a listagem
        header("location: listar.php");
    } else {
        $msgErro = implode("<br>", $erros);
        //echo $msgErro;
    }
        */

} 


include("form.php");