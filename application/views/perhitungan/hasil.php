<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y justify-content-between mb-4">
        <!-- Page Heading -->
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Hasil</span> Akhir</h4>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Daftar Departemen</h6>
                            </div>
                            <table class="table">
                                    <thead class="table-light">
                                        <tr align="center">
                                        <th width="15%">Nama</th>
                                        <th>Departemen</th>
                                        <th>Nilai Preferensi</th>
                                        <th width="15%">Ranking</th>
                                        <th width="15%">Status</th>
                                        <th width="15%">Aksi</th>
                                    </tr>
                                </thead>
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
                                                echo "<button type='submit' name='status' value='1' class='btn btn-primary me-6'><i class='bx bx-check' style='color: #FFFFFF;'></i></button>";
                                                echo "<button type='submit' name='status' value='0' class='btn btn-secondary'><i class='bx bx-x' style='color: #FFFFFF;'></i></button>";
                                                echo '</form>';
                                            } elseif ($data_alternatif['status'] == 1) {
                                                // Jika status 1, tampilkan tombol Tolak
                                                echo "<form action='updateStatus' method='POST'>";
                                                echo "<input type='hidden' name='id_alternatif' value='{$data_alternatif['id_alternatif']}'>";
                                                echo "<button type='submit' name='status' value='0' class='btn btn-secondary'><i class='bx bx-x' style='color: #FFFFFF;'></i></button>";
                                                echo '</form>';
                                            } elseif ($data_alternatif['status'] == 0) {
                                                // Jika status 0, tampilkan tombol Terima
                                                echo "<form action='updateStatus' method='POST'>";
                                                echo "<input type='hidden' name='id_alternatif' value='{$data_alternatif['id_alternatif']}'>";
                                                echo "<button type='submit' name='status' value='1' class='btn btn-primary me-6'><i class='bx bx-check' style='color: #FFFFFF;'></i></button>";
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
            
                            <!-- <tfoot align="center">
                                <th colspan="2">Total</th>
                                <th colspan="2"></th>
                                <th colspan="2"></th>
                            </tfoot> -->
                        </table>
                    </div>
                                    <!-- Departemen -->
                                    
                                        <div class="card shadow mb-4">
                                            <table class="table">
                                                    <thead class="table-light">
                                                        <tr align="center">
                                                        <th>Nama Departemen</th>
                                                        <th>Nilai Minimal</th>
                                                        <th>Jumlah Penerimaan</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                    foreach ($list_departemen as $data) {
                                                ?>
                                                <tr align="center">
                                                    <td><?php echo $data['nama_departemen']; ?></td>
                                                    <td><?php echo $data['nilai_batas']; ?></td>
                                                    <td><?php echo $data['jumlah_penerimaan']; ?></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                         </div>
                    </div>
                </div>
                <?php
                    }
                ?>
            </div>
        </div>
    </div>
    </div>
   
</div>