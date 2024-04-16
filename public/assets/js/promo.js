function fetchPromos() {
    fetch('/fetchPromos')
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            console.log(response);

            return response.json();
        })
        .then(promos => {
            displayPromos(promos);
        })
        .catch(error => {
            console.error('Error fetching promos:', error);
        });
}
const promoGrid = document.getElementById('promo-grid-content');
// const promoSection = document.getElementById('promo-individual-section');

function displayPromos(promos) {
    // Select the promo grid container

    // Clear existing content
    promoGrid.innerHTML = '';

    // Iterate through the promos and create HTML elements to display them
    promos.forEach(promo => {
        const promoRow = document.createElement('div');
        promoRow.classList.add('row');
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
    
    // Add event listener for the promo buttons

}
promoGrid.addEventListener('click', (event) => {
    const button = event.target;
    if (button.classList.contains('voir-promo')) {
        const promoId = button.dataset.id;
        // Handle the "Voir" button click for the promo with ID promoId
        promoSection.style.display = 'block';
        allPromo.style.display = 'none';

    } else if (button.classList.contains('éditer-promo')) {
        const promoId = button.dataset.id;
        // Handle the "Editer" button click for the promo with ID promoId
    } else if (button.classList.contains('supprimer-promo')) {
        const promoId = button.dataset.id;
        // Handle the "Supprimer" button click for the promo with ID promoId
    }
});
