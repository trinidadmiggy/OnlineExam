<?php 
class Careers_model extends CI_Model {

	var $table = 'jobs';
    var $column_order = array(null, 'job_title', null, 'images', 'status'); //set column field database for datatable orderable
    var $column_search = array('job_title', 'job_description', 'status'); //set column field database for datatable searchable 
    var $order = array('job_id' => 'desc'); // default order 

    public function __construct() {
    	parent::__construct();
    }

    private function _get_datatables_query() {
    	$this->db->from($this->table);

    	$i = 0;

        foreach ($this->column_search as $item) { // loop column 
            if ($_POST['search']['value']) { // if datatable send POST for search

                if ($i === 0) { // first loop
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                	$this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
                }
                $i++;
            }

        if (isset($_POST['order'])) { // here order processing
        	$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
        	$order = $this->order;
        	$this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables() {
    	$this->_get_datatables_query();
    	if ($_POST['length'] != -1)
    		$this->db->limit($_POST['length'], $_POST['start']);
    	$query = $this->db->get();
    	return $query->result();
    }

    function count_filtered() {
    	$this->_get_datatables_query();
    	$query = $this->db->get();
    	return $query->num_rows();
    }

    public function count_all() {
    	$this->db->from($this->table);
    	return $this->db->count_all_results();
    }


    public function get_job($job_id)
    {
        return $this->db->get_where('jobs',array('job_id'=>$job_id))->row_array();
    }


    public function addJob($dataJob) {
        $this->db->insert('jobs',$dataJob);
        return $this->db->insert_id();
    }

    public function updateJob($job_id,$params)
    {
        $this->db->where('job_id',$job_id);
        return $this->db->update('jobs',$params);
    }

    public function postStatus($job_id,$params) {
       $this->db->where('job_id',$job_id);
       return $this->db->update('jobs',$params);
   }
}
?>
