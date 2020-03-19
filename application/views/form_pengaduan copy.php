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
                    <form id="cari">
                        <input type="email" name="cari" id="cari-token" placeholder="Masukkan Token.."><input onclick="search(); return false;" type="submit" value="Cek Status">
                    </form>
                    <div class="col-md-8 mt-2 ">
                        <div class="alert alert-info">
                            Silahkan diisi dengan token yang telah dikirim ke email anda..
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 order-1 order-lg-2 hero-img">
                    <!-- <img src="assets/img/team/logo.png" class="img-fluid animated" alt="" style="width: 50%"> -->
                    <!-- <img src="assets/img/hero-img.svg" class="img-fluid animated" alt=""> -->
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
                            <p id="judul-pengaduan"></p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-2">
                    </div>
                    <div class="col-lg-8 mt-5 mt-lg-0 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
                        <form id="form_pengaduan" class="php-email-form">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="name">Nama <span class="text-danger">*</span> </label>
                                    <input type="text" name="nama" class="form-control" id="nama" />
                                    <div class="validate"></div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="name">NIM/NIDN/NIP <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="no_iden" id="no_iden" />
                                    <div class="validate"></div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="name">No Hp <span class="text-danger">*</span></label>
                                    <input type="text" name="hp" class="form-control" id="hp" />
                                    <div class="validate"></div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="name">Email <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" name="email" id="email" />
                                    <div class="validate"></div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Jenis <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="jns_pengaduan" id="jns_pengaduan">
                                        <option selected disabled>Pilih Jenis Pengaduan</option>
                                        <?php
                                        $kelas = $this->db->get('tbl_jns_pengaduan');
                                        foreach ($kelas->result() as $row) {
                                            echo "<option value='$row->id_jns'>$row->nama_jns</option>";
                                        }
                                        ?>
                                    </select>
                                    <div class="validate"></div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="name">Foto / Video</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="file" id="file">
                                        <label class="custom-file-label" for="customFile">Pilih File</label>
                                    </div>
                                </div>

                            </div>
                            <div class="form-group">
                                <label>Deskripsi <span class="text-danger">*</span></label>
                                <textarea class="form-control" name="deskripsi" id="deskripsi" rows="10"></textarea>

                            </div>

                            <div class="text-center"><button onclick="kirim(); return false;" class="btn btn-primary" type="submit">Kirim</button></div>
                            <div class="col-md-7 mt-5">
                                <div class="alert alert-info">
                                    <strong>Perhatian :</strong>
                                    <li>Wajib diisi (<span class="text-danger">*</span>)</li>
                                    <li>Ukuran file foto maks 1 mb</li>
                                    <li>Ukuran file video maks 10 mb</li>
                                    <li>Type file foto= png, jpg & Video = mp4 </li>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- End form pengaduan -->


    <!-- Tracking -->
    <div id="tracking" class="card booking-card align-items-stretch mt-5" style="max-width: 40rem;">

        <div class="card-body d-flex flex-row">

            <!-- Content -->
            <div>

                <!-- Title -->
                <h4 id="nama_title" class="card-title font-weight-bold mb-2">Muhammad Asdar</h4>
                <!-- Subtitle -->
                <p id="waktu" class="card-text"><i class="far fa-clock pr-2"></i>07/24/2018</p>
                <div id="status"></div>

            </div>

        </div>

        <!-- Card content -->
        <div class="card-body">

            <div id="pesan"></div>



            <!-- Button -->
            <button onclick="kembali(); return false; " class="btn btn-warning">Kembali</button>

        </div>


    </div>
    <!-- Tracking -->

    <br>



    <!-- Footer -->
    <footer id="footer">
        <div class="container py-4">
            <div class="copyright">
                &copy; Copyright <strong><span><?= date('Y') ?></span></strong>
            </div>
            <div class="credits">
                Designed by <a href="https://unm.ac.id/">UNM</a>
            </div>
        </div>
    </footer>
    <!-- End Footer -->

    <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>



    <div class="modal2">
        <!-- Place at bottom of page -->
    </div>




    <!-- EDITOR -->
    <script src="<?= base_url() ?>assets/summernote/summernote-bs4.min.js"></script>

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>





    <script src="<?= base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>assets/vendor/jquery.easing/jquery.easing.min.js"></script>
    <script src="<?= base_url() ?>assets/vendor/php-email-form/validate.js"></script>
    <script src="<?= base_url() ?>assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="<?= base_url() ?>assets/vendor/venobox/venobox.min.js"></script>
    <script src="<?= base_url() ?>assets/vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="<?= base_url() ?>assets/vendor/aos/aos.js"></script>


    <!-- Template Main JS File -->
    <script src="<?= base_url() ?>assets/js/main.js"></script>
    <script src="<?= base_url() ?>assets/sweertalert/sweetalert2.all.min.js"></script>

    <script>
        $('#tracking').hide();
        $body = $("body");
        $(document).on({
            ajaxStart: function() {
                $body.addClass("loading");

            },
            ajaxStop: function() {
                $body.removeClass("loading");
            }

        });
        $(document).ready(function() {
            $('#judul-pengaduan').html('Buat Pengaduan');

        });


        $('.custom-file-input').on('change', function() {
            let fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("selected").html(fileName);
        });



        function kirim() {
            var number = /^[0-9]+$/;

            var pola_email = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+.[a-zA-Z]{2,4}$/;


            if ($('#nama').val() == '') {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal',
                    text: 'Nama masih kosong',

                });
                return false;
            } else if ($('#no_iden').val() == '') {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal',
                    text: 'NIM/NIDN/NIP masih kosong',

                });
                return false;
            } else if (!$('#no_iden').val().match(number)) {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal',
                    text: 'NIM/NIDN/NIP harus angka',

                });
                return false;

            } else if ($('#hp').val() == '') {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal',
                    text: 'HP masih kosong',

                });
                return false;
            } else if (!$('#hp').val().match(number)) {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal',
                    text: 'HP harus angka',

                });
                return false;

            } else if ($('#email').val() == '') {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal',
                    text: 'Email masih kosong',

                });
                return false;
            } else if (!pola_email.test($('#email').val())) {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal',
                    text: 'Format email salah',

                });
                return false;
            } else if ($('#jns_pengaduan').val() == '') {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal',
                    text: 'Silahkan pilih jenis pengaduan',

                });
                return false;
            } else if ($('#deskripsi').val() == '') {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal',
                    text: 'Deskripsi masih kosong',

                });
                return false;
            }
            var file_data = $('#file').prop('files')[0];
            var data = new FormData($('#form_pengaduan')[0]);
            data.append('datafile', file_data);



            $.ajax({
                type: "POST",
                url: '<?= base_url('welcome/kirim'); ?>',
                data: data,
                cache: false,
                processData: false,
                contentType: false,
                dataType: "JSON",
                // global: false,
                success: function(data) {
                    if (data.status == true) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Terima Kasih ',
                            text: 'laporan Anda telah kami terima untuk segera diproses..',

                        }).then((result) => {
                            $('.custom-file-label').removeClass("selected").html();
                            $('#form_pengaduan').each(function() {
                                this.reset();
                            });
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: data.message,

                        });

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
                        $('#tracking').hide();
                        $('#form_pengaduan').each(function() {
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
                        $('#main').hide();
                        $('#tracking').show(300);
                        $('#waktu').html(data.waktu);
                        $('#status').html(data.status);
                        $('#nama_title').html(data.nama);
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
            $('#tracking').hide(300);
            $('#form_pengaduan').each(function() {
                this.reset();
            });
            $('#cari').each(function() {
                this.reset();
            });
        }
    </script>

</body>

</html>