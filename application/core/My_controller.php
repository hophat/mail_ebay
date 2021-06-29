<?php defined('BASEPATH') or exit('No direct script access allowed');

// require(APPPATH . '/libraries/REST_Controller.php');
class MY_Controller  extends CI_Controller
{
    //
    public $CI;

    /**
     * An array of variables to be passed through to the
     * view, layout,....
     */
    protected $data = array();

    /**
     * [__construct description]
     *
     * @method __construct
     */
    public function __construct()
    {
        // To inherit directly the attributes of the parent class.
        parent::__construct();
        $CI = &get_instance();
        $CI->load->library('session');
        $this->IsAuth();

        $this->load->database();
     

    }

    // public function is_login()
    // {
    //     $headers = getallheaders();
    //     if (isset($headers['token']) || isset($headers['Token'])) {

    //         $token = isset($headers['token']) ? $headers['token'] : $headers['Token'];

    //         $secret = $this->config->item('secret_key_jwt');
    //         $dataj = $this->jwt->verifyJWT("sha256", $token, $secret);

    //         if ($dataj['check'] == false) {
    //             $this->set_response('failed', 200, 'HTTP_FORBIDDEN  token failed');
    //         }

    //         if (json_decode($dataj['data_user'])) {
    //             return json_decode($dataj['data_user']);
    //         } else {

    //             $this->set_response('failed', 200, 'HTTP_FORBIDDEN not found data');
    //             die;
    //         }
    //     }
    //     $this->set_response(false, 200, 'HTTP_FORBIDDEN not fount token');
    // }

    public function set_Response($data, $code = 200  , $message = '' , $status = true)
	{
        
		$res =  array(
			"message" => $message,
			"data" => $data,
			"status" => $status,
			"code"=>$code
		);
		echo json_encode($res,JSON_UNESCAPED_UNICODE);
        die;
	}

    private function IsAuth()
    {
        if (isset($_SESSION['logined'])) {
            define('AUTHED', $_SESSION['logined']);
            define('USER', $_SESSION['user']);
        } else {
            define('AUTHED', 0);
            // define('USER', $_SESSION['user']);
        }
        // var_dump($_SESSION);
        // $headers = getallheaders();
        // if (isset($headers['X-Api-Key']) || isset($headers['X-Api-Key'])) {

        //     $token = isset($headers['X-Api-Key']) ? $headers['X-Api-Key'] : $headers['X-Api-Key'];

        //     if ($token != "A9C76BEDFF2F9180E08A59231A91F515") {
        //         $this->set_response('failed', 403, 'HTTP_FORBIDDEN  token failed');
        //     }
        //     return true;
        // }
        // $this->set_response(false, 400, 'HTTP_FORBIDDEN not fount token');
    }
}
