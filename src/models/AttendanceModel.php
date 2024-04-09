<?php

namespace src\Models;

use PDO;

class AttendanceModel
{
    private $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function markAttendance($userId, $courseId, $presence, $late)
    {
        // Code pour enregistrer la présence ou l'absence de l'apprenant dans la base de données
        // Assurez-vous de valider et de sécuriser les données avant de les utiliser dans les requêtes SQL
        // Assurez-vous également que les clés étrangères (userId, courseId) existent dans la base de données

        // Exemple de requête SQL (à adapter selon votre schéma de base de données) :
        $sql = "INSERT INTO suivi (Id_utilisateur, Id_cours, présence, retard) VALUES (:userId, :courseId, :presence, :late)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':userId', $userId);
        $stmt->bindValue(':courseId', $courseId);
        $stmt->bindValue(':presence', $presence, PDO::PARAM_BOOL);
        $stmt->bindValue(':late', $late, PDO::PARAM_BOOL);

        // Exécutez la requête
        return $stmt->execute();
    }
}
