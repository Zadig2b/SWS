const addStudentBtn = document.getElementById("add-student-btn");
const addDelayBtn = document.getElementById("add-delay-btn");
const nestedTab = document.getElementById("nestedTab");
const spH = document.getElementById("spH");
const gridStudent = document.getElementById("grid-student");
const gridDelay = document.getElementById("grid-delay");
const createStudentSection = document.getElementById("create-student-section");
const createDelaySection = document.getElementById("create-delay-section");
const returnBtnStudent = document.getElementById("retour-btn-student-submit");
const returnBtnDelay = document.getElementById("retour-btn-delay-submit");
const promoTabBtn = document.getElementById("promo-tab");
const promoSection = document.getElementById("promo-individual-section");
const allPromo = document.getElementById("all-promos-section");
const promoHeader = document.getElementById("promoHeader")

addStudentBtn.addEventListener("click", function () {
  gridStudent.style.display = "none";
  nestedTab.style.display = "none";
  spH.style.display = "none";
  createStudentSection.style.display = "block";
  console.log("called");
});

returnBtnStudent.addEventListener("click", function () {
  spH.style.display = "block";
  nestedTab.style.display = "block";
  gridStudent.style.display = "block";
  createStudentSection.style.display = "none";
});

var delaysTabButton = document.getElementById("delays-tab");
var studentTabButton = document.getElementById("student-tab");
var studentTabPane = document.getElementById("student-tab-pane");
var delayTabPane = document.getElementById("delays-tab-pane");

delaysTabButton.addEventListener("click", function () {
  var classes = studentTabPane.className.split(" ");
  if (classes.indexOf("active") === -1 || classes.indexOf("show") === -1) {
    studentTabPane.style.display = "none";
    delayTabPane.style.display = "block";
  }
});

studentTabButton.addEventListener("click", function () {
  var classes = studentTabPane.className.split(" ");
  if (classes.indexOf("active") === -1 || classes.indexOf("show") === -1) {
    delayTabPane.style.display = "none";
    studentTabPane.style.display = "block";
  }
});

var delaysTabButton = document.getElementById("delays-tab");
var studentTabButton = document.getElementById("student-tab");
var header = document.getElementById("spH");
var studentSection = document.getElementById("grid-student");
var originalHeaderContent = header.innerHTML;
var originalStudentSectionContent = studentSection.innerHTML;
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

delaysTabButton.addEventListener("click", function () {
  header.innerHTML = delaysHeaderHTML;
});

studentTabButton.addEventListener("click", function () {
//Réinitialise le contenu de l'en-tête à son état d'origine 
 header.innerHTML = originalHeaderContent;
studentSection.innerHTML = originalStudentSectionContent;
});

promoTabBtn.addEventListener("click", function () {
  promoSection.style.display = 'none';
  allPromo.style.display = 'block';
});

document.addEventListener("DOMContentLoaded", function () {
  promoSection.style.display = "none";
  fetchPromos();

});

function showToast(message, type) {
  const toastContainer = document.getElementById('toastContainer');
  const toast = new bootstrap.Toast(toastContainer, {
      autohide: true,
      delay: 3000 
  });

  const toastBody = toastContainer.querySelector('.toast-body');
  toastBody.innerHTML = `<p>${message}</p>`;

  toastContainer.classList.remove('bg-success', 'bg-danger', 'bg-info', 'bg-warning');
  if (type === 'success') {
      toastContainer.classList.add('bg-success');
  } else if (type === 'error') {
      toastContainer.classList.add('bg-danger');
  } else if (type === 'info') {
      toastContainer.classList.add('bg-info');
  } else if (type === 'warning') {
      toastContainer.classList.add('bg-warning');
  }

  toast.show();
      }