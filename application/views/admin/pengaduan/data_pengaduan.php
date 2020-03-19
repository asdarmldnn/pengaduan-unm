 <!--Main layout-->

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


     <div class="card" id="filter">
         <div class="card-body">
             <div class="row">
                 <div class="col-sm-1 col-xs-12">
                     <label>Tanggal</label>

                 </div>
                 <div class="col-sm-2 col-xs-12">
                     <div class="input-group" id="input_tgl">
                         <input type="text" class="form-control" id="_tgl1" name="_tgl1" class="form-control" placeholder="dd/mm/yyyy" data-date-container='#input_tgl'>
                         <span class="input-group-addon ml-2 mt-2"><i style="color: orange;" class="fa fa-calendar-alt"></i></span>
                     </div>
                 </div>
                 <div class="col-sm-1 col-xs-12 text-center">
                     <label>S/D</label>
                 </div>
                 <div class="col-sm-2 col-xs-12">
                     <div class="input-group" id="input_tgl2">
                         <input type="text" class="form-control" id="_tgl2" name="_tgl2" class="form-control" placeholder="dd/mm/yyyy" data-date-container='#input_tgl2'>
                         <span class="input-group-addon ml-2 mt-2"><i style="color: orange;" class="fa fa-calendar-alt"></i></span>
                     </div>
                 </div>
                 <div class="col-sm-4 col-xs-12">
                     <button class="btn btn-info btn-sm waves-effect waves-light" type="button" onclick="filter();return false;">
                         <span class="btn-label"><i class="fa fa-filter"></i></span>Filter
                     </button>
                     <button class="btn btn-success btn-sm waves-effect waves-light" type="button" onclick="_export();return false;">
                         <span class="btn-label"><i class="fa fa-file-export"></i></span>Export
                     </button>
                 </div>
             </div>
             <hr style="height: 3px;background-color: #6797ea;">
         </div>
     </div>
     <br>

     <div id="view-pengaduan" class="card">

         <!--Card content-->
         <div class="card-body">
             <!--Title-->
             <h6>List Data Pengaduan</h6>
             <hr style="height: 3px;background-color: #6797ea;">

             <div class="container-fluid">
                 <table id="tabel-pengaduan" class="table table-striped table-bordered" cellspacing="0" width="100%">
                     <thead>
                         <tr>
                             <th class="th-sm">No
                             </th>
                             <th class="th-sm">Waktu
                             </th>
                             <th class="th-sm">No Indentitas
                             </th>
                             <th class="th-sm">Nama
                             </th>
                             <th class="th-sm">Email
                             </th>
                             <th class="th-sm">HP
                             </th>
                             <th class="th-sm">Status
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
                             <th>Waktu
                             </th>
                             <th>No Indentitas
                             </th>
                             <th>Nama
                             </th>
                             <th>Email
                             </th>
                             <th>hp
                             </th>
                             <th>Status
                             </th>
                             <th>Aksi
                             </th>
                         </tr>
                     </tfoot>
                 </table>
             </div>
         </div>



     </div>

     <br>
     <br>



     <div id="detail" class="row mb-5">



         <div class="col-md-6">

             <div class="card">
                 <div class="card-header white-text" id="custom-header">
                     <!-- <div class="row"> -->
                     <div class="row">
                         <div class="col-md-9">

                             <h4 class="mr-2">
                                 <strong>Detail Pengaduan</strong>
                             </h4>
                             <p id="custom-date" class="tanggal_d" style="font-size: 13px">
                             </p>
                         </div>
                         <div id="cetak" class="col-md-2">


                         </div>

                     </div>

                 </div>
                 <div class="card-body">
                     <div id="status_d">

                     </div>
                     <div class="list-group-flush">

                         <div class="list-group-item">
                             <div class="row">
                                 <div class="col-md-3">

                                     <p class="mb-2" style="color: #757575">Nama</p>
                                 </div>
                                 <div id="nama_d" class="col-md-9">

                                     <p class="mb-2"></p>
                                 </div>
                             </div>
                         </div>
                         <div class="list-group-item">
                             <div class="row">
                                 <div class="col-md-3">

                                     <p class="mb-2" style="color: #757575">No Identitas</p>
                                 </div>
                                 <div id="identitas_d" class="col-md-9">

                                     <p class="mb-2"></p>
                                 </div>
                             </div>
                         </div>
                         <div class="list-group-item">
                             <div class="row">
                                 <div class="col-md-3">

                                     <p class="mb-2" style="color: #757575">Token</p>
                                 </div>
                                 <div id="token_d" class="col-md-9">

                                     <p class="mb-2"></p>
                                 </div>
                             </div>
                         </div>
                         <div class="list-group-item">
                             <div class="row">
                                 <div class="col-md-3">

                                     <p class="mb-2" style="color: #757575">Jenis Pengaduan</p>
                                 </div>
                                 <div id="jns_d" class="col-md-9">

                                     <p class="mb-2"></p>
                                 </div>
                             </div>
                         </div>
                         <div class="list-group-item">
                             <div class="row">
                                 <div class="col-md-3">

                                     <p class="mb-2" style="color: #757575">Handphone</p>
                                 </div>
                                 <div id="hp_d" class="col-md-9">

                                     <p class="mb-2"></p>
                                 </div>
                             </div>
                         </div>
                         <div class="list-group-item">
                             <div class="row">
                                 <div class="col-md-3">

                                     <p class="mb-2" style="color: #757575">Email</p>
                                 </div>
                                 <div id="email_d" class="col-md-9">

                                     <p class="mb-2"></p>
                                 </div>
                             </div>
                         </div>
                         <div class="list-group-item">
                             <div class="row">
                                 <div class="col-md-3">

                                     <p class="mb-2" style="color: #757575">Deskripsi</p>
                                 </div>
                                 <div id="deskripsi_d" class="col-md-9">

                                     <p class="mb-2"></p>
                                 </div>
                             </div>
                         </div>
                         <div class="list-group-item">
                             <div class="row">
                                 <div class="col-md-3">

                                     <p class="mb-2" style="color: #757575">File</p>
                                 </div>
                                 <div class="col-md-9">
                                     <div id="view-foto" class="view overlay" style="margin-top: -55px">
                                     </div>
                                 </div>
                             </div>
                         </div>

                         <button class="btn btn-light my-4 btn-block" onclick="kembali(); return false;" type="submit" id="custom-button">Kembali</button>
                     </div>
                 </div>
             </div>
         </div>


         <div class="col-md-6" id="status_email">
             <div class="card">
                 <div class="card-header white-text" id="custom-header">
                     <div class="row">

                         <h5 class="mr-2 ml-3">
                             <strong>Replay to</strong>
                         </h5>
                         <p class="border rounded d-none d-md-inline-block email-rs" id="custom-form-control " href="/mdb-affiliate-program/">
                         </p>
                     </div>
                 </div>
                 <div class="card-body px-lg-3.5">

                     <form id="form_r" style="color: #757575;" action="#!">
                         <div class="input-group mb-4">
                             <div class="input-group-prepend">
                                 <div class="input-group-text">Subjek</div>
                             </div>
                             <input type="text" id="subjek_r" name="subjek_r" class="form-control" id="inlineFormInputGroupUsername" placeholder="">
                             <input type="hidden" id="email_r" name="email_r" class="form-control" id="inlineFormInputGroupUsername" placeholder="">
                             <input type="hidden" id="id_r" name="id_r" class="form-control" id="inlineFormInputGroupUsername" placeholder="">
                         </div>
                         <div class="input-group mb-4">
                             <div class="input-group-prepend">
                                 <div class="input-group-text">Status</div>
                             </div>
                             <select class="browser-default custom-select" id="status_r" name="status_r">
                                 <option selected disabled>Pilih Status</option>
                                 <option value="1" disabled>Menunggu Konfirmasi</option>
                                 <option value="2">Dalam Proses</option>
                                 <option value="3">Ditolak</option>
                                 <option value="4">Ditunda</option>
                                 <option value="5">Selesai</option>
                             </select>
                         </div>
                         <div id="hidden_m" class="form-group">
                             <textarea class="form-control rounded-0" id="pesan_r" name="pesan_r" rows="3" placeholder="Message"></textarea>
                         </div>
                         <div>

                             <button class="btn btn-light my-4 btn-block" onclick="kirim(); return false;" type="submit" id="custom-button">kirim</button>
                         </div>
                     </form>
                 </div>
             </div>
         </div>
     </div>
 </main>
 <!--Main layout-->









 <script>
     $('#status_email').hide();
     $(function() {
         // Summernote
         $('#pesan_r').summernote({
             toolbar: [
                 ['font', ['bold']],
                 ['para', ['ul']],
                 ['insert', ['link']],
                 ['view', ['fullscreen']],
             ],
         })
     })


     var table;
     $('#detail').hide();


     $(document).ready(function() {
         $('#_tgl1').pickadate({
             format: 'dd/m/yyyy',
             //  formatSubmit: 'yyyy-mm-dd',
             //  monthsFull: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober',
             //      'November', 'Desember'
             //  ],

         })
         //  $('#_tgl1').on('change', function() {
         //      let value_status = $(this).val().split('\\').pop();
         //      alert(value_status);

         //  });
         $('#_tgl2').pickadate({
             format: 'dd/m/yyyy',

         })


         //datatables
         table = $('#tabel-pengaduan').DataTable({

             "processing": true, //Feature control the processing indicator.
             "serverSide": true, //Feature control DataTables' server-side processing mode.
             "order": [], //Initial no order.

             // Load data for the table's content from an Ajax source
             "ajax": {
                 "url": "<?php echo base_url(); ?>pengaduan/get_tbl_pengaduan",
                 "type": "POST",
                 "data": ({
                     tgl1: '',
                     tgl2: ''
                 }),
             },

             //Set column definition initialisation properties.
             "columnDefs": [{
                 "targets": [0, 7], //first column / numbering column
                 "orderable": false, //set not orderable
             }, ],

         });

     });

     function filter() {
         tgl1 = $('#_tgl1').val();
         tgl2 = $('#_tgl2').val();
         $('#tabel-pengaduan').DataTable({
             "destroy": true,
             "processing": true, //Feature control the processing indicator.
             "serverSide": true, //Feature control DataTables' server-side processing mode.
             "order": [], //Initial no order.

             // Load data for the table's content from an Ajax source
             "ajax": {
                 "url": "<?php echo base_url(); ?>pengaduan/get_tbl_pengaduan",
                 "type": "POST",
                 "data": ({
                     tgl1,
                     tgl2
                 }),
             },

             //Set column definition initialisation properties.
             "columnDefs": [{
                 "targets": [0, 7], //first column / numbering column
                 "orderable": false, //set not orderable
             }, ],

         });
     }


     $('#status_r').on('change', function() {
         let value_status = $(this).val().split('\\').pop();
         if (value_status == "1" || value_status == "2" || value_status == "5") {
             $("#hidden_m").hide();
         } else {
             $("#hidden_m").show();
         }

     });

     function editStatus(id) {
         $('#status_email').show(300);
         $('#id_r').val(id);
     }

     function cetak(id) {



         var url = "<?= base_url(); ?>pengaduan/cetak?id=" + id;

         var res_url = encodeURI(url);

         window.open(res_url);
         window.focus();
     }

     function detail(id) {
         $('#view-pengaduan').hide(300);
         $('#filter').hide(300);
         $('#detail').show(300);
         $.ajax({
             type: 'POST',
             dataType: 'JSON',
             data: {
                 id: id,
             },
             url: '<?= base_url() . "pengaduan/detail" ?>',


             success: function(data) {

                 $('#cetak').html(" <button type='button' onClick='cetak(" + id + "); return false;' class='btn btn-info btn-md' data-placement='top' title='Cetak'><i class='fas fa-print fa-2x'></i></button>")

                 $('#email_d').html(": " + data.email);
                 $('.tanggal_d').html(data.waktu);
                 $('#jns_d').html(": " + data.nama_jns);
                 $('#nama_d').html(": " + data.nama);
                 $('#identitas_d').html(": " + data.no_iden);
                 $('#token_d').html(": " + data.token);
                 $('#hp_d').html(": " + data.hp);
                 $('#deskripsi_d').html(": " + data.deskripsi);
                 /*================replay==========*/
                 $('.email-rs').html(data.email);
                 $('#email_r').val(data.email);
                 $('#status_r').val(data.status_r);
                 $('#pesan_r').summernote('code', data.pesan);

                 if (data.ext == "gif" || data.ext == "png" || data.ext == "jpg" || data.ext == "jpeg" || data.ext == "JPG")
                     $('#view-foto').html("<img src='<?= base_url() ?>assets/file/" + data.file + "' style='width:350px; padding-top: 40px'>");
                 else {
                     $('#view-foto').html("<video  width='330px' height='350px' controls> <source src = '<?= base_url() ?>assets/file/" + data.file + "' type = 'video/mp4' >  </video>");
                 }
                 //  if (data.status_r == "1" || data.status_r == "2" || data.status_r == "5") {

                 //      $("#hidden_m").hide();
                 //  }


                 if (data.status_r == 1) {
                     $("#hidden_m").hide();
                     return $('#status_d').html('<p class="note note-warning" style="padding-left: 16px"><strong>Menunggu Konfirmasi</strong><br> <br> <a class="btn btn-warning btn-sm ml-0" role="button" href="#" onclick="editStatus(' + id + '); return false;" alt="Scrollspy ">Edit<i class="fas fa-edit ml-2"></i></a></p>');

                 } else if (data.status_r == 2) {
                     $("#hidden_m").hide();
                     return $('#status_d').html('<p class="note note-primary" style="padding-left: 16px"><strong>Dalam Proses</strong><br><br> <a class="btn btn-info btn-sm ml-0" role="button" href="#" onclick="editStatus(' + id + '); return false;" alt="Scrollspy ">Edit<i class="fas fa-edit ml-2"></i></a></p>');
                 } else if (data.status_r == 3) {
                     return $('#status_d').html('<p class="note note-danger" style="padding-left: 16px"><strong>Ditolak</strong><br>' + data.pesan + '<br> <a class="btn btn-danger btn-sm ml-0" role="button" href="#" onclick="editStatus(' + id + '); return false;" alt="Scrollspy ">Edit<i class="fas fa-edit ml-2"></i></a></p>');
                 } else if (data.status_r == 4) {
                     return $('#status_d').html('<p class="note note-dark" style="padding-left: 16px"><strong>Tunda</strong><br>' + data.pesan + '<br> <a class="btn btn-dark btn-sm ml-0" role="button" href="#" onclick="editStatus(' + id + '); return false;" alt="Scrollspy ">Edit<i class="fas fa-edit ml-2"></i></a></p>');
                 } else {
                     $("#hidden_m").hide();
                     return $('#status_d').html('<p class="note note-success" style="padding-left: 16px"><strong>Selesai</strong><br><br> <a class="btn btn-success btn-sm ml-0" role="button" href="#" onclick="editStatus(' + id + '); return false;" alt="Scrollspy ">Edit<i class="fas fa-edit ml-2"></i></a></p>');
                 }



             },



         });

     }



     function kirim() {
         var data = new FormData($('#form_r')[0]);
         let value_status = $('#status_r').val();
         if (value_status == "3" || value_status == "4") {
             if ($('#pesan_r').val() == "") {
                 Swal.fire({
                     icon: 'error',
                     title: 'Oops...',
                     text: 'Keterangan masih kosong..',

                 });
                 return false;
             }
         }

         $.ajax({
             type: "POST",
             url: '<?= base_url('pengaduan/ubah_status'); ?>',
             data: data,
             cache: false,
             processData: false,
             contentType: false,
             dataType: "JSON",
             global: false,
             success: function(data) {
                 if (data.status == true) {
                     $('#status_email').hide(300);
                     Swal.fire({
                         icon: 'success',
                         title: 'Terkirim',
                         text: 'Status berhasil diubah..',

                     }).then((result) => {
                         $('#pesan_r').summernote('code', '');
                         detail(data.id);
                         $('#form_r').each(function() {
                             this.reset();
                         });
                     });
                 } else {
                     Swal.fire({
                         icon: 'error',
                         title: 'Oppss...',
                         text: data.message,

                     });

                 }

             },

         });
     }

     function kembali() {
         $('#tabel-pengaduan').DataTable().ajax.reload();
         $('#view-pengaduan').show(300);
         $('#detail').hide(300);
         $('#status_email').hide();
         $("#hidden_m").show();
         $('#filter').show(300);
     }

     function _export() {
         tgl1 = $('#_tgl1').val();
         tgl2 = $('#_tgl2').val();

         var url = "<?php echo base_url(); ?>pengaduan/export_data?tgl1=" + tgl1 + "&tgl2=" + tgl2;
         window.open(url);
         window.focus();
     }
 </script>