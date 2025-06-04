<?php

include_once(__DIR__ . "/../../model/Cacador.php");
include_once(__DIR__ . "/../../model/Gato.php");
include_once(__DIR__ . "/../../model/ElementoArma.php");

include_once(__DIR__ . "/../../controller/CacadorController.php");

$msgErro = "";
$cacadores = null;
$CacadorCont = new CacadorController();
if(isset($_POST['nome'])) {
    //Capturando os dados do formulário
    $nome = trim($_POST['nome']) ? trim($_POST['nome']) : null;
    $arma = trim($_POST['armas']) ? trim($_POST['armas']) : null;
    $genero = trim($_POST['genero']) ? trim($_POST['genero']) : null;

    $gato = $_POST['gato'];
    $eleA = $_POST['elementoArma'];
    $cacador_id=['id'];

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
    $cacador_id = isset($_GET['id']) ? $_GET['id'] : 0;
    $cacadores->setId($cacador_id);
    print_r($cacadores);

    //Alterar
    $erros = $CacadorCont->alterar($cacadores);

    if(count($erros) <= 0) {
        //Redirecionando para a listagem
        header("location: listar.php");
    } else {
        $msgErro = implode("<br>", $erros);
        //echo $msgErro;
    }
} else {
    //Rotina para carregar os dados do aluno
    $idCacador = 0;
    if(isset($_GET['id']))
        $idCacador = $_GET['id'];

    if($idCacador) {
        //Carregar os dados e exibir o forumulário
        $cacadores = $CacadorCont->buscarPorId($idCacador);

    } else {
        echo "ID do usuário é inválido!<br>";
        echo "<a href='listar.php'>Voltar</a>";
        exit;
    }
}


include("form.php");