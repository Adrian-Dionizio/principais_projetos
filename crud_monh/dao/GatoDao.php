<?php
 include_once(__DIR__."/../util/Connection.php");
 include_once(__DIR__."/../model/gato.php");


class GatoDao{
    private $conn;

    public function __construct() {
        $this->conn = Connection::getConnection();        
    }
    public function list (){
        $sql = "SELECT * FROM gato";   
        $stm = $this->conn->prepare($sql);
        $result = $stm->fetchAll();

        return $this->mapGatos($result);
    }
    public function mapGatos(array $result){
        $gatos = array();
        foreach ($result as $reg) {
           $gato = new gato();
           $gato->setGatoId($reg['id']);
           $gato->setGatoNome($reg['nome']);
           $gato->setGatoTipo($reg['tipo']);
           $gato->setGatoGenero($reg['genero']);
           array_push($gatos,$gato);
        }
        return $gatos;
    }
}