<?php 
namespace App\Models;

use CodeIgniter\Model;

class SrbModel extends Model
{

    public function list_videos($userId){
        $sql = "SELECT icm.COURSE_NAME FROM icad_student_mst as ism LEFT JOIN icad_course_mst as icm ON ism.COURSE_ID = icm.COURSE_ID WHERE ism.IS_DELETED = 'NO' AND ism.STATUS = 'ENABLE' AND ism.STUDENT_ID = :userId:";
        $newSql = $this->db->query($sql, [
            'userId'     => $userId
        ]);
        $data = $newSql->getRowArray();
		$subids = $data['COURSE_NAME'];
        
        $sql2 = "SELECT * FROM `video_lectures` WHERE `course` = :subids:";
        $newSql2 = $this->db->query($sql2, [
            'subids'     => $subids
        ]);
        $data2 = $newSql2->getResultArray();
        $r=array();
        foreach($data2 as $row){
            $r[] = $row;
        }
        return $r;
    }
    
}