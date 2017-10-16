<?php 
class Jobs extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('jobs_model');
/*		if ($this->session->userdata('logged_in') == NULL) {
			redirect('login');
		} else {
			$this->load->model('examination_model');
		}*/
	}
	public function index() {
		$data['jobs'] = $this->jobs_model->get_job();
		$this->load->view('jobs/job_postings', $data);
	}

	public function getJobDetails() {
		$apply = array(
			$this->jobs_model->getJobDetails($this->input->post('job_id')),
			$this->jobs_model->getEssay()
		);
		echo json_encode($apply);
	}
}
?>