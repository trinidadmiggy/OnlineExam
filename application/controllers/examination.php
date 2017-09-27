<?php

class Examination extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('examination_model');
	}

/*	public function fetch_questions() {
		$list = $this->examination_model->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $questions) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $questions->question;
			$row[] = $questions->option1;
			$row[] = $questions->option2;
			$row[] = $questions->option3;
			$row[] = $questions->option4;
			$row[] = $questions->option5;

			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->examination_model->count_all(),
			"recordsFiltered" => $this->examination_model->count_filtered(),
			"data" => $data 
		);
        //output to json format
		echo json_encode($output);
	}
	public function verbal(){
		$this->load->view('examination/includes/header');
		$this->load->view('examination/verbal_meaning');
		$this->load->view('examination/includes/footer');
	}*/

	public function verbal(){
		print_r($this->session->all_userdata());
		$id = 1;
		$data['result'] = $this->examination_model->getQuestion($id);
		$this->load->view('examination/includes/header');
		$this->load->view('examination/verbal_meaning', $data);
		$this->load->view('examination/includes/footer');
	}
	public function reasoning(){
		$this->load->view('examination/includes/header');
		$this->load->view('examination/reasoning');
		$this->load->view('examination/includes/footer');
	}
	public function letterseries(){
		$this->load->view('examination/includes/header');
		$this->load->view('examination/letter_series');
		$this->load->view('examination/includes/footer');
	}

	public function numberability(){
		$this->load->view('examination/includes/header');
		$this->load->view('examination/number_ability');
		$this->load->view('examination/includes/footer');
	}
	public function manchester(){
		$this->load->view('examination/includes/header');
		$this->load->view('examination/manchester');
		$this->load->view('examination/includes/footer');
	}
	public function personal(){
		$this->load->view('examination/includes/header');
		$this->load->view('examination/personal_working');
		$this->load->view('examination/includes/footer');
	}
	public function essay(){
		$this->load->view('examination/includes/header');
		$this->load->view('examination/essay');
		$this->load->view('examination/includes/footer');
	}
}

?>