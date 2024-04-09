<?php
require_once __DIR__ . '/autoload.php';

// On démarre la session :
session_start();

// Vérification que la base de données est bien existante
require_once __DIR__ . "/../config.php";

if (DB_INITIALIZED == FALSE) {
  $db = new src\Models\Database();
  echo $db->initialisationBDD();
}

require_once __DIR__ . "/router.php";
