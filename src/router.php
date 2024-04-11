<?php

use src\Controllers\AuthController;
use src\Controllers\DashboardController;
use src\Controllers\UserController;
use src\Controllers\AttendanceController;

// Instancier les contrôleurs
$authController = new AuthController();
$dashboardController = new DashboardController();
$userController = new UserController();
$attendanceController = new AttendanceController();

// Récupérer l'URL demandée
$route = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

// Définir les routes et les actions associées
switch ($route) {
    case '/':
        if (isset($_SESSION['connected'])) {
            $dashboardController->display();
        } else {
     // Vous pouvez rediriger vers une page de connexion ici si l'utilisateur n'est pas connecté
     $authController->index();

        }
        break;

    case '/login':
        if (isset($_SESSION['connected'])) {
            header('Location: /dashboard');
            exit;
        } else {
            if ($method === 'POST') {
                $authController->login();
            } else {
                // Afficher le formulaire de connexion
                $authController->index();
            }
        }
        break;

    case '/logout':
        $authController->logout();
        break;

    case '/registration':
        if (isset($_SESSION['connected'])) {
            header('Location: /dashboard');
            exit;
        } else {
            if ($method === 'POST') {
                $authController->register();
            } else {
                // Afficher le formulaire de connexion
                $authController->registration();
            }
        }
        break;

    case '/cregistration':
        if (isset($_SESSION['connected'])) {
            header('Location: /dashboard');
            exit;
        } else {
            if ($method === 'POST') {
                $authController->confirmregistration();
            } else {
                // Afficher le formulaire de connexion
                $authController->confirmView();
            }
        }
        break;

    case '/addUser':
        // Vérifier les autorisations ici (par exemple, si l'utilisateur est un formateur)
        if ($_SESSION['role'] === 'formateur') {
            if ($method === 'POST') {
                $userController->add();
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
                    $authController->login();
                } else {
                    $authController->home();
                }
            }
            break;
    // Ajouter d'autres routes selon vos besoins
    case "/simplon":
        if ($method == 'GET') {
            $authController->home();
        } else if ($method == 'POST') {
            $authController->createUserFromInput();
        }
        break;

    default:
        // Afficher une page 404 si l'URL demandée n'existe pas
        http_response_code(404);
        echo '404 - Page not found';
        break;
}
