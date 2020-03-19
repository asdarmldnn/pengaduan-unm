const flashData = $('.kirim-pengaduan').data('flashdata');

if (flashData == 'pengaduan') {
	Swal.fire(
		'Terima Kasih',
		'Pengaduan Anda telah masuk ke server kami dan akan segera di proses informasi selanjutnya akan di informasikan melalui Email',
		'success'
	)
} else if (flashData == 'gagal') {
	Swal.fire({
		icon: 'error',
		title: 'Gagal Login',
		text: 'Username / Password Salah',

	})
}




$('.tombol-hapus').on('click', function (e) {



	e.preventDefault();
	const href = $(this).attr('href');


	Swal.fire({
		title: 'Apakah anda yakin?',
		text: "",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#f00',
		cancelButtonColor: '#D0D0D0',
		confirmButtonText: 'Hapus!'
	}).then((result) => {
		if (result.value) {
			if (result.value) {
				document.location.href = href;
			}
		}
	})

})

$('.logout').on('click', function (e) {



	e.preventDefault();
	const href = $(this).attr('href');


	Swal.fire({
		title: 'Apakah anda yakin?',
		text: "",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#f00',
		cancelButtonText: 'Batal',
		cancelButtonColor: '#D0D0D0',
		confirmButtonText: 'Ya'
	}).then((result) => {
		if (result.value) {
			if (result.value) {
				document.location.href = href;
			}
		}
	})

})
