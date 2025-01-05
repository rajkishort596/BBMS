document.getElementById("printBtn").addEventListener("click", function () {
  // Open a new window for printing
  let printContents = document.querySelector("#printContents").innerHTML;
  let originalContents = document.body.innerHTML;

  // Open new window and write the content you want to print
  document.body.innerHTML = printContents;

  window.print(); // Trigger the print

  // Restore the original page content after printing
  document.body.innerHTML = originalContents;
});
