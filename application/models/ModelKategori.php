<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelKategori extends CI_Model
{

    public function getAll()
    {
        return $this->db->get('tbl_kategori_buku');
    }

    public function getWhere($where = null)
    {
        return $this->db->get_where('tbl_kategori_buku', $where);
    }

    public function simpanKategori($data = null)
    {
        $this->db->insert('tbl_kategori_buku', $data);
    }

    public function hapusKategori($where = null)
    {
        $this->db->delete('tbl_kategori_buku', $where);
    }

    public function updateKategori($data = null, $where = null)
    {
        $this->db->update('tbl_kategori_buku', $data, $where);
    }

    public function autoNumber()
    {
        $this->db->select('id_kategori_buku');
        $this->db->from('tbl_kategori_buku');
        $this->db->order_by('id_kategori_buku', 'desc');
        $this->db->limit(1);
        return $this->db->get();
    }
}
