<?php

class Sx_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function add($params)
    {
        return $this->db->insert('tbl_kq_xs', $params);
    }
    public function get($date)
    {
        $where['kq_xs_date']  = $date;
        return $this->db->get_where('tbl_kq_xs', $where)->row_array();
    }

    public function add_dau($params)
    {
        return $this->db->insert('tbl_kq_lo_dau', $params);
    }

    public function get_list_dau($date)
    {
        $where['date']  = $date;
        return $this->db->get_where('tbl_kq_lo_dau', $where)->row_array();
    }


    public function add_duoi($params)
    {
        return $this->db->insert('tbl_kq_lo_duoi', $params);
    }

    public function get_list_duoi($date)
    {
        $where['date']  = $date;
        return $this->db->get_where('tbl_kq_lo_duoi', $where)->row_array();
    }
}
