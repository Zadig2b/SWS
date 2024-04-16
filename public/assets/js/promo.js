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

function displayPromos(promos) {
    // Select the promo grid container
    const promoGrid = document.getElementById('promo-grid');

    // Clear existing content
    promoGrid.innerHTML = '';

    // Iterate through the promos and create HTML elements to display them
    promos.forEach(promo => {
        const promoRow = document.createElement('div');
        promoRow.classList.add('row');
        promoRow.innerHTML = `
            <div class="col">${promo.nom}</div>
            <div class="col">${promo.prénom}</div>
            <div class="col">${promo.email}</div>
            <div class="col">${promo.actif ? 'Yes' : 'No'}</div>
            <div class="col">${promo.Id_role}</div>
            <div class="col">
                <button type="button" class="btn btn-outline-dark">Edit</button>
            </div>
        `;
        promoGrid.appendChild(promoRow);
    });
}

