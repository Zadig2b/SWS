    const addStudentBtn = document.getElementById('add-student-btn');
    const addDelayBtn = document.getElementById('add-delay-btn');
    const nestedTab = document.getElementById('nestedTab')
    const spH = document.getElementById('spH')
    const gridStudent = document.getElementById('grid-student');
    const gridDelay = document.getElementById('grid-delay');
    const createStudentSection = document.getElementById('create-student-section');
    const createDelaySection = document.getElementById('create-delay-section');
    const returnBtnStudent = document.getElementById('retour-btn-student-submit');
    const returnBtnDelay = document.getElementById('retour-btn-delay-submit');

    addStudentBtn.addEventListener('click', function() {
      gridStudent.style.display = 'none';
      nestedTab.style.display = 'none';
      spH.style.display = 'none';
      createStudentSection.style.display = 'block';
      console.log('called');
    });

    // addDelayBtn.addEventListener('click', function() {
    //   gridDelay.style.display = 'none';
    //   nestedTab.style.display = 'none';
    //   spH.style.display = 'none';
    //   createDelaySection.style.display = 'block';
    //   console.log('called');
    // });


    returnBtnStudent.addEventListener('click', function() {
      spH.style.display = 'block';
      nestedTab.style.display = 'block';
      gridStudent.style.display = 'block';
      createStudentSection.style.display= 'none';
    });

    // returnBtnDelay.addEventListener('click', function() {
    //   spH.style.display = 'block';
    //   nestedTab.style.display = 'block';
    //   gridDelay.style.display = 'block';
    //   createDelaySection.style.display= 'none';
    // });

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


  var delaysTabButton = document.getElementById('delays-tab');
  var studentTabButton = document.getElementById('student-tab');
  var studentTabPane = document.getElementById('student-tab-pane');
  var delayTabPane = document.getElementById('delays-tab-pane');

    delaysTabButton.addEventListener('click', function() {
      var classes = studentTabPane.className.split(' ');
      if (classes.indexOf('active') === -1 || classes.indexOf('show') === -1) {
        studentTabPane.style.display = 'none';
        delayTabPane.style.display = 'block';

      }
    });
  
    studentTabButton.addEventListener('click', function() {
      var classes = studentTabPane.className.split(' ');
      if (classes.indexOf('active') === -1 || classes.indexOf('show') === -1) {
        delayTabPane.style.display = 'none';
        studentTabPane.style.display = 'block';

      }
    });

// fonction pour gérer le header du Nested Tab
  // Get the delays tab button element
  var delaysTabButton = document.getElementById("delays-tab");

  // Get the student tab button element
  var studentTabButton = document.getElementById("student-tab");

  // Get the student tab pane element
  var header = document.getElementById("spH");
  var studentSection = document.getElementById("grid-student")

  // Store the original  content
  var originalHeaderContent = header.innerHTML;
  var originalStudentSectionContent = studentSection.innerHTML

  // Define the delays header HTML content
  var delaysHeaderHTML = `
      <div id="spH">
          <div id="promoHeader">
              <h2>Promotion DWWM3</h2>
              <p>Informations</p>
          </div>
          <div id="btn-delay">
              <button type="button" class="btn btn-success" id="add-delay-btn">Ajouter un retard</button>
          </div>
      </div>
  `;

  // Attach event listener to the delays tab button
  delaysTabButton.addEventListener("click", function() {
      // Replace the content of the student tab pane with the delays header HTML
      header.innerHTML = delaysHeaderHTML;
  });

  // Attach event listener to the student tab button
  studentTabButton.addEventListener("click", function() {
      // Reset the header content to the original state
      header.innerHTML = originalHeaderContent;
      studentSection.innerHTML = originalStudentSectionContent
  });

