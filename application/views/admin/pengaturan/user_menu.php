<div class="section-body">

    <div class="col-12 col-md-6 col-lg-6" id="input">
        <div class="card">
            <div class="card-header">
                <h4>Tambah Menu</h4>
            </div>
            <div class="card-body">
                <form id="form_data">

                    <div class="form-group">
                        <label>Menu</label>
                        <input type="text" name="menu" id="menu" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Icon</label>
                        <input type="text" name="icon" id="icon" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Url</label>
                        <input type="text" name="url" id="url" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Urut</label>
                        <input type="text" name="urut" id="urut" class="form-control">
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <button onclick="simpan(); return false;" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                    Tambah
                                </button>
                            </div>
                            <div class="col-md-4">
                                <button onclick="batal(); return false;" class="btn btn-danger btn-lg btn-block" tabindex="4">
                                    Batal
                                </button>
                            </div>

                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="row" id="tabel_data">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <button onclick="tambah(); return false;" class=" btn btn-primary">Tambah Menu</button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="tabel" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th class="text-center">
                                        #
                                    </th>
                                    <th>menu</th>
                                    <th>url</th>
                                    <th>icon</th>
                                    <th>urut</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
    var table;
    $('#input').hide();
    $(document).ready(function() {

        //datatables
        table = $('#tabel').DataTable({

            "processing": false, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.

            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo base_url(); ?>pengaturan/get_user_menu",
                "type": "POST"
            },

            //Set column definition initialisation properties.
            "columnDefs": [{
                "targets": [0, 4], //first column / numbering column
                "orderable": false, //set not orderable
            }, ],

        });

    });



    function tambah() {
        $('#input').show(300);
        $('#tabel_data').hide(300);

    }

    function simpan() {
        var number = /^[0-9]+$/;
        if ($('#menu').val() == '') {
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: 'menu masih kosong',

            });
            return false;
        } else if ($('#icon').val() == '') {
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: 'Icon masih kosong',

            });
            return false;
        } else if ($('#url').val() == '') {
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: 'url masih kosong',

            });
            return false;
        } else if ($('#urut').val() == '') {
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: 'Urut masih kosong',

            });
            return false;

        } else if (!$('#urut').val().match(number)) {
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: 'Urut harus angka',

            });
            return false;

        }


        var formData = new FormData($('#form_data')[0]);
        $.ajax({
            type: "POST",
            url: '<?= base_url('pengaturan/simpan_user_menu'); ?>',
            data: formData,
            contentType: false,
            processData: false,
            dataType: "JSON",
            success: function(data) {
                if (data.status == true) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Tersimpan',
                        text: data.message,

                    }).then((result) => {
                        $('#form_data').each(function() {
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

    function batal() {
        $('#input').hide(300);
        $('#tabel_data').show(300);
        $('#form_data').each(function() {
            this.reset();
        });


    }
</script>