<?php

class Mail_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }


    public function add($params)
    {
        return $this->db->insert('mail_data', $params);
    }
    public function update($mail_id, $params)
    {
        return $this->db->update('mail_data', $params, ['mail_id' => $mail_id]);
    }


    public function get($user_id, $mail_uid)
    {
        $where['mail_acc']  = $user_id;
        $where['mail_uid']  = $mail_uid;
        return $this->db->get_where('mail_data', $where)->row_array();
    }





    // danh sách lo được chôt nhiều theo ngày
    public function get_thong_ke($date = '2021-06-11')
    {
        // get acc
        $users = $this->db->get('acc')->result_array();
        // get list mail
        $out = [];
        foreach ($users as $user) {
            $this->db->from('mail_data');
            $this->db->select('COUNT(*) as count,code_status, link_check,acc_id, DATE(mail_date) as mail_date,acc_name,mail_type');
            $this->db->join('acc', 'acc.acc_id = mail_data.mail_acc', 'left');
            $this->db->group_by('mail_acc');
            $this->db->group_by('mail_type');
            $this->db->where(['DATE(mail_date)' => $date, 'mail_acc' => $user['acc_id']]);
            $data_mail =   $this->db->get()->result_array();
            $data_row = [
                'acc_name' => $user['acc_name'],
                'acc_id' => $user['acc_id'],
                'save' => 0,
                'other' => 0,
                'mess' => 0,
                'code_status' => $user['code_status'],
                'link_check' => $user['link_check'],
                'date' => $date
            ];
            if ($data_mail) {
                foreach ($data_mail as $mail) {

                    if ($mail['mail_type'] == '') {
                        $data_row['other'] = $mail['count'];
                    }
                    if ($mail['mail_type'] == 'save') {
                        $data_row['save'] = $mail['count'];
                    }
                    if ($mail['mail_type'] == 'mess') {
                        $data_row['mess'] = $mail['count'];
                    }
                }
            }
            $out[] =  $data_row;
        }
        return $out;
    }



    // danh sách lo được chôt nhiều theo ngày
    public function get_list_mail($date = '2021-06-11', $type = 'save', $acc_id = 1)
    {
        // get list mail
        $this->db->from('mail_data');
        $this->db->select('*, DATE(mail_date) as mail_date');
        $this->db->where(['DATE(mail_date)' => $date, 'mail_type' =>  $type, 'mail_acc' =>  $acc_id]);
        // var_dump(['DATE(mail_date)' => $date, 'mail_type' =>  $type, 'mail_acc' =>  $acc_id]);
        $this->db->limit(10);
        $data_mail =   $this->db->get()->result_array();

        return $data_mail;
    }
}
