 <!-- Content wrapper -->
<div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y justify-content-between mb-4">
            
                        <!-- Page Heading -->
                        
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tabel</span> Sub Kriteria</h4>
                            <!-- DataTales Example -->
                        <!-- <div class="card"> -->
                            <?php if ($kriteria == null) { ?>
                                <div class="card shadow mb-4">
                                    <div class="card-body">
                                        <div class="alert alert-info">
                                            <b>DATA KRITERIA KOSONG, HARAP ISI DATA KRITERIA TERLEBIH DAHULU</b>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        <?php foreach ($kriteria as $key) { ?>
                            <div class="card mb-4 mx-6">
                            <div class="card-header">
                                <div class="d-sm-flex align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-secondary"><i class="fa fa-table"></i> <?php echo $key->keterangan.' ('.$key->kode_kriteria.')'; ?></h6>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambah<?php echo $key->id_kriteria; ?>">
                                        Tambah Data
                                    </button>
                                </div>
                            </div>
                                    <!-- Modal Tambah -->
                                    <div class="modal fade" id="tambah<?php echo $key->id_kriteria; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Kriteria <?php echo $key->keterangan; ?></h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <?php echo form_open('Sub_kriteria/store'); ?>
                                            <input type="text" name="id_kriteria" value="<?php echo $key->id_kriteria; ?>" hidden>
                                            <div class="modal-body">
                                                <div class="row">
                                                <div class="col mb-3">
                                                    <label for="nameBackdrop" class="form-label">Nama Sub Kriteria</label>
                                                    <input
                                                    autocomplete="off"
                                                    type="text"
                                                    id="deskripsi"
                                                    name="deskripsi"
                                                    class="form-control"
                                                    placeholder="Masukan Nama Sub Kriteria"
                                                    required
                                                    />
                                                </div>
                                                </div>

                                                <div class="row">
                                                <div class="col mb-3">
                                                    <label for="nameBackdrop" class="form-label">Nilai</label>
                                                    <input
                                                    autocomplete="off"
                                                    type="text"
                                                    id="nilai"
                                                    name="nilai"
                                                    class="form-control"
                                                    placeholder="Masukan Nilai"
                                                    required
                                                    />
                                                </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                            <?php echo form_close(); ?>
                                            </div>
                                        </div>
                                        </div>
                                    <!-- Modal Tambah -->                            
                            
                        <!-- Tabel -->
                        <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table" id="dataTable" width="100%" cellspacing="0">
                                        <thead class="table-light">
                                            <tr align="center">						
                                                <th width="5%">No</th>
                                                <th>Nama Sub Kriteria</th>
                                                <th>Nilai</th>
                                                <th width="15%">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $sub_kriteria1 = $this->M_Sub_Kriteria->data_sub_kriteria($key->id_kriteria);
                            // var_dump($sub_kriteria1);
                            // exit;
                            $no = 1;
                            foreach ($sub_kriteria1 as $key) {
                                ?>
                                            <tr align="center">
                                                <td><?php echo $no; ?></td>
                                                <td align="left"><?php echo $key['deskripsi']; ?></td>
                                                <td><?php echo $key['nilai']; ?></td>
                                                <td>
                                                <div class="btn-group" role="group">
                                                    <a data-bs-toggle="modal" data-bs-target="#editsk<?php echo $key['id_sub_kriteria']; ?>" class="btn btn-primary"><i class="bx bx-edit" style="color: #FFFFFF;"></i></a>
                                                    <a data-bs-toggle="tooltip" type="button" class="btn btn-secondary" data-bs-toggle="modal" href="<?php echo base_url('Sub_kriteria/destroy/'.$key['id_sub_kriteria']); ?>">
                                                    <i class="bx bx-trash" style="color: #FFFFFF;"></i></a>
                                                </div>  
                                                </td>
                                            </tr>
                                            <!-- Modal Tambah -->
                                    <div class="modal fade" id="editsk<?php echo $key['id_sub_kriteria']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit <?php echo $key['deskripsi']; ?></h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <?php echo form_open('Sub_kriteria/update/'.$key['id_sub_kriteria']); ?>
                                            <?php echo form_hidden('id_sub_kriteria', $key['id_sub_kriteria']); ?>
                                            <div class="modal-body">
                                            <input type="text" name="id_kriteria" value="<?php echo $key['id_kriteria']; ?>" hidden>
                                                <div class="row">
                                                <div class="col mb-3">
                                                    <label for="nameBackdrop" class="form-label">Nama Sub Kriteria</label>
                                                    <input
                                                    autocomplete="off"
                                                    type="text"
                                                    id="deskripsi"
                                                    name="deskripsi"
                                                    class="form-control"
                                                    value="<?php echo $key['deskripsi']; ?>"
                                                    required
                                                    />
                                                </div>
                                                </div>

                                                <div class="row">
                                                <div class="col mb-3">
                                                    <label for="nameBackdrop" class="form-label">Nilai</label>
                                                    <input
                                                    autocomplete="off"
                                                    type="text"
                                                    id="nilai"
                                                    name="nilai"
                                                    class="form-control"
                                                    value="<?php echo $key['nilai']; ?>"
                                                    required
                                                    />
                                                </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                            <?php echo form_close(); ?>
                                            </div>
                                        </div>
                                        </div>
                                    <!-- Modal Tambah --> 
                                        <?php
                                ++$no;
                            }
                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <?php } ?>	  
                </div>
                                   

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->
