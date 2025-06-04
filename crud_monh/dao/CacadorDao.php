<?php
include_once(__DIR__."/../model/Cacador.php");
include_once(__DIR__."/../util/Connection.php");

class CacadorDao{
    private $conn;

    public function __construct() {
        $this->conn = Connection::getConnection();        
    }
    public function insert(Cacador $cacador){
        $sql = "INSERT INTO cacador (nome, arma, genero, gato_id,elementosArmas_id)
                VALUES (?, ?, ?, ? ,?)";

        $stm = $this->conn->prepare($sql);
        $stm->execute( array( $cacador->getNome(), 
                              $cacador->getArma(), 
                              $cacador->getGenero(), 
                              $cacador->getGato()->getGatoId(),
                              $cacador->getElementosArmas()->getElementosArmasId() ) );
    }
    public function delete($id) {
        $sql = "DELETE FROM cacador WHERE id = ?";

        $stm = $this->conn->prepare($sql);
        $stm->execute(array($id));
    }
    public function update(Cacador $cacador) {
        $conn = Connection::getConnection();
    
        $sql = "UPDATE cacador SET nome = ?, arma = ?, 
        genero = ?, gato_id = ?, 
        elementosArmas_id = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        
        $stmt->execute([
            $cacador->getNome(), 
            $cacador->getArma(), 
            $cacador->getGenero(), 
            $cacador->getGato()->getGatoId(),
            $cacador->getElementosArmas()->getElementosArmasId(),
            $cacador->getId()
        ]);
    }
    
    public function list() {
        $sql = "SELECT 
                c.id AS cacador_id,
                c.nome AS cacador_nome, 
                c.arma AS cacador_arma, 
                c.genero AS cacador_genero,
                g.id AS gato_id, 
                g.nome AS gato_nome, 
                g.tipo AS gato_tipo, 
                g.genero AS gato_genero,
                e.id AS elemento_arma_id, 
                e.tipo AS elemento_arma_tipo
            FROM 
                cacador c
            LEFT JOIN 
                gato g ON c.gato_id = g.id
            LEFT JOIN 
                elementosArmas e ON c.elementosArmas_id = e.id ";

        $stm = $this->conn->prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll();

        $cacadores = $this->mapCacador($result);
        return $cacadores;
    }
    public function findById(int $id) {
        $conn = Connection::getConnection();
        $sql = "SELECT 
        c.id AS cacador_id,
        c.nome AS cacador_nome, 
        c.arma AS cacador_arma, 
        c.genero AS cacador_genero,
        g.id AS gato_id, 
        g.nome AS gato_nome, 
        g.tipo AS gato_tipo, 
        g.genero AS gato_genero,
        e.id AS elemento_arma_id, 
        e.tipo AS elemento_arma_tipo
    FROM 
        cacador c
    LEFT JOIN 
        gato g ON c.gato_id = g.id
    LEFT JOIN 
        elementosArmas e ON c.elementosArmas_id = e.id
    WHERE 
        c.id = ?;";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetchAll();

        //Criar o objeto Aluno
        $cacador = $this->mapCacador($result);

        if(count($cacador) == 1)
            return $cacador[0];
        elseif(count($cacador) == 0)
            return null;

        die("AlunoDAO.findById - Erro: mais de um caçador".
                " encontrado para o ID " . $id);
    }
    private function mapCacador(array $result) {
        $cacadores = [];
        foreach ($result as $reg) {
            $cacador = new Cacador();
            $cacador->setId((int) $reg['cacador_id']);
            $cacador->setNome($reg['cacador_nome']);
            $cacador->setArma($reg['cacador_arma']);
            $cacador->setGenero($reg['cacador_genero']);
    
            // Mapear objetos relacionados (Gato e ElementosArmas)
            if (!empty($reg['gato_id'])) {
                $gato = new Gato();
                $gato->setGatoId((int) $reg['gato_id']);
                $gato->setGatoNome($reg['gato_nome']);
                $gato->setGatoTipo($reg['gato_tipo']);
                $gato->setGatoGenero($reg['gato_genero']);
                $cacador->setGato($gato);
            }
    
            if (!empty($reg['elemento_arma_id'])) {
                $elementosArma = new ElementoArma();
                $elementosArma->setElementosArmasId((int) $reg['elemento_arma_id']);
                $elementosArma->setElementosArmasTipo($reg['elemento_arma_tipo']);
                $cacador->setElementosArmas($elementosArma);
            }
    
            $cacadores[] = $cacador;
        }
        return $cacadores;
    }
    private function mapCacadorJson(array $result) {
        $cacadores = [];
        foreach ($result as $reg) {
            $cacador = [
                "id"      => (int) $reg['cacador_id'],
                "nome"    => $reg['cacador_nome'],
                "arma"    => $reg['cacador_arma'],
                "genero"  => $reg['cacador_genero'],
                "gato"    => null,
                "elemento_arma" => null
            ];

            if (!empty($reg['gato_id'])) {
                $cacador["gato"] = [
                    "id"      => (int) $reg['gato_id'],
                    "nome"    => $reg['gato_nome'],
                    "tipo"    => $reg['gato_tipo'],
                    "genero"  => $reg['gato_genero']
                ];
            }

            if (!empty($reg['elemento_arma_id'])) {
                $cacador["elemento_arma"] = [
                    "id"   => (int) $reg['elemento_arma_id'],
                    "tipo" => $reg['elemento_arma_tipo']
                ];
            }

            $cacadores[] = $cacador;
        }
        return json_encode($cacadores, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }
}