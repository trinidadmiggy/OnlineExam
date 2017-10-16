<?php 
class Jobs_model extends CI_Model {
	public function __construct() {
		parent::__construct();
	}

	public function get_job()
	{
		$this->db->select("job_id, job_title, job_description, LEFT(job_description, 20) as jd, image, status");
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


}

?>