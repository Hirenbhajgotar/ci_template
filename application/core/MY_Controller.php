<?php
class MY_Controller extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        // if (!$this->session->userdata('logged_in')) {
        //     redirect('login');
        // }
    }

    public function set_xls_notification($message = '')
    {
        $this->Xls_notification_model->set_notification($message);
    }

    public function send_email_notification($to)
    {
        $this->load->library('email');
        $config = array();
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'xxx';
        $config['smtp_user'] = 'xxx';
        $config['smtp_pass'] = 'xxx';
        $config['smtp_port'] = 25;
        $this->email->initialize($config);
        $this->email->set_newline("\r\n");

        
        $this->email->from('mygmail@gmail.com', 'myname');
        $this->email->to('target@gmail.com');
        $this->email->subject('Email Test');
        $this->email->message('Testing the email class.');
        $this->email->send();
        echo $this->email->print_debugger();
    }
}
