<?php

    class AppMonitor extends CI_Controller{
        function __construct() {
            parent::__construct();
            $this->load->model('AppMonitor_model','applicants');
        }
        
        
        function index(){
            $this->load->view('AppMonitor_view');
        }
        function ajax_list()
        {
        $list = $this->applicants->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $applicants) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $applicants->lname;
            $row[] = $applicants->fname;
            $row[] = $applicants->mname;
            $row[] = $applicants->status;
            $row[] = $applicants->positionapplied;
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->applicants->count_all(),
                        "recordsFiltered" => $this->applicants->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }
    }
