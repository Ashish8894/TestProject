<?php 
namespace App\Models;

use CodeIgniter\Model;

class TestModel extends Model
{

    public function list_full_test($userId){
        $sql = "SELECT COURSE_ID FROM icad_student_mst WHERE IS_DELETED = 'NO' AND STATUS = 'ENABLE' AND STUDENT_ID = :userId:";
        $newSql = $this->db->query($sql, [
            'userId'     => $userId
        ]);
        $data = $newSql->getRowArray();
		$subids = $data['COURSE_ID'];

        $sql2 = "SELECT * FROM `icad_student_result_os_dtl` WHERE `STUDENT_ID` = :userId: AND IS_DELETED = 'NO' AND STATUS = 'ENABLE'";
        $newSql2 = $this->db->query($sql2, [
            'userId'     => $userId
        ]);
        $resfr = $newSql2->getResultArray();

		$frarray = array();
        $frarray2 = array();
        $frarray3 = array();
        $frarray4 = array();
        foreach($resfr as $rowfr){
            $frarray[$rowfr['EXAM_ID']]=$rowfr['EXAM_ID'];
            $frarray3[$rowfr['EXAM_ID']]=$rowfr['TOTAL_MARKS'];
            $frarray4[$rowfr['EXAM_ID']]=$rowfr['REVIEW_STATUS'];
        }

       $sql = "SELECT ex.*, ph.EXAM_PHASE_NAME FROM icad_exam_mst as ex LEFT JOIN icad_exam_phase_mst as ph ON ex.EXAM_PHASE_ID = ph.EXAM_PHASE_ID WHERE ex.IS_DELETED = 'NO' AND ex.STATUS = 'ENABLE' AND ex.NUMBER_OF_QUESTIONS > 0 AND ex.EXAM_ID IN (SELECT EXAM_ID FROM icad_student_exam_test_allocation WHERE STUDENT_ID = :userId: AND IS_DELETED = 'NO') ORDER BY ex.EXAM_ID DESC";
        $res = $this->db->query($sql, [
            'userId'     => $userId,
            'subids'  => $subids
        ]);
        $resfr1 = $res->getResultArray();
        $r=array();
        foreach($resfr1 as $row){
            $endDuration = '';
            if($row['IS_EXAM_SCHEDULE'] == 'YES'){
            //echo $row['SCHEDULE_END_DATE'];exit;
            if(!empty($row['SCHEDULE_END_DATE']) && $row['SCHEDULE_END_DATE'] != '0000-00-00 00:00:00'){
                
                $to_time = strtotime($row['SCHEDULE_END_DATE']);
                $from_time = strtotime(date('Y-m-d H:i:s'));
        
                $endDuration = round(abs($to_time - $from_time) / 60,2);
            }
            }
            if(array_key_exists($row['EXAM_ID'], $frarray)){
                $eid=$row['EXAM_ID'];
                $row = array('fid' => $frarray[$eid]) + $row;
                $row = array('examstatus' => 'completed') + $row;
                $row = array('tmarks' => $frarray3[$eid]) + $row;
                $row = array('review_status' => $frarray4[$eid]) + $row;
                $row = array('expire_duration' => $endDuration) + $row;
                /*if($frarray4[$eid]=='reviewed' && $row['review_status']==1){
                    $row['review_status']=2;
                }*/
            }else{
                $row = array('fid' => '0') + $row;
                $row = array('examstatus' => 'not apeared') + $row;
                $row = array('tmarks' => '0') + $row;
                $row = array('expire_duration' => $endDuration) + $row;
                if($row['IS_SECTION_AVAILABLE'] == 'YES'){
                    $sqltest1 = "SELECT EXAM_SUBJECT_SECTION_ID as subjectId FROM icad_exam_subject_section_mst WHERE EXAM_ID = :examId: AND STATUS = 'ENABLE' AND IS_DELETED = 'NO'";
                    $res = $this->db->query($sqltest1, [
                        'examId'     => $row['EXAM_ID']
                    ]);
                }else{
                    $sqltest1 = "SELECT SUBJECT_ID as subjectId FROM icad_subject_mst WHERE SUBJECT_ID IN (".$row['SUBJECT_IDS'].") AND STATUS = 'ENABLE' AND IS_DELETED = 'NO'";
                    $res = $this->db->query($sqltest1);
                }
                
                $res1 = $res->getResultArray();
                $s = array();
                foreach($res1 as $row1){
                        $s[]=$row1['subjectId'];
                }
                $substr = implode(",",$s);
                $row = array('sub_ids' => $substr) + $row;
            }
                $r[]=$row;
        }
        return $r;
    }

    public function check_user_exam_status($testid,$userid){
        $session = \Config\Services::session();
        //print_r($testid);print_r($ind);print_r($userid);die;
        /*$sql1 = "SELECT device_id FROM icad_student_mst WHERE IS_DELETED = 'NO' AND STATUS = 'ENABLE' AND STUDENT_ID = :userId:";
        $newSql1 = $this->db->query($sql1, [
            'userId'     => $userid
        ]);
        $data1 = $newSql1->getRowArray();
		$device_ses_id = $data1['device_id'];*/
        //$device_ses_id = $_SERVER['HTTP_COOKIE'];
        $device_ses_id = $session->get('device_ses_id');
        $sql = "SELECT SCHEDULE_DATE, SCHEDULE_END_DATE, IS_EXAM_SCHEDULE, EXAM_DURATION FROM icad_exam_mst WHERE EXAM_ID = :testid:";
        $newSql = $this->db->query($sql, [
            'testid'     => $testid
        ]);
        $rowtest = $newSql->getRowArray();

        $sql2 = "SELECT EXAM_END_TIME FROM icad_student_exam_time WHERE STUDENT_ID = :userid: AND EXAM_ID = :testid:";
        $sqlChTime = $this->db->query($sql2, [
            'testid'     => $testid,
            'userid'     => $userid
        ]);
        $rowChtime = $sqlChTime->getRowArray();
        $endExamTime = '';
        if($rowChtime){
            $endExamTime = $rowChtime['EXAM_END_TIME'];
        }

        // $dt = new DateTime("now", new DateTimeZone('Asia/Calcutta'));
        //print_r($dt);die;

        $curTime = date('Y-m-d H:i:s');
        $status = 'success';
        $errmsg = '';
        $err_msg = '';
        if($rowtest['IS_EXAM_SCHEDULE'] == 'YES'){
            /*$newEndDate = strtotime("+".$rowtest['EXAM_DURATION']." minutes", strtotime($rowtest['SCHEDULE_DATE']));
            if(strtotime($rowtest['SCHEDULE_END_DATE']) < strtotime($newEndDate)){
                $rowtest['SCHEDULE_END_DATE'] = $newEndDate;
            }*/
            
            if(strtotime($rowtest['SCHEDULE_DATE']) > strtotime($curTime)){
                $status = 'error';
                $errmsg = '3';
                $err_msg = 'Your exam will starts on: '.date('d-m-Y H:i:s', strtotime($rowtest['SCHEDULE_DATE']));
            }
            
            if(!empty($rowtest['SCHEDULE_END_DATE']) && $rowtest['SCHEDULE_END_DATE'] != '0000-00-00 00:00:00'){
                $examScheduelEndTime = $rowtest['SCHEDULE_END_DATE'];
                if($endExamTime != '' && strtotime($rowtest['SCHEDULE_END_DATE']) < strtotime($endExamTime)){
                    $examScheduelEndTime = $endExamTime;
                }
                if(strtotime($examScheduelEndTime) < strtotime($curTime)){
                    $status = 'error';
                    $errmsg = '4';
                    $err_msg = 'Your exam has expired ';
                }
            }
        }
        //echo $status;exit;
        //print_r($rowtest);exit;
        if($status == 'success'){
            $sql3 = "SELECT * FROM icad_os_exam_attempt_status WHERE STUDENT_ID = :userid: AND EXAM_ID = :testid:";
            $sqltest2 = $this->db->query($sql3, [
                'testid'     => $testid,
                'userid'     => $userid
            ]);
            $res = $sqltest2->getResultArray();
            /*echo $device_ses_id;
            print_r($res);exit;*/
            foreach($res as $row){
                if($row['EXAM_STATUS'] == 'STARTED' && $row['DEVICE_ID'] == $device_ses_id){
                    $status = 'success';
                    $attid = $row['OS_EXAM_ATTEMPT_ID'];
                    $sql4 = $this->db->query("DELETE FROM icad_os_exam_attempt_status WHERE OS_EXAM_ATTEMPT_ID = $attid");
                    
                }else{
                    if($row['EXAM_STATUS'] == 'COMPLETED'){
                        $status = 'error';
                        //$errmsg = 'Exam Already Submitted!';
                        $errmsg = '1';
                    }else{
                        $status = 'error';
                        //$errmsg = 'Exam In Proccess on other device.';
                        $errmsg = '2';
                    }
                }
            }
        }

        $r['status'] = $status;
        $r['msg'] = $errmsg;
        $r['err_msg'] = $err_msg;
        return $r;
    }

    public function view_question($qid,$txtamid){
        //echo $qid;exit;
        $std=11;
        $_SESSION['amt']=1;
        $sql1 = "SELECT * FROM icad_question_mst WHERE IS_DELETED = 'NO' AND STATUS = 'ENABLE' AND QUESTION_ID = :qid:";
        $newSql1 = $this->db->query($sql1, [
            'qid'     => $qid
        ]);
        $row = $newSql1->getRowArray();
        //print_r($row);exit;
        $given_answer = $txtamid;
        $alpha = array(1 => 'A', 2 => 'B', 3 => 'C', 4 => 'D', 5 => 'E', 6 => 'F', 7 => 'G', 8 => 'H');
        $canText = '';
        if($row['IS_CANCELED'] == 'YES'){
            $canText = '<h4 class="text-danger">Canceled </h4>';
        }
        $queStr = $row['QUESTION_DTL'];
        $queStr = str_replace("\begin{array}","\begin{array}{cc}",$queStr);
        $queStr = str_replace("\begin{array}{cc}{cc}","\begin{array}{cc}",$queStr);
        $txtanstext = $canText.$queStr.'<br/>';
        $numberOfOption = $row['NUMBER_OF_OPTIONS'];

        if($row['QUESTIONS_TYPE_ID'] == 1){
            $correctAnswer = $row['CORRECT_ANSWER_OPTION'];
        }else if($row['QUESTIONS_TYPE_ID'] == 2){
            $correctAnswer = explode(":",$row['CORRECT_ANSWER_MULTIPLE']);
        }else{
            $range1 = $row['CORRECT_ANSWER_TEXT_FROM'];
            $range2 = $row['CORRECT_ANSWER_TEXT_TO'];
        }

        if($row['QUESTIONS_TYPE_ID'] == 1){
            for($i = 1; $i <= $numberOfOption; $i++){
                $optstr = 'ANSWER_OPTION_'.$i;
                $opt = str_replace("<p>","",$row[$optstr]); 
                $opt = str_replace("</p>","",$opt); 
                $opt = str_replace("\begin{array}","\begin{array}{cc}",$opt);
                $opt = str_replace("\begin{array}{cc}{cc}","\begin{array}{cc}",$opt);
                if($i == $correctAnswer){
                    $txtanstext .= '<span style="color:#00b085;">'.$alpha[$i].') '.$opt.'</span><br/>';
                }else{
                    $txtanstext .= $alpha[$i].') '.$opt.'<br/>';
                }
            }
        }else if($row['QUESTIONS_TYPE_ID'] == 2){
            for($i = 1; $i <= $numberOfOption; $i++){
                $optstr = 'ANSWER_OPTION_'.$i;
                $opt = str_replace("<p>","",$row[$optstr]); 
                $opt = str_replace("</p>","",$opt); 
                $opt = str_replace("\begin{array}","\begin{array}{cc}",$opt);
                $opt = str_replace("\begin{array}{cc}{cc}","\begin{array}{cc}",$opt);
                if(in_array($i,$correctAnswer)){
                    $txtanstext .= '<span style="color:#00b085;">'.$alpha[$i].') '.$opt.'</span><br/>';
                }else{
                    $txtanstext .= $alpha[$i].') '.$opt.'<br/>';
                }
            }
        }else{
            $txtanstext .= '<span style="color:#00b085;">'.$range1.'-'.$range2.'</span>';
        }
        return $txtanstext; 
    }

    public function getExamSubject($testid, $isSection, $subIds){
        if($isSection == 'YES'){
            $sql = "SELECT EXAM_SUBJECT_SECTION_ID as subjectId, SUBJECT_SECTION_NAME as subjectName, QUESTION_RESTRICTED_COUNT FROM icad_exam_subject_section_mst WHERE EXAM_ID = $testid AND STATUS = 'ENABLE' AND IS_DELETED = 'NO'";
        }else{
            $sql = "SELECT SUBJECT_ID as subjectId, SUBJECT_NAME as subjectName FROM icad_subject_mst WHERE SUBJECT_ID IN (".$subIds.") AND STATUS = 'ENABLE' AND IS_DELETED = 'NO'";
        }
        $exe = $this->db->query($sql);
        $res = $exe->getResultArray();
        return $res;
    }

    public function getExamQuestionByExam($examId){
        $sql = "SELECT q.QUESTION_ID as question_id, q.BULK_QUESTION_ID, q.QUESTION_DTL as question, q.QUESTIONS_TYPE_ID as question_type, q.NUMBER_OF_OPTIONS as number_of_options, q.ANSWER_OPTION_1 as option1, q.ANSWER_OPTION_2 as option2, q.ANSWER_OPTION_3 as option3, q.ANSWER_OPTION_4 as option4, q.ANSWER_OPTION_5 as option5, q.ANSWER_OPTION_6 as option6, q.ANSWER_OPTION_7 as option7, q.ANSWER_OPTION_8 as option8, q.EXAM_SUBJECT_SECTION_ID as subject_section_id, q.IS_CANCELED, c.INSTRUCTION as instructions, c.MAX_FULL_MARK as max_mark, c.PARTIAL_MARKS as partial_mark, c.NEGATIVE_MARKS as negative_mark, s.SUBJECT_ID as subject_id, s.SUBJECT_NAME as subject, es.SUBJECT_SECTION_NAME as section FROM icad_question_mst as q LEFT JOIN icad_exam_marks_dtl as c ON q.EXAM_MARKS_DTL_ID = c.EXAM_MARKS_DTL_ID LEFT JOIN icad_subject_mst as s ON q.SUBJECT_ID = s.SUBJECT_ID LEFT JOIN icad_exam_subject_section_mst as es ON q.EXAM_SUBJECT_SECTION_ID = es.EXAM_SUBJECT_SECTION_ID WHERE q.EXAM_TYPE_ID = 2 AND q.EXAM_ID = :examId: AND q.IS_DELETED = 'NO' AND q.STATUS = 'ENABLE'";

        $newSql = $this->db->query($sql, [
            'examId'     => $examId
        ]);
        $row = $newSql->getResultArray();
        return $row;
    }

    public function getExamScheduleDetail($examId){
        $sql = "SELECT SCHEDULE_DATE, SCHEDULE_END_DATE, IS_EXAM_SCHEDULE, EXAM_DURATION FROM icad_exam_mst WHERE EXAM_ID = :examId:";
        $newSql = $this->db->query($sql, [
            'examId'     => $examId
        ]);
        $row = $newSql->getRowArray();
        return $row;
    }

    public function getExamExtraTimeByUser($examId, $userId){
        $sql = "SELECT EXAM_END_TIME FROM icad_student_exam_time WHERE STUDENT_ID = :userId: AND EXAM_ID = :examId:";
        $newSql = $this->db->query($sql, [
            'examId'     => $examId,
            'userId'     => $userId
        ]);
        $row = $newSql->getRowArray();
        return $row;
    }
    public function getExamAttemptStatus($examId, $userId){
        $sql = "SELECT * FROM icad_os_exam_attempt_status WHERE STUDENT_ID = :userId: AND EXAM_ID = :examId:";
        $newSql = $this->db->query($sql, [
            'examId'     => $examId,
            'userId'     => $userId
        ]);
        $row = $newSql->getRowArray();
        return $row;
    }
    public function getUserById($userId){
        $sql = "SELECT COURSE_ID, BATCH_ID FROM icad_student_mst WHERE STUDENT_ID = :userId:";
        $newSql = $this->db->query($sql, [
            'userId'     => $userId
        ]);
        $row = $newSql->getRowArray();
        return $row;
    }
}