<?php

namespace src\Controllers;

use src\Models\AttendanceModel;

use src\models\Database;

class AttendanceController
{
    public function validatePresence()
    {
        // Code pour valider la présence d'un apprenant
    }

    public function markLate()
    {
        // Code pour marquer un apprenant en retard
    }

    public function sendLateNotification()
    {
        // Code pour envoyer une notification en cas de retard récurrent
    }

    public function markAttendance()
    {
        $db = new Database();
        $pdo = $db->getDB();
        // Vérifiez si l'utilisateur est connecté et s'il a les autorisations nécessaires
        if (!isset($_SESSION['connected']) || $_SESSION['role'] !== 'formateur') {
            // Rediriger l'utilisateur vers une page d'erreur ou de connexion
            // Vous pouvez également afficher un message d'erreur ici
            return;
        }

        // Vérifiez si le formulaire a été soumis
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            // Rediriger l'utilisateur ou afficher un message d'erreur
            return;
        }

        // Récupérez les données du formulaire
        $userId = $_POST['user_id']; // ID de l'apprenant
        $courseId = $_POST['course_id']; // ID du cours
        $presence = isset($_POST['presence']) ? true : false; // Marqueur de présence (true si coché, sinon false)
        $late = isset($_POST['late']) ? true : false; // Marqueur de retard (true si coché, sinon false)

        // Validation des données (à compléter selon vos besoins)

        // Instanciez le modèle de présence
        $attendanceModel = new AttendanceModel($pdo);

        // Appelez la méthode pour marquer la présence
        $success = $attendanceModel->markAttendance($userId, $courseId, $presence, $late);

        // Gérez la réussite ou l'échec de l'opération
        if ($success) {
            // Rediriger l'utilisateur ou afficher un message de succès
        } else {
            // Afficher un message d'erreur
        }
    }
}
