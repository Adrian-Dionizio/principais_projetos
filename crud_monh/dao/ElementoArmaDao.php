<?php
 include_once(__DIR__."/../util/Connection.php");
 include_once(__DIR__."/../model/elementoArma.php");

 class ElementoArmaDao{
    private $conn;

    public function __construct() {
        $this->conn = Connection::getConnection();        
    }
    public function list (){
        $sql = "SELECT * FROM elementosArmas";   
        $stm = $this->conn->prepare($sql);
        $result = $stm->fetchAll();

        return $this->mapElementosArmas($result);
    }
    public function mapElementosArmas(array $result){
        $elementosArmas = array();
        foreach($result as $reg){
            $elementosArma = new elementoArma();
            $elementosArma ->setElementosArmasId($reg["id"]);
            $elementosArma ->setElementosArmasTipo($reg['tipo']);
            array_push($$elementosArmas,$elementosArma);
        }
        return $elementosArmas;
    }
 }