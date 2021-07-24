<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Acc extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        // include APPPATH . 'third_party/simple_html_dom.php';
        // $this->load->library(array('session', 'layout'));
        // $this->load->helper(array('url'));
        $this->load->model('Acc_model');
        if(!isset($_SESSION['logined'])) {
            redirect("/welcome");
            die;
        }
      
    }

    public function index()
    {
    }

    public function add()
    { 
       
        $user_id  = $_SESSION['user']['user_id'];
        $params['acc_email'] = $this->input->post('acc_email');
        $params['acc_pass'] = $this->input->post('acc_pass');
        $params['acc_name'] = $this->input->post('acc_name');
        $params['link_check'] = $this->input->post('link_check');
        $params['user_id'] = $user_id;
        $added  = $this->Acc_model->add($params);
        if ($added == 0) {
            echo json_encode(['status' => false]);
        } else {
            echo json_encode(['status' => true]);
        }
    }

    public function get_list()
    {
        $user_id  = $_SESSION['user']['user_id'];
        $data = $this->Acc_model->get_list( $user_id);
        $out = [];
        foreach ($data as $row) {
            $row['acc_actived'] = ($row['acc_actived'] == 1) ? true : false;
            $out[] = $row;
        }
        echo json_encode($out);
    }
    public  function update()
    {
        $params['acc_email'] = $this->input->post('acc_email');
        $params['acc_pass'] = $this->input->post('acc_pass');
        $params['acc_name'] = $this->input->post('acc_name');
        $params['link_check'] = $this->input->post('link_check');
        $acc_id = $this->input->post('acc_id');
        if (empty($acc_id)) {
            die('lỗi');
        }
        $added  = $this->Acc_model->update($params, $acc_id);
        if ($added == 0) {
            echo json_encode(['status' => false]);
        } else {
            echo json_encode(['status' => true]);
        }
    }
    public  function active()
    {
        $params['acc_actived'] = $this->input->post('acc_actived');
        $acc_id = $this->input->post('acc_id');
        if (empty($acc_id)) {
            die('lỗi');
        }
        $added  = $this->Acc_model->update($params, $acc_id);
        if ($added == 0) {
            echo json_encode(['status' => false]);
        } else {
            echo json_encode(['status' => true]);
        }
    }

    public  function del()
    {
        $acc_id = $this->input->post('acc_id');
        if (empty($acc_id)) {
            die('lỗi');
        }
        $added  = $this->Acc_model->del($acc_id);
        if ($added == 0) {
            echo json_encode(['status' => false]);
        } else {
            echo json_encode(['status' => true]);
        }
    }
    public function get($acc_id)
    {
        $data = $this->Acc_model->get($acc_id);
        $data['acc_actived'] = ($data['acc_actived'] == 1) ? true : false;
        echo json_encode($data);
    }
}
