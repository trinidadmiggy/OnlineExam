<?php 

class Careers extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('careers_model');
	}

	function index() {
/*		if ($this->session->userdata('logged in') == NULL) {
			redirect('login');
		} else {
			$str = $this->session->userdata('logged in');
			$fname['fname'] = $str['firstname'];
			$fname['lname'] = $str['lastname'];
			$this->load->view('AppMonitor_view', $fname);
		}*/
		$this->load->view('careers/includes/header');
		$this->load->view('careers/careers_management');
		$this->load->view('careers/includes/footer');
		
	}

	function jobs() {
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

	 	$this->form_validation->set_rules('jobTitle','Job Title','required|alpha');
	 	$this->form_validation->set_rules('jobDesc','Job Description','alpha_numeric');

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
	 			'status' => 'Active',
	 			'job_description' => $this->input->post('jobDesc'),
	 		);

	 		$this->careers_model->addJob($dataJob);
	 		redirect('hr/careers');
	 	}
	 	else
	 	{            
	 		$data['_view'] = 'job/add';
	 		$this->load->view('layouts/main',$data);
	 	}
	 } 



	  /*
     * Editing a job
     */
	  function edit($job_id)
	  {   
        // check if the job exists before trying to edit it
	  	$data['job'] = $this->Job_model->get_job($job_id);

	  	if(isset($data['job']['job_id']))
	  	{
	  		if(isset($_POST) && count($_POST) > 0)     
	  		{   
	  			$params = array(
	  				'job_title' => $this->input->post('job_title'),
	  				'image' => $this->input->post('image'),
	  				'status' => $this->input->post('status'),
	  				'job_description' => $this->input->post('job_description'),
	  			);

	  			$this->Job_model->update_job($job_id,$params);            
	  			redirect('job/index');
	  		}
	  		else
	  		{
	  			$data['_view'] = 'job/edit';
	  			$this->load->view('layouts/main',$data);
	  		}
	  	}
	  	else
	  		show_error('The job you are trying to edit does not exist.');
	  }
	}
	
	?>