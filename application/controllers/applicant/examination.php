<?php

class Examination extends CI_Controller{
	public $app_id;
	public function getSession() {
		$session_data = $this->session->userdata('logged_in');
		$this->app_id = $session_data['app_id'];
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
	
	public function takeTechnical($examtype_id) {
		$takeTechnical = array(
			'app_id' => $this->app_id,
			'examtype_id' => $examtype_id	
		);
		$this->examination_model->takeTechnical($takeTechnical);
	}

	public function index(){
		$this->load->view('examination/includes/header',$this->getSession());
		$this->load->view('examination/general_instructions');
		$this->load->view('examination/includes/footer');
	}

	public function verbal(){
		$id = 1;
		$data['result'] = $this->examination_model->getQuestion($id);
		$this->load->view('examination/includes/header',$this->getSession());
		$this->load->view('examination/verbal_meaning', $data);
		$this->load->view('examination/includes/footer');
		$this->takeTechnical($id);
	}

	public function reasoning(){
		$id = 2;
		$data['result'] = $this->examination_model->getQuestion($id);
		$this->load->view('examination/includes/header',$this->getSession());
		$this->load->view('examination/reasoning', $data);
		$this->load->view('examination/includes/footer');
		$this->takeTechnical($id);
	}
	public function letterseries(){
		$id = 3;
		$data['result'] = $this->examination_model->getQuestion($id);
		$this->load->view('examination/includes/header',$this->getSession());
		$this->load->view('examination/letter_series', $data);
		$this->load->view('examination/includes/footer');
		$this->takeTechnical($id);
	}

	public function numberability(){
		$id = 4;
		$data['result'] = $this->examination_model->getQuestion($id);
		$this->load->view('examination/includes/header',$this->getSession());
		$this->load->view('examination/number_ability', $data);
		$this->load->view('examination/includes/footer');
		$this->takeTechnical($id);
	}
	public function ipiaptitude(){
		$id = 5;
		$data['result'] = $this->examination_model->getQuestion($id);
		$this->load->view('examination/includes/header',$this->getSession());
		$this->load->view('examination/ipi_aptitude', $data);
		$this->load->view('examination/includes/footer');
		$this->takeTechnical($id);

	}
	public function manchester(){
		$id = 6;
		$session_data = $this->session->userdata('logged_in');
		$app_id = $session_data['app_id'];

		$factors = array(
			'Creativity' => 'Creativity' ,
			'Agreeableness' => 'Agreeableness',
			'Achievement' => 'Achievement',
			'Extroversion' => 'Extroversion',
			'Resilience' => 'Resilience' 

		);
		foreach($factors as $factor)
		{
			$startManchester = array(
				'app_id' => $app_id,
				'factor' => $factor
			);
			$this->examination_model->takeManchester($startManchester);
		}

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
		$this->takeTechnical($id);
	}
}

?>