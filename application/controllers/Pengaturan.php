

<?php
date_default_timezone_set("Asia/Makassar");
defined('BASEPATH') or exit('No direct script access allowed');

class Pengaturan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('crud_model', 'crud');
    }
    public function user_role()
    {
        $a['user'] = $this->db->get_where('tbl_user', ['username' =>
        $this->session->userdata('username')])->row_array();
        $a['page'] = "admin/pengaturan/user_role";
        $a['title'] = "User Role";
        $this->load->view('admin/main', $a);
    }
    public function get_user_role()
    {
        $query = $this->db->select(array('a.id', 'a.role', 'b.nama', 'a.last_update'))->from('user_role a')
            ->join("tbl_user b", "a.last_user = b.id_user", "left"); //field yang ada di table user dan nama database dan join


        $column_order = array(null, 'a.role', 'b.nama'); //set column field database for datatable orderable
        $column_search = array('a.role', 'b.nama'); //set column field database for datatable searchable 
        $order = array('a.id' => 'asc'); // default order




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
            $row[] = $rowi->role;
            $row[] = $rowi->nama;
            $row[] = '<div class="btn-group btn-group-sm" role="group">
        <button type="button" onClick="edit(\'' . $rowi->id . '\'); return false;" class="btn btn-warning"  data-placement="top" title="Edit"><i class="fas fa-pen fa-sm"></i></button> <button type="button" onClick="hapus(\'' . $rowi->id . '\'); return false;" class="btn btn-danger"><i class="fas fa-trash fa-sm"></i></button> </div>';



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


    public function simpan_role()
    {
        $jns = $this->input->post('jns');
        $kode = $this->input->post('kode');
        $data = array(
            'id' =>  $jns,
        );
        if ($kode == 'tambah') {
            $this->crud->crud('', '', $data, 'tbl_jns_pengaduan', 'tambah');
            echo 1;
        } else {
            $this->crud->crud($kode, 'id_jns', $data, 'tbl_jns_pengaduan', 'update');
            echo 2;
        }
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

    public function get_jenis_pengaduan()
    {
        $jenis_pengaduan =   $this->crud->crud('', '', '', 'tbl_jns_pengaduan', 'all');

        echo json_encode($jenis_pengaduan);
    }
    public function get_by_id_jenis_pengaduan()
    {
        $id =  $this->input->post('id');

        $jenis_pengaduan =   $this->crud->crud($id, 'id_jns', '', 'tbl_jns_pengaduan', 'satu');

        echo json_encode($jenis_pengaduan);
    }



    public function hapus_jenis_pengaduan()
    {

        $id = $this->input->post('id');
        if ($this->crud->crud($id, 'id_jns', '', 'tbl_jns_pengaduan', '') == true) {
            $return = array(
                'status'    => true,
                'message'    => 'Data berhasil dihapus..',
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

    /*-------------------jenis pengaduan-----------------------*/
}

/* End of file Pengaduan.php */
