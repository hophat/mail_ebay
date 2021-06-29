<?php



class MY_system
{


	protected $CI;

	public function __construct()
	{
		$this->CI = &get_instance();
	}

	public function alert($content = '', $status = 'success')
	{
		$temp = '
		<div class="alert alert alert-' . $status . ' alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		' . $content . '
		</div>
		';
		$this->CI->session->set_flashdata('alert', $temp);
	}

	function gd2_img($link, $width = '130', $height = '90')
	{
		$this->CI->load->library('image_lib');
		$config['image_library'] = 'gd2';
		$config['source_image'] = $link;
		$config['create_thumb'] = TRUE;
		$config['maintain_ratio'] = TRUE;
		$config['width']     = $width;
		$config['height']   = $height;

		$this->CI->image_lib->clear();
		$this->CI->image_lib->initialize($config);
		$this->CI->image_lib->resize();
		return $this->CI->image_lib->resize();
	}
	public function geo_location($lat = '', $long = '')
	{
		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, "https://maps.googleapis.com/maps/api/geocode/json?latlng=" . $lat . "," . $long . "&key=AIzaSyB7SkMn4g-xAtNBiaHlHQerWPFI68mwVqk");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');

		$headers = array();
		$headers[] = 'Authority: maps.googleapis.com';
		$headers[] = 'Pragma: no-cache';
		$headers[] = 'Cache-Control: no-cache';
		$headers[] = 'Upgrade-Insecure-Requests: 1';
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

		$result = curl_exec($ch);
		if (curl_errno($ch)) {
			echo 'Error:' . curl_error($ch);
		}
		curl_close($ch);
		return $result;
	}

	public function upload_file($data = [])
    {
        $default = [
            'uuid'          => '', 
            'allowed_types' => '*', 
            'max_size'      => '', 
            'max_width'     => '', 
            'max_height'    => '', 
            'upload_path'   => './uploads/tmp/',
            'input_files'   => 'qqfile',
            'table_name'    => '',
        ];

        foreach ($data as $key => $value) {
            if (isset($default[$key])) {
                $default[$key] = $value;
            }
        }

        $dir = FCPATH . $default['upload_path'] . $default['uuid'];
        if (!is_dir($dir)) {
            mkdir($dir);
        }

        if (empty($default['file_name'])) {
            $default['file_name'] = date('Y-m-d').$default['table_name'].date('His');
        }

        $config = [
            'upload_path'       => $default['upload_path'] . $default['uuid'] . '/',
            'allowed_types'     => $default['allowed_types'],
            'max_size'          => $default['max_size'],
            'max_width'         => $default['max_width'],
            'max_height'        => $default['max_height'],
            'file_name'         => $default['file_name']
        ];
        
        $this->load->library('upload', $config);
        $this->load->helper('file');

        if ( ! $this->upload->do_upload('qqfile')){
            $result = [
                'success'   => false,
                'error'     =>  $this->upload->display_errors()
            ];

            return json_encode($result);
        } else {
            $upload_data = $this->upload->data();

            $result = [
                'uploadName'    => $upload_data['file_name'],
                'previewLink'  => $dir.'/'.$upload_data['file_name'],
                'success'       => true,
            ];

            return json_encode($result);
        }
    }


	function upload_img($img_file, $path = '', $path_file = 'uploads/stations/')
	{
		$config['upload_path']          = $path;
		$config['allowed_types']        = 'jpg|jpeg|png';
		$config['max_size']             = 10 * 1024;
		// $config['max_width']            = 2000;
		// $config['max_height']           = 2000;
		$this->CI->load->library('upload', $config);
		$this->CI->upload->initialize($config);
		if (!$this->CI->upload->do_upload($img_file)) {
			$error = array('error' => $this->CI->upload->display_errors());
			return ['status' => false, 'message' => $error, 'path_img' => ''];
		} else {
			return  ['status' => true, 'message' => 'upload success', 'path_img' => array($path_file . $this->CI->upload->data()['file_name'])];
		}
	}


	function upload_exec($img_file, $path = '', $path_file = '')
	{
		$config['upload_path']          = $path;
		$config['allowed_types']        = 'xlsx';
		$config['max_size']             = 1024;
		$config['max_width']            = 1024;
		$config['max_height']           = 768;

		$this->CI->load->library('upload', $config);
		if (!$this->CI->upload->do_upload($img_file)) {

			return ['status' => false, 'message' => $this->CI->upload->display_errors(), 'path_file' => ''];
		} else {
			$link_file = $path_file . $this->CI->upload->data()['file_name'];
			return  [
				'status' => true,
				'message' => 'upload success',
				'path_file' => $link_file
			];
		}
	}

	function upload_document($document, $path = '', $path_file = '')
	{
		$config['upload_path']          = $path;
		$config['allowed_types']        =  'jpg|jpeg|png|doc|docx';
		$config['max_size']             = 3 * 1024;
		$config['max_width']            = 1024;
		$config['max_height']           = 768;

		$this->CI->load->library('upload', $config);
		$this->CI->upload->initialize($config);
		if (!$this->CI->upload->do_upload($document)) {

			return ['status' => false, 'message' => $this->CI->upload->display_errors(), 'path_file' => ''];
		} else {
			$link_file = $path_file . $this->CI->upload->data()['file_name'];
			return  [
				'status' => true,
				'message' => 'upload success',
				'path_file' => $link_file
			];
		}
	}




	function  upload_mutil_img($file_names, $path, $path_file = 'uploads/stations/', $max = 1)
	{
		$img_list = [];
		if (!is_array($_FILES[$file_names]['name'])) {
			// die;
			return $this->upload_img($file_names, $path, $path_file);
		}

		$count = count($_FILES[$file_names]['name']);
		// var_dump($count);
		for ($i = 0; $i < $count; $i++) {
			if ($i == $max) break;
			
			if (!empty($_FILES[$file_names]['name'][$i])) {
				// var_dump($_FILES[$file_names]['name']);
				$_FILES['file']['name'] = $_FILES[$file_names]['name'][$i];
				$_FILES['file']['type'] = $_FILES[$file_names]['type'][$i];
				$_FILES['file']['tmp_name'] = $_FILES[$file_names]['tmp_name'][$i];
				$_FILES['file']['error'] = $_FILES[$file_names]['error'][$i];
				$_FILES['file']['size'] = $_FILES[$file_names]['size'][$i];

				$config['upload_path']          = $path;
				$config['allowed_types']        =  'jpg|jpeg|png|doc|docx';
				$config['max_size']             = 5 * 1024;
				// $config['max_width']            = 1024;
				// $config['max_height']           = 768;
				// $config['file_name'] = $_FILES[$file_names]['name'][$i];
				// var_dump($_FILES);
				$this->CI->load->library('upload', $config);
				$this->CI->upload->initialize($config);
				if (!$this->CI->upload->do_upload('file')) {
					$error = array('error' => $this->CI->upload->display_errors());
					return ['status' => false, 'message' => $error, 'path_img' => ''];
				}
				// echo "123";
				// echo $path_file . $this->CI->upload->data()['file_name'];
				$img_list[] = $path_file . $this->CI->upload->data()['file_name'];
			}
		}
		return array('status' => true, 'message' => "uplaod success", "path_img" =>  $img_list);
	}


	function build_query_json($field_name_arr, $as_field)
	{
		$query_con = '';

		foreach ($field_name_arr as  $key => $file_name) {
			$end = count($field_name_arr) - 1;
			if ($end == $key) {
				$query_con .= <<<TEXT
					"$file_name" :"',$file_name,'"
TEXT;
			} else {
				$query_con .= <<<TEXT
					"$file_name" :"',$file_name,'",
TEXT;
			}
		}

		$query_con = <<<TEXT
			CONCAT('[',GROUP_CONCAT( DISTINCT CONCAT('{ $query_con }')),']') as $as_field
TEXT;
		return $query_con;
	}


	function  eval_($ma)
	{
		if (preg_match('/(\d+)(?:\s*)([\+\-\*\/])(?:\s*)(\d+)/', $ma, $matches) !== FALSE) {
			$operator = $matches[2];

			switch ($operator) {
				case '+':
					$p = $matches[1] + $matches[3];
					break;
				case '-':
					$p = $matches[1] - $matches[3];
					break;
				case '*':
					$p = $matches[1] * $matches[3];
					break;
				case '/':
					$p = $matches[1] / $matches[3];
					break;
				default:
					$p = NULL;
					break;
			}

			return $p;
		}
	}

	// calculate geographical proximity
	function mathGeoProximity($latitude, $longitude, $radius, $miles = false)
	{
		$radius = $miles ? $radius : ($radius * 0.621371192);

		$lng_min = $longitude - $radius / abs(cos(deg2rad($latitude)) * 69);
		$lng_max = $longitude + $radius / abs(cos(deg2rad($latitude)) * 69);
		$lat_min = $latitude - ($radius / 69);
		$lat_max = $latitude + ($radius / 69);

		return array(
			'latitudeMin'  => $lat_min,
			'latitudeMax'  => $lat_max,
			'longitudeMin' => $lng_min,
			'longitudeMax' => $lng_max
		);
	}

	// calculate geographical distance between 2 points
	function mathGeoDistance($lat1, $lng1, $lat2, $lng2, $miles = false)
	{
		$pi80 = M_PI / 180;
		$lat1 *= $pi80;
		$lng1 *= $pi80;
		$lat2 *= $pi80;
		$lng2 *= $pi80;

		$r = 6372.797; // mean radius of Earth in km
		$dlat = $lat2 - $lat1;
		$dlng = $lng2 - $lng1;
		$a = sin($dlat / 2) * sin($dlat / 2) + cos($lat1) * cos($lat2) * sin($dlng / 2) * sin($dlng / 2);
		$c = 2 * atan2(sqrt($a), sqrt(1 - $a));
		$km = $r * $c;

		return ($miles ? ($km * 0.621371192) : $km);
	}



	public function google_distance($start_point = 0, $end_point = 0, $key_api = '')
	{
		$out = file_get_contents("https://maps.googleapis.com/maps/api/directions/json?origin=$start_point&destination=$end_point&key=$key_api");
		$decode = json_decode($out);

		if (isset($decode->routes[0]->legs[0]->distance->value))
			return $decode->routes[0]->legs[0]->distance->value;
		return -1;
	}

	public function google_geocode($key_api = '', $point = 0, $components = '')
	{
		$link = html_entity_decode("https://maps.googleapis.com/maps/api/geocode/json?latlng=$point&key=$key_api" . $components);
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $link);
		curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$result = curl_exec($ch);
		curl_close($ch);

		$decode = json_decode($result);

		if (is_null($decode)) {
			return -1;
		}

		if (count($decode->results) == 0) {
			return -1;
		}

		if (isset($decode->results))
			return $decode->results;
		return -1;
	}



	public function format_date($date)
	{
		return date('d/m/Y H:i', strtotime($date));
	}


	public function get_status_bill($status_id, $list_status)
	{
		foreach ($list_status as $row) {
			if ($status_id == $row['id'])
				return $row;
		}
	}

	public function build_cash_loan($month, $percent, $price_product)
	{

		$detail['month_interest'] =  round($price_product / 100 * $percent);
		$month_interest = $price_product / 100 * $percent;
		// tiền gốc phải tra mỗi tháng
		$detail['month_paid'] = round($price_product / $month);
		$month_paid = $price_product / $month;
		// tổng phải trả mỗi tháng
		$detail['month_paid_total'] =  $detail['month_paid'] +  $detail['month_interest'];
		$month_paid_total = $month_paid + $month_interest;
		// tổng phải trả 
		$detail['total'] = round($month_paid_total *  $month);
		return $detail;
	}

	public function search_obj_in_array($array,$searchedValue, $key='id'){
		 return $neededObject = array_filter(
            $array,
            function ($e) use ($searchedValue,$key) {
                return $e->$key == $searchedValue;
            }
        );
	}


	function numInWords($num)
    {
        $nwords = array(
            0                   => 'không',
            1                   => 'một',
            2                   => 'hai',
            3                   => 'ba',
            4                   => 'bốn',
            5                   => 'năm',
            6                   => 'sáu',
            7                   => 'bảy',
            8                   => 'tám',
            9                   => 'chín',
            10                  => 'mười',
            11                  => 'mười một',
            12                  => 'mười hai',
            13                  => 'mười ba',
            14                  => 'mười bốn',
            15                  => 'mười lăm',
            16                  => 'mười sáu',
            17                  => 'mười bảy',
            18                  => 'mười tám',
            19                  => 'mười chín',
            20                  => 'hai mươi',
            30                  => 'ba mươi',
            40                  => 'bốn mươi',
            50                  => 'năm mươi',
            60                  => 'sáu mươi',
            70                  => 'bảy mươi',
            80                  => 'tám mươi',
            90                  => 'chín mươi',
            100                 => 'trăm',
            1000                => 'nghìn',
            1000000             => 'triệu',
            1000000000          => 'tỷ',
            1000000000000       => 'nghìn tỷ',
            1000000000000000    => 'ngàn triệu triệu',
            1000000000000000000 => 'tỷ tỷ',
        );
        $separate = ' ';
        $negative = ' âm ';
        $rltTen   = ' linh ';
        $decimal  = ' phẩy ';
        if (!is_numeric($num)) {
            $w = '#';
        } else if ($num < 0) {
            $w = $negative . $this->numInWords(abs($num));
        } else {
            if (fmod($num, 1) != 0) {
                $numInstr    = strval($num);
                $numInstrArr = explode(".", $numInstr);
                $w           = $this->numInWords(intval($numInstrArr[0])) . $decimal . $this->numInWords(intval($numInstrArr[1]));
            } else {
                $w = '';
            if ($num < 21) // 0 to 20
            {
                $w .= $nwords[$num];
            } else if ($num < 100) {
                // 21 to 99
                $w .= $nwords[10 * floor($num / 10)];
                $r = fmod($num, 10);
                if ($r > 0) {
                    $w .= $separate . $nwords[$r];
                }

            } else if ($num < 1000) {
                // 100 to 999
                $w .= $nwords[floor($num / 100)] . $separate . $nwords[100];
                $r = fmod($num, 100);
                if ($r > 0) {
                    if ($r < 10) {
                        $w .= $rltTen . $separate . $this->numInWords($r);
                    } else {
                        $w .= $separate . $this->numInWords($r);
                    }
                }
            } else {
                $baseUnit     = pow(1000, floor(log($num, 1000)));
                $numBaseUnits = (int) ($num / $baseUnit);
                $r            = fmod($num, $baseUnit);
                if ($r == 0) {
                    $w = $this->numInWords($numBaseUnits) . $separate . $nwords[$baseUnit];
                } else {
                    if ($r < 100) {
                        if ($r >= 10) {
                            $w = $this->numInWords($numBaseUnits) . $separate . $nwords[$baseUnit] . ' không trăm ' . $this->numInWords($r);
                        }
                        else{
                            $w = $this->numInWords($numBaseUnits) . $separate . $nwords[$baseUnit] . ' không trăm linh ' . $this->numInWords($r);
                        }
                    } else {
                        $baseUnitInstr      = strval($baseUnit);
                        $rInstr             = strval($r);
                        $lenOfBaseUnitInstr = strlen($baseUnitInstr);
                        $lenOfRInstr        = strlen($rInstr);
                        if (($lenOfBaseUnitInstr - 1) != $lenOfRInstr) {
                            $numberOfZero = $lenOfBaseUnitInstr - $lenOfRInstr - 1;
                            if ($numberOfZero == 2) {
                                $w = $this->numInWords($numBaseUnits) . $separate . $nwords[$baseUnit] . ' không trăm linh ' . $this->numInWords($r);
                            } else if ($numberOfZero == 1) {
                                $w = $this->numInWords($numBaseUnits) . $separate . $nwords[$baseUnit] . ' không trăm ' . $this->numInWords($r);
                            } else {
                                $w = $this->numInWords($numBaseUnits) . $separate . $nwords[$baseUnit] . $separate . $this->numInWords($r);
                            }
                        } else {
                            $w = $this->numInWords($numBaseUnits) . $separate . $nwords[$baseUnit] . $separate . $this->numInWords($r);
                        }
                    }
                }
            }
        }
    }
    return $w;
}

function numberInVietnameseWords($num) {
    return str_replace("mươi năm", "mươi lăm", str_replace("mươi một", "mươi mốt", $this->numInWords($num)));
}

function numberInVietnameseCurrency($num)
{
    $rs    = $this->numberInVietnameseWords($num);
    $rs[0] = strtoupper($rs[0]);
    return $rs . ' đồng';
}
    // function test_read_number(){
    //     $num = 1000000;
    //     echo  $this->numberInVietnameseCurrency($num);
    // }
}
