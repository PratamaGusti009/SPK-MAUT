        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Begin Page Content -->
                    <div class="container-fluid">

                        <!-- Page Heading -->
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-plus"></i> Tambah Admin</h1>
                        <a href="<?php echo base_url('Admin/user_admin'); ?>" class="btn btn-secondary btn-icon-split"><span class="icon text-white-50"><i class="fas fa-arrow-left"></i></span>
                            <span class="text">Kembali</span>
                            </a>
                        </div>
                        <div class="card shadow mb-4">
                        <form action="<?php echo base_url('Admin/tambah_admin'); ?>" method="POST">
                        <div class="card-body">
                            <div class="row">
                                    <div class="form-group col-md-6">
                                        <label class="font-weight-bold">Nama</label>
                                        <input type="text" class="form-control form-control-user" id="name" name="name"
                                        placeholder="Full Name" value="<?php echo set_value('name'); ?>">
                                        <?php echo form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    
                                    <div class="form-group col-md-6">
                                        <label class="font-weight-bold">Email</label>
                                        <input type="text" class="form-control form-control-user" id="email" name="email"
                                        placeholder="Email Address" value="<?php echo set_value('email'); ?>">
                                        <?php echo form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    
                                    <div class="form-group col-md-6">
                                        <label class="font-weight-bold">Password</label>
                                        <input type="password" class="form-control form-control-user"
                                            id="password" name="password" placeholder="Password">
                                        <?php echo form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
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
                        

                    </div>
                <!-- /.container-fluid -->

                   
                   
            </div>
            <!-- End of Main Content -->

        </div>
            <!-- End of Main Content -->

           