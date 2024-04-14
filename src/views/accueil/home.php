<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="<?= HOME_URL ?>assets/css/style.css">
  <title>Login</title>
</head>

<body>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
  </head>

  <body>
    <!--------------------------- PREMIER PANEL -------------------------------------->
    <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Accueil</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="promo-tab" data-bs-toggle="tab" data-bs-target="#promo-tab-pane" type="button" role="tab" aria-controls="promo-tab-pane" aria-selected="false">Promotions</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="users-tab" data-bs-toggle="tab" data-bs-target="#users-tab-pane" type="button" role="tab" aria-controls="users-tab-pane" aria-selected="false">Utilisateurs</button>
      </li>
    </ul>
    <!--------------------------- FIN PREMIER PANEL -------------------------------------->

    <?php
    include_once('main.php');
    // accueil
    ?>

    <!-------------------------------------- second panel HEADER ------------------------------------------>
    <div class="tab-pane fade" id="promo-tab-pane" role="tabpanel" aria-labelledby="promo-tab" tabindex="0">

      <?php
      include_once(__DIR__ . '/../promos/apprenants/header.php');

      include(__DIR__ . '/../promos/nestedTab.php');
      ?>
      <div class="tab-pane fade show active" id="student-tab-pane" role="tabpanel" aria-labelledby="student-tab" tabindex="0">

        <div id="student-section" class="section">


          <!------------------------------------- MAIN OF STUDENTS ------------------------------------->

          <?php
          include_once(__DIR__ . '/../promos/apprenants/main.php');
          include_once(__DIR__ . '/../promos/apprenants/create.php');
          include_once(__DIR__ . '/../promos/apprenants/edit.php');
          ?>


        </div>

        <!----------------------------------------  DELAY PANEL HEADER CONTENT --------------------------------->
        <div class="tab-pane fade" id="delays-tab-pane" role="tabpanel" aria-labelledby="delays-tab" tabindex="0">


          <?php
          include_once(__DIR__ . '/../promos/delays/main.php');
          include(__DIR__ . '/../promos/delays/create.php');
          include(__DIR__ . '/../promos/delays/edit.php');

          ?>
        </div>
        <!--------------------------------------- END OF DELAY PANEL CONTENT ----------------------------------------------------->
        <script src="<?= HOME_URL ?>assets/js/script.js"></script>
        <script src="<?= HOME_URL ?>assets/js/user.js"></script>

  </body>

  </html>