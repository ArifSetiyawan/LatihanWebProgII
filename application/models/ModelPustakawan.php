<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelPustakawan extends CI_Model
{

    public function getAll()
    {
        return $this->db->get('tbl_pustakawan');
    }

    public function getWhere($where = null)
    {
        return $this->db->get_where('tbl_pustakawan', $where);
    }

    public function simpanPustakawan($data = null)
    {
        $this->db->insert('tbl_pustakawan', $data);
    }

    public function hapusPustakawan($where = null)
    {
        $this->db->delete('tbl_pustakawan', $where);
    }

    public function updatePustakawan($data = null, $where = null)
    {
        $this->db->update('tbl_pustakawan', $data, $where);
    }

    public function autoNumber()
    {
        $this->db->select('id_pustakawan');
        $this->db->from('tbl_pustakawan');
        $this->db->order_by('id_pustakawan', 'desc');
        $this->db->limit(1);
        return $this->db->get();
    }
}
