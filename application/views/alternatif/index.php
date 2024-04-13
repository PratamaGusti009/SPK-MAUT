<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-users"></i> Data Alternatif</h1>
                <!-- <a href="<?php echo base_url('alternatif/create'); ?>" class="btn btn-primary"> <i class="fa fa-plus"></i>
                    Tambah Data </a> -->
                    
            </div>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Daftar Data Alternatif</h6>
                </div>
                <div class="card-body">
                <div class="d-flex justify-content-end">
                        <form action="" method="post">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Search" id="search_input"
                                    autocomplete="off" autofocus>
                            </div>
                        </form>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr align="center">
                                    <th width="5%">No</th>
                                    <th>Nama</th>
                                    <th>NIK</th>
                                    <th>Departemen</th>
                                    <th width="15%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody  id="search_results">

                                <?php
                                $no = 1;
                foreach ($alternatif as $data) {
                    ?>

                                    <tr align="center">
                                        <td>
                                            <?php echo $no; ?>
                                        </td>
                                        <td align="center">
                                            <?php echo $data['nama']; ?>
                                        </td>
                                        <td>
                                            <?php echo $data['nik']; ?>
                                        </td>
                                        <td>
                                        <?php
                                            // Memeriksa apakah nama departemen kosong
                                            if (empty($data['nama_departemen'])) {
                                                // Jika nama departemen kosong, tampilkan teks "Departemen Belum Dipilih"
                                                echo 'Departemen Belum Dipilih';
                                            } else {
                                                // Jika nama departemen tidak kosong, tampilkan nilai nama departemen
                                                echo $data['nama_departemen'];
                                            }
                    ?>
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a data-toggle="tooltip" data-placement="bottom" title="Detail Data"
                                                    href="<?php echo base_url('Alternatif/detail/'.$data['id_alternatif']); ?>"
                                                    class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>
                                               
                                                <a data-toggle="tooltip" data-placement="bottom" title="Hapus Data"
                                                    href="<?php echo base_url('Alternatif/destroy/'.$data['id_alternatif']); ?>"
                                                    onclick="return confirm ('Apakah anda yakin untuk meghapus data ini')"
                                                    class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- Modal Edit -->

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
                                                        html += '<tr align="center">';
                                                        html += '<td>' + (index + 1) + '</td>';
                                                        html += '<td>' + value.nama + '</td>';
                                                        html += '<td>' + value.nik + '</td>';
                                                        html += '<td>' + value.nama_departemen + '</td>';
                                                        html += '<td>';
                                                        html += '<div class="btn-group" role="group">';
                                                        html += '<a data-toggle="tooltip" data-placement="bottom" title="Detail Data" href="<?php echo base_url('Alternatif/detail/'); ?>' + value.id_alternatif + '" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>';
                                                        html += '<a data-toggle="tooltip" data-placement="bottom" title="Hapus Data" href="<?php echo base_url('Alternatif/destroy/'); ?>' + value.id_alternatif + '" onclick="return confirm(\'Apakah anda yakin untuk menghapus data ini\')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>';
                                                        html += '</div>';
                                                        html += '</td>';
                                                        html += '</tr>';
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

            </div>
        </div>