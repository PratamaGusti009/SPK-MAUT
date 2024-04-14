<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-edit"></i> Edit Data Formulir</h1>
                <a href="<?php echo base_url('Formulir/detail'); ?>" class="btn btn-secondary btn-icon-split"><span
                        class="icon text-white-50"><i class="fas fa-arrow-left"></i></span>
                    <span class="text">Kembali</span>
                </a>
            </div>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <form action="<?php echo base_url('Formulir/update/'.$user['id_alternatif']); ?>"
                    enctype="multipart/form-data" method="POST">
                    <div class="card-body">
                        <div class="row">

                            <div class="form-group col-md-6">
                                <fieldset disabled>
                                    <label class="font-weight-bold">Nama Lengkap</label>
                                    <input type="text" name="nama" value="<?php echo $user['nama']; ?>" required
                                        class="form-control" />
                                </fieldset>
                            </div>

                            <div class="form-group col-md-6">
                                <label class="font-weight-bold">NIK</label>
                                <input autocomplete="off" type="text" name="nik" value="<?php echo $user['nik']; ?>" required
                                    class="form-control" />
                            </div>
                            <div class="form-group col-md-6">
                                <label class="font-weight-bold">Tempat Tanggal Lahir</label>
                                <input autocomplete="off" type="text" name="ttl" value="<?php echo $user['ttl']; ?>" required
                                    class="form-control" />
                            </div>

                            <div class="form-group col-md-6">
                                <label class="font-weight-bold">Jenis Kelamin</label>
                                <select name="jenis_kelamin" class="form-control" required>
                                    <<option value="Pria" <?php if ($user['jenis_kelamin'] == 'Pria') {
                                        echo 'selected';
                                    } ?>>Pria</option>
                                        <option value="Wanita" <?php if ($user['jenis_kelamin'] == 'Wanita') {
                                            echo 'selected';
                                        } ?>>Wanita</option>
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label class="font-weight-bold">Departemen Yang Didaftar</label>
                                <select name="departemen" class="form-control" required>
                                <option selected >Pilih Departemen </option>
                                <?php foreach ($departemens as $item) { ?>
                                    <option value="<?php echo $item['id_departemen'].'|'.$item['nama_departemen']; ?>">
                                        <?php echo $item['nama_departemen']; ?>
                                    </option>
                                <?php } ?>
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <fieldset disabled>
                                    <label class="font-weight-bold">E-Mail</label>
                                    <input type="text" name="nama" value="<?php echo $user['email']; ?>" required
                                        class="form-control" />
                                </fieldset>
                            </div>

                            <div class="form-group col-md-6">
                                <label class="font-weight-bold">Nomor Telp</label>
                                <input autocomplete="off" type="text" name="no_telp" value="<?php echo $user['no_telp']; ?>"
                                    required class="form-control" />
                            </div>

                            <div class="form-group col-md-6">
                                <label class="font-weight-bold">Alamat Lengkap</label>
                                <textarea class="form-control" type="text-area" name="alamat"
                                     required class="form-control" row="10"><?php echo $user['alamat']; ?></textarea>
                            </div>

                            <div class="form-group col-md-6">
                                <label class="font-weight-bold">Unggah File</label>
                                <input type="file" name="pdf" required="" class="form-control-file" />
                                <span style="color: red;">*Unggah CV, Ijazah dan SKCK dalam satu file PDF</span>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                        <button type="reset" class="btn btn-info"><i class="fa fa-sync-alt"></i> Reset</button>
                    </div>
                </form>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->