function fetchPromos() {
  fetch("/fetchPromos")
    .then((response) => {
      if (!response.ok) {
        throw new Error("Network response was not ok");
      }
      console.log(response);

      return response.json();
    })
    .then((promos) => {
      displayPromos(promos);
    })
    .catch((error) => {
      console.error("Error fetching promos:", error);
    });
}
const promoGrid = document.getElementById("promo-grid-content");
// const promoSection = document.getElementById('promo-individual-section');

function displayPromos(promos) {
  // Select the promo grid container

  // Clear existing content
  promoGrid.innerHTML = "";

  // Iterate through the promos and create HTML elements to display them
  promos.forEach((promo) => {
    const promoRow = document.createElement("div");
    promoRow.classList.add("row");
    promoRow.dataset.id = promo.Id_promo;
    promoRow.innerHTML = `
            <div class="col">${promo.nom}</div>
            <div class="col">${promo.début}</div>
            <div class="col">${promo.fin}</div>
            <div class="col">${promo.places_max}</div>
    
            <div class="col">
                <button type="button" data-id="${promo.Id_promo}" id="voir-promo-${promo.Id_promo}" class="btn btn-outline-primary voir-promo">Voir</button>
                <button type="button" data-id="${promo.Id_promo}" id="éditer-promo-${promo.Id_promo}" class="btn btn-outline-primary éditer-promo">Editer</button>
                <button type="button" data-id="${promo.Id_promo}" id="supprimer-promo-${promo.Id_promo}" class="btn btn-outline-primary supprimer-promo">Supprimer</button>
            </div>
        `;
    promoGrid.appendChild(promoRow);
  });
}

promoGrid.addEventListener("click", (event) => {
  const button = event.target;
  if (button.classList.contains("voir-promo")) {
    const promoId = button.dataset.id;
    // Handle the "Voir" button click for the promo with ID promoId
    promoSection.style.display = "block";
    allPromo.style.display = "none";
  } else if (button.classList.contains("éditer-promo")) {
    const promoId = button.dataset.id;
    // Handle the "Editer" button click for the promo with ID promoId
  } else if (button.classList.contains("supprimer-promo")) {
    const promoId = button.dataset.id;
    // Handle the "Supprimer" button click for the promo with ID promoId
  }
});

function createPromoIndividualSection(promos) {
  // Select the container where the promo individual sections will be appended
  const container = document.getElementById("promo-individual-container");

  // Clear existing content
  container.innerHTML = "";

  // Iterate through each promo to create individual sections
  promos.forEach((promo) => {
    // Create a new promo individual section
    const promoSection = document.createElement("div");
    promoSection.classList.add("promo-individual-section");
    promoSection.dataset.id = promo.Id_promo;

    // Set the HTML content for the promo individual section
    promoSection.innerHTML = `
        <div id="spH">
        <div id="promoHeader">
          <h2>Promotion DWWM3</h2>
          <p>Informations</p>
        </div>
        <div id="btn-student">
          <button type="button" class="btn btn-success" id="add-student-btn">Ajouter un Apprenant</button>
        </div>
      </div>

            <div class="tab-pane fade show active" id="student-tab-pane" role="tabpanel" aria-labelledby="student-tab" tabindex="0">

                <div id="student-section" class="section">

                <!--------------------------------------------------------------- NESTED PANEL ------------------------->
                <ul class="nav nav-tabs" id="nestedTab" role="tablist">
                  <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="student-tab" data-bs-toggle="tab" data-bs-target="#student-tab-pane" type="button" role="tab" aria-controls="student-tab-pane" aria-selected="true">Apprenants</button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="delays-tab" data-bs-toggle="tab" data-bs-target="#delays-tab-pane" type="button" role="tab" aria-controls="delays-tab-pane" aria-selected="false">Retards</button>
                  </li>
                </ul>
                    <!------------------------------------- MAIN OF STUDENTS ------------------------------------->


                    <div id="grid-student">
                    <div class="container text-center" id="header-student-grid">
                    <div class="row">
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
                        
                    </div>
                    </div>
                  </div>
                  <div id="underline"></div>
                  <div class="container text-center" id="student-grid">
                  </div>
                  </div>
                  </div>
              </div>
              
              
              <script src="<?= HOME_URL ?>assets/js/fetchStudent.js"></script>
              

              <div id="create-student-section" class="section">
    <h2>Création d'un Apprenant</h2>
    <div id="studentCreationForm">
        <form id="studentForm">
            <div class="mb-3">
                <label for="nomInput" class="form-label">Nom*</label>
                <input type="text" class="form-control" id="nomInput" required>
            </div>
            <div class="mb-3">
                <label for="prenomInput" class="form-label">Prénom*</label>
                <input type="text" class="form-control" id="prenomInput" required>
            </div>
            <div class="mb-3">
                <label for="emailInput" class="form-label">Email*</label>
                <input type="email" class="form-control" id="emailInput" required>
            </div>
            <button type="button" class="btn btn-primary" id="retour-btn-student-submit">Retour</button>
            <button type="button" class="btn btn-primary" id="studentSubmit" onclick="createStudent()">Sauvegarder</button>
        </form>
    </div>
</div>
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
</div>



                </div>
            </div>
            <!----------------------------------------  DELAY PANEL HEADER CONTENT --------------------------------->
            <div class="tab-pane fade" id="delays-tab-pane" role="tabpanel" aria-labelledby="delays-tab" tabindex="0">

            

<div id="delays-section" class="section">
<div id="spH">
  <div id="promoHeader">
      <h2>Promotion DWWM3</h2>
      <p>Informations</p>
  </div>
  <div id="btn-delay">
    <button type="button" class="btn btn-success" id="add-delay-btn">Ajouter un Retard</button>  
  </div>
</div>

            <div id="gridDelay">
            <div class="container text-center" id="header-delay-grid">
              <div class="row">
                <div class="col">
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
            </div>
          </div>
         
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
        </div>
      </div>
     </div>
        `;

    // Append the promo individual section to the container
    container.appendChild(promoSection);
  });
}
