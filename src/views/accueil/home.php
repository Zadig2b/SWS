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
    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Promotions</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Utilisateurs</button>
  </li>
</ul>
  <!--------------------------- FIN PREMIER PANEL -------------------------------------->

<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
  <h2>Cours du jour</h2>
  <div id="course-section">
  <div id="course-card">
<div id="first-line">
  <h2>$promoName - $matin</h2>
  <p>$date</p>
</div>
<p>$nb participants</p>
<button type="button" class="btn btn-warning" id="sign-status">Signature status</button>
  </div>

  <div id="course-section">
  <div id="course-card">
<div id="first-line">
  <h2>$promoName - $matin</h2>
  <p>$date</p>
</div>
<p>$nb participants</p>
<button type="button" class="btn btn-warning" id="sign-status">Signature status</button>
  </div>
  </div>
 
</div>
</div>




<!-------------------------------------- second panel ------------------------------------------>
  <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
<div id="promo-section" class="section">
  <div id="spH">
    <div id="promoHeader">
        <h2>Promotion DWWM3</h2>
        <p>Informations</p>
<!------------------------------ PANEL -------------------------------------->
<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Tableau apprenants</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Retards</button>
  </li>
</ul>
<!------------------------------ FIN DU PANEL -------------------------------------->

        <p>tableau des retards</p>
    </div>
    <div id="btn-delay">
      <button type="button" class="btn btn-success" id="add-delay-btn">Ajouter un retard</button>  
    </div>
  </div>
  
  <div id="gridDelay">
      <div class="container text-center" id="header-delay-grid">
      <div class="row">
      <div class="col">
      <div class="form-check">
      <input class="form-check-input" type="checkbox" value="" id="Allcheck">
      <label class="form-check-label" for="flexCheckDefault" hidden="true">
        Default checkbox
      </label>
    </div>
        </div>
        <div class="col">
          Nom de famille
        </div>
        <div class="col">
          Prénom
        </div>
        <div class="col">
          Mail
        </div>
        <div class="col">
          Compte activé
        </div>
        <div class="col">
          Rôle
        </div>
      </div>
      <!-- <div id="underline"></div> -->
    </div>
    <div id="underline"></div>
    <div class="container text-center" id="delay-grid">
      <div class="row">
      <div class="col">
      <div class="form-check">
      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
      <label class="form-check-label" for="flexCheckDefault" hidden="true">
        Default checkbox
      </label>
    </div>
      </div>
      <div class="col">
        Nom de famille
      </div>
      <div class="col">
        Prénom
      </div>
      <div class="col">
        Mail
      </div>
      <div class="col">
        Compte activé
      </div>
      <div class="col">
        Rôle
      </div>
      <div class="col">
      <button type="button" class="btn btn-outline-dark" id="edit-delay-btn">edit</button>
      </div>
    </div>
    </div>
    </div>
</div>


<!-------------------------------- delayCreationForm ----------------------------------------->

<div id="create-delay-section" class="section">
  <h2>Création d'un retard</h2>
  <div id="delayCreationForm">
      <form>
      <div class="mb-3">
        <p>Apprenant concerné</p>
        <select class="form-select" aria-label="Default select example">
    <option selected>Open this select menu</option>
    <option value="1">One</option>
    <option value="2">Two</option>
    <option value="3">Three</option>
  </select>
      </div>
      <div class="mb-3">
        <label for="delayDateInput" class="form-label">Date du retard</label>
        <input type="date" class="form-control" id="delayDateInput">
      </div>
      <button type="button" class="btn btn-primary" id="retour-btn-delay-submit">Retour</button>
      <button type="submit" class="btn btn-primary" id="delaySubmit">Sauvegarder</button>
    </form>
  </div>
</div>

<!------------------------------ édition du retard ---------------------------------->
<div id="edit-delay-section" class="section">
  <h2>Edition du retard de $name</h2>
  <p>les changements appliqués sont définitifs</p>
  <div id="delayCreationForm">
      <form>
      <div class="mb-3">
        <p>Apprenant concerné</p>
        <select class="form-select" aria-label="Default select example">
    <option selected>Open this select menu</option>
    <option value="1">One</option>
    <option value="2">Two</option>
    <option value="3">Three</option>
  </select>
      </div>
      <div class="mb-3">
        <label for="delayDateInput" class="form-label">Date du retard</label>
        <input type="date" class="form-control" id="delayDateInput">
      </div>
<div id="div-btn">
        <button type="button" class="btn btn-danger" id="delay-delete-btn">Danger</button>
        <button type="submit" class="btn btn-primary" id="delaySubmit">Sauvegarder</button>
</div>
    </form>
  </div>
</div>
<script src="<?= HOME_URL ?>assets/js/script.js"></script>
</body>
</html>
