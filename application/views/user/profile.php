<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-user"></i> My Profile</h1>
                <a href="<?php echo base_url('User/index'); ?>" class="btn btn-secondary btn-icon-split"><span
                        class="icon text-white-50"><i class="fas fa-arrow-left"></i></span>
                    <span class="text">Kembali</span>
                </a>
            </div>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <form action="<?php echo base_url('Formulir/update/'.$user['id_alternatif']); ?>" method="POST">
                    <div class="card-body">
                        <div class="row">

                            <div class="form-group col-md-6">
                                <fieldset disabled>
                                    <label class="font-weight-bold">E-Mail</label>
                                    <input type="text" name="email" value="<?php echo $user['email']; ?>" required
                                        class="form-control" />
                                </fieldset>
                            </div>

                            <div class="form-group col-md-6">
                                <label class="font-weight-bold">Ubah Password</label>
                                <input type="password" class="form-control form-control-user" id="password"
                                    name="password">
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