<div id="promo-section" class="section">
  <div id="spH">
    <div id="promoHeader">
        <h2>Promotion DWWM3</h2>
        <p>Informations</p>
        


<p>tableau des retards</p>
    </div>
    <div id="btn-delay">
      <button type="button" class="btn btn-success" id="add-delay-btn">Ajouter un Apprenant</button>  
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
    <option selected="">Open this select menu</option>
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
    <option selected="">Open this select menu</option>
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