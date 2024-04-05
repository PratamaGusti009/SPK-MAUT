<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content">
        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-cube"></i> Data Alternatif</h1>
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
                    
                    <form action="<?php echo base_url('Penilaian/tambah_penilaian_public'); ?>" enctype="multipart/form-data" method="POST">
    <div class="card-body">
            <div class="alert alert-info">
                <span class="text-uppercase"><b>
                        Harap Isi Informasi Dibawah Ini Dengan Sebenar-benarnya
                    </b>
            </div>
        <input name='id_alternatif' value='<?php echo $user['id_alternatif']; ?>' type="text" hidden>
        <?php foreach ($kriteria as $item) { ?>
            <div class="form-group col-md-6">
                <?php if ($item->keterangan.' ('.$item->kode_kriteria.')' !== 'Nilai Test (C2)') { ?>
                    <label class="font-weight-bold"><?php echo $item->keterangan.' ('.$item->kode_kriteria.')'; ?></label>
                <?php } ?>
                <?php if ($item->keterangan.' ('.$item->kode_kriteria.')' !== 'Nilai Test (C2)') { ?>
                    <select name="<?php echo $item->keterangan.' ('.$item->kode_kriteria.')'; ?>" class="form-control" placeholder="Pilih Status" required>
                        <option selected value="pilih">--Pilih--</option>
                        <?php
                        $sub_kriteria1 = $this->M_Sub_Kriteria->data_sub_kriteria($item->id_kriteria);

                    foreach ($sub_kriteria1 as $key) { ?>
                            <option value="<?php echo $key['id_sub_kriteria']; ?>"><?php echo $key['deskripsi']; ?></option>
                        <?php } ?>
                    </select>
                <?php } ?>
            </div>
        <?php } ?>
        <?php foreach ($kriteria as $key) { ?>
            <?php
            $sub_kriteria = $this->M_Penilaian->data_sub_kriteria($key->id_kriteria);
            // var_dump($sub_kriteria);
            // exit;
            ?>
            <?php if ($sub_kriteria != null) { ?>
                <input type="text" name="id_kriteria[]" value="<?php echo $key->id_kriteria; ?>" hidden>
                <?php foreach ($sub_kriteria as $subs_kriteria) { ?>
                    <input type="text" name="nilai[]" value="<?php echo $subs_kriteria['id_sub_kriteria']; ?>" hidden>
                <?php } ?>
            <?php } ?>
        <?php } ?>
        <div class="card-footer text-right">
            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
            <button type="reset" class="btn btn-info"><i class="fa fa-sync-alt"></i> Reset</button>
        </div>
        
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