<?php

namespace src\Controllers;

class DashboardController
{
    public function display()
    {
        // Code pour afficher le tableau de bord
        require_once 'views/dashboard.php';
        
    }

    public function listCourses()
    {
        // Code pour récupérer et afficher la liste des cours passés
        require_once 'views/courses.php';
    }

    public function manageAttendance()
    {
        // Code pour gérer les présences des apprenants
        require_once 'views/attendance.php';
    }
}
