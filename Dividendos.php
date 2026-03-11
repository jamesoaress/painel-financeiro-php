<?php
require_once 'Database.php';

class Dividendos {
    private $db;

    public function __construct(){
        $this->db = (new Database())->connect();
    }

    public function totalDividendo(){
        $query = "SELECT ativo,
                    SUM(quantidade*dividendo) as total_dividendo
                    FROM compras";
        $stmt = $this->db->prepare($query);
        $stmt -> execute();

        return $stmt->fetchALL(PDO::FETCH_ASSOC);
    }

}
