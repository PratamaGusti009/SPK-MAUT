<!-- Content wrapper -->
<div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y justify-content-between mb-4">
            
                        <!-- Page Heading -->
                        <div class="d-sm-flex align-items-center justify-content-between">
                        	<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Detail Alternatif/</span> Pelamar</h4>
							<a href="<?php echo base_url('Alternatif/index'); ?>" class="btn btn-secondary"><i class="bx bx-arrow-back" style="color: #FFFFFF;"></i>
								<span class="text">Kembali</span>
            				</a>
						</div>
                        
                        <!-- Tabel -->
                        <div class="card">
                        <h5 class="card-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    Data Pelamar
                                </div>
                            </div>
                        </h5>
				<div class="card-body">
					<div class="table-responsive text-nowrap">
						<table class="table table-striped">
							<tr>
								<th>Nama Lengkap</th>
								<td>
									<?php echo $alternatif->nama; ?>
								</td>
							</tr>

							<tr>
								<th>NIK</th>
								<td>
									<?php echo $alternatif->nik; ?>
								</td>
							</tr>

							<tr>
								<th>Tempat Tanggal Lahir</th>
								<td>
									<?php echo $alternatif->ttl; ?>
								</td>
							</tr>

							<tr>
								<th>Jenis Kelamin</th>
								<td>
									<?php echo $alternatif->jenis_kelamin; ?>
								</td>
							</tr>

							<tr>
								<th>Departemen</th>
								<td>
									<?php
                                    // Memeriksa apakah nama departemen kosong
                                    if (empty($alternatif->nama_departemen)) {
                                        // Jika nama departemen kosong, tampilkan teks "Departemen Belum Dipilih"
                                        echo 'Departemen Belum Dipilih';
                                    } else {
                                        // Jika nama departemen tidak kosong, tampilkan nilai nama departemen
                                        echo $alternatif->nama_departemen;
                                    }
							?>
								</td>
							</tr>


							<tr>
								<th>E-Mail</th>
								<td>
									<?php echo $alternatif->email; ?>
								</td>
							</tr>

							<tr>
								<th>No Telp</th>
								<td>
									<?php echo $alternatif->no_telp; ?>
								</td>
							</tr>

							<tr>
								<th>Alamat</th>
								<td>
									<?php echo $alternatif->alamat; ?>
								</td>
							</tr>

							<tr>
								<th>Gambar</th>
								<td>
									<?php if (!empty($alternatif->image)) { ?>
										<img src="<?php echo base_url('assets/img/profile/').$alternatif->image; ?>" class="img-thumbnail" width="200" height="200">
									<?php } else { ?>
										<p>Tidak Ada Gambar</p>
									<?php } ?>
								</td>
							</tr>

							<tr>
								<th style="display: inline-block; vertical-align: top; margin-right: 10px;">Berkas</th>
								<td>
									<?php if (!empty($alternatif->file)) { ?>
										<iframe src="<?php echo base_url('./pdf/').$alternatif->file; ?>" width="800" height="1000"></iframe>
									<?php } else { ?>
										<p>Tidak Ada Berkas</p>
									<?php } ?>
								</td>
							</tr>

						</table>
					</div>
				</div>
			</div>