addDelayBtn.addEventListener("click", function () {
  gridDelay.style.display = "none";
  nestedTab.style.display = "none";
  spH.style.display = "none";
  createDelaySection.style.display = "block";
  console.log("called");
});

returnBtnDelay.addEventListener("click", function () {
  spH.style.display = "block";
  nestedTab.style.display = "block";
  gridDelay.style.display = "block";
  createDelaySection.style.display = "none";
});

document.addEventListener("DOMContentLoaded", function () {
  const delaysTab = document.getElementById("delays-tab");
  const promoTabPane = document.getElementById("promo-tab-pane");

  // Add event listener to delays-tab
  delaysTab.addEventListener("click", function () {
    // Remove 'show' class from promo-tab-pane
    promoTabPane.classList.remove("active");
    promoTabPane.classList.remove("show");

    console.log("called");
  });
});

document.addEventListener("DOMContentLoaded", function () {
  const studentTabPane = document.getElementById("promo-tab-pane");
  const studentTab = document.getElementById("student-tab");

  // Add event listener to delays-tab
  studentTab.addEventListener("click", function () {
    // Remove 'show' class from promo-tab-pane
    studentTabPane.classList.add("active");
    studentTabPane.classList.add("show");

    console.log("called");
  });
});
