<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content">
        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-cube"></i> Edit Data Alternatif</h1>
                <a href="<?php echo base_url('Formulir/detail'); ?>" class="btn btn-secondary btn-icon-split"><span class="icon text-white-50"><i class="fas fa-arrow-left"></i></span>
                    <span class="text">Kembali</span>
                </a>
            </div>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <?php if ($kriteria == null) { ?>
                    <div class="card-body">
                        <div class="alert alert-info">
                            Data masih kosong.
                        </div>
                    </div>
                <?php } else { ?>
                  
                    <!-- FORM -->
   <?php echo form_open('Penilaian/update_penilaian_public'); ?>
                                                <div class="p-3">
                                                <?php foreach ($kriteria as $key) { ?>
    <?php
    // Mengambil data sub kriteria
    $sub_kriteria = $this->M_Penilaian->data_sub_kriteria($key->id_kriteria);
                                                    // var_dump($sub_kriteria);
                                                    // exit;
                                                    ?>
    <?php if ($sub_kriteria != null) { ?>
        <input type="text" name="id_alternatif" value="<?php echo $user['id_alternatif']; ?>" hidden>
        <input type="text" name="id_kriteria[]" value="<?php echo $key->id_kriteria; ?>" hidden>
        <?php if ($key->keterangan.' ('.$key->kode_kriteria.')' !== 'Nilai Test (C2)') { ?>
            <div class="form-group">
                <label class="font-weight-bold" for="<?php echo $key->id_kriteria; ?>">
                    <?php echo $key->keterangan.' ('.$key->kode_kriteria.')'; ?> 
                </label>
                <select <?php echo $key->keterangan === 'Nilai Test' ? 'disabled' : ''; ?> name="<?php echo $key->keterangan.' ('.$key->kode_kriteria.')'; ?>" class="form-control" id="<?php echo $key->id_kriteria; ?>" required>
                    <option value="">--Pilih--</option>
                    <?php
                                                                    // Menampilkan opsi untuk setiap sub kriteria
                                                                    foreach ($sub_kriteria as $subs_kriteria) {
                                                                        // Mendapatkan nilai terpilih (jika ada)
                                                                        $s_option = $this->M_Penilaian->data_penilaian($user['id_alternatif'], $subs_kriteria['id_kriteria']);
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
<?php } ?>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-warning" data-dismiss="modal"><i
                                                            class="fa fa-times"></i> Batal</button>
                                                    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i>
                                                        Update</button>
                                                </div>
                                                </form>


                <?php } ?>
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