<?php 
class Jobs extends CI_Controller {
	public function getSession() {
		$session_data = $this->session->userdata('logged_in');
		$this->app_id = $session_data['app_id'];
		$sess['email'] = $session_data['email'];
		$sess['fname'] = $session_data['fname'];
		$sess['mname'] = $session_data['mname'];
		$sess['lname'] = $session_data['lname'];
		return $sess;
	}
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
		$data = array(
			'jobs' => $this->jobs_model->get_job(),
			'sess' => $this->getSession()
		);

		$this->load->view('jobs/job_postings', $data);
	}

	public function getJobDetails() {
		$apply = array(
			$this->jobs_model->getJobDetails($this->input->post('job_id')),
			$this->jobs_model->getEssay()
		);
		echo json_encode($apply);
	}

	public function apply() {
		$session_data = $this->session->userdata('logged_in');
		$app_id = $session_data['app_id'];

		if($this->jobs_model->checkIfTakenExam($app_id)) {
			if($this->jobs_model->checkApplicantJobs($app_id, $this->input->post('job_id'))) {
				echo '<script>alert("Uh oh! You already applied for this job");</script>';
				redirect('applicant/jobs', 'refresh');
			} else {
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
				echo '<script>alert("Thank you for applying at Questronix");</script>';
				redirect('applicant/jobs', 'refresh');
			}
		} else {
			echo "<script>alert('Uh oh! Please take the examination first...');</script>";
			redirect('applicant/jobs', 'refresh');
		}

	}
}
?>