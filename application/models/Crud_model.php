


<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Crud_model extends CI_Model
{




    function _get_datatables_query($query, $column_order, $column_search, $order)
    {



        $i = 0;

        foreach ($column_search as $item) // loop column 
        {
            if (isset($_POST['search']['value'])) {

                if ($i === 0) {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if (isset($_POST['order'])) {
            $this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($order)) {
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
    function get_datatables($query, $column_order, $column_search, $order)
    {
        $this->_get_datatables_query($query, $column_order, $column_search, $order);
        if ($_POST['length'] != -1)
            $clone = clone $query;
        $this->db->limit($_POST['length'], $_POST['start']);
        $data['result'] = $query->get()->result();
        $data['count_filtered'] = $clone->get()->num_rows();
        return $data;
    }

    public function count_all($query)
    {
        return $query->count_all_results();
    }
    function get_edit($id, $pk, $table)
    {
        $q = $this->db->query("select * from $table where $pk = '$id'");
        return $q->result();
    }
    function hsave($table, $data, $kode, $status, $pk)
    {
        if ($status == '2') {
            $this->db->where($pk, $kode);
            $this->db->update($table, $data);
            return true;
        } else {
            $this->db->insert($table, $data);
            return true;
        }
    }
    function hapus($tabel, $field, $value)
    {
        $this->db->query("delete from $tabel where $field='$value'");
        return '1';
    }


    function rev_date($tgl)
    {
        $t = explode("/", $tgl);
        if ($tgl == '' || $tgl == null) {
            return '';
        } else {
            $tanggal  =  $t[0];
            $bulan    =  $t[1];
            $tahun    =  $t[2];
            return  $tahun . '-' . $bulan . '-' . $tanggal;
        }
    }
    function rev_date2($tgl)
    {

        $t = explode("-", $tgl);
        $tanggal  =  $t[2];
        $bulan    =  $t[1];
        $tahun    =  $t[0];
        return  $tanggal . '/' . $bulan . '/' . $tahun;
    }
    function rev_date3($tgl)
    {

        $t = explode("-", $tgl);
        $tanggal  =  $t[2];
        $bulan    =  $t[1];
        $tahun    =  $t[0];
        return $this->bulan_pendek($bulan);
    }
    public function bulan_pendek($bulan)
    {

        if ($bulan == 01) {
            return 'Jan';
        } elseif ($bulan == 02) {
            return 'Feb';
        } elseif ($bulan == 03) {
            return 'Mar';
        } elseif ($bulan == 04) {
            return 'Apr';
        } elseif ($bulan == 05) {
            return 'Mei';
        } elseif ($bulan == 06) {
            return 'Jun';
        } elseif ($bulan == 07) {
            return 'Jul';
        } elseif ($bulan == 8) {
            return 'Ags';
        } elseif ($bulan == 9) {
            return 'Sep';
        } elseif ($bulan == 10) {
            return 'Okt';
        } elseif ($bulan == 11) {
            return 'Nov';
        } elseif ($bulan == 12) {
            return 'Des';
        }
    }







    public function crud($id, $field, $data, $tabel, $option)
    {
        if ($option == 'all') {
            return $this->db->get($tabel)->result();
        } elseif ($option == 'satu') {
            //satu
            return $this->db->get_where($tabel, [$field => $id])->row_array();
        } elseif ($option == 'array') {
            //array
            $this->db->get_where($tabel, $data)->result();
        } elseif ($option == 'tambah') {
            $this->db->insert($tabel, $data);
            return true;
        } elseif ($option == 'update') {

            $this->db->where($field, $id);
            $this->db->update($tabel, $data);
            return true;
        } else {

            $this->db->where($field, $id);
            $this->db->delete($tabel);
            return true;
        }
    }


    function listingOne($id)
    {
        $this->db->select('tbl_pengaduan.*,
                        tbl_jns_pengaduan.nama_jns')
            ->from('tbl_pengaduan')
            ->join('tbl_jns_pengaduan', 'tbl_jns_pengaduan.id_jns = tbl_pengaduan.jns_pengaduan', 'LEFT')
            ->where('tbl_pengaduan.id_pengaduan', $id);
        return $this->db->get()->row_array();
    }
    function cekStatus($token)
    {
        $this->db->select('tbl_pengaduan.*,
                        tbl_jns_pengaduan.nama_jns')
            ->from('tbl_pengaduan')
            ->join('tbl_jns_pengaduan', 'tbl_jns_pengaduan.id_jns = tbl_pengaduan.jns_pengaduan', 'LEFT')
            ->where('tbl_pengaduan.token', $token);
        return $this->db->get()->row_array();
    }
}

/* End of file Crud_model.php */
