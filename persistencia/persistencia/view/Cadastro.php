<?php
include "../fwkSis/FWK.php";
include "../model/Pessoas.php";
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

$fwk=new FWK();

    $a = new Pessoas();
    $a->setNome("João");
    $a->setIdade(30);

    $fwk->salvar($a);


