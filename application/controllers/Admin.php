<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{
		$this->load->view('admin/login/login');
	}

    public function login()
	{
		$this->load->view('admin/login/login');
	}

    public function authentifikasi()
	{
		$username = $this->input->post('username', true);
        $password = sha1($this->input->post('password', true));

        $array_input = [
            'username_pustakawan' => $username,
            'passw_pustakawan' => $password
        ];

        $sql = $this->ModelAdmin->cekLoginAdmin($array_input);
        $cek_user = $sql->row_array();

        if (!$cek_user) {
            ?>
            <script type="text/javascript">
                alert("Maaf Username dan Password Salah !!!")
                document.location = "<?php echo base_url('admin/login')?>";
            </script>
            <?php
        } else {
            $data = [
                'idpustakawan' => $cek_user['id_pustakawan'],
                'enid' => sha1($cek_user['id_pustakawan'])
            ];
            $this->session->set_userdata($data);
            ?>
            <script type="text/javascript">
                alert("Selamat Datang <?php echo $cek_user['nama_pustakawan']; ?>");
                document.location = "<?php echo base_url('admin/dashboard')?>";
            </script>
            <?php
        }
        

	}

    public function dashboard()
	{
		$this->load->view('admin/login/dashboard');
	}
}
