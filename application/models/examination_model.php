<?php 

class Examination_model extends CI_Model {
/*	var $table = 'question_bank';
    var $column_order = array(null, 'examtype_id','question','option1','option2','option3', 'option4', 'option5'); //set column field database for datatable orderable
    var $column_search = array('question','option1','option2','option3', 'option4', 'option5'); //set column field database for datatable searchable 
    var $order = array('question_id' => 'asc'); // default order */
    public function saveScore($data) {
    	$this->db->set('datestarted', 'NOW()', FALSE);
    	$this->db->set('dateended', 'NOW()', FALSE);
    	$this->db->insert('applicantexamresults', $data);
    	return $this->db->insert_id();
    }

	public function getQuestion($examid) {
		$this->db->select('*');
		$this->db->from('question_bank');
		$this->db->where('examtype_id', $examid);

		return $query = $this->db->get()->result_array();
	}

    public function get_all_count()
    {
        $sql = "SELECT COUNT(*) as tol_question FROM question_bank WHERE examtype_id = 1";       
        $result = $this->db->query($sql)->row();
        return $result;
    }

    public function get_all_content($start,$content_per_page)
    {
        $sql = "SELECT * FROM  question_bank LIMIT $start,$content_per_page";       
        $result = $this->db->query($sql)->result();
        return $result;
    }

	/*private function _get_datatables_query()
	{



		$this->db->from($this->table);

		$i = 0;

        foreach ($this->column_search as $item) // loop column 
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {

                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                	$this->db->or_like($item, $_POST['search']['value']);
                }

                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
                }
                $i++;
            }

        if(isset($_POST['order'])) // here order processing
        {
        	$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
        	$order = $this->order;
        	$this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables()
    {
    	$this->_get_datatables_query();
    	if($_POST['length'] != -1)
    		$this->db->limit($_POST['length'], $_POST['start']);
    	$query = $this->db->get();
    	return $query->result();
    }

    function count_filtered()
    {
    	$this->_get_datatables_query();
    	$query = $this->db->get();
    	return $query->num_rows();
    }

    public function count_all()
    {
    	$this->db->from($this->table);
    	return $this->db->count_all_results();
    }*/

}
?>