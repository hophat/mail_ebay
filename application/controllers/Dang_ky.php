<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dang_ky extends MY_Controller
{
    /**
     * __construct function.
     *
     * @access public
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        include APPPATH . 'third_party/simple_html_dom.php';
        $this->load->library(array('session', 'layout'));
        $this->load->helper(array('url', 'form'));
        $this->load->model('User_model');
        $this->load->library('my_system');
    }

    public function index()
    {
        $this->layout->set_title('Test! This is test title');
        $this->layout->set_body_attr(array('id' => 'home', 'class' => 'test more_class'));
        // load views and send data
        $data = [];
        $this->load->view('header', $data);
        $this->load->view('components/menu', $data);
        $this->load->view('components/thongbao', $data);
        $this->load->view('regs/index', $data);
        $this->load->view('footer', $data);
    }


    public function dang_ky()
    {

        $submit = $this->input->post('submit');
        $user_phone_number = $this->input->post('user_phone');
        $user_pass = $this->input->post('user_pass');
        $user_full_name = $this->input->post('user_name');
        $user_email = $this->input->post('user_email');
        // $user_user_name = $this->input->post('user_name');

        $this->form_validation->set_rules('user_name', 'user_name', 'required|trim|max_length[50]');
        $this->form_validation->set_rules('user_pass', 'user_pass', 'required|trim|max_length[20]');
        $this->form_validation->set_rules('user_phone', 'user_phone', 'required|trim|max_length[20]');
        $this->form_validation->set_rules('user_email', 'user_email', 'required|trim|max_length[50]');

        if (!$this->form_validation->run()) {
            var_dump(validation_errors());
            die();
        }
        // hanled
        // $parrams['user_phone_number'] = $user_phone_number;
        $parrams['user_pass'] = $user_pass;
        $parrams['user_avatar'] = "/assets/img/user.jpeg";
        $parrams['user_name'] = $user_full_name;
        $parrams['user_phone'] = $user_phone_number;
        $parrams['user_email'] = $user_email;
        $dup = $this->User_model->check($user_phone_number);
        if ($dup) {
            $this->session->set_flashdata('alert_error', 'SĐT đã đăng ký');
            redirect("/dang_ky");
        }

        // var_dump($parrams);die;
        $reged = $this->User_model->add($parrams);

        if (!$reged) {
            $this->session->set_flashdata('alert_error', 'Đăng ký lỗi');
            redirect("/dang_ky");
        } else {
            $this->session->set_flashdata('alert_success', 'Đăng ký thành công');
            redirect('/');
        }
    }
}
