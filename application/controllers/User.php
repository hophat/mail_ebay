<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('session', 'layout'));
        $this->load->helper(array('url'));
        $this->load->model('User_model');
    }
    // function get_kq_xs()
    // {
    //     $html = file_get_html('https://chotlo.com/');
    //     $html->find('#div_bor_ketqua')[0]->outertext;
    // }
    public function index()
    {
        $this->layout->set_title('Test! This is test title');
        $this->layout->set_body_attr(array('id' => 'home', 'class' => 'test more_class'));

        // load views and send data
        $this->layout->set_title('Email ebay');
        $data = [];
        $this->load->view('header', $data);
        $this->load->view('home/index', $data);
    }

    public function add()
    {
        $params['user_pass'] = $this->input->post('user_pass');
        $params['user_name'] = $this->input->post('user_name');
        $added  = $this->User_model->add($params);
        if ($added == 0) {
            echo json_encode(['status' => false]);
        } else {
            echo json_encode(['status' => true]);
        }
    }

    public function get_list()
    {
        $data = $this->User_model->get_list();
        // $out = [];
        // foreach ($data as $row) {
        //     $row['acc_actived'] = ($row['acc_actived'] == 1) ? true : false;
        //     $out[] = $row;
        // }
        echo json_encode($data);
    }

    public function get($user_id)
    {
        $data = $this->User_model->get($user_id);
        // $out = [];
        // foreach ($data as $row) {
        //     $row['acc_actived'] = ($row['acc_actived'] == 1) ? true : false;
        //     $out[] = $row;
        // }
        echo json_encode($data);
    }

    public function update()
    {
        $user_name = $this->input->post('user_name');
        $user_pass =  $this->input->post('user_pass');
        if (empty($user_pass)) {
            echo json_encode(['status' => false]);
            die;
        }
        $params['user_pass'] = md5($user_pass);
        $updated = $this->User_model->update($user_name, $params);
        if ($updated == 0) {
            echo json_encode(['status' => false]);
        } else {
            echo json_encode(['status' => true]);
        }
    }
    public function del()
    {
        $user_id = $this->input->post('user_id');
        if (empty($user_id)) {
            echo json_encode(['status' => false]);
            die;
        }
        $deled = $this->User_model->del($user_id);
        if ($deled == 0) {
            echo json_encode(['status' => false]);
        } else {
            echo json_encode(['status' => true]);
        }
    }
}
