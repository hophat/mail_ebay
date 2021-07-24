<?php

class User_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function add($params)
    {
        $params['user_name']  = $params['user_name'];
        $params['user_pass']  = md5($params['user_pass']);
        return $this->db->insert('tbl_user', $params);
    }
    public function del($user_id)
    {
        $params['user_id']  = $user_id;
        return $this->db->delete('tbl_user', $params);
    }

    public function login($user_name, $pass)
    {
        $where['user_name']  = $user_name;
        $where['user_pass']  = md5($pass);

        return $this->db->get_where('tbl_user', $where)->row_array();
    }

    public function check($phone)
    {
        $where['user_name']  = $phone;
        return $this->db->get_where('tbl_user', $where)->row_array();
    }

    public function update($user_name, $params)
    {
        return $this->db->update('tbl_user', $params, ['user_name' => $user_name]);
    }
    public function get($user_id)
    {
        $where['user_id']  = $user_id;
        return $this->db->get_where('tbl_user', $where)->row_array();
    }

    public function get_list()
    {
        // $where['date']  = $date;
        // $this->db->join('acc', 'tbl_user. user_id = tbl_chot_so.chot_so_user_id');
        // $this->db->select("tbl_chot_so.*, user_avatar,user_diem_btl,user_diem_db,user_diem_lo,user_name");
        $this->db->join('acc', 'acc.user_id = tbl_user.user_id', 'left');
        $this->db->group_by('tbl_user.user_id');
        $this->db->select('tbl_user.*, count(acc.acc_id) as total_acc');
        return  $this->db->get_where('tbl_user')->result_array();
    }
}
