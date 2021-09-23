<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelAdmin extends CI_Model {

	public function cekLoginAdmin($where = null)
	{
		$this->db->select('*');
        $this->db->from('tbl_pustakawan');
        $this->db->where($where);
        return $this->db->get();
	}

    public function getWhere($where = null)
	{
		return $this->db->get_where('tbl_pustakawan', $where);
	}
}
