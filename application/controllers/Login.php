
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function index()
    {
        $this->load->view('login');
    }

    public function auth()
    {
        $username     = $this->input->post('username', true);
        $password     = $this->input->post('password', true);

        $user = $this->db->get_where('tbl_user', ['username' => $username])->row_array();

        if ($user) {
            if ($user['is_active'] == 1) {
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'username' => $user['username'],
                        'role_id' => $user['role_id'],
                        'nama' => $user['nama'],
                        'id_user' => $user['id_user'],
                    ];
                    $this->session->set_userdata($data);
                    $return = array(
                        'status'    => true,
                    );
                } else {
                    $return = array(
                        'status'    => false,

                    );
                }
            } else {
                $return = array(
                    'status'    => false,

                );
            }
        } else {
            $return = array(
                'status'    => false,

            );
        }
        echo json_encode($return);
    }

    function logout()
    {
        $this->session->sess_destroy();
        session_start();
        session_destroy();
        redirect('login', 'refresh');
    }
}

/* End of file Login.php */
