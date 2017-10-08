<?php 

class Examination_model extends CI_Model {
    /*Get questions*/
    public function getQuestion($id){
        $this->db->select('*');
        $this->db->from('question_bank');
        $this->db->where('examtype_id', $id);

        return $query = $this->db->get()->result_array();
    }

    /*Record start time*/
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

    /*saving of score/answers*/
    public function saveScore($computeScore, $app_id, $examtype_id) {
    	$this->db->set('dateended', 'NOW()', FALSE);
        $this->db->where('app_id', $app_id);
        $this->db->where('examtype_id', $examtype_id);
        $this->db->update('applicant_technical', $computeScore);

        if($this->db->affected_rows() > 0) {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }    

    public function saveManchester($app_id, $factor, $manchester) {
        $this->db->set('end', 'NOW()', FALSE);
        $this->db->where('app_id', $app_id);
        $this->db->where('factor', $factor);
        $this->db->update('applicant_manchester', $manchester);

        if($this->db->affected_rows() > 0) {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    public function saveAnswers($ans) {
        $this->db->insert('applicant_answers', $ans);
    }

    public function checkIfTakenExam($app_id, $examtype_id) {
        $this -> db -> select('app_id, examtype_id');
        $this -> db -> from('applicant_technical');
        $this -> db -> where('app_id', $app_id);
        $this -> db -> where('examtype_id', $examtype_id);
        $this -> db -> where('remarks is NOT NULL');
        $this -> db -> limit(1);

        $query = $this -> db -> get();

        if($query->num_rows() == 1)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    public function checkIfTakenManchester($app_id) {
        $this -> db -> select('app_id');
        $this -> db -> from('applicant_manchester');
        $this -> db -> where('app_id', $app_id);
        $this -> db -> where('score', 0);
        $this -> db -> limit(1);

        $query = $this -> db -> get();

        if($query->num_rows() == 0)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

}
?>