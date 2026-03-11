<?php
require_once 'Database.php';

class Investido{
    private $db;

    public function __construct(){
        $this->db = (new Database())->connect();
    }

    public function totalInvestido(){
        $query = "SELECT ativo,
                    SUM(quantidade*valor_unitario) as total_investido
                    FROM compras";
        $stmt = $this->db->prepare($query);
        $stmt -> execute();

        return $stmt->fetchALL(PDO::FETCH_ASSOC);
    }
}
