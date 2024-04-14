// Dapatkan data flash dari elemen dengan class 'flash-data'
const flashData = $('.flash-data').data('flashdata');

// Periksa apakah flashData tidak kosong atau null
if (flashData) {
    // Tampilkan SweetAlert2 hanya jika flashData tersedia
    Swal.fire({
        title: flashData,
        text: '',
        icon: 'success'
    }).then(() => {
        // Setelah SweetAlert2 ditampilkan, hapus data flash dari elemen HTML
        $('.flash-data').removeAttr('data-flashdata');
    });
}


// Fungsi konfirmasi penghapusan data
function confirmDeletion(url) {
    Swal.fire({
        title: 'Apakah Anda yakin?',
        text: 'Data ini akan dihapus secara permanen!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Ya, hapus!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            // Jika pengguna mengonfirmasi, lanjutkan dengan mengarahkan ke URL hapus
            window.location.href = url;
        }
    });
}