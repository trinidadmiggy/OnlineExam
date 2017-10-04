<?php
class Check_answer extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('examination_model');
	}

	public function technical() {
		$score = 0;
		$examtype_id = $this->input->post('examtype_id');
		$questions = $this->examination_model->getQuestion($examtype_id);

		foreach($questions as $question)
		{
			if($this->input->post('q_'.$question['question_id']) == $question['answer']) 
			{
				$score = $score + 1;
			}
		}

		print_r($score);
	}
}
?>