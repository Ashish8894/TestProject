<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\ReportsModel;
use App\Models\SubjectModel;
use CodeIgniter\CLI\Console;

class Reports extends BaseController
{
    public function __construct()
    {
        $this->userModel =  New UserModel();
        $this->reportModel =  New ReportsModel();
        $this->subjectModel = new SubjectModel();
    }

    public function index()
    {
        if(!$this->session->has('icaduserid') ){
            return redirect()->to('/');
        }
        $data['pagetitle'] = 'My Performance';
        $data['examlist'] = $this->reportModel->getResultList();
        return view('reports/index',$data);
    }

    public function analysis($resultId)
    {
        $examlist = $this->reportModel->getExamList($resultId);
        $data['pagetitle'] = $examlist['EXAM_NAME'] ? $examlist['EXAM_NAME'] : '';
        $data['resultId'] = $examlist['STUDENT_RESULT_ID'];
        $data['examId'] = $examlist['EXAM_ID'];
		$examId = $examlist['EXAM_ID'];
		$data['resultId'] = $examlist['STUDENT_RESULT_ID'];
		$questionlist = $this->reportModel->QuestionId($examId);
		$ids = implode(',',$questionlist);
		$userId = $this->session->get('icaduserid');
		$status = $this->reportModel->selfreasonstatus($examId,$userId);
		$data['count'] = $status;
		// print_r($data);die;
        return view('reports/list',$data);
    }

    public function test_score($examId)
    {
        $examlist = $this->reportModel->getExamDetail($examId);
        $data['pagetitle'] = 'Test Score';
        $data['exam_name'] = $examlist['EXAM_NAME'] ;
        $data['resultId'] = $examlist['STUDENT_RESULT_ID'];
        $data['examId'] = $examlist['EXAM_ID'];
        return view('reports/viewscore',$data);
    }

    public function self_test_analysis($examId)
    {
        $examlist = $this->reportModel->getExamDetail($examId);
        $data['pagetitle'] = 'Self-Test Analysis';
        $data['exam_name'] = $examlist['EXAM_NAME'];
        $data['resultId'] = $examlist['STUDENT_RESULT_ID'];
        $data['examId'] = $examlist['EXAM_ID'];
		$userId = $this->session->get('icaduserid');
		$status = $this->reportModel->selfreasonstatus($examId,$userId);
		$data['count'] = $status;
        return view('reports/viewresult',$data);
    }

    public function save_selfdata(){
		$finaldata = array();
		$student_id = $this->session->get('icaduserid');
		echo"<pre>";print_r($_POST);die;
		$examId = $_POST['exam_id'];
		$questionIds = $_POST['questId'];
		$reasonIds = $_POST['sellist1'];
		$ids = implode(',',$questionIds);
		$subject = $this->reportModel->getSubjectId($ids);
		foreach($questionIds as $key => $val){
			foreach($subject as $key1 => $valsubject){
				if($key == $key1){
					$finaldata[$key]['exam_id']= $examId;
					$finaldata[$key]['student_id']= $student_id;
					$finaldata[$key]['subject_id']= $valsubject['SUBJECT_ID'];
					$finaldata[$key]['question_id'] = $val;
				}
			}
		}
		foreach($reasonIds as $key3 => $val3){
			foreach($finaldata as $key4 => $valsubject){
				if($key3 == $key4){
					$finaldata[$key3]['reason_id']= $val3;
				}
			}
		}
		foreach($finaldata as $valfinal){
			$status = $this->db->table('os_result_self_response')->insert($valfinal);
		}
	return redirect()->to('reports/self_test_analysis/'.$examId);
		// echo"<pre>";print_r($status);die;
    }

    public function view_question(){
        $questionId = $_POST['x'];
        $given_answer = $_POST['xx'];
        $sql = "SELECT * FROM icad_question_mst WHERE QUESTION_ID = :id:";
        $newSql = $this->db->query($sql, [
            'id'     => $questionId
        ]);
        $data = $newSql->getRowArray();
        $alpha = array(1 => 'A', 2 => 'B', 3 => 'C', 4 => 'D', 5 => 'E', 6 => 'F', 7 => 'G', 8 => 'H');
        $canText = '';
        if($data['IS_CANCELED'] == 'YES'){
            $canText = '<h4 class="text-danger">Canceled </h4>';
        }
        $queStr = $data['QUESTION_DTL'];
        $queStr = str_replace("\begin{array}","\begin{array}{cc}",$queStr);
        $queStr = str_replace("\begin{array}{cc}{cc}","\begin{array}{cc}",$queStr);
        $txtanstext = $canText.$queStr.'<br/>';
        $numberOfOption = $data['NUMBER_OF_OPTIONS'];

        if($data['QUESTIONS_TYPE_ID'] == 1){
            $correctAnswer = $data['CORRECT_ANSWER_OPTION'];
        }else if($data['QUESTIONS_TYPE_ID'] == 2){
            $correctAnswer = explode(":",$data['CORRECT_ANSWER_MULTIPLE']);
        }else{
            $range1 = $data['CORRECT_ANSWER_TEXT_FROM'];
            $range2 = $data['CORRECT_ANSWER_TEXT_TO'];
        }


        if($data['QUESTIONS_TYPE_ID'] == 1){
            for($i = 1; $i <= $numberOfOption; $i++){
                $optstr = 'ANSWER_OPTION_'.$i;
                $opt = str_replace("<p>","",$data[$optstr]); 
                $opt = str_replace("</p>","",$opt); 
                $opt = str_replace("\begin{array}","\begin{array}{cc}",$opt);
                $opt = str_replace("\begin{array}{cc}{cc}","\begin{array}{cc}",$opt);
                if($i == $correctAnswer){
                    $txtanstext .= '<span style="color:#00b085;">'.$alpha[$i].') '.$opt.'</span><br/>';
                }else if($i == $given_answer){
                    $txtanstext .= '<span style="color:#FF5733;">'.$alpha[$i].') '.$opt.'</span><br/>';
                }else{
                    $txtanstext .= $alpha[$i].') '.$opt.'<br/>';
                }
            }
        }else if($data['QUESTIONS_TYPE_ID'] == 2){
            for($i = 1; $i <= $numberOfOption; $i++){
                $optstr = 'ANSWER_OPTION_'.$i;
                $opt = str_replace("<p>","",$data[$optstr]); 
                $opt = str_replace("</p>","",$opt);
                $opt = str_replace("\begin{array}","\begin{array}{cc}",$opt);
                $opt = str_replace("\begin{array}{cc}{cc}","\begin{array}{cc}",$opt); 
                if(in_array($i,$correctAnswer)){
                    $txtanstext .= '<span style="color:#00b085;">'.$alpha[$i].') '.$opt.'</span><br/>';
                }else if(in_array($i,$given_answer)){
                    $txtanstext .= '<span style="color:#FF5733;">'.$alpha[$i].') '.$opt.'</span><br/>';
                }else{
                    $txtanstext .= $alpha[$i].') '.$opt.'<br/>';
                }
            }
        }else{
            $txtanstext .= '<span style="color:#00b085;">'.$range1.'-'.$range2.'</span><br/>';
        }
        if(!empty($data['SOLUTION'])){
            $txtanstext .= '<br><u style="color:#FF5733;">Solution:</u><br>';
            $txtanstext .= $data['SOLUTION'];
        }
        return json_encode($txtanstext);
        exit;
    }
        
    public function test_analysis_report($examId)
    {
        $examlist = $this->reportModel->getExamDetail($examId);
        $data['pagetitle'] = 'Test Analysis Report';
        $data['exam_name'] = $examlist['EXAM_NAME'];
        $data['resultId'] = $examlist['STUDENT_RESULT_ID'];
        $data['examId'] = $examlist['EXAM_ID'];
        return view('reports/test_analysis_report',$data);
    }

    public function weakness($examId)
    {
        $examlist = $this->reportModel->getExamDetail($examId);
        $data['pagetitle'] = 'Weakness';
        $data['exam_name'] = $examlist['EXAM_NAME'];
        $data['resultId'] = $examlist['STUDENT_RESULT_ID'];
        $data['examId'] = $examlist['EXAM_ID'];
        return view('reports/weakness',$data);
    }
	public function subject_balance($examId)
    {
		$examDetail = $this->reportModel->getExams($examId);
		$examSubjects = $this->reportModel->getExamSubjects($examDetail['SUBJECT_IDS']);
		$studentId = $this->session->get('icaduserid');
		$subjectNameArr = array();
		foreach($examSubjects as $sbval){
			$subjectNameArr[$sbval['SUBJECT_ID']] = $sbval['SUBJECT_NAME'];
		}
		$results = $this->reportModel->getResultByExamAndStudent($examId,$studentId);
		$subjectSections = array(); 
		if($examDetail['IS_SECTION_AVAILABLE'] == 'YES'){
			$subjects = $this->reportModel->getSubjectBySections($results['EXAM_SUBJECT_ID']);
			foreach($subjects as $val){
				$subjectSections[$val['SUBJECT_ID']][] = $val['EXAM_SUBJECT_SECTION_ID'];
			}
		}else{
			foreach($examSubjects as $val){
				$subjectSections[$val['SUBJECT_ID']][] = $val['SUBJECT_ID'];
			}
		}
		$subIndexArr = explode(",",$results['EXAM_SUBJECT_ID']);
		$total_mark_sectionArr = explode(",",$results['TOTAL_EXAM_MARKS_SECTION']);
        $minus_mark_sec_arr = explode(",",$results['TOTAL_MINUSE_MARKS_SECTION']);
        $plus_mark_sec_arr = explode(",",$results['TOTAL_PLUS_MARKS_SECTION']);
        $earned_mark_sec_arr = explode(",",$results['TOTAL_MARKS_SECTION']);

        $correctQueSecArr = explode(",",$results['CORRECT_QUESTION_SECTION']);
        $wrongQueSecArr = explode(",",$results['WRONG_QUESTION_SECTION']);

        $totalMarkSubject = array();
		$minusMarkSubject = array();
		$plusMarkSubject = array();
		$earnedMarkSubject = array();
		$correctQueSubject = array();
		$wrongQueSubject = array();
		foreach($subjectSections as $key => $subVal){
			foreach($subVal as $sval){
				$ind = array_search($sval,$subIndexArr);
				$totalMarkSubject[$key][] = $total_mark_sectionArr[$ind];
				$minusMarkSubject[$key][] = $minus_mark_sec_arr[$ind];
				$plusMarkSubject[$key][] = $plus_mark_sec_arr[$ind];
				$earnedMarkSubject[$key][] = $earned_mark_sec_arr[$ind];
				$correctQueSubject[$key][] = $correctQueSecArr[$ind];
				$wrongQueSubject[$key][] = $wrongQueSecArr[$ind];
			}
		}
		foreach($subjectSections as $key => $subVal){
			$totalMarkSubject[$key] = array_sum($totalMarkSubject[$key]);
			$minusMarkSubject[$key] = array_sum($minusMarkSubject[$key]);
			$plusMarkSubject[$key] = array_sum($plusMarkSubject[$key]);
			$earnedMarkSubject[$key] = array_sum($earnedMarkSubject[$key]);
			$correctQueSubject[$key] = array_sum($correctQueSubject[$key]);
			$wrongQueSubject[$key] = array_sum($wrongQueSubject[$key]);
		}
		$correctWrongCnt = $results['TOTAL_CORRECT_ANSWER'] + $results['TOTAL_WRONG_ANSWER'];
		$correctPer = 0;
		$wrongPer = 0;
		if($correctWrongCnt > 0){
			$correctPer = round((($results['TOTAL_CORRECT_ANSWER'] / $correctWrongCnt)*100),2);
			$wrongPer = round((($results['TOTAL_WRONG_ANSWER'] / $correctWrongCnt)*100),2);
		}
		$data['correctPer'] = $correctPer;
		$data['wrongPer'] = $wrongPer;
		
		$data['pagetitle'] = 'Subject Balance';
        $data['exam_name'] = $examDetail['EXAM_NAME'];
        $data['resultId'] = $results['STUDENT_RESULT_ID'];
        $data['examId'] = $examId;
		
		$correctGraph = array();
		$sumOfCorrect = array_sum($correctQueSubject);
		foreach($correctQueSubject as $key => $corval){
			$perc = 0;
			if($sumOfCorrect > 0){
				$perc = round((($corval / $sumOfCorrect)*100),2);
			}
			$correctGraph[] = "{name: '".$subjectNameArr[$key]."',y: ".$perc."}";
		}
		$grphData = implode(",",$correctGraph);
		$data['grphData'] = $grphData;
		return view('reports/subject_balance',$data);
	}

    public function time_management($examId){
        $examlist = $this->reportModel->getExamDetail($examId);
        $data['pagetitle'] = 'Time Management';
        $data['exam_name'] = $examlist['EXAM_NAME'];
		$data['question'] = $examlist['TOTAL_QUESTIONS'];
        $data['resultId'] = $examlist['STUDENT_RESULT_ID'];
        $data['examId'] = $examlist['EXAM_ID'];
		$studentId = $this->session->get('icaduserid');
		$examlist = $this->reportModel->getTimeLost($examId,$studentId);
        return view('reports/time_management',$data);
    }
	
    public function question_management($examId){
        $examlist = $this->reportModel->getExamDetail($examId);
        $data['pagetitle'] = 'Question Management';
        $data['exam_name'] = $examlist['EXAM_NAME'];
        $data['resultId'] = $examlist['STUDENT_RESULT_ID'];
        $data['examId'] = $examlist['EXAM_ID'];
        return view('reports/question_management',$data);
    }
        
    public function potential_score($examId){
        $examlist = $this->reportModel->getExamDetail($examId);
        $data['pagetitle'] = 'Score & Potential Score';
        $data['exam_name'] = $examlist['EXAM_NAME'];
        $data['resultId'] = $examlist['STUDENT_RESULT_ID'];
        $data['examId'] = $examlist['EXAM_ID'];
        return view('reports/score_potential_score',$data);
    }

    public function remedial_task($examId){
        $examlist = $this->reportModel->getExamDetail($examId);
        $data['pagetitle'] = 'Remedial Task';
        $data['exam_name'] = $examlist['EXAM_NAME'];
        $data['resultId'] = $examlist['STUDENT_RESULT_ID'];
        $data['examId'] = $examlist['EXAM_ID'];
        return view('reports/remedial_task',$data);
    }

    public function hint_detail()
    {
        $questionid = $_POST['questionid'];
        $examlist = $this->reportModel->getHintDetail($questionid);
        $data['pagetitle'] = 'Hint';
        $data['exam_name'] = $examlist['EXAM_NAME'];
        $data['examId'] = $examlist['EXAM_ID'];
        if(!empty($examlist['HINT'])){
            $data['hint'] = $examlist['HINT'];
        }else{
            $data['hint'] = 'No Hint Avialable'; 
        }
        $data['token'] = csrf_hash();
        echo json_encode($data);
    }

	public function report_list_detail()
    {
        $questionid = $_POST['questionid'];
        $examlist = $this->reportModel->getHintDetail($questionid);
        $data['pagetitle'] = 'Reported reason';
        $data['exam_name'] = $examlist['EXAM_NAME'];
        $data['examId'] = $examlist['EXAM_ID'];
        $examlist1 = $this->reportModel->getReportReason();
        $data['pagetitle'] = 'Report Reason';
        $dropdown = '';
        if(!empty($examlist1)){
			$data['dropdown'] = $examlist1;
        }else{
			$data['dropdown'] = 'No report reason Avialable'; 
        }
        $data['questionid'] = $questionid;
        $data['token'] = csrf_hash();
        echo json_encode($data);
    }

    public function report_detail()
    {
        $questionid = $_POST['questionid'];
        $examlist = $this->reportModel->getHintDetail($questionid);
        $data['exam_name'] = $examlist['EXAM_NAME'];
        $data['examId'] = $examlist['EXAM_ID'];
        $examlist = $this->reportModel->getReportReason();
        $data['pagetitle'] = 'Report Reason';
        $dropdown = '';
        if(!empty($examlist)){
            $data['dropdown'] = $examlist;
        }else{
            $data['dropdown'] = 'No report reason Avialable'; 
        }
        $data['questionid'] = $questionid;
        $data['token'] = csrf_hash();
        echo json_encode($data);
    }

    public function saveReport(){
       $questionId = $_POST['question_id'];
       $examId = $_POST['exam_id'];
       $reportedId = $_POST['reported'];
       $status = '';
       $ReportData = $this->reportModel->getReportData($questionId,$reportedId);
       $finaldata = array();
       $finaldata['exam_id'] = $examId;
       $finaldata['student_id'] = $this->session->get('icaduserid');
       $finaldata['question_id'] = $questionId;
       $finaldata['subject_id'] = $ReportData['SUBJECT_ID'];
       $finaldata['reason_id'] = $reportedId;
	//    $ReasonData1 = $this->reportModel->getReportReasonDtl($reportedId);
	//    $subjectData = $this->reportModel->getSubjectDtl($questionId);
	//    $reason_dtl= $ReasonData1['QUESTION_REVIEW_REASON_NAME'];
       if($this->db->table('os_result_self_response')->insert($finaldata)){
            $status = 1;
        }else{
            $status = 0; 
        }
        return redirect()->to('reports/remedial_task/'.$examId);
    }

	public function similar_question_status(){
		// $data['pagetitle'] = 'Similar Question Test';
        $questionid = $_POST['questionid'];
        $data['status'] = $this->reportModel->getStatus($questionid);
		$data['question'] = $this->reportModel->similar_question($questionid);
        return json_encode($data); 
       // exit;
    }
	
    public function similar_question_details(){
		$data['pagetitle'] = 'Similar Question Test';
        $questionid = $_POST['questionid'];
		
        $data = $this->reportModel->similar_question($questionid);
        return json_encode($data); 
       // exit;
    }

    public function similar_question_test($examId,$questionid){
        if(!$this->session->has('icaduserid') ){
            return redirect()->to('/');
        }
        if($examId == '' ){
        	return redirect()->to('/reports');
        }
        $data['pagetitle'] = 'Similar Question Test';
        $data['examId'] = $examId;
        $data['userId'] = $this->session->get('icaduserid');
		$data['question'] = $this->reportModel->similar_question($questionid);
		// print_r($data);die;
        return view('reports/similar_question_test',$data);
    }
     
    public function submit_similar_test(){
        $ra = '';
		if ($this->request->getMethod() === 'post'){
			$studentId = $this->session->get('icaduserid');
			$objx = json_decode($_POST['txtdata'],true);
            // print_r($objx);die;
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
            $parent_question_id = $objx[0]['BULK_QUESTION_ID'];
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
						$correctAnsDetail[] = $value['given_answer'];
						if($value['given_answer'] == ''){
							$apearAnsArr[] = '-1';
							$quesGivenDetail[] = '-1';
							$givenAnsArr[] = '-1';
							$queStatDetail[] = 'U';
						}else if($value['given_answer'] == $value['given_answer']){
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
						$correctAnsDetail[] = $value['given_answer'];
						if($value['given_answer'] == ''){
							$givenAnsMultiArr[] = '';
							$quesGivenDetail[] = '';
							$queStatDetail[] = 'U';
						}else if($value['given_answer'] == $value['given_answer']){ //need to review
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
                    'PARENT_QUESTION_ID' => $parent_question_id,
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
					'SEL_ACTIVITY' => 'ACTIVITY_SIMILAR_QUESTION',
					'PLATFORM' => 'WEB',
					'CREATED_ON' => $createdOn
				);
                // echo"<pre>";print_r($resData);die;
				$this->db->table('icad_student_similar_result_dtl')->insert($resData);
				/*** following code is for update status for sync app data ***/
				$stuUpdData['DECODE_SUBJECT_STATUS'] = 'YES';
				$stuUpdData['DECODE_TOPIC_STATUS'] = 'YES';

				$this->db->table('icad_student_mst')->where('STUDENT_ID',$studentId)->update($stuUpdData);
			}
			$ra = 1;
		}
		return json_encode($ra);
        exit;
    }

    public function similar_result($questionid){
        if(!$this->session->has('icaduserid') ){
            return redirect()->to('/');
        }
        if($questionid == '' ){
        	return redirect()->to('/reports');
        }
		$data['questionid'] = $questionid;
		$result = array();
		$userId = $this->session->get('icaduserid');
		
		// print_r($questionid);exit;
		$ques = $this->reportModel->getSimilarQuestion($questionid);
		$res = $this->reportModel->getSimilarResult($questionid, $userId);

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
			// print_r($questatusArr[$rowtest['QUESTION_ID']]);exit;
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
        // print_r($data['result']);die;
		return view('reports/step_result', $data);
    }

}
