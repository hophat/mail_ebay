<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Luu_mail extends Ci_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mail_model');
        $this->load->model('Acc_model');
    }

    public function index()
    {
    }

    public function get_mail()
    {
        $ListAcc = $this->Acc_model->get_list();
        // date_default_timezone_set('America/Rio_branco');
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        //        $date =   date('d M Y');
        $dateNow = date("Y-m-d");
        $date1 = str_replace('-', '/', $dateNow);
        $date = date('d M Y', strtotime($date1 . "-2 days"));

        foreach ($ListAcc as $acc) {
            if ($acc['acc_actived'] != 1) continue;
            // get xem chết link chưa + update
            $update_['code_status'] = $this->get_code_stauts($acc['link_check']);
            $this->Acc_model->update($update_,  $acc['acc_id']);
            //
            try {
                $accout = $acc['acc_email'];
                $pass = $acc['acc_pass'];
                $connection = imap_open('{imap-mail.outlook.com:993/imap/ssl}INBOX', $accout, $pass) or die('Cannot connect to : ' . imap_last_error());
                $MC = imap_check($connection);
                // var_dump($MC);
                // echo 'FROM "ebay.com" ON ' . $date;die;
                $emailData = imap_search($connection, 'SINCE "' . $date . '"');
                if (!empty($emailData)) {
                    foreach ($emailData as $emailIdent) {



                        $overview = imap_fetch_overview($connection, $emailIdent, 0);
                        $uid = $overview[0]->uid;
                        if ($this->Mail_model->get($acc['acc_id'], $uid)) {
                            echo "continue \n";
                            continue;
                        }
                        $message_ = quoted_printable_decode(imap_fetchbody($connection, $emailIdent, 1));
                        echo  $title = $overview[0]->subject;
                        // $type = (strpos($title, 'item has sold') != false) ? 'save' : '0';
                        $type = '';
                        if (strpos($title, 'item has sold') != false) {
                            $type = 'save';
                        } else if (strpos($title, 'item is ready to ship') != false) {
                            $type = 'save';
                        } else if (strpos($title, 'sent a message') != false) {
                            $type = 'mess';
                        }

                        $from = $overview[0]->from;
                        date_default_timezone_set('Asia/Ho_Chi_Minh');
                        $date = date("Y-m-d H:i", strtotime($overview[0]->date));
                        var_dump($date);
                        $body = $message_;
                        $parrams['mail_uid'] = $uid;
                        $parrams['mail_title'] = $title;
                        $parrams['mail_body'] = $body;
                        $parrams['mail_from'] = $from;
                        $parrams['mail_acc'] = $acc['acc_id'];
                        $parrams['mail_date'] = $date;
                        $parrams['mail_type'] = $type;

                        $added =   $this->Mail_model->add($parrams);
                        if ($added) {
                            echo "succes \n";
                        } else {
                            echo "failed \n";
                        }
                    } // End foreach
                };
                imap_close($connection);
            } catch (Exception  $e) {
                log_message('error', $e);
            }
        }
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
        if (empty($url)) return false;

        $hear = get_headers($url);
        if (strpos($hear[0], '200') > -1) {
            return true;
        }
        return false;
    }
}
