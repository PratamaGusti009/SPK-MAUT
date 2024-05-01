<!-- Content wrapper -->
<div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y justify-content-between mb-4">
            
            <div class="d-sm-flex align-items-center justify-content-end mb-4"><!-- Cetak nilai session -->
                <?php
                    $isInput = $this->M_Penilaian->is_input_penilaian($user['id_alternatif']);
                // var_dump($isInput);
                $buttonText = ($isInput !== null) ? 'Edit Data penilaian' : 'Isi Data penilaian';
                $link = ($isInput !== null) ? 'Formulir/Edit_Penilaian' : 'Formulir/tambahPenilaian';
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
                        Lengkapi Informasi
                            </b></span> Anda dengan benar
                    
                    </div>
                    <div class="table-responsive">

                            <ul class="list-group d-flex">
                        
                                <?php foreach ($kriteria as $key) { ?>
                                    <?php
                                        // Mengambil data sub kriteria
                                        $sub_kriteria = $this->M_Penilaian->data_sub_kriteria($key->id_kriteria);
                                    ?>
                                    <?php if ($sub_kriteria != null) { ?>
                                        <?php if ($key->keterangan.' ('.$key->kode_kriteria.')' !== 'Nilai Test (C2)') { ?>
                                            <div class="py-2">
                                                    <li class="list-group-item font-weight-bold"><?php echo $key->keterangan.' ('.$key->kode_kriteria.')'; ?></li>
                                                    <li class="list-group-item">
                                                        <?php $ada_data = false; ?>
                                                        <?php foreach ($sub_kriteria as $subs_kriteria) { ?>
                                                            <?php
                                                            // Mendapatkan nilai terpilih (jika ada)
                                                            $s_option = $this->M_Penilaian->data_penilaian($user['id_alternatif'], $subs_kriteria['id_kriteria']);
                                                            ?>
                                                            <?php if (!empty($s_option['id_sub_kriteria']) && $subs_kriteria['id_sub_kriteria'] == $s_option['id_sub_kriteria']) { ?>
                                                                <?php echo $subs_kriteria['deskripsi']; ?><br>
                                                                <?php $ada_data = true; ?>
                                                            <?php } ?>
                                                        <?php } ?>

                                                        <?php if (!$ada_data) { ?>
                                                            Belum ada data<br>
                                                        <?php } ?>
                                                    </li>
                                                </div>
                                            <?php } ?>
                                        <?php } ?>
                                    <?php } ?>
                            </ul>
            

         </div>
    </div>
</div>