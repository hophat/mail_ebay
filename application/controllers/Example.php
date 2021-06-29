<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Example extends CI_Controller
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
        $this->load->library(array('session', 'layout'));
        $this->load->helper(array('url'));

        $this->layout->add_custom_meta('meta', array(
            'charset' => 'utf-8'
        ));

        $this->layout->add_custom_meta('meta', array(
            'http-equiv' => 'X-UA-Compatible',
            'content' => 'IE=edge'
        ));

        $this->layout->add_css_files(array('bootstrap.min.css', 'style.css'), base_url() . 'assets/css/');

        // Load view into a variable for importing javascript
        $js_text_footer = $this->load->view('footer_javascript', '', true);

        // $this->layout->add_css_rawtext($css_text);
        // $this->layout->add_js_rawtext($js_text);
        $this->layout->add_js_rawtext($js_text_footer, 'footer');
    }

    /**
     * index function.
     *
     * @access public
     * @param mixed $slug (default: false)
     * @return void
     */
    public function index()
    {
        $this->layout->set_title('Test! This is test title');
        $this->layout->set_body_attr(array('id' => 'home', 'class' => 'test more_class'));

        // load views and send data
        $this->load->view('header', $data);
        $this->load->view('index', $data);
        $this->load->view('footer', $data);
    }
}
