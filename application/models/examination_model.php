<?php 

class Examination_model extends CI_Model {

    public function takeExam($startExam) {
        $this->db->set('datestarted', 'NOW()', FALSE);
        $this->db->insert('applicant_scores', $startExam);
    }
    public function saveScore($score, $app_id) {
    	$this->db->set('dateended', 'NOW()', FALSE);
        $this->db->where('app_id', $app_id);
        $this->db->update('applicant_scores', $score);
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