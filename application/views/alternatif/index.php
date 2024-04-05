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
                                <input type="text" class="form-control" placeholder="Search" name="keyword"
                                    autocomplete="off" autofocus>
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit" id="submit" name="submit"> Search
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead class="bg-primary text-white">
                                <tr align="center">
                                    <th width="5%">No</th>
                                    <th>Nama</th>
                                    <th>NIK</th>
                                    <th>Departemen</th>
                                    <th width="15%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

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
                                // Panggil fungsi untuk mendapatkan data departemen berdasarkan ID
                                $departemen = $this->M_Departemen->getDataDepartemenById($data['departemen']);

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
                                            <div class="btn-group" role="group">
                                                <a data-toggle="tooltip" data-placement="bottom" title="Detail Data"
                                                    href="<?php echo base_url('Alternatif/detail/'.$data['id_alternatif']); ?>"
                                                    class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>
                                                <!-- <a data-toggle="modal" data-target="#edit<?php echo $data['id_alternatif']; ?>"
                                                    class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a> -->
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
                        <?php echo $this->pagination->create_links(); ?>
                    </div>
                </div>

            </div>
        </div>