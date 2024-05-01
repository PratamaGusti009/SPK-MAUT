// Dapatkan data flash dari elemen dengan class 'flash-data'
const flashData = $(".flash-data").data("flashdata");

// Periksa apakah flashData tidak kosong atau null
if (flashData) {
	// Tampilkan SweetAlert2 hanya jika flashData tersedia
	Swal.fire({
		icon: "success",
		title: flashData,
		showConfirmButton: false,
		timer: 1500,
	});
}

if (flashDataError) {
	// Tampilkan SweetAlert2 hanya jika flashData tersedia
	Swal.fire({
		icon: "error",
		title: flashDataError,
		showConfirmButton: false,
		timer: 1500,
	});
}

// Fungsi konfirmasi penghapusan data
function confirmDeletion(url) {
	// Cek apakah session untuk konfirmasi penghapusan sudah ada
	if (!sessionStorage.getItem("confirmDeletion")) {
		Swal.fire({
			title: "Apakah Anda yakin?",
			text: "Data ini akan dihapus secara permanen!",
			icon: "warning",
			showCancelButton: true,
			confirmButtonColor: "#d33",
			cancelButtonColor: "#3085d6",
			confirmButtonText: "Ya, hapus!",
			cancelButtonText: "Batal",
		}).then((result) => {
			if (result.isConfirmed) {
				// Jika pengguna mengonfirmasi, simpan status ke session
				sessionStorage.setItem("confirmDeletion", "true");
				// Lanjutkan dengan mengarahkan ke URL hapus
				window.location.href = url;
			}
		});
	} else {
		// Jika sudah dikonfirmasi sebelumnya, hapus status dari session
		sessionStorage.removeItem("confirmDeletion");
	}
}
