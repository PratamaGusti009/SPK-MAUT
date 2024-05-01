<!-- Content wrapper -->
<div class="content-wrapper">

            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y justify-content-between mb-4">
            
                <!-- Basic Layout -->
                <div class="col-xxl">
                  <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h5 class="mb-0">Formulir Pendaftaran</h5>
                        <a href="<?php echo base_url('Formulir/detailPenilaian'); ?>" class="btn btn-secondary btn-icon-split"><span
                            class="icon text-white-50"><i class='bx bx-left-arrow-alt' style="color: #FFFFFF;"></i></span>
                            <span class="text">Kembali</span>
                        </a>
                    </div>

                    <!-- DataTales Example -->
                        <?php if ($kriteria == null) { ?>
                            <div class="card-body">
                                <div class="alert alert-info">Data masih kosong.</div>
                            </div>
                        <?php } else { ?>

                <?php echo form_open('Penilaian/update_penilaian_public'); ?>       
                <div class="card-body">
                <input type="hidden" name="id_alternatif" value="<?php echo $user['id_alternatif']; ?>">
                <?php foreach ($kriteria as $key) { ?>
                    <?php
                    // Mengambil data sub kriteria
                    $sub_kriteria = $this->M_Penilaian->data_sub_kriteria($key->id_kriteria);
                    ?>

                    <?php if ($sub_kriteria != null) { ?>
                    <input type="hidden" name="id_kriteria[]" value="<?php echo $key->id_kriteria; ?>">

                    <?php if ($key->keterangan === 'Nilai Test') { ?>
                        <!-- Menghidden nilai test -->
                        <input type="hidden" name="nilai[]" value="<?php echo $subs_kriteria['id_sub_kriteria']; ?>">
                    <?php } else { ?>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="<?php echo $key->id_kriteria; ?>">
                                <?php echo $key->keterangan; ?>
                            </label>
                          <div class="col-sm-4">
                          <select name="nilai[]" class="form-select" id="<?php echo $key->id_kriteria; ?>">
                          <!-- <option selected>Pilih Departemen </option> -->
                                <?php
                                    foreach ($sub_kriteria as $subs_kriteria) {
                                        $s_option = $this->M_Penilaian->data_penilaian($user['id_alternatif'], $subs_kriteria['id_kriteria']);
                                        ?>
                                <option value="<?php echo $subs_kriteria['id_sub_kriteria']; ?>"
                                    <?php if ($subs_kriteria['id_sub_kriteria'] == $s_option['id_sub_kriteria']) {
                                        echo 'selected';
                                    } ?>>
                                    <?php echo $subs_kriteria['deskripsi']; ?>
                                </option>
                                <?php } ?>
                          </select>
                          </div>
                        </div>
                            <?php echo form_close(); ?>
                            <?php } ?>
                            <?php } ?>
                            <?php } ?>
                            <?php } ?>
                            <div class="row justify-content-end">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Kirim</button>
                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                </div>
                            </div>

                            </div>
                </div>
                    
