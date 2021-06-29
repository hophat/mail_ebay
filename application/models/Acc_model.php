<?php

class Acc_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function add($params)
    {
        $where['acc_email'] = $params['acc_email'];
        $out =  $this->db->get_where('acc', $where)->row_array();
        if ($out) {
            return 0;
        } else {
            return $this->db->insert('acc', $params);
        }
    }
    public function update($params, $acc_id)
    {
        $where['acc_id'] = $acc_id;
        return  $this->db->update('acc', $params, $where);
    }
    public function del($acc_id)
    {
        $where['acc_id'] = $acc_id;
        return  $this->db->delete('acc', $where);
    }

    public function get($acc_id)
    {
        $where['acc_id']  = $acc_id;
        return $this->db->get_where('acc', $where)->row_array();
    }

    public function get_list()
    {
        // $where['date']  = $date;
        // $this->db->join('acc', 'tbl_user. user_id = tbl_chot_so.chot_so_user_id');
        // $this->db->select("tbl_chot_so.*, user_avatar,user_diem_btl,user_diem_db,user_diem_lo,user_name");
        return  $this->db->get('acc')->result_array();
    }
}
