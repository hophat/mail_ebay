<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends MY_Controller
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


    public function logout()
    {

        unset($_SESSION['logined']);
        unset($_SESSION['user']);
        redirect(base_url('/'));
    }

    public function login()
    {

        $submit = $this->input->post('submit');
        $user_phone_number = $this->input->post('user_phone');
        $user_pass = $this->input->post('user_pass');
        $this->form_validation->set_rules('user_pass', 'user_pass', 'required|trim|max_length[20]');
        $this->form_validation->set_rules('user_phone', 'user_phone', 'required|trim|max_length[20]');
        if (!$this->form_validation->run()) {
            var_dump(validation_errors());
            die();
        }
        // hanled

        $parrams['user_pass'] = $user_pass;
        $parrams['user_phone'] = $user_phone_number;

        $reged = $this->User_model->login($user_phone_number, $user_pass);
        if ($reged) {
            // $this->set_response('', 400, 'Register failed', false);
            $_SESSION['logined'] = 1;
            $_SESSION['user'] = $reged;
            // $this->session->set_flashdata('alert_success', 'Đăng nhập thàng công');
            redirect("/Thongke");
        } else {
            $this->session->set_flashdata('alert_error', 'Sai pass');
            redirect();
            // echo "flaeud";
        }
    }
}
