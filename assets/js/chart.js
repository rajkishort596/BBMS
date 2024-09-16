// const ctx = document.getElementById("donationsChart").getContext("2d");
const ctx2 = document.getElementById("myDoughnutChart").getContext("2d");

// Create the bar chart
// const donationsChart = new Chart(ctx, {
//   type: "bar",
//   data: {
//     labels: ["Jan", "Apr", "Jul", "Oct", "Dec"],
//     datasets: [
//       {
//         label: "Max Capacity",
//         data: [1000, 1000, 1000, 1000, 1000],
//         backgroundColor: "rgba(255, 0, 0, 0.2)",
//         borderWidth: 0,
//         borderRadius: 5,
//         barThickness: 15,
//       },
//       {
//         label: "Previous Donations",
//         data: [500, 750, 600, 300, 100],
//         backgroundColor: "rgba(255, 0, 0, 0.7)",
//         borderColor: "rgba(255, 99, 132, 1)",
//         borderWidth: 1,
//         borderRadius: 5,
//         borderSkipped: false,
//         barThickness: 15,
//       },
//     ],
//   },
//   options: {
//     responsive: true,
//     scales: {
//       y: {
//         beginAtZero: true,
//         max: 1000,
//         ticks: {
//           stepSize: 250,
//         },
//         stacked: false,
//         title: {
//           display: true,
//           text: "Blood Units (ml)",
//           color: "black",
//         },
//       },
//       x: {
//         stacked: true,
//         title: {
//           display: true,
//           text: "Months",
//           color: "black",
//         },
//         barPercentage: 0.5,
//         categoryPercentage: 0.7,
//       },
//     },
//     plugins: {
//       title: {
//         display: true,
//         text: "Previous Donations",
//         padding: { bottom: 12 },
//         font: {
//           size: 16,
//         },
//         color: "black",
//       },
//       legend: {
//         display: false,
//       },
//       font: {
//         color: "black",
//       },
//     },
//   },
// });

// Create the doughnut chart
const myDoughnutChart = new Chart(ctx2, {
  type: "doughnut",
  data: {
    labels: ["Active", "Upcoming", "Completed"],
    datasets: [
      {
        label: "My Dataset",
        data: [5, 3, 17],
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
