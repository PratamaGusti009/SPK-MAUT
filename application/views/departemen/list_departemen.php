
<!-- Content wrapper -->
<div class="content-wrapper">

            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y justify-content-between mb-4">
            
                        <!-- Page Heading -->
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tabel</span> Departemen</h4>
                            
                        <!-- DataTales Example -->
                        <div class="card">
                            <h5 class="card-header">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                        Daftar Departemen
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambah">
                                                Tambah
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </h5>
                            
                            <div class="table-responsive text-nowrap">
                            <table class="table">
                                <thead class="table-light">
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
                                                <a data-bs-toggle="modal" data-bs-target="#edit<?php echo $data['id_departemen']; ?>" class="btn btn-primary"><i class="bx bx-edit" style="color: #FFFFFF;"></i></a>
                                                <a data-bs-toggle="tooltip" type="button" class="btn btn-secondary" data-bs-toggle="modal" onclick="confirmDeletion('<?php echo base_url('Departemen/destroy/'.$data['id_departemen']); ?>')">
    <i                                          class="bx bx-trash" style="color: #FFFFFF;"></i></a>
                                            </div>
                                            </td>
                                        </tr>
                                        
                                        <!-- Modal Tambah-->
                                        <div class="modal fade" id="tambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Departemen</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <?php echo form_open('Departemen/tambah'); ?>
                                            <div class="modal-body">
                                                <div class="row">
                                                <div class="col mb-3">
                                                    <label for="nameBackdrop" class="form-label">Nama Departemen</label>
                                                    <input
                                                    autocomplete="off"
                                                    type="text"
                                                    id="nama_departemen"
                                                    name="nama_departemen"
                                                    class="form-control"
                                                    placeholder="Masukan Nama Departemen"
                                                    required
                                                    />
                                                </div>
                                                </div>
                                                <div class="row g-2">
                                                    <div class="col mb-0">
                                                        <label for="nameBackdrop" class="form-label">Nilai Minimal</label>
                                                        <input
                                                        autocomplete="off"
                                                        type="text"
                                                        id="nilai_batas"
                                                        name="nilai_batas"
                                                        class="form-control"
                                                        placeholder="Masukan Nilai"
                                                        required
                                                        />
                                                    </div>
                                                    <div class="col mb-0">
                                                        <label for="dobBackdrop" class="form-label">Jumlah Penerimaan</label>
                                                        <input
                                                        autocomplete="off"
                                                        type="text"
                                                        id="jumlah_penerimaan"
                                                        name="jumlah_penerimaan"
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
                                    <div class="modal fade" id="edit<?php echo $data['id_departemen']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Departemen</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                            <form action="<?php echo base_url('Departemen/update/'.$data['id_departemen']); ?>" method="POST">
                                            <div class="modal-body">
                                                <div class="row">
                                                <div class="col mb-3">
                                                    <label for="nameBackdrop" class="form-label">Nama Departemen</label>
                                                    <input
                                                    autocomplete="off"
                                                    type="text"
                                                    id="nama_departemen"
                                                    name="nama_departemen"
                                                    value="<?php echo $data['nama_departemen']; ?>"
                                                    class="form-control"
                                                    required
                                                    />
                                                </div>
                                                </div>
                                                <div class="row g-2">
                                                    <div class="col mb-0">
                                                        <label for="nameBackdrop" class="form-label">Nilai Minimal</label>
                                                        <input
                                                        autocomplete="off"
                                                        type="text"
                                                        id="nilai_batas"
                                                        name="nilai_batas"
                                                        value="<?php echo $data['nilai_batas']; ?>"
                                                        class="form-control"
                                                        required
                                                        />
                                                    </div>
                                                    <div class="col mb-0">
                                                        <label for="dobBackdrop" class="form-label">Jumlah Penerimaan</label>
                                                        <input
                                                        autocomplete="off"
                                                        type="text"
                                                        id="jumlah_penerimaan"
                                                        name="jumlah_penerimaan"
                                                        value="<?php echo $data['jumlah_penerimaan']; ?>"
                                                        class="form-control"
                                                        required
                                                        />
                                                    </div>
                                                </div>
                                            </div>
                                                <div class="modal-footer">
                                                    <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Reset</button>
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

           