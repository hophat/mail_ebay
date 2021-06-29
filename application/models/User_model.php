<?php

class User_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function add($params)
    {
        $params['user_phone']  = $params['user_phone'];
        $params['user_pass']  = md5($params['user_pass']);
        return $this->db->insert('tbl_user', $params);
    }

    public function login($phone, $pass)
    {
        $where['user_phone']  = $phone;
        $where['user_pass']  = md5($pass);
    
        return $this->db->get_where('tbl_user', $where)->row_array();
    }

    public function check($phone)
    {
        $where['user_phone']  = $phone;
        return $this->db->get_where('tbl_user', $where)->row_array();
    }
}
