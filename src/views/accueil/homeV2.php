<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?= HOME_URL ?>assets/css/style.css">
    <title>homeFormateur</title>
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
    if (isset($_SESSION['connected']) && $_SESSION['connected'] === true) {
        if ($_SESSION['user_role'] == 1) {
            include_once('accueilFormateur.php');
        } elseif ($_SESSION['user_role'] == 2) {
            include_once('accueilApprenant.php');
        }
    } else {
        include_once(__DIR__ . '/../auth/login.php');
    }
    ?>


    <div class="tab-pane fade" id="promo-tab-pane" role="tabpanel" aria-labelledby="promo-tab" tabindex="0">

        <?php
        include_once(__DIR__ . '/../promos/header.php');
        ?>
        <div id="promo-individual-container">
        <div id="promo-individual-section" class="section">
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
            </div>
            <!----------------------------------------  DELAY PANEL HEADER CONTENT --------------------------------->
            <div class="tab-pane fade" id="delays-tab-pane" role="tabpanel" aria-labelledby="delays-tab" tabindex="0">


                <?php
                include_once(__DIR__ . '/../promos/delays/main.php');
                include(__DIR__ . '/../promos/delays/create.php');
                include(__DIR__ . '/../promos/delays/edit.php');

                ?>
            </div>
        </div>
        </div>
            <!--------------------------------------- END OF DELAY PANEL CONTENT ----------------------------------------------------->
            <div id="toastContainer" class="toast position-fixed bottom-0 end-0 p-0">
    <div class="toast-body">
    <?php if (!empty($error_message)): ?>
        <script>
            showToast("<?php echo $error_message; ?>", 'error');
        </script>
    <?php endif; ?>
    </div>
</div>
            <script src="<?= HOME_URL ?>assets/js/courses.js"></script>
            <script src="<?= HOME_URL ?>assets/js/script.js"></script>
            <script src="<?= HOME_URL ?>assets/js/user.js"></script>
            <script src="<?= HOME_URL ?>assets/js/promo.js"></script>

</body>

</html>