<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller 
{
  function __construct()
  {
   parent::__construct();
   $this->load->model('login_model');
 }

 function index()
 {

   $this->form_validation->set_rules('email', 'Email', 'trim|required');
   $this->form_validation->set_rules('password', 'Password', 'trim|required|callback_check_database');

   if($this->form_validation->run() == false)
   {
    $this->load->view('Login/includes/header');
    $this->load->view('Login/login_view');
    $this->load->view('Login/includes/footer');
  }
  else
  {
     //Go to private area
   redirect('home', 'refresh');
 }

}
public function send_email($email) 
{
  $emailconfig = Array(
    'protocol' => 'smtp',
    'smtp_host' => 'ssl://smtp.googlemail.com',
    'smtp_port' => 465,
    'smtp_user' => 'qpsdummy@gmail.com',
    'smtp_pass' => 'dummyqps'
  );
  $this->load->library('email', $emailconfig);
  $this->email->set_newline("\r\n");

  $this->email->from('qpsdummy@gmail.com', 'Qps Dummy');
  $this->email->to($email);
  $this->email->subject("Questronix");
  $this->email->message("Success!!");
  $this->email->send();
}

function check_database($password)
{
   //Field validation succeeded.  Validate against database
 $email = $this->input->post('email');

   //query the database
 $result = $this->login_model->login($email, $password);

 if($result)
 {
/*  $this->send_email($email);*/
  $sess_array = array();
  foreach($result as $row)
  {
   $sess_array = array(
     'app_id' => $row->app_id,
     'email' => $row->email
   );
   $this->session->set_userdata('logged_in', $sess_array);
 }
 return TRUE;
}
else
{
 $this->form_validation->set_message('check_database', 'Invalid username or password');
 return false;
}
}


}
?>