<?php 

class App_exams extends CI_Controller {
	public function getSession() {
		$session_data = $this->session->userdata('employee_login');
		$sess['email'] = $session_data['email'];
		$sess['fname'] = $session_data['fname'];
		$sess['mname'] = $session_data['mname'];
		$sess['lname'] = $session_data['lname'];
		$sess['employee_id'] = $session_data['employee_id'];
		return $sess;
	}
	public function __construct()
	{
		parent::__construct();
		$this->load->model('appexam_model');
		$this->load->model('examination_model');
	}

	public function index() {
		if ($this->session->userdata('employee_login') == NULL) {
			redirect('login');
		} else {
			$list = $this->appexam_model->getAppExam();
			$es = array();
			foreach ($list as $jobs) {
				$row['app_id'] = $jobs['app_id'];
				$row['fullname'] = $jobs['fullname'];
				$row['exam_status'] = $this->appexam_model->checkIfTakenExam($jobs['app_id']);
				$es[] = $row;
			}
			$data = array(
				'exams' => $es
			);
			$this->load->view('careers/includes/header', $this->getSession());
			$this->load->view('careers/applicant_exams', $data);
			$this->load->view('careers/includes/footer');
		}

		
	}
/*	public function getApplicant() {
		
		$list = $this->appexam_model->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $jobs) {
			$no++;
			$row['app_id'] = $jobs->app_id;
			$row['exam_status'] = $this->appexam_model->checkIfTakenExam($jobs->app_id);
			$row['lname'] = $jobs->lname;
			$row['fname'] = $jobs->fname;
			$row['mname'] = $jobs->mname;
			$row['fullname'] = $jobs->fullname;
			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->appexam_model->count_all(),
			"recordsFiltered" => $this->appexam_model->count_filtered(),
			"data" => $data
		);
        //output to json format
		echo json_encode($output);
	}*/


	public function getAppDetails() {
		$app_details = $this->appexam_model->getAppDetails($this->input->post('app_id'));
		echo json_encode($app_details);
	}

	public function appans($app_id){
		$data = array(
			'answers' => $this->examination_model->getAnswers($app_id),
			'essay' => $this->examination_model->getEssay($app_id),
			'app_details' => $this->appexam_model->getAppDetails($app_id),
			'job_essay' => $this->appexam_model->getJobEssay($app_id)
		);
		$this->load->view('careers/appans', $data);
	}


}
?>