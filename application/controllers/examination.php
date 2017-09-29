<?php

class Examination extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('examination_model');
	}
/*
	public function fetch_questions() {
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
	public function verbal1()
	{
		$total_question = $this->examination_model->get_all_count();
		$content_per_page = 20; 
		$this->data['tol_question'] = ceil($total_question->tol_question/$content_per_page);
		$this->load->view('examination/includes/header');
		$this->load->view('examination/verbal_meaning', $this->data, FALSE);
		$this->load->view('examination/includes/footer');
	}

	public function load_more()
	{
		$group_no = $this->input->post('group_no');
		$content_per_page = 20;
		$start = ceil($group_no * $content_per_page);
		$all_content = $this->examination_model->get_all_content($start,$content_per_page);
		if(isset($all_content) && is_array($all_content) && count($all_content)) : 
			foreach ($all_content as $key => $content) :
				echo '<li>'.$content->question_id.'</li>';
				echo '<p>'.$content->question.'</p>';                 
			endforeach;                                
		endif; 
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