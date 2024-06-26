<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="<?= HOME_URL ?>assets/css/style.css">
  <title>homeApprenant</title>
</head>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="http://sws/">SIMPLON</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <?php
          if (isset($_SESSION['connected']) && $_SESSION['connected'] === true) {
              echo '<a class="nav-link active" aria-current="page" href="/logout">Déconnexion</a>';
          } 
          ?>
        </li>
      </ul>
    </div>
  </div>
</nav>

  <body>
    <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Accueil</button>
      </li>
    </ul>
    <?php
    if (isset($_SESSION['connected']) && $_SESSION['connected'] === true) {
      if ($_SESSION['user_role'] == 1) {
          include_once('accueilFormateur.php');
      } elseif ($_SESSION['user_role'] == 2) {
          include_once('accueilApprenant.php');
      }
  } else {
      include_once(__DIR__ . '/../auth/login.php');
  }?>

<script src="<?= HOME_URL ?>assets/js/courses.js"></script>

  </body>

  </html>