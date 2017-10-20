<?php 

class Careers extends CI_Controller {
	public function getSession() {
		$session_data = $this->session->userdata('employee_login');
		$sess['email'] = $session_data['email'];
		$sess['fname'] = $session_data['fname'];
		$sess['mname'] = $session_data['mname'];
		$sess['lname'] = $session_data['lname'];
		$sess['employee_id'] = $session_data['employee_id'];
		return $sess;
	}
	function __construct()
	{
		parent::__construct();
		$this->load->model('careers_model');
		$this->getSession();
	}

	public function index() {
		if ($this->session->userdata('employee_login') == NULL) {
			redirect('login');
		} else {
			
			$this->load->view('careers/includes/header', $this->getSession());
			$this->load->view('careers/careers_management');
			$this->load->view('careers/includes/footer');
		}
	}
	public function updateGetJobs() {
		$updateJob = $this->careers_model->get_job($this->input->post('job_id'));
		echo json_encode($updateJob);
	}
	public function jobs() {

		$list = $this->careers_model->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $jobs) {
			$no++;
			$row['job_id'] = $jobs->job_id;
			$row['job_title'] = $jobs->job_title;
			$row['job_description'] = $jobs->job_description;
			$row['image'] = $jobs->image;
			$row['status'] = $jobs->status;
			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->careers_model->count_all(),
			"recordsFiltered" => $this->careers_model->count_filtered(),
			"data" => $data
		);
        //output to json format
		echo json_encode($output);
	}


	 /*
     * Adding a new job
     */
	 function add()
	 {   
	 	$this->load->library('form_validation');

	 	$this->form_validation->set_rules('jobTitle','Job Title','required|alpha|is_unique[jobs.job_title]'); /*is_unique[jobs.job_title]*/
	 	$this->form_validation->set_rules('jobDesc','Job Description','required');
	 	$this->form_validation->set_message('is_unique', 'The job you are trying to add already exists');
	 	$config['upload_path']   = './public/dist/img/jobs/'; 
	 	$config['allowed_types'] = 'jpeg|jpg|png|JPG'; 
	 	$this->load->library('upload', $config);

	 	if($this->form_validation->run() && $this->upload->do_upload('jobImage'))     
	 	{   
	 		$data =  $this->upload->data();
	 		$image= "public/dist/img/jobs/". $data['raw_name'] . $data['file_ext'];

	 		$dataJob = array(
	 			'job_Title' => $this->input->post('jobTitle'),
	 			'image' => $image,
	 			'status' => 'Not Posted',
	 			'job_description' => $this->input->post('jobDesc'),
	 		);

	 		$this->careers_model->addJob($dataJob);
	 		redirect('hr/careers');
	 	}
	 	else
	 	{   

	 		$this->session->set_flashdata('addupload_error', $this->upload->display_errors());
	 		$this->session->set_flashdata('addform_error', validation_errors());
	 		redirect('hr/careers');
	 	}
	 } 



	  /*
     * Editing a job
     */
	  public function updateJob()
	  {   
        // check if the job exists before trying to edit it
	  	$data['job'] = $this->careers_model->get_job($this->input->post('job_id'));
	  	if(isset($data['job']['job_id']))
	  	{
	  		$this->form_validation->set_rules('jobTitle','Job Title','required|alpha');
	  		$this->form_validation->set_rules('jobDesc','Job Description','required');
	  		$this->form_validation->set_rules('status','Status','required');

	  		$config['upload_path']   = './public/dist/img/jobs/'; 
	  		$config['allowed_types'] = 'jpeg|jpg|png|JPG'; 
	  		$this->load->library('upload', $config);

	  		if(!$this->upload->do_upload('jobImage')) {
	  			$image = $this->input->post('jobImagePath');
	  		} else {
	  			$dataImage =  $this->upload->data();
	  			$image = "public/dist/img/jobs/". $dataImage['raw_name'] . $dataImage['file_ext'];
	  			
	  		}

	  		if($this->form_validation->run()) {   
	  			$params = array(	
	  				'job_Title' => $this->input->post('jobTitle'),
	  				'image' => $image,
	  				'status' => 'Not Posted',
	  				'job_description' => $this->input->post('jobDesc'),
	  			);

	  			$this->careers_model->updateJob($data['job']['job_id'],$params);            
	  			redirect('hr/careers');
	  		} else {
	  			$this->session->set_flashdata('editform_error', validation_errors());
	  			$this->session->set_flashdata('id', $this->input->post('job_id'));
	  			redirect('hr/careers');
	  		} 
	  	} else {
	  		show_error('The job you are trying to edit does not exist.');
	  	}
	  	
	  }

	  public function postStatus()
	  {   
        // check if the job exists before trying to edit it
	  	$data['job'] = $this->careers_model->get_job($this->input->post('job_id'));
	  	if(isset($data['job']['job_id']))
	  	{

	  		if($this->input->post('status') == "Not Posted") {
	  			$params = array(
	  				'status' => 'Posted'
	  			);
	  		}else {
	  			$params = array(
	  				'status' => 'Not Posted'
	  			);
	  		}
	  		$this->careers_model->postStatus($data['job']['job_id'],$params);            
	  		redirect('hr/careers', 'refresh');

	  	} else
	  	show_error('The job you are trying to edit does not exist.');
	  }
	}

	?>