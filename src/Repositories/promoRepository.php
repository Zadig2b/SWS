<?php

namespace src\Repositories;

use PDO;
use PDOException;
use src\models\Database;

class PromoRepository
{
    private $db;

    public function __construct()
    {
        $database = new Database;
        $this->db = $database->getDB();
    }

    

    public function getPromos()
    {
        try {
            $query = "SELECT * FROM promo";

            $statement = $this->db->query($query);

            $promos = $statement->fetchAll(PDO::FETCH_ASSOC);

            return $promos;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return []; 
        }
    }

    public function getPromoById($promoId) {
        $query = "SELECT * FROM promo WHERE Id_promo = ?";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$promoId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
}
