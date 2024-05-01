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
                    <div class="card-body">
                        <div class="alert alert-info">
                            <span class="text-uppercase"><b>
                                Harap Isi Informasi Dibawah Ini Dengan Sebenar-benarnya
                            </b>
                        </div>
                        
                        
                    <form action="<?php echo base_url('Penilaian/tambah_penilaian_public'); ?>" enctype="multipart/form-data" method="POST">      
                    <input type="hidden" name="id_alternatif" value="<?php echo $user['id_alternatif']; ?>">
                    <!-- Loop untuk semua kriteria -->
                    <?php foreach ($kriteria as $item) { ?>
                        <div class="row mb-3">
                            <?php if ($item->keterangan.' ('.$item->kode_kriteria.')' !== 'Nilai Test (C2)') { ?>
                                <label class="col-sm-2 col-form-label">
                                    <?php echo $item->keterangan.' ('.$item->kode_kriteria.')'; ?>
                                </label>
                            <?php } ?>

                            <div class="col-sm-4">
                                <?php if ($item->keterangan.' ('.$item->kode_kriteria.')' !== 'Nilai Test (C2)') { ?>
                                    <select name="<?php echo $item->keterangan.' ('.$item->kode_kriteria.')'; ?>" class="form-select">
                                        <option selected>Pilih Departemen </option>
                                        <?php
                                        $sub_kriteria1 = $this->M_Sub_Kriteria->data_sub_kriteria($item->id_kriteria);

                                    foreach ($sub_kriteria1 as $key) {
                                        ?>
                                            <option value="<?php echo $key['id_sub_kriteria']; ?>">
                                                <?php echo $key['deskripsi']; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                <?php } ?>
                            </div>
                        </div>
                    <?php } ?>

                    <!-- Hidden Inputs -->
                    <?php foreach ($kriteria as $key) { ?>
                        <?php
                        $sub_kriteria = $this->M_Penilaian->data_sub_kriteria($key->id_kriteria);
                        ?>

                            <?php if ($sub_kriteria != null) { ?>
                                <input type="hidden" name="id_kriteria[]" value="<?php echo $key->id_kriteria; ?>">
                           <?php foreach ($sub_kriteria as $subs_kriteria) { ?>
                                <input type="hidden" name="nilai[]" value="<?php echo $subs_kriteria['id_sub_kriteria']; ?>">
                    <?php
                           }
                            }
                    } ?>

                    <!-- Tombol Kirim dan Reset -->
                    <div class="row justify-content-end">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Kirim</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                        </div>
                    </div>
                    </form> <!-- Pastikan form ditutup di sini -->

                    
