<?php 
class Appexam_model extends CI_Model {

/*    var $table = 'applicantinfo';
    var $column_order = array(null,'lname', 'fname', 'mname', null, null, null, null, null, null, null, null, null,); //set column field database for datatable orderable
    var $column_search = array('lname', 'fname','mname'); //set column field database for datatable searchable 
    var $order = array('lname' => 'asc'); // default order */

    public function __construct() {
    	parent::__construct();
    }

  /*  private function _get_datatables_query() {
        $this->db->select('app_id, lname, mname, fname, CONCAT(lname, " ", fname, " ", mname) as fullname, birthdate, address, telephone, mobile, email');
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
*/

    function getAppExam() {
       $this->db->select('app_id, lname, mname, fname, CONCAT(lname, ", ", fname, " ", mname) as fullname, birthdate, address, telephone, mobile, email');
       $this->db->from('applicantinfo');
       $query = $this->db->get();
       return $query->result_array();
   }

   public function getAppDetails($app_id) {
    return $this->db->get_where('applicantinfo',array('app_id'=>$app_id))->row_array();
}

public function getJobEssay($app_id) {
    $this -> db -> select('es.essay_id, qb.question, es.answer, j.job_title');
    $this -> db -> from('jobs j');
    $this -> db -> join('applicant_appliedjob aj', 'aj.job_id = j.job_id');
    $this -> db -> join('applicant_essay es', 'es.essay_id = aj.essay_id');
    $this -> db -> join('question_bank qb', 'qb.question_id = es.question_id');
    $this -> db -> where('aj.app_id', $app_id);
    return $query = $this->db->get()->result_array();
}


public function checkIfTakenExam($app_id) {
    $this -> db -> select('app_id, examtype_id');
    $this -> db -> from('applicant_technical');
    $this -> db -> where('app_id', $app_id);
    $this -> db -> where('remarks is NOT NULL');
    $technical = $this -> db -> get();

    $this -> db -> select('app_id');
    $this -> db -> from('applicant_manchester');
    $this -> db -> where('app_id', $app_id);
    $this -> db -> where('remarks is NOT NULL');
    $manchester = $this -> db -> get();

    $this -> db -> select('app_id');
    $this -> db -> from('applicant_essay');
    $this -> db -> where('app_id', $app_id);
    $this -> db -> where('answer is NOT NULL');
    $essay = $this -> db -> get();

    if($technical->num_rows() < 5 && $manchester->num_rows() == 0 && $essay->num_rows() == 0) {
        return false;
    }
    else
    {
        return true;
    }
}
}
?>
