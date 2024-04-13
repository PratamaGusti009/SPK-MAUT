<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

	<!-- Main Content -->
	<div id="content">

		<!-- Begin Page Content -->
		<div class="container-fluid">

			<!-- Page Heading -->
			<div class="d-sm-flex align-items-center justify-content-between mb-4">
				<h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-users"></i> Data Alternatif</h1>
				<a href="<?php echo base_url('Alternatif'); ?>" class="btn btn-secondary btn-icon-split"><span
						class="icon text-white-50"><i class="fas fa-arrow-left"></i></span>
					<span class="text">Kembali</span>
				</a>
			</div>

			<!-- DataTales Example -->
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-primary">Detail Data Alternatif</h6>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered">
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
						</table>
					</div>
				</div>
			</div>