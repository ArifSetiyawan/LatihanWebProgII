<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

	public function pinjam_buku()
	{
        $data['judul_web'] = "Transaksi Peminjaman Buku";
        $data['active_menu'] = "pinjam_buku";

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
		$this->load->view('admin/trx/pinjam-buku');
        $this->load->view('template/footer');
	}
}
