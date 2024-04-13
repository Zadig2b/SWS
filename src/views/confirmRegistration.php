<?php
// Check if the token is present in the URL
if(isset($_GET['token'])) {
    $token = $_GET['token'];
    // Now you have the token, you can use it as needed
    // For example, you can pass it to your controller method for further processing
     $userController->processToken($token);
} else {
    // Token not found in the URL, handle the case accordingly
    // For example, display an error message or redirect the user
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?= HOME_URL ?>assets/css/style.css">
    <title>Login</title>
</head>
<body>
<?php
include 'includes/header.php';
?>
<div id="form-container">
    <div id="form">
        <h1>Bienvenue</h1>
        <p>Pour clôturer votre inscription et créer votre compte, veuillez choisir un mot de passe.</p>
        <div class="mb-3">
            <label for="password" class="form-label">Mot de passe*</label>
            <input type="password" class="form-control" id="password" aria-describedby="passwordHelp">
            <div id="passwordHelp" class="form-text"></div>
        </div>
        <div class="mb-3">
            <label for="confirmPassword" class="form-label">Confirmez mot de passe*</label>
            <input type="password" class="form-control" id="confirmPassword">
        </div>
        <button type="button" class="btn btn-primary" onclick="submitRegistration()">Sauvegarder</button>
    </div>
</div>
<script src="<?= HOME_URL ?>assets/js/user.js"></script>
</body>
</html>
