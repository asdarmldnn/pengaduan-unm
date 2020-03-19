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



    <!-- =========================Tambah User============================== -->
    <div class="card" id="input">


        <div class="card-body">
            <h6 id="status">Tambah User</h6>
            <hr style="height: 3px;background-color: #6797ea;">
            <form id="form">
                <input type="hidden" name="kode" id="kode">
                <input type="hidden" name="rcstat" id="rcstat">
                <div class="form-group row">
                    <label class="col-sm-2 form-control-label">Nama</label>
                    <div class="col-sm-7">
                        <input type="text" id="nama" name="nama" class="form-control">
                    </div>
                </div>
                <div class="line"></div>
                <div class="form-group row">
                    <label class="col-sm-2 form-control-label">Username</label>
                    <div class="col-sm-5">
                        <input type="text" id="username" name="username" class="form-control">
                    </div>
                </div>
                <div class="line"></div>
                <div class="form-group row" id="_passowrd">
                    <label class="col-sm-2 form-control-label">Password</label>
                    <div class="col-sm-5">
                        <input type="text" id="password" name="password" class="form-control">
                    </div>
                </div>
                <div class="line"></div>
                <div class="form-group row">
                    <label class="col-sm-2 form-control-label">Aktivasi</label>
                    <div class="col-sm-4">
                        <select class="custom-select mr-sm-2" name="is_active" id="is_active">
                            <option value="" selected disabled>Pilih Aktivasi</option>
                            <option value='1'>Aktif</option>
                            <option value='2'>Tidak Aktif</option>
                        </select>
                    </div>
                </div>
                <div class="line"></div>
                <div class="form-group row">
                    <label class="col-sm-2 form-control-label">Level</label>
                    <div class="col-sm-4">
                        <select class="custom-select mr-sm-2" name="role_id" id="role_id">
                            <option value="" selected disabled>Pilih Level</option>
                            <?php
                            $role = $this->db->get('user_role');
                            foreach ($role->result() as $row) {
                                echo "<option value='$row->id'>$row->role</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="line"></div>
                <button id="reset_password" onclick="password_reset();return false;" id="simpan" class="btn btn-sm btn-warning"><i class="fa fa-save"></i> Reset Password </button>&nbsp;



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
            <h6>List User</h6>
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
                            <th class="th-sm">No
                            </th>
                            <th class="th-sm">Nama
                            </th>
                            <th class="th-sm">Username
                            </th>
                            <th class="th-sm">Level
                            </th>
                            <th class="th-sm">Aktif
                            </th>
                            <th class="th-sm">Created
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
                            <th>Nama
                            </th>
                            <th>Username
                            </th>
                            <th>Level
                            </th>
                            <th>Aktif
                            </th>
                            <th>Created
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
    $('#reset').hide();

    var table;
    $(document).ready(function() {


        //datatables
        table = $('#tabel').DataTable({

            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.

            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo base_url(); ?>master/get_tbl_user",
                "type": "POST"
            },

            //Set column definition initialisation properties.
            "columnDefs": [{
                "targets": [0, 6], //first column / numbering column
                "orderable": false, //set not orderable
            }, ],

        });

    });

    function password_reset() {
        alert('b');
    }

    function simpan() {
        if ($('#nama').val() == '') {
            swal.fire('Gagal', 'Nama masih kosong', "error");
            return false;
        }
        if ($('#username').val() == '') {
            swal.fire('Gagal', 'Username masih kosong', "error");
            return false;
        }
        if ($('#rcstat').val() != 2) {
            if ($('#password').val() == '') {
                swal.fire('Gagal', 'Password masih kosong', "error");
                return false;
            }

        }

        if ($('#is_active option:selected').val() == '') {
            swal.fire('Gagal', 'Aktivasi masih kosong', "error");
            return false;
        }
        if ($('#role_id option:selected').val() == '') {
            swal.fire('Gagal', 'Level masih kosong', "error");
            return false;
        }

        var formData = new FormData($('#form')[0]);

        $.ajax({
            type: "POST",
            url: '<?= base_url('master/simpan_user'); ?>',
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
        $('#_passowrd').show();
        $('#reset_password').hide();
    }

    function batal() {
        $('#form').each(function() {
            this.reset();
        });
        $('#input').hide(300);
        $('#list').show(300);
        $('#simpan').html('<i class="fa fa-save"></i> Simpan');
        $('#rcstat').val('1');

    }

    function edit(id) {
        $('#status').html('Ubah User');
        $('#simpan').html('<i class="fa fa-save"></i> Simpan Perubahan');
        $('#kode').val(id);
        $('#rcstat').val('2');

        $.ajax({
            type: "POST",
            dataType: "json",
            data: ({
                id
            }),
            url: "<?= base_url('master/edit_user'); ?>",
            success: function(data) {
                $('#_passowrd').hide();
                $('#reset_password').show();
                $('#nama').val(data.nama);
                $('#username').val(data.username);
                $('#role_id').val(data.role_id);
                $('#is_active').val(data.is_active);
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
                        tabel: 'tbl_user',
                        field: 'id_user',
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