<?php 
namespace App\Models;

use CodeIgniter\Model;

class NoticeboardModel extends Model
{

    public function weekly_schedule($userId){
        $sql = "SELECT COURSE_ID,BATCH_ID,CENTER_ID FROM icad_student_mst WHERE IS_DELETED = 'NO' AND STUDENT_ID = :userId:";
        $newSql = $this->db->query($sql, [
            'userId'     => $userId
        ]);
        $data = $newSql->getRowArray();
		$course = $data['COURSE_ID'];
        $batch = $data['BATCH_ID'];
        $center = $data['CENTER_ID'];

        $sql2 = "SELECT TARGET_TYPE,TITLE,COURSE_ID,CENTER_ID,BATCH_ID,NOTICE_FOR,FROM_DATE,TO_DATE,DOWNLOADABLE,LAST_MODIFIED,ASSET_ID FROM notice_board_dtl WHERE NOTICE_TYPE = 'WEEKLY SCHEDULE' AND IS_DELETED = 'NO' AND `STATUS` = 'ENABLE' AND TO_DATE > NOW() ORDER BY LAST_MODIFIED DESC";
        $newSql2 = $this->db->query($sql2);
        $resfr = $newSql2->getResultArray();

		$data = array();
        $data1 = array();
        $path = '';
        $user = '';
        if(!empty($resfr)) { 
            if(count($resfr) > 0) {
                foreach($resfr as $val){
                    $coursenew = array();
                    $centernew = array();
                    $batchnew = array();
                    
                    if($val['TARGET_TYPE'] == 'ALL'){
                        $data['title'][] = $val['ASSET_ID'];
                        $data1['download'][] = $val['DOWNLOADABLE'];
                    }else if($val['TARGET_TYPE'] == 'COURSE'){
                        if($val['COURSE_ID']){
                            $coursenew = explode(",",$val['COURSE_ID']);
                        }
                        if(in_array($course, $coursenew)){
                            $data['title'][] = $val['ASSET_ID'];
                            $data1['download'][] = $val['DOWNLOADABLE'];
                        }
                    }else if($val['TARGET_TYPE'] == 'CENTER'){
                        if($val['COURSE_ID']){
                            $coursenew = explode(",",$val['COURSE_ID']);
                        }
                        if($val['CENTER_ID']){
                            $centernew = explode(",",$val['CENTER_ID']);
                        }
                        if(in_array($center, $centernew)){
                            if(in_array($course, $coursenew)){
                                $data['title'][] = $val['ASSET_ID'];
                                $data1['download'][] = $val['DOWNLOADABLE'];
                            }
                        }
                    }else if($val['TARGET_TYPE'] == 'BATCH'){
                        if($val['COURSE_ID']){
                            $coursenew = explode(",",$val['COURSE_ID']);
                        }
                        if($val['CENTER_ID']){
                            $centernew = explode(",",$val['CENTER_ID']);
                        }
                        if($val['BATCH_ID']){
                            $batchnew = explode(",",$val['BATCH_ID']);
                        }
                        if(in_array($center, $centernew) && in_array($batch, $batchnew)){
                           if(in_array($course, $coursenew)){
                                $data['title'][] = $val['ASSET_ID'];
                                $data1['download'][] = $val['DOWNLOADABLE'];
                           }
                        }
                    }
                }
                
            }
            $asset_id = '';
            if($data){
                foreach($data as $val){
                    $data['asset_id'] = $val[0];
                    $asset_id = $val[0];
                }
            }
            $download = 'NO';
            if($data1){
                foreach($data1 as $val){
                    $download = $val[0];
                }
            }
            
            if($asset_id == ''){
                $data['download'] = 'NO';
                $data['location'] = $path;
                $data['msg'] = 'Data Not Available';
                $data['DOWNLOADABLE'] = $data['download'];
            }else{
                $sql= "SELECT asset_path FROM asset WHERE id = :asset_id: AND is_deleted = 0";
                $newSql = $this->db->query($sql, [
                    'asset_id'     => $asset_id
                ]);
                $data = $newSql->getRowArray();

                $path = $data['asset_path'];
                // $user= 'asset_space/';
                $data['download'] = $download;
                $data['location'] = $path;
                $data['DOWNLOADABLE'] = $download;
                $data['msg'] = 'Data Available';
            }

        }else{
            $data['download'] = 'NO';
            $data['location'] = '';
            $data['msg'] = 'Data Not Available';
            $data['DOWNLOADABLE'] = $data['download'];
        }
        return $data;
    }

    public function test_schedule($userId){
        $sql = "SELECT COURSE_ID,BATCH_ID,CENTER_ID FROM icad_student_mst WHERE IS_DELETED = 'NO' AND STUDENT_ID = :userId:";
        $newSql = $this->db->query($sql, [
            'userId'     => $userId
        ]);
        $data = $newSql->getRowArray();
        $course = $data['COURSE_ID'];
        $batch = $data['BATCH_ID'];
        $center = $data['CENTER_ID'];

        $sql2 = "SELECT TARGET_TYPE, TITLE, COURSE_ID, CENTER_ID, BATCH_ID, NOTICE_FOR, FROM_DATE, TO_DATE, DOWNLOADABLE, LAST_MODIFIED, ASSET_ID FROM notice_board_dtl WHERE NOTICE_TYPE = 'TEST SCHEDULE' AND IS_DELETED = 'NO' AND `STATUS` = 'ENABLE' AND TO_DATE > NOW() ORDER BY LAST_MODIFIED DESC";
        $newSql2 = $this->db->query($sql2);
        $resfr = $newSql2->getResultArray();

        $data = array();
        $data1 = array();
        $path = '';
        $user = '';
        if(!empty($resfr)) { 
            if(count($resfr) > 0) {
                foreach($resfr as $val){
                    $coursenew = array();
                    $centernew = array();
                    $batchnew = array();
                    
                    if($val['TARGET_TYPE'] == 'ALL'){
                        $data['title'][] = $val['ASSET_ID'];
                        $data1['download'][] = $val['DOWNLOADABLE'];
                    }else if($val['TARGET_TYPE'] == 'COURSE'){
                        if($val['COURSE_ID']){
                            $coursenew = explode(",",$val['COURSE_ID']);
                        }
                        if(in_array($course, $coursenew)){
                            $data['title'][] = $val['ASSET_ID'];
                            $data1['download'][] = $val['DOWNLOADABLE'];
                        }
                    }else if($val['TARGET_TYPE'] == 'CENTER'){
                        if($val['COURSE_ID']){
                            $coursenew = explode(",",$val['COURSE_ID']);
                        }
                        if($val['CENTER_ID']){
                            $centernew = explode(",",$val['CENTER_ID']);
                        }
                        if(in_array($center, $centernew)){
                            if(in_array($course, $coursenew)){
                                $data['title'][] = $val['ASSET_ID'];
                                $data1['download'][] = $val['DOWNLOADABLE'];
                            }
                        }
                    }else if($val['TARGET_TYPE'] == 'BATCH'){
                        if($val['COURSE_ID']){
                            $coursenew = explode(",",$val['COURSE_ID']);
                        }
                        if($val['CENTER_ID']){
                            $centernew = explode(",",$val['CENTER_ID']);
                        }
                        if($val['BATCH_ID']){
                            $batchnew = explode(",",$val['BATCH_ID']);
                        }
                        if(in_array($center, $centernew) && in_array($batch, $batchnew)){
                            if(in_array($course, $coursenew)){
                                $data['title'][] = $val['ASSET_ID'];
                                $data1['download'][] = $val['DOWNLOADABLE'];
                            }
                        }
                    }
                }
                
            }
            $asset_id = '';
            if($data){
                foreach($data as $val){
                    $data['asset_id'] = $val[0];
                    $asset_id = $val[0];
                }
            }
            $download = 'NO';
            if($data1){
                foreach($data1 as $val){
                    $download = $val[0];
                }
            }
            if($asset_id == ''){   
                    $data['download'] = 'NO';
                    $data['location'] = $path;
                    $data['msg'] = 'Data Not Available';
                    $data['DOWNLOADABLE'] = $data['download'];
            }else{
                $sql= "SELECT asset_path FROM asset WHERE id = :asset_id: AND is_deleted = 0";
                $newSql = $this->db->query($sql, [
                    'asset_id'     => $asset_id
                ]);
                $data = $newSql->getRowArray();

                $path = $data['asset_path'];
                $data['download'] = $download;
                $data['location'] = $path;
                $data['DOWNLOADABLE'] = $download;
                $data['msg'] = 'Data Available';
            }

        }else{
            $data['download'] = 'NO';
            $data['location'] = $path;
            $data['msg'] = 'Data Not Available';
            $data['DOWNLOADABLE'] = $data['download'];
        }
        return $data;
    }

    public function test_syllabus($userId){
        $sql = "SELECT COURSE_ID,BATCH_ID,CENTER_ID FROM icad_student_mst WHERE IS_DELETED = 'NO' AND STUDENT_ID = :userId:";
        $newSql = $this->db->query($sql, [
            'userId'     => $userId
        ]);
        $data = $newSql->getRowArray();
        $course = $data['COURSE_ID'];
        $batch = $data['BATCH_ID'];
        $center = $data['CENTER_ID'];

        $sql2 = "SELECT TARGET_TYPE,TITLE,COURSE_ID,CENTER_ID,BATCH_ID,NOTICE_FOR,FROM_DATE,TO_DATE,DOWNLOADABLE,LAST_MODIFIED,ASSET_ID FROM notice_board_dtl WHERE NOTICE_TYPE = 'TEST SYLLABUS' AND IS_DELETED = 'NO' AND `STATUS` = 'ENABLE' AND TO_DATE > NOW() ORDER BY LAST_MODIFIED DESC";
        $newSql2 = $this->db->query($sql2);
        $resfr = $newSql2->getResultArray();

        $data = array();
        $data1 = array();
        $path = '';
        $user = '';
        if(!empty($resfr)) { 
            if(count($resfr) > 0) {
                foreach($resfr as $val){
                    $coursenew = array();
                    $centernew = array();
                    $batchnew = array();
                    
                    if($val['TARGET_TYPE'] == 'ALL'){
                        $data['title'][] = $val['ASSET_ID'];
                        $data1['download'][] = $val['DOWNLOADABLE'];
                    }else if($val['TARGET_TYPE'] == 'COURSE'){
                        if($val['COURSE_ID']){
                            $coursenew = explode(",",$val['COURSE_ID']);
                        }
                        if(in_array($course, $coursenew)){
                            $data['title'][] = $val['ASSET_ID'];
                            $data1['download'][] = $val['DOWNLOADABLE'];
                        }
                    }else if($val['TARGET_TYPE'] == 'CENTER'){
                        if($val['COURSE_ID']){
                            $coursenew = explode(",",$val['COURSE_ID']);
                        }
                        if($val['CENTER_ID']){
                            $centernew = explode(",",$val['CENTER_ID']);
                        }
                        if(in_array($center, $centernew)){
                            if(in_array($course, $coursenew)){
                                $data['title'][] = $val['ASSET_ID'];
                                $data1['download'][] = $val['DOWNLOADABLE'];
                            }
                        }
                    }else if($val['TARGET_TYPE'] == 'BATCH'){
                        if($val['COURSE_ID']){
                            $coursenew = explode(",",$val['COURSE_ID']);
                        }
                        if($val['CENTER_ID']){
                            $centernew = explode(",",$val['CENTER_ID']);
                        }
                        if($val['BATCH_ID']){
                            $batchnew = explode(",",$val['BATCH_ID']);
                        }
                        if(in_array($center, $centernew) && in_array($batch, $batchnew)){
                            if(in_array($course, $coursenew)){
                                $data['title'][] = $val['ASSET_ID'];
                                $data1['download'][] = $val['DOWNLOADABLE'];
                            }
                        }
                    }
                }
                
            }
            $asset_id = '';
            if($data){
                foreach($data as $val){
                    $data['asset_id'] = $val[0];
                    $asset_id = $val[0];
                }
            }
            $download = 'NO';
            if($data1){
                foreach($data1 as $val){
                    $download = $val[0];
                }
            }
            
            if($asset_id == ''){
                $data['download'] = 'NO';
                $data['location'] = $path;
                $data['msg'] = 'Data Not Available';
                $data['DOWNLOADABLE'] = $data['download'];
            }else{
                $sql= "SELECT asset_path FROM asset WHERE id = :asset_id: AND is_deleted = 0";
                $newSql = $this->db->query($sql, [
                    'asset_id'     => $asset_id
                ]);
                $data = $newSql->getRowArray();

                $path = $data['asset_path'];
                $data['download'] = $download;
                $data['location'] = $path;
                $data['DOWNLOADABLE'] = $download;
                $data['msg'] = 'Data Available';
            }

        }else{
            $data['download'] = 'NO';
            $data['location'] = '';
            $data['msg'] = 'Data Not Available';
            $data['DOWNLOADABLE'] = $data['download'];
        }
        return $data;
    }

    public function event_schedule($userId){
        $sql = "SELECT COURSE_ID,BATCH_ID,CENTER_ID FROM icad_student_mst WHERE IS_DELETED = 'NO' AND STUDENT_ID = :userId:";
        $newSql = $this->db->query($sql, [
            'userId'     => $userId
        ]);
        $data = $newSql->getRowArray();
		$course = $data['COURSE_ID'];
        $batch = $data['BATCH_ID'];
        $center = $data['CENTER_ID'];

        $sql2 = "SELECT TARGET_TYPE,TITLE,COURSE_ID,CENTER_ID,BATCH_ID, ASSET_ID FROM `notice_board_dtl` WHERE NOTICE_TYPE = 'EVENT SCHEDULE' AND IS_DELETED = 'NO' AND `STATUS` = 'ENABLE' ORDER BY LAST_MODIFIED DESC";
        $newSql2 = $this->db->query($sql2);
        $resfr = $newSql2->getResultArray();
		$data = array();
        $title = array();
        if(!empty($resfr)) { 
            if(count($resfr) > 0) {
                foreach($resfr as $val){
                    $coursenew = array();
                    $centernew = array();
                    $batchnew = array();
                    if($val['TARGET_TYPE'] == 'ALL'){
                        $data[] = $val['ASSET_ID'];
                        $title[] = $val['TITLE'];
                    }else if($val['TARGET_TYPE'] == 'COURSE'){
                        if($val['COURSE_ID']){
                            $coursenew = explode(",",$val['COURSE_ID']);
                        }
                        if(in_array($course, $coursenew)){
                            $data[] = $val['ASSET_ID'];
                            $title[] = $val['TITLE'];
                        }
                    }else if($val['TARGET_TYPE'] == 'CENTER'){
                        if($val['COURSE_ID']){
                            $coursenew = explode(",",$val['COURSE_ID']);
                        }
                        if($val['CENTER_ID']){
                            $centernew = explode(",",$val['CENTER_ID']);
                        }
                        if(in_array($center, $centernew)){
                            if(in_array($course, $coursenew)){
                                $data[] = $val['ASSET_ID'];
                                $title[] = $val['TITLE'];
                            }
                        }
                    }else if($val['TARGET_TYPE'] == 'BATCH'){
                        if($val['COURSE_ID']){
                            $coursenew = explode(",",$val['COURSE_ID']);
                        }
                        if($val['CENTER_ID']){
                            $centernew = explode(",",$val['CENTER_ID']);
                        }
                        if($val['BATCH_ID']){
                            $batchnew = explode(",",$val['BATCH_ID']);
                        }
                        if(in_array($center, $centernew) && in_array($batch, $batchnew)){
                           if(in_array($course, $coursenew)){
                            $data[] = $val['ASSET_ID'];
                            $title[] = $val['TITLE'];
                           }
                        }
                    }
                } 
                   
                $data['asset'] = $data;
                $data['title'] = $title;
                $data['msg'] = 'no data';
            }
        }else{
            $data['asset'] = '';
            $data['title'] = '';
            $data['msg'] = 'Data Not Available';
            
        }
        return $data;
    }

    public function loaddata($id){
        $asset_id = $id;
        $user = '';
        $path = '';
        if($asset_id == ''){
            $data['msg'] = 'Data Not Available';
            $data['location'] = '';
            $data['download'] = 'NO';
        }else{
            $sql = "SELECT ASSET_ID,DOWNLOADABLE FROM notice_board_dtl WHERE IS_DELETED = 'NO' AND ASSET_ID = :asset_id:";
            $newSql = $this->db->query($sql, [
                'asset_id'     => $asset_id
            ]);
            $data = $newSql->getRowArray();
            $asset = '';
            $download = 'NO';
            if($data){
                $asset = $data['ASSET_ID'];
                $download = $data['DOWNLOADABLE'];
            }
            if($asset){
                $sql1= "SELECT asset_path FROM asset WHERE id = $asset_id AND is_deleted = 0";
                $newSql1 = $this->db->query($sql1);
                $data1 = $newSql1->getRowArray();
                if($data1){
                    $path = $data1['asset_path'];
                } 
            }
            $data['location'] = $path;
            $data['download'] = $download;
            $data['msg'] = 'Data Available';
        }
            return $data;        
    }
    
}