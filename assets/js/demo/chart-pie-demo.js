// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system, system-ui, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Variabel global untuk menyimpan referensi ke chart Pie
var myPieChart;

// Fungsi untuk membuat atau memperbarui Donut Chart
function createPieChart(data, options) {
    // Dapatkan konteks dari elemen kanvas dengan id 'myPieChart'
    var ctx = document.getElementById('myPieChart').getContext('2d');
    
    // Hapus chart sebelumnya jika ada
    if (myPieChart) {
        myPieChart.destroy();
    }
    
    // Buat chart Pie baru dengan data dan opsi yang diberikan
    myPieChart = new Chart(ctx, {
        type: 'doughnut',
        data: data,
        options: options
    });
}

// Data dan opsi untuk chart
var data = {
    labels: ["Pria", "Wanita"],  // Labels sesuai dengan data Anda
    datasets: [{
        data: [parseInt("<?php echo $maleCount; ?>"), parseInt("<?php echo $femaleCount; ?>")],  // Data jumlah pria dan wanita
        backgroundColor: ['#4e73df', '#e83e8c'],  // Warna latar belakang yang diinginkan
        hoverBackgroundColor: ['#2e59d9', '#e01e77'],  // Warna latar belakang saat hover
        hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
};


var options = {
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
};

// Panggilan fungsi createPieChart dengan data dan opsi yang diperlukan
createPieChart(data, options);
