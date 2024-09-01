const ctx = document.getElementById("donationsChart").getContext("2d");

// Create the chart
const donationsChart = new Chart(ctx, {
  type: "bar",
  data: {
    labels: ["Jan", "Apr", "Jul", "Oct", "Dec"],
    datasets: [
      // Background bars showing maximum height
      {
        label: "Max Capacity",
        data: [1000, 1000, 1000, 1000, 1000], // Represents the full height (maximum value)
        backgroundColor: "rgba(255, 0, 0, 0.2)", // Light red background with transparency
        borderWidth: 0, // No border for the background bars
        borderRadius: 5,
        barThickness: 15,
      },
      // Actual data bars
      {
        label: "Previous Donations",
        data: [500, 750, 600, 300, 100],
        backgroundColor: "rgba(255, 0, 0, 0.7)", // Actual data color
        borderColor: "rgba(255, 99, 132, 1)",
        borderWidth: 1,
        borderRadius: 5,
        borderSkipped: false,
        barThickness: 15, // Same thickness as the background bars
      },
    ],
  },
  options: {
    // resposive: true,
    scales: {
      y: {
        beginAtZero: true,
        max: 1000, // Ensure the y-axis max matches the background bar height
        ticks: {
          stepSize: 250,
        },
        stacked: false, // Stack the bars on the y-axis
        title: {
          display: true,
          text: "Blood Units (ml)", // Label for the y-axis
          color: "black",
        },
      },
      x: {
        stacked: true, // Stack the bars on the x-axis
        title: {
          display: true,
          text: "Months", // Label for the x-axis
          color: "black",
        },
        barPercentage: 0.5, // Width of the bars relative to the category width
        categoryPercentage: 0.7, // Spacing between the bars in different categories
      },
    },
    plugins: {
      title: {
        display: true,
        text: "Previous Donations", // Title of the chart
        padding: { bottom: 12 },
        font: {
          size: 16, // Adjust the size of the title
        },
        color: "black",
      },
      legend: {
        display: false, // Show legend to differentiate between max capacity and actual data
      },
      // Global font settings
      font: {
        color: "black", // Set the global font color to black
      },
    },
  },
});
