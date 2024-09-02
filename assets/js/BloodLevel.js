document.querySelectorAll(".blood-type").forEach(function (el) {
  const units = parseInt(el.getAttribute("data-units"), 10);
  const gradientStop = el.querySelector("#stop2");
  const unitsText = el.querySelector(".units");
  // Set text color based on units
  if (units === 0) {
    unitsText.style.color = "red";
  } else if (units <= 40) {
    unitsText.style.color = "orange";
  } else {
    unitsText.style.color = "green";
  }
});
