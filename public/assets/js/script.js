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

// fonction pour gérer le header du Nested Tab
// Get the delays tab button element
var delaysTabButton = document.getElementById("delays-tab");

// Get the student tab button element
var studentTabButton = document.getElementById("student-tab");

// Get the student tab pane element
var header = document.getElementById("spH");
var studentSection = document.getElementById("grid-student");

// Store the original  content
var originalHeaderContent = header.innerHTML;
var originalStudentSectionContent = studentSection.innerHTML;

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
delaysTabButton.addEventListener("click", function () {
  // Replace the content of the student tab pane with the delays header HTML
  header.innerHTML = delaysHeaderHTML;
});

// Attach event listener to the student tab button
studentTabButton.addEventListener("click", function () {
  // Reset the header content to the original state
  header.innerHTML = originalHeaderContent;
  studentSection.innerHTML = originalStudentSectionContent;
});

promoTabBtn.addEventListener("click", function () {
  fetchStudents();
  fetchPromos();
});

document.addEventListener("DOMContentLoaded", function () {
  promoSection.style.display = "none";
});
