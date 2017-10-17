<?php 
class Jobs extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('logged_in') == NULL) {
			redirect('login');
		} else {
			$this->load->model('jobs_model');
		}
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

	public function answerEssay() {
		$this->form_validation->set_rules('job_id','Job Id','required|integer');
		$this->form_validation->set_rules('essayid','Question Id','required|integer');
		$this->form_validation->set_rules('essayAns','Answer','alpha_numeric|required');
		$session_data = $this->session->userdata('logged_in');
		$app_id = $session_data['app_id'];

		if($this->jobs_model->checkIfTakenExam($app_id)) {
			if($this->jobs_model->checkApplicantJobs($this->input->post('job_id'),$app_id)) {
				echo "<script>alert('Uh oh! You already applied for this job');</script>";
				redirect('applicant/jobs', 'refresh');
			} else {
				if($this->form_validation->run()) {
					$essay = array(
						'app_id' => $app_id, 
						'question_id' => $this->input->post('essayid'), 
						'answer' => $this->input->post('essayAns')
					);
					$essay_id = $this->jobs_model->answerEssay($essay);
					$job = array(
						'app_id' => $app_id,
						'job_id' => $this->input->post('job_id'),
						'essay_id' => $essay_id
					);
					$this->jobs_model->applyJob($job);
					echo "<script>alert('Thank you for applying at Questronix');</script>";
					redirect('applicant/jobs', 'refresh');
				} else {
					redirect('applicant/jobs', 'refresh');
				}
			}
		} else {
			echo "<script>alert('Uh oh! Please take the examination first...');</script>";
			redirect('applicant/jobs', 'refresh');
		}

	}
}
?>