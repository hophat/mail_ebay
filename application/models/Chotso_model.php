<?php

class Chotso_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function add($params)
    {
        $out = $this->get($params['chot_so_user_id'], $params['date']);
        if ($out) {
            $where['chot_so_id']  = $out['chot_so_id'];
            return $this->db->update('tbl_chot_so', $params, $where);
        } else {
            return $this->db->insert('tbl_chot_so', $params);
        }
    }

    public function get($user_id, $date)
    {
        $where['chot_so_user_id']  = $user_id;
        $where['date']  = $date;
        return $this->db->get_where('tbl_chot_so', $where)->row_array();
    }

    public function get_list($date)
    {
        $where['date']  = $date;
        $this->db->join('tbl_user', 'tbl_user. user_id = tbl_chot_so.chot_so_user_id');
        $this->db->select("tbl_chot_so.*, user_avatar,user_diem_btl,user_diem_db,user_diem_lo,user_name");
        $data =  $this->db->get_where('tbl_chot_so', $where)->result_array();
        foreach ($data as $row) {
            $row['user_avatar'] = base_url($row['user_avatar']);
            $out[] = $row;
        }
        return $out;
    }
}
