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
    $this->load->view('login_view');
  }
  else
  {
    if($this->level == "applicant"){
     redirect('applicant/examination/index', 'refresh');
   } else if($this->level == "hr") {

   }
   redirect('hr/careers', 'refresh');
 }

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