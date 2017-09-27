<?php
class Check_answer extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('examination_model');
	}

	public function check_verbal() {
		$q1 = $this->input->post('verbal_q1');
		$q2 = $this->input->post('verbal_q2');
		$q3 = $this->input->post('verbal_q3');
		$q4 = $this->input->post('verbal_q4');
		$q5 = $this->input->post('verbal_q5');

		if($q1 == '1') {
			$score = 1;
		}

		if($q2 == '1') {
			$score += 1;
		}

		if($q3 == '1') {
			$score += 1;
		}

		if($q4 == '1') {
			$score += 1;
		}

		if($q5 == '1') {
			$score += 1;
		}

		$data = array (
				'app_id' =>  1, //$this->input->post('')
				'examtype' => 'Verbal Meaning', 
				'result' => $score
			);
		$result = $this->examination_model->saveScore($data);
		print_r($result);
	}

	public function check_reasoning() {
		$q1 = $this->input->post('verbal_q1');
		$q2 = $this->input->post('verbal_q2');
		$q3 = $this->input->post('verbal_q3');
		$q4 = $this->input->post('verbal_q4');
		$q5 = $this->input->post('verbal_q5');

		if($q1 == '1') {
			$score = 1;
		}

		if($q2 == '1') {
			$score += 1;
		}

		if($q3 == '1') {
			$score += 1;
		}

		if($q4 == '1') {
			$score += 1;
		}

		if($q5 == '1') {
			$score += 1;
		}

		$data = array (
				'app_id' =>  1, //$this->input->post('')
				'examtype' => 'Reasoning', 
				'result' => $score
			);
		$result = $this->examination_model->saveScore($data);
		print_r($result);
	}
}
?>