<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\StrongBoxModel;
use App\Models\SubjectModel;
class Strong_box extends BaseController
{
	public function __construct(){
		$this->userModel = new UserModel();
		$this->examModel = new StrongBoxModel(); 
		$this->subjectModel = new SubjectModel(); 
	}
	
	public function index(){
		if(!$this->session->has('icaduserid') ){
            return redirect()->to('/');
        }
		$data['pagetitle'] = 'Strong Box';
        return view('strong_box/sbexams',$data);
    }
    public function examtopics($examid = '', $subjectid = ''){
		if(!$this->session->has('icaduserid') ){
            return redirect()->to('/');
        }
        if($examid == '' || $subjectid == ''){
        	return redirect()->to('/strong_box');
        }
		$data['subjectid'] = $subjectid;
		$data['examid'] = $examid;
		$data['pagetitle'] = 'Strong Box';
		return view('strong_box/examtopics',$data);
	}
	public function dpplevel($examid = '', $subjectid = '', $topicid = ''){
		if(!$this->session->has('icaduserid') ){
            return redirect()->to('/');
        }
        if($examid == '' || $subjectid == '' || $topicid == ''){
        	return redirect()->to('/strong_box');
        }
		$data['examid'] = $examid;
		$data['subjectid'] = $subjectid;
		$data['topicid'] = $topicid;
		$data['pagetitle'] = 'Strong Box';
		return view('strong_box/dpplevel',$data);
	}

	public function sbins($examid = '', $subjectid = '', $topicid = ''){
		if(!$this->session->has('icaduserid') ){
            return redirect()->to('/');
        }
        if($examid == '' || $subjectid == '' || $topicid == ''){
        	return redirect()->to('/strong_box');
        }
		$data['examid'] = $examid;
		$data['subjectid'] = $subjectid;
		$data['topicid'] = $topicid;
		$data['pagetitle'] = 'Strong Box';
		return view('strong_box/sbins',$data);
	}

	public function sbresult($examId = '', $topicId = ''){
        if(!$this->session->has('icaduserid') ){
            return redirect()->to('/');
        }
        if($examId == '' || $topicId == ''){
        	return redirect()->to('/strong_box');
        }
        $data['topic_id'] = $topicId;
		$data['exam_id'] = $examId;
		$result = array();
		
		$userId = $this->session->get('icaduserid');
		$ques = $this->examModel->getSBQuestion($topicId, $examId);
		$res = $this->examModel->getSBResult($topicId, $examId, $userId);
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
					$rowtest['status'] = trim($questatusArr[$rowtest['SB_QUESTION_ID']]);
				}else{
					$rowtest['status'] = 'NV';
				}
				if(isset($queCauseArr[$rowtest['SB_QUESTION_ID']])){
					$rowtest['cause'] = trim($queCauseArr[$rowtest['SB_QUESTION_ID']]);
				}else{
					$rowtest['cause'] = '';
				}

				if(isset($quesTime[$rowtest['SB_QUESTION_ID']])){
					$rowtest['time_consume'] = $quesTime[$rowtest['SB_QUESTION_ID']];
				}else{
					$rowtest['time_consume'] = 0;
				}

				if($rowtest['QUESTIONS_TYPE_ID'] == 1){
					if(isset($quesAns[$rowtest['SB_QUESTION_ID']]) && $quesAns[$rowtest['SB_QUESTION_ID']] != -1){
						$rowtest['given_answer'] = $quesAns[$rowtest['SB_QUESTION_ID']] + 1;
					}
				}else if($rowtest['QUESTIONS_TYPE_ID'] == 2){
					
					if(isset($quemultiAnsArr[$rowtest['SB_QUESTION_ID']]) && $quemultiAnsArr[$rowtest['SB_QUESTION_ID']] != ''){
						$mulArr = explode(":",$quemultiAnsArr[$rowtest['SB_QUESTION_ID']]);
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
					if(isset($quetextAnsArr[$rowtest['SB_QUESTION_ID']]) && $quetextAnsArr[$rowtest['SB_QUESTION_ID']] != ''){
						$rowtest['given_answer'] = trim($quetextAnsArr[$rowtest['SB_QUESTION_ID']]);
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
		return view('strong_box/sb_result', $data);
    }

    public function test($examId = '', $topicId = ''){
    	if(!$this->session->has('icaduserid') ){
            return redirect()->to('/');
        }
        if($examId == '' || $topicId == ''){
        	return redirect()->to('/strong_box');
        }
    	$data['examId'] = $examId;
    	$data['topicId'] = $topicId;
    	$data['userId'] = $this->session->get('icaduserid');
        $data['pagetitle'] = 'Instructions';
        return view('strong_box/test',$data);
    }
	public function sb_list_exam(){
		$data = array();
		if($this->session->has('icaduserid')){
			$courseId = $this->session->get('courseId');
			$userId = $this->session->get('icaduserid');
			$data = $this->examModel->subjectexamList($userId, $courseId); 
		}
		echo json_encode($data);
		exit;
	}
	
	public function sb_list_topics(){
		$data = array();
		if($this->session->has('icaduserid')){
			$courseId = $this->session->get('courseId');
			$userId = $this->session->get('icaduserid');
			$data = $this->examModel->sbListTopics($userId, $courseId);
		}
		echo json_encode($data);
		exit;
	}

	public function sb_count_subjective(){
		$data = array();
		if($this->session->has('icaduserid')){
			$courseId = $this->session->get('courseId');
			$userId = $this->session->get('icaduserid');
			$data = $this->examModel->sbCountSub($userId, $courseId);
		}
		echo json_encode($data);
		exit;
	}

	public function sb_count_objective(){
		$data = array();
		if($this->session->has('icaduserid')){
			$courseId = $this->session->get('courseId');
			$userId = $this->session->get('icaduserid');
			$data = $this->examModel->obCountSub($userId, $courseId);
		}
		echo json_encode($data);
		exit;
	}

	public function sb_topic_result(){
		$data = array();
		if($this->session->has('icaduserid')){
			$courseId = $this->session->get('courseId');
			$userId = $this->session->get('icaduserid');
			$data = $this->examModel->sbTopicRes($userId);
		}
		echo json_encode($data);
		exit;
	}

	public function sb_questions(){
		$data = array();
		if($this->session->has('icaduserid')){
			if ($this->request->getMethod() === 'post'){
				$userId = $this->session->get('icaduserid');
				$topicid = $this->request->getPost('topic_id');
				$examId = $this->request->getPost('exam_id');
				$ques = $this->examModel->getSBQuestion($topicid, $examId);
				$res = $this->examModel->getSBResult($topicid, $examId, $userId);
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
					//print_r($quesAns);exit;
					if(in_array($rowtest['SB_QUESTION_ID'],$questArr)){
						$rowtest['given_answer'] = '';
						if(isset($questatusArr[$rowtest['SB_QUESTION_ID']])){
							$rowtest['status'] = trim($questatusArr[$rowtest['SB_QUESTION_ID']]);
						}else{
							$rowtest['status'] = 'NV';
						}
						if(isset($queCauseArr[$rowtest['SB_QUESTION_ID']])){
							$rowtest['cause'] = trim($queCauseArr[$rowtest['SB_QUESTION_ID']]);
						}else{
							$rowtest['cause'] = '';
						}

						if(isset($quesTime[$rowtest['SB_QUESTION_ID']])){
							$rowtest['time_consume'] = $quesTime[$rowtest['SB_QUESTION_ID']];
						}else{
							$rowtest['time_consume'] = 0;
						}

						if($rowtest['QUESTIONS_TYPE_ID'] == 1){
							if(isset($quesAns[$rowtest['SB_QUESTION_ID']]) && $quesAns[$rowtest['SB_QUESTION_ID']] != -1){
								$rowtest['given_answer'] = $quesAns[$rowtest['SB_QUESTION_ID']] + 1;
							}
						}else if($rowtest['QUESTIONS_TYPE_ID'] == 2){
							
							if(isset($quemultiAnsArr[$rowtest['SB_QUESTION_ID']]) && $quemultiAnsArr[$rowtest['SB_QUESTION_ID']] != ''){
								$mulArr = explode(":",$quemultiAnsArr[$rowtest['SB_QUESTION_ID']]);
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
							if(isset($quetextAnsArr[$rowtest['SB_QUESTION_ID']]) && $quetextAnsArr[$rowtest['SB_QUESTION_ID']] != ''){
								$rowtest['given_answer'] = trim($quetextAnsArr[$rowtest['SB_QUESTION_ID']]);
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

	public function error_questions($userid,$testidx,$level,$step){
		$data = $this->examModel->error_questions($userid,$testidx, $level,$step);
		echo json_encode($data);
		exit;
	}
	
	public function sb_final_result_submit(){
		$ra = '';
		if ($this->request->getMethod() === 'post'){
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
			
			$studentId = $objx[0]['studId'];
			$rand = rand(100,999);
			$resultId = $datestr.$studentId.$rand;
			$totalQuest = count($objx);
			$createdOn = date('Y-m-d H:i:s');
			$submitDate = date('d/m/Y');
			$submitTime = $createdOn;
			$totMarks = $totalQuest * 4;
			
			$subjectId = $objx[0]['SUBJECT_ID'];
			$subName = $this->subjectModel->getSubjectName($subjectId);
			$topicId = $objx[0]['SB_TOPIC_ID'];
			$examId = $objx[0]['SB_EXAM_ID'];
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
					$questIdArr[] = $value['SB_QUESTION_ID'];
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
					'SUBJECT_ID' => $subjectId,
					'STUDENT_ID' => $studentId,
					'SB_TOPIC_ID' => $topicId,
					'SB_EXAM_ID' => $examId,
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
					'SEL_ACTIVITY' => 'ACTIVITY_STRONGBOX',
					'PLATFORM' => 'WEB',
					'CREATED_ON' => $createdOn
				);
				$this->db->table('icad_student_result_sb_dtl')->insert($resData);

				/*** following code is for update status for sync app data ***/
				$stuUpdData['STRONGBOX_COURSE_SUBJECT_STATUS'] = 'YES';
				$stuUpdData['STRONGBOX_TOPIC_STATUS'] = 'YES';

				$this->db->table('icad_student_mst')->where('STUDENT_ID',$studentId)->update($stuUpdData);
			}
			$ra = 1;
		}
		echo $ra;
	}

	public function sbterminal($did){
        $data['tid'] = $did;
        $data['pagetitle'] = 'Instructions';
        return view('strong_box/sbterminal',$data);
    }

	public function loaddata($questionId){
		$que_id = $questionId;
		$details = $this->examModel->details($que_id);
		$data['pagetitle'] = $details['SB_EXAM_NAME'].' | '.$details['SB_TOPIC_NAME'];
		$data['detail'] = $details;
		$data['path'] = $details['FILE_PATH'];
		return view('strong_box/loaddata',$data);
	}
}
