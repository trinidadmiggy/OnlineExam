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
	public function checkIfTakenManchester() {
		$session_data = $this->session->userdata('logged_in');
		$app_id = $session_data['app_id'];
		$citm = $this->examination_model->checkIfTakenManchester($app_id);
		if($citm) {
			return true;
		}
		else
		{
			redirect('applicant/examination/essay', 'refresh');
		}
	}

	public function checkIfTakenExam($examtype_id) {
		$session_data = $this->session->userdata('logged_in');
		$app_id = $session_data['app_id'];
		$cite = $this->examination_model->checkIfTakenExam($app_id, $examtype_id);
		if($cite) {
			switch ($examtype_id) {
				case 1:
				redirect('applicant/examination/reasoning', 'refresh');
				break;
				case 2:
				redirect('applicant/examination/letterseries', 'refresh');
				break;
				case 3:
				redirect('applicant/examination/numberability', 'refresh');
				break;
				case 4:
				redirect('applicant/examination/ipiaptitude', 'refresh');
				break;
				case 5:
				redirect('applicant/examination/manchester', 'refresh');
				break;
				case 6:
				redirect('applicant/examination/essay', 'refresh');
				break;
				default:
				redirect('applicant/examination/index', 'refresh');
			}
			return true; 
		}
	}

	public function takeTechnical($examtype_id) {
		$takeTechnical = array(
			'app_id' => $this->app_id,
			'examtype_id' => $examtype_id	
		);
		$this->examination_model->takeTechnical($takeTechnical, $this->app_id, $examtype_id);
	}

//////////////////
	public function index(){

		$this->load->view('examination/includes/header',$this->getSession());
		$this->load->view('examination/general_instructions');
		$this->load->view('examination/includes/footer');
	}

	public function verbal(){
		$id = 1;
		if($this->checkIfTakenExam($id) == false) {
			$data['result'] = $this->examination_model->getQuestion($id);
			$this->load->view('examination/includes/header',$this->getSession());
			$this->load->view('examination/verbal_meaning', $data);
			$this->load->view('examination/includes/footer');
			$this->takeTechnical($id);
		}
	}

	public function reasoning(){
		$id = 2;
		if($this->checkIfTakenExam($id) == false)  {
			$data['result'] = $this->examination_model->getQuestion($id);
			$this->load->view('examination/includes/header',$this->getSession());
			$this->load->view('examination/reasoning', $data);
			$this->load->view('examination/includes/footer');
			$this->takeTechnical($id);
		}
	}
	public function letterseries(){
		$id = 3;
		if($this->checkIfTakenExam($id) == false)  {
			$data['result'] = $this->examination_model->getQuestion($id);
			$this->load->view('examination/includes/header',$this->getSession());
			$this->load->view('examination/letter_series', $data);
			$this->load->view('examination/includes/footer');
			$this->takeTechnical($id);
		}
	}

	public function numberability(){
		$id = 4;
		if($this->checkIfTakenExam($id) == false)  {
			$data['result'] = $this->examination_model->getQuestion($id);
			$this->load->view('examination/includes/header',$this->getSession());
			$this->load->view('examination/number_ability', $data);
			$this->load->view('examination/includes/footer');
			$this->takeTechnical($id);
		}
	}
	public function ipiaptitude(){
		$id = 5;
		if($this->checkIfTakenExam($id) == false)  {
			$data['result'] = $this->examination_model->getQuestion($id);
			$this->load->view('examination/includes/header',$this->getSession());
			$this->load->view('examination/ipi_aptitude', $data);
			$this->load->view('examination/includes/footer');
			$this->takeTechnical($id);
		}

	}
	public function manchester(){
		$id = 6;
		$session_data = $this->session->userdata('logged_in');
		$app_id = $session_data['app_id'];
		if($this->checkIfTakenManchester())  {
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
				$this->examination_model->takeManchester($startManchester, $app_id);
			}

			$data['result'] = $this->examination_model->getQuestion($id);
			$this->load->view('examination/includes/header',$this->getSession());
			$this->load->view('examination/manchester', $data);
			$this->load->view('examination/includes/footer');
		}
	}
	public function essay(){
		$id = 7;
		$session_data = $this->session->userdata('logged_in');
		$app_id = $session_data['app_id'];
		
		if($this->examination_model->checkIfTakenEssay($app_id)) {
			$data['result'] = $this->examination_model->getQuestion($id);

			foreach($data['result'] as $essay)
			{
				$startEssay = array(
					'app_id' => $app_id,
					'question_id' => $essay['question_id']
				);
				$this->examination_model->takeEssay($startEssay, $app_id);
			}
			$this->load->view('examination/includes/header',$this->getSession());
			$this->load->view('examination/essay', $data);
			$this->load->view('examination/includes/footer');
		} else {
			redirect('applicant/examination/thankyou', 'refresh');
		}

	}

	public function thankyou(){
		$this->load->view('examination/includes/header');
		$this->load->view('examination/thank_you');
		$this->load->view('examination/includes/footer');
	}

	public function appans(){
		$session_data = $this->session->userdata('logged_in');
		$app_id = $session_data['app_id'];
		$data['answers'] = $this->examination_model->getAnswers($app_id);
		$this->load->view('examination/appans', $data);
	}
}

?>