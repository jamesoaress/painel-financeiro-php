<?php

require_once 'Database.php';

class Funcionario
{
    private $db;

    public function __construct()
    {
        $this->db = (new Database())->connect();
    }

    public function adicionarFuncionario($nome, $cpf, $cargo, $datanasc)
    {
        $sql = "INSERT INTO funcionario (nome, cpf, cargo, data_nasc) VALUES (:nome, :cpf, :cargo, :data_nasc)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            'nome' => $nome,
            'cpf' => $cpf,
            'cargo' => $cargo,
            'data_nasc' => $datanasc
        ]);
    }

    public function relatorioFuncionario(){
        $sql = 'SELECT id, nome, cpf, cargo, data_nasc FROM funcionario  GROUP BY id';
        $stmt = $this->db->query($sql);
        $funcionarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($funcionarios as $funcionario) {
            $funcionario['id'];
            $funcionario['nome'];
            $funcionario['cpf'];
            $funcionario['data_nasc'];

        }
        return $funcionarios;
    }


    public function listarFuncionario()
    {
        $sql = "SELECT * FROM funcionario";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function excluirFuncionario($id) {
        try {
            $sql = "DELETE FROM funcionario WHERE id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            
            return true;
            
        } catch (PDOException $e) {
            // Exibe o erro caso algo dê errado na comunicação com o banco
            echo "Erro ao tentar excluir o funcionário: " . $e->getMessage();
            return false;
        }
    }
}
?>