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
                            <thead class="bg-primary text-white">
                                <tr align="center">
                                    <th>NIK</th>
                                    <th>Nama Karyawan</th>
                                    <th>Departemen</th>
                                    <th>Nilai Preferensi</th>
                                    <th width="15%">Ranking</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($hasil as $keys) { ?>
                                    <tr align="center">
                                        <td>
                                            <?php
                                            $data_alternatif = $this->M_Perhitungan->get_hasil_alternatif($keys->id_alternatif);
                                    echo $data_alternatif['nik'];
                                    ?>
                                        </td>
                                        <td align="left" style="padding-left: 5px;">
                                            <?php echo $data_alternatif['nama']; ?>
                                        </td>
                                        <td style="padding-left: 5px;">

                                        <?php
                                // Panggil fungsi untuk mendapatkan data departemen berdasarkan ID
                                $departemen = $this->M_Departemen->getDataDepartemenById($data_alternatif['departemen']);

                                    // Periksa apakah data departemen berhasil ditemukan
                                    if ($departemen !== null) {
                                        // Jika berhasil ditemukan, tampilkan nama departemen
                                        echo $departemen->departemen;
                                    } else {
                                        // Jika tidak ditemukan, tampilkan pesan alternatif atau kosong
                                        echo 'Departemen belum ditentukan'; // atau echo "";
                                    }
                                    ?>
                                        </td>
                                        <td>
                                            <?php echo $keys->nilai; ?>
                                        </td>
                                        <td>
                                            <?php echo $no; ?>
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