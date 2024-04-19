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
function displayPromos(promos) {
  promoGrid.innerHTML = "";

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
    promoSection.style.display = "block";
    allPromo.style.display = "none";
    fetchSinglePromo(promoId);
    fetchUsersForPromo(promoId);
  } else if (button.classList.contains("éditer-promo")) {
    const promoId = button.dataset.id;
  } else if (button.classList.contains("supprimer-promo")) {
    const promoId = button.dataset.id;
  }
});

function fetchSinglePromo(promoId) {
  fetch(`/fetchSinglePromo?promoId=${promoId}`)
    .then((response) => {
      if (!response.ok) {
        throw new Error("Network response was not ok");
      }
      console.log(response);

      return response.json();
    })
    .then((promo) => {
      displaySinglePromo(promo);
    })
    .catch((error) => {
      console.error("Error fetching promo:", error);
    });
}

function displaySinglePromo(promo) {
  promoHeader.innerHTML = `
    <h2>${promo.nom}</h2>
    <p>Informations</p>
    `;
  promoSection.dataset.id = promo.Id_promo;
}
