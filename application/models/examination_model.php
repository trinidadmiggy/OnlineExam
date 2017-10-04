<?php 

class Examination_model extends CI_Model {

    public function takeExam($data) {
        $this->db->set('datestarted', 'NOW()', FALSE);
        $this->db->insert('applicantexamresults', $data);
    }
    public function saveScore($score, $app_id) {
    	$this->db->set('dateended', 'NOW()', FALSE);
        $this->db->where('app_id', $app_id);
        $this->db->update('applicantexamresults', $score);
    }
    public function getQuestion($id){
        $this->db->select('*');
        $this->db->from('question_bank');
        $this->db->where('examtype_id', $id);

        return $query = $this->db->get()->result_array();
    }

    public function checkUserExam($app_id, $examtype_id) {

    }
}
?>