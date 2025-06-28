<?php
require_once "../dao/Conexao.php";

if (isset($_GET['excluir'])) {
    $x = new FWK();
    $x->excluir($_GET['excluir'], $_GET['tabela']);
}

class FWK
{
    private $conn;

    public function conexao()
    {
        $this->conn = Conexao::conectar();

        if (!$this->conn) {
            die("Erro ao conectar ao banco de dados.");
        }
    }

    function selecionarBanco()
    {
        $sql = "SELECT DATABASE()";
        $query = $this->conn->query($sql);
        $banco = $query->fetch();
        return $banco[0];
    }

    function selecionarTabela($t)
    {
        $banco = "Tables_in_" . $this->selecionarBanco();
        $t1 = strtoupper($t);
        $sql = "SHOW TABLES";
        $query = $this->conn->query($sql);
        $tabelas = $query->fetchAll(PDO::FETCH_OBJ);

        foreach ($tabelas as $tabela) {
            $t2 = strtoupper($tabela->$banco);
            if (strcmp($t1, $t2) == 0) {
                return $tabela->$banco;
            }
        }
    }

    function selecionarColunas($tabela)
    {
        $sql = "SHOW COLUMNS FROM " . $tabela;
        $query = $this->conn->query($sql);
        $colunas = $query->fetchAll(PDO::FETCH_OBJ);
        $txt = "";

        foreach ($colunas as $coluna) {
            $txt .= $coluna->Field . ",";
        }

        $txt = substr($txt, 0, -1);
        return $txt;
    }

    function salvar($obj)
    {
        $this->conexao();
        $tabela = $this->selecionarTabela(get_class($obj));
        $colunas = $this->selecionarColunas($tabela);
        $nome = $obj->getNome();
        $idade = $obj->getIdade();

        $sql = "INSERT INTO " . $tabela . " (" . $colunas . ") VALUES (NULL, '$nome', '$idade')";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    }

    function excluir($id, $tabela)
    {
        $this->conexao();
        $sql = "DELETE FROM " . $tabela . " WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    function lista($tabela)
    {
        $this->conexao();
        $sql = "SELECT * FROM " . $tabela;
        $query = $this->conn->query($sql);
        $dados = $query->fetchAll(PDO::FETCH_OBJ);

        echo "<table class='table table-bordered'>";
        echo "<thead><tr><th>ID</th><th>Nome</th><th>Idade</th><th>Matutenção</th><th>Deletar Pessoa</th></tr></thead>";
        echo "<tbody>";

        if ($dados) {
            foreach ($dados as $dado) {
                echo "<tr>";
                echo "<td>" . $dado->id . "</td>";
                echo "<td>" . $dado->nome . "</td>";
                echo "<td>" . $dado->idade . "</td>";
                echo "<td>Vazio</td>";
                echo "<td><a href='../fwkSis/FWK.php?excluir=$dado->id&tabela=" . $tabela . "' class='btn btn-danger'>Excluir</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>Nenhum registro encontrado</td></tr>";
        }

        echo "</tbody></table>";
    }
}
