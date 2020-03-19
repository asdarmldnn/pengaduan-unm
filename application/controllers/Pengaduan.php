

<?php
date_default_timezone_set("Asia/Makassar");
defined('BASEPATH') or exit('No direct script access allowed');

class Pengaduan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('crud_model', 'crud');
    }
    public function index()
    {
        $a['user'] = $this->db->get_where('tbl_user', ['username' =>
        $this->session->userdata('username')])->row_array();
        $a['page'] = "admin/pengaduan/data_pengaduan";
        $a['title'] = "Data Pengaduan";
        $this->load->view('admin/main', $a);
    }
    public function get_tbl_pengaduan()
    {

        $tgl1 = $this->crud->rev_date($this->input->post('tgl1'));
        $tgl2 = $this->crud->rev_date($this->input->post('tgl2'));
        $where = '';
        if ($tgl1 != '' && $tgl2 != '') {
            $where = "AND date(waktu) between '$tgl1' and  '$tgl2'";
        }

        $role = $_SESSION['role_id'];
        if ($role != 1) {
            $query = $this->db->select(array('a.id_pengaduan', 'a.waktu', 'a.nama', 'b.nama_jns', 'a.email', 'a.no_iden', 'a.hp', 'a.status', 'a.token'))->from('tbl_pengaduan a')
                ->join("tbl_jns_pengaduan b", "a.jns_pengaduan=b.id_jns", "left") //field yang ada di table user dan nama database dan join
                ->where("a.jns_pengaduan = '$role' $where");
        } else {
            $query = $this->db->select(array('a.id_pengaduan', 'a.waktu', 'a.nama', 'b.nama_jns', 'a.email', 'a.no_iden', 'a.hp', 'a.status', 'a.token'))->from('tbl_pengaduan a')
                ->join("tbl_jns_pengaduan b", "a.jns_pengaduan=b.id_jns", "left") //field yang ada di table user dan nama database dan join
                ->where("a.id_pengaduan<>'' $where");
        }


        // if ($role != 1) {
        //     // $where += "a.jns_pengaduan = $role ";
        //     $query = $this->db->select(array('a.id_pengaduan', 'a.waktu', 'a.nama', 'b.nama_jns', 'a.email', 'a.no_iden', 'a.hp', 'a.status', 'a.token'))->from('tbl_pengaduan a')
        //         ->join("tbl_jns_pengaduan b", "a.jns_pengaduan=b.id_jns", "left") //field yang ada di table user dan nama database dan join
        //         ->where("a.jns_pengaduan = '$role' $where");
        // } else {
        //     $query = $this->db->select(array('a.id_pengaduan', 'a.waktu', 'a.nama', 'b.nama_jns', 'a.email', 'a.no_iden', 'a.hp', 'a.status', 'a.token'))->from('tbl_pengaduan a')
        //         ->join("tbl_jns_pengaduan b", "a.jns_pengaduan=b.id_jns", "left"); //field yang ada di table user dan nama database dan join

        // }




        $column_order = array(null, 'a.waktu', 'a.no_iden', 'a.nama', 'a.email',  'a.hp', 'a.status'); //set column field database for datatable orderable
        $column_search = array('a.waktu', 'a.no_iden', 'a.nama', 'a.email',  'a.hp', 'a.status'); //set column field database for datatable searchable 
        $order = array('a.id_pengaduan' => 'desc'); // default order




        $list = $this->crud->get_datatables($query, $column_order, $column_search, $order);
        $data = array();
        $no   = $_POST['start'];
        foreach ($list['result'] as $rowi) {
            $waktu = $rowi->waktu;
            $rev = explode(' ', $waktu);
            $tgl = $this->crud->rev_date2($rev[0]) . ' ' . $rev[1];

            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $tgl;
            $row[] = $rowi->no_iden;
            $row[] = $rowi->nama;
            $row[] = $rowi->email;
            // $row[] = $rowi->nama_jns;
            $row[] = $rowi->hp;
            $row[] = status($rowi->status);
            $row[] = $row[] = '
            <div class="text-center"> <button class="btn btn-blue-grey btn-circle btn-sm" title="Detail" onClick="detail(\'' . $rowi->id_pengaduan . '\'); return false;"><i class="fa fa-align-justify"></i></button>  </div>
        ';



            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->crud->count_all($query),
            "recordsFiltered" => $list['count_filtered'],
            "data" => $data
        );
        echo json_encode($output);
    }


    public function detail()
    {
        $id = $this->input->post('id');
        $data = $this->crud->listingOne($id);
        $ext =    pathinfo($data['file'], PATHINFO_EXTENSION);
        $waktu = $data['waktu'];
        $rev = explode(' ', $waktu);
        $tgl = $this->crud->rev_date2($rev[0]) . ' ' . $rev[1];

        $array = array(
            'waktu' => $tgl,
            'nama' => $data['nama'],
            'nama_jns' => $data['nama_jns'],
            'status_r' => $data['status'],
            'deskripsi' => $data['deskripsi'],
            'file' => $data['file'],
            'hp' => $data['hp'],
            'no_iden' => $data['no_iden'],
            'email' => $data['email'],
            'token' => $data['token'],
            'pesan' => $data['pesan'],
            'ext' => $ext,
            'id' => $id,

        );
        echo json_encode($array);
    }

    public function ubah_status()
    {
        $id = $this->input->post('id_r');
        $status = $this->input->post('status_r');
        $subjek = $this->input->post('subjek_r');
        $pesan = $this->input->post('pesan_r');
        $email = $this->input->post('email_r');

        $tbl_pengaduan = array(
            'status' => $status,
            'pesan' => $pesan
        );


        if ($this->crud->crud($id, 'id_pengaduan', $tbl_pengaduan, 'tbl_pengaduan', 'update') == true) {
            $return = array(
                'status'    => true,
                'message'    => 'Data berhasil disimpan..',
                'id' => $id,

            );
        } else {
            $return = array(
                'status'    => false,
                'message'    => 'Terjadi kesalahan..',
                'id' => $id,
            );
        }


        echo json_encode($return);
    }


    public function chart()
    {
        // $role =  $_SESSION['role_id'];
        $role = 3;
        if ($role == 3) {
            $labels = "PMB";
        }
        $label = array();
        $nilai = array();

        $load_label = $this->db->query("SELECT * FROM tbl_pengaduan WHERE jns_pengaduan=$role group by month(waktu)");

        foreach ($load_label->result() as $row) {

            $waktu = $row->waktu;
            $rev = explode(' ', $waktu);

            $label[] = $this->crud->rev_date3($rev[0]);
        };
        $load_data =  $this->db->query("SELECT MONTH(waktu), COUNT(*) as nilai FROM tbl_pengaduan WHERE jns_pengaduan=$role GROUP BY MONTH(waktu)");
        foreach ($load_data->result() as $row) {
            $nilai[] = $row->nilai;
        };
        $result  = array(
            'nilai' => $nilai,
            'label' => $label,
            'nama_label' => $labels,

        );

        echo json_encode($result);
    }

    public function chart2()
    {
        // $role =  $_SESSION['role_id'];
        $role = 3;
        $load_data = $this->db->query("SELECT  COUNT(*) AS nilai FROM tbl_pengaduan WHERE jns_pengaduan=$role GROUP BY status");
    }






    /*-------------------jenis pengaduan-----------------------*/
    public function jns_pengaduan()
    {
        $a['user'] = $this->db->get_where('tbl_user', ['username' =>
        $this->session->userdata('username')])->row_array();
        $a['page'] = "admin/pengaduan/jenis_pengaduan";
        $a['title'] = "Jenis Pengaduan";
        $this->load->view('admin/main', $a);
    }

    public function get_tbl_jns_pengaduan()
    {

        $query = $this->db->select(array('a.id_jns', 'a.nama_jns', 'b.nama', 'a.last_update'))->from('tbl_jns_pengaduan a')
            ->join("tbl_user b", "a.last_user = b.id_user", "left"); //field yang ada di table user dan nama database dan join


        $column_order = array(null, 'a.nama_jns', 'b.nama'); //set column field database for datatable orderable
        $column_search = array('a.nama_jns', 'b.nama'); //set column field database for datatable searchable 
        $order = array('a.id_jns' => 'desc'); // default order




        $list = $this->crud->get_datatables($query, $column_order, $column_search, $order);
        $data = array();
        $no   = $_POST['start'];
        foreach ($list['result'] as $rowi) {
            $waktu = $rowi->last_update;
            $rev = explode(' ', $waktu);
            $tgl = $this->crud->rev_date2($rev[0]);

            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $tgl;
            $row[] = $rowi->nama_jns;
            $row[] = $rowi->nama;
            $row[] = '<div class="btn-group btn-group-sm" role="group">
            <button type="button" onClick="edit(\'' . $rowi->id_jns . '\'); return false;" class="btn btn-warning"  data-placement="top" title="Edit"><i class="fas fa-pen fa-sm"></i></button> <button type="button" onClick="hapus(\'' . $rowi->id_jns . '\'); return false;" class="btn btn-danger"><i class="fas fa-trash fa-sm"></i></button> </div>';



            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->crud->count_all($query),
            "recordsFiltered" => $list['count_filtered'],
            "data" => $data
        );
        echo json_encode($output);
    }
    function simpan_jns_pengaduan()
    {
        $field     = $this->input->post('kode', true);
        $aksi     = $this->input->post('rcstat', true);

        $id_user = $_SESSION['id_user'];
        $hari_ini = date("Y-m-d");

        $data = array(
            'nama_jns'    => $this->input->post('nama_jns', true),
            'last_user'    => $id_user,
            'last_update' => $hari_ini,
        );

        if ($aksi != '2') {
            $data['last_update'] = $hari_ini;
        }
        /*==================== simpan=================== */
        if ($this->crud->hsave('tbl_jns_pengaduan', $data, $field, $aksi, 'id_jns') == true) {
            $return = array(
                'status'    => true,
                'message'    => 'Data berhasil disimpan..',
            );
        } else {
            $return = array(
                'status'    => false,
                'message'    => 'Terjadi kesalahan..',
            );
        }
        echo json_encode($return);
    }
    function edit_jns_pengaduan()
    {
        $id = $this->input->post('id');
        $data = $data = $this->crud->get_edit($id, 'id_jns', 'tbl_jns_pengaduan');
        $result = array();
        foreach ($data as $resulte) {
            $result  = array(
                'nama_jns' => $resulte->nama_jns,
            );
        }
        echo json_encode($result);
    }

    /*-------------------jenis pengaduan-----------------------*/





    /*=================cetak==============*/

    public function cetak()
    {


        $id = $_REQUEST['id'];
        $data = $this->crud->listingOne($id);

        $mpdf = new \Mpdf\Mpdf(
            [
                'mode' => 'utf-8',
                'format' => 'A4-P',
                'margin_left' => 25,
                'margin_right' => 15,
            ]
        );
        /*================================= TITLE========================================*/
        $mpdf->SetTitle('Pengaduan');
        /*================================= HEADER========================================*/
        $mpdf->SetHTMLHeader('
                                <table style="width:100%">
                                <tr>
                                <th width="10"><img align="left" src="' . base_url('assets/admin/img/logo-unm.png') . '" style="position: absolute;  width: 90px; height: auto; "></th>
                                    <th>
                                        <p align="center">
                                            <b><br></br>
                                                <font face="Arial" color="black" size="5"> KEMENTERIAN PENDIDIKAN DAN KEBUDAYAAN
                                            </b><br></font>
                                            <font face="Arial" color="black" size="5"> <b> UNIVERSITAS NEGERI MAKASSAR (UNM) <b></font> <br>
                                            <font face="Arial" color="black" size="4"> <b>UPT TEKNOLOGI INFORMASI DAN KOMUNIKASI <b> </font> <br>
                                            <font face="Arial" size="2" style="font-weight: normal"> Alamat: Jalan A.P.Pettarani, Menara Pinisi UNM Lt. 2 – wing B </font> <br>
                                            <font face="Arial" size="2" style="font-weight: normal"> Telepon: (0411) 865677 Fax. (0411) 861377 </font> <br>
                                            <font face="Arial" size="2" style="font-weight: normal"> Laman: ict.unm.ac.id </font>
                                        </p>
                                    </th>
                                </tr>


                            </table>
                                                

                            ');

        /*================================= KONTEN========================================*/

        $html = ('
                            <body bgcolor="white">
                        
                            <hr style="height: 3px;background-color: #000000; margin-top:100px;">
                            <div align="center" style="font-size: 14px">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <u>BERITA ACARA PENYELESAIAN PENGADUAN</u>
                            </div>
                            <div align="center">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; No. ................./................./' . date('Y') . '
                            </div>



                            <div style="margin-top:20px">
                                Pada hari ini, .................., ......-........- ' . date('Y') . ' bertempat di Makassar yang bertandatangan dibawah ini:
                            </div>
                            <div>
                                <table>

                                    <tr>
                                        <td width="30">I.</td>
                                        <td width="100">Nama</td>
                                        <td>:</td>
                                        <td> ............. </td>
                                    </tr>

                                    <tr>
                                        <td width="30"></td>
                                        <td width="100">Jabatan</td>
                                        <td>:</td>
                                        <td> ............. </td>
                                    </tr>

                                </table>
                            </div>
                            <div style="margin-top:10px">
                                Dalam hal ini bertindak sebagai pelaksana laporan pengaduan, yang selanjutnya disebut sebagai <b>PIHAK PERTAMA</b>.
                            </div>
                            <div>
                                <table>

                                    <tr>
                                        <td width="30">II.</td>
                                        <td width="100">Nama</td>
                                        <td>:</td>
                                        <td> ............. </td>
                                    </tr>

                                    <tr>
                                        <td width="30"></td>
                                        <td width="100">Jabatan</td>
                                        <td>:</td>
                                        <td> ............. </td>
                                    </tr>

                                </table>
                            </div>
                            <div style="margin-top:10px; text-align: justify;">
                                Dalam hal ini bertindak sebagai pelaksana laporan pengaduan, yang selanjutnya disebut sebagai <b>PIHAK KEDUA</b>.
                            </div>
                            <div style="margin-top:20px">
                                Dengan ini menyatakan bahwa <b>PIHAK KEDUA</b> telah menyerahkan laporan pengaduan kepada <b>PIHAK PERTAMA</b> untuk dilaksanakan dengan rincian sebagai berikut:
                            </div>
                            <div style="margin-left: 20px">
                                <table>
                                    <tr>
                                        <td width="150">Nama Pelapor</td>
                                        <td>:</td>
                                        <td> ' . $data['nama'] . '</td>
                                    </tr>
                                    <tr>
                                        <td width="150">No HP</td>
                                        <td>:</td>
                                        <td> ' . $data['hp'] . ' </td>
                                    </tr>
                                    <tr>
                                        <td width="150">Jenis Aduan</td>
                                        <td>:</td>
                                        <td> ' . $data['nama_jns'] . ' </td>
                                    </tr>
                                    <tr>
                                        <td width="150">Deskripsi Pengaduan</td>
                                        <td>:</td>
                                        <td style="text-align: justify;"> ' . $data['deskripsi'] . ' </td>
                                    </tr>
                                </table>
                            </div>




                            <p style="text-align: justify; margin-top:10px;">Dan selanjutnya laporan pengaduan tersebut bisa dilaksanakan dan menjadi tanggung jawab <b>PIHAK PERTAMA.</b> </p>
                            <p align="left" style="text-align: justify; text-indent: 0.5in;">
                                Demikian Berita Acara Pengaduan ini dibuat dengan sebenarnya, untuk dapat diketahui dan digunakan sebagaimana mestinya.
                            </p>
                            <br>
                            <br>
                            <br>

                            <div style="margin-left:60px;">
                                <table>
                                    <tr>
                                        <td><b>PIHAK PERTAMA</b></td>
                                        <td width="200"></td>
                                        <td><b>PIHAK KEDUA</b></td>
                                    </tr>


                                </table>

                            </div>

                            <div style="margin-left:60px; margin-top:35px">
                                <table>
                                    <tr>
                                        <td>..............................</td>
                                        <td width="200"></td>
                                        <td>..........................</td>
                                    </tr>

                                </table>

                            </div>
                            

                    </div>    
        
        ');


        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }

    function export_data()
    {

        $html = "   
			<table border='1' width='100%' style='font-size:12px;' cellpadding='3' cellspacing='0'>
				<tr style='background:#e8e8e8;'>
					<td align='center'><b>Tanggal</b></td>
					<td align='center'><b>Nama</b></td>
					<td align='center'><b>No Indentitas</b></td>
					<td align='center'><b>Jenis Pengaduan</b></td>
					<td align='center'><b>HP</b></td>
					<td align='center'><b>Deskripsi</b></td>
					<td align='center'><b>Status</b></td>
					
                </tr>";
        $tgl1 = $this->crud->rev_date($_REQUEST['tgl1']);
        $tgl2 = $this->crud->rev_date($_REQUEST['tgl2']);

        $role = 3;
        $where = '';
        // $role = $_SESSION['role_id'];
        if ($tgl1 != '' && $tgl2 != '') {
            $where = "AND waktu BETWEEN '$tgl1' AND '$tgl2'";
        }
        $load_data = $this->db->query("SELECT * FROM tbl_pengaduan JOIN tbl_jns_pengaduan ON tbl_pengaduan.jns_pengaduan=tbl_jns_pengaduan.id_jns WHERE jns_pengaduan='$role' $where");

        foreach ($load_data->result() as $row) {
            $waktu = $row->waktu;
            $rev = explode(' ', $waktu);
            $html .= "<tr>
					<td align='center' style='mso-number-format:\"\@\";'>" . $this->crud->rev_date2($rev[0]) . ' ' . $rev[1] . "</td>
					<td align='center' style='mso-number-format:\"\@\";'>$row->nama</td>
					<td align='center' style='mso-number-format:\"\@\";'>$row->no_iden</td>
					<td align='center' style='mso-number-format:\"\@\";'>$row->nama_jns</td>
					<td align='center' style='mso-number-format:\"\@\";'>$row->hp</td>
					<td align='center' style='mso-number-format:\"\@\";'>$row->deskripsi</td>
					<td align='center' style='mso-number-format:\"\@\";'>status($row->status)</td>
					
				</tr>";
        }
        $html .= "</table>";

        $data = array(
            'data' => $html,
            'title' => 'data_pengaduan',
        );
        $this->load->view('excel', $data);
    }
}

/* End of file Pengaduan.php */
