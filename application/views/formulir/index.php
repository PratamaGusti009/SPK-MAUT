<!-- Content wrapper -->
<div class="content-wrapper">

            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y justify-content-between mb-4">
            
                <!-- Basic Layout -->
                <div class="col-xxl">
                  <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h5 class="mb-0">Formulir Pendaftaran</h5>
                        <a href="<?php echo base_url('Formulir/detail'); ?>" class="btn btn-secondary btn-icon-split"><span
                            class="icon text-white-50"><i class='bx bx-left-arrow-alt' style="color: #FFFFFF;"></i></span>
                            <span class="text">Kembali</span>
                        </a>
                    </div>
                    <div class="card-body">
                    <form action="<?php echo base_url('Formulir/update/'.$user['id_alternatif']); ?>"
                        enctype="multipart/form-data" method="POST">
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label">Nama Lengkap</label>
                          <div class="col-sm-4">
                            <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $user['nama']; ?>" disabled required />
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label">NIK</label>
                          <div class="col-sm-4">
                            <input
                              type="number"
                              class="form-control"
                              name="nik"
                              id="nik"
                              minlength="16" maxlength="16"
                              placeholder="Masukan 16 Digit NIK"
                              required
                            />
                            <div class="form-text">Masukan 16 Digit NIK</div>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label">Email</label>
                          <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                              <input
                                type="text"
                                id="email"
                                class="form-control"
                                value="<?php echo $user['email']; ?>" 
                                aria-describedby="basic-default-email2"
                                disabled 
                                required
                              />
                            </div>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" >Tempat Tanggal Lahir</label>
                          <div class="col-sm-10">
                            <input
                              type="text"
                              id="ttl"
                              name="ttl"
                              class="form-control"
                              placeholder="Jakarta, 00 Agustus 00"
                            />
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" >Jenis Kelamin</label>
                          <div class="col-sm-4">
                          <select id="jenis_kelamin" name="jenis_kelamin" class="form-select">
                                <option>Pilih Jenis Kelamin</option>
                                <option>Pria</option>
                                <option>Wanita</option>
                          </select>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" >Departemen</label>
                          <div class="col-sm-4">
                          <select id="departemen" name="departemen" class="form-select">
                          <option selected>Pilih Departemen </option>
                                <?php foreach ($departemens as $item) { ?>
                                    <option value="<?php echo $item['id_departemen'].'|'.$item['nama_departemen']; ?>">
                                        <?php echo $item['nama_departemen']; ?>
                          </option>
                                <?php } ?>
                          </select>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" >Nomor Telpon</label>
                          <div class="col-sm-4">
                          <input
                            type="number"
                            id="no_telp"
                            name="no_telp"
                            minlength="11" maxlength="12"
                            class="form-control phone-mask"
                            placeholder="08XX XXXXX XXXXX"
                            aria-describedby="basic-icon-default-phone2"
                              />
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-message">Alamat</label>
                          <div class="col-sm-10">
                            <textarea
                              id="alamat"
                              name="alamat"
                              class="form-control"
                              placeholder="Masukan Alamat"
                              aria-describedby="basic-icon-default-message2"
                            ></textarea>
                          </div>
                        </div>
                        <div class="row mb-3">
                            <label for="formFile" class="col-sm-2 col-form-label">Unggah File</label>
                            <div class="col-sm-4">
                                <input class="form-control" type="file" id="formFile" name="pdf" />
                                <div class="form-text">Unggah CV, Ijazah dan SKCK dalam satu file PDF</div>
                            </div>
                        </div>
                        <div class="row justify-content-end">
                          <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Kirim</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>

