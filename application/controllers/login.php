<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller 
{
  private $level;
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
    if($this->level == "applicant"){
     redirect('applicant/examination/index', 'refresh');
   } else if($this->level == "hr") {

   }
   redirect('hr/asdasd', 'refresh');
 }

}
public function send_email($email) 
{
  $emailconfig = array(
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
 $applicant = $this->login_model->applogin($email, $password);
 $employee = $this->login_model->employeelogin($email, $password);

 if($applicant)
 {
   $this->level = "applicant";
   /*  $this->send_email($email);*/
   $sess_array = array();
   foreach($applicant as $row)
   {
     $sess_array = array(
      'lname' =>  $row->lname,
      'fname' =>  $row->fname,
      'mname' =>  $row->mname,
      'app_id' => $row->app_id,
      'email' => $row->email
    );
     $this->session->set_userdata('logged_in', $sess_array);
   }
   return TRUE;
 }
 else if($employee) 
 {
  $this->level = "hr";
  $employee_sess = array();
  foreach($employee as $row)
  {
   $employee_sess = array(
    'lname' =>  $row->lname,
    'fname' =>  $row->fname,
    'mname' =>  $row->mname,
    'employee_id' => $row->employee_id,
    'email' => $row->email
  );
   $this->session->set_userdata('employee_login', $employee_sess);
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