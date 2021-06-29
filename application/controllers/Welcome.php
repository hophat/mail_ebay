<?php
defined('BASEPATH') or exit('No direct script access allowed');



class Welcome extends MY_Controller
{

	public $date_now;

	public function __construct()
	{
		parent::__construct();
		include APPPATH . 'third_party/simple_html_dom.php';
		$this->load->library(array('session', 'layout'));
		$this->load->helper(array('url'));

		$this->load->model('Thongke_model');
		$this->layout->add_custom_meta('meta', array(
			'charset' => 'utf-8'
		));

		$this->layout->add_custom_meta('meta', array(
			'http-equiv' => 'X-UA-Compatible',
			'content' => 'IE=edge'
		));
		$this->date_now = date('Y-m-d');
	}
	function get_kq_xs($date)
	{
		$link = 'https://chotlo.com/ket-qua/mien-bac?date=' . $date;
		$html = file_get_html($link);
		$data_ =  $html->find('#div_bor_ketqua')[0]->find('li');
		$out['db'] = [$data_[0]->plaintext];
		$out['nhat'] = [$data_[1]->plaintext];
		$out['nhi'] = [$data_[2]->plaintext, $data_[3]->plaintext];
		$out['ba'] = [$data_[4]->plaintext, $data_[5]->plaintext, $data_[6]->plaintext, $data_[7]->plaintext, $data_[8]->plaintext, $data_[9]->plaintext];
		$out['tu'] = [$data_[10]->plaintext, $data_[11]->plaintext, $data_[12]->plaintext, $data_[13]->plaintext];
		$out['nam'] = [$data_[14]->plaintext, $data_[15]->plaintext, $data_[16]->plaintext, $data_[17]->plaintext, $data_[18]->plaintext, $data_[19]->plaintext];
		$out['sau'] = [$data_[20]->plaintext, $data_[21]->plaintext, $data_[22]->plaintext];
		$out['bay'] = [$data_[23]->plaintext, $data_[24]->plaintext, $data_[26]->plaintext, $data_[26]->plaintext];
		return $out;
	}

	function add_kq_lo_dau($date)
	{
		$link = 'https://chotlo.com/ket-qua/mien-bac?date=' . $date;
		$html = file_get_html($link);
		$data_ =  $html->find('.table_tk_ketqua')[0]->find('.number_ketqua');
		$data_in_sert = [];
		$total = '';
		foreach ($data_ as $key => $row) {
			$data_in_sert['lo_dau_' . $key] = trim($row->plaintext);
			if (!empty($row->plaintext)) {
				$total .= trim($row->plaintext) . ";";
			}
		}
		$data_in_sert['lo_dau_total'] = $total;
		if (empty($data_in_sert['lo_dau_total'])) {
			return false;
		}
		$data_in_sert['date'] = $date;
		$this->Sx_model->add_dau($data_in_sert);
		// var_dump($data_in_sert);
		// return $out;
	}

	function get_kq_lo_duoi($date)
	{
		$link = 'https://chotlo.com/ket-qua/mien-bac?date=' . $date;
		$html = file_get_html($link);
		$data_ =  $html->find('.table_tk_ketqua')[1]->find('.number_ketqua');
		$data_in_sert = [];
		$total = '';
		foreach ($data_ as $key => $row) {
			$data_in_sert['lo_duoi_' . $key] = trim($row->plaintext);
			if (!empty($row->plaintext)) {
				$total .= trim($row->plaintext) . ";";
			}
		}

		$data_in_sert['lo_duoi_total'] = $total;
		if (empty($total)) {
			return false;
		}
		$data_in_sert['date'] = $date;

		$this->Sx_model->add_duoi($data_in_sert);
	}

	public function index()
	{
		$this->layout->set_title('Chotlo');
		$data = [];
		$this->load->view('header', $data);
		$this->load->view('home/index', $data);

	}
}
