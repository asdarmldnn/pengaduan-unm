<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>UNM Pengaduan</title>
    <meta content="" name="descriptison">
    <meta content="" name="keywords">


    <!-- MDB icon -->
    <link rel="icon" href="<?= base_url() ?>assets/admin/img/logo.png" type="image/x-icon">


    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?= base_url() ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/vendor/aos/aos.css" rel="stylesheet">

    <!-- CSS File -->
    <link href="<?= base_url() ?>assets/css/style.css" rel="stylesheet">
    <style>
        #tracking {
            width: 100%;
            border-top: 3px solid #eb5d1e;
            border-bottom: 3px solid #eb5d1e;
            padding: 30px;
            background: #fff;
            box-shadow: 0 0 24px 0 rgba(0, 0, 0, 0.12);
            margin: auto;


        }



        /* loading */
        .modal2 {
            display: none;
            position: fixed;
            z-index: 1000;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            background: rgba(255, 255, 255, .8) url('<?= base_url(); ?>assets/loading/loading5.gif') 50% 50% no-repeat;
        }

        /* When the body has the loading class, we turn
             the scrollbar off with overflow:hidden */
        body.loading {
            overflow: hidden;
        }

        /* Anytime the body has the loading class, our
             modal element will be visible */
        body.loading .modal2 {
            display: block;
        }

        #hero form input[type="text"] {
            border: 0;
            padding: 4px 4px;
            width: calc(100% - 100px);
        }
    </style>

    <script src="<?= base_url() ?>assets/vendor/jquery/jquery.min.js"></script>

    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">



</head>

<body>

    <!-- ======= Header ======= -->
    <section id="hero" class="d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 pt-5 pt-lg-0 order-2 order-lg-1">
                    <h1 class="pt-3">Pengaduan </h1>
                    <h2>UNIVERSITAS NEGERI MAKASSAR</h2>
                    <!-- <form action="" method="post">
                        <input type="email" name="email"><input type="submit" value="Search">

                    </form> -->
                    <form id="cari">
                        <input type="text" name="cari" id="cari-token" placeholder="Masukkan Token.."><input onclick="search(); return false;" type="submit" value="Cek Status">
                    </form>
                    <p class="pt-2" style="color: #fff; font-size: 13px;">Silahkan diisi dengan token yang telah dikirim ke email anda.. </p>
                </div>
                <div class="col-lg-4 order-1 order-lg-2 hero-img">
                    <img src="assets/img/PENGADUAN.png" class="img-fluid animated" alt="">
                </div>
            </div>
        </div>

    </section>
    <!-- End Header -->

    <!-- form pengaduan -->
    <main id="main">
        <section id="contact" class="contact">
            <div class="container">
                <div class="section-title" data-aos="fade-up">
                    <div class="row text-center">
                        <div class="col-lg-12 ">
                            <img src="assets/img/team/logo.png" width="50" height="50" class="d-inline-block align-top" alt="">
                            <p>Buat pengaduan</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-2">
                    </div>
                    <div class="col-lg-8 mt-5 mt-lg-0 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
                        <form id="form" class="php-email-form">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="inlineFormCustomSelect" style="font-weight: 600;">Kategori Pelapor<span style="color: rgb(207, 61, 61);"> *</span></label>
                                    <select class="custom-select mr-sm-2" id="kategori" name="kategori">
                                        <!-- <option selected></option> -->
                                        <option value="1" selected>Dosen</option>
                                        <option value="2">Pegawai</option>
                                        <option value="3">Mahasiswa</option>
                                        <option value="4">Umum</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">

                                <div class="form-group col-md-6">
                                    <label for="name" style="font-weight: 600;">Nama<span style="color: rgb(207, 61, 61);"> *</span></label>
                                    <input type="text" name="nama" class="form-control" id="nama" />
                                </div>
                                <div class="form-group col-md-6" id="identitas">
                                    <label for="name" style="font-weight: 600;" id="label_identitas">NIDN<span style="color: rgb(207, 61, 61);"> *</span></label>
                                    <input type="text" class="form-control" name="no_iden" id="no_iden" />
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="name" style="font-weight: 600;">No Hp<span style="color: rgb(207, 61, 61);"> *</span></label>
                                    <input type="text" id="hp" name="hp" class="form-control" />
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="name" style="font-weight: 600;" id="label_email">Email<span style="color: rgb(207, 61, 61);"> *</span></label>
                                    <input type="email" class="form-control" name="email" id="email" />
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="inlineFormCustomSelect" style="font-weight: 600;">Jenis Pengaduan<span style="color: rgb(207, 61, 61);"> *</span></label>
                                    <select class="custom-select mr-sm-2" name="jns_pengaduan" id="jns_pengaduan">
                                        <option value="" selected disabled>Pilih Jenis Pengaduan</option>
                                        <?php
                                        $kelas = $this->db->get('tbl_jns_pengaduan');
                                        foreach ($kelas->result() as $row) {
                                            echo "<option value='$row->id_jns'>$row->nama_jns</option>";
                                        }
                                        ?>
                                    </select>
                                </div>

                            </div>
                            <div class="form-group">
                                <label for="name" style="font-weight: 600;">Deskripsi<span style="color: rgb(207, 61, 61);"> *</span></label>
                                <textarea class="form-control" name="deskripsi" id="deskripsi" rows="5"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="name" style="font-weight: 600;">Foto</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="file" name="file" onchange="return validasiFile()">
                                    <label class="custom-file-label" for="customFile">Pilih foto</label>
                                </div>
                                <div class="col-md-12 text-center mt-3" id="pratinjauGambar"></div>
                            </div>



                            <div class="text-center"><button onclick="simpan(); return false;" type="submit">Kirim</button></div>
                            <h5 class="pt-3" style="font-weight: 900;">Perhatian:</h5>
                            <div class="section pl-3" style="font-size: 13px;">
                                <li>Wajib diisi (<span class="text-danger">*</span>)</li>
                                <li>Ukuran file foto maks 1 mb</li>
                                <li>Type file foto= png, jpg</li>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </section>

    </main>
    <!-- End form pengaduan -->





    <main id="status">
        <section id="contact" class="contact">
            <div class="container">
                <div class="section-title" data-aos="fade-up">
                    <div class="row text-center">
                        <div class="col-lg-12 ">
                            <img src="assets/img/team/logo.png" width="50" height="50" class="d-inline-block align-top" alt="">
                            <p>Status Pengaduan</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-2">
                    </div>
                    <div class="col-lg-8 mt-5 mt-lg-0 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
                        <form id="form" class="php-email-form">
                            <div id="status_p"></div>
                            <div class="section pl-3" style="font-size: 13px;">
                                <p class="note note-warning" id="pesan" style="padding-left: 16px">
                                    <br>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eum enim iure suscipit blanditiis veritatis dolorum non dolore consequuntur nesciunt doloremque repudiandae ullam, quae alias eaque amet mollitia voluptas modi! Quas.<br></p>
                                <a class="btn btn-warning btn-sm ml-0" role="button" href="#" onclick="kembali(); return false;" alt="Scrollspy ">Kembali<i class="fas fa-edit ml-2"></i></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>





        <!-- Footer -->
        <footer id="footer">
            <div class="container py-4">
                <div class="copyright">
                    &copy; Copyright <strong><span><?= date('Y') ?></span></strong><a href="https://unm.ac.id/"> UNIVERSITAS NEGERI MAKASSAR</a>
                </div>
                <!-- <div class="credits">
        Designed by 
      </div> -->
            </div>
        </footer>
        <!-- End Footer -->

        <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>



        <div class="modal2">
            <!-- Place at bottom of page -->
        </div>


        <script>
            $('#status').hide();

            function search() {

                if ($('#cari-token').val() == '') {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: 'Token masih kosong',

                    });
                    return false;
                }
                var data = new FormData($('#cari')[0]);

                $.ajax({
                    type: 'POST',
                    dataType: 'JSON',
                    data: data,
                    cache: false,
                    processData: false,
                    contentType: false,
                    url: '<?= base_url() . "welcome/cek_status" ?>',

                    success: function(data) {
                        console.log(data);
                        if (data.status == '') {
                            $('#main').show();
                            $('#status').hide();
                            $('#form').each(function() {
                                this.reset();
                            });
                            $('#cari').each(function() {
                                this.reset();
                            });

                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal',
                                text: 'Token tidak ditemukan..',

                            });


                        } else {
                            $('#main').hide(300);
                            $('#status').show(300);
                            $('#status_p').html(data.status);
                            $('#pesan').html(data.pesan);
                            $('#cari').each(function() {
                                this.reset();
                            });
                        }

                    },

                });

            }

            function kembali() {

                $('#main').show(300);
                $('#status').hide(300);
                $('#form').each(function() {
                    this.reset();
                });
                $('#cari').each(function() {
                    this.reset();
                });
            }

            function simpan() {

                var kategori = $('#kategori :selected').val();
                console.log(kategori);
                var number = /^[0-9]+$/;

                var pola_email = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+.[a-zA-Z]{2,4}$/;

                if ($('#nama').val() == '') {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: 'Nama masih kosong',
                    });
                    return false;
                }
                if ($('#hp').val() == '') {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: 'Hp masih kosong',
                    });
                    return false;
                }
                if (!$('#hp').val().match(number)) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: 'HP harus angka',
                    });
                    return false;
                }




                if (kategori == 1 || 2 || 3) {

                    if (kategori == 1) {
                        if ($('#no_iden').val() == '') {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal',
                                text: 'NIDN masih kosong',

                            });
                            return false;
                        }

                    }
                    if (kategori == 2) {
                        if ($('#no_iden').val() == '') {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal',
                                text: 'NIP masih kosong',

                            });
                            return false;
                        }

                    }
                    if (kategori == 3) {
                        if ($('#no_iden').val() == '') {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal',
                                text: 'NIM masih kosong',

                            });
                            return false;
                        }

                    }

                    if (!$('#no_iden').val().match(number)) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal',
                            text: 'NIM/NIDN/NIP harus angka',

                        });
                        return false;
                    }
                    if ($('#email').val() == '') {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal',
                            text: 'Email masih kosong',

                        });
                        return false;
                    }

                    if (!pola_email.test($('#email').val())) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal',
                            text: 'Format email salah',

                        });
                        return false;
                    }
                }

                if ($('#jns_pengaduan :selected').val() == '') {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: 'Jenis pengaduan masih kosong',
                    });
                    return false;
                }
                if ($('#deskripsi').val() == '') {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: 'Deskripsi masih kosong',
                    });
                    return false;
                }

                var file_data = $('#file').prop('files')[0];
                var data = new FormData($('#form')[0]);
                data.append('datafile', file_data);

                $.ajax({
                    type: "POST",
                    url: '<?= base_url('welcome/kirim'); ?>',
                    data: data,
                    contentType: false,
                    processData: false,
                    dataType: "JSON",
                    success: function(data) {
                        if (data.status == true) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Terkirim',
                                text: 'laporan Anda telah kami terkirim....',
                            }).then((result) => {
                                $('#pratinjauGambar').html('');
                                $('.custom-file-label').removeClass("selected").html('');
                                $('#form').each(function() {
                                    this.reset();
                                });
                            });

                        } else {
                            Swal.fire('Gagal', data.message, "error");
                        }
                    },
                    error: function(jqXHR, exception) {
                        var msg = '';
                        if (jqXHR.status === 0) {
                            msg = 'Not connect.\n Verify Network.';
                        } else if (jqXHR.status == 404) {
                            msg = 'Requested page not found. [404]';
                        } else if (jqXHR.status == 500) {
                            msg = 'Internal Server Error [500].';
                        } else if (exception === 'parsererror') {
                            msg = 'Requested JSON parse failed.';
                        } else if (exception === 'timeout') {
                            msg = 'Time out error.';
                        } else if (exception === 'abort') {
                            msg = 'Ajax request aborted.';
                        } else {
                            msg = 'Uncaught Error.\n' + jqXHR.responseText;
                        }
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal',
                            text: msg,

                        });
                    }
                });


            }

            $('.custom-file-input').on('change', function() {
                let fileName = $(this).val().split('\\').pop();
                $(this).next('.custom-file-label').addClass("selected").html(fileName);
            });

            function validasiFile() {

                // var inputFile = $('#fotoGuide').val();
                var inputFile = document.getElementById('file');
                var oFile = document.getElementById("file").files[0];
                var pathFile = inputFile.value;
                var ekstensiOk = /(\.jpg|\.jpeg|\.png)$/i;
                if (!ekstensiOk.exec(pathFile)) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Opps..',
                        text: 'Format tidak didukung..',
                    }).then((result) => {
                        $('#file').val('');
                        $('.custom-file-label').removeClass("selected").html('');
                    });
                    inputFile.value = '';
                    return false;
                } else if (oFile.size > 1007152) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Opps..',
                        text: 'Ukuran foto maksimal 1 mb..',
                    }).then((result) => {
                        $('#file').val('');
                        $('.custom-file-label').removeClass("selected").html('');
                    });
                } else {
                    //Pratinjau gambar
                    if (inputFile.files && inputFile.files[0]) {
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            document.getElementById('pratinjauGambar').innerHTML = '<img style="height:350px" src="' + e.target.result + '"/>';
                        };
                        reader.readAsDataURL(inputFile.files[0]);
                    }
                }
            }
            $('#kategori').on('change', function() {
                let kategori = $(this).val().split('\\').pop();
                if (kategori == 1) {
                    $("#identitas").show();
                    $("#label_identitas").html('NIDN<span style="color: rgb(207, 61, 61);"> *</span>');
                    $("#label_email").html('Email<span style="color: rgb(207, 61, 61);"> *</span>');
                } else if (kategori == 2) {
                    $("#identitas").show();
                    $("#label_identitas").html('NIP<span style="color: rgb(207, 61, 61);"> *</span>');
                    $("#label_email").html('Email<span style="color: rgb(207, 61, 61);"> *</span>');
                } else if (kategori == 3) {
                    $("#identitas").show();
                    $("#label_email").html('Email<span style="color: rgb(207, 61, 61);"> *</span>');
                    $("#label_identitas").html('NIM<span style="color: rgb(207, 61, 61);"> *</span>');

                } else {
                    $("#identitas").hide();
                    $("#label_email").html('Email');

                }

            });
        </script>




        <!-- EDITOR -->
        <script src="<?= base_url() ?>assets/summernote/summernote-bs4.min.js"></script>

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>


        <script src="<?= base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="<?= base_url() ?>assets/vendor/jquery.easing/jquery.easing.min.js"></script>
        <!-- <script src="<?= base_url() ?>assets/vendor/php-email-form/validate.js"></script> -->
        <script src="<?= base_url() ?>assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
        <script src="<?= base_url() ?>assets/vendor/venobox/venobox.min.js"></script>
        <script src="<?= base_url() ?>assets/vendor/owl.carousel/owl.carousel.min.js"></script>
        <script src="<?= base_url() ?>assets/vendor/aos/aos.js"></script>


        <!-- Template Main JS File -->
        <script src="<?= base_url() ?>assets/js/main.js"></script>
        <script src="<?= base_url() ?>assets/sweertalert/sweetalert2.all.min.js"></script>


        <script>
            $body = $("body");
            $(document).on({
                ajaxStart: function() {
                    $body.addClass("loading");

                },
                ajaxStop: function() {
                    $body.removeClass("loading");
                }

            });
        </script>
</body>

</html>