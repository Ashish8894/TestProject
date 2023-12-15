<?php 
namespace App\Models;

use CodeIgniter\Model;

class SubjectModel extends Model
{
    public function getSubjectName($id){
        $sql = $this->db->query("SELECT SUBJECT_NAME FROM icad_subject_mst WHERE SUBJECT_ID = $id");
        $row = $sql->getRowArray();
        return $row['SUBJECT_NAME'];
    }
    public function subjectByCourse($courseId){
        $sql = $this->db->query("SELECT s.* FROM icad_course_subject_allocation as cs LEFT JOIN icad_subject_mst as s ON cs.SUBJECT_ID = s.SUBJECT_ID WHERE cs.COURSE_ID = $courseId AND cs.IS_DELETED = 'NO' AND cs.STATUS = 'ENABLE' ORDER BY s.SEQUENCE");
        $row = $sql->getResultArray();
        return $row;
    }
    
}