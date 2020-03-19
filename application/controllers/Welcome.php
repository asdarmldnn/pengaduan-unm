<?php
date_default_timezone_set("Asia/Makassar");
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('crud_model', 'crud');
  }


  public function index()
  {
    if (!$this->session->userdata('username')) {
      redirect('login');
    }
    $a['user'] = $this->db->get_where('tbl_user', ['username' =>
    $this->session->userdata('username')])->row_array();
    $a['page'] = "admin/dashboard";
    $a['title'] = "Dashboard";
    $this->load->view('admin/main', $a);
  }

  public function form()
  {

    $this->load->view('form_pengaduan');
  }



  public function kirim()
  {

    $upload_image = $_FILES['file']['name'];
    $nama = $this->input->post('nama');
    $kategori = $this->input->post('kategori');
    $no_iden = $this->input->post('no_iden');
    $hp = $this->input->post('hp');
    $email = $this->input->post('email');
    $jns_pengaduan = $this->input->post('jns_pengaduan');
    $deskripsi = $this->input->post('deskripsi');
    $token = 'UNM' . date('ymdhis');
    $ext =  pathinfo($upload_image, PATHINFO_EXTENSION);
    $hari_ini = date("Y-m-d H:i:s");



    //image
    if ($ext == 'png' || $ext == 'jpg' || $ext == 'jpeg' || $ext == 'JPG') {
      /*----------------jika upload foto------------------------------*/
      if ($upload_image) {
        $config['allowed_types'] = 'gif|jpg|png|svg|jpeg';
        $config['max_size']      = '1024';
        $config['encrypt_name']  = true;
        $config['upload_path']   = './assets/file/';

        $this->upload->initialize($config);

        if ($this->upload->do_upload('datafile')) {
          $new_file = $this->upload->data('file_name');

          $tambah = array(
            'nama' => $nama,
            'email' => $email,
            'no_iden' => $no_iden,
            'hp' => $hp,
            'jns_pengaduan' => $jns_pengaduan,
            'deskripsi' => $deskripsi,
            'token' => $token,
            'status' => 1,
            'file' => $new_file,
            'waktu' => $hari_ini,
          );

          if ($this->crud->crud('', '', $tambah, 'tbl_pengaduan', 'tambah') == true) {
            if ($email != '') {
              $this->_email($email, $token);
            }

            $return = array(
              'status'    => true,
              'message'    => 'Data berhasil disimpan..',
            );
          } else {
            $return = array(
              'status'    => false,
              'message'    => 'Terjadi kesalahan..',
            );
          };
        } else {
          $return = array(
            'status'  => false,
            'message'  => 'Foto maksimal 1 mb..',
          );
        }
        /*-----------------jika tdaik upload foto------------------------------*/
      } else if ($upload_image == '') {
        $tambah = array(
          'nama' => $nama,
          'email' => $email,
          'no_iden' => $no_iden,
          'hp' => $hp,
          'jns_pengaduan' => $jns_pengaduan,
          'deskripsi' => $deskripsi,
          'token' => $token,
          'status' => 1,
          'file' => 'logo.png',
          'waktu' => $hari_ini,
        );

        if ($this->crud->crud('', '', $tambah, 'tbl_pengaduan', 'tambah') == true) {
          if ($email != '') {
            $this->_email($email, $token);
          }
          $return = array(
            'status'    => true,
            'message'    => 'Data berhasil disimpan..',
          );
        } else {
          $return = array(
            'status'    => false,
            'message'    => 'Terjadi kesalahan..',
          );
        };
      }
    } else {
      $return = array(
        'status'  => false,
        'message'  => 'Format Foto tidak sesuai..',
      );
    }

    echo json_encode($return);
  }

  private function _email($email, $token)
  {
    $config = [
      'protocol' => 'smtp',
      'smtp_host' => 'ssl://smtp.googlemail.com',
      'smtp_user' => 'pengaduan@unm.ac.id',
      'smtp_pass' => 'UNMtetapjaya',
      'smtp_port' => 465,
      'mailtype' => 'html',
      'chartset' => 'utf-8',
      'newline' => "\r\n",

    ];


    $this->load->library('email', $config);

    $this->email->from('pengaduan@unm.ac.id', 'Pengaduan UNM');
    $this->email->to($email);
    $this->email->subject('Token pengaduan Anda');
    $this->email->message('
    <div class="container mt-5">
		<table>
			<tbody>

				<tr>
					<td style="padding-top: 10px; ">
						<table>
							<tbody>
								<tr>
									<td>
										<p class="pb-2" style="margin-right: 40px;"><strong>Terima
												kasih</strong>
											<br /><br />Laporan Anda telah kami

											Terima untuk segera diproses

										</p>

										<div>
											<ul style="margin-left: -40px; margin-right: 40px;">

												<center>
													<li class="list-group-item list-group-item-warning"
														style="font-family: `Open Sans`, sans-serif;">token :
                              (<strong>' . $token . '</strong>)</li>
												</center>
											</ul>
										</div>

										<hr style="margin-right: 40px;">

										<!-- <h3>Informasi :</h3> -->
										<p style="margin-right: 40px;">Mohon melakukan pengecekan secara berkala

											Pada menu cek status Token untuk melihat progres pada<a href="pengaduan.unm.ac.id">
												<strong>Pengaduan.unm.ac.id</strong></a>
										</p>

									</td>
								</tr>
							</tbody>
						</table>
					</td>
				</tr>
				<tr>
					<td style="font-family: `Open Sans`, sans-serif; margin-right: 40px;">
						<p> </p>
						<center><strong style="margin-right: 40px;">Temukan kami</strong></center>
						<p> </p>
					</td>
				</tr>
				<tr>
					<td style="margin-right: 40px;">
						<p> </p>
						<center style="margin-right: 40px;">
							<a href="https://www.youtube.com/channel/UC5Nm41yuz9D37qnGeOqK45Q" type="button"
								class="btn-floating btn-sm" style="background-color: rgb(224, 62, 62);"><i
									class="fab fa-youtube"></i></a>
							<a href="https://www.facebook.com/UNM_Makassar" type="button" "
                                class=" btn-floating btn-sm" style="background-color: rgb(94, 84, 230);"><i
									class="fab fa-facebook-f"></i></a>
							<a href="https://www.instagram.com/unm.makassar/" type="button" class="btn-floating btn-sm"
								style="background-color: rgb(240, 106, 16);"><i class="fab fa-instagram"></i></a>
							<a href="https://twitter.com/unm_makassar?lang=en" type="button" class="btn-floating btn-sm"
								style="background-color: rgb(88, 197, 248);"><i class="fab fa-twitter"></i></a>
						</center>
						<p> </p>
					</td>
				</tr>
				<tr>
					<td style="font-family: `Open Sans`, sans-serif;">
						<p> </p>
						<center style="margin-right: 40px;">Jl. A. P. Pettarani, Kota Makassar, Sulawesi Selatan 90222
						</center>
						<center style="margin-right: 40px;"><strong>© 2020 Universitas Negeri Makassar</strong></center>
						<p> </p>
					</td>
				</tr>

			</tbody>
		</table>
	</div>
    ');
    if ($this->email->send()) {
      return true;
    } else {
      echo $this->email->print_debugger();
    }
  }
  public function cek_status()
  {
    $token = $this->input->post('cari');
    $data = $this->crud->cekStatus($token);



    if ($data) {
      $waktu = $data['waktu'];
      $rev = explode(' ', $waktu);
      $tgl = $this->crud->rev_date2($rev[0]) . ' ' . $rev[1];
      $array = array(
        'waktu' => $tgl,
        'pesan' => $data['pesan'],
        'nama' => $data['nama'],
        'status' => status($data['status']),
      );
    } else {
      $array = array(
        'status' => ''
      );
    }



    echo json_encode($array);
  }
  function hapus()
  {
    $value = $this->input->post('id');
    $tabel = $this->input->post('tabel');
    $field = $this->input->post('field');

    if ($tabel == 'tbl_berita' || $tabel == 'tbl_pengumuman') {
      $foto = $this->db->query("SELECT foto FROM $tabel WHERE $field='$value'");
      if ($foto->num_rows() > 0) {
        $cfoto = $foto->row('foto');
        unlink('assets/file/' . $cfoto);
      }
    }
    $data = $this->crud->hapus($tabel, $field, $value);
    if ($data == '1') {
      echo '1';
    } else {
      echo '2';
    }
  }
}
