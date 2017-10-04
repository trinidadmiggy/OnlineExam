<?php

class Examination extends CI_Controller{
	private $perPage = 5;
	public function getSession() {
		$session_data = $this->session->userdata('logged_in');
		$sess['email'] = $session_data['email'];
		$sess['fname'] = $session_data['fname'];
		$sess['mname'] = $session_data['mname'];
		$sess['lname'] = $session_data['lname'];
		return $sess;
	}
	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('examination_model');

	}
	
	public function takeExam($app_id, $examtype_id) {
		$takeExam = array(
			'app_id' => $app_id,
			'examtype_id' => $examtype_id	
		);
		$this->examination_model->takeExam($takeExam);
	}
	public function index(){
		$this->load->view('examination/general_instructions');
	}
	public function verbal(){
		$id = 1;
		/*$this->takeExam(1,$id);*/
		$data['result'] = $this->examination_model->getQuestion($id);
		$this->load->view('examination/includes/header',$this->getSession());
		$this->load->view('examination/verbal_meaning', $data);
		$this->load->view('examination/includes/footer');
	}

	public function reasoning(){
		$id = 2;
		$data['result'] = $this->examination_model->getQuestion($id);
		$this->load->view('examination/includes/header',$this->getSession());
		$this->load->view('examination/reasoning', $data);
		$this->load->view('examination/includes/footer');
	}
	public function letterseries(){
		$id = 3;
		$data['result'] = $this->examination_model->getQuestion($id);
		$this->load->view('examination/includes/header',$this->getSession());
		$this->load->view('examination/letter_series', $data);
		$this->load->view('examination/includes/footer');
	}

	public function numberability(){
		$id = 4;
		$data['result'] = $this->examination_model->getQuestion($id);
		$this->load->view('examination/includes/header',$this->getSession());
		$this->load->view('examination/number_ability', $data);
		$this->load->view('examination/includes/footer');
	}
	public function ipiaptitude(){
		$id = 5;
		$data['result'] = $this->examination_model->getQuestion($id);
		$this->load->view('examination/includes/header',$this->getSession());
		$this->load->view('examination/ipi_aptitude', $data);
		$this->load->view('examination/includes/footer');

	}
	public function manchester(){
		$id = 6;
		$data['result'] = $this->examination_model->getQuestion($id);
		$this->load->view('examination/includes/header',$this->getSession());
		$this->load->view('examination/manchester', $data);
		$this->load->view('examination/includes/footer');
	}
	public function essay(){
		$id = 7;
		$data['result'] = $this->examination_model->getQuestion($id);
		$this->load->view('examination/includes/header',$this->getSession());
		$this->load->view('examination/essay', $data);
		$this->load->view('examination/includes/footer');
	}
}

?>