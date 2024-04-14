<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid">
            <div class="mb-4">
                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                </div>

                <!-- Content Row -->
                <div class="alert alert-info">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Selamat datang
                    <span class="text-uppercase"><b>
                            <?php echo $user['nama']; ?>!
                        </b></span> Harap isi semua data yang diperlukan dalam pendaftaran.
                </div>
                <div class="row">

                    <?php

                        // Memeriksa nilai $user['status']
                        if (is_null($user['status'])) {
                            // Jika status 0, tampilkan pesan bahwa pengguna tidak lulus dengan gaya Bootstrap merah (danger)
                        } elseif ($user['status'] == 1) {
                            // Jika status 1, tampilkan pesan bahwa pengguna lulus dengan gaya Bootstrap hijau (success)
                            echo ' <span class="alert alert-success">Selamat, Anda lulus !</span>';
                        } elseif ($user['status'] == 0) {
                            // Jika status null, tampilkan pesan bahwa penilaian belum selesai dengan gaya Bootstrap biru (primary)
                            echo ' <span class="alert alert-danger">Maaf, Anda Tidak Lulus</span>';
                        }
                            ?>
                    <!-- /.container-fluid -->
            </div>

        </div>
        <!-- End of Main Content -->