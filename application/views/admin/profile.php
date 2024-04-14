<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

<!-- Main Content -->
<div id="content">

    <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-users-cog"></i> Profile</h1>
            </div>
            <?php if ($this->session->flashdata('success')) { ?>
                <div class="alert alert-success">
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
            <?php } ?>

            <?php if ($this->session->flashdata('error')) { ?>
                <div class="alert alert-danger">
                    <?php echo $this->session->flashdata('error'); ?>
                </div>
            <?php } ?>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group row">
                    <label for="email" class="col-sm-1 col-form-label">Email</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="email" name="email"
                        value="<?php echo $user['email']; ?>" readonly>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="nama" class="col-sm-1 col-form-label">Nama</label>
                    <div class="col-sm-5">
                    <input type="text" class="form-control" id="nama" name="nama"
                    value="<?php echo $user['nama']; ?>">
                    <?php echo form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-1">Gambar</div>
                    <div class="col-sm-5">
                        <div class="row">
                            <div class="col-sm-6">
                                <img src="<?php echo base_url('assets/img/profile/').$user['image']; ?>" 
                                class="image-thumbnail" width="200" height="200">
                            </div>
                            <div class="col-sm-6">
                                <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image" name="image">
                                    <label class="custom-file-label" for="image">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </div>
            </form>