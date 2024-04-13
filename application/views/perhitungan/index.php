        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Begin Page Content -->
                    <div class="container-fluid">
                        <!-- Page Heading -->
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-calculator"></i> Data Perhitungan</h1>
                        </div>
                       
                            <!-- DataTales Example -->

                            <div class="card shadow mb-4">
                                <!-- /.card-header -->
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-table"></i> Bobot Kriteria</h6>
                                </div>

                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" width="100%" cellspacing="0">
                                            <thead>
                                                <tr align="center">
                                                    <?php foreach ($kriteria as $data) { ?>
                                                    <th><?php echo $data['keterangan']; ?></th>
                                                    <?php } ?>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr align="center">
                                                    <?php foreach ($kriteria as $data) { ?>
                                                    <td>
                                                    <?php
                                                    echo $data['nilai_normalisasi'];
                                                        ?>
                                                    </td>
                                                    <?php } ?>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                        </div>

                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-table"></i> Matrik Keputusan X</h6>
                            </div>
                            
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr align="center">
                                            <th width="5%">No</th>
                                            <th>Alternatif</th>
                                            <?php foreach ($kriteria as $data) { ?>
                                            <th><?php echo $data['kode_kriteria']; ?></th>
                                            <?php } ?>
                                        </tr>
                                    </thead>
                                <tbody>
                                <?php
                                    $no = 1;
                                                    foreach ($alternatif as $keys) { ?>
                                        <tr align="center">
                                            <td><?php echo $no; ?></td>
                                            <td align="left"><?php echo $keys['nama']; ?></td>
                                            <?php foreach ($kriteria as $data) { ?>
                                                <td>
                                                    <?php
                                                $data_pencocokan = $this->M_Perhitungan->data_nilai($keys['id_alternatif'], $data['id_kriteria']);
                                                // Menggunakan null coalescing operator ?? untuk memberikan nilai default '0' jika nilai tidak ditemukan
                                                echo $data_pencocokan['nilai'] ?? '-';
                                                ?>
                                                </td>
                                            <?php } ?>
                                        </tr>
                                    <?php
                                        ++$no;
                                                    }
                                                    ?>

                                    <tr align="center" class="bg-light">
                                        <th colspan="2">Nilai A+</th>
                                        <?php foreach ($kriteria as $data) { ?>
                                        <th>
                                        <?php
                                            $nilai_max = $this->M_Perhitungan->get_max_min($data['id_kriteria']);
                                            echo $nilai_max['max'];
                                            ?>
                                        </th>
                                        <?php } ?>
                                    </tr>
                                    <tr align="center" class="bg-light">
                                        <th colspan="2">Nilai A-</th>
                                        <?php foreach ($kriteria as $data) { ?>
                                        <th>
                                        <?php
                                            $nilai_min = $this->M_Perhitungan->get_max_min($data['id_kriteria']);
                                            echo $nilai_min['min'];
                                            ?>
                                        </th>
                                        <?php } ?>
                                    </tr>
                                </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="card shadow mb-4">
                                <!-- /.card-header -->
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-table"></i> Normalisasi Matrix X</h6>
                                </div>

                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" width="100%" cellspacing="0">
                                            <thead>
                                                <tr align="center">
                                                    <th width="5%">No</th>
                                                    <th>Alternatif</th>
                                                    <?php foreach ($kriteria as $data) { ?>
                                                    <th><?php echo $data['kode_kriteria']; ?></th>
                                                    <?php } ?>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                        $no = 1;
                                                    foreach ($alternatif as $keys) { ?>
                                                <tr align="center">
                                                    <td><?php echo $no; ?></td>
                                                    <td align="left"><?php echo $keys['nama']; ?></td>
                                                    <?php foreach ($kriteria as $key) { ?>
                                                    <td>
                                                    <?php

                                                    $data_pencocokan = $this->M_Perhitungan->data_nilai($keys['id_alternatif'], $key['id_kriteria']);
                                                        $min_max = $this->M_Perhitungan->get_max_min($key['id_kriteria']);
                                                        $hasil = @round(($data_pencocokan['nilai'] - $min_max['min']) / ($min_max['max'] - $min_max['min']), 2);
                                                        echo $hasil;
                                                        ?>
                                                    </td>
                                                    <?php }?>
                                                </tr>
                                                
                                                <?php
                                                        ++$no;
                                                    } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                        </div>

                        <div class="card shadow mb-4">
                                <!-- /.card-header -->
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-table"></i> Perkalian Matrik Normalisasi Dengan Bobot Kriteria</h6>
                                </div>

                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" width="100%" cellspacing="0">
                                            <thead>
                                                <tr align="center">
                                                    <th width="5%">No</th>
                                                    <th>Nama Alternatif</th>
                                                    <th>Perhitungan</th>
                                                    <th>Total Nilai Preferensi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $this->M_Perhitungan->hapus_hasil();
                                                    $no = 1;
                                                    foreach ($alternatif as $keys) { ?>
                                                <tr align="center">
                                                    <td><?php echo $no; ?></td>
                                                    <td align="left"><?php echo $keys['nama']; ?></td>
                                                    <td>SUM
                                                    <?php
                                                    $nilai_total = 0;
                                                        foreach ($kriteria as $data) {
                                                            $data_pencocokan = $this->M_Perhitungan->data_nilai($keys['id_alternatif'], $data['id_kriteria']);
                                                            $min_max = $this->M_Perhitungan->get_max_min($data['id_kriteria']);
                                                            $data_pencocokan = $this->M_Perhitungan->data_nilai($keys['id_alternatif'], $data['id_kriteria']);
                                                            $min_max = $this->M_Perhitungan->get_max_min($data['id_kriteria']);
                                                            // Periksa apakah penyebut (denominator) pembagian tidak nol
                                                            $denominator = ($min_max['max'] - $min_max['min']);
                                                            if ($denominator != 0) {
                                                                $hasil_normalisasi = @round(($data_pencocokan['nilai'] - $min_max['min']) / $denominator, 4);
                                                            } else {
                                                                // Lakukan tindakan yang sesuai jika pembagian dengan nol terjadi
                                                                $hasil_normalisasi = 0; // Atau atur nilai lain sesuai kebutuhan
                                                            }

                                                            $bobot = $data['nilai_normalisasi'];
                                                            $nilai_total += $bobot * $hasil_normalisasi;

                                                            echo '('.$bobot.'x'.$hasil_normalisasi.') ';
                                                        }
                                                        $hasil_akhir = [
                                                            'id_alternatif' => $keys['id_alternatif'],
                                                            'nilai' => $nilai_total,
                                                        ];
                                                        $result = $this->M_Perhitungan->insert_nilai_hasil($hasil_akhir);
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $nilai_total; ?>
                                                    </td>
                                                </tr>
                                                
                                                <?php
                                                        ++$no;
                                                    } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                        </div>