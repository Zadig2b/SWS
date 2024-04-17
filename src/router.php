<?php

use src\Controllers\homeController;
use src\Controllers\UserController;
use src\Controllers\AttendanceController;

// Instancier les contrôleurs
$homeController = new homeController();
$userController = new UserController();
$attendanceController = new AttendanceController();

// Récupérer l'URL demandée
$route = $_SERVER['REDIRECT_URL'];
$route2 = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

// Définir les routes et les actions associées
switch ($route) {
    case '/':
        if (isset($_SESSION['connected'])) {
            $homeController->home();
        } else {
            $homeController->loginView();
        }
        break;


    case '/login':
        if ($method === 'POST') {
            $userController->login();
        } else {
            $homeController->loginView();
        }

        break;

    case '/logout':
        $userController->logout();
        break;

    case '/cregistration':
        if ($method === 'POST') {
            $userController->confirmregistration();
        } else {
            // Afficher le formulaire de connexion
            $userController->confirmView();
        }

        break;

    case '/fetchcourse':
        $homeController->fetchCourse();
        break;

    case "/cregistration/sendPsw":
        if ($method == 'POST') {
            $userController->confirmRegistration();
        } else if ($method == 'GET') {
            $homeController->home();
        }
        break;

    case '/testhome/student/createStudent':
        if ($method == 'POST') {
            $userController->createUserFromInput();
        } else if ($method == 'GET') {
            $homeController->loginView();
        }
        break;
    case '/fetchStudents';
        $userController->fetchStudents2();
        break;
    
    case '/fetchPromos';
        $homeController->fetchPromo();
        break;
    case '/fetchUsersForPromo';
        $userController->getUsersForPromo($promoId);
        break;
    default:
        // Afficher une page 404 si l'URL demandée n'existe pas
        http_response_code(404);
        echo '404 - Page not found';
        break;
}
