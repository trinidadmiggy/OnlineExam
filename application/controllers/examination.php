<?php

class Examination extends CI_Controller{
	private $perPage = 5;
	public function __construct()
	{
		parent::__construct();
		$this->load->model('examination_model');
	}
	public function index(){
		$this->load->view('examination/includes/header');
		$this->load->view('examination/general_instructions');
		$this->load->view('examination/includes/footer');
	}
	public function verbal(){
		$id = 1;
		$data['result'] = $this->examination_model->getQuestion($id);
		$this->load->view('examination/includes/header');
		$this->load->view('examination/verbal_meaning', $data);
		$this->load->view('examination/includes/footer');
	}

	public function reasoning(){
		$id = 2;
		$data['result'] = $this->examination_model->getQuestion($id);
		$this->load->view('examination/includes/header');
		$this->load->view('examination/reasoning', $data);
		$this->load->view('examination/includes/footer');
	}
	public function letterseries(){
		$id = 3;
		$data['result'] = $this->examination_model->getQuestion($id);
		$this->load->view('examination/includes/header');
		$this->load->view('examination/letter_series', $data);
		$this->load->view('examination/includes/footer');
	}

	public function numberability(){
		$id = 4;
		$data['result'] = $this->examination_model->getQuestion($id);
		$this->load->view('examination/includes/header');
		$this->load->view('examination/number_ability', $data);
		$this->load->view('examination/includes/footer');
	}
	public function ipiaptitude(){
		$id = 5;
		$data['result'] = $this->examination_model->getQuestion($id);
		$this->load->view('examination/includes/header');
		$this->load->view('examination/ipi_aptitude', $data);
		$this->load->view('examination/includes/footer');
	}
	public function manchester(){
		$id = 6;
		$data['result'] = $this->examination_model->getQuestion($id);
		$this->load->view('examination/includes/header');
		$this->load->view('examination/manchester', $data);
		$this->load->view('examination/includes/footer');
	}
	public function essay(){
		$id = 7;
		$data['result'] = $this->examination_model->getQuestion($id);
		$this->load->view('examination/includes/header');
		$this->load->view('examination/essay', $data);
		$this->load->view('examination/includes/footer');
	}
}

?>