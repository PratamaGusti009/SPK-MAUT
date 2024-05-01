



<!-- Content wrapper -->
<div class="content-wrapper">

            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y justify-content-between mb-4">
            
                        <!-- Page Heading -->
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tabel</span> Kriteria</h4>
                            
                        <!-- DataTales Example -->
                        <div class="card">
                            <h5 class="card-header">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                        Daftar Kriteria
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambah">
                                                Tambah
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </h5>
                            
                           
                            <table class="table">
                                <thead class="table-light">
                                    <tr align="center">
                                        <th width="5%">No</th>
                                        <th>Kode Kriteria</th>
                                        <th>Nama Kriteria</th>
                                        <th>Bobot</th>
                                        <th>Hasil Normalisasi</th>
                                        <th width="15%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                            $no = 1;
                                    foreach ($_kriteria as $data) {
                                        ?>
                                    <tr align="center">
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $data['kode_kriteria']; ?></td>
                                        <td><?php echo $data['keterangan']; ?></td>
                                        <td><?php echo $data['bobot']; ?></td>
                                        <td><?php echo $data['nilai_normalisasi']; ?></td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a data-bs-toggle="modal" data-bs-target="#edit<?php echo $data['id_kriteria']; ?>" class="btn btn-primary"><i class="bx bx-edit" style="color: #FFFFFF;"></i></a>
                                                <a data-bs-toggle="tooltip" type="button" class="btn btn-secondary" onclick="confirmDeletion('<?php echo base_url('Syarat/destroy/'.$data['id_kriteria']); ?>')">
                                                <i class="bx bx-trash" style="color: #FFFFFF;"></i></a>
                                            </div>
                                            </td>
                                        </tr>
                                        
                                        
                                        <!-- Modal Tambah-->
                                        <div class="modal fade" id="tambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Kriteria</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <?php echo form_open('Syarat/tambah'); ?>
                                            <div class="modal-body">
                                                <div class="row">
                                                <div class="col mb-3">
                                                    <label for="nameBackdrop" class="form-label">Nama kriteria</label>
                                                    <input
                                                    autocomplete="off"
                                                    type="text"
                                                    id="nama_kriteria"
                                                    name="nama_kriteria"
                                                    class="form-control"
                                                    placeholder="Masukan Nama Kriteria"
                                                    required
                                                    />
                                                </div>
                                                </div>
                                                <div class="row g-2">
                                                    <div class="col mb-0">
                                                        <label for="nameBackdrop" class="form-label">Kode Departemen</label>
                                                        <input
                                                        autocomplete="off"
                                                        type="text"
                                                        id="kode_kriteria"
                                                        name="kode_kriteria"
                                                        class="form-control"
                                                        placeholder="Masukan Kode Departemen"
                                                        required
                                                        />
                                                    </div>
                                                    <div class="col mb-0">
                                                        <label for="dobBackdrop" class="form-label">Bobot</label>
                                                        <input
                                                        autocomplete="off"
                                                        type="text"
                                                        id="bobot"
                                                        name="bobot"
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

                                        
                                        <!-- Modal Edit -->
                                        <div class="modal fade" id="edit<?php echo $data['id_kriteria']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Kriteria</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                            <form action="<?php echo base_url('Syarat/update/'.$data['id_kriteria']); ?>" method="POST">
                                                <div class="modal-body">
                                                <div class="row">
                                                <div class="col mb-3">
                                                    <label for="nameBackdrop" class="form-label">Nama kriteria</label>
                                                    <input
                                                    autocomplete="off"
                                                    type="text"
                                                    id="nama_kriteria"
                                                    name="nama_kriteria"
                                                    value="<?php echo $data['keterangan']; ?>"
                                                    class="form-control"
                                                    placeholder="Masukan Nama Kriteria"
                                                    required
                                                    />
                                                </div>
                                                </div>
                                                <div class="row g-2">
                                                    <div class="col mb-0">
                                                        <label for="nameBackdrop" class="form-label">Kode Departemen</label>
                                                        <input
                                                        autocomplete="off"
                                                        type="text"
                                                        id="kode_kriteria"
                                                        name="kode_kriteria"
                                                        value="<?php echo $data['kode_kriteria']; ?>"
                                                        class="form-control"
                                                        placeholder="Masukan Kode Departemen"
                                                        required
                                                        />
                                                    </div>
                                                    <div class="col mb-0">
                                                        <label for="dobBackdrop" class="form-label">Bobot</label>
                                                        <input
                                                        autocomplete="off"
                                                        type="text"
                                                        id="bobot"
                                                        name="bobot"
                                                        value="<?php echo $data['bobot']; ?>"
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

                                                
                                            </form>
                                        </div>
                                    </div>
                                    
                                        <?php
                                                ++$no;
                                    }
                                    ?>
                                        </tbody>
                                        <tfoot align="center">
                                            <th width="5%" colspan="3">Total</th>
                                            <th><?php echo $total; ?></th>
                                            <th>ΣW = <?php echo $total_nilai_normalisasi; ?></th>
                                            <th width="15%"></th>
                                        </tfoot>
                                    </table>
                                </div>              


                        

                    </div>
                <!-- /.container-fluid -->

                   
                   
            </div>
            <!-- End of Main Content -->

        </div>
            <!-- End of Main Content -->

           