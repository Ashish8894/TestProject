<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\PracticeModel;
use App\Models\SubjectModel;

class Practice extends BaseController
{
	public function __construct(){
		$this->userModel = new UserModel();
		$this->practiceModel = new PracticeModel(); 
		$this->subjectModel = new SubjectModel(); 
	}
	
	public function index(){
		if(!$this->session->has('icaduserid') ){
            return redirect()->to('/');
        }
		$data['pagetitle'] = 'Practice';
		$courseId = $this->session->get('courseId');
    	$subjects = $this->subjectModel->subjectByCourse($courseId);
    	$data['first_sub_id'] = $subjects[0]['SUBJECT_ID'];
        return view('practice/practice',$data);
    }
    public function studyplan($id = ''){
		if(!$this->session->has('icaduserid') ){
            return redirect()->to('/');
        }
        if($id == ''){
        	return redirect()->to('/practice');
        }
		$data['subid'] = $id;
		$data['pagetitle'] = 'Decode';
		return view('decode/studyplan',$data);
		
	}

	public function lecture($topic_id = ''){
		if(!$this->session->has('icaduserid') ){
            return redirect()->to('/');
        }
        if($topic_id == ''){
        	return redirect()->to('/practice');
        }
		$data['topic_id'] = $topic_id;
		$data['pagetitle'] = 'Decode';
		return view('decode/lecture',$data);
	}
	public function msteps($topic_id = '', $lectureId = ''){
		if(!$this->session->has('icaduserid') ){
            return redirect()->to('/');
        }
        if($topic_id == '' || $lectureId == ''){
        	return redirect()->to('/practice');
        }
		$data['topic_id'] = $topic_id;
		$data['lectureId'] = $lectureId;
		return view('decode/msteps', $data);
	}

	public function sstestins($topicid = '', $level = '', $stepid = ''){
		if(!$this->session->has('icaduserid') ){
            return redirect()->to('/');
        }
        if($topicid == '' || $level == '' || $stepid == ''){
        	return redirect()->to('/practice');
        }
		$data['topicid'] = $topicid;
		$data['level'] = $level;
		$data['stepid'] = $stepid;
		return view('decode/sstestins', $data);
	}

	public function sotestins($topicid = '', $level = '', $stepid = ''){
		if(!$this->session->has('icaduserid') ){
            return redirect()->to('/');
        }
        if($topicid == '' || $level == '' || $stepid == ''){
        	return redirect()->to('/practice');
        }
		$data['topicid'] = $topicid;
		$data['level'] = $level;
		$data['stepid'] = $stepid;
		return view('decode/sotestins',$data);
	}

	public function step_test($topicid = '', $level = '', $stepid = ''){
		if(!$this->session->has('icaduserid') ){
            return redirect()->to('/');
        }
        if($topicid == '' || $level == '' || $stepid == ''){
        	return redirect()->to('/practice');
        }
		$data['topicid'] = $topicid;
		$data['level'] = $level;
		$data['stepid'] = $stepid;
		$data['userId'] = $this->session->get('icaduserid');
		return view('decode/step_test', $data);
	}

	public function step_result($topic_id = '', $level = '', $stepId = '', $from = 'test'){
		if(!$this->session->has('icaduserid') ){
            return redirect()->to('/');
        }
        if($topic_id == '' || $level == '' || $stepId == ''){
        	return redirect()->to('/practice');
        }
		$data['topic_id'] = $topic_id;
		$data['level'] = $level;
		$data['stepId'] = $stepId;
		$data['from'] = $from;
		$result = array();
		$userId = $this->session->get('icaduserid');
		
		$ques = $this->practiceModel->getObjectiveStepQuestion($topic_id, $level, $stepId);
		$res = $this->practiceModel->getObjectiveStepResult($topic_id, $level, $stepId, $userId);
		//print_r($res);exit;

		$questArr = array();
		$ansArray = array();
		$multiAnsArr = array();
		$textAnsArr = array();
		$statusArr = array();
		$causeArr = array();
		$rq = array();
		foreach($res as $row){
		
			$ress = str_replace(array('[', ']'), '', trim($row['ALL_QUESTION_IDS']));
			$questArr = explode(", ",$ress);	
			$res1 = str_replace(array('[', ']'), '', trim($row['APPEAR_ANSWER_OPTIONS']));
			$ansArray = explode(", ",$res1);

			$timeres1 = str_replace(array('[', ']'), '', trim($row['APPEAR_QUESTION_TIME']));
			$timeArray = explode(", ",$timeres1);

			$multires = str_replace(array('[', ']'), '', trim($row['GIVEN_ANSWER_MULTIPLE_OPTIONS']));
			$multiAnsArr = explode(", ",$multires);

			$textres = str_replace(array('[', ']'), '', trim($row['GIVEN_ANSWER_TEXT_NUMBER']));
			$textAnsArr = explode(", ",$textres);

			/*$statusres = str_replace(array('[', ']'), '', trim($row['QUESTION_STATUS_FLAG']));
			$statusArr = explode(",",$statusres);*/
			$statusres = str_replace(array('[', ']'), '', trim($row['QUESTION_STATUS_DTL']));
			$statusArr = explode(",",$statusres);

			$causeArr = explode(", ",$row['REVIEW_REASONS']);
			//$rq[] = $row;
		}

		$quesAns = array();
		$quesTime = array();
		$quemultiAnsArr = array();
		$quetextAnsArr = array();
		$questatusArr = array();
		$queCauseArr = array();
		foreach($questArr as $key => $item){
			if(isset($ansArray[$key])){
				$quesAns[$item] = $ansArray[$key];
			}
			if(isset($timeArray[$key])){
				$quesTime[$item] = $timeArray[$key];
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

		

		$q1='<p style="text-align:center;font-weight:bold;margin:0;padding:5px;border-bottom:2px solid #ddd;">SINGLE CORRECT OPTION</p>';
		$q2='<p style="text-align:center;font-weight:bold;margin:0;padding:5px;border-bottom:2px solid #ddd;">MORE THAN ONE CORRECT OPTIONS</p>';
		$q3='<p style="text-align:center;font-weight:bold;margin:0;padding:5px;border-bottom:2px solid #ddd;">NUMERICAL TYPE  QUESTION</p>';
		foreach($ques as $rowtest){
		
			if($rowtest['QUESTIONS_TYPE_ID'] == 1){ 
				$rowtest['question'] = $q1.$rowtest['QUESTION_DTL']; 
				$rowtest["answer"] = $rowtest["CORRECT_ANSWER_OPTION"]; 
			}elseif($rowtest['QUESTIONS_TYPE_ID'] == 2){ 
				$rowtest['question'] = $q2.$rowtest['QUESTION_DTL'];
				$rowtest["answer"] = $rowtest["CORRECT_ANSWER_MULTIPLE"];  
			}else{ 
				$rowtest['question'] = $q3.$rowtest['QUESTION_DTL']; 
			} 
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
			if(in_array($rowtest['QUESTION_ID'],$questArr)){
				$rowtest['given_answer'] = '';
				if(isset($questatusArr[$rowtest['QUESTION_ID']])){
					$rowtest['status'] = trim($questatusArr[$rowtest['QUESTION_ID']]);
				}else{
					$rowtest['status'] = 'NV';
				}
				if(isset($queCauseArr[$rowtest['QUESTION_ID']])){
					$rowtest['cause'] = trim($queCauseArr[$rowtest['QUESTION_ID']]);
				}else{
					$rowtest['cause'] = '';
				}

				if(isset($quesTime[$rowtest['QUESTION_ID']])){
					$rowtest['time_consume'] = $quesTime[$rowtest['QUESTION_ID']];
				}else{
					$rowtest['time_consume'] = 0;
				}

				if($rowtest['QUESTIONS_TYPE_ID'] == 1){
					if(isset($quesAns[$rowtest['QUESTION_ID']]) && $quesAns[$rowtest['QUESTION_ID']] != -1){
						$rowtest['given_answer'] = $quesAns[$rowtest['QUESTION_ID']] + 1;
					}
				}else if($rowtest['QUESTIONS_TYPE_ID'] == 2){
					/*if(isset($quemultiAnsArr[$rowtest['QUESTION_ID']]) && $quemultiAnsArr[$rowtest['QUESTION_ID']] != ''){
						$rowtest['given_answer'] = trim($quemultiAnsArr[$rowtest['QUESTION_ID']]);
					}*/
					if(isset($quemultiAnsArr[$rowtest['QUESTION_ID']]) && $quemultiAnsArr[$rowtest['QUESTION_ID']] != ''){
						$mulArr = explode(":",$quemultiAnsArr[$rowtest['QUESTION_ID']]);
						$mulStr = '';
						foreach($mulArr as $itm){
							$nval = $itm + 1;
							if($mulStr == ''){
								$mulStr .= $nval;
							}else{
								$mulStr .= ':'.$nval;
							}
						}
						//$rowtest['given_answer'] = trim($quemultiAnsArr[$rowtest['QUESTION_ID']]);
						$rowtest['given_answer'] = $mulStr;
					}
				}else{
					if(isset($quetextAnsArr[$rowtest['QUESTION_ID']]) && $quetextAnsArr[$rowtest['QUESTION_ID']] != ''){
						$rowtest['given_answer'] = trim($quetextAnsArr[$rowtest['QUESTION_ID']]);
					}
				}
			}else{
				$rowtest['given_answer'] = '';
				$rowtest['status'] = 'NV';
				$rowtest['time_consume'] = 0;
				//'Answered','Not Answered','Not Visited','Mark for Review'
			}
			$rowtest = array('color' => 'default') + $rowtest;
			$result[] = $rowtest;

		}
		$data['result'] = $result; 
		return view('decode/step_result', $data);
	}
    /*public function decode($subject){
    	
    	$data['pagetitle'] = 'Decode';
    	$courseId = $this->session->get('courseId');
    	$subjects = $this->subjectModel->subjectByCourse($courseId);
    	$data['subjects'] = $subjects;
    	$data['sel_subject'] = $subject;
		return view('decode/studyplan',$data);
    }*/
	public function list_subjects(){
		$data = array();
		if($this->session->has('icaduserid')){
			$courseId = $this->session->get('courseId');
			$data = $this->practiceModel->subjectList($courseId);
		}
		echo json_encode($data);
        exit;
	}

	public function list_full_subjects(){
		$data = $this->practiceModel->fullsubjectList();
		echo json_encode($data);
        exit;
	}

	public function questionReport(){
		$data = $this->practiceModel->questionList();
		echo json_encode($data);
        exit;
	}

	public function getLecture(){
		$data = $this->practiceModel->lectureList();
		echo json_encode($data);
        exit;
	}

	public function getSteps(){
		$data = $this->practiceModel->stepList();
		echo json_encode($data);
        exit;
	}

	

	public function list_topic(){
		$data = array();
		if($this->session->has('icaduserid')){
			$data = $this->practiceModel->topicsByStudentCourse($this->session->get('icaduserid'),$this->session->get('courseId'));
		}
		echo json_encode($data);
        exit;
	}

	public function count_subjective(){
		$data = array();
		if($this->session->has('icaduserid')){
			$data = $this->practiceModel->countSubjective($this->session->get('icaduserid'), $this->session->get('courseId'));
		}
		echo json_encode($data);
        exit;
	}

	public function count_objective(){
		$data = array();
		if($this->session->has('icaduserid')){
			$data = $this->practiceModel->countObjective($this->session->get('icaduserid'), $this->session->get('courseId'));
		}
		echo json_encode($data);
		exit;
	}

	public function gettopicresult(){
		$data = array();
		if($this->session->has('icaduserid')){
			$data = $this->practiceModel->getTopicResult($this->session->get('icaduserid'),$this->session->get('courseId'));
		}
		echo json_encode($data);
		exit;
	}
	public function lectursedetails($type,$levellink,$tid){
        if($type == 'L'){
            $type = $type;
        }else{
            $type = $type;
        }
        $link = $levellink;
        $tid = $tid;
        $res = $this->practiceModel->lectureDetails($type,$link,$tid);
		if(count($res) == 0){
			echo "<p class='text-center mb-3'>Data not available</p>";
		}else{
			foreach($res as $row){
				if($row['concept'] == '' || $row['concept'] == null){
					echo "<p class='text-center mb-3'>Data not available</p>";
				}else{
					echo $row['concept'];
				}
			}
		}
	}
	public function subjective_steps_questions(){
		
		$data = array();
		if($this->session->has('icaduserid')){
			if ($this->request->getMethod() === 'post'){
				$topicid = $this->request->getPost('tid');
				$level = $this->request->getPost('level');
				$step = $this->request->getPost('step');
				$res = $this->practiceModel->getSubjectiveStepQuestions($topicid, $level, $step);
				$q1='<p style="text-align:center;font-weight:bold;margin:0;padding:5px;border-bottom:2px solid #ddd;">SUBJECTIVE TYPE QUESTIONS</p>';
				foreach($res as $rowtest){
					$rowtest['question_type'] = 4;
					$rowtest['given_answer'] ='';
					$rowtest['question'] = $q1.$rowtest['QUESTION_DTL'];
					$rowtest = array('color' => 'default') + $rowtest;
					$rowtest = array('timetaken' => 0) + $rowtest;
					$rowtest = array('status' => 'Not Visited') + $rowtest;
					$data[] = $rowtest;
				}
			}
		}
		echo json_encode($data);
        exit;
		
	}
	
	public function objective_steps_solved_questions(){
		
		$data = array();
		if($this->session->has('icaduserid')){
			if ($this->request->getMethod() === 'post'){
				$userId = $this->session->get('icaduserid');
				$topicid = $this->request->getPost('tid');
				$level = $this->request->getPost('level');
				$step = $this->request->getPost('step');
				$ques = $this->practiceModel->getObjectiveStepQuestion($topicid, $level, $step);
				$res = $this->practiceModel->getObjectiveStepResult($topicid, $level, $step, $userId);
				//print_r($res);exit;

				$questArr = array();
				$ansArray = array();
				$multiAnsArr = array();
				$textAnsArr = array();
				$statusArr = array();
				$causeArr = array();
				$rq = array();
				foreach($res as $row){
				
					$ress = str_replace(array('[', ']'), '', trim($row['ALL_QUESTION_IDS']));
					$questArr = explode(", ",$ress);	
					$res1 = str_replace(array('[', ']'), '', trim($row['APPEAR_ANSWER_OPTIONS']));
					$ansArray = explode(", ",$res1);

					$timeres1 = str_replace(array('[', ']'), '', trim($row['APPEAR_QUESTION_TIME']));
					$timeArray = explode(", ",$timeres1);

					$multires = str_replace(array('[', ']'), '', trim($row['GIVEN_ANSWER_MULTIPLE_OPTIONS']));
					$multiAnsArr = explode(", ",$multires);

					$textres = str_replace(array('[', ']'), '', trim($row['GIVEN_ANSWER_TEXT_NUMBER']));
					$textAnsArr = explode(", ",$textres);
					$statusres = str_replace(array('[', ']'), '', trim($row['QUESTION_STATUS_DTL']));
					$statusArr = explode(",",$statusres);

					$causeArr = explode(", ",$row['REVIEW_REASONS']);
					//$rq[] = $row;
				}

				$quesAns = array();
				$quesTime = array();
				$quemultiAnsArr = array();
				$quetextAnsArr = array();
				$questatusArr = array();
				$queCauseArr = array();
				foreach($questArr as $key => $item){
					if(isset($ansArray[$key])){
						$quesAns[$item] = $ansArray[$key];
					}
					if(isset($timeArray[$key])){
						$quesTime[$item] = $timeArray[$key];
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
				$q1='<p style="text-align:center;font-weight:bold;margin:0;padding:5px;border-bottom:2px solid #ddd;">SINGLE CORRECT OPTION</p>';
				$q2='<p style="text-align:center;font-weight:bold;margin:0;padding:5px;border-bottom:2px solid #ddd;">MORE THAN ONE CORRECT OPTIONS</p>';
				$q3='<p style="text-align:center;font-weight:bold;margin:0;padding:5px;border-bottom:2px solid #ddd;">NUMERICAL TYPE  QUESTION</p>';
				foreach($ques as $rowtest){
				
					if($rowtest['QUESTIONS_TYPE_ID'] == 1){ 
						$rowtest['question'] = $q1.$rowtest['QUESTION_DTL']; 
						$rowtest["answer"] = $rowtest["CORRECT_ANSWER_OPTION"]; 
					}elseif($rowtest['QUESTIONS_TYPE_ID'] == 2){ 
						$rowtest['question'] = $q2.$rowtest['QUESTION_DTL'];
						$rowtest["answer"] = $rowtest["CORRECT_ANSWER_MULTIPLE"];  
					}else{ 
						$rowtest['question'] = $q3.$rowtest['QUESTION_DTL']; 
					}
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
					if(in_array($rowtest['QUESTION_ID'],$questArr)){
						$rowtest['given_answer'] = '';
						if(isset($questatusArr[$rowtest['QUESTION_ID']])){
							$rowtest['status'] = trim($questatusArr[$rowtest['QUESTION_ID']]);
						}else{
							$rowtest['status'] = 'NV';
						}
						if(isset($queCauseArr[$rowtest['QUESTION_ID']])){
							$rowtest['cause'] = trim($queCauseArr[$rowtest['QUESTION_ID']]);
						}else{
							$rowtest['cause'] = '';
						}

						if(isset($quesTime[$rowtest['QUESTION_ID']])){
							$rowtest['time_consume'] = $quesTime[$rowtest['QUESTION_ID']];
						}else{
							$rowtest['time_consume'] = 0;
						}

						if($rowtest['QUESTIONS_TYPE_ID'] == 1){
							if(isset($quesAns[$rowtest['QUESTION_ID']]) && $quesAns[$rowtest['QUESTION_ID']] != -1){
								$rowtest['given_answer'] = $quesAns[$rowtest['QUESTION_ID']] + 1;
							}
						}else if($rowtest['QUESTIONS_TYPE_ID'] == 2){
							if(isset($quemultiAnsArr[$rowtest['QUESTION_ID']]) && $quemultiAnsArr[$rowtest['QUESTION_ID']] != ''){
								$mulArr = explode(":",$quemultiAnsArr[$rowtest['QUESTION_ID']]);
								$mulStr = '';
								foreach($mulArr as $itm){
									$nval = $itm + 1;
									if($mulStr == ''){
										$mulStr .= $nval;
									}else{
										$mulStr .= ':'.$nval;
									}
								}
								$rowtest['given_answer'] = $mulStr;
							}
						}else{
							if(isset($quetextAnsArr[$rowtest['QUESTION_ID']]) && $quetextAnsArr[$rowtest['QUESTION_ID']] != ''){
								$rowtest['given_answer'] = trim($quetextAnsArr[$rowtest['QUESTION_ID']]);
							}
						}
					}else{
						$rowtest['given_answer'] = '';
						$rowtest['status'] = 'NV';
						$rowtest['time_consume'] = 0;
					}
					$rowtest = array('color' => 'default') + $rowtest;
					$data[] = $rowtest; 
				} 
			}
		}
		echo json_encode($data);
        exit;
		
	}
	

	public function submit_step_test(){
		$ra = '';
		if ($this->request->getMethod() === 'post'){
			$studentId = $this->session->get('icaduserid');
			$objx = json_decode($_POST['txtdata'],true);
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


			$datestr = date('YmdHis');
			
			$rand = rand(100,999);
			$resultId = $datestr.$studentId.$rand;
			$totalQuest = count($objx);
			$createdOn = date('Y-m-d H:i:s');
			$submitDate = date('d/m/Y');
			$submitTime = $createdOn;
			$totMarks = $totalQuest * 4;
			$courseId = $objx[0]['COURSE_ID'];
			$subjectId = $objx[0]['SUBJECT_ID'];
			
			$subName = $this->subjectModel->getSubjectName($subjectId);
			$topicId = $objx[0]['TOPIC_ID'];
			$stepId = $objx[0]['STEP_ID'];
			$lectureId = $objx[0]['LECTURE_ID'];
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
			$quesTimeDetail = array();
			//$causeDetail = array();
			$correctAns = 0;
			$wrongAns = 0;
			$attempted = 0;
			foreach($objx as $key => $value){
				if($value['QUESTIONS_TYPE_ID'] != 4){
					$questIdArr[] = $value['QUESTION_ID'];
					$quesTypeArr[] = $value['QUESTIONS_TYPE_ID'];
					$quesTimeDetail[] = $value['time_consume'];
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
							$quesGivenDetail[] = '';
							$queStatDetail[] = 'U';
						}else if($value['given_answer'] == $value['answer']){ //need to review
							$givenValArr = explode(":",$value['given_answer']);
							$givenStrArr = array();
							foreach($givenValArr as $item){
								$givenStrArr[] = intval($item) - 1;
								
							}
							
							$givenAnsMultiArr[] = implode(":",$givenStrArr);
							$quesGivenDetail[] = implode(":",$givenStrArr);
							$attempted++;
							$correctAns++;
							$queStatDetail[] = 'C';
						}else{
							
							$givenValArr = explode(":",$value['given_answer']);
							$givenStr = '';
							$givenStrArr = array();
							foreach($givenValArr as $item){
								$givenStrArr[] = intval($item) - 1;
							}
							$givenAnsMultiArr[] = implode(":",$givenStrArr);
							$quesGivenDetail[] = implode(":",$givenStrArr);
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
							$quesGivenDetail[] = '';
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

			}
			if(!empty($quesTypeArr) && !empty($questIdArr) && !empty($queStatDetail)){
				$quesTypeStr = '['.implode(", ",$quesTypeArr).']';
				$questIdStr = '['.implode(", ",$questIdArr).']';
				$apearAnsStr = '['.implode(", ",$apearAnsArr).']';
				$givenAnsStr = '['.implode(", ",$givenAnsArr).']';
				$givenAnsMultiStr = '['.implode(", ",$givenAnsMultiArr).']';
				$givenTextStr = '['.implode(", ",$givenTextArr).']';
				$queStatDetailStr = implode(",",$queStatDetail);
				$correctAnsDetailStr = implode(",",$correctAnsDetail);
				$quesGivenDetailStr = implode(",",$quesGivenDetail);
				$quesTimeStr = '['.implode(", ",$quesTimeDetail).']';

				$totalUnattempted = $totalQuest - $attempted;
				$totPlusMark = $correctAns * 4;
				$earnedMark = $totPlusMark - $wrongAns;
				$attemptTotal = $attempted.'/'.$totalQuest;
				$resData = array(
					'RESULT_ID' => $resultId,
					'EXAM_TYPE_ID' => 1,
					'COURSE_ID' => $courseId,
					'SUBJECT_ID' => $subjectId,
					'STUDENT_ID' => $studentId,
					'LECTURE_ID' => $lectureId,
					'TOPIC_ID' => $topicId,
					'STEP_ID' => $stepId,
					'ALL_QUESTION_IDS' => $questIdStr,
					'ALL_QUESTION_TYPE_IDS' => $quesTypeStr,
					'QUESTION_STATUS_DTL' => $queStatDetailStr,
					'QUESTION_CORRECT_DTL' => $correctAnsDetailStr,
					'QUESTION_GIVEN_DTL' => $quesGivenDetailStr,
					'APPEAR_ANSWER_OPTIONS' => $apearAnsStr,
					'APPEAR_QUESTION_TIME' => $quesTimeStr,
					'GIVEN_ANSWER_OPTIONS' => $givenAnsStr,
					'GIVEN_ANSWER_MULTIPLE_OPTIONS' => $givenAnsMultiStr,
					'GIVEN_ANSWER_TEXT_NUMBER' => $givenTextStr,
					'EXAM_SUBMITTED_DATE' => $submitDate,
					'EXAM_SUBMITTED_TIME' => $submitTime,
					'TOTAL_QUESTIONS' => $totalQuest,
					'ATTEMPTED_QUESTIONS' => $attempted,
					'TOTAL_CORRECT_ANSWER' => $correctAns,
					'TOTAL_WRONG_ANSWER' => $wrongAns,
					'TOTAL_UNATTEMPTED_QUE' => $totalUnattempted,
					'TOTAL_EXAM_MARKS' => $totMarks,
					'TOTAL_PLUS_MARKS' => $totPlusMark,
					'TOTAL_MINUSE_MARKS' => $wrongAns,
					'TOTAL_MARKS' => $earnedMark,
					'TOTAL_EXAM_MARKS_SECTION' => $totMarks,
					'TOTAL_PLUS_MARKS_SECTION' => $totPlusMark,
					'TOTAL_MINUSE_MARKS_SECTION' => $wrongAns,
					'TOTAL_MARKS_SECTION' => $earnedMark,
					'CORRECT_QUESTION_SECTION' => $correctAns,
					'PARTIAL_CORRECT_QUESTION_SECTION' => 0,
					'WRONG_QUESTION_SECTION' => $wrongAns,
					'CORRECT_PLUS_MARK_SECTION' => $totPlusMark,
					'CORRECT_PARTIAL_MARK_SECTION' => 0,
					'TIMESPENT' => $timeSpent,
					'EXAM_SUBJECT_ID' => $subjectId,
					'EXAM_SUBJECT_NAME' => $subName,
					'EXAM_SUBJECT_ATTEMPT_TOTAL' => $attemptTotal,
					'SEL_ACTIVITY' => 'ACTIVITY_DECODE',
					'PLATFORM' => 'WEB',
					'CREATED_ON' => $createdOn
				);
				$this->db->table('icad_student_result_dtl')->insert($resData);
				/*** following code is for update status for sync app data ***/
				$stuUpdData['DECODE_SUBJECT_STATUS'] = 'YES';
				$stuUpdData['DECODE_TOPIC_STATUS'] = 'YES';

				$this->db->table('icad_student_mst')->where('STUDENT_ID',$studentId)->update($stuUpdData);
			}
			$ra = 1;
		}
		echo $ra;
	}
	
	public function report_issue_questions(){
		$ra = '';
		if ($this->request->getMethod() === 'post'){
			$userId = $this->request->getPost('txtuserid');
			$questionId = $this->request->getPost('questionId');
			$quesTypeId = $this->request->getPost('quesTypeId');
			$otherReasontext = $this->request->getPost('otherReason');
			$name = $this->request->getPost('name');
			$activity = $this->request->getPost('activity');
			$reasonId = $this->request->getPost('reasonId');
			$count = 0;
			if($quesTypeId == 3){
				$count = $this->practiceModel->checkReportedQueExist($questionId, $activity, $reasonId, $userId, $otherReasontext);
			}else{
				$count = $this->practiceModel->checkReportedQueExist($questionId, $activity, $reasonId, $userId);
			}
			if($count == 0){
				$rand = rand(100,999);
				$resultId = $questionId.time().$userId.$rand;
				$createdOn = date('Y-m-d H:i:s');

				$resData = array(
					'DEVICE_REPORT_ID' => $resultId,
					'QUESTION_FROM' => $activity,
					'QUESTION_ID' =>  $questionId,
					'QUESTION_TYPE_ID' => $quesTypeId,
					'QUESTION_REPORT_REASON_ID' => $reasonId,
					'QUESTION_REPORT_REASON_NAME' => $name,
					'QUESTION_REPORT_REASON_OTHER' => $otherReasontext,
					'QUESTION_REPORT_DATE_TIME' => $createdOn,
					'QUESTION_REPORT_BY' => $userId,
					'PLATFORM' => 'WEB',
					'CREATED_ON' => $createdOn
				);
				$this->db->table('icad_question_report_dtl')->insert($resData);
			}
			$ra = 1;
		}
		echo $ra;
	}
}
