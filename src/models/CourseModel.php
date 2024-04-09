<?php

namespace App\Models;

use PDO;

class CourseModel
{
    private $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getAllCourses()
    {
        // Code pour récupérer tous les cours de la base de données
    }

    public function getCourseById($id)
    {
        // Code pour récupérer un cours par son identifiant
    }

    public function addCourse($data)
    {
        // Code pour ajouter un nouveau cours
    }

    public function updateCourse($id, $data)
    {
        // Code pour mettre à jour les informations d'un cours
    }

    public function deleteCourse($id)
    {
        // Code pour supprimer un cours
    }
}
