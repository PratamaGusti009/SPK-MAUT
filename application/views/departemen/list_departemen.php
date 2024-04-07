        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Begin Page Content -->
                    <div class="container-fluid">
                        <!-- Page Heading -->
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-user-friends"></i> Data Departemen</h1>
                            <a href="<?php echo base_url('Departemen/index'); ?>" class="btn btn-primary"> <i class="fa fa-plus"></i> Tambah Data </a>
                        </div>
                        <?php echo $this->session->flashdata('message'); ?>
                            <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Daftar Data Departemen</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr align="center">
                                        <th width="5%">No</th>
                                        <th>Nama Departemen</th>
                                        <th>Nilai Minimal</th>
                                        <th>Jumlah Penerimaan</th>
                                        <th width="15%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $no = 1;
                            foreach ($list_departemen as $data) {
                                ?>
                                    <tr align="center">
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $data['nama_departemen']; ?></td>
                                        <td><?php echo $data['nilai_batas']; ?></td>
                                        <td><?php echo $data['jumlah_penerimaan']; ?></td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a data-toggle="modal" data-target="#edit<?php echo $data['id_departemen']; ?>"  class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                                <a data-toggle="tooltip" data-placement="bottom" title="Hapus Data" href="<?php echo base_url('Departemen/destroy/'.$data['id_departemen']); ?>" onclick="return confirm ('Apakah anda yakin untuk meghapus data ini')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                            </div>
                                            </td>
                                        </tr>

                                        
                                        <!-- Modal Edit -->
                                    <div class="modal fade" id="edit<?php echo $data['id_departemen']; ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit Kriteria</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                            <div class="modal-body">
                                            <form action="<?php echo base_url('Departemen/update/'.$data['id_departemen']); ?>" method="POST">
                                                <div class="card-body">
                                                    <div class="row">
                                                        
                                                        <div class="form-group col-md-6">
                                                            <label class="font-weight-bold">Nama Departemen</label>
                                                            <input autocomplete="off" type="text" name="departemen" value="<?php echo $data['nama_departemen']; ?>" required class="form-control"/>
                                                        </div>

                                                        <div class="form-group col-md-6">
                                                            <label class="font-weight-bold">Nilai Batas</label>
                                                            <input autocomplete="off" type="text" name="nilai_batas" value="<?php echo $data['nilai_batas']; ?>" required class="form-control"/>
                                                        </div>

                                                        <div class="form-group col-md-6">
                                                            <label class="font-weight-bold">Jumlah Penerima</label>
                                                            <input autocomplete="off" type="text" name="jumlah_penerimaan" value="<?php echo $data['jumlah_penerimaan']; ?>" required class="form-control"/>
                                                        </div>
                        
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                                                    <button type="reset" class="btn btn-info"><i class="fa fa-sync-alt"></i> Reset</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    
                                        <?php
                                        ++$no;
                            }
                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                <!-- /.container-fluid -->

                   
                   
            </div>
            <!-- End of Main Content -->

        </div>
            <!-- End of Main Content -->

           