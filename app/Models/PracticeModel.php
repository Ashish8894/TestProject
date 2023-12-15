<?php

namespace App\Models;

use CodeIgniter\Model;

class PracticeModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'icad_student_mst';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDelete        = false;
	protected $protectFields        = true;
	protected $allowedFields        = ['SUBJECT_ID', 'SUBJECT_NAME', 'SEQUENCE', 'STATUS', 'REMARKS', 'IS_DELETED', 'CREATED_ON', 'LAST_MODIFIED'];

	// Dates
	protected $useTimestamps        = false;
	protected $dateFormat           = 'datetime'; 
	protected $createdField         = 'CREATED_ON';
	protected $updatedField         = 'LAST_MODIFIED';
	protected $deletedField         = 'IS_DELETED';

	// Validation
	protected $validationRules      = [];
	protected $validationMessages   = [];
	protected $skipValidation       = false;
	protected $cleanValidationRules = true;

	// Callbacks
	protected $allowCallbacks       = true;
	protected $beforeInsert         = [];
	protected $afterInsert          = [];
	protected $beforeUpdate         = [];
	protected $afterUpdate          = [];
	protected $beforeFind           = [];
	protected $afterFind            = [];
	protected $beforeDelete         = [];
	protected $afterDelete          = [];
	//----------------------------------------------------------------------------------
	
	public function subjectList($courseId){
		
		$sql = "SELECT s.* FROM icad_course_subject_allocation as cs LEFT JOIN icad_subject_mst as s ON cs.SUBJECT_ID = s.SUBJECT_ID WHERE cs.COURSE_ID = :courseId: AND cs.IS_DELETED = 'NO' AND cs.STATUS = 'ENABLE' ORDER BY s.SEQUENCE";
		$newSql = $this->db->query($sql, [
            'courseId'     => $courseId
        ]);
        $data = $newSql->getResultArray();
        return $data;		
	}

	public function fullsubjectList(){
		$sql = "SELECT * FROM `icad_subject_mst` WHERE IS_DELETED = 'NO' AND STATUS = 'ENABLE' ORDER BY `SEQUENCE`";
        $newSql = $this->db->query($sql);
        $data = $newSql->getResultArray();
		return $data;
	}

	public function questionList(){
		$sql = "SELECT * FROM icad_question_report_reason WHERE IS_DELETED = 'NO' AND STATUS = 'ENABLE'";
		$newSql = $this->db->query($sql);
        $data = $newSql->getResultArray();
		return $data;
	}

	public function lectureList(){
		$sql = "SELECT LECTURE_ID, DESCRIPTION FROM icad_lecture_mst WHERE IS_DELETED = 'NO' AND STATUS = 'ENABLE' ORDER BY LECTURE_ID ASC";
		$newSql = $this->db->query($sql);
        $data = $newSql->getResultArray();
		return $data;
	}

	public function stepList(){
		$sql = "SELECT * FROM icad_step_mst WHERE IS_DELETED = 'NO' AND STATUS = 'ENABLE'";
		$newSql = $this->db->query($sql);
        $data = $newSql->getResultArray();
		return $data;
	}

	

	public function topicsByStudentCourse($userId, $courseId){
		
		$sqllist = "SELECT TOPIC_ID, STATUS FROM icad_student_topic_allocation WHERE STUDENT_ID  = :userId: AND COURSE_ID = :courseId: AND IS_DELETED = 'NO' AND STATUS = 'ENABLE'";
		$newSql1 = $this->db->query($sqllist, [
            'userId'     => $userId,
			'courseId'	 => $courseId
        ]);
        $data1 = $newSql1->getResultArray();
		// print_r($data1);die;
		$alTopicArr = array();
		$alTopicStatus = array();

		foreach($data1 as $key=> $val){
			$alTopicArr[] = $val['TOPIC_ID'];
			$alTopicStatus[$val['TOPIC_ID']] = $val['STATUS'];
		}
		// echo"<pre>";print_r(count($alTopicArr));print_r($alTopicStatus);die;
		if(count($alTopicArr) > 0){

			$alTopicstr = implode(",",$alTopicArr);
			$sqltqcnt = "SELECT TOPIC_ID, count(*) as tqcnt FROM icad_question_mst WHERE TOPIC_ID IN (".$alTopicstr.") AND IS_DELETED = 'NO' AND STATUS = 'ENABLE' GROUP BY TOPIC_ID ORDER BY TOPIC_ID";
			$sqltqcnt2 = $this->db->query($sqltqcnt);
			$tqcntres = $sqltqcnt2->getResultArray();
			$tqcntarray = array();
			// echo"<pre>";print_r($tqcntres);die;
			foreach($tqcntres as $key=> $tqcntval){
				$tqcntarray[$tqcntval['TOPIC_ID']] = $tqcntval['tqcnt'];
			}

			$sqltqcnts="SELECT TOPIC_ID, count(*) as tqcnt FROM icad_subjective_question_mst WHERE TOPIC_ID IN (".$alTopicstr.") AND IS_DELETED = 'NO' AND STATUS = 'ENABLE' GROUP BY TOPIC_ID ORDER BY TOPIC_ID";
			$sqltqcnts2 = $this->db->query($sqltqcnts);
			$tqcntsres = $sqltqcnts2->getResultArray();
			$tqcntsarray=array();
			foreach($tqcntsres as $key=> $tqcntsresval){
				$tqcntsarray[$tqcntsresval['TOPIC_ID']] = $tqcntsresval['tqcnt'];
			}
			
			$sqllec = "SELECT TOPIC_ID, LECTURE_ID FROM `icad_lecture_dtl` WHERE TOPIC_ID IN (".$alTopicstr.") AND LECTURE_ID > 0 AND IS_DELETED = 'NO' AND STATUS = 'ENABLE' GROUP BY TOPIC_ID,LECTURE_ID ORDER BY TOPIC_ID, LECTURE_ID";
			$reslec2 = $this->db->query($sqllec);
			$reslec = $reslec2->getResultArray();
			$lvlarray = array();
			$lvltarray = array();
			$unictid = 0;
			foreach($reslec as $key=> $rowlec){
				$lvlarray[$rowlec['TOPIC_ID']][] =$rowlec['LECTURE_ID'];
			}
			foreach($lvlarray as $key => $val){
				$lvltarray[$key] = implode(", ",$val);
			}
			//print_r($lvltarray);die;
			$sqlres = "SELECT t.*, ti.TOPIC_INDEX_DTL_FILEPATH as file FROM icad_topic_mst as t LEFT JOIN icad_topic_index_dtl as ti ON t.TOPIC_ID = ti.TOPIC_ID WHERE t.COURSE_ID = $courseId AND t.IS_DELETED = 'NO' AND t.STATUS = 'ENABLE' AND t.TOPIC_ID in (".$alTopicstr.") ORDER BY LPAD(lower(t.SEQUENCE), 2,0) ASC";
			$res2 = $this->db->query($sqlres);
			$res = $res2->getResultArray();
			
			// echo"<pre>";print_r($res);die;
			$r=array();
			$x=0;
			foreach($res as $key => $resval){
				if(!isset($tqcntarray[$resval['TOPIC_ID']])){
					$tqcntarray[$resval['TOPIC_ID']]='';
				}
				if(!isset($tqcntsarray[$resval['TOPIC_ID']])){
					$tqcntsarray[$resval['TOPIC_ID']]='';
				}
				if(!isset($lvltarray[$resval['TOPIC_ID']])){
					$lvltarray[$resval['TOPIC_ID']]='';
				}
				$resval = array('tqnos' => $tqcntarray[$resval['TOPIC_ID']]) + $resval;
				$resval = array('tqnoss' => $tqcntsarray[$resval['TOPIC_ID']]) + $resval;
				$resval = array('lecture' => $lvltarray[$resval['TOPIC_ID']]) + $resval;
				$resval = array('allocation_status' => $alTopicStatus[$resval['TOPIC_ID']]) + $resval;
				$r[]=$resval;
			}
		}else{
			$r['error'] = 'Topic Not allocated to this user';
		}
		//echo"<pre>";print_r($r);die;
        return $r;		
	}

	public function countSubjective($userId, $courseId){
		
		$sqllist = "SELECT SUBJECT_ID, TOPIC_ID, LECTURE_ID as level, STEP_ID, count(STEP_ID) as qno FROM icad_subjective_question_mst WHERE COURSE_ID = :courseId: AND IS_DELETED = 'NO' AND STATUS = 'ENABLE' GROUP BY SUBJECT_ID, TOPIC_ID, LECTURE_ID,STEP_ID ORDER BY SUBJECT_ID,TOPIC_ID,LECTURE_ID,STEP_ID";
		$newSql1 = $this->db->query($sqllist, [
			'courseId'	 => $courseId
        ]);
        $data1 = $newSql1->getResultArray();
		return $data1;
	}

	public function countObjective($userId, $courseId){
		
		$sql = "SELECT QUESTION_ID,SUBJECT_ID,TOPIC_ID,LECTURE_ID as level, STEP_ID,count(STEP_ID) as qno FROM icad_question_mst WHERE TOPIC_ID IN (SELECT TOPIC_ID FROM icad_topic_mst WHERE TOPIC_ID IN (SELECT TOPIC_ID FROM icad_student_topic_allocation WHERE COURSE_ID = :courseId: AND STUDENT_ID = :userId: AND IS_DELETED = 'NO' AND STATUS = 'ENABLE') AND IS_DELETED = 'NO' AND STATUS = 'ENABLE') AND IS_DELETED = 'NO' AND STATUS = 'ENABLE' group by SUBJECT_ID,TOPIC_ID,LECTURE_ID,STEP_ID ORDER BY SUBJECT_ID,TOPIC_ID,LECTURE_ID,STEP_ID";
		$newSql = $this->db->query($sql, [
            'userId'     => $userId,
            'courseId'   => $courseId
        ]);
		
		$res = $newSql->getResultArray();
		$r = array();
		foreach($res as $finalval){
			$r[] = $finalval;

		}
		return $r;
	}

	

	public function getTopicResult($userId, $courseId){
		
		$sqllist = "SELECT r.STUDENT_RESULT_ID, r.ALL_QUESTION_IDS, r.ALL_QUESTION_TYPE_IDS, r.QUESTION_STATUS_DTL, r.QUESTION_CORRECT_DTL, r.GIVEN_ANSWER_MULTIPLE_OPTIONS, r.GIVEN_ANSWER_TEXT_NUMBER, r.APPEAR_ANSWER_OPTIONS, r.TOTAL_QUESTIONS, r.ATTEMPTED_QUESTIONS, r.TOTAL_CORRECT_ANSWER, r.TOTAL_WRONG_ANSWER, r.TOTAL_UNATTEMPTED_QUE, r.LECTURE_ID, r.TOPIC_ID, r.STEP_ID, r.SUBJECT_ID FROM icad_student_result_dtl r WHERE r.STUDENT_RESULT_ID in (SELECT max(STUDENT_RESULT_ID) as id FROM icad_student_result_dtl WHERE STUDENT_ID = :userId: AND COURSE_ID = :courseId: AND IS_DELETED = 'NO' AND STATUS = 'ENABLE' GROUP BY TOPIC_ID, LECTURE_ID, STEP_ID) AND r.IS_DELETED = 'NO' AND r.STATUS = 'ENABLE' order by r.STUDENT_RESULT_ID desc";
		$newSql1 = $this->db->query($sqllist, [
			'userId'     => $userId,
			'courseId'   => $courseId
        ]);

        $data1 = $newSql1->getResultArray();
		$r = array();

		foreach($data1 as $row){
			$resultIdArr[] = $row['STUDENT_RESULT_ID'];
			$quesids = str_replace(array('[', ']'), '', trim($row['ALL_QUESTION_IDS']));
			$questArr1 = explode(", ",$quesids);	
			$quesType = str_replace(array('[', ']'), '', trim($row['ALL_QUESTION_TYPE_IDS']));
			$quesTypeArr = explode(", ",$quesType);	
			$apearans = str_replace(array('[', ']'), '', trim($row['APPEAR_ANSWER_OPTIONS']));
			$apearansArr = explode(", ",$apearans);
			$queStat = str_replace(array('[', ']'), '', trim($row['QUESTION_STATUS_DTL']));
			$queStatArr = explode(",",$queStat);
			//$queCorrect = str_replace(array('[', ']'), '', trim($row['QUESTION_CORRECT_DTL']));
			$queCorrectArr = explode(",",$row['QUESTION_CORRECT_DTL']);
			$queMulti = str_replace(array('[', ']'), '', trim($row['GIVEN_ANSWER_MULTIPLE_OPTIONS']));
			$queMultiArr = explode(", ",$queMulti);	
			$queText = str_replace(array('[', ']'), '', trim($row['GIVEN_ANSWER_TEXT_NUMBER']));
			$queTextArr = explode(", ",$queText);
			foreach($questArr1 as $key => $value){
				//echo $key;echo "<br>";
				$data = array();
				$data['question_id'] = $value;
				$data['level'] = $row['LECTURE_ID'];
				$data['TOPIC_ID'] = $row['TOPIC_ID'];
				$data['STEP_ID'] = $row['STEP_ID'];
				$data['SUBJECT_ID'] = $row['SUBJECT_ID'];
				$data['question_type'] = $quesTypeArr[$key];
				$data['ques_status'] = $queStatArr[$key];
				if(isset($queCorrectArr[$key])){
					$data['answer'] = $queCorrectArr[$key];
				}else{
					$data['answer'] = '';
				}
				$data['range1'] = '';
				$data['range2'] = '';

				if($quesTypeArr[$key] == 1){
					$data['given_answer'] = $apearansArr[$key] + 1;
					if($apearansArr[$key] == -1){
						$data['given_answer'] = '';
					}
				}
				if($quesTypeArr[$key] == 2){

					$mulArr = explode(":",$queMultiArr[$key]);
					$mulStr = '';
					if(count($mulArr) > 0){
						foreach($mulArr as $itm){
							$nval = intval($itm) + 1;
							if($mulStr == ''){
								$mulStr .= $nval;
							}else{
								$mulStr .= ':'.$nval;
							}
						}
					}
					
					//$rowtest['given_answer'] = trim($quemultiAnsArr[$rowtest['QUESTION_ID']]);
					$data['given_answer'] = $mulStr;
				}
				if($quesTypeArr[$key] == 3){
					$rangeArr = explode("-", $queCorrectArr[$key]);

					if(count($rangeArr) == 2){
						$data['range1'] = $rangeArr[0];
						$data['range2'] = $rangeArr[1];
					}else{
						$data['range1'] = $rangeArr[0];
						$data['range2'] = $rangeArr[0];
					}
					$data['given_answer'] = trim($queTextArr[$key]);
					if($queTextArr[$key] == ''){
						$data['given_answer'] = '';
					}
				}
				$r[] = $data;
			}
		}
		return $r;
	}
	public function lectureDetails($type,$link,$tid){
		if($type == 'L'){
			$sqltest = "SELECT LECTURE_CONCEPT_DTL as concept FROM icad_lecture_dtl WHERE TOPIC_ID = :tid: AND LECTURE_ID = :link: AND IS_DELETED = 'NO'";
		}else{
			$sqltest = "SELECT SUGGESTED_PROBLEM_QUE as concept FROM icad_lecture_dtl WHERE TOPIC_ID = :tid: AND LECTURE_ID = :link: AND IS_DELETED = 'NO'";
			//$sqltest="SELECT `SUGGESTED_PROBLEM_QUE` FROM `icad_lecture_dtl` WHERE `file_type`='".$_REQUEST['ftype']."' AND `topic_id`=".$_REQUEST['testid']." AND level='".$_REQUEST['level']."'";
		}
		$newSql = $this->db->query($sqltest, [
			'tid'=> $tid,
			'link'	  => $link
		]);
        $res = $newSql->getResultArray();
		return $res;
	}
	public function getSubjectiveStepQuestions($topicId, $lectureId, $stepId){
		$sql = "SELECT sq.SUBJECTIVE_QUESTION_ID, sq.COURSE_ID, sq.SUBJECT_ID, sq.TOPIC_ID, sq.STEP_ID, sq.LECTURE_ID, sq.QUESTIONS_TYPE_ID, sq.QUESTION_DTL, sq.SOLUTION, sq.HINT, s.SUBJECT_NAME as subject FROM icad_subjective_question_mst as sq LEFT JOIN icad_subject_mst as s ON sq.SUBJECT_ID = s.SUBJECT_ID WHERE sq.TOPIC_ID = :topicId: AND sq.LECTURE_ID = :lectureId: AND sq.STEP_ID = :stepId: AND sq.IS_DELETED = 'NO' AND sq.STATUS = 'ENABLE'";
		$newSql = $this->db->query($sql, [
            'topicId'     => $topicId,
			'lectureId'	  => $lectureId,
			'stepId' => $stepId
        ]);
        $res = $newSql->getResultArray();

        return $res;
	}

	public function getObjectiveStepQuestion($topicId, $lectureId, $stepId){
		$sql = "SELECT QUESTION_ID, COURSE_ID, SUBJECT_ID, TOPIC_ID, STEP_ID, LECTURE_ID, QUESTIONS_TYPE_ID, QUESTION_DTL, NUMBER_OF_OPTIONS, ANSWER_OPTION_1, ANSWER_OPTION_2, ANSWER_OPTION_3, ANSWER_OPTION_4, ANSWER_OPTION_5, ANSWER_OPTION_6, ANSWER_OPTION_7, ANSWER_OPTION_8, CORRECT_ANSWER_OPTION, CORRECT_ANSWER_MULTIPLE, CORRECT_ANSWER_TEXT_FROM as range1, CORRECT_ANSWER_TEXT_TO as range2, SOLUTION, HINT FROM icad_question_mst WHERE TOPIC_ID = :topicId: AND LECTURE_ID = :lectureId: AND STEP_ID = :stepId: AND IS_DELETED = 'NO' AND STATUS = 'ENABLE'";
		$newSql = $this->db->query($sql, [
            'topicId'     => $topicId,
			'lectureId'	  => $lectureId,
			'stepId' => $stepId
        ]);
        $res = $newSql->getResultArray();

        return $res;
	}
	
	public function getObjectiveStepResult($topicId, $lectureId, $stepId, $userId){
		$sql = "SELECT ALL_QUESTION_IDS, APPEAR_ANSWER_OPTIONS, GIVEN_ANSWER_MULTIPLE_OPTIONS, GIVEN_ANSWER_TEXT_NUMBER, QUESTION_STATUS_FLAG, REVIEW_REASONS, QUESTION_STATUS_DTL, APPEAR_QUESTION_TIME FROM icad_student_result_dtl WHERE STUDENT_ID = :userId: AND TOPIC_ID = :topicId: AND LECTURE_ID = :lectureId: AND STEP_ID = :stepId: AND IS_DELETED = 'NO' AND STATUS = 'ENABLE' ORDER BY STUDENT_RESULT_ID DESC limit 1";
		$newSql = $this->db->query($sql, [
            'topicId'     => $topicId,
			'lectureId'	  => $lectureId,
			'stepId' => $stepId,
			'userId' => $userId
        ]);
        $res = $newSql->getResultArray();

        return $res;
	}
	public function checkReportedQueExist($queId, $queFrom, $reasonId, $userId, $reason = ''){
		if($reasonId == 3){
			$sql = "SELECT COUNT(QUESTION_REPORT_DTL_ID) as cnt FROM icad_question_report_dtl WHERE QUESTION_ID = :queId: AND QUESTION_FROM = :queFrom: AND QUESTION_REPORT_REASON_ID = :reasonId: AND QUESTION_REPORT_BY = :userId: AND IS_DELETED = 'NO' AND STATUS = 'ENABLE' AND QUESTION_REPORT_REASON_OTHER = :reason:";
			$newSql = $this->db->query($sql, [
	            'queId'     => $queId,
				'queFrom'	=> $queFrom,
				'reasonId'  => $reasonId,
				'userId'    => $userId,
				'reason'    => $reason
	        ]);
		}else{
			$sql = "SELECT COUNT(QUESTION_REPORT_DTL_ID) as cnt FROM icad_question_report_dtl WHERE QUESTION_ID = :queId: AND QUESTION_FROM = :queFrom: AND QUESTION_REPORT_REASON_ID = :reasonId: AND QUESTION_REPORT_BY = :userId: AND IS_DELETED = 'NO' AND STATUS = 'ENABLE'";
			$newSql = $this->db->query($sql, [
	            'queId'     => $queId,
				'queFrom'	=> $queFrom,
				'reasonId'  => $reasonId,
				'userId'    => $userId
	        ]);
		}
		
        $res = $newSql->getRowArray();
        $cnt = 0;
        if($res){
        	$cnt = $res['cnt'];
        }
        return $cnt;
	}
}