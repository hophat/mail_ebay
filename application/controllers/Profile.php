<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        include APPPATH . 'third_party/simple_html_dom.php';
        $this->load->library(array('session', 'layout'));
        $this->load->helper(array('url'));
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
        $data = [];
        $this->load->view('header', $data);
        $this->load->view('components/menu', $data);
        $this->load->view('profile/profile', $data);
        $this->load->view('footer', $data);
    }
}
