        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

            <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-cube"></i> Data Alternatif</h1>
                        <a href="<?= base_url('Alternatif'); ?>" class="btn btn-secondary btn-icon-split"><span class="icon text-white-50"><i class="fas fa-arrow-left"></i></span>
		                    <span class="text">Kembali</span>
	                    </a>
                    </div>
                    
                         <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-fw fa-plus"></i> Tambah Data Alternatif</h6>
                            </div>
                        <form action="<?= base_url('Alternatif/store') ?>" method="POST">
                        <div class="card-body">
                            <div class="row">
                            <div class="form-group col-md-6">
                        <label class="font-weight-bold">Keterangan</label>
                        <select name="keterangan" class="form-control" required>
                            <option value="">--Pilih Status--</option>
                            <option value="Aktif">Aktif</option>
                            <option value="Cuti">Cuti</option>						
                        </select>
                    </div>
                        <div class="form-group col-md-6">
                            <label class="font-weight-bold">Tahun</label>
                            <input autocomplete="off" type="text" name="tahun" required class="form-control"/>
                        </div>

                        <div class="form-group col-md-6">
                            <label class="font-weight-bold">NIK</label>
                            <input autocomplete="off" type="text" name="nik" required class="form-control"/>
                        </div>
                        
                        <div class="form-group col-md-6">
                            <label class="font-weight-bold">Nama</label>
                            <input autocomplete="off" type="text" name="nama" required class="form-control"/>
                        </div>
                        
                        <div class="form-group col-md-6">
                            <label class="font-weight-bold">Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-control" required>
                                <option value="">--Pilih Jenis Kelamin--</option>
                                <option value="Pria">Pria</option>
                                <option value="Wanita">Wanita</option>						
                            </select>
                        </div>
                        
                        <div class="form-group col-md-6">
                            <label class="font-weight-bold">Departemen</label>
                            <select name="departemen" class="form-control" required>
                                <option value="">--Pilih Jurusan--</option>
                                <option value="Marketing">Marketing</option>					
                                <option value="Operasional">Operasional</option>					
                                <option value="Finansial">Finansial</option>					
                            </select>
                        </div>
                        
                        <div class="form-group col-md-6">
                            <label class="font-weight-bold">E-Mail</label>
                            <input autocomplete="off" type="email" name="email" required class="form-control"/>
                        </div>
                        
                        <div class="form-group col-md-6">
                            <label class="font-weight-bold">Nomor Telp</label>
                            <input autocomplete="off" type="text" name="no_telp" required class="form-control"/>
                        </div>
                        
                        <div class="form-group col-md-12">
                            <label class="font-weight-bold">Alamat Lengkap</label>
                            <input autocomplete="off" type="text" name="alamat" required class="form-control"/>
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

           