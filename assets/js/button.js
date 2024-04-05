// assets/js/custom_script.js

$(document).ready(function () {
	// Cek apakah tombol submit harus ditampilkan atau tombol edit
	showAppropriateButton();

	$("#myForm").submit(function (event) {
		// Menghentikan proses pengiriman formulir agar tidak memuat ulang halaman
		event.preventDefault();

		// Lakukan sesuatu dengan data formulir (misalnya, kirim AJAX request)

		// Setelah data berhasil diproses, simpan status tombol di session
		$.ajax({
			type: "POST",
			url: "yourcontroller/process_form",
			success: function () {
				showEditButton();
			},
		});
	});

	$("#newBtn").click(function () {
		// Lakukan sesuatu ketika tombol baru diklik
		alert("New button clicked!");
	});

	// Fungsi untuk menampilkan tombol submit atau edit sesuai dengan kondisi
	function showAppropriateButton() {
		var shouldShowSubmit = sessionStorage.getItem("showSubmit");
		if (shouldShowSubmit === "true") {
			$("#submitBtn").show();
		} else {
			showEditButton();
		}
	}

	// Fungsi untuk menampilkan tombol edit
	function showEditButton() {
		// Hapus tombol submit jika ada
		$("#submitBtn").remove();

		// Tambahkan tombol edit
		$("#myForm").append('<button type="button" id="editBtn">Edit</button>');

		// Simpan status tombol di session
		sessionStorage.setItem("showSubmit", "false");

		// Tambahkan event listener untuk tombol edit
		$("#editBtn").click(function () {
			// Lakukan sesuatu ketika tombol edit diklik
			alert("Edit button clicked!");
		});
	}
});
