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
<div id=form-container>
<div id=form>
<h1>Bienvenue</h1>
<form>
  <div class="mb-3">
    <label for="email" class="form-label">Email*</label>
    <input type="email" class="form-control" aria-describedby="emailHelp" autocomplete="email" id="email">
    <div id="emailHelp" class="form-text"></div>
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Mot de passe*</label>
    <input type="password" class="form-control" id="password" autocomplete="current-password">
  </div>
  <button type="button" class="btn btn-primary" onclick="login()">Connexion</button>
</form>
</div>
</div>
<script src="<?= HOME_URL ?>assets/js/user.js"></script>
</body>
</html>
