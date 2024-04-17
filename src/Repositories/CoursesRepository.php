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

    public function getCoursesToday()
    {
        try {
            // Get the current date
            $currentDate = date('Y-m-d');
    
            // Prepare the SQL query with the WHERE condition for today's date and join with promo table
            $query = "SELECT cours.*, promo.nom AS promo_nom FROM cours
                      INNER JOIN promo ON cours.Id_promo = promo.Id_promo
                      WHERE DATE(cours.date_début) = :currentDate";
    
            // Prepare the statement
            $statement = $this->db->prepare($query);
    
            // Bind the parameter
            $statement->bindParam(':currentDate', $currentDate, PDO::PARAM_STR);
    
            // Execute the query
            $statement->execute();
    
            // Fetch all courses from the result set
            $courses = $statement->fetchAll(PDO::FETCH_ASSOC);
    
            return $courses;
        } catch (PDOException $e) {
            // Handle any errors
            error_log('Error fetching courses for today: ' . $e->getMessage());
            return []; // Return an empty array on failure
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
