<?php

require_once 'Database.php';

class Funcionario {
    private $db;

    public function __construct() {
        $this->db = (new Database())->connect();
    }

    public function adicionarFuncionario($nome, $cpf, $cargo, $datanasc) {
        $sql = "INSERT INTO funcionario (nome, cpf, cargo, data_nasc) VALUES (:nome, :cpf, :cargo, :data_nasc)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            'nome' => $nome,
            'cpf' => $cpf,
            'cargo' => $cargo,
            'data_nasc' => $datanasc
        ]);
    }

    public function listarFuncionario() {
        $sql = "SELECT * FROM funcionario";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
