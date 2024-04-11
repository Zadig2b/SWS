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

//   document.addEventListener('DOMContentLoaded', function() {
//     const delaysTab = document.getElementById('delays-tab');
//     const promoTabPane = document.getElementById('promo-tab-pane');

//     // Add event listener to delays-tab
//     delaysTab.addEventListener('click', function() {
//         // Remove 'show' class from promo-tab-pane
//         promoTabPane.classList.remove('active');
//         promoTabPane.classList.remove('show');

//         console.log('called');
//     });
// });

// document.addEventListener('DOMContentLoaded', function() {
//   const studentTabPane = document.getElementById('promo-tab-pane');
//   const studentTab = document.getElementById('student-tab');

//   // Add event listener to delays-tab
//   studentTab.addEventListener('click', function() {
//       // Remove 'show' class from promo-tab-pane
//       studentTabPane.classList.add('active');
//       studentTabPane.classList.add('show');


//       console.log('called');
//   });
// });
