<?php 

class Examination_model extends CI_Model {

    public function saveScore($data) {
    	$this->db->set('datestarted', 'NOW()', FALSE);
    	$this->db->set('dateended', 'NOW()', FALSE);
    	$this->db->insert('applicantexamresults', $data);
    	return $this->db->insert_id();
    }


    public function getQuestion1($page, $id){
        $offset = 10*$page;
        $limit = 10;
        $sql = "select * from question_bank where examtype_id = $id limit $offset ,$limit";
        $result = $this->db->query($sql)->result();
        return $result;
    }
}
?>