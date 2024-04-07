<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-end mb-4"><!-- Cetak nilai session -->
                <?php
                $buttonText = !empty($user['nik']) ? 'Edit Data' : 'Lengkapi Data Pribadi';
                $link = !empty($user['nik']) ? 'Formulir/edit' : 'Formulir/index';
                ?>

                <a href="<?php echo base_url($link); ?>" class="btn btn-primary">
                    <i class="fa fa-edit"></i>
                    <?php echo $buttonText; ?>
                </a>

            </div>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="alert alert-info">
                        <span class="text-uppercase"><b>
                                Lengkapi Data
                            </b></span> Anda dengan benar dan harap unggah dokumen sesuai dengan ketentuan
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <th>Nama Lengkap</th>
                                    <td>
                                        <?php echo $user['nama']; ?>
                                    </td>
                                </tr>

                                <tr>
                                    <th>NIK</th>
                                    <td>
                                        <?php echo $user['nik']; ?>
                                    </td>
                                </tr>

                                <tr>
                                    <th>Tempat Tanggal Lahir</th>
                                    <td>
                                        <?php echo $user['ttl']; ?>
                                    </td>
                                </tr>

                                <tr>
                                    <th>Jenis Kelamin</th>
                                    <td>
                                        <?php echo $user['jenis_kelamin']; ?>
                                    </td>
                                </tr>

                    
                                <tr>
                                    <th>Departemen</th>
                                    <td>
                                        <?php
                                        // Periksa apakah data departemen berhasil ditemukan dan tidak kosong
                                        if ($user !== null && isset($user['nama_departemen']) && !empty($user['nama_departemen'])) {
                                            // Jika berhasil ditemukan dan tidak kosong, tampilkan nama departemen
                                            echo $user['nama_departemen'];
                                        } else {
                                            // Jika tidak ditemukan atau kosong, tampilkan pesan alternatif
                                            echo 'Departemen tidak ditemukan';
                                        }
                ?>
                                    </td>

                                </tr>

                                <tr>
                                    <th>E-Mail</th>
                                    <td>
                                        <?php echo $user['email']; ?>
                                    </td>
                                </tr>

                                <tr>
                                    <th>No Telp</th>
                                    <td>
                                        <?php echo $user['no_telp']; ?>
                                    </td>
                                </tr>

                                <tr>
                                    <th>Alamat</th>
                                    <td>
                                        <?php echo $user['alamat']; ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>