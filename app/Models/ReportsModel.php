<?php 
namespace App\Models;

use CodeIgniter\Model;

class ReportsModel extends Model
{
    public function getResultList(){
        $sql = "SELECT isrodc.STUDENT_RESULT_ID,isrodc.EXAM_TYPE_ID,isrodc.SUBJECT_ID,isrodc.COURSE_ID,isrodc.EXAM_SUBMITTED_DATE,isrodc.EXAM_SUBMITTED_TIME,isrodc.TOTAL_QUESTIONS,isrodc.TOTAL_MARKS,iem.EXAM_NAME FROM icad_student_result_os_dtl as isrodc LEFT JOIN icad_exam_mst as iem ON iem.EXAM_ID = isrodc.EXAM_ID where isrodc.IS_DELETED = 'NO' AND iem.IS_MATHJAX = 'YES' AND isrodc.STATUS = 'ENABLE' AND isrodc.STUDENT_ID = :userId: ORDER BY isrodc.LAST_MODIFIED DESC";
        $newSql = $this->db->query($sql, [
            'userId' => $_SESSION['icaduserid']
        ]);
        $data = $newSql->getResultArray();
        return $data;
	}
    
    public function getExamList($examid){
        $sql = "SELECT isrodc.STUDENT_RESULT_ID,isrodc.EXAM_ID,iem.EXAM_NAME FROM icad_student_result_os_dtl as isrodc LEFT JOIN icad_exam_mst as iem ON iem.EXAM_ID = isrodc.EXAM_ID where isrodc.IS_DELETED = 'NO' AND isrodc.STATUS = 'ENABLE' AND isrodc.STUDENT_RESULT_ID = :examid:";
        $newSql = $this->db->query($sql, [
            'examid' => $examid
        ]);
        $data = $newSql->getRowArray();
        return $data;
    }

    public function  selfreasonstatus($examId,$userId){
       $sql = "SELECT COUNT(question_id) as count FROM os_result_self_response where exam_id = :examid: AND student_id =:userId:";
        $newSql = $this->db->query($sql, [
            'examid' => $examId,
            'userId' => $userId
        ]);
        $data = $newSql->getRowArray();
        return $data;
    }
        
    public function QuestionId($examid) {
        $sql = "SELECT QUESTION_ID FROM icad_question_mst where IS_DELETED = 'NO' AND STATUS = 'ENABLE' AND EXAM_ID = :examid:";
        $newSql = $this->db->query($sql, [
            'examid' => $examid
        ]);
        $data = $newSql->getResultArray();
        $ids= array();
        foreach($data as $val){
           $ids[] = $val['QUESTION_ID']; 
        }
        return $ids;
    }

    public function getExamDetail($examid) {
       $sql = "SELECT isrodc.STUDENT_RESULT_ID,isrodc.EXAM_ID,iem.EXAM_NAME,isrodc.TIMESPENT,isrodc.TOTAL_QUESTIONS FROM icad_student_result_os_dtl as isrodc LEFT JOIN icad_exam_mst as iem ON iem.EXAM_ID = isrodc.EXAM_ID LEFT JOIN icad_question_mst as iqm ON iqm.EXAM_ID = iem.EXAM_ID where isrodc.IS_DELETED = 'NO' AND isrodc.STATUS = 'ENABLE' AND isrodc.EXAM_ID = :examid:";
        $newSql = $this->db->query($sql, [
            'examid' => $examid
        ]);
        $data = $newSql->getRowArray();
        return $data;
    }

    public function getReviewReason(){
        $sql = "SELECT QUESTION_REVIEW_REASON_NAME FROM icad_question_review_reason_mst where IS_DELETED = 'NO' AND IS_TEXTBOX ='NO' AND STATUS = 'ENABLE'";
        $newSql = $this->db->query($sql);
        $data = $newSql->getResultArray();
        return $data;
    }

    public function getHintDetail($questionId){
        $sql = "SELECT iqm.HINT,iqm.EXAM_ID,iem.EXAM_NAME FROM icad_question_mst as iqm LEFT JOIN icad_exam_mst as iem ON iem.EXAM_ID = iqm.EXAM_ID where iqm.IS_DELETED = 'NO' AND iqm.STATUS = 'ENABLE' AND iqm.QUESTION_ID = :questionId:";
        $newSql = $this->db->query($sql, [
            'questionId' => $questionId
        ]);
        $data = $newSql->getRowArray();
        return $data;
    }

    public function getReportReason(){
        $sql = "SELECT QUESTION_REPORT_REASON_ID,QUESTION_REPORT_REASON_NAME FROM icad_question_report_reason where IS_DELETED = 'NO' AND STATUS = 'ENABLE'";
        $newSql = $this->db->query($sql);
        $data = $newSql->getResultArray();
        return $data;
    }

    public function getReportListReason(){
        $sql = "SELECT QUESTION_REVIEW_REASON_ID,QUESTION_REVIEW_REASON_NAME FROM icad_question_review_reason_mst where IS_DELETED = 'NO' AND STATUS = 'ENABLE'";
        $newSql = $this->db->query($sql);
        $data = $newSql->getResultArray();
        return $data;
    }

    public function getReportReasonDtl($reportedId){
        $sql = "SELECT QUESTION_REVIEW_REASON_ID,QUESTION_REVIEW_REASON_NAME FROM icad_question_review_reason_mst where IS_DELETED = 'NO' AND STATUS = 'ENABLE' AND QUESTION_REVIEW_REASON_ID = :reportedId:";
        $newSql = $this->db->query($sql, [
            'reportedId' => $reportedId
        ]);
        $data = $newSql->getRowArray();
        return $data;
    }

    public function  getSubjectDtl($questionId){
        $sql = "SELECT SUBJECT_ID FROM icad_question_mst where IS_DELETED = 'NO' AND STATUS = 'ENABLE' AND QUESTION_ID = :questionId:";
        $newSql = $this->db->query($sql, [
            'questionId' => $questionId
        ]);
        $data = $newSql->getRowArray();
        return $data;
    }

    public function  getSubjectId($questionId){
        $sql = "SELECT SUBJECT_ID,QUESTION_ID FROM icad_question_mst where IS_DELETED = 'NO' AND STATUS = 'ENABLE' AND QUESTION_ID IN ($questionId) ";
        $newSql = $this->db->query($sql);
        $data = $newSql->getResultArray();
        return $data;
    }

    public function getReportData($questionId,$reportedId){
        $sql = "SELECT QUESTION_REPORT_REASON_NAME FROM icad_question_report_reason where IS_DELETED = 'NO' AND STATUS = 'ENABLE' AND QUESTION_REPORT_REASON_ID = :reportedId:";
        $newSql = $this->db->query($sql,[
            'reportedId' => $reportedId
        ]);
        $data1 = $newSql->getRowArray();
        $data['QUESTION_REPORT_REASON_NAME'] = $data1['QUESTION_REPORT_REASON_NAME'];

        $sql = "SELECT QUESTIONS_TYPE_ID,SUBJECT_ID FROM icad_question_mst where IS_DELETED = 'NO' AND STATUS = 'ENABLE' AND QUESTION_ID = :questionId:";
        $newSql = $this->db->query($sql,[
            'questionId' => $questionId
        ]);
        $data2 = $newSql->getRowArray();
        $data['QUESTIONS_TYPE_ID'] = $data2['QUESTIONS_TYPE_ID'] ;
        $data['SUBJECT_ID'] = $data2['SUBJECT_ID'] ;
        return $data;
    }

    public function similar_question($questionId){    
        $sql2 = "SELECT iqm.QUESTION_ID,iqm.COURSE_ID,iqm.SUBJECT_ID,iqm.EXAM_ID FROM icad_question_mst as iqm where iqm.IS_DELETED = 'NO' AND iqm.STATUS = 'ENABLE' AND iqm.QUESTION_ID = :questionId:";
        $newSql2 = $this->db->query($sql2,[
            'questionId' => $questionId
        ]);
        $data2 = $newSql2->getRowArray();

        $sql = "SELECT iqm.*,iem.EXAM_NAME FROM icad_question_mst as iqm LEFT JOIN icad_exam_mst as iem ON iem.EXAM_ID = iqm.EXAM_ID where iqm.IS_DELETED = 'NO' AND iqm.STATUS = 'ENABLE' AND iqm.BULK_QUESTION_ID = :questionId:";
        $newSql = $this->db->query($sql,[
            'questionId' => $questionId
        ]);
        $data = $newSql->getResultArray();
        $r=array();
        
        $userId = $_SESSION['icaduserid'];
        // if(count($data) > 0){
        //     $r['questatus']='Yes';
        // }else{
        //     $r['questatus']='No';
        // }
        // $r['userId'] = $userId;
        $sql3 = "SELECT count(STUDENT_RESULT_ID) as count FROM icad_student_similar_result_dtl where IS_DELETED = 'NO' AND STATUS = 'ENABLE' AND EXAM_ID  = :examId: AND STUDENT_ID= :userId: AND COURSE_ID =:courseId: AND PARENT_QUESTION_ID=:questionId: ";
        $newSql3 = $this->db->query($sql3,[
            'examId' => $data2['EXAM_ID'],
            'userId' => $userId,
            'courseId' => $data2['COURSE_ID'],
            'questionId' => $questionId
        ]);
        $data3 = $newSql3->getRowArray();
        $r=array();
        $id = array();
        // if($data3['count'] > 0){
        //     $r['status']='Result';
        // }else{
        //     $r['status']='Start';
        // }
        $userId = $_SESSION['icaduserid'];
        foreach($data as $key=>$row){
            $r[$key]=$row;
        }
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
    
            $queStr = $row['QUESTION_DTL'];
            $queStr = str_replace("\begin{array}","\begin{array}{cc}",$queStr);
            $queStr = str_replace("\begin{array}{cc}{cc}","\begin{array}{cc}",$queStr);
            $txtanstext = $queStr.'<br/>';
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
            $txtanstext .= '<span style="color:#00b085;">'.$row['SOLUTION'];'</span>';
            return $txtanstext; 
        }

    public function getStatus($questionid){
        $userId = $_SESSION['icaduserid'];

        $sql2 = "SELECT ALL_QUESTION_IDS, APPEAR_ANSWER_OPTIONS, GIVEN_ANSWER_MULTIPLE_OPTIONS, GIVEN_ANSWER_TEXT_NUMBER, QUESTION_STATUS_FLAG, REVIEW_REASONS, QUESTION_STATUS_DTL, APPEAR_QUESTION_TIME FROM icad_student_similar_result_dtl WHERE STUDENT_ID = :userId: AND PARENT_QUESTION_ID = :questionId: AND IS_DELETED = 'NO' AND STATUS = 'ENABLE' ORDER BY STUDENT_RESULT_ID DESC limit 1";
        $newSql2 = $this->db->query($sql2, [
            'questionId'     => $questionid,
            'userId' => $userId
        ]);
        $res2 = $newSql2->getResultArray();
        if($res2 != ''){
            $status['quesstatus'] = 'Yes';
        }else{
            $status['quesstatus'] = 'No';
        }

        $sql = "SELECT EXAM_ID,COURSE_ID FROM icad_question_mst where IS_DELETED = 'NO' AND STATUS = 'ENABLE' AND QUESTION_ID = :questionId: ";
        $newSql = $this->db->query($sql,[
            'questionId' => $questionid
        ]);
        $data = $newSql->getRowArray();
        $status['examId'] = $data['EXAM_ID'];
        $status['questionId'] = $questionid;
        $EXAM_ID = $data['EXAM_ID'];
        $COURSE_ID = $data['COURSE_ID'];

        $sql3 = "SELECT count(STUDENT_RESULT_ID) as count FROM icad_student_similar_result_dtl where IS_DELETED = 'NO' AND STATUS = 'ENABLE' AND STUDENT_ID= $userId AND COURSE_ID = $COURSE_ID AND PARENT_QUESTION_ID = $questionid ";
        $newSql3 = $this->db->query($sql3
        //,[
        //     'examId' => $data['EXAM_ID'],
        //     'userId' => $userId,
        //     'courseId' => $data['COURSE_ID'],
          //  'questionId' => $questionid
        //]
    );
        $data3 = $newSql3->getRowArray();
        
        if($data3['count'] > 0){
            $status['resstatus']='Result';
        }else{
            $status['resstatus']='Start';
        }
        
        return $status ;
    }

    public function getSimilarQuestion($questionid){
		$sql = "SELECT QUESTION_ID, COURSE_ID, SUBJECT_ID, TOPIC_ID, STEP_ID, LECTURE_ID, QUESTIONS_TYPE_ID, QUESTION_DTL, NUMBER_OF_OPTIONS, ANSWER_OPTION_1, ANSWER_OPTION_2, ANSWER_OPTION_3, ANSWER_OPTION_4, ANSWER_OPTION_5, ANSWER_OPTION_6, ANSWER_OPTION_7, ANSWER_OPTION_8, CORRECT_ANSWER_OPTION, CORRECT_ANSWER_MULTIPLE, CORRECT_ANSWER_TEXT_FROM as range1, CORRECT_ANSWER_TEXT_TO as range2, SOLUTION, HINT FROM icad_question_mst WHERE BULK_QUESTION_ID = :questionid: AND IS_DELETED = 'NO' AND STATUS = 'ENABLE'";
		$newSql = $this->db->query($sql, [
            'questionid'     => $questionid
        ]);
        $res = $newSql->getResultArray();
        return $res;
	}

    public function getSimilarResult($questionid, $userId){
		$sql = "SELECT ALL_QUESTION_IDS, APPEAR_ANSWER_OPTIONS, GIVEN_ANSWER_MULTIPLE_OPTIONS, GIVEN_ANSWER_TEXT_NUMBER, QUESTION_STATUS_FLAG, REVIEW_REASONS, QUESTION_STATUS_DTL, APPEAR_QUESTION_TIME FROM icad_student_similar_result_dtl WHERE STUDENT_ID = $userId AND PARENT_QUESTION_ID = $questionid AND IS_DELETED = 'NO' AND STATUS = 'ENABLE' ORDER BY STUDENT_RESULT_ID DESC limit 1";
        $newSql = $this->db->query($sql);
		// $newSql = $this->db->query($sql, [
        //     'questionid'     => $questionid,
		// 	'userId' => $userId
        // ]);
        $res = $newSql->getResultArray();
        return $res;
	}

    public function getExams($examId){
		$sql = "SELECT * FROM icad_exam_mst WHERE IS_DELETED = 'NO' AND STATUS = 'ENABLE' AND EXAM_ID = :examId:";
        $newSql = $this->db->query($sql, [
            'examId'     => $examId
        ]);
        $res = $newSql->getRowArray();
		return $res;
	}

    public function getExamSubjects($subjectIds){
		$sql = "SELECT SUBJECT_ID, SUBJECT_NAME FROM icad_subject_mst WHERE SUBJECT_ID IN (".$subjectIds.") AND IS_DELETED = 'NO' AND STATUS = 'ENABLE'";
        $newSql = $this->db->query($sql);
		$res = $newSql->getResultArray();
		return $res;
	}

    public function getResultByExamAndStudent($id, $studentId){
		$sql = "SELECT r.EXAM_ID, r.STUDENT_ID,r.STUDENT_RESULT_ID, r.TOTAL_EXAM_MARKS, r.TOTAL_PLUS_MARKS, r.TOTAL_MINUSE_MARKS, r.TOTAL_MARKS, r.TOTAL_EXAM_MARKS_SECTION, r.TOTAL_MINUSE_MARKS_SECTION, r.TOTAL_PLUS_MARKS_SECTION, r.TOTAL_MARKS_SECTION, r.EXAM_SUBJECT_ID, s.ROLL_NUMBER, s.FIRST_NAME, s.MIDDLE_NAME, s.LAST_NAME, r.CORRECT_QUESTION_SECTION, r.PARTIAL_CORRECT_QUESTION_SECTION, r.WRONG_QUESTION_SECTION, r.TOTAL_CORRECT_ANSWER, r.TOTAL_WRONG_ANSWER, r.ALL_QUESTION_IDS, r.BULK_QUESTION_IDS, r.QUESTION_STATUS_DTL, r.APPEAR_QUESTION_TIME FROM icad_student_result_os_dtl AS r LEFT JOIN icad_student_mst AS s ON r.STUDENT_ID = s.STUDENT_ID WHERE r.EXAM_ID = :id: AND r.STUDENT_ID = :studentId: AND r.IS_DELETED = 'NO'";
        $newSql = $this->db->query($sql, [
            'id'     => $id,
            'studentId' => $studentId
        ]);
        $res = $newSql->getRowArray();
		return $res;
	}

    public function getSubjectBySections($sections){
		$sql = "SELECT EXAM_SUBJECT_SECTION_ID, SUBJECT_ID FROM icad_exam_subject_section_mst WHERE EXAM_SUBJECT_SECTION_ID IN (".$sections.") AND IS_DELETED = 'NO' AND STATUS = 'ENABLE'";
        $newSql = $this->db->query($sql);
        $res = $newSql->getResultArray();
		return $res;
	}

    public function getSelfAnalysisResponse($examId, $studentId){
		$sql = "SELECT * FROM os_result_self_response WHERE student_id = $studentId AND exam_id = $examId AND reason_id IN (SELECT id FROM self_analysis_reason_mst WHERE for_calculation = 'YES' AND is_deleted = 0 AND status = 'ENABLE')";
        $newSql = $this->db->query($sql);
        $res = $newSql->getResultArray();
		return $res;
	}

    public function getMarkDetailsByQuestions($queIds){
		$sql = "SELECT q.QUESTION_ID, q.BULK_QUESTION_ID, q.EXAM_MARKS_DTL_ID, q.SUBJECT_ID, m.MAX_FULL_MARK, m.PARTIAL_MARKS, m.NEGATIVE_MARKS, bq.DIFFICULTY_LEVEL_ID FROM icad_question_mst as q LEFT JOIN icad_exam_marks_dtl as m ON q.EXAM_MARKS_DTL_ID = m.EXAM_MARKS_DTL_ID LEFT JOIN icad_questions_tagged_maping as mq ON q.BULK_QUESTION_ID = mq.ID LEFT JOIN icad_bulk_question_mst_stop as bq ON mq.QUESTION_ID = bq.QUESTION_ID WHERE q.QUESTION_ID IN (".$queIds.")";
        $newSql = $this->db->query($sql);
        $res = $newSql->getResultArray();
		return $res;
	}

    public function getConceptualResponse($examId, $studentId){
		$sql = "SELECT question_id, subject_id FROM os_result_self_response WHERE student_id = $studentId AND exam_id = $examId AND reason_id IN (SELECT id FROM self_analysis_reason_mst WHERE reason_for = 'W' AND wrong_mistake_type = 'C' AND is_deleted = 0 AND status = 'ENABLE')"; 
        $newSql = $this->db->query($sql);
        $res = $newSql->getResultArray();
		return $res;
	}

    public function getTimeLost($examId,$studentId){
        $sql = "SELECT  subject_id FROM os_result_self_response WHERE student_id = $studentId AND exam_id = $examId AND reason_id IN (SELECT id FROM self_analysis_reason_mst WHERE reason_for = 'W' AND wrong_mistake_type = 'C' AND is_deleted = 0 AND status = 'ENABLE')"; 
        $newSql = $this->db->query($sql);
        $res = $newSql->getResultArray();
		return $res;
    }
}
