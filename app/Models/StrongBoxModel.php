<?php

namespace App\Models;

use CodeIgniter\Model;

class StrongBoxModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'icad_sb_exam_mst';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDelete        = false;
	protected $protectFields        = true;
	protected $allowedFields        = ['OldExamID', 'SB_EXAM_ID', 'STD_ID', 'SB_EXAM_NAME', 'SUBJECTS', 'MARKS_PER_QUESTIONS', 'TOTAL_MARKS', 'EXAM_DURATION', 'PASS_PERCENTAGE', 'INSTRUCTIONS', 'ACTIVATE_EXAM', 'EXAM_ACTIVATION_DATETIME', 'IS_SECTION_AVAILABLE', 'SECTION_COUNT', 'STATUS', 'REVIEW_RESULT_STATUS', 'IS_EXAM_SCHEDULE', 'SCHEDULE_DATE', 'REMARKS', 'IS_DELETED', 'CREATED_ON', 'LAST_MODIFIED'];

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
	
	public function subjectexamList($userId, $subids){
		
		$sqllist = "SELECT * FROM icad_sb_exam_mst WHERE IS_DELETED = 'NO' AND STATUS = 'ENABLE' AND SB_EXAM_ID IN (SELECT SB_EXAM_ID FROM icad_student_sb_topic_allocation WHERE STUDENT_ID = :userId: AND COURSE_ID = :subids: AND IS_DELETED = 'NO' AND STATUS = 'ENABLE')";
		$newSql1 = $this->db->query($sqllist, [
            'userId'     => $userId,
			'subids'	 => $subids
        ]);
        $data1 = $newSql1->getResultArray();
        return $data1;		
	}

	public function sbListTopics($userId, $subids){
		
		$sqllist1 = "SELECT SB_TOPIC_ID, STATUS FROM icad_student_sb_topic_allocation WHERE STUDENT_ID  = :userId: AND COURSE_ID = :subids: AND IS_DELETED = 'NO' AND STATUS = 'ENABLE'";
		$newSql1 = $this->db->query($sqllist1, [
            'userId'     => $userId,
			'subids'	 => $subids
        ]);
        $alres = $newSql1->getResultArray();
		$alTopicArr = array();
		$alTopicStatus = array();
		foreach($alres as $row){
			$alTopicArr[] = $row['SB_TOPIC_ID'];
			$alTopicStatus[$row['SB_TOPIC_ID']] = $row['STATUS'];
		}
		$alTopicstr = implode(",",$alTopicArr);
		if(count($alTopicArr) > 0){
			$sqllist = "SELECT `SB_TOPIC_ID`,count(*) as tqcnt FROM `icad_sb_question_mst` WHERE IS_DELETED = 'NO' AND STATUS = 'ENABLE' GROUP BY `SB_TOPIC_ID` ORDER BY `SB_TOPIC_ID`";
			$newSql2 = $this->db->query($sqllist);
			$tqcntres = $newSql2->getResultArray();
			$tqcntarray = array();
			foreach($tqcntres as $tqcntrow){
				$tqcntarray[$tqcntrow['SB_TOPIC_ID']] = $tqcntrow['tqcnt'];
			}

			$sqltqcntcc="SELECT `SB_TOPIC_ID`,count(*) as tqcntcc FROM `icad_sb_question_mst` WHERE `LECTURE_ID` IS NULL OR `LECTURE_ID` = 0 AND IS_DELETED = 'NO' AND STATUS = 'ENABLE' GROUP BY `SB_TOPIC_ID` ORDER BY `SB_TOPIC_ID`";
			$newSql3 = $this->db->query($sqltqcntcc);
			$tqcntccres = $newSql3->getResultArray();
			$tqcntccarray=array();
			foreach($tqcntccres as $tqcntccrow){
				$tqcntccarray[$tqcntccrow['SB_TOPIC_ID']]=$tqcntccrow['tqcntcc'];
			}

			$sqllec = "SELECT DISTINCT SB_TOPIC_ID, LECTURE_ID FROM icad_sb_question_mst where SB_TOPIC_ID > 0 AND IS_DELETED = 'NO' AND STATUS = 'ENABLE' ORDER BY SB_TOPIC_ID, LECTURE_ID";
			$newSql4 = $this->db->query($sqllec);
			$reslec = $newSql4->getResultArray();
			$lvlarray = array();
			$lvltarray = array();
			$unictid = 0;
			foreach($reslec as $rowlec){
				if($unictid == $rowlec['SB_TOPIC_ID']){
					array_push($lvlarray,$rowlec['LECTURE_ID']);
				}else{
					$lvltarray[$unictid] = implode(', ',$lvlarray);
					$lvlarray = array();
					$unictid = $rowlec['SB_TOPIC_ID'];
					array_push($lvlarray,$rowlec['LECTURE_ID']);
				}
			}

			$sqlres = "SELECT TOTAL_UNATTEMPTED_QUE, TOTAL_WRONG_ANSWER, TOTAL_CORRECT_ANSWER, SB_TOPIC_ID FROM icad_student_result_sb_dtl WHERE STUDENT_ID = :userId: AND SB_TOPIC_ID > 0 AND IS_DELETED = 'NO' AND STATUS = 'ENABLE' GROUP BY SB_TOPIC_ID ORDER BY STUDENT_RESULT_ID DESC";
			$newSql5 = $this->db->query($sqlres, [
				'userId'     => $userId
			]);
			$result = $newSql5->getResultArray();
			$topArr = array();
			$unque = array();
			$wnque = array();
			$cnque = array();
			$rs = array();
			foreach($result as $rowres){
				if(!empty($topArr) && in_array($rowres['SB_TOPIC_ID'],$topArr)){
					$unque[$rowres['SB_TOPIC_ID']] = intval($unque[$rowres['SB_TOPIC_ID']]) + intval($rowres['TOTAL_UNATTEMPTED_QUE']);
					$wnque[$rowres['SB_TOPIC_ID']] = intval($wnque[$rowres['SB_TOPIC_ID']]) + intval($rowres['TOTAL_WRONG_ANSWER']);
					$cnque[$rowres['SB_TOPIC_ID']] = intval($cnque[$rowres['SB_TOPIC_ID']]) + intval($rowres['TOTAL_CORRECT_ANSWER']);
		
				}else{
					$topArr[] = $rowres['SB_TOPIC_ID'];
					$unque[$rowres['SB_TOPIC_ID']] = intval($rowres['TOTAL_UNATTEMPTED_QUE']);
					$wnque[$rowres['SB_TOPIC_ID']] = intval($rowres['TOTAL_WRONG_ANSWER']);
					$cnque[$rowres['SB_TOPIC_ID']] = intval($rowres['TOTAL_CORRECT_ANSWER']);
				}
		
			}

			$sqlList2 = "SELECT * FROM icad_sb_topic_mst WHERE IS_DELETED = 'NO' AND STATUS = 'ENABLE' AND SB_TOPIC_ID in (".$alTopicstr.") ORDER BY SEQUENCE";
			$newSql6 = $this->db->query($sqlList2);
			$res = $newSql6->getResultArray();
			$r=array();
			$x=0;
			foreach($res as $row1){
				if(!isset($tqcntccarray[$row1['SB_TOPIC_ID']])){
					$tqcntccarray[$row1['SB_TOPIC_ID']]='0';
				}
				if(!isset($tqcntarray[$row1['SB_TOPIC_ID']])){
					$tqcntarray[$row1['SB_TOPIC_ID']]='0';
				}
				if(!isset($tqcntsarray[$row1['SB_TOPIC_ID']])){
					$tqcntsarray[$row1['SB_TOPIC_ID']]='0';
				}
		
				if(!isset($lvltarray[$row1['SB_TOPIC_ID']])){
					$lvltarray[$row1['SB_TOPIC_ID']]='';
				}
				/**** Added for question count ***/
				if(!in_array($row1['SB_TOPIC_ID'],$topArr)){
					$unque[$row1['SB_TOPIC_ID']] = $row1['TOTAL_QUESTION'];
					$wnque[$row1['SB_TOPIC_ID']] = 0;
					$cnque[$row1['SB_TOPIC_ID']] = 0;
					$totsubq[$row1['SB_TOPIC_ID']] = $row1['TOTAL_QUESTION_SUBJECTIVE'];
				}else{
					$unque[$row1['SB_TOPIC_ID']] = intval($row1['TOTAL_QUESTION']) - intval($wnque[$row1['SB_TOPIC_ID']]) - intval($cnque[$row1['SB_TOPIC_ID']]);
					$totsubq[$row1['SB_TOPIC_ID']] = $row1['TOTAL_QUESTION_SUBJECTIVE'];
				}
				
				/*** End ***/
				$row1 = array('tqnosc' => $tqcntccarray[$row1['SB_TOPIC_ID']]) + $row1;
				$row1 = array('tqnos' => $tqcntarray[$row1['SB_TOPIC_ID']]) + $row1;
				$row1 = array('tqnoss' => $tqcntsarray[$row1['SB_TOPIC_ID']]) + $row1;
				$row1 = array('lecture' => $lvltarray[$row1['SB_TOPIC_ID']]) + $row1;
				$row1 = array('allocation_status' => $alTopicStatus[$row1['SB_TOPIC_ID']]) + $row1;
				/*$row1 = array('stepo' => $stpotarray[$row1['TOPIC_ID']]) + $row1;
				$row1 = array('steps' => $stpstarray[$row1['TOPIC_ID']]) + $row1;*/
				/**** Added for question count ***/
				$row1 = array('unattemptQues' => $unque[$row1['SB_TOPIC_ID']]) + $row1;
				$row1 = array('wrongQues' => $wnque[$row1['SB_TOPIC_ID']]) + $row1;
				$row1 = array('correctQues' => $cnque[$row1['SB_TOPIC_ID']]) + $row1;
				$row1 = array('totsubq' => $totsubq[$row1['SB_TOPIC_ID']]) + $row1;
				/*** End ***/
				$r[]=$row1;
			}
		}else{
			$r['error'] = 'Topic Not allocated to this user';
		}
		return $r;
	}
	
	public function sbCountSub($userId, $courseId){
		$sql="SELECT * FROM `icad_sb_subjective_question_mst` WHERE `IS_DELETED` = 'NO' AND `STATUS` = 'ENABLE' AND `SB_TOPIC_ID` in (SELECT `SB_TOPIC_ID` FROM `icad_sb_topic_mst` WHERE `IS_DELETED` = 'NO' AND `STATUS` = 'ENABLE' AND SB_TOPIC_ID in (SELECT `SB_TOPIC_ID` FROM `icad_student_sb_topic_allocation` WHERE `STUDENT_ID`= :userId: AND `COURSE_ID` = :courseId: AND `IS_DELETED` = 'NO'))";
		$newSql1 = $this->db->query($sql, [
            'userId'     => $userId,
            'courseId'   => $courseId
        ]);
        $data = $newSql1->getResultArray();
		// print_r($data1);die;
		/*$r=array();
		$userId = 0;
		foreach($data1 as $row){
			$r[]=$row;
		}
		return $r;*/
		return $data;
	}


	public function obCountSub($userId, $courseId){
		$sql="SELECT `SUBJECT_ID`,`SB_TOPIC_ID`, `LECTURE_ID` as level, count(`SB_TOPIC_ID`) as qno FROM `icad_sb_question_mst` WHERE `IS_DELETED` = 'NO' AND `STATUS` = 'ENABLE' AND `SB_TOPIC_ID` in (SELECT `SB_TOPIC_ID` FROM `icad_sb_topic_mst` WHERE `IS_DELETED` = 'NO' AND `STATUS`='ENABLE' AND SB_TOPIC_ID in (SELECT `SB_TOPIC_ID` FROM `icad_student_sb_topic_allocation` WHERE `STUDENT_ID` = :userId: AND `COURSE_ID` = :courseId: AND  `IS_DELETED` = 'NO')) group by `SUBJECT_ID`,`SB_TOPIC_ID` ORDER BY `SUBJECT_ID`,`SB_TOPIC_ID`";
		$newSql = $this->db->query($sql, [
            'userId'     => $userId,
            'courseId'  => $courseId
        ]);
        $data = $newSql->getResultArray();
		// print_r($data1);die;
		/*$r=array();
		$userId = 0;
		foreach($data1 as $row){
			$r[]=$row;
		}
		return $r;*/
		return $data;
	}

	public function sbTopicRes($userId){
		$sqltest = "SELECT r.STUDENT_RESULT_ID, r.ALL_QUESTION_IDS, r.ALL_QUESTION_TYPE_IDS, r.QUESTION_STATUS_DTL, r.QUESTION_CORRECT_DTL, r.GIVEN_ANSWER_MULTIPLE_OPTIONS, r.GIVEN_ANSWER_TEXT_NUMBER, r.APPEAR_ANSWER_OPTIONS, r.TOTAL_QUESTIONS, r.ATTEMPTED_QUESTIONS, r.TOTAL_CORRECT_ANSWER, r.TOTAL_WRONG_ANSWER, r.TOTAL_UNATTEMPTED_QUE, r.SB_TOPIC_ID FROM icad_student_result_sb_dtl r inner join (SELECT max(STUDENT_RESULT_ID) as id FROM icad_student_result_sb_dtl WHERE IS_DELETED = 'NO' AND STATUS = 'ENABLE' GROUP BY SB_TOPIC_ID) m on r.STUDENT_RESULT_ID = m.id WHERE r.STUDENT_ID = :userId: AND r.SB_TOPIC_ID > 0 AND r.IS_DELETED = 'NO' AND r.STATUS = 'ENABLE' order by r.STUDENT_RESULT_ID desc";
		$newSql1 = $this->db->query($sqltest, [
            'userId'     => $userId
        ]);
        $data1 = $newSql1->getResultArray();
		
		$r = array();
		foreach($data1 as $row){
			$resultIdArr[] = $row['STUDENT_RESULT_ID'];
			$quesids = str_replace(array('[', ']'), '', trim($row['ALL_QUESTION_IDS']));
			$questArr1 = explode(",",$quesids);	
			$quesType = str_replace(array('[', ']'), '', trim($row['ALL_QUESTION_TYPE_IDS']));
			$quesTypeArr = explode(",",$quesType);	
			$apearans = str_replace(array('[', ']'), '', trim($row['APPEAR_ANSWER_OPTIONS']));
			$apearansArr = explode(", ",$apearans);
			$queStat = str_replace(array('[', ']'), '', trim($row['QUESTION_STATUS_DTL']));
			$queStatArr = explode(",",$queStat);
			//$queCorrect = str_replace(array('[', ']'), '', trim($row['QUESTION_CORRECT_DTL']));
			$queCorrectArr = explode(",",$row['QUESTION_CORRECT_DTL']);
			$queMulti = str_replace(array('[', ']'), '', trim($row['GIVEN_ANSWER_MULTIPLE_OPTIONS']));
			$queMultiArr = explode(",",$queMulti);	
			$queText = str_replace(array('[', ']'), '', trim($row['GIVEN_ANSWER_TEXT_NUMBER']));
			$queTextArr = explode(",",$queText);
			foreach($questArr1 as $key => $value){
				//echo $key;echo "<br>";
				
				$data = array();
				$data['question_id'] = trim($value);
				$data['SB_TOPIC_ID'] = $row['SB_TOPIC_ID'];
				$data['level'] = NULL;
				$data['question_type'] = trim($quesTypeArr[$key]);
				
				$data['ques_status'] = trim($queStatArr[$key]);
				if(isset($queCorrectArr[$key])){
					$data['answer'] = $queCorrectArr[$key];
				}else{
					$data['answer'] = '';
				}
				$data['range1'] = '';
				$data['range2'] = '';

				if($quesTypeArr[$key] == 1){
					$data['given_answer'] = trim($apearansArr[$key]) + 1;
					if($apearansArr[$key] == -1){
						$data['given_answer'] = '';
					}
				}
				if($quesTypeArr[$key] == 2){
					$data['given_answer'] = $queMultiArr[$key];
					if($queMultiArr[$key] == ''){
						$data['given_answer'] = '';
					}
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
					$data['given_answer'] = $queTextArr[$key];
					if($queTextArr[$key] == ''){
						$data['given_answer'] = '';
					}
				}
				
				$r[] = $data;
				//print_r($r);die;
			}
		}
		return $r;
	}

	public function sbQuestions($userid,$testidx,$level){
		$sqltest1 = "SELECT ALL_QUESTION_IDS, APPEAR_ANSWER_OPTIONS, GIVEN_ANSWER_MULTIPLE_OPTIONS, GIVEN_ANSWER_TEXT_NUMBER, QUESTION_STATUS_FLAG, REVIEW_REASONS, QUESTION_STATUS_DTL FROM icad_student_result_sb_dtl WHERE STUDENT_ID = :userId: AND SB_TOPIC_ID = :testidx: AND IS_DELETED = 'NO' AND STATUS = 'ENABLE' ORDER BY STUDENT_RESULT_ID DESC limit 1";
		$newSql1 = $this->db->query($sqltest1, [
            'userId'     => $userid,
			'testidx'	 => $testidx
        ]);
        $res = $newSql1->getResultArray();
		$questArr = array();
		$ansArray = array();
		$multiAnsArr = array();
		$textAnsArr = array();
		$statusArr = array();
		$causeArr = array();
		foreach($res as $row){
			$ress = str_replace(array('[', ']'), '', trim($row['ALL_QUESTION_IDS']));
			$questArr = explode(", ",$ress);	
			$res1 = str_replace(array('[', ']'), '', trim($row['APPEAR_ANSWER_OPTIONS']));
			$ansArray = explode(", ",$res1);
			$multires = str_replace(array('[', ']'), '', trim($row['GIVEN_ANSWER_MULTIPLE_OPTIONS']));
			$multiAnsArr = explode(", ",$multires);

			$textres = str_replace(array('[', ']'), '', trim($row['GIVEN_ANSWER_TEXT_NUMBER']));
			$textAnsArr = explode(", ",$textres);

			//$statusres = str_replace(array('[', ']'), '', trim($row['QUESTION_STATUS_FLAG']));
			//$statusArr = explode(",",$row['QUESTION_STATUS_FLAG']);

			$statusres = str_replace(array('[', ']'), '', trim($row['QUESTION_STATUS_DTL']));
			$statusArr = explode(",",$statusres);

			$causeArr = explode(", ",$row['REVIEW_REASONS']);
		}
		$quesAns = array();
		$quemultiAnsArr = array();
		$quetextAnsArr = array();
		$questatusArr = array();
		$queCauseArr = array();
		foreach($questArr as $key => $item){
			if(isset($ansArray[$key])){
				$quesAns[$item] = $ansArray[$key];
			}
			if(isset($multiAnsArr[$key])){
				$quemultiAnsArr[$item] = $multiAnsArr[$key];
			}
			if(isset($textAnsArr[$key])){
				$quetextAnsArr[$item] = $textAnsArr[$key];
			}
			if(isset($statusArr[$key])){
				$questatusArr[$item] = $statusArr[$key];
			}
			if(isset($causeArr[$key])){
				$queCauseArr[$item] = $causeArr[$key];
			}
		}
		$sqltest="SELECT SB_QUESTION_ID, SB_EXAM_ID, SUBJECT_ID, SB_TOPIC_ID, QUESTIONS_TYPE_ID, QUESTION_DTL, NUMBER_OF_OPTIONS, ANSWER_OPTION_1, ANSWER_OPTION_2, ANSWER_OPTION_3, ANSWER_OPTION_4, ANSWER_OPTION_5, ANSWER_OPTION_6, ANSWER_OPTION_7, ANSWER_OPTION_8, CORRECT_ANSWER_OPTION, CORRECT_ANSWER_MULTIPLE, CORRECT_ANSWER_TEXT_FROM as range1, CORRECT_ANSWER_TEXT_TO as range2, SOLUTION, HINT FROM icad_sb_question_mst WHERE SB_TOPIC_ID = :testidx: AND IS_DELETED = 'NO'";
		$newSql2 = $this->db->query($sqltest, [
			'testidx'	 => $testidx
        ]);
        $resque = $newSql2->getResultArray();
		$r=array();
		$q1='<p style="text-align:center;font-weight:bold;margin:0;padding:5px;border-bottom:2px solid #ddd;">SINGLE CORRECT OPTION</p>';
		$q2='<p style="text-align:center;font-weight:bold;margin:0;padding:5px;border-bottom:2px solid #ddd;">MORE THAN ONE CORRECT OPTIONS</p>';
		$q3='<p style="text-align:center;font-weight:bold;margin:0;padding:5px;border-bottom:2px solid #ddd;">NUMERICAL TYPE  QUESTION</p>';
		foreach($resque as $rowtest){
			if($rowtest['QUESTIONS_TYPE_ID'] == 1){ 
				$rowtest['question'] = $q1.$rowtest['QUESTION_DTL']; 
				$rowtest["answer"] = $rowtest["CORRECT_ANSWER_OPTION"]; 
			}elseif($rowtest['QUESTIONS_TYPE_ID'] == 2){ 
				$rowtest['question'] = $q2.$rowtest['QUESTION_DTL'];
				$rowtest["answer"] = $rowtest["CORRECT_ANSWER_MULTIPLE"];  
			}else{ 
				$rowtest['question'] = $q3.$rowtest['QUESTION_DTL']; 
			}
			$rowtest['question_type'] = $rowtest['QUESTIONS_TYPE_ID'];
			$rowtest['question_id'] = $rowtest['SB_QUESTION_ID'];
			//$rowtest["answer"] = $rowtest["CORRECT_ANSWER_OPTION"]; 
			
			$rowtest["option1"] = str_replace("<p>","",$rowtest["ANSWER_OPTION_1"]); 
			$rowtest["option1"] = str_replace("</p>","",$rowtest["option1"]); 
			$rowtest["option2"] = str_replace("<p>","",$rowtest["ANSWER_OPTION_2"]); 
			$rowtest["option2"] = str_replace("</p>","",$rowtest["option2"]); 
			$rowtest["option3"] = str_replace("<p>","",$rowtest["ANSWER_OPTION_3"]); 
			$rowtest["option3"] = str_replace("</p>","",$rowtest["option3"]);
			$rowtest["option4"] = str_replace("<p>","",$rowtest["ANSWER_OPTION_4"]); 
			$rowtest["option4"] = str_replace("</p>","",$rowtest["option4"]); 
			$rowtest["option5"] = str_replace("<p>","",$rowtest["ANSWER_OPTION_5"]); 
			$rowtest["option5"] = str_replace("</p>","",$rowtest["option5"]); 
			$rowtest["option6"] = str_replace("<p>","",$rowtest["ANSWER_OPTION_6"]); 
			$rowtest["option6"] = str_replace("</p>","",$rowtest["option6"]); 
			$rowtest["option7"] = str_replace("<p>","",$rowtest["ANSWER_OPTION_7"]); 
			$rowtest["option7"] = str_replace("</p>","",$rowtest["option7"]);
			$rowtest["option8"] = str_replace("<p>","",$rowtest["ANSWER_OPTION_8"]); 
			$rowtest["option8"] = str_replace("</p>","",$rowtest["option8"]); 
			//print_r($quesAns);exit;
			if(in_array($rowtest['SB_QUESTION_ID'],$questArr)){
				$rowtest['given_answer'] = '';
				if(isset($questatusArr[$rowtest['SB_QUESTION_ID']])){
					//$rowtest['status'] = trim($questatusArr[$rowtest['SB_QUESTION_ID']]);
					if(trim($questatusArr[$rowtest['SB_QUESTION_ID']]) == 'C' || trim($questatusArr[$rowtest['SB_QUESTION_ID']]) == 'W'){
						$rowtest['status'] = 'A';
					}else{
						$rowtest['status'] = 'NV';
					}
				}else{
					$rowtest['status'] = 'NV';
				}
				if(isset($queCauseArr[$rowtest['SB_QUESTION_ID']])){
					$rowtest['cause'] = trim($queCauseArr[$rowtest['SB_QUESTION_ID']]);
				}else{
					$rowtest['cause'] = '';
				}
				if($rowtest['QUESTIONS_TYPE_ID'] == 1){
					if(isset($quesAns[$rowtest['SB_QUESTION_ID']]) && $quesAns[$rowtest['SB_QUESTION_ID']] != -1){
						$rowtest['given_answer'] = trim($quesAns[$rowtest['SB_QUESTION_ID']]) + 1;
					}
				}else if($rowtest['QUESTIONS_TYPE_ID'] == 2){
					if(isset($quemultiAnsArr[$rowtest['SB_QUESTION_ID']]) && $quemultiAnsArr[$rowtest['SB_QUESTION_ID']] != ''){
						$rowtest['given_answer'] = trim($quemultiAnsArr[$rowtest['SB_QUESTION_ID']]);
					}
				}else{
					if(isset($quetextAnsArr[$rowtest['SB_QUESTION_ID']]) && $quetextAnsArr[$rowtest['SB_QUESTION_ID']] != ''){
						$rowtest['given_answer'] = trim($quetextAnsArr[$rowtest['SB_QUESTION_ID']]);
					}
				}
			}else{
				$rowtest['given_answer'] = '';
				$rowtest['status'] = 'NV';
				//'Answered','Not Answered','Not Visited','Mark for Review'
			}
			$rowtest = array('color' => 'default') + $rowtest;
			$r[]=$rowtest;
		}
		return $r;
	}
	public function getSBQuestion($topicId, $examId){
		$sql="SELECT SB_QUESTION_ID, SB_EXAM_ID, SUBJECT_ID, SB_TOPIC_ID, QUESTIONS_TYPE_ID, QUESTION_DTL, NUMBER_OF_OPTIONS, ANSWER_OPTION_1, ANSWER_OPTION_2, ANSWER_OPTION_3, ANSWER_OPTION_4, ANSWER_OPTION_5, ANSWER_OPTION_6, ANSWER_OPTION_7, ANSWER_OPTION_8, CORRECT_ANSWER_OPTION, CORRECT_ANSWER_MULTIPLE, CORRECT_ANSWER_TEXT_FROM as range1, CORRECT_ANSWER_TEXT_TO as range2, SOLUTION, HINT FROM icad_sb_question_mst WHERE SB_TOPIC_ID = :topicId: AND SB_EXAM_ID = :examId: AND IS_DELETED = 'NO' AND STATUS = 'ENABLE'";

		$newSql = $this->db->query($sql, [
            'topicId'     => $topicId,
			'examId'	  => $examId
        ]);
        $res = $newSql->getResultArray();

        return $res;
	}
	public function getSBResult($topicId, $examId, $userId){
		$sql = "SELECT ALL_QUESTION_IDS, APPEAR_ANSWER_OPTIONS, GIVEN_ANSWER_MULTIPLE_OPTIONS, GIVEN_ANSWER_TEXT_NUMBER, QUESTION_STATUS_FLAG, REVIEW_REASONS, QUESTION_STATUS_DTL, APPEAR_QUESTION_TIME FROM icad_student_result_sb_dtl WHERE STUDENT_ID = :userId: AND SB_TOPIC_ID = :topicId: AND SB_EXAM_ID = :examId: AND IS_DELETED = 'NO' AND STATUS = 'ENABLE' ORDER BY STUDENT_RESULT_ID DESC limit 1";
		$newSql = $this->db->query($sql, [
            'topicId'     => $topicId,
			'examId'	  => $examId,
			'userId' => $userId
        ]);
        $res = $newSql->getResultArray();

        return $res;
	}

	public function sb_final_result_submit($retrievedObject,$testidx){
		$objx=json_decode($retrievedObject,true);
		$courseId = $this->session->get('courseId');
		$studentId = $this->session->get('icaduserid');

		/*** following code is to calculate timespent ***/
		$startdate = $objx[0]['startTime'];
		$dt = date('Y-m-d H:i:s', strtotime($startdate));
		$to_time = strtotime(date('Y-m-d H:i:s'));
		$from_time = strtotime($dt);
		
		//$timeSpent = round(abs($to_time - $from_time) / 3600); if find timespent in minut 
		$timeSpent = $to_time - $from_time;
		
		$tminHrs = gmdate("H:i:s", $timeSpent);
		$hrsArr = explode(":",$tminHrs);
		$totmin = intval($hrsArr[0]) * 60 + intval($hrsArr[1]);
		$totSec = $hrsArr[2];
		$timespentStr = $totmin." m ".$totSec." s";
		/*** End timespent code ***/

		/*** code added by Devendra ***/
		$datestr = date('YmdHis');
		$rand = rand(100,999);
	//print_r($objx);exit;
	$resultId = $datestr.$_SESSION["stduser_id"].$rand;
	$totalQuest = count($objx);
	$createdOn = date('Y-m-d H:i:s');
	$submitDate = date('d/m/Y');
	$submitTime = $createdOn;
	$totMarks = $totalQuest * 4;
	$examId = $objx[0]['SB_EXAM_ID'];
	$subjectId = $objx[0]['SUBJECT_ID'];
	$subName = $con->findinfo('icad_subject_mst', 'SUBJECT_NAME', $subjectId, 'SUBJECT_ID');
	$topicId = $objx[0]['SB_TOPIC_ID'];
	//$stepId = $objx[0]['STEP_ID'];
	//$lectureId = $objx[0]['LECTURE_ID'];
	$quesTypeArr = array();
	$questIdArr = array();
	/*** following array is for single option ****/
	$apearAnsArr = array();
	$givenAnsArr = array();
	/*** end***/
	$givenAnsMultiArr = array();
	$givenTextArr = array();

	$questStatArr = array();
	$queStatDetail = array();
	$correctAnsDetail = array();
	$quesGivenDetail = array();
	$causeDetail = array();
	$correctAns = 0;
	$wrongAns = 0;
	$attempted = 0;
	
	foreach($objx as $key => $value){
		$questIdArr[] = $value['SB_QUESTION_ID'];
		$quesTypeArr[] = $value['QUESTIONS_TYPE_ID'];
		/*if(isset($value['cause'])){
			$causeDetail[] = $value['cause'];
		}else{
			$causeDetail[] = '';
		}*/
		if($value['QUESTIONS_TYPE_ID'] == 1){
			$givenAnsMultiArr[] = '';
			$givenTextArr[] = '';
			$correctAnsDetail[] = $value['answer'];
			if($value['given_answer'] == ''){
				$apearAnsArr[] = '-1';
				$quesGivenDetail[] = '-1';
				$givenAnsArr[] = '-1';
				$queStatDetail[] = 'U';
			}else if($value['given_answer'] == $value['answer']){
				$apearAnsArr[] = $value['given_answer'] - 1;
				$quesGivenDetail[] = $value['given_answer'] - 1;
				$givenAnsArr[] = $value['given_answer'] - 1;
				$attempted++;
				$correctAns++;
				$queStatDetail[] = 'C';
			}else{
				$apearAnsArr[] = $value['given_answer'] - 1;
				$quesGivenDetail[] = $value['given_answer'] - 1;
				$givenAnsArr[] = '-1';
				$attempted++;
				$wrongAns++;
				$queStatDetail[] = 'W';
			}
		}
		if($value['QUESTIONS_TYPE_ID'] == 2){
			$apearAnsArr[] = '-1';
			$givenAnsArr[] = '-1';
			$givenTextArr[] = '';
			$correctAnsDetail[] = $value['answer'];
			if($value['given_answer'] == ''){
				$givenAnsMultiArr[] = '';
				$quesGivenDetail[] = '-1';
				$queStatDetail[] = 'U';
			}else if($value['given_answer'] == $value['answer']){ //need to review
				/*$givenAnsMultiArr[] = str_replace(",",":",$value['given_answer']);
				$quesGivenDetail[] = str_replace(",",":",$value['given_answer']);*/
				$givenAnsMultiArr[] = $value['given_answer'];
				$quesGivenDetail[] = $value['given_answer'];
				$attempted++;
				$correctAns++;
				$queStatDetail[] = 'C';
			}else{
				/*$givenAnsMultiArr[] = str_replace(",",":",$value['given_answer']);
				$quesGivenDetail[] = str_replace(",",":",$value['given_answer']);*/
				$givenAnsMultiArr[] = $value['given_answer'];
				$quesGivenDetail[] = $value['given_answer'];
				$attempted++;
				$wrongAns++;
				$queStatDetail[] = 'W';
			}
		}
		if($value['QUESTIONS_TYPE_ID'] == 3){
			$apearAnsArr[] = '-1';
			$givenAnsArr[] = '-1';
			$givenAnsMultiArr[] = '';
			$correctAnsDetail[] = $value['range1']."-".$value['range2'];
			if($value['given_answer'] == ''){
				$givenTextArr[] = '';
				$quesGivenDetail[] = '-1';
				$queStatDetail[] = 'U';
			}else if($value['given_answer'] >= $value['range1'] && $value['given_answer'] <= $value['range2']){
				$givenTextArr[] = $value['given_answer'];
				$quesGivenDetail[] = $value['given_answer'];
				$attempted++;
				$correctAns++;
				$queStatDetail[] = 'C';
			}else{
				$givenTextArr[] = $value['given_answer'];
				$quesGivenDetail[] = $value['given_answer'];
				$attempted++;
				$wrongAns++;
				$queStatDetail[] = 'W';
			}
		}
	}
	if(!empty($quesTypeArr) && !empty($questIdArr) && !empty($queStatDetail)){
		$quesTypeStr = '['.implode(", ",$quesTypeArr).']';
		$questIdStr = '['.implode(", ",$questIdArr).']';
		$apearAnsStr = '['.implode(", ",$apearAnsArr).']';
		$givenAnsStr = '['.implode(", ",$givenAnsArr).']';
		$givenAnsMultiStr = '['.implode(", ",$givenAnsMultiArr).']';
		$givenTextStr = '['.implode(", ",$givenTextArr).']';
		//$questStatStr = implode(",",$questStatArr);
		$queStatDetailStr = implode(",",$queStatDetail);
		$correctAnsDetailStr = implode(",",$correctAnsDetail);
		$quesGivenDetailStr = implode(",",$quesGivenDetail);
		//$causeStr = implode(", ", $causeDetail);

		$totalUnattempted = $totalQuest - $attempted;
		$totPlusMark = $correctAns * 4;
		$earnedMark = $totPlusMark - $wrongAns;
		$attemptTotal = $attempted.'/'.$totalQuest;
		/*$fields = array('RESULT_ID','EXAM_TYPE_ID','SB_EXAM_ID','SUBJECT_ID','STUDENT_ID','SB_TOPIC_ID','ALL_QUESTION_IDS','ALL_QUESTION_TYPE_IDS','QUESTION_STATUS_DTL','QUESTION_CORRECT_DTL','QUESTION_GIVEN_DTL','APPEAR_ANSWER_OPTIONS','GIVEN_ANSWER_OPTIONS','GIVEN_ANSWER_MULTIPLE_OPTIONS','GIVEN_ANSWER_TEXT_NUMBER','QUESTION_STATUS_FLAG','EXAM_SUBMITTED_DATE','EXAM_SUBMITTED_TIME','TOTAL_QUESTIONS','ATTEMPTED_QUESTIONS','TOTAL_CORRECT_ANSWER','TOTAL_WRONG_ANSWER','TOTAL_UNATTEMPTED_QUE','TOTAL_EXAM_MARKS','TOTAL_PLUS_MARKS','TOTAL_MINUSE_MARKS','TOTAL_MARKS','TOTAL_EXAM_MARKS_SECTION','TOTAL_PLUS_MARKS_SECTION','TOTAL_MINUSE_MARKS_SECTION','TOTAL_MARKS_SECTION','TIMESPENT','EXAM_SUBJECT_ID','EXAM_SUBJECT_NAME','EXAM_SUBJECT_ATTEMPT_TOTAL','SEL_ACTIVITY','PLATFORM','REVIEW_REASONS','CREATED_ON');
		$values = array($resultId,1,$examId,$subjectId,$studentId,$topicId,$questIdStr,$quesTypeStr,$queStatDetailStr,$correctAnsDetailStr,$quesGivenDetailStr,$apearAnsStr,$givenAnsStr,$givenAnsMultiStr,$givenTextStr,$questStatStr,$submitDate,$submitTime,$totalQuest,$attempted,$correctAns,$wrongAns,$totalUnattempted,$totMarks,$totPlusMark,$wrongAns,$earnedMark,$totMarks,$totPlusMark,$wrongAns,$earnedMark,'',$subjectId,$subName,$attemptTotal,'ACTIVITY_STRONGBOX','WEB',$causeStr,$createdOn);*/

		$insSubs = array();
		$insSubs['RESULT_ID'] = $resultId;
		$insSubs['EXAM_TYPE_ID'] = 1;
		$insSubs['SB_EXAM_ID'] = $examId;
		$insSubs['COURSE_ID'] = $courseId;
		$insSubs['SUBJECT_ID'] = $subjectId;
		$insSubs['STUDENT_ID'] = $studentId;
		$insSubs['SB_TOPIC_ID'] = $topicId;
		$insSubs['ALL_QUESTION_IDS'] = $questIdStr;
		$insSubs['ALL_QUESTION_TYPE_IDS'] = $quesTypeStr;
		$insSubs['QUESTION_STATUS_DTL'] = $queStatDetailStr;
		$insSubs['QUESTION_CORRECT_DTL'] = $correctAnsDetailStr;
		$insSubs['QUESTION_GIVEN_DTL'] = $quesGivenDetailStr;
		$insSubs['APPEAR_ANSWER_OPTIONS'] = $apearAnsStr;
		$insSubs['GIVEN_ANSWER_OPTIONS'] = $givenAnsStr;
		$insSubs['GIVEN_ANSWER_MULTIPLE_OPTIONS'] = $givenAnsMultiStr;
		$insSubs['GIVEN_ANSWER_TEXT_NUMBER'] = $givenTextStr;
		$insSubs['EXAM_SUBMITTED_DATE'] = $submitDate;
		$insSubs['EXAM_SUBMITTED_TIME'] = $submitTime;
		$insSubs['TOTAL_QUESTIONS'] = $totalQuest;
		$insSubs['ATTEMPTED_QUESTIONS'] = $attempted;
		$insSubs['TOTAL_CORRECT_ANSWER'] = $correctAns;
		$insSubs['TOTAL_WRONG_ANSWER'] = $wrongAns;
		$insSubs['TOTAL_UNATTEMPTED_QUE'] = $totalUnattempted;
		$insSubs['TOTAL_EXAM_MARKS'] = $totMarks;
		$insSubs['TOTAL_PLUS_MARKS'] = $totPlusMark;
		$insSubs['TOTAL_MINUSE_MARKS'] = $wrongAns;
		$insSubs['TOTAL_MARKS'] = $earnedMark;
		$insSubs['TOTAL_EXAM_MARKS_SECTION'] = $totMarks;
		$insSubs['TOTAL_PLUS_MARKS_SECTION'] = $totPlusMark;
		$insSubs['TOTAL_MINUSE_MARKS_SECTION'] = $wrongAns;
		$insSubs['TOTAL_MARKS_SECTION'] = $earnedMark;
		$insSubs['CORRECT_QUESTION_SECTION'] = $correctAns;
		$insSubs['PARTIAL_CORRECT_QUESTION_SECTION'] = 0;
		$insSubs['WRONG_QUESTION_SECTION'] = $wrongAns;
		$insSubs['CORRECT_PLUS_MARK_SECTION'] = $totPlusMark;
		$insSubs['CORRECT_PARTIAL_MARK_SECTION'] = 0;
		$insSubs['TIMESPENT'] = $timeSpent;
		$insSubs['EXAM_SUBJECT_ID'] = $subjectId;
		$insSubs['EXAM_SUBJECT_NAME'] = $subName;
		$insSubs['EXAM_SUBJECT_ATTEMPT_TOTAL'] = $attemptTotal;
		$insSubs['SEL_ACTIVITY'] = 'ACTIVITY_STRONGBOX';
		$insSubs['PLATFORM'] = 'WEB';
		$insSubs['CREATED_ON'] = $createdOn;
		
		$result = $this->db->table('icad_student_result_sb_dtl')->insert($insSubs);

		/*** following code is for update status for sync app data ***/
		$regUpdate['STRONGBOX_COURSE_SUBJECT_STATUS'] = 'YES';
		$regUpdate['STRONGBOX_TOPIC_STATUS'] = 'YES';
		$result = $this->db->table('icad_student_mst')->where('STUDENT_ID', $studentId)->update($regUpdate);
	}
	if($result){
		$data = 1;
	}else{
		$data = 0;
	}
	echo $data;
	}

	public function details($queId){
		$sql = "SELECT ssqm.SB_EXAM_ID,ssqm.SUBJECT_ID,ssqm.SB_TOPIC_ID,ssqm.FILE_TITLE,ssqm.FILE_PATH,sem.SB_EXAM_NAME,stm.SB_TOPIC_NAME FROM icad_sb_subjective_question_mst as ssqm LEFT JOIN icad_sb_exam_mst as sem ON ssqm.SB_EXAM_ID = sem.SB_EXAM_ID LEFT JOIN icad_sb_topic_mst as stm ON stm.SB_TOPIC_ID = ssqm.SB_TOPIC_ID WHERE ssqm.SB_SUBJECTIVE_QUESTION_ID = :queId: AND ssqm.IS_DELETED = 'NO' AND ssqm.STATUS = 'ENABLE'";
		$newSql = $this->db->query($sql, [
            'queId'     => $queId
        ]);
        $res = $newSql->getRowArray();
        return $res;
	}
}