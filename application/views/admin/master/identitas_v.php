<main>


    <section class="mb-1">
        <div class="row">
            <div class="col-sm-8">
                <h2 style="margin-bottom: 0;"><strong><?= $title ?></strong></h2>
                <!-- <p class="text-muted">Data Inputan Mahasiswa</p> -->
            </div>
            <div class="col-sm-4 ">
                <div class="float-right">
                    <a href="#"><i class="fas fa-home"> </i> Sapras </a>
                    <span> / <strong><?= $title ?></span>
                </div>
            </div>
        </div>

    </section>



    <!-- =========================Tambah Berita============================== -->
    <div class="card" id="input">


        <div class="card-body">
            <h6 id="status">Tambah Beasiswa</h6>
            <hr style="height: 3px;background-color: #6797ea;">
            <form id="form">
                <input type="hidden" name="kode" id="kode">
                <input type="hidden" name="rcstat" id="rcstat">
                <div class="form-group row">
                    <label class="col-sm-2 form-control-label">Judul</label>
                    <div class="col-sm-7">
                        <input type="text" id="judul" name="judul" class="form-control">
                    </div>
                </div>
                <div class="line"></div>
                <div class="form-group row">
                    <label class="col-sm-2 form-control-label">Link</label>
                    <div class="col-sm-10">
                        <textarea id="link" name="link" class="form-control"></textarea>
                    </div>
                </div>
                <div class="line"></div>



            </form>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-5">
                    <div class="row">
                        <button onclick="simpan();return false;" id="simpan" class="btn btn-sm btn-success"><i class="fa fa-save"></i> Simpan</button>&nbsp;
                        <button onclick="batal();return false;" id="batal" class="btn btn-sm btn-danger"><i class="fa fa-times"></i> Batal</button>
                    </div>
                </div>
            </div>


        </div>

    </div>

    <!-- =========================Tabel Berita============================== -->
    <div class="card" id="list">
        <!-- Card content -->
        <div class="card-body">
            <h6>List Beasiswa</h6>
            <hr style="height: 3px;background-color: #6797ea;">
            <div class="row">
                <div class="col-md-10">

                </div>
                <div class="col-md-2">
                    <button class="btn btn-success btn-sm" onclick="tambah(); return false;">Tambah</button>

                </div>

            </div>
            <div class="container-fluid">
                <table id="tabel" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th width="20px" class="th-sm">No
                            </th>
                            <th class="th-sm">Identitas
                            </th>
                            <th class="th-sm">Nama
                            </th>
                            </th>
                            <th class="th-sm">Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                    <tfoot>
                        <tr>
                            <th>No
                            </th>
                            <th>Identitas
                            </th>
                            <th>Nama
                            </th>

                            <th>Aksi
                            </th>
                        </tr>
                    </tfoot>
                </table>
            </div>

        </div>

    </div>
    <!-- Card -->

</main>


<script>
    $('#input').hide();
    $(function() {
        // Summernote
        $('#link').summernote({
            toolbar: [
                ['insert', ['link']],
            ],
        })
    });

    var table;
    $(document).ready(function() {


        //datatables
        table = $('#tabel').DataTable({

            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.

            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo base_url(); ?>master/get_tbl_identitas",
                "type": "POST"
            },

            //Set column definition initialisation properties.
            "columnDefs": [{
                "targets": [0, 2], //first column / numbering column
                "orderable": false, //set not orderable
            }, ],

        });

    });

    function simpan() {
        if ($('#judul').val() == '') {
            swal.fire('Gagal', 'Judul masih kosong', "error");
            return false;
        }
        if ($('#link').val() == '') {
            swal.fire('Gagal', 'Link masih kosong', "error");
            return false;
        }

        var formData = new FormData($('#form')[0]);

        $.ajax({
            type: "POST",
            url: '<?= base_url('beasiswa/simpan_beasiswa'); ?>',
            data: formData,
            contentType: false,
            processData: false,
            dataType: "JSON",
            success: function(data) {
                if (data.status == true) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Terkirim',
                        text: data.message,

                    }).then((result) => {
                        $('#form').each(function() {
                            this.reset();
                        });
                        $('#link').summernote('code', '');
                        $('#tabel').DataTable().ajax.reload();
                        batal();
                    });

                } else {
                    Swal.fire('Gagal', data.message, "error");
                }
            }
        });
    }

    function tambah(stat) {
        $('#list').hide(300);
        $('#input').show(300);
        $('#link').summernote('code', '');
    }

    function batal() {
        $('#input').hide(300);
        $('#list').show(300);
        $('#form').each(function() {
            this.reset();
        });
        $('#status').html('Tambah Beasiswa');
        $('#simpan').html('<i class="fa fa-save"></i> Simpan');
        $('#rcstat').val('1');
        $('#link').summernote('code', '');
    }

    function edit(id) {
        $('#status').html('Ubah Beasiswa');
        $('#simpan').html('<i class="fa fa-save"></i> Simpan Perubahan');
        $('#kode').val(id);
        $('#rcstat').val('2');

        $.ajax({
            type: "POST",
            dataType: "json",
            data: ({
                id
            }),
            url: "<?= base_url('beasiswa/edit_beasiswa'); ?>",
            success: function(data) {
                $('#judul').val(data.judul);
                $('#link').summernote('code', data.link);
                $('#input').show(300);
                $('#list').hide(300);
            }
        })
    }

    function hapus(id) {
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
                $.ajax({
                    dataType: 'json',
                    type: 'POST',
                    data: ({
                        tabel: 'tbl_beasiswa',
                        field: 'id',
                        id
                    }),
                    url: "<?= base_url('welcome/hapus'); ?>",
                    success: function(data) {
                        swal.fire("Terhapus", "Data Berhasil Dihapus", "success");
                        $('#tabel').DataTable().ajax.reload();
                    }
                });
            }


        })

    }
</script>