<?php 

class Examination_model extends CI_Model {

    public function takeTechnical($startTechnical) {
        $this->db->set('datestarted', 'NOW()', FALSE);
        $this->db->insert('applicant_technical', $startTechnical);
    }

    public function takeManchester($startManchester) {
        $this->db->set('start', 'NOW()', FALSE);
        $this->db->insert('applicant_manchester', $startManchester);
    }

    public function takeEssay($startEssay) {
        $this->db->set('datestarted', 'NOW()', FALSE);
        $this->db->insert('applicant_essay', $startEssay);
    }
/////////////////////////////////////////////////////////////////////////////////////////////

    public function saveScore($computeScore, $app_id, $examtype_id) {
    	$this->db->set('dateended', 'NOW()', FALSE);
        $this->db->where('app_id', $app_id);
        $this->db->where('examtype_id', $examtype_id);
        $this->db->update('applicant_technical', $computeScore);
    }    

    public function saveManchester($app_id, $factor, $manchester) {
        $this->db->set('end', 'NOW()', FALSE);
        $this->db->where('app_id', $app_id);
        $this->db->where('factor', $factor);
        $this->db->update('applicant_manchester', $manchester);
    }

    public function saveAnswers($ans) {
        $this->db->insert('applicant_answers', $ans);
    }

    public function getQuestion($id){
        $this->db->select('*');
        $this->db->from('question_bank');
        $this->db->where('examtype_id', $id);

        return $query = $this->db->get()->result_array();
    }
}
?>