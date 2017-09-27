<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_ci extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$this->load->helper(array('form'));
		$this->load->view('Login/includes/header');
		$this->load->view('Login/login_view');
		$this->load->view('Login/includes/footer');
	}
}

?>