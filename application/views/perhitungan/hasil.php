<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-chart-area"></i> Data Hasil Akhir</h1>
            </div>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-chart-area"></i> Hasil Akhir
                    </h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead class=>
                                <tr align="center">
                                    <!-- <th>NIK</th> -->
                                    <th>Nama Calon Karyawan</th>
                                    <th>Departemen</th>
                                    <th>Nilai Preferensi</th>
                                    <th width="15%">Ranking</th>
                                    <th width="15%">Status</th>
                                    <th width="15%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($hasil as $keys) { ?>
                                    <tr align="center">
                                        
                                            <?php
                                            $data_alternatif = $this->M_Perhitungan->get_hasil_alternatif($keys->id_alternatif);
                                    // echo $data_alternatif['nik'];
                                    ?>
                                        
                                        <td align="center" style="padding-left: 5px;">
                                            <?php echo $data_alternatif['nama']; ?>
                                        </td>
                                        <td style="padding-left: 5px;">
                                        <?php echo $data_alternatif['nama_departemen']; ?>
                                        </td>
                                        <td>
                                            <?php echo $keys->nilai; ?>
                                        </td>
                                        <td>
                                            <?php echo $no; ?>
                                        </td>
                                        <td>
                                            <?php
                                            // Memeriksa nilai $data_alternatif['status']
                                            if (is_null($data_alternatif['status'])) {
                                                // Jika status null, tampilkan pesan "Belum dinilai" dengan gaya latar belakang abu-abu dan teks putih
                                                echo 'Belum dinilai';
                                            } elseif ($data_alternatif['status'] == 1) {
                                                // Jika status 1, tampilkan pesan "Lulus" dengan gaya latar belakang hijau dan teks putih
                                                echo 'Lulus';
                                            } elseif ($data_alternatif['status'] == 0) {
                                                // Jika status 0, tampilkan pesan "Belum lulus" dengan gaya latar belakang merah dan teks putih
                                                echo 'Tidak Lulus';
                                            }
                                    ?>
                                        </td>

                                        <td class='d-flex justify-content-center'>
                                            <?php
                                            // Memeriksa nilai $data_alternatif['status']
                                            if (is_null($data_alternatif['status'])) {
                                                // Jika status null, tampilkan dua tombol untuk memilih antara Terima atau Tolak
                                                echo "<form action='updateStatus' method='POST'>";
                                                echo "<input type='hidden' name='id_alternatif' value='{$data_alternatif['id_alternatif']}'>";
                                                echo "<button type='submit' name='status' value='1' class='btn btn-success me-6'>Terima</button>";
                                                echo "<button type='submit' name='status' value='0' class='btn btn-danger'>Tolak</button>";
                                                echo '</form>';
                                            } elseif ($data_alternatif['status'] == 1) {
                                                // Jika status 1, tampilkan tombol Tolak
                                                echo "<form action='updateStatus' method='POST'>";
                                                echo "<input type='hidden' name='id_alternatif' value='{$data_alternatif['id_alternatif']}'>";
                                                echo "<button type='submit' name='status' value='0' class='btn btn-danger'>Tolak</button>";
                                                echo '</form>';
                                            } elseif ($data_alternatif['status'] == 0) {
                                                // Jika status 0, tampilkan tombol Terima
                                                echo "<form action='updateStatus' method='POST'>";
                                                echo "<input type='hidden' name='id_alternatif' value='{$data_alternatif['id_alternatif']}'>";
                                                echo "<button type='submit' name='status' value='1' class='btn btn-success'>Terima</button>";
                                                echo '</form>';
                                            }
                                    ?>
                                        </td>

                                    </tr>
                                    <?php
                                                                                                                                                                            ++$no;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>