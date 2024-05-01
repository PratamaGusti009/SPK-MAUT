<!-- Content wrapper -->
<div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y justify-content-between mb-4">
            
                        <!-- Page Heading -->
                        
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tabel Alternatif/</span> Pelamar</h4>
                            
                        
                        <!-- Tabel -->
                        <div class="card">
                            <h5 class="card-header">
                                <div class="row align-items-center">
                                    <div class="col">
                                        Daftar Pelamar
                                    </div>
                                    <div class="col-auto">
                                        <form action="" method="post" class="d-flex">
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Search" id="search_input" autocomplete="off" autofocus>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </h5>
                        
                            <div class="table-responsive text-nowrap">
                            <table class="table">
                                    <thead class="table-light">
                                        <tr align="center">
                                        <th width="5%">No</th>
                                        <th>Nama</th>
                                        <th>NIK</th>
                                        <th>Departemen</th>
                                        <th width="15%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="search_results">
                                    <?php
                                        $no = 1;
                                    foreach ($alternatif as $data) {
                                        ?>
                                    <tr align="center">
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $data['nama']; ?></td>
                                        <td><?php echo $data['nik']; ?></td>
                                        <td><?php // Memeriksa apakah nama departemen kosong
                                            if (empty($data['nama_departemen'])) {
                                                // Jika nama departemen kosong, tampilkan teks "Departemen Belum Dipilih"
                                                echo 'Departemen Belum Dipilih';
                                            } else {
                                                // Jika nama departemen tidak kosong, tampilkan nilai nama departemen
                                                echo $data['nama_departemen'];
                                            } ?>
                                        </td>

                                        <td>
                                            <div class="btn-group" role="group">
                                                <a data-bs-toggle="tooltip" type="button" class="btn btn-primary" href="<?php echo base_url('Alternatif/detail/'.$data['id_alternatif']); ?>">
                                                <i class="bx bxs-user-detail" style="color: #FFFFFF;"></i></a>
                                                <a data-bs-toggle="tooltip" type="button" class="btn btn-secondary"href="<?php echo base_url('Alternatif/destroy/'.$data['id_alternatif']); ?>">
                                                <i class="bx bx-trash" style="color: #FFFFFF;"></i></a>
                                            </div>
                                        </td>
                                    </tr>

                                        <?php
                                                ++$no;
                                    }
                                    ?>
                                        </tbody>
                                    </table>



                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                        <script>
                           $(document).ready(function(){
                                // Simpan data asli tabel saat halaman dimuat
                                var originalData = $('#search_results').html();

                                $('#search_input').keyup(function(){
                                    var keyword = $(this).val();
                                    if(keyword != ''){
                                        $.ajax({
                                            url: '<?php echo base_url('Alternatif/ajax_search'); ?>',
                                            type: 'POST',
                                            data: {keyword:keyword},
                                            success:function(data){
                                                var result = JSON.parse(data);
                                                var html = '';
                                                if (result.length > 0) {
                                                    $.each(result, function(index, value){
                                                        html += '<div class="table-responsive text-nowrap">';
                                                        html += '<table class="table">';
                                                        html += '<thead class="table-light">';
                                                        html += '<tr align="center">';
                                                        html += '<th width="5%">' + (index + 1) + '</th>';
                                                        html += '<th>' + value.nama + '</th>';
                                                        html += '<th>' + value.nik + '</th>';
                                                        html += '<th>' + value.nama_departemen + '</th>';
                                                        html += '<th width="15%">';
                                                        html += '<div class="btn-group" role="group">';
                                                        html += '<a data-bs-toggle="tooltip" type="button" class="btn btn-primary" href="<?php echo base_url('Alternatif/detail/'); ?>' + value.id_alternatif + '"><i class="bx bx-edit" style="color: #FFFFFF;"></i></a>'; 
                                                        html += '<a data-bs-toggle="tooltip" type="button" class="btn btn-secondary" href="<?php echo base_url('Alternatif/destroy/'); ?>' + value.id_alternatif + '"><i class="bx bx-trash" style="color: #FFFFFF;"></i></a>';
                                                        html += '</div>';
                                                        html += '</th>';
                                                        html += '</tr>';
                                                        html += '</thead>';
                                                        html += '</table>';
                                                    });
                                                } else {
                                                    html += '<tr><td colspan="5" style="text-align: center; font-weight: bold;">Data tidak ditemukan</td></tr>';
                                                }
                                                $('#search_results').html(html);
                                            }
                                        });
                                    } else {
                                        // Kembalikan tampilan asli tabel
                                        $('#search_results').html(originalData);
                                    }
                                });
                            });


                        </script>


                        <?php echo $this->pagination->create_links(); ?>
                        
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
