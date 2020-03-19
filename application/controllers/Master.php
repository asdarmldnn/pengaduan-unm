<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Master extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('crud_model', 'crud');
    }

    public function user()
    {
        $a['user'] = $this->db->get_where('tbl_user', ['username' =>
        $this->session->userdata('username')])->row_array();
        $a['page'] = "admin/master/user_v";
        $a['title'] = "User";
        $this->load->view('admin/main', $a);
    }
    /*=====================Tabel User================= */
    public function get_tbl_user()
    {

        $query = $this->db->select(array('a.id_user', 'a.nama', 'a.username', 'a.password', 'b.role', 'a.is_active', 'a.date_created', 'a.role_id'))->from('tbl_user a')
            ->join("user_role b", "a.role_id = b.id", "left"); //field yang ada di table user dan nama database dan join


        $column_order = array(null, 'a.nama', 'a.username', 'b.role', 'a.is_active',  'a.date_created'); //set column field database for datatable orderable
        $column_search = array('a.nama', 'a.username', 'b.role', 'a.is_active',  'a.date_created'); //set column field database for datatable searchable 
        $order = array('a.id_user' => 'asc'); // default order




        $list = $this->crud->get_datatables($query, $column_order, $column_search, $order);
        $data = array();
        $no   = $_POST['start'];
        foreach ($list['result'] as $rowi) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $rowi->nama;
            $row[] = $rowi->username;
            $row[] = $rowi->role;
            $row[] = $rowi->is_active;
            // $row[] = status($rowi->status);
            $row[] = date('d/m/Y H:i', $rowi->date_created);
            //     $row[] = $row[] = '
            //     <div class="row" > <button class="btn btn-warning btn-circle btn-sm" title="Detail" onClick="detail(\'' . $rowi->id_user . '\'); return false;"><i class="fa fa-align-justify"></i></button>  </div>
            // ';
            $row[] = '<div class="btn-group btn-group-sm" role="group"aria-label="Basic example"><button type="button" onclick="edit(\'' . $rowi->id_user . '\'); return false;" class="btn btn-warning" " data-placement="top" title="Edit"><i class="fas fa-pen fa-sm"></i></button> <button type="button" onclick="hapus(\'' . $rowi->id_user . '\'); return false;" class="btn btn-danger"><i class="fas fa-trash fa-sm"></i></button> </div>';
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
    function edit_user()
    {
        $id = $this->input->post('id');
        $data = $data = $this->crud->get_edit($id, 'id_user', 'tbl_user');
        $result = array();
        foreach ($data as $resulte) {
            $result  = array(
                'nama' => $resulte->nama,
                'username' => $resulte->username,
                'role_id' => $resulte->role_id,
                'is_active' => $resulte->is_active,
            );
        }
        echo json_encode($result);
    }
    function simpan_user()
    {
        $field     = $this->input->post('kode', true);
        $aksi     = $this->input->post('rcstat', true);

        $id_user = $_SESSION['role_id'];
        $hari_ini = time();
        $password = password_hash($this->input->post('password', true),  PASSWORD_DEFAULT);

        $data = array(
            'nama'    => $this->input->post('nama', true),
            'username'    => $this->input->post('username', true),
            'is_active'    => $this->input->post('is_active', true),
            'role_id'    => $this->input->post('role_id', true),
            'last_user'    => $id_user,
            'date_created' => $hari_ini,
        );

        if ($aksi == 2) {
            /*==================== simpan=================== */
            if ($this->crud->hsave('tbl_user', $data, $field, $aksi, 'id_user') == true) {
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
        } else {
            $user = $this->db->get_where('tbl_user', ['username' => $this->input->post('username', true)])->row_array();
            if ($user) {
                $return = array(
                    'status'    => false,
                    'message'    => 'Username sudah ada..',
                );
            } else {
                $data['date_created'] = $hari_ini;
                $data['password'] = $password;
                /*==================== simpan=================== */
                if ($this->crud->hsave('tbl_user', $data, $field, $aksi, 'id_user') == true) {
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
            }
        }

        echo json_encode($return);
    }
    /*=========================Identitas=====================*/
    public function identitas()
    {
        $a['user'] = $this->db->get_where('tbl_user', ['username' =>
        $this->session->userdata('username')])->row_array();
        $a['page'] = "admin/master/identitas_v";
        $a['title'] = "Data Identitas";
        $this->load->view('admin/main', $a);
    }
    public function get_tbl_identitas()
    {

        $query = $this->db->select(array('id', 'identitas', 'nama'))->from('tbl_identitas');

        $column_order = array(null, 'identitas', 'nama'); //set column field database for datatable orderable
        $column_search = array('identitas', 'nama'); //set column field database for datatable searchable 
        $order = array('id' => 'asc'); // default order




        $list = $this->crud->get_datatables($query, $column_order, $column_search, $order);
        $data = array();
        $no   = $_POST['start'];
        foreach ($list['result'] as $rowi) {


            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $rowi->identitas;
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
}

/* End of file Master.php */
