<?php 
class Jobs_model extends CI_Model {
	public function __construct() {
		parent::__construct();
	}

	public function get_job()
	{
		$this->db->select("job_id, job_title, job_description, LEFT(job_description, 50) as jd, image, status");
		$this->db->from("jobs");
		$this->db->where("status", "Posted");
		return $this->db->get()->result_array();
	}
	public function getJobDetails($job_id) {
		return $this->db->get_where('jobs',array('job_id'=>$job_id))->row_array();
	}

	public function getEssay() {
		return $this->db->get_where('question_bank',array('question_id'=> 264))->row_array();
	}

	public function answerEssay($essay) {
		$this->db->insert('applicant_essay',$essay);
		return $this->db->insert_id();
	}

	public function applyJob($job) {
		$this->db->insert('applicant_appliedjob',$job);
		return $this->db->insert_id();
	}

	public function checkIfTakenExam($app_id) {
		$this -> db -> select('app_id, examtype_id');
		$this -> db -> from('applicant_technical');
		$this -> db -> where('app_id', $app_id);
		$this -> db -> where('remarks is NOT NULL');
		$technical = $this -> db -> get();

		$this -> db -> select('app_id');
		$this -> db -> from('applicant_manchester');
		$this -> db -> where('app_id', $app_id);
		$this -> db -> where('remarks is NOT NULL');
		$manchester = $this -> db -> get();

		$this -> db -> select('app_id');
		$this -> db -> from('applicant_essay');
		$this -> db -> where('app_id', $app_id);
		$this -> db -> where('answer is NOT NULL');
		$essay = $this -> db -> get();

		if($technical->num_rows() == 0 && $manchester->num_rows() == 0 && $essay->num_rows() == 0) {
			return false;
		}
		else
		{
			return true;
		}
	}
	public function checkApplicantJobs($app_id, $job_id) {
		return $this->db->get_where('applicant_appliedjob',array('app_id' => $app_id, 'job_id' => $job_id))->row_array();
	}


}

?>