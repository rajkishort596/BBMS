// Check if the element for the doughnut chart exists
const myDoughnutChartElement = document.getElementById("myDoughnutChart");
if (myDoughnutChartElement) {
  const ctx2 = myDoughnutChartElement.getContext("2d");

  // Create the doughnut chart
  const myDoughnutChart = new Chart(ctx2, {
    type: "doughnut",
    data: {
      labels: ["Active", "Upcoming", "Completed"],
      datasets: [
        {
          label: "My Dataset",
          data: [
            campaignCounts.active, // Use the active count from PHP
            campaignCounts.upcoming, // Use the upcoming count from PHP
            campaignCounts.completed, // Use the completed count from PHP
          ],
          backgroundColor: [
            "rgba(0, 128, 0, 0.5)",
            "rgba(57, 206, 243, 0.5)",
            "rgba(255, 166, 0, 0.5)",
          ],
          borderColor: [
            "rgba(0, 128, 0, 1)",
            "rgba(57, 206, 243, 1)",
            "rgba(255, 166, 0, 1)",
          ],
          borderWidth: 1,
        },
      ],
    },
    options: {
      responsive: true,
      plugins: {
        legend: {
          position: "top",
        },
        title: {
          display: true,
          text: "Blood Donation Campaign",
        },
      },
    },
  });
}
