<?php 

class App_exams extends CI_Controller {
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
			$this->load->view('careers/includes/header');
			$this->load->view('careers/applicant_exams');
			$this->load->view('careers/includes/footer');
		}

		
	}
	public function getApplicant() {
		
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
	}

	public function getAppDetails() {
		$app_details = $this->appexam_model->getAppDetails($this->input->post('app_id'));
		echo json_encode($app_details);
	}

	public function appans($app_id){
		$data = array(
			'answers' => $this->examination_model->getAnswers($app_id),
			'essay' => $this->examination_model->getEssay($app_id),
			'app_details' =>$this->appexam_model->getAppDetails($app_id)
		);
		$this->load->view('careers/appans', $data);
	}

}
?>