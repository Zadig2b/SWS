document.addEventListener('DOMContentLoaded', function() {
    const addDelayBtn = document.getElementById('add-delay-btn');
    const promoSection = document.getElementById('promo-section');
    const createDelaySection = document.getElementById('create-delay-section');

    addDelayBtn.addEventListener('click', function() {
      promoSection.style.display = 'none';
      createDelaySection.style.display = 'block';
    });
  });
  document.addEventListener('DOMContentLoaded', function() {
    const returnBtn = document.getElementById('retour-btn-delay-submit');
    const promoSection = document.getElementById('promo-section');
    const createDelaySection = document.getElementById('create-delay-section');

    returnBtn.addEventListener('click', function() {
      promoSection.style.display = 'block';
      createDelaySection.style.display = 'none';
    });
  });
