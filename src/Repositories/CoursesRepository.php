<?php

namespace src\Repositories;

use PDO;
use PDOException;
use src\models\Database;

class CoursesRepository
{
    private $db;

    public function __construct()
    {
        $database = new Database;
        $this->db = $database->getDB();
    }

    public function getCourses()
    {
        try {
            // Prepare the SQL query
            $query = "SELECT * FROM cours";

            // Execute the query
            $statement = $this->db->query($query);

            // Fetch all courses from the result set
            $courses = $statement->fetchAll(PDO::FETCH_ASSOC);

            // Return the courses
            return $courses;
        } catch (PDOException $e) {
            // Handle any errors that occur during the query
            echo "Error: " . $e->getMessage();
            return []; // Return an empty array if an error occurs
        }
    }

    public function getPromos()
    {
        try {
            // Prepare the SQL query
            $query = "SELECT * FROM promo";

            // Execute the query
            $statement = $this->db->query($query);

            // Fetch all promos from the result set
            $promos = $statement->fetchAll(PDO::FETCH_ASSOC);

            // Return the promos
            return $promos;
        } catch (PDOException $e) {
            // Handle any errors that occur during the query
            echo "Error: " . $e->getMessage();
            return []; // Return an empty array if an error occurs
        }
    }
}
