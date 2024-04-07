<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
              <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-user-friends"></i> Data Departemen</h1>
              <a href="<?php echo base_url('Departemen/list_departemen'); ?>" class="btn btn-secondary btn-icon-split"><span class="icon text-white-50"><i class="fas fa-arrow-left"></i></span>
              <span class="text">Kembali</span>
            </a>
          </div>
            <?php echo $this->session->flashdata('Pesan'); ?>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-fw fa-plus"></i> Tambah Data Departemen</h6>
                </div>
            <form action='' method='POST'>
            <div class="card-body">
                <div class="form-group">
                  <label for="">Nama Departemen</label>
                  <input required type="text" class="form-control" id="departemen" name="nama_departemen" placeholder="Masukkan nama departemen">
                </div>

                  <div class="form-group">
                    <label for="">Nilai Minimal</label>
                    <input required type="text" class="form-control" id="nilai_batas" name="nilai_batas" placeholder="Masukkan  nilai_batas">
                  </div>
                    <div class="form-group">
                      <label for="">Jumlah penerimaan</label>
                      <input required type="number" class="form-control" id="jumlah_penerimaan" name="jumlah_penerimaan" placeholder="Masukkan  jumlah penerimaan">
                    </div>
                    <button type="submit" class="btn btn-primary">Tambahkan</button>
              </form>
            </div>
        </div>
    </div>
</div>         