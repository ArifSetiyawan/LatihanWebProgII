<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

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
            $this->session->set_flashdata('warning', "Maaf Username atau Password Salah !!!");
            redirect('admin');
        } else {
            $data = [
                'idpustakawan' => $cek_user['id_pustakawan'],
                'enid' => sha1($cek_user['id_pustakawan']),
                'username' => $cek_user['nama_pustakawan'],
                'akses' => $cek_user['akses_pustakawan']

            ];
            $this->session->set_userdata($data);
            redirect('admin/dashboard');
        }
    }

    public function dashboard()
    {
        $data['judul_web'] = "Dashboard";
        $data['active_menu'] = "dashboard";

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('admin/login/dashboard');
        $this->load->view('template/footer');
    }
    public function gantiPassword()
    {
        $data['judul_web'] = "Ganti Password";
        $data['active_menu'] = "ganti_password";

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('admin/login/ganti_password');
        $this->load->view('template/footer');
    }

    public function updatePassword()
    {
        $id_pustakawan = $_SESSION['idpustakawan'];
        $hasil = $this->ModelAdmin->getPassword(['id_pustakawan' => $id_pustakawan])->row_array();
        $pass_lama = sha1($this->input->post('p_lama', true));

        $data = [
            $pass_lama,
            $hasil
        ];

        print_r($data);
        die;
        $pass_baru = $this->input->post('p_baru', true);
        $konfirm_baru = $this->input->post('konfirm_baru', true);
        $where = ['id_pustakawan' => $id_pustakawan];

        if ($pass_lama == $hasil['passw_pustakawan']) {
            if ($konfirm_baru == $pass_baru) {
                $this->ModelAdmin->updatePassword(sha1($konfirm_baru), $where);
                $this->session->set_flashdata('success', "Data Password Berhasil Disimpan");
                redirect('admin/gantiPassword');
            } else {
                $this->session->set_flashdata('warning', "Konfirmasi Password baru tidak match");
                redirect('admin/gantiPassword');
            }
        } else {
            $this->session->set_flashdata('warning', "Data Password Lama tidak valid");
            redirect('admin/gantiPassword');
        }
    }
    public function masterAnggota()
    {

        $data['judul_web'] = "Master Data Anggota";
        $data['active_menu'] = "master_anggota";
        $data['data_anggota'] = $this->ModelAnggota->getAll()->result_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('admin/master/anggota/data_anggota');
        $this->load->view('template/footer');
    }

    public function tambahAnggota()
    {
        $data['judul_web'] = "Tambah Data Anggota";
        $data['active_menu'] = "tambah_anggota";

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('admin/master/anggota/tambah_anggota');
        $this->load->view('template/footer');
    }

    public function simpanAnggota()
    {
        $tahun = date("y");
        $hasil = $this->ModelAnggota->autoNumber(['substr(no_anggota,1,2)' => $tahun])->row_array();

        $kode = $hasil['no_anggota'];

        $noUrut = (int) substr($kode, 5, 4);
        $noUrut++;
        $id = date('ym') . sprintf('%04s', $noUrut);

        $passwordSTD = sha1('anggota123');

        $data = [
            'no_anggota' => $id,
            'no_identitas' => $this->input->post('no_ident', true),
            'nama_anggota' => $this->input->post('nama_anggota', true),
            'pass_anggota' => $passwordSTD,
            'tempat_lahir' => $this->input->post('tmpt_lahir', true),
            'tanggal_lahir' => $this->input->post('tgl_lahir', true),
            'jenis_kelamin' => $this->input->post('jk', true),
            'status_anggota' => $this->input->post('status', true),

        ];

        $simpan = $this->ModelAnggota->simpanAnggota($data);
        $this->session->set_flashdata('success', "Data Anggota Berhasil Disimpan");
        redirect('admin/masterAnggota');
    }

    public function hapusAnggota()
    {
        $where = ['sha1(no_anggota)' => $this->uri->segment(3)];
        $this->ModelAnggota->hapusAnggota($where);
        $this->session->set_flashdata('success', "Data Anggota Berhasil Dihapus");
        redirect('admin/masterAnggota');
    }

    public function editAnggota()
    {
        $data['judul_web'] = "Edit Data Anggota";
        $data['active_menu'] = "edit_anggota";

        $where = ['sha1(no_anggota)' => $this->uri->segment(3)];
        $hasil = $this->ModelAnggota->getWhere($where)->row_array();

        $idAnggota = [
            'idAnggota' => $hasil['no_anggota']
        ];

        $this->session->set_userdata($idAnggota);

        $dataEdit = [
            'no_ident' => $hasil['no_identitas'],
            'nama_anggota' => $hasil['nama_anggota'],
            'tempat_lahir' => $hasil['tempat_lahir'],
            'tanggal_lahir' => $hasil['tanggal_lahir'],
            'jk' => $hasil['jenis_kelamin'],
            'status' => $hasil['status_anggota']
        ];


        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('admin/master/anggota/edit_anggota', $dataEdit);
        $this->load->view('template/footer');
    }

    public function updateAnggota()
    {
        $id = $this->session->userdata('idAnggota');

        $where = ['no_anggota' => $id];

        $data = [
            'no_identitas' => $this->input->post('no_ident', true),
            'nama_anggota' => $this->input->post('nama_anggota', true),
            'tempat_lahir' => $this->input->post('tmpt_lahir', true),
            'tanggal_lahir' => $this->input->post('tgl_lahir', true),
            'jenis_kelamin' => $this->input->post('jk', true),
            'status_anggota' => $this->input->post('status', true),

        ];

        $simpan = $this->ModelAnggota->updateAnggota($data, $where);

        $this->session->unset_userdata('idAnggota');
        $this->session->set_flashdata('success', "Data Anggota Berhasil Diedit");
        redirect('admin/masterAnggota');
    }

    public function masterKategori()
    {
        $data['judul_web'] = "Master Data Kategori";
        $data['active_menu'] = "master_kategori";
        $data['data_kategori'] = $this->ModelKategori->getAll()->result_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('admin/master/kategori/data_kategori');
        $this->load->view('template/footer');
    }

    public function tambahKategori()
    {
        $data['judul_web'] = "Tambah Data Kategori";
        $data['active_menu'] = "tambah_kategori";

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('admin/master/kategori/tambah_kategori');
        $this->load->view('template/footer');
    }

    public function simpanKategori()
    {
        $hasil = $this->ModelKategori->autoNumber()->row_array();

        $kode = $hasil['id_kategori_buku'];

        $noUrut = (int) substr($kode, 2, 3);
        $noUrut++;
        $id = 'K' . sprintf('%03s', $noUrut);

        $data = [
            'id_kategori_buku' => $id,
            'nama_kategori_buku' => $this->input->post('nama_kategori', true),
            'status_kategori_buku' => "Aktif",

        ];

        $simpan = $this->ModelKategori->simpanKategori($data);
        $this->session->set_flashdata('success', "Data Kategori Berhasil Disimpan");
        redirect('admin/masterKategori');
    }

    public function hapusKategori()
    {
        $where = ['sha1(id_kategori_buku)' => $this->uri->segment(3)];
        $this->ModelKategori->hapusKategori($where);
        $this->session->set_flashdata('success', "Data Kategori Berhasil Dihapus");
        redirect('admin/masterKategori');
    }

    public function editKategori()
    {
        $data['judul_web'] = "Edit Data Kategori";
        $data['active_menu'] = "edit_kategori";

        $where = ['sha1(id_kategori_buku)' => $this->uri->segment(3)];
        $hasil = $this->ModelKategori->getWhere($where)->row_array();

        $idKategori = [
            'idKategori' => $hasil['id_kategori_buku']
        ];

        $this->session->set_userdata($idKategori);

        $dataEdit = [
            'nama_kategori' => $hasil['nama_kategori_buku'],
            'status' => $hasil['status_kategori_buku'],
        ];


        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('admin/master/kategori/edit_kategori', $dataEdit);
        $this->load->view('template/footer');
    }

    public function updateKategori()
    {
        $id = $this->session->userdata('idKategori');

        $where = ['id_kategori_buku' => $id];

        $data = [
            'id_kategori_buku' => $id,
            'nama_kategori_buku' => $this->input->post('nama_kategori', true),
            'status_kategori_buku' => $this->input->post('status', true),

        ];

        $simpan = $this->ModelKategori->updateKategori($data, $where);

        $this->session->unset_userdata('idKategori');
        $this->session->set_flashdata('success', "Data Kategori Berhasil Diedit");
        redirect('admin/masterKategori');
    }

    public function masterBuku()
    {
        $data['judul_web'] = "Master Data Buku";
        $data['active_menu'] = "master_buku";
        $data['data_buku'] = $this->ModelBuku->getJoinAll()->result_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('admin/master/buku/data_buku');
        $this->load->view('template/footer');
    }

    public function tambahBuku()
    {
        $data['judul_web'] = "Tambah Data Buku";
        $data['active_menu'] = "tambah_buku";
        $data['aktif_kategori'] = $this->ModelKategori->getWhere(['status_kategori_buku' => 'Aktif'])->result_array();


        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('admin/master/buku/tambah_buku');
        $this->load->view('template/footer');
    }

    public function simpanBuku()
    {
        $kd_kategori = $this->input->post('k_buku', true);
        $hasil = $this->ModelBuku->autoNumber(['id_kategori_buku' => $kd_kategori])->row_array();

        $kode = $hasil['kode_buku'];
        $noUrut = (int) substr($kode, 11, 5);
        $noUrut++;

        $id = $kd_kategori . '-' . date('ym') . '-' . sprintf('%05s', $noUrut);

        $data = [
            'kode_buku' => $id,
            'judul_buku' => $this->input->post('judul', true),
            'penulis_buku' => $this->input->post('penulis', true),
            'penerbit_buku' => $this->input->post('penerbit', true),
            'tahun_terbit' => $this->input->post('tahun_terbit', true),
            'stok_buku' => $this->input->post('stok', true),
            'id_kategori_buku' => $kd_kategori,

        ];

        $simpan = $this->ModelBuku->simpanBuku($data);
        $this->session->set_flashdata('success', "Data Buku Berhasil Disimpan");
        redirect('admin/masterBuku');
    }

    public function hapusBuku()
    {
        $where = ['sha1(kode_buku)' => $this->uri->segment(3)];
        $this->ModelBuku->hapusBuku($where);
        $this->session->set_flashdata('success', "Data Buku Berhasil Dihapus");
        redirect('admin/masterBuku');
    }

    public function editBuku()
    {
        $data['judul_web'] = "Edit Data Buku";
        $data['active_menu'] = "edit_buku";
        $data['aktif_kategori'] = $this->ModelKategori->getWhere(['status_kategori_buku' => 'Aktif'])->result_array();

        $where = ['sha1(kode_buku)' => $this->uri->segment(3)];
        $hasil = $this->ModelBuku->getWhere($where)->row_array();

        $idBuku = [
            'idBuku' => $hasil['kode_buku']
        ];

        $this->session->set_userdata($idBuku);

        $dataEdit = [
            'judul_buku' => $hasil['judul_buku'],
            'penulis_buku' => $hasil['penulis_buku'],
            'penerbit_buku' => $hasil['penerbit_buku'],
            'tahun_terbit' => $hasil['tahun_terbit'],
            'stok_buku' => $hasil['stok_buku'],
            'kategori_buku' => $hasil['id_kategori_buku'],
        ];


        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('admin/master/buku/edit_buku', $dataEdit);
        $this->load->view('template/footer');
    }

    public function updateBuku()
    {
        $id = $this->session->userdata('idBuku');

        $where = ['kode_buku' => $id];

        $data = [
            'kode_buku' => $id,
            'judul_buku' => $this->input->post('judul', true),
            'penulis_buku' => $this->input->post('penulis', true),
            'penerbit_buku' => $this->input->post('penerbit', true),
            'tahun_terbit' => $this->input->post('tahun_terbit', true),
            'stok_buku' => $this->input->post('stok', true),
            'id_kategori_buku' => $this->input->post('k_buku', true),

        ];

        $simpan = $this->ModelBuku->updateBuku($data, $where);

        $this->session->unset_userdata('idBuku');
        $this->session->set_flashdata('success', "Data Buku Berhasil Diedit");
        redirect('admin/masterBuku');
    }


    public function masterPustakawan()
    {
        $data['judul_web'] = "Master Data Pustakawan";
        $data['active_menu'] = "master_pustakawan";
        $data['data_pustakawan'] = $this->ModelPustakawan->getAll()->result_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('admin/master/pustakawan/data_pustakawan');
        $this->load->view('template/footer');
    }

    public function tambahPustakawan()
    {
        $data['judul_web'] = "Tambah Data Pustakawan";
        $data['active_menu'] = "tambah_pustakawan";

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('admin/master/pustakawan/tambah_pustakawan');
        $this->load->view('template/footer');
    }

    public function simpanPustakawan()
    {
        $hasil = $this->ModelPustakawan->autoNumber()->row_array();

        $kode = $hasil['id_pustakawan'];

        $noUrut = (int) substr($kode, 4, 3);
        $noUrut++;
        $id = 'PKN' . sprintf('%03s', $noUrut);

        $data = [
            'id_pustakawan' => $id,
            'nama_pustakawan' => $this->input->post('nama_pustakawan', true),
            'username_pustakawan' => $this->input->post('username', true),
            'passw_pustakawan' => sha1('pustakawan'),
            'akses_pustakawan' => 2

        ];

        $simpan = $this->ModelPustakawan->simpanPustakawan($data);
        $this->session->set_flashdata('success', "Data Pustakawan Berhasil Disimpan");
        redirect('admin/masterPustakawan');
    }

    public function hapusPustakawan()
    {
        $where = ['sha1(id_pustakawan)' => $this->uri->segment(3)];
        $this->ModelPustakawan->hapusPustakawan($where);
        $this->session->set_flashdata('success', "Data Pustakawan Berhasil Dihapus");
        redirect('admin/masterPustakawan');
    }

    public function editPustakawan()
    {
        $data['judul_web'] = "Edit Data Pustakawan";
        $data['active_menu'] = "edit_pustakawan";

        $where = ['sha1(id_pustakawan)' => $this->uri->segment(3)];
        $hasil = $this->ModelPustakawan->getWhere($where)->row_array();

        $idPustakawan = [
            'idPustakawan' => $hasil['id_pustakawan']
        ];

        $this->session->set_userdata($idPustakawan);

        $dataEdit = [
            'nama_pustakawan' => $hasil['nama_pustakawan'],
            'username_pustakawan' => $hasil['username_pustakawan'],
        ];


        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('admin/master/pustakawan/edit_pustakawan', $dataEdit);
        $this->load->view('template/footer');
    }

    public function updatePustakawan()
    {
        $id = $this->session->userdata('idPustakawan');

        $where = ['id_pustakawan' => $id];

        $data = [
            'id_pustakawan' => $id,
            'nama_pustakawan' => $this->input->post('nama_pustakawan', true),
            'username_pustakawan' => $this->input->post('username', true)

        ];

        $simpan = $this->ModelPustakawan->updatePustakawan($data, $where);

        $this->session->unset_userdata('idPustakawan');
        $this->session->set_flashdata('success', "Data Pustakawan Berhasil Diedit");
        redirect('admin/masterPustakawan');
    }

    public function logout()
    {
        $this->load->library('session');
        $this->session->sess_destroy();

        redirect('admin');
    }
}
