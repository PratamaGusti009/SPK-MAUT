<!-- Content wrapper -->
<div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y justify-content-between mb-4">
            
                        <!-- Page Heading -->
                        
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tabel</span> Penilaian</h4>
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
                                            <th>Alternatif</th>
                                            <th width="15%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody id="search_results">
                                        <?php
                                        $no = 1;
                                        foreach ($alternatif as $keys) { ?>
                                            <tr align="center">
                                                <td>
                                                    <?php echo $no; ?>
                                                </td>
                                                <td align="center">
                                                    <?php echo $keys['nama']; ?>
                                                </td>
                                                <?php $cek_tombol = $this->M_Penilaian->untuk_tombol($keys['id_alternatif']); ?>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a data-bs-toggle="modal" data-bs-target="#edit<?php echo $keys['id_alternatif']; ?>" class="btn btn-primary"><i class="bx bx-edit" style="color: #FFFFFF;"></i></a>
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- <?php var_dump($keys['id_alternatif']); ?> -->

                                    <!-- Modal -->
                                    <div class="modal fade" id="edit<?php echo $keys['id_alternatif']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Penilaian</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                        <?php echo form_open('Penilaian/update_penilaian_admin'); ?>
                                            <?php
                                                // Mengambil kriteria yang merupakan 'Nilai Test' saja
                                                    foreach ($kriteria as $key) {
                                                        if ($key->keterangan === 'Nilai Test') {
                                                            // Bagian untuk kriteria 'Nilai Test'
                                                            $sub_kriteria = $this->M_Penilaian->data_sub_kriteria($key->id_kriteria);
                                                            $s_option = $this->M_Penilaian->data_penilaian($keys['id_alternatif'], $key->id_kriteria);

                                                            // Input hidden untuk id_alternatif dan id_kriteria
                                                            echo '<input type="hidden" name="id_alternatif" value="'.$keys['id_alternatif'].'">';
                                                            echo '<input type="hidden" name="id_kriteria" value="'.$key->id_kriteria.'">';

                                                            echo '<div class="form-group row mb-3">';
                                                            echo '<label for="'.$key->id_kriteria.'" class="col-md-4 col-form-label">'.$key->keterangan.'</label>';

                                                            // Kolom untuk input nilai
                                                            echo '<div class="col-md-4">';
                                                            $nilai = isset($s_option['nilai']) ? $s_option['nilai'] : '';
                                                            echo '<input type="text" name="nilai" class="form-control" id="'.$key->id_kriteria.'" required value="'.$nilai.'">';
                                                            echo '</div>';

                                                            // Kolom untuk menampilkan deskripsi berdasarkan id_sub_kriteria
                                                            echo '<div class="col-md-4">';
                                                            if ($s_option) {
                                                                $id_sub_kriteria = $s_option['id_sub_kriteria'];

                                                                // Inisialisasi variabel untuk menyimpan deskripsi
                                                                $deskripsi_sub_kriteria = '';

                                                                // Temukan deskripsi dari `sub_kriteria`
                                                                foreach ($sub_kriteria as $sub) {
                                                                    if ($sub['id_sub_kriteria'] == $id_sub_kriteria) {
                                                                        $deskripsi_sub_kriteria = $sub['deskripsi'];
                                                                        break;
                                                                    }
                                                                }

                                                                // Tampilkan deskripsi dari sub kriteria
                                                                echo '<input type="text" class="form-control" value="'.htmlspecialchars($deskripsi_sub_kriteria).'" readonly>';
                                                            } else {
                                                                // Jika data penilaian tidak ada, tampilkan input text kosong
                                                                echo '<input type="text" class="form-control" value="" readonly>';
                                                            }
                                                            echo '</div>';
                                                            echo '</div>'; // Tutup div form-group
                                                        } else {
                                                            // Bagian untuk kriteria yang bukan 'Nilai Test'
                                                            $sub_kriteria = $this->M_Penilaian->data_sub_kriteria($key->id_kriteria);
                                                            $s_option = $this->M_Penilaian->data_penilaian($keys['id_alternatif'], $key->id_kriteria);
                                                            echo '<div class="form-group row mb-3">';

                                                            // Label untuk kriteria
                                                            echo '<label for="'.$key->id_kriteria.'" class="col-md-4 col-form-label">'.$key->keterangan.'</label>';

                                                            // Dropdown untuk memilih sub kriteria
                                                            echo '<div class="col-md-8">';
                                                            // echo '<select name="nilai[]" class="form-control" id="'.$key->id_kriteria.'" required disabled>';

                                                            // Periksa apakah $s_option bernilai null
                                                            if ($s_option) {
                                                                // Jika ada data penilaian, ambil id_sub_kriteria dan tampilkan deskripsi yang sesuai
                                                                $id_sub_kriteria = $s_option['id_sub_kriteria'];
                                                                foreach ($sub_kriteria as $subs_kriteria) {
                                                                    if ($subs_kriteria['id_sub_kriteria'] == $id_sub_kriteria) {
                                                                        echo '<input type="text" class="form-control" value="'.htmlspecialchars($subs_kriteria['deskripsi']).'" readonly>';
                                                                        break;
                                                                    }
                                                                }
                                                            } else {
                                                                // Jika $s_option bernilai null, tampilkan input text kosong atau nilai default
                                                                echo '<input type="text" class="form-control" value="-" readonly>';
                                                            }

                                                            echo '</select>';
                                                            echo '</div>'; // Tutup kolom

                                                            echo '</div>'; // Tutup div form-group
                                                        }
                                                    }
                                            ?>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="reset" class="btn btn-secondary"><i class="fa fa-sync-alt"></i> Reset</button>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                        <?php echo form_close(); ?>
                                        </div>
                                    </div>
                                    </div>

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
                                                        html += '<td>';
                                                        html += '<div class="btn-group" role="group">';
                                                        html += '<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit' + value.id_alternatif + '">';
                                                        html += '<i class="fa fa-edit"></i> Edit';
                                                        html += '</button>';
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
        <!-- /.container-fluid -->



    </div>
    <!-- End of Main Content -->

</div>
<!-- End of Main Content -->