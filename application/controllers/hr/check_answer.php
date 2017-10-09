<?php
class Check_answer extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('examination_model');
	}

	public function compute($score, $remarks, $examtype_id)
	{
		$session_data = $this->session->userdata('logged_in');
		$app_id = $session_data['app_id'];
		$computeScore = array(
			'score' => $score,
			'remarks' => $remarks
		);
		return $this->examination_model->saveScore($computeScore,$app_id, $examtype_id);
	}

	public function saveAns($question_id, $app_answer) {
		$session_data = $this->session->userdata('logged_in');
		$app_id = $session_data['app_id'];
		$ans = array(
			'app_id' => $app_id,
			'question_id' => $question_id,
			'app_answer' => $app_answer
		);
		$this->examination_model->saveAnswers($ans);
	}

	public function interpret($score) {
		$description = "";
		if($score >= 1 && $score <= 3)
		{
			$description = "Very Low";
		}
		else if ($score >= 4 && $score <= 9)
		{
			$description = "Low";
		}
		else if ($score >= 10 && $score <= 23)
		{
			$description = "Below Average";
		}
		else if ($score >= 24 && $score <= 39)
		{
			$description = "Low Average";
		}
		else if ($score >= 40 && $score <= 59)
		{
			$description = "Average";
		}
		else if ($score >= 60 && $score <= 74)
		{
			$description = "High Average";
		}
		else if ($score >= 75 && $score <= 89)
		{
			$description = "Above Average";
		}
		else if ($score >= 90 && $score <= 96)
		{
			$description = "Superior";
		}
		else if ($score >= 97 && $score <= 99)
		{
			$description = "Very Superior";
		}
		return $description;
	}
	public function checkIfTakenManchester() {
		$session_data = $this->session->userdata('logged_in');
		$app_id = $session_data['app_id'];
		$citm = $this->examination_model->checkIfTakenManchester($app_id);
		if($citm) {
			return true;
			redirect('applicant/examination/manchester', 'refresh');
		}
		else
		{
			return false;
			redirect('applicant/examination/index', 'refresh');
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
	public function technical() {
		$score = 0;
		$examtype_id = $this->input->post('examtype_id');
		$questions = $this->examination_model->getQuestion($examtype_id);

		foreach($questions as $question)
		{
			$this->saveAns($question['question_id'], $this->input->post('q_'.$question['question_id']));
			if($this->input->post('q_'.$question['question_id']) == $question['answer']) 
			{
				$score = $score + 1;
			}
		}
		$description = $this->interpret($score);
		if($this->compute($score, $description, $examtype_id)) {
			$this->checkIfTakenExam($examtype_id);
		} 
	}

	public function essay() {
		$session_data = $this->session->userdata('logged_in');
		$app_id = $session_data['app_id'];
		$examtype_id = $this->input->post('examtype_id');
		$questions = $this->examination_model->getQuestion($examtype_id);

		foreach($questions as $question)
		{
			$success= true;
			$essay = array(
				'answer' =>  $this->input->post('essay_'.$question['question_id'])
			);
			if($this->examination_model->saveEssay($app_id, $question['question_id'], $essay)) {
				$success= true;
			}
			else
			{
				$success= false;
				break;
			}
		}
		if($success) {
			redirect('applicant/examination/thankyou', 'refresh');
		} else {
			print_r("Error");
		}
	}
	public function manchester() {
		$score = 0;
		$q_no=1;
		$mpq = array();
		$questions = $this->examination_model->getQuestion(7);
		foreach($questions as $question)
		{
			for($i = 1; $i <= 15; $i++)
			{
				if($this->input->post('manchester_q'.$i) == "A") 
				{
					$mpq["$i"] = 5;
				}
				else if($this->input->post('manchester_q'.$i) == "B")
				{
					$mpq["$i"] = 4;
				}
				else if($this->input->post('manchester_q'.$i) == "C")
				{
					$mpq["$i"] = 3;
				}
				else if($this->input->post('manchester_q'.$i) == "D")
				{
					$mpq["$i"] = 2;
				}
				else if($this->input->post('manchester_q'.$i) == "E")
				{
					$mpq["$i"] = 1;
				}

			}
			for($i = 16; $i <= 30; $i++)
			{
				if($this->input->post('manchester_q'.$i) == "A") 
				{
					$mpq["$i"] = 1;
				}
				else if($this->input->post('manchester_q'.$i) == "B")
				{
					$mpq["$i"] = 2;
				}
				else if($this->input->post('manchester_q'.$i) == "C")
				{
					$mpq["$i"] = 3;
				}
				else if($this->input->post('manchester_q'.$i) == "D")
				{
					$mpq["$i"] = 4;
				}
				else if($this->input->post('manchester_q'.$i) == "E")
				{
					$mpq["$i"] = 5;
				}
			}

			for($i = 31; $i <= 45; $i++)
			{
				if($this->input->post('manchester_q'.$i) == "A") 
				{
					$mpq["$i"] = 5;
				}
				else if($this->input->post('manchester_q'.$i) == "B")
				{
					$mpq["$i"] = 4;
				}
				else if($this->input->post('manchester_q'.$i) == "C")
				{
					$mpq["$i"] = 3;
				}
				else if($this->input->post('manchester_q'.$i) == "D")
				{
					$mpq["$i"] = 2;
				}
				else if($this->input->post('manchester_q'.$i) == "E")
				{
					$mpq["$i"] = 1;
				}

			}

			for($i = 46; $i <= 60; $i++)
			{
				if($this->input->post('manchester_q'.$i) == "A") 
				{
					$mpq["$i"] = 1;
				}
				else if($this->input->post('manchester_q'.$i) == "B")
				{
					$mpq["$i"] = 2;
				}
				else if($this->input->post('manchester_q'.$i) == "C")
				{
					$mpq["$i"] = 3;
				}
				else if($this->input->post('manchester_q'.$i) == "D")
				{
					$mpq["$i"] = 4;
				}
				else if($this->input->post('manchester_q'.$i) == "E")
				{
					$mpq["$i"] = 5;
				}
			}

			for($i = 61; $i <= 75; $i++)
			{
				if($this->input->post('manchester_q'.$i) == "A") 
				{
					$mpq["$i"] = 5;
				}
				else if($this->input->post('manchester_q'.$i) == "B")
				{
					$mpq["$i"] = 4;
				}
				else if($this->input->post('manchester_q'.$i) == "C")
				{
					$mpq["$i"] = 3;
				}
				else if($this->input->post('manchester_q'.$i) == "D")
				{
					$mpq["$i"] = 2;
				}
				else if($this->input->post('manchester_q'.$i) == "E")
				{
					$mpq["$i"] = 1;
				}

			}

			for($i = 76; $i <= 90; $i++)
			{
				if($this->input->post('manchester_q'.$i) == "A") 
				{
					$mpq["$i"] = 1;
				}
				else if($this->input->post('manchester_q'.$i) == "B")
				{
					$mpq["$i"] = 2;
				}
				else if($this->input->post('manchester_q'.$i) == "C")
				{
					$mpq["$i"] = 3;
				}
				else if($this->input->post('manchester_q'.$i) == "D")
				{
					$mpq["$i"] = 4;
				}
				else if($this->input->post('manchester_q'.$i) == "E")
				{
					$mpq["$i"] = 5;
				}	
			}
		}

		$primaryDimensions = array();
		$p=1;
		for($y = 1; $y <= 15; $y++)
		{	
			$sum = 0;
			for($x = $y; $x <= 90; $x = $x + 15)
			{	
				$sum =  $sum + $mpq[$x];	
			}
			if($y == 1)
			{
				if($sum >= 0 && $sum <=11) 
				{
					$primaryDimensions["S$y"] = 1;
				}
				else if($sum >= 12 && $sum <= 12) 
				{
					$primaryDimensions["S$y"] = 2;
				}
				else if($sum >= 13 && $sum <= 14) 
				{
					$primaryDimensions["S$y"] = 3;
				}
				else if($sum >= 15 && $sum <= 16) 
				{
					$primaryDimensions["S$y"] = 4;
				}
				else if($sum >= 17 && $sum <= 18) 
				{
					$primaryDimensions["S$y"] = 5;
				}
				else if($sum >= 19 && $sum <= 20) 
				{
					$primaryDimensions["S$y"] = 6;
				}
				else if($sum >= 21 && $sum <= 22) 
				{
					$primaryDimensions["S$y"] = 7;
				}
				else if($sum >= 23 && $sum <= 24) 
				{
					$primaryDimensions["S$y"] = 8;
				}
				else if($sum >= 25 && $sum <= 26) 
				{
					$primaryDimensions["S$y"] = 9;
				}
				else if($sum >= 27 && $sum <= 30) 
				{
					$primaryDimensions["S$y"] = 10;
				}
			}
			else if($y == 2)
			{
				if($sum >= 0 && $sum <= 8) 
				{
					$primaryDimensions["S$y"] = 1;
				}
				else if($sum >= 9 && $sum <= 10) 
				{
					$primaryDimensions["S$y"] = 2;
				}
				else if($sum >= 11 && $sum <= 12) 
				{
					$primaryDimensions["S$y"] = 3;
				}
				else if($sum >= 13 && $sum <= 14) 
				{
					$primaryDimensions["S$y"] = 4;
				}
				else if($sum >= 15 && $sum <= 16) 
				{
					$primaryDimensions["S$y"] = 5;
				}
				else if($sum >= 17 && $sum <= 18) 
				{
					$primaryDimensions["S$y"] = 6;
				}
				else if($sum >= 19 && $sum <= 20) 
				{
					$primaryDimensions["S$y"] = 7;
				}
				else if($sum >= 21 && $sum <= 22) 
				{
					$primaryDimensions["S$y"] = 8;
				}
				else if($sum >= 23 && $sum <= 24) 
				{
					$primaryDimensions["S$y"] = 9;
				}
				else if($sum >= 25 && $sum <= 30) 
				{
					$primaryDimensions["S$y"] = 10;
				}
			}
			else if($y == 3)
			{
				if($sum >= 0 && $sum <= 12) 
				{
					$primaryDimensions["S$y"] = 1;
				}
				else if($sum >= 13 && $sum <= 14) 
				{
					$primaryDimensions["S$y"] = 2;
				}
				else if($sum >= 15 && $sum <= 16) 
				{
					$primaryDimensions["S$y"] = 3;
				}
				else if($sum >= 17 && $sum <= 19) 
				{
					$primaryDimensions["S$y"] = 4;
				}
				else if($sum >= 20 && $sum <= 21) 
				{
					$primaryDimensions["S$y"] = 5;
				}
				else if($sum >= 22 && $sum <= 23) 
				{
					$primaryDimensions["S$y"] = 6;
				}
				else if($sum >= 24 && $sum <= 25) 
				{
					$primaryDimensions["S$y"] = 7;
				}
				else if($sum >= 26 && $sum <= 27) 
				{
					$primaryDimensions["S$y"] = 8;
				}
				else if($sum >= 28 && $sum <= 29) 
				{
					$primaryDimensions["S$y"] = 9;
				}
				else if($sum >= 30 && $sum <= 30) 
				{
					$primaryDimensions["S$y"] = 10;
				}
			}
			else if($y == 4)
			{
				if($sum >= 0 && $sum <= 13) 
				{
					$primaryDimensions["S$y"] = 1;
				}
				else if($sum >= 14 && $sum <= 14) 
				{
					$primaryDimensions["S$y"] = 2;
				}
				else if($sum >= 15 && $sum <= 16) 
				{
					$primaryDimensions["S$y"] = 3;
				}
				else if($sum >= 17 && $sum <= 18) 
				{
					$primaryDimensions["S$y"] = 4;
				}
				else if($sum >= 19 && $sum <= 20) 
				{
					$primaryDimensions["S$y"] = 5;
				}
				else if($sum >= 21 && $sum <= 22) 
				{
					$primaryDimensions["S$y"] = 6;
				}
				else if($sum >= 23 && $sum <= 23) 
				{
					$primaryDimensions["S$y"] = 7;
				}
				else if($sum >= 24 && $sum <= 25) 
				{
					$primaryDimensions["S$y"] = 8;
				}
				else if($sum >= 26 && $sum <= 27) 
				{
					$primaryDimensions["S$y"] = 9;
				}
				else if($sum >= 28 && $sum <= 30) 
				{
					$primaryDimensions["S$y"] = 10;
				}
			}
			else if($y == 5)
			{
				if($sum >= 0 && $sum <= 13) 
				{
					$primaryDimensions["S$y"] = 1;
				}
				else if($sum >= 14 && $sum <= 15) 
				{
					$primaryDimensions["S$y"] = 2;
				}
				else if($sum >= 16 && $sum <= 16) 
				{
					$primaryDimensions["S$y"] = 3;
				}
				else if($sum >= 17 && $sum <= 18) 
				{
					$primaryDimensions["S$y"] = 4;
				}
				else if($sum >= 19 && $sum <= 19) 
				{
					$primaryDimensions["S$y"] = 5;
				}
				else if($sum >= 20 && $sum <= 21) 
				{
					$primaryDimensions["S$y"] = 6;
				}
				else if($sum >= 22 && $sum <= 23) 
				{
					$primaryDimensions["S$y"] = 7;
				}
				else if($sum >= 24 && $sum <= 24) 
				{
					$primaryDimensions["S$y"] = 8;
				}
				else if($sum >= 25 && $sum <= 26) 
				{
					$primaryDimensions["S$y"] = 9;
				}
				else if($sum >= 27 && $sum <= 30) 
				{
					$primaryDimensions["S$y"] = 10;
				}
			}
			else if($y == 6)
			{
				if($sum >= 0 && $sum <= 16) 
				{
					$primaryDimensions["S$y"] = 1;
				}
				else if($sum >= 17 && $sum <= 17) 
				{
					$primaryDimensions["S$y"] = 2;
				}
				else if($sum >= 18 && $sum <= 19) 
				{
					$primaryDimensions["S$y"] = 3;
				}
				else if($sum >= 20 && $sum <= 21) 
				{
					$primaryDimensions["S$y"] = 4;
				}
				else if($sum >= 22 && $sum <= 22) 
				{
					$primaryDimensions["S$y"] = 5;
				}
				else if($sum >= 23 && $sum <= 24) 
				{
					$primaryDimensions["S$y"] = 6;
				}
				else if($sum >= 25 && $sum <= 25) 
				{
					$primaryDimensions["S$y"] = 7;
				}
				else if($sum >= 26 && $sum <= 27) 
				{
					$primaryDimensions["S$y"] = 8;
				}
				else if($sum >= 28 && $sum <= 29) 
				{
					$primaryDimensions["S$y"] = 9;
				}
				else if($sum >= 30 && $sum <= 30) 
				{
					$primaryDimensions["S$y"] = 10;
				}
			}
			else if($y == 7)
			{
				if($sum >= 0 && $sum <= 9) 
				{
					$primaryDimensions["S$y"] = 1;
				}
				else if($sum >= 10 && $sum <= 11) 
				{
					$primaryDimensions["S$y"] = 2;
				}
				else if($sum >= 12 && $sum <= 13) 
				{
					$primaryDimensions["S$y"] = 3;
				}
				else if($sum >= 14 && $sum <= 15) 
				{
					$primaryDimensions["S$y"] = 4;
				}
				else if($sum >= 16 && $sum <= 16) 
				{
					$primaryDimensions["S$y"] = 5;
				}
				else if($sum >= 17 && $sum <= 18) 
				{
					$primaryDimensions["S$y"] = 6;
				}
				else if($sum >= 19 && $sum <= 20) 
				{
					$primaryDimensions["S$y"] = 7;
				}
				else if($sum >= 21 && $sum <= 21) 
				{
					$primaryDimensions["S$y"] = 8;
				}
				else if($sum >= 22 && $sum <= 23) 
				{
					$primaryDimensions["S$y"] = 9;
				}
				else if($sum >= 24 && $sum <= 30) 
				{
					$primaryDimensions["S$y"] = 10;
				}
			}
			else if($y == 8)
			{
				if($sum >= 0 && $sum <= 10) 
				{
					$primaryDimensions["S$y"] = 1;
				}
				else if($sum >= 11 && $sum <= 12) 
				{
					$primaryDimensions["S$y"] = 2;
				}
				else if($sum >= 13 && $sum <= 14) 
				{
					$primaryDimensions["S$y"] = 3;
				}
				else if($sum >= 15 && $sum <= 15) 
				{
					$primaryDimensions["S$y"] = 4;
				}
				else if($sum >= 16 && $sum <= 17) 
				{
					$primaryDimensions["S$y"] = 5;
				}
				else if($sum >= 18 && $sum <= 19) 
				{
					$primaryDimensions["S$y"] = 6;
				}
				else if($sum >= 20 && $sum <= 20) 
				{
					$primaryDimensions["S$y"] = 7;
				}
				else if($sum >= 21 && $sum <= 22) 
				{
					$primaryDimensions["S$y"] = 8;
				}
				else if($sum >= 23 && $sum <= 24) 
				{
					$primaryDimensions["S$y"] = 9;
				}
				else if($sum >= 25 && $sum <= 30) 
				{
					$primaryDimensions["S$y"] = 10;
				}
			}
			else if($y == 9)
			{
				if($sum >= 0 && $sum <= 14) 
				{
					$primaryDimensions["S$y"] = 1;
				}
				else if($sum >= 15 && $sum <= 16) 
				{
					$primaryDimensions["S$y"] = 2;
				}
				else if($sum >= 17 && $sum <= 17) 
				{
					$primaryDimensions["S$y"] = 3;
				}
				else if($sum >= 18 && $sum <= 19) 
				{
					$primaryDimensions["S$y"] = 4;
				}
				else if($sum >= 20 && $sum <= 21) 
				{
					$primaryDimensions["S$y"] = 5;
				}
				else if($sum >= 22 && $sum <= 23) 
				{
					$primaryDimensions["S$y"] = 6;
				}
				else if($sum >= 24 && $sum <= 24) 
				{
					$primaryDimensions["S$y"] = 7;
				}
				else if($sum >= 25 && $sum <= 26) 
				{
					$primaryDimensions["S$y"] = 8;
				}
				else if($sum >= 27 && $sum <= 28) 
				{
					$primaryDimensions["S$y"] = 9;
				}
				else if($sum >= 29 && $sum <= 30) 
				{
					$primaryDimensions["S$y"] = 10;
				}

			}
			else if($y == 10)
			{
				if($sum >= 0 && $sum <= 13) 
				{
					$primaryDimensions["S$y"] = 1;
				}
				else if($sum >= 14 && $sum <= 15) 
				{
					$primaryDimensions["S$y"] = 2;
				}
				else if($sum >= 17 && $sum <= 17) 
				{
					$primaryDimensions["S$y"] = 3;
				}
				else if($sum >= 18 && $sum <= 19) 
				{
					$primaryDimensions["S$y"] = 4;
				}
				else if($sum >= 20 && $sum <= 21) 
				{
					$primaryDimensions["S$y"] = 5;
				}
				else if($sum >= 22 && $sum <= 23) 
				{
					$primaryDimensions["S$y"] = 6;
				}
				else if($sum >= 24 && $sum <= 25) 
				{
					$primaryDimensions["S$y"] = 7;
				}
				else if($sum >= 26 && $sum <= 27) 
				{
					$primaryDimensions["S$y"] = 8;
				}
				else if($sum >= 28 && $sum <= 29) 
				{
					$primaryDimensions["S$y"] = 9;
				}
				else if($sum >= 30 && $sum <= 30) 
				{
					$primaryDimensions["S$y"] = 10;
				}
			}
			else if($y == 11)
			{
				if($sum >= 0 && $sum <= 10) 
				{
					$primaryDimensions["S$y"] = 1;
				}
				else if($sum >= 11 && $sum <= 12) 
				{
					$primaryDimensions["S$y"] = 2;
				}
				else if($sum >= 13 && $sum <= 14) 
				{
					$primaryDimensions["S$y"] = 3;
				}
				else if($sum >= 15 && $sum <= 16) 
				{
					$primaryDimensions["S$y"] = 4;
				}
				else if($sum >= 17 && $sum <= 18) 
				{
					$primaryDimensions["S$y"] = 5;
				}
				else if($sum >= 19 && $sum <= 20) 
				{
					$primaryDimensions["S$y"] = 6;
				}
				else if($sum >= 21 && $sum <= 22) 
				{
					$primaryDimensions["S$y"] = 7;
				}
				else if($sum >= 23 && $sum <= 24) 
				{
					$primaryDimensions["S$y"] = 8;
				}
				else if($sum >= 25 && $sum <= 26) 
				{
					$primaryDimensions["S$y"] = 9;
				}
				else if($sum >= 27 && $sum <= 30) 
				{
					$primaryDimensions["S$y"] = 10;
				}
			}
			else if($y == 12)
			{
				if($sum >= 0 && $sum <= 14) 
				{
					$primaryDimensions["S$y"] = 1;
				}
				else if($sum >= 15 && $sum <= 16) 
				{
					$primaryDimensions["S$y"] = 2;
				}
				else if($sum >= 17 && $sum <= 17) 
				{
					$primaryDimensions["S$y"] = 3;
				}
				else if($sum >= 18 && $sum <= 19) 
				{
					$primaryDimensions["S$y"] = 4;
				}
				else if($sum >= 20 && $sum <= 21) 
				{
					$primaryDimensions["S$y"] = 5;
				}
				else if($sum >= 22 && $sum <= 23) 
				{
					$primaryDimensions["S$y"] = 6;
				}
				else if($sum >= 24 && $sum <= 25) 
				{
					$primaryDimensions["S$y"] = 7;
				}
				else if($sum >= 26 && $sum <= 26) 
				{
					$primaryDimensions["S$y"] = 8;
				}
				else if($sum >= 27 && $sum <= 29) 
				{
					$primaryDimensions["S$y"] = 9;
				}
				else if($sum >= 29 && $sum <= 30) 
				{
					$primaryDimensions["S$y"] = 10;
				}
			}
			else if($y == 13)
			{
				if($sum >= 0 && $sum <= 14) 
				{
					$primaryDimensions["S$y"] = 1;
				}
				else if($sum >= 15 && $sum <= 15) 
				{
					$primaryDimensions["S$y"] = 2;
				}
				else if($sum >= 16 && $sum <= 17) 
				{
					$primaryDimensions["S$y"] = 3;
				}
				else if($sum >= 18 && $sum <= 19) 
				{
					$primaryDimensions["S$y"] = 4;
				}
				else if($sum >= 20 && $sum <= 21) 
				{
					$primaryDimensions["S$y"] = 5;
				}
				else if($sum >= 22 && $sum <= 22) 
				{
					$primaryDimensions["S$y"] = 6;
				}
				else if($sum >= 23 && $sum <= 24) 
				{
					$primaryDimensions["S$y"] = 7;
				}
				else if($sum >= 25 && $sum <= 26) 
				{
					$primaryDimensions["S$y"] = 8;
				}
				else if($sum >= 27 && $sum <= 27) 
				{
					$primaryDimensions["S$y"] = 9;
				}
				else if($sum >= 28 && $sum <= 30) 
				{
					$primaryDimensions["S$y"] = 10;
				}
			}
			else if($y == 14)
			{
				if($sum >= 0 && $sum <= 7) 
				{
					$primaryDimensions["S$y"] = 1;
				}
				else if($sum >= 8 && $sum <= 10) 
				{
					$primaryDimensions["S$y"] = 2;
				}
				else if($sum >= 11 && $sum <= 12) 
				{
					$primaryDimensions["S$y"] = 3;
				}
				else if($sum >= 13 && $sum <= 14) 
				{
					$primaryDimensions["S$y"] = 4;
				}
				else if($sum >= 15 && $sum <= 16) 
				{
					$primaryDimensions["S$y"] = 5;
				}
				else if($sum >= 17 && $sum <= 18) 
				{
					$primaryDimensions["S$y"] = 6;
				}
				else if($sum >= 19 && $sum <= 20) 
				{
					$primaryDimensions["S$y"] = 7;
				}
				else if($sum >= 21 && $sum <= 22) 
				{
					$primaryDimensions["S$y"] = 8;
				}
				else if($sum >= 23 && $sum <= 24) 
				{
					$primaryDimensions["S$y"] = 9;
				}
				else if($sum >= 25 && $sum <= 30) 
				{
					$primaryDimensions["S$y"] = 10;
				}
			}
		}
		$bigFive = array();

		$bigFive["f1"] = ((3 * $primaryDimensions["S1"]) + (3 * $primaryDimensions["S2"]) + (3 * $primaryDimensions["S3"]) + (2 * $primaryDimensions["S4"]) + 
			(2 * $primaryDimensions["S8"])) - 20;
		$bigFive["f2"] = ((3 * $primaryDimensions["S5"]) + (4 * $primaryDimensions["S6"]) + (2 * $primaryDimensions["S9"]) - (3 * $primaryDimensions["S8"])) + 20;
		$bigFive["f3"] = ((2 * $primaryDimensions["S8"]) + (4 * $primaryDimensions["S10"]) + (4 * $primaryDimensions["S11"]) + (4 * $primaryDimensions["S12"]) + (2 * $primaryDimensions["S13"])) - 38;
		$bigFive["f4"] = ((2 * $primaryDimensions["S5"]) + (6 * $primaryDimensions["S7"]) - (3 * $primaryDimensions["S8"]) - (3 * $primaryDimensions["S9"])) + 43;
		$bigFive["f5"] = ((5 * $primaryDimensions["S13"]) - (2 * $primaryDimensions["S6"]) - (6 * $primaryDimensions["S14"])) + 72;

		$factors = array();
		if($bigFive["f1"] >= 0 && $bigFive["f1"] <= 16)
		{
			$factors['Creativity'] = 1;
		}
		else if($bigFive["f1"] >= 17 && $bigFive["f1"] <= 25)
		{
			$factors['Creativity'] = 2;
		}
		else if($bigFive["f1"] >= 26 && $bigFive["f1"] <= 35)
		{
			$factors['Creativity'] = 3;
		}
		else if($bigFive["f1"] >= 36 && $bigFive["f1"] <= 44)
		{
			$factors['Creativity'] = 4;
		}
		else if($bigFive["f1"] >= 45 && $bigFive["f1"] <= 54)
		{
			$factors['Creativity'] = 5;
		}
		else if($bigFive["f1"] >= 55 && $bigFive["f1"] <= 63)
		{
			$factors['Creativity'] = 6;
		}
		else if($bigFive["f1"] >= 64 && $bigFive["f1"] <= 73)
		{
			$factors['Creativity'] = 7;
		}
		else if($bigFive["f1"] >= 74 && $bigFive["f1"] <= 82)
		{
			$factors['Creativity'] = 8;
		}
		else if($bigFive["f1"] >= 83 && $bigFive["f1"] <= 92)
		{
			$factors['Creativity'] = 9;
		}
		else if($bigFive["f1"] >= 93)
		{
			$factors['Creativity'] = 10;
		}

		if($bigFive["f2"] >= 0 && $bigFive["f2"] <= 24)
		{
			$factors['Agreeableness'] = 1;
		}
		else if($bigFive["f2"] >= 25 && $bigFive["f2"] <= 31)
		{
			$factors['Agreeableness'] = 2;
		}
		else if($bigFive["f2"] >= 32 && $bigFive["f2"] <= 39)
		{
			$factors['Agreeableness'] = 3;
		}
		else if($bigFive["f2"] >= 40 && $bigFive["f2"] <= 47)
		{
			$factors['Agreeableness'] = 4;
		}
		else if($bigFive["f2"] >= 48 && $bigFive["f2"] <= 54)
		{
			$factors['Agreeableness'] = 5;
		}
		else if($bigFive["f2"] >= 55 && $bigFive["f2"] <= 62)
		{
			$factors['Agreeableness'] = 6;
		}
		else if($bigFive["f2"] >= 63 && $bigFive["f2"] <= 70)
		{
			$factors['Agreeableness'] = 7;
		}
		else if($bigFive["f2"] >= 71 && $bigFive["f2"] <= 77)
		{
			$factors['Agreeableness'] = 8;
		}
		else if($bigFive["f2"] >= 78 && $bigFive["f2"] <= 85)
		{
			$factors['Agreeableness'] = 9;
		}
		else if($bigFive["f2"] >= 86)
		{
			$factors['Agreeableness'] = 10;
		}

		if($bigFive["f3"] >= 0 && $bigFive["f3"] <= 16)
		{
			$factors['Achievement'] = 1;
		}
		else if($bigFive["f3"] >= 17 && $bigFive["f3"] <= 25)
		{
			$factors['Achievement'] = 2;
		}
		else if($bigFive["f3"] >= 26 && $bigFive["f3"] <= 35)
		{
			$factors['Achievement'] = 3;
		}
		else if($bigFive["f3"] >= 36 && $bigFive["f3"] <= 44)
		{
			$factors['Achievement'] = 4;
		}
		else if($bigFive["f3"] >= 45 && $bigFive["f3"] <= 54)
		{
			$factors['Achievement'] = 5;
		}
		else if($bigFive["f3"] >= 55 && $bigFive["f3"] <= 63)
		{
			$factors['Achievement'] = 6;
		}
		else if($bigFive["f3"] >= 64 && $bigFive["f3"] <= 73)
		{
			$factors['Achievement'] = 7;
		}
		else if($bigFive["f3"] >= 74 && $bigFive["f3"] <= 82)
		{
			$factors['Achievement'] = 8;
		}
		else if($bigFive["f3"] >= 83 && $bigFive["f3"] <= 92)
		{
			$factors['Achievement'] = 9;
		}
		else if($bigFive["f3"] >= 93)
		{
			$factors['Achievement'] = 10;
		}

		if($bigFive["f4"] >= 0 && $bigFive["f4"] <= 20)
		{
			$factors['Extroversion'] = 1;
		}
		else if($bigFive["f4"] >= 21 && $bigFive["f4"] <= 28)
		{
			$factors['Extroversion'] = 2;
		}
		else if($bigFive["f4"] >= 29 && $bigFive["f4"] <= 37)
		{
			$factors['Extroversion'] = 3;
		}
		else if($bigFive["f4"] >= 38 && $bigFive["f4"] <= 45)
		{
			$factors['Extroversion'] = 4;
		}
		else if($bigFive["f4"] >= 46 && $bigFive["f4"] <= 54)
		{
			$factors['Extroversion'] = 5;
		}
		else if($bigFive["f4"] >= 55 && $bigFive["f4"] <= 62)
		{
			$factors['Extroversion'] = 6;
		}
		else if($bigFive["f4"] >= 63 && $bigFive["f4"] <= 71)
		{
			$factors['Extroversion'] = 7;
		}
		else if($bigFive["f4"] >= 72 && $bigFive["f4"] <= 79)
		{
			$factors['Extroversion'] = 8;
		}
		else if($bigFive["f4"] >= 80 && $bigFive["f4"] <= 88)
		{
			$factors['Extroversion'] = 9;
		}
		else if($bigFive["f4"] >= 89)
		{
			$factors['Extroversion'] = 10;
		}

		if($bigFive["f5"] >= 0 && $bigFive["f5"] <= 19)
		{
			$factors['Resilience'] = 1;
		}
		else if($bigFive["f5"] >= 20 && $bigFive["f5"] <= 28)
		{
			$factors['Resilience'] = 2;
		}
		else if($bigFive["f5"] >= 29 && $bigFive["f5"] <= 37)
		{
			$factors['Resilience'] = 3;
		}
		else if($bigFive["f5"] >= 38 && $bigFive["f5"] <= 46)
		{
			$factors['Resilience'] = 4;
		}
		else if($bigFive["f5"] >= 47 && $bigFive["f5"] <= 54)
		{
			$factors['Resilience'] = 5;
		}
		else if($bigFive["f5"] >= 55 && $bigFive["f5"] <= 63)
		{
			$factors['Resilience'] = 6;
		}
		else if($bigFive["f5"] >= 64 && $bigFive["f5"] <= 72)
		{
			$factors['Resilience'] = 7;
		}
		else if($bigFive["f5"] >= 78 && $bigFive["f5"] <= 80)
		{
			$factors['Resilience'] = 8;
		}
		else if($bigFive["f5"] >= 81 && $bigFive["f5"] <= 89)
		{
			$factors['Resilience'] = 9;
		}
		else if($bigFive["f5"] >= 90 )
		{
			$factors['Resilience'] = 10;
		}

		$session_data = $this->session->userdata('logged_in');
		$app_id = $session_data['app_id'];
		$manchester_data = array();
		foreach($factors as $factor => $score) {
			if($score == 1)
			{
				$remarks = "Very Low";
			}
			else if ($score == 2)
			{
				$remarks = "Low";
			}
			else if ($score == 3)
			{
				$remarks = "Below Average";
			}
			else if ($score == 4)
			{
				$remarks = "Low Average";
			}
			else if ($score == 5)
			{
				$remarks = "Average";
			}
			else if ($score == 6)
			{
				$remarks = "High Average";
			}
			else if ($score == 7)
			{
				$remarks = "Above Average";
			}
			else if ($score == 8)
			{
				$remarks == Superior;
			}
			else if ($score == 9)
			{
				$remarks = "Very Superior";
			}
			$manchester_data = array(
				'score' => $score,
				'remarks' => $remarks
			);
			$result = $this->examination_model->saveManchester($app_id, $factor,$manchester_data);
		}
		if($result) {
			redirect('applicant/examination/essay', 'refresh');
		}
	}
}
?>