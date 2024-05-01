    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="<?php echo base_url('auth/logout'); ?>">Logout</a>
                </div>
            </div>
        </div>
    </div>

                <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->


    <!-- Bootstrap core JavaScript -->
    <script src="<?php echo base_url('assets/'); ?>vendor/bootstrap/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url('assets/'); ?>vendor/bootstrap/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript -->
    <script src="<?php echo base_url('assets/'); ?>vendor/bootstrap/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?php echo base_url('assets/'); ?>vendor/bootstrap/chart.js/Chart.min.js"></script>
    
    <!-- build:js assets/vendor/js/core.js -->

    <script src="<?php echo base_url('assets/'); ?>vendor/libs/jquery/jquery.js"></script>
    <script src="<?php echo base_url('assets/'); ?>vendor/libs/popper/popper.js"></script>
    <script src="<?php echo base_url('assets/'); ?>vendor/js/bootstrap.js"></script>
    <script src="<?php echo base_url('assets/'); ?>vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="<?php echo base_url('assets/'); ?>vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="<?php echo base_url('assets/'); ?>vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?php echo base_url('assets/'); ?>js/demo/chart-area-demo.js"></script>
    <script src="<?php echo base_url('assets/'); ?>js/demo/chart-pie-demo.js"></script>
    <script src="<?php echo base_url('assets/'); ?>js/demo/chart-bar-demo.js"></script>

    
    <!-- Main JS -->
    <script src="<?php echo base_url('assets/'); ?>js/main.js"></script>
    
    <!-- Page JS -->
    <script src="<?php echo base_url('assets/'); ?>js/dashboards-analytics.js"></script>
    
   <!-- SweetAlert2 -->
    <script src="<?php echo base_url('assets/'); ?>js/sweetalert2.all.min.js"></script>
    <script src="<?php echo base_url('assets/'); ?>js/scriptsa.js"></script>

    

    <!-- Script untuk memperbarui label input file -->
    <script>
        // Fungsi untuk memperbarui label input file
        function updateFileLabel(event) {
            var inputFile = event.target;
            var fileName = inputFile.files[0].name; // Dapatkan nama file yang dipilih
            
            // Temukan label yang sesuai dengan input file ini
            var fileLabel = document.querySelector('label[for="image"]');
            if (fileLabel) {
                fileLabel.textContent = fileName; // Perbarui teks label dengan nama file yang dipilih
            }
        }

        // Tambahkan event listener pada input file
        document.getElementById('image').addEventListener('change', updateFileLabel);
    </script>
  <!-- Script Chart -->
  <script>
    // Variabel global untuk menyimpan referensi ke grafik Donut (Pie Chart)
    var myPieChart;

    document.addEventListener('DOMContentLoaded', function() {
        // Data untuk Donut Chart
        var data = {
            labels: ['Pria', 'Wanita'],
            datasets: [{
                data: [<?php echo $maleCount; ?>, <?php echo $femaleCount; ?>],
                backgroundColor: ['#4e73df', '#1cc88a']
            }]
        };

        // Konfigurasi Donut Chart
        var options = {
            maintainAspectRatio: false,
            responsive: true,
            tooltips: {
                bodyFontFamily: 'Arial', // Font untuk penjelasan
                bodyFontSize: 14, // Ukuran font penjelasan
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
            }
        };

        // Buat atau perbarui Donut Chart
        var ctx = document.getElementById('myPieChart').getContext('2d');

        // Hapus grafik sebelumnya jika ada
        if (myPieChart) {
            myPieChart.destroy();
        }

        // Buat grafik baru dan simpan referensi ke variabel global `myPieChart`
        myPieChart = new Chart(ctx, {
            type: 'doughnut',
            data: data,
            options: options
        });
    });
</script>


    
  </body>
</html>