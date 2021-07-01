<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Thongke extends CI_Controller
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
        $this->load->model('Mail_model');
    }

    public function index()
    {
        $date = $this->input->get('date');
        $this->layout->set_title('Test! This is test title');
        $this->layout->set_body_attr(array('id' => 'home', 'class' => 'test more_class'));
        // load views and send data
        $data = [];
        $this->load->view('header', $data);
        // $this->load->view('components/menu', $data);
        // $this->load->view('thongke', $data);
        $this->load->view('thong_ke_mail/index', $data);
        // $this->load->view('footer', $data);
    }

    public function get_list($date = '')
    {
        if ($date == '') {
            $date = date('Y-m-d');
        }

        $data = $this->Mail_model->get_thong_ke($date);
        $out = [];
        foreach ($data as $row) {
            $row['code_status'] = $this->get_code_stauts($row['link_check']);
            $out[] = $row;
        }
        echo json_encode($out);
    }
    public function get_code_stauts($url)
    {
        $hear = get_headers($url);
        if (strpos($hear[0], '404') > -1) {
            return false;
        }
        return true;
    }
    public function get_list_mail_type($date = '', $type = '', $acc_id = '')
    {
        // var_dump($type);
        if ($type == 'orther') {
            $type = '';
        }
        $data = $this->Mail_model->get_list_mail($date, $type, $acc_id);
        echo json_encode($data);
    }
}
