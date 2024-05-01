       <!-- Content wrapper -->
<div class="content-wrapper">

<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y justify-content-between mb-4">

            <!-- Page Heading -->
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tabel</span> Admin</h4>
                
            <!-- DataTales Example -->
            <div class="card">
                <h5 class="card-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            Daftar Admin
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
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th width="15%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                            $no = 1;
                                    foreach ($admin as $data) {
                                        ?>
                                    <tr align="center">
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $data['nama']; ?></td>
                                        <td><?php echo $data['email']; ?></td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a data-bs-toggle="tooltip" type="button" class="btn btn-secondary" onclick="confirmDeletion('<?php echo base_url('Admin/destroy/'.$data['id']); ?>')">
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
                                            <?php echo form_open('Admin/tambah_admin'); ?>
                                            <div class="modal-body">
                                                <div class="row">
                                                <div class="col mb-3">
                                                    <label for="nameBackdrop" class="form-label">Nama Panjang</label>
                                                    <input
                                                    autocomplete="off"
                                                    type="text"
                                                    id="name"
                                                    name="name"
                                                    class="form-control"
                                                    placeholder="Masukan Nama Panjang"
                                                    required
                                                    />
                                                </div>
                                                </div>
                                                <div class="row g-2">
                                                    <div class="col mb-0">
                                                        <label for="nameBackdrop" class="form-label">Email</label>
                                                        <input
                                                        autocomplete="off"
                                                        type="text"
                                                        id="email"
                                                        name="email"
                                                        class="form-control"
                                                        placeholder="Masukan Email"
                                                        required
                                                        />
                                                    </div>
                                                    <div class="col mb-0 form-password-toggle">
                                                        <label class="form-label" for="password">Password</label>
                                                        <div class="input-group input-group-merge">
                                                            <input
                                                            type="password"
                                                            id="password"
                                                            name="password"
                                                            class="form-control"
                                                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                                            aria-describedby="password"
                                                            >
                                                            <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                                        </div>
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

                                    
                                        <?php
                                                ++$no;
                                    }
                                    ?>
                                        </tbody>                                   
                                    </table>
                                </div>              
                    </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
        </div>
            <!-- End of Main Content -->
                        