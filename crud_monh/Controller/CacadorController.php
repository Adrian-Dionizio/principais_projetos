
    <?php
include_once(__DIR__ . "/../dao/CacadorDao.php");
include_once(__DIR__ . "/../service/cacadorService.php");

class CacadorController {
    public function listar() {
        $cacadorDao = new CacadorDao();
        return $cacadorDao->list();
    }

    public function inserir(Cacador $cacador) {
        $cacadorService = new CacadorService();
        $erros = $cacadorService->validarDados($cacador);
        if (!empty($erros)) {
            return $erros; // Retorna erros
        }
        $cacadorDao = new CacadorDao();
        $cacadorDao->insert($cacador);
        return [];
    }
    public function buscarPorId($id) {
        $CacadorDao = new CacadorDao();

        $cacadores = $CacadorDao->findById($id);
        return $cacadores;
    }

    public function alterar(Cacador $cacador) {
        $cacadorService = new CacadorService();
        $erros = $cacadorService->validarDados($cacador);
        if (!empty($erros)) {
            return $erros;
        }
        $cacadorDao = new CacadorDao();
        $cacadorDao->update($cacador);
        return [];
    }

    public function excluir($id) {
        $cacadorDao = new CacadorDao();
        $cacadorDao->delete($id);
    }
    public function listarJson() {
        // Instancia o DAO e obtém os caçadores em JSON
        $dao = new CacadorDao();
        header("Content-Type: application/json");
         return $dao->list(); // Supondo que o método list() retorne o JSON
    }
}


