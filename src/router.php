<?php

use src\Controllers\homeController;
use src\Controllers\DashboardController;
use src\Controllers\UserController;
use src\Controllers\AttendanceController;

// Instancier les contrôleurs
$homeController = new homeController();
$dashboardController = new DashboardController();
$userController = new UserController();
$attendanceController = new AttendanceController();

// Récupérer l'URL demandée
$route = $_SERVER['REDIRECT_URL'];
$method = $_SERVER['REQUEST_METHOD'];

// Définir les routes et les actions associées
switch ($route) {
    case '/':
        if (isset($_SESSION['connected'])) {
            $dashboardController->display();
        } else {
     // Vous pouvez rediriger vers une page de connexion ici si l'utilisateur n'est pas connecté
     $homeController->index();

        }
        break;

    case '/login':
        if (isset($_SESSION['connected'])) {
            header('Location: /dashboard');
            exit;
        } else {
            if ($method === 'POST') {
                $userController->login();
            } else {
                // Afficher le formulaire de connexion
                $homeController->index();
            }
        }
        break;

    case '/logout':
        $userController->logout();
        break;

    case '/cregistration':
        if (isset($_SESSION['connected'])) {
            header('Location: /dashboard');
            exit;
        } else {
            if ($method === 'POST') {
                $userController->confirmregistration();
            } else {
                // Afficher le formulaire de connexion
                $homeController->confirmView();
            }
        }
        break;

    case '/addUser':
        // Vérifier les autorisations ici (par exemple, si l'utilisateur est un formateur)
        if ($_SESSION['role'] === 'formateur') {
            if ($method === 'POST') {
                $userController->createUserFromInput();
            } else {
                // Afficher le formulaire d'ajout d'utilisateur
            }
        } else {
            // Rediriger ou afficher un message d'erreur pour les autorisations insuffisantes
        }
        break;

    case '/markAttendance':
        // Vérifier les autorisations ici (par exemple, si l'utilisateur est un formateur)
        if ($_SESSION['role'] === 'formateur') {
            if ($method === 'POST') {
                $attendanceController->markAttendance();
            } else {
                // Afficher le formulaire de marquage de présence
            }
        } else {
            // Rediriger ou afficher un message d'erreur pour les autorisations insuffisantes
        }
        break;

        case '/testhome':
            if (isset($_SESSION['connected'])) {
                header('Location: /dashboard');
                exit;
            } else {
                if ($method === 'POST') {
                    $userController->login();
                } else {
                    $homeController->home();
                }
            }
            break;
        case '/testhome/fetchcourse':
            $homeController->fetchCourse();
            break;

            case "/cregistration/sendPsw":
        if ($method == 'POST') {
            $userController->confirmRegistration();
        } else if ($method == 'GET') {
            $homeController->index();
        }
        break;

    default:
        // Afficher une page 404 si l'URL demandée n'existe pas
        http_response_code(404);
        echo '404 - Page not found';
        break;
}
