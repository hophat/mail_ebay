<?php

class Thongke_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }


    public function get($user_id, $date)
    {
        $where['chot_so_user_id']  = $user_id;
        $where['date']  = $date;
        return $this->db->get_where('tbl_chot_so', $where)->row_array();
    }

    public function get_top_lo()
    {
        // $this->db->join('tbl_user', 'tbl_user. user_id = tbl_chot_so.chot_so_user_id');
        $this->db->select("user_avatar,user_id,user_diem_btl,user_diem_db,user_diem_lo,user_name");
        $this->db->order_by('user_diem_lo', 'DESC');
        $this->db->group_by('tbl_user. user_id');
        $this->db->limit(10);
        $data =  $this->db->get('tbl_user')->result_array();
        $out = [];
        $now = date('Y-m-d');
        foreach ($data as $row) {
            $row['chotso'] = $this->db->get_where('tbl_chot_so', ['chot_so_user_id' => $row['user_id'], 'date' => $now])->row_array();
            $row['user_avatar'] = base_url($row['user_avatar']);
            $out[] = $row;
        }
        return $out;
    }

    public function get_top_btl()
    {
        // $this->db->join('tbl_user', 'tbl_user. user_id = tbl_chot_so.chot_so_user_id');
        $this->db->select("user_avatar,user_id,user_diem_btl,user_diem_db,user_diem_lo,user_name");
        $this->db->order_by('user_diem_btl', 'DESC');
        $this->db->group_by('tbl_user. user_id');
        $this->db->limit(10);
        $data =  $this->db->get('tbl_user')->result_array();
        $out = [];
        $now = date('Y-m-d');
        foreach ($data as $row) {
            $row['chotso'] = $this->db->get_where('tbl_chot_so', ['chot_so_user_id' => $row['user_id'], 'date' => $now])->row_array();
            $row['user_avatar'] = base_url($row['user_avatar']);
            $out[] = $row;
        }
        return $out;
    }

    public function get_top_db()
    {
        // $this->db->join('tbl_user', 'tbl_user. user_id = tbl_chot_so.chot_so_user_id');
        $this->db->select("user_avatar,user_id,user_diem_btl,user_diem_db,user_diem_lo,user_name");
        $this->db->order_by('user_diem_db', 'DESC');
        $this->db->group_by('tbl_user. user_id');
        $this->db->limit(10);
        $data =  $this->db->get('tbl_user')->result_array();
        $out = [];
        $now = date('Y-m-d');
        foreach ($data as $row) {
            $row['chotso'] = $this->db->get_where('tbl_chot_so', ['chot_so_user_id' => $row['user_id'], 'date' => $now])->row_array();
            $row['user_avatar'] = base_url($row['user_avatar']);
            $out[] = $row;
        }
        return $out;
    }

    // danh sách lo được chôt nhiều theo ngày
    public function get_list_lo_chot_nhieu($date = '')
    {
        $this->db->select('COUNT(lo_total) as sort, lo_total, date');
        $this->db->from('thongke_lo');
        $this->db->group_by('lo_total');
        $this->db->order_by('sort', 'DESC');
        $this->db->where(['date' => $date]);
        $this->db->limit(10);
        return $this->db->get()->result_array();
        // SELECT COUNT(lo_total) as sort, lo_total, date FROM thongke_lo WHERE date='2021-06-26'
        //  GROUP BY lo_total ORDER by sort DESC
    }
    // danh sách lo được chôt nhiều theo ngày
    public function get_list_db_chot_nhieu($date = '')
    {
        $this->db->select('COUNT(de) as sort, de, date');
        $this->db->from('thongke_db');
        $this->db->group_by('de');
        $this->db->order_by('sort', 'DESC');
        $this->db->where(['date' => $date]);
        $this->db->limit(10);
        return $this->db->get()->result_array();
        // SELECT COUNT(lo_total) as sort, lo_total, date FROM thongke_lo WHERE date='2021-06-26'
        //  GROUP BY lo_total ORDER by sort DESC
    }
}
