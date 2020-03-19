<main>

    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card  shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">UMUM HUMAS</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php $data = $this->db->query('select * from tbl_pengaduan where jns_pengaduan="2" ')->num_rows();
                                                                                echo $data; ?></div>
                        </div>
                        <div class="col-auto">
                            <i style="color: aqua;" class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card  shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">PMB</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php $data = $this->db->query('select * from tbl_pengaduan where jns_pengaduan="3" ')->num_rows();
                                                                                echo $data; ?></div>
                        </div>
                        <div class="col-auto">
                            <i style="color: aqua;" class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card  shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">SIA</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php $data = $this->db->query('select * from tbl_pengaduan where jns_pengaduan="4" ')->num_rows();
                                                                                                echo $data; ?></div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i style="color: aqua;" class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card  shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">SITRANS</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php $data = $this->db->query('select * from tbl_pengaduan where jns_pengaduan="5" ')->num_rows();
                                                                                echo $data; ?></div>
                        </div>
                        <div class="col-auto">
                            <i style="color: aqua;" class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ====================================section 2================================== -->

    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card  shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jaringan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php $data = $this->db->query('select * from tbl_pengaduan where jns_pengaduan="6" ')->num_rows();
                                                                                echo $data; ?></div>
                        </div>
                        <div class="col-auto">
                            <i style="color: aqua;" class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card  shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">EMAIL</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php $data = $this->db->query('select * from tbl_pengaduan where jns_pengaduan="7" ')->num_rows();
                                                                                echo $data; ?></div>
                        </div>
                        <div class="col-auto">
                            <i style="color: aqua;" class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card  shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">KTM</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php $data = $this->db->query('select * from tbl_pengaduan where jns_pengaduan="8" ')->num_rows();
                                                                                                echo $data; ?></div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i style="color: aqua;" class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card  shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">LMS SCHOOL</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php $data = $this->db->query('select * from tbl_pengaduan where jns_pengaduan="9" ')->num_rows();
                                                                                echo $data; ?></div>
                        </div>
                        <div class="col-auto">
                            <i style="color: aqua;" class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</main>

<!-- ======================Chart ================ -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
<main class="mb-5 row" id="">

    <div class="col-md-8">

        <div class="card">
            <div class="card-body">
                <!-- <h4 class="card-title"><a>Card title</a></h4> -->
                <canvas id="chart1" width="300" height="300"></canvas>

            </div>
        </div>
    </div>


    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <!-- <h4 class="card-title"><a>Card title</a></h4> -->
                <canvas id="proses" width="300" height="300"></canvas>

            </div>
        </div>
    </div>



</main>

<script>
    /*================================== chart 1 ================================================== */
    $.ajax({
        type: "POST",
        url: '<?= base_url('pengaduan/chart'); ?>',
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function(data) {

            var ctx = document.getElementById('chart1').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: data.label,
                    datasets: [{
                        label: data.nama_label,
                        data: data.nilai,
                        backgroundColor: [
                            'rgba(255, 255, 255, 0.5)',
                        ],
                        borderColor: [
                            'blue',
                        ],

                    }]
                },

            });
        }
    });


    /*================================== chart 2 ================================================== */
    var ctx = document.getElementById('proses').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Menunggu konfirmasi', 'Dalam Proses', 'Ditunda', 'Ditolak', 'selesai'],
            datasets: [{
                data: [12, 19, 25, 8, 10],
                backgroundColor: [
                    'yellow', 'blue', 'black', 'red', 'green'
                ],


            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>