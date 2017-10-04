<?php 
class Login_model extends CI_Model {
	function login($email, $password)
	{
		$this -> db -> select('applicantinfo.app_id, applicantinfo.lname, applicantinfo.fname, applicantinfo.mname, applicantlogin.email, applicantlogin.password');
		$this -> db -> from('applicantlogin');
		$this -> db -> join('applicantinfo', 'applicantinfo.app_id = applicantlogin.app_id');
		$this -> db -> where('applicantlogin.email', $email);
		$this -> db -> where('applicantlogin.password', $password);
		$this -> db -> limit(1);

		$query = $this -> db -> get();

		if($query -> num_rows() == 1)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}
}
?>