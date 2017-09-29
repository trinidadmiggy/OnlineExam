<?php

class Examination extends CI_Controller{
	private $perPage = 5;
	public function __construct()
	{
		parent::__construct();
		$this->load->model('examination_model');
	}

	public function verbal(){
		$this->load->view('examination/includes/header');
		$this->load->view('examination/verbal_meaning');
		$this->load->view('examination/includes/footer');
	}


	public function getQuestion(){
		$page =  $this->input->get('page');
		$questions = $this->examination_model->getQuestion1($page,1);
		foreach($questions as $r) {
			echo "<div class='col-lg-6'>
			<br/>
			<label>"
			.$r->question_id.") ".$r->question.
			"</label>
			<div class='radio'>
			<ol type='1'>
			<div class='col-lg-6'>
			<li>
			<label>
			<input type='radio' name='verbal_q5' id='' value='1'>"
			.$r->option1.
			"</label>
			</li>
			<li>
			<label>
			<input type='radio' name='verbal_q5' id='' value='2'>"
			.$r->option2.
			"</label>
			</li>
			<li>
			<label>
			<input type='radio' name='verbal_q5' id='' value='2'>"
			.$r->option2.
			"</label>
			</li>
			</div>
			<div class='col-lg-6'>
			<li>
			<label>
			<input type='radio' name='verbal_q5' id='' value='3'>"
			.$r->option4.
			"</label>
			</li>
			<li>
			<label>
			<input type='radio' name='verbal_q5' id='' value='4'>"
			.$r->option5.
			"</label>
			</li>
			</div>
			</ol>
			</div>
			</div>";


			/*echo "<tr><td><label>".$r->question_id.") ".$r->question."</label><br/>".
			"<div class='multiplechoice radio'>
			<ol type='1'>
			<li>
			<label>
			<input type='radio' name='verbal_q5' value=''>".
			$r->option1.
			"</label>
			</li>
			<li>
			<label>
			<input type='radio' name='verbal_q5' value=''>".
			$r->option2.
			"</label>
			</li>
			<li>
			<label>
			<input type='radio' name='verbal_q5' value=''>".
			$r->option3.
			"</label>
			</li>
			<li>
			<label>
			<input type='radio' name='verbal_q5' value=''>".
			$r->option4.
			"</label>
			</li>
			<li>
			<label>
			<input type='radio' name='verbal_q5' id='' value=''>".
			$r->option5.
			"</label>
			</li>
			</ol>
			</div>
			</td>
			</tr>";*/
		}
		exit;
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