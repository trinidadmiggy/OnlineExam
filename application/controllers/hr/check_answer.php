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

	public function manchester() {
		$score = 0;
		$q_no=1;
		$mpq = array();
		$questions = $this->examination_model->getQuestion(7);
		foreach($questions as $question)
		{
			for($i = 1; $i <= 15; $i++)
			{
				if($this->input->post('manchester_q'.$q_no) == "A") 
				{
					$mpq["$i"] = 5;
				}
				else if($this->input->post('manchester_q'.$q_no) == "B")
				{
					$mpq["$i"] = 4;
				}
				else if($this->input->post('manchester_q'.$q_no) == "C")
				{
					$mpq["$i"] = 3;
				}
				else if($this->input->post('manchester_q'.$q_no) == "D")
				{
					$mpq["$i"] = 2;
				}
				else if($this->input->post('manchester_q'.$q_no) == "E")
				{
					$mpq["$i"] = 1;
				}
			}

			for($i = 16; $i <= 30; $i++)
			{
				if($this->input->post('manchester_q'.$q_no) == "A") 
				{
					$mpq["$i"] = 1;
				}
				else if($this->input->post('manchester_q'.$q_no) == "B")
				{
					$mpq["$i"] = 2;
				}
				else if($this->input->post('manchester_q'.$q_no) == "C")
				{
					$mpq["$i"] = 3;
				}
				else if($this->input->post('manchester_q'.$q_no) == "D")
				{
					$mpq["$i"] = 4;
				}
				else if($this->input->post('manchester_q'.$q_no) == "E")
				{
					$mpq["$i"] = 5;
				}
			}

			for($i = 31; $i <= 45; $i++)
			{
				if($this->input->post('manchester_q'.$q_no) == "A") 
				{
					$mpq["$i"] = 5;
				}
				else if($this->input->post('manchester_q'.$q_no) == "B")
				{
					$mpq["$i"] = 4;
				}
				else if($this->input->post('manchester_q'.$q_no) == "C")
				{
					$mpq["$i"] = 3;
				}
				else if($this->input->post('manchester_q'.$q_no) == "D")
				{
					$mpq["$i"] = 2;
				}
				else if($this->input->post('manchester_q'.$q_no) == "E")
				{
					$mpq["$i"] = 1;
				}
			}

			for($i = 46; $i <= 60; $i++)
			{
				if($this->input->post('manchester_q'.$q_no) == "A") 
				{
					$mpq["$i"] = 1;
				}
				else if($this->input->post('manchester_q'.$q_no) == "B")
				{
					$mpq["$i"] = 2;
				}
				else if($this->input->post('manchester_q'.$q_no) == "C")
				{
					$mpq["$i"] = 3;
				}
				else if($this->input->post('manchester_q'.$q_no) == "D")
				{
					$mpq["$i"] = 4;
				}
				else if($this->input->post('manchester_q'.$q_no) == "E")
				{
					$mpq["$i"] = 5;
				}
			}

			for($i = 61; $i <= 75; $i++)
			{
				if($this->input->post('manchester_q'.$q_no) == "A") 
				{
					$mpq["$i"] = 5;
				}
				else if($this->input->post('manchester_q'.$q_no) == "B")
				{
					$mpq["$i"] = 4;
				}
				else if($this->input->post('manchester_q'.$q_no) == "C")
				{
					$mpq["$i"] = 3;
				}
				else if($this->input->post('manchester_q'.$q_no) == "D")
				{
					$mpq["$i"] = 2;
				}
				else if($this->input->post('manchester_q'.$q_no) == "E")
				{
					$mpq["$i"] = 1;
				}
			}

			for($i = 76; $i <= 90; $i++)
			{
				if($this->input->post('manchester_q'.$q_no) == "A") 
				{
					$mpq["$i"] = 1;
				}
				else if($this->input->post('manchester_q'.$q_no) == "B")
				{
					$mpq["$i"] = 2;
				}
				else if($this->input->post('manchester_q'.$q_no) == "C")
				{
					$mpq["$i"] = 3;
				}
				else if($this->input->post('manchester_q'.$q_no) == "D")
				{
					$mpq["$i"] = 4;
				}
				else if($this->input->post('manchester_q'.$q_no) == "E")
				{
					$mpq["$i"] = 5;
				}

			}
			$q_no++;
		}

		$primaryDimensions = array();
		$p=1;
		for($y = 1; $y <= 15; $y++)
		{	
			$sum = 0;
			echo $y."<hr/>";
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
		print_r($primaryDimensions);


		$bigFive = array();

		$bigFive["f1"] = ((3 * $primaryDimensions["S1"]) + (3 * $primaryDimensions["S2"]) + (3 * $primaryDimensions["S3"]) + (2 * $primaryDimensions["S4"]) + 
			(2 * $primaryDimensions["S8"])) - 20;
		$bigFive["f2"] = ((3 * $primaryDimensions["S5"]) + (4 * $primaryDimensions["S6"]) + (2 * $primaryDimensions["S9"]) - (3 * $primaryDimensions["S8"])) + 20;
		$bigFive["f3"] = ((2 * $primaryDimensions["S8"]) + (4 * $primaryDimensions["S10"]) + (4 * $primaryDimensions["S11"]) + (4 * $primaryDimensions["S12"]) + (2 * $primaryDimensions["S13"])) - 38;
		$bigFive["f4"] = ((2 * $primaryDimensions["S5"]) + (6 * $primaryDimensions["S7"]) - (3 * $primaryDimensions["S8"]) - (3 * $primaryDimensions["S9"])) + 43;
		$bigFive["f5"] = ((5 * $primaryDimensions["S13"]) - (2 * $primaryDimensions["S6"]) - (6 * $primaryDimensions["S14"])) + 72;
		print_r($bigFive);

		if($bigFive["f1"] >= 0 && $bigFive["f1"] <= 16)
		{

		}
		else if($bigFive["f1"] >= 17 && $bigFive["f1"] <= 25)
		{

		}
		else if($bigFive["f1"] >= 26 && $bigFive["f1"] <= 35)
		{
			
		}
		else if($bigFive["f1"] >= 36 && $bigFive["f1"] <= 44)
		{
			
		}
		else if($bigFive["f1"] >= 45 && $bigFive["f1"] <= 54)
		{
			
		}
		else if($bigFive["f1"] >= 55 && $bigFive["f1"] <= 63)
		{
			
		}
		else if($bigFive["f1"] >= 64 && $bigFive["f1"] <= 73)
		{
			
		}
		else if($bigFive["f1"] >= 74 && $bigFive["f1"] <= 82)
		{
			
		}
		else if($bigFive["f1"] >= 83 && $bigFive["f1"] <= 92)
		{
			
		}
		else if($bigFive["f1"] >= 93)
		{
			
		}

		if($bigFive["f2"] >= 0 && $bigFive["f2"] <= 24)
		{

		}
		else if($bigFive["f2"] >= 25 && $bigFive["f2"] <= 31)
		{

		}
		else if($bigFive["f2"] >= 32 && $bigFive["f2"] <= 39)
		{
			
		}
		else if($bigFive["f2"] >= 40 && $bigFive["f2"] <= 47)
		{
			
		}
		else if($bigFive["f2"] >= 48 && $bigFive["f2"] <= 54)
		{
			
		}
		else if($bigFive["f2"] >= 55 && $bigFive["f2"] <= 62)
		{
			
		}
		else if($bigFive["f2"] >= 63 && $bigFive["f2"] <= 70)
		{
			
		}
		else if($bigFive["f2"] >= 71 && $bigFive["f2"] <= 77)
		{
			
		}
		else if($bigFive["f2"] >= 78 && $bigFive["f2"] <= 85)
		{
			
		}
		else if($bigFive["f2"] >= 86)
		{
			
		}

		if($bigFive["f3"] >= 0 && $bigFive["f3"] <= 16)
		{

		}
		else if($bigFive["f3"] >= 17 && $bigFive["f3"] <= 25)
		{

		}
		else if($bigFive["f3"] >= 26 && $bigFive["f3"] <= 35)
		{
			
		}
		else if($bigFive["f3"] >= 36 && $bigFive["f3"] <= 44)
		{
			
		}
		else if($bigFive["f3"] >= 45 && $bigFive["f3"] <= 54)
		{
			
		}
		else if($bigFive["f3"] >= 55 && $bigFive["f3"] <= 63)
		{
			
		}
		else if($bigFive["f3"] >= 64 && $bigFive["f3"] <= 73)
		{
			
		}
		else if($bigFive["f3"] >= 74 && $bigFive["f3"] <= 82)
		{
			
		}
		else if($bigFive["f3"] >= 83 && $bigFive["f3"] <= 92)
		{
			
		}
		else if($bigFive["f3"] >= 93)
		{
			
		}

		if($bigFive["f4"] >= 0 && $bigFive["f4"] <= 20)
		{

		}
		else if($bigFive["f4"] >= 21 && $bigFive["f4"] <= 28)
		{

		}
		else if($bigFive["f4"] >= 29 && $bigFive["f4"] <= 37)
		{
			
		}
		else if($bigFive["f4"] >= 38 && $bigFive["f4"] <= 45)
		{
			
		}
		else if($bigFive["f4"] >= 46 && $bigFive["f4"] <= 54)
		{
			
		}
		else if($bigFive["f4"] >= 55 && $bigFive["f4"] <= 62)
		{
			
		}
		else if($bigFive["f4"] >= 63 && $bigFive["f4"] <= 71)
		{
			
		}
		else if($bigFive["f4"] >= 72 && $bigFive["f4"] <= 79)
		{
			
		}
		else if($bigFive["f4"] >= 80 && $bigFive["f4"] <= 88)
		{
			
		}
		else if($bigFive["f4"] >= 89)
		{
			
		}

		if($bigFive["f4"] >= 0 && $bigFive["f4"] <= 19)
		{

		}
		else if($bigFive["f4"] >= 20 && $bigFive["f4"] <= 28)
		{

		}
		else if($bigFive["f4"] >= 29 && $bigFive["f4"] <= 37)
		{
			
		}
		else if($bigFive["f4"] >= 38 && $bigFive["f4"] <= 46)
		{
			
		}
		else if($bigFive["f4"] >= 47 && $bigFive["f4"] <= 54)
		{
			
		}
		else if($bigFive["f4"] >= 55 && $bigFive["f4"] <= 63)
		{
			
		}
		else if($bigFive["f4"] >= 64 && $bigFive["f4"] <= 72)
		{
			
		}
		else if($bigFive["f4"] >= 78 && $bigFive["f4"] <= 80)
		{
			
		}
		else if($bigFive["f4"] >= 81 && $bigFive["f4"] <= 89)
		{
			
		}
		else if($bigFive["f4"] >= 90 )
		{
			
		}
	}
}
?>