<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-edit"></i> Data Penilaian</h1>
            </div>
            <?php echo $this->session->flashdata('message'); ?>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Daftar Data Kriteria</h6>
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
                                    <th>Alternatif</th>
                                    <th width="15%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
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
                                                    <a data-toggle="modal" href="#edit<?php echo $keys['id_alternatif']; ?>"
                                                    class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                        </td>
                                    </tr>
                                    
                                    <!-- Modal -->
                                    <div class="modal fade" id="edit<?php echo $keys['id_alternatif']; ?>" tabindex="-1"
                                        role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="myModalLabel"><i class="fa fa-edit"></i>
                                                        Edit Penilaian</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-hidden="true">&times;</button>
                                                </div>
                                                <?php echo form_open('Penilaian/update_penilaian'); ?>
                                                <div class="modal-body">
                                                    <?php foreach ($kriteria as $key) { ?>
                                                    <?php
                                                        // Mengambil data sub kriteria
                                                        $sub_kriteria = $this->M_Penilaian->data_sub_kriteria($key->id_kriteria);
                                                        // var_dump($sub_kriteria);
                                                        // exit;
                                                        ?>
                                                    <?php if ($sub_kriteria != null) { ?>
                                                        <input type="text" name="id_alternatif" value="<?php echo $keys['id_alternatif']; ?>" hidden>
                                                        <input type="text" name="id_kriteria[]" value="<?php echo $key->id_kriteria; ?>" hidden>
                                                        <div class="form-group">
                                                        <label class="font-weight-bold" for="<?php echo $key->id_kriteria; ?>">
                                                            <?php echo $key->keterangan; ?>
                                                        </label>
                                                        <select <?php echo $key->keterangan !== 'Nilai Test' ? 'disabled' : ''; ?> name="nilai[]" class="form-control" id="<?php echo $key->id_kriteria; ?>" required>
                                                            <option value="">--Pilih--</option>
                                                            <?php
                                                                // Menampilkan opsi untuk setiap sub kriteria
                                                                foreach ($sub_kriteria as $subs_kriteria) { ?>
                                                                <?php
                                                                    // Mendapatkan nilai terpilih (jika ada)
                                                                    $s_option = $this->M_Penilaian->data_penilaian($keys['id_alternatif'], $subs_kriteria['id_kriteria']);
                                                                    ?>
                                                                <option value="<?php echo $subs_kriteria['id_sub_kriteria']; ?>" <?php if ($subs_kriteria['id_sub_kriteria'] == $s_option['nilai']) {
                                                                    echo 'selected';
                                                                } ?>>
                                                                <?php echo $subs_kriteria['deskripsi']; ?>
                                                                </option>
                                                            <?php } ?>
                                                        </select>
                                                        </div>
                                                    <?php } ?>
                                                    <?php } ?>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-warning" data-dismiss="modal"><i
                                                            class="fa fa-times"></i> Batal</button>
                                                    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i>
                                                        Update</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
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
        <!-- /.container-fluid -->



    </div>
    <!-- End of Main Content -->

</div>
<!-- End of Main Content -->