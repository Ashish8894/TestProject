<?php 
namespace App\Models;

use CodeIgniter\Model;

class NotificationsModel extends Model
{

    public function notifications($userId){
        // $imgpath="https://www.icadjee.com/icadadmin/upload/";
        // $imgpath="http://localhost:8080/upload/";
        $sql = "SELECT COURSE_ID,BATCH_ID,CENTER_ID,ROLL_NUMBER FROM icad_student_mst WHERE IS_DELETED = 'NO' AND STUDENT_ID = :userId:";
        $newSql = $this->db->query($sql, [
            'userId'     => $userId
        ]);
        $data = $newSql->getRowArray();
		$course = $data['COURSE_ID'];
        $batch = $data['BATCH_ID'];
        $center = $data['CENTER_ID'];
        $rollno = $data['ROLL_NUMBER'];

        $sql2 = "SELECT * FROM `icad_push_notification_dtl` WHERE FIND_IN_SET('STUDENT',`USER_TYPE`) AND IS_DELETED = 'NO' AND STATUS = 'ENABLE' AND ((COURSE_ID = $course AND `TARGET_TYPE`='COURSE') OR (FIND_IN_SET('$course',`COURSE_IDS`) AND `TARGET_TYPE`='COURSE') OR (CENTER_ID = $center AND `TARGET_TYPE`='CENTER') OR (FIND_IN_SET('$center',`CENTER_IDS`) AND `TARGET_TYPE`='CENTER')OR (BATCH_ID = $batch AND `TARGET_TYPE`='BATCH' ) OR(FIND_IN_SET('$batch',`BATCH_IDS`) AND `TARGET_TYPE`='BATCH' ) OR (USER_ID = $userId AND `TARGET_TYPE`='INDIVIDUAL') OR (`TARGET_TYPE`='ALL')) AND PUSH_NOTIFICATION_DTL_ID NOT IN (SELECT PUSH_NOTIFICATION_DTL_ID FROM icad_notification_deletion_dtl WHERE USER_ID = $userId AND IS_DELETED = 'NO' AND STATUS = 'ENABLE') ORDER BY PUSH_NOTIFICATION_DTL_ID DESC";
        $newSql2 = $this->db->query($sql2);
        $data2 = $newSql2->getResultArray();
        $r=array();

        foreach($data2 as $row){
            if($row['IMAGE']!=""){
                $row['IMAGE']=$row['IMAGE'];  
            }
            $row['created']=Date('h:i a d M Y',strtotime($row['CREATED_ON']));
	        $r[]=$row;
        }
        return $r;        
    }

    public function getNotification($id){
        $sql = "SELECT PUSH_NOTIFICATION_DTL_TITLE,PUSH_NOTIFICATION_DTL_MESSAGE,IMAGE as notification_image FROM icad_push_notification_dtl where IS_DELETED = 'NO' AND PUSH_NOTIFICATION_DTL_ID = $id";
        $newSql = $this->db->query($sql);
		$row = $newSql->getResultArray();
        return $row;
	}
    
}