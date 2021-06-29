<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Chotso extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        include APPPATH . 'third_party/simple_html_dom.php';
        $this->load->library(array('session', 'layout'));
        $this->load->helper(array('url', 'form'));

        $this->load->model('Chotso_model');

        $this->load->library('my_system');
        if (AUTHED != 1) {
            $this->set_Response('', 403, 'auth error', false);
            die;
        }
    }


    public function get_chot($date)
    {
        $user_id = USER['user_id'];
        $data = $this->Chotso_model->get($user_id, $date);
        if (!$data) {
            $this->set_Response([], 400, ' failed', false);
            die;
        }
        $this->set_Response($data, 200, ' successfully');
    }
    public function get_list($date = '')
    {
        if ($date == '') {
            $date =  date('Y-m-d');
        }
        $data = $this->Chotso_model->get_list($date);
        if (!$data) {
            $this->set_Response([], 400, ' failed', false);
            die;
        }
        $this->set_Response($data, 200, ' successfully');
    }

    public function chot()
    {

        $lo_1 = $this->input->post('lo_1');
        $lo_2 = $this->input->post('lo_2');
        $lo_btl = $this->input->post('lo_btl');
        $de_1 = $this->input->post('de_1');
        $de_2 = $this->input->post('de_2');
        $de_3 = $this->input->post('de_3');
        $de_4 = $this->input->post('de_4');
        $de_5 = $this->input->post('de_5');
        $de_6 = $this->input->post('de_6');

        // $this->form_validation->set_rules('user_name', 'user_name', 'required|trim|max_length[50]');
        // $this->form_validation->set_rules('user_pass', 'user_pass', 'required|trim|max_length[20]');
        // $this->form_validation->set_rules('user_phone', 'user_phone', 'required|trim|max_length[20]');
        // $this->form_validation->set_rules('user_email', 'user_email', 'required|trim|max_length[50]');

        // if (!$this->form_validation->run()) {
        //     var_dump(validation_errors());
        //     die();
        // }
        $parrams['lo_1'] = $this->not_null($lo_1);
        $parrams['lo_2'] = $this->not_null($lo_2);
        $parrams['lo_btl'] = $this->not_null($lo_btl);
        $parrams['de_1'] = $this->not_null($de_1);
        $parrams['de_2'] = $this->not_null($de_2);
        $parrams['de_3'] = $this->not_null($de_3);
        $parrams['de_4'] = $this->not_null($de_4);
        $parrams['de_5'] = $this->not_null($de_5);
        $parrams['de_6'] = $this->not_null($de_6);

        $parrams['chot_so_user_id'] = USER['user_id'];
        $parrams['date'] =  date("Y-m-d");
        // var_dump($parrams);die;
        $reged = $this->Chotso_model->add($parrams);
        if (!$reged) {
            $this->set_Response([], 400, 'add failed', false);
            die;
        }
        $this->set_Response('', 200, 'add successfully');
    }
    public function not_null($input)
    {
        return  empty($input) ? '00' : (int)$input;
    }
}
