// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Example
var ctx = document.getElementById("myPieChart");
var myPieChartData = document.getElementById("myPieChartData").value;
var data = myPieChartData.split(" ");
console.log(data);
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ["Alih Tugas", "Sertifikasi Guru", "Kenaikan Pangkat", "Nikah Cerai Rujuk"],
    datasets: [{
      data: data,
      backgroundColor: ['#7a8528', '#858796', '#36b9cc', '#f5e17a'],
      hoverBackgroundColor: ['#59611f', '#717384', '#2c9faf', '#f7dc54'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: false
    },
    cutoutPercentage: 80,
  },
});
