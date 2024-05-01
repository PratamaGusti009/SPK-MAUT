<!-- Content wrapper -->
<div class="content-wrapper">

            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y justify-content-between mb-4">

            <form action="" method="post" enctype="multipart/form-data">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">Edit Profile</h5>
                    </div>
                    <div class="card-body">
                      <form>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Nama Lengkap</label>
                          <div class="col-sm-5">
                              <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $user['nama']; ?>" />
                          </div>                        
                        </div>
                        <div class="mb-6">
                          <label class="form-label" for="basic-default-email">Email</label>
                          <div class="col-sm-5">
                              <div class="input-group input-group-merge">
                                <input
                                  type="text"
                                  id="basic-default-email"
                                  class="form-control"
                                  value="<?php echo $user['email']; ?>" 
                                  aria-describedby="basic-default-email2"
                                  readonly
                                />
                              </div>
                          </div>  
                        </div>
                        <div class="form-group row">
                        <div class="mb-3">
                            <label for="formFile" class="col-sm-2 col-form-label">Gambar</label>
                            <div class="col-sm-5">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <img src="<?php echo base_url('assets/img/profile/').$user['image']; ?>" 
                                        class="image-thumbnail" width="150" height="200">
                                    </div>
                                    <div class="col-sm-8">
                                        <input class="form-control" type="file" id="formFile" id="image" name="image">
                                    </div> 
                                </div>
                            </div>
                        </div>
                     </div>
                        <button type="submit" class="btn btn-primary">Kirim</button>
                      </form>
                    </div>
                  </div>
            </form>
         </div>
</div>