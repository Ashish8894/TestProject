<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\RewindModel;
use CodeIgniter\CLI\Console;
use App\Models\SubjectModel;

class Rewind extends BaseController
{
    public function __construct()
    {
        $this->rewindModel =  New RewindModel();
        $this->subjectModel = new SubjectModel();
    }

    public function index()
    {
    	if(!$this->session->has('icaduserid') ){
            return redirect()->to('/');
        }
        $data['pagetitle'] = 'Rewind';
        return view('rewind/index',$data);
    }
    
    public function createtest(){
    	if(!$this->session->has('icaduserid') ){
            return redirect()->to('/');
        }
        $data['pagetitle'] = 'Rewind';
        $userId = $this->session->get('icaduserid');
        // $data['subject'] = $this->rewindModel->getSubject($userId);
        return view('rewind/createtest',$data);
    }

    public function student_ranking(){
        $userId = $_POST['userid'];
        $data = $this->rewindModel->student_ranking($userId);    
        return json_encode($data);
        exit;
    }

    public function list_dynamic_tests(){
        $data = array();
        if($this->session->has('icaduserid')){
        	$userId = $this->session->get('icaduserid');
        	$data = $this->rewindModel->list_dynamic_tests($userId);
        }
        return json_encode($data);
        exit;
    }

    public function dyn_questions(){
        $r = array();
        if($this->session->has('icaduserid')){

	    	$userId = $this->session->get('icaduserid');
	        $testid = $this->request->getPost('testid');
	        $questions = $this->rewindModel->dyn_questions($userId,$testid);

	        foreach($questions as $rowtest){ 
	            $queStr = $rowtest["question"];
	            
	            $rowtest["question"] = '<span style="font-weight:300;">'.$queStr.'</span>';

	            $opt1 = $rowtest["option1"];
	            $opt2 = $rowtest["option2"];
	            $opt3 = $rowtest["option3"];
	            $opt4 = $rowtest["option4"];
	            $opt5 = $rowtest["option5"];
	            $opt6 = $rowtest["option6"];
	            $opt7 = $rowtest["option7"];
	            $opt8 = $rowtest["option8"];

	            $rowtest["option1"] = '<span style="font-weight:300;">'.$opt1.'</span>';  
	            $rowtest["option2"] = '<span style="font-weight:300;">'.$opt2.'</span>'; 
	            $rowtest["option3"] = '<span style="font-weight:300;">'.$opt3.'</span>'; 
	            $rowtest["option4"] = '<span style="font-weight:300;">'.$opt4.'</span>'; 
	            $rowtest["option5"] = '<span style="font-weight:300;">'.$opt5.'</span>'; 
	            $rowtest["option6"] = '<span style="font-weight:300;">'.$opt6.'</span>'; 
	            $rowtest["option7"] = '<span style="font-weight:300;">'.$opt7.'</span>'; 
	            $rowtest["option8"] = '<span style="font-weight:300;">'.$opt8.'</span>'; 
	            
	            $rowtest["option1"] = str_replace("<p>","",$rowtest["option1"]); 
	            $rowtest["option1"] = str_replace("</p>","",$rowtest["option1"]); 
	            $rowtest["option2"] = str_replace("<p>","",$rowtest["option2"]); 
	            $rowtest["option2"] = str_replace("</p>","",$rowtest["option2"]); 
	            $rowtest["option3"] = str_replace("<p>","",$rowtest["option3"]); 
	            $rowtest["option3"] = str_replace("</p>","",$rowtest["option3"]) ;
	            $rowtest["option4"] = str_replace("<p>","",$rowtest["option4"]); 
	            $rowtest["option4"] = str_replace("</p>","",$rowtest["option4"]);
	            $rowtest["option5"] = str_replace("<p>","",$rowtest["option5"]); 
	            $rowtest["option5"] = str_replace("</p>","",$rowtest["option5"]);
	            $rowtest["option6"] = str_replace("<p>","",$rowtest["option6"]); 
	            $rowtest["option6"] = str_replace("</p>","",$rowtest["option6"]);
	            $rowtest["option7"] = str_replace("<p>","",$rowtest["option7"]); 
	            $rowtest["option7"] = str_replace("</p>","",$rowtest["option7"]);
	            $rowtest["option8"] = str_replace("<p>","",$rowtest["option8"]); 
	            $rowtest["option8"] = str_replace("</p>","",$rowtest["option8"]);
	            $rowtest['time_consume'] = 0;
	            $rowtest['given_answer'] = '';
	            $rowtest['status'] = 'U'; 
	               
	            $rowtest = array('color' => 'default') + $rowtest;  
	            $r[] = $rowtest; 
	        }
	    }
        echo json_encode($r);
        exit;
    }

    public function dtestins($did = ''){
        if(!$this->session->has('icaduserid') ){
            return redirect()->to('/');
        }
        if($did == ''){
        	return redirect()->to('/rewind');
        }
        $data['tid'] = $did;
        $data['pagetitle'] = 'Instructions';
        return view('rewind/dtestins',$data);
    }

    public function Exam($tid = ''){
    	if(!$this->session->has('icaduserid') ){
            return redirect()->to('/');
        }
        if($tid == ''){
        	return redirect()->to('/rewind');
        }
        $data['tid'] = $tid;
        $data['pagetitle'] = 'Tests';
        $data['userId'] = $this->session->get('icaduserid');
        return view('rewind/dterminal',$data);
    }

    public function refresh_session(){
        if($this->session->get('icaduserid')){
            $_SESSEION['icaduserid'] = $this->session->get('icaduserid');
        }
    }

   
    public function submit_answer(){
        if($this->request->getMethod() === 'post'){
            $studentId = $this->request->getPost('sid');
            $examId = $this->request->getPost('tid');
           
            $objx = json_decode($_POST['txtdata'],true);
            /*echo "<pre>";
            print_r($objx);exit;*/
            /*** following code is to calculate timespent ***/
            $startdate = $objx[0]['startTime'];
            $enddate = $objx[0]['endTime'];
            
            $dt = date('Y-m-d H:i:s', strtotime($startdate));
            $edt = date('Y-m-d H:i:s', strtotime($enddate));
            //$to_time = strtotime(date('Y-m-d H:i:s'));
            $to_time = strtotime($edt);
            $from_time = strtotime($dt);
            
            //$timeSpent = round(abs($to_time - $from_time) / 3600); if find timespent in minut 
            $timeSpent = $to_time - $from_time;
           
            $tminHrs = gmdate("H:i:s", $timeSpent);
            $hrsArr = explode(":",$tminHrs);
            $totmin = intval($hrsArr[0]) * 60 + intval($hrsArr[1]);
            $totSec = $hrsArr[2];
            $timespentStr = $totmin." m ".$totSec." s";
           
            /*** End timespent code ***/
            $secarray = array();
           
            
            
            /*** follwing code is for make resultId ***/
            $datestr = date('YmdHis');
            $rand = rand(100,999);
            $resultId = $datestr.$studentId.$rand;
            /*** End Result id logic***/

            $totalQuest = count($objx); //find total question of exam
            
            $createdOn = date('Y-m-d H:i:s');
            //$submitDate = date('d/m/Y');
            $submitDate = date('d/m/Y', strtotime($enddate));
            
            //$submitTime = $createdOn;
            $submitTime = $enddate;
            //$courseId = 0;
            $subjectId = 0;

            //$examDuration = $exRow['EXAM_DURATION'];
            $examDuration = $totalQuest * 2;

			$courseId = $this->session->get('courseId');
			$subjectId = $objx[0]['subject_id'];
			//$subName = $con->findinfo('icad_subject_mst', 'SUBJECT_NAME', $subjectId, 'SUBJECT_ID');
			$subName = $this->subjectModel->getSubjectName($subjectId);
		
            $topicId = 0;
            $stepId = 0;
            $lectureId = 0;
            $quesTypeArr = array(); //this is for make all question type
            $questIdArr = array(); //this is for make all question id array
            //$bulkQuestIdArr = array(); //this is for make all question id array
            /*** following array is for single option ****/
            $apearAnsArr = array(); //this array is for Single option apear answer
            $givenAnsArr = array(); //this array is for only correct given answer
            /*** end***/
            $givenAnsMultiArr = array(); //this array is for multiple option type question given answer
            $givenTextArr = array(); //this array is for text type question given answer

            //$questStatArr = array();
            $queStatDetail = array(); //this array is for question status
            $correctAnsDetail = array(); //this array is for all type questions correct answer
            $quesGivenDetail = array(); //this array is for all type question's given answer
            //$causeDetail = array();
            $correctAns = 0; // this variable is for calculate total correct answer count
            $wrongAns = 0; //this variable is for calculate total wrong question count
            $attempted = 0; //this variable is for calculate total attempted question
            $totalQuestion = count($objx);

            $totalSecQues = array(); //this array is for count total question according to section
            $totalExamMark = 0; //this is for count total exam marks 
            $secIdArr = array(); //this array is for make section id array
            $secNameArr = array(); //this array is for make section name array
            $totalSecMark = array(); //this array is for count total mark according to section
            $totalSecPlusMark = array(); //this array is for count total plus mark according to section
            $totalSecMinusMark = array(); //this array is for count total minus mark according to section
            $totalSecPartialMark = array(); //this array is for count total partial mark according to section
            $seccorrectQuestArr = array(); //this array is for count total correct question according to section
            $secWrongQuestArr = array(); //this array is for count total wrong question according to section
            $secPartCorrectQuestArr = array(); //this array is for count total partial correct question according to section
            $secAttQuestArr = array(); //this array is for count attempted question according to section
            $totalPlusMark = 0; //this variable is for count total plus mark
            $totalMinusMark = 0; //this variable is for count total minus mark

            $quesTimeDetail = array();

            $r = array();
            $totalQueIdArr = array();
            foreach($objx as $key2 => $value2){
                $totalQueIdArr[] = $value2['question_id'];
            }
            $totalQueIdStr = implode(",",$totalQueIdArr);

            $sqlque = $this->db->query("SELECT QUESTION_ID, CORRECT_ANSWER_OPTION, CORRECT_ANSWER_MULTIPLE, CORRECT_ANSWER_TEXT_FROM as range1, CORRECT_ANSWER_TEXT_TO as range2, QUESTIONS_TYPE_ID FROM icad_question_mst WHERE QUESTION_ID IN (".$totalQueIdStr.")");
            $queDetails = $sqlque->getResultArray();
            
            $singleAnswer = array();
            $multipleAnswer = array();
            $range1Arr = array();
            $range2Arr = array();
            foreach($queDetails as $rowQue){ 
                if($rowQue['QUESTIONS_TYPE_ID'] == 3){
                    $range1Arr[$rowQue['QUESTION_ID']] = $rowQue['range1'];
                    $range2Arr[$rowQue['QUESTION_ID']] = $rowQue['range2'];
                }else if($rowQue['QUESTIONS_TYPE_ID'] == 2){
                    $multipleAnswer[$rowQue['QUESTION_ID']] = $rowQue['CORRECT_ANSWER_MULTIPLE'];
                }else{
                    $singleAnswer[$rowQue['QUESTION_ID']] = $rowQue['CORRECT_ANSWER_OPTION'];
                }
            }
            $oneQueMarkArr = array();
            foreach($objx as $key => $value){
               
                $sectionId = $value['subject_id'];
                $sectionName = $value['subject'];
               
                $totalSecQues[$sectionId][] = 1;
                $totalExamMark = $totalExamMark + $value['max_mark'];
                $totalSecMark[$sectionId][] = $value['max_mark'];
                
                $oneQueMarkArr[$sectionId] = $value['max_mark'];
                if(!in_array($sectionId,$secIdArr)){
                    $secIdArr[] = $sectionId;
                    $secNameArr[$sectionId] = $sectionName;
                }
                $questIdArr[$sectionId][] = $value['question_id'];
                $quesTypeArr[$sectionId][] = $value['question_type'];

                $quesTimeDetail[$sectionId][] = $value['time_consume'];

                /*** following code is for make all array according to question ***/
                if($value['question_type'] == 1){
                    $givenAnsMultiArr[$sectionId][] = '';
                    $givenTextArr[$sectionId][] = '';
                    $correctAnsDetail[$sectionId][] = $singleAnswer[$value['question_id']];
                    
                    if(!isset($value['given_answer']) || $value['given_answer'] == ''){
                        $apearAnsArr[$sectionId][] = '-1';
                        $quesGivenDetail[$sectionId][] = '-1';
                        $givenAnsArr[$sectionId][] = '-1';
                        $queStatDetail[$sectionId][] = 'U';
                    }else if($value['given_answer'] == $singleAnswer[$value['question_id']]){
                        $apearAnsArr[$sectionId][] = $value['given_answer'] - 1;
                        $quesGivenDetail[$sectionId][] = $value['given_answer'] - 1;
                        $givenAnsArr[$sectionId][] = $value['given_answer'] - 1;
                        $attempted++;
                        $correctAns++;
                        $queStatDetail[$sectionId][] = 'C';
                        $totalSecPlusMark[$sectionId][] = $value['max_mark'];
                        $totalPlusMark = $totalPlusMark + $value['max_mark'];
                        $seccorrectQuestArr[$sectionId][] = 1;
                        $secAttQuestArr[$sectionId][] = 1;

                        $secObjPlusQue[$sectionId][] = 1;
                        $secObjPlusMark[$sectionId][] = $value['max_mark'];

                    }else{
                        $apearAnsArr[$sectionId][] = $value['given_answer'] - 1;
                        $quesGivenDetail[$sectionId][] = $value['given_answer'] - 1;
                        $givenAnsArr[$sectionId][] = '-1';
                        $attempted++;
                        $wrongAns++;
                        $queStatDetail[$sectionId][] = 'W';
                        $totalSecMinusMark[$sectionId][] = $value['negative_mark'];
                        $totalMinusMark = $totalMinusMark + $value['negative_mark'];
                        $secWrongQuestArr[$sectionId][] = 1;
                        $secAttQuestArr[$sectionId][] = 1;

                        $secObjMinusQue[$sectionId][] = 1;
                        $secObjMinusMark[$sectionId][] = $value['negative_mark'];
                    }
                }
                if($value['question_type'] == 2){
                    $apearAnsArr[$sectionId][] = '-1';
                    $givenAnsArr[$sectionId][] = '-1';
                    $givenTextArr[$sectionId][] = '';
                    $correctAnsDetail[$sectionId][] = $multipleAnswer[$value['question_id']];

                    if(!isset($value['given_answer']) || $value['given_answer'] == ''){
                        $givenAnsMultiArr[$sectionId][] = '';
                        $quesGivenDetail[$sectionId][] = '';
                        $queStatDetail[$sectionId][] = 'U';
                    }else if($value['given_answer'] == $multipleAnswer[$value['question_id']]){ //need to review
                        $givenValArr = explode(":",$value['given_answer']);
                        $givenStrArr = array();
                        foreach($givenValArr as $item){
                            $givenStrArr[] = intval($item) - 1;
                        }
                        $givenAnsMultiArr[$sectionId][] = implode(":",$givenStrArr);
                        $quesGivenDetail[$sectionId][] = implode(":",$givenStrArr);
                        $attempted++;
                        $correctAns++;
                        $queStatDetail[$sectionId][] = 'C';
                        $totalSecPlusMark[$sectionId][] = $value['max_mark'];
                        $totalPlusMark = $totalPlusMark + $value['max_mark'];
                        $seccorrectQuestArr[$sectionId][] = 1;
                        $secAttQuestArr[$sectionId][] = 1;

                        $secObjPlusQue[$sectionId][] = 1;
                        $secObjPlusMark[$sectionId][] = $value['max_mark'];
                    }else{
                        /**** following code is to check is partial mark or not ***/
                        if($value['partial_mark'] > 0){
                            $checkStat = 0;
                            $arrMoptAns = explode(":",$multipleAnswer[$value['question_id']]);
                            $arrMGiveAns = explode(":",$value['given_answer']);
                            $givCnt = count($arrMGiveAns);
                            $parCorreCnt = 0;
                            /*** following code is to check given answer all option in correct answer array ***/
                            for($k = 0; $k < $givCnt; $k++){
                                if(!in_array($arrMGiveAns[$k],$arrMoptAns)){
                                    $checkStat = 1;
                                }
                            }
                            /*** End  ***/
                            $givenStrArr = array();
                            foreach($arrMGiveAns as $item){
                                $givenStrArr[] = intval($item) - 1;
                                
                            }
                            if($checkStat == 0){ //if question fit in partial condition 
                                /*** following code is for add partial mark according to no of option ***/
                                for($k = 0; $k < $givCnt; $k++){
                                    $parCorreCnt = $parCorreCnt + $value['partial_mark']; 
                                }
                                /*** End ***/

                                $givenAnsMultiArr[$sectionId][] = implode(":",$givenStrArr);
                                $quesGivenDetail[$sectionId][] = implode(":",$givenStrArr);
                                $attempted++;
                                //$wrongAns++;
                                $correctAns++;
                                $queStatDetail[$sectionId][] = 'P'; //this status is for partialy correct answer
                                $totalSecPartialMark[$sectionId][] = $parCorreCnt;
                                $totalPlusMark = $totalPlusMark + $parCorreCnt;
                                $secPartCorrectQuestArr[$sectionId][] = 1;
                                $secAttQuestArr[$sectionId][] = 1;

                                $secObjPlusQue[$sectionId][] = 1;
                                $secObjPlusMark[$sectionId][] = $parCorreCnt;
                            }else{
                                $givenAnsMultiArr[$sectionId][] = implode(":",$givenStrArr);
                                $quesGivenDetail[$sectionId][] = implode(":",$givenStrArr);
                                $attempted++; 
                                $wrongAns++;
                                $queStatDetail[$sectionId][] = 'W';
                                $totalSecMinusMark[$sectionId][] = $value['negative_mark'];
                                $totalMinusMark = $totalMinusMark + $value['negative_mark'];
                                $secWrongQuestArr[$sectionId][] = 1;
                                $secAttQuestArr[$sectionId][] = 1;

                                $secObjMinusQue[$sectionId][] = 1;
                                $secObjMinusMark[$sectionId][] = $value['negative_mark'];
                            }

                        }else{
                            $givenValArr = explode(":",$value['given_answer']);
                            $givenStrArr = array();
                            foreach($givenValArr as $item){
                                $givenStrArr[] = intval($item) - 1;
                                
                            }
                            $givenAnsMultiArr[$sectionId][] = implode(":",$givenStrArr);
                            $quesGivenDetail[$sectionId][] = implode(":",$givenStrArr);
                            $attempted++;
                            $wrongAns++;
                            $queStatDetail[$sectionId][] = 'W';
                            $totalSecMinusMark[$sectionId][] = $value['negative_mark'];
                            $totalMinusMark = $totalMinusMark + $value['negative_mark'];
                            $secWrongQuestArr[$sectionId][] = 1;
                            $secAttQuestArr[$sectionId][] = 1;

                            $secObjMinusQue[$sectionId][] = 1;
                            $secObjMinusMark[$sectionId][] = $value['negative_mark'];
                        }
                    }
                }
                if($value['question_type'] == 3){
                    $apearAnsArr[$sectionId][] = '-1';
                    $givenAnsArr[$sectionId][] = '-1';
                    $givenAnsMultiArr[$sectionId][] = '';
                   
                    $correctAnsDetail[$sectionId][] = $range1Arr[$value['question_id']]."-".$range2Arr[$value['question_id']];
                    
                    if(!isset($value['given_answer']) || $value['given_answer'] == ''){
                        $givenTextArr[$sectionId][] = '';
                        $quesGivenDetail[$sectionId][] = '';
                        $queStatDetail[$sectionId][] = 'U';
                    }else if($value['given_answer'] >= $range1Arr[$value['question_id']] && $value['given_answer'] <= $range2Arr[$value['question_id']]){
                        $givenTextArr[$sectionId][] = $value['given_answer'];
                        $quesGivenDetail[$sectionId][] = $value['given_answer'];
                        $attempted++;
                        $correctAns++;
                        $queStatDetail[$sectionId][] = 'C';
                        $totalSecPlusMark[$sectionId][] = $value['max_mark'];
                        $totalPlusMark = $totalPlusMark + $value['max_mark'];
                        $seccorrectQuestArr[$sectionId][] = 1;
                        $secAttQuestArr[$sectionId][] = 1;
                    }else{
                        $givenTextArr[$sectionId][] = $value['given_answer'];
                        $quesGivenDetail[$sectionId][] = $value['given_answer'];
                        $attempted++;
                        $wrongAns++;
                        $queStatDetail[$sectionId][] = 'W';
                        $totalSecMinusMark[$sectionId][] = $value['negative_mark'];
                        $totalMinusMark = $totalMinusMark + $value['negative_mark'];
                        $secWrongQuestArr[$sectionId][] = 1;
                        $secAttQuestArr[$sectionId][] = 1;
                    }
                }
                /*** End ***/
            }

            $totalMark = $totalPlusMark - $totalMinusMark;
            /*echo 'totalExamMark => '.$totalExamMark;
            print_r($secNameArr);*/
            $questIdStr = '';
            //$bulkQuestIdStr = '';
            $quesTypeStr = '';
            $apearAnsStr = '';
            $givenAnsStr = '';
            $givenAnsMultiStr = '';
            $givenTextStr = '';
            $queStatDetailStr = '';
            $correctAnsDetailStr = '';
            $quesGivenDetailStr = '';
            $quesConsmTimStr = '';
            $totalUnattempted = $totalQuest - $attempted;

            $secTotMarkArray = array();
            $secTotPlusMarkArray = array();
            $secTotMinusMarkArray = array();
            $secTotalEarnedMarkArr = array();
            $sectionCorrect = array();
            $sectionWrong = array();
            $sectionAttempt = array();
            $subAttemptTotArr = array();

            $partCorrQuestArr = array();
            $partCorrMarkArr = array();

            $sectionSubQuest = array();
            $sectionCorectSubQuest = array();
            $secTotSubjectiveMark = array();
            $secCorrectSubjectiveMark = array();

            /*** following code is to make array section wise ***/
            foreach($secIdArr as $val){
                $secTotMark = 0;
                $secTotPlusMark = 0;
                $secTotMinusMark = 0;
                $secEarnedMark = 0;
                $secPartMark = 0;
                $data = array();
               
                if(isset($totalSecMark[$val])){
                    foreach($totalSecMark[$val] as $stm){
                        $secTotMark = $secTotMark + $stm;
                    }
                }
                $data['subTotalMark'] = $secTotMark;
                $data['subName'] = $secNameArr[$val];
             
                $data['secQuestion'] = count($totalSecQues[$val]);
                $data['secAnsStat'] = implode(",",$queStatDetail[$val]);
                $data['timespentStr'] = $timespentStr;
                
                $data['one_que_mark'] = $oneQueMarkArr[$val];

                if(isset($totalSecPlusMark[$val])){
                    foreach($totalSecPlusMark[$val] as $stpm){
                        $secTotPlusMark = $secTotPlusMark + $stpm;
                    }
                }
                if(isset($totalSecMinusMark[$val])){
                    foreach($totalSecMinusMark[$val] as $stmm){
                        $secTotMinusMark = $secTotMinusMark + $stmm;
                    }
                }
                if(isset($totalSecPartialMark[$val])){
                    foreach($totalSecPartialMark[$val] as $ptmm){
                        $secPartMark = $secPartMark + $ptmm;
                    }
                }

                $data['secPartialMark'] = $secPartMark;
                $data['secPlusMark'] = $secTotPlusMark;
                $data['secMinusMark'] = $secTotMinusMark;
                $data['secNetMark'] = $secTotPlusMark - $secTotMinusMark;

                if(isset($seccorrectQuestArr[$val])){//correct question for individual section
                    $sectionCorrect[] = count($seccorrectQuestArr[$val]);
                    $data['secCorrectQue'] = count($seccorrectQuestArr[$val]);
                }else{
                    $sectionCorrect[] = 0;
                    $data['secCorrectQue'] = 0;
                }
                //$sectionCorrect[] = count($seccorrectQuestArr[$val]);
                if(isset($secWrongQuestArr[$val])){//wrong question for individual section
                    $sectionWrong[] = count($secWrongQuestArr[$val]);
                    $data['secWrongQue'] = count($secWrongQuestArr[$val]);
                }else{
                    $sectionWrong[] = 0;
                    $data['secWrongQue'] = 0;
                }
                if(isset($secAttQuestArr[$val])){//attempt question for individual section
                    $sectionAttempt[] = count($secAttQuestArr[$val]);
                    $data['secAttemptQue'] = count($secAttQuestArr[$val]);
                }else{
                    $sectionAttempt[] = 0;
                    $data['secAttemptQue'] = 0;
                }
                
                $secTotMarkArray[] = $secTotMark; //individual section total mark
                $secTotPlusMarkArray[] = $secTotPlusMark;//individual section plus marks
                $secTotPlusMarkArray1[] = $secTotPlusMark + $secPartMark;//individual section plus marks
                $secTotMinusMarkArray[] = $secTotMinusMark;//individual section minus marks
                $secTotalEarnedMarkArr[] = $secTotPlusMark - $secTotMinusMark + $secPartMark; //individual section earned marks
                $partCorrMarkArr[] = $secPartMark;

                if(isset($secAttQuestArr[$val])){//attempt question for individual section
                    $subAttemptTotArr[] = count($secAttQuestArr[$val]).'/'.count($totalSecQues[$val]);
                }else{
                    $subAttemptTotArr[] = '0/'.count($totalSecQues[$val]);
                }
                
                if(isset($secPartCorrectQuestArr[$val])){
                    $partCorrQuestArr[] = count($secPartCorrectQuestArr[$val]);
                    $data['partialCorrectQue'] = count($secPartCorrectQuestArr[$val]);
                }else{
                    $partCorrQuestArr[] = 0;
                    $data['partialCorrectQue'] = 0;
                }
                $allQuestIds = $questIdArr[$val];
                $allQuestTypeIds = $quesTypeArr[$val];

                $allQuesConsumeTimes = $quesTimeDetail[$val];
                $statusArr = $queStatDetail[$val];
                $correctAnsDtlArr = $correctAnsDetail[$val];
                $givenAnsDtlArr = $quesGivenDetail[$val];
                $multiAnsArr = $givenAnsMultiArr[$val];
                $textAnsArr = $givenTextArr[$val];
                $r2 = array();

                foreach($allQuestIds as $key1 => $value1){
                    $data1 = array();
                    $data1['question_id'] = $value1;
                    $data1['question_type'] = $allQuestTypeIds[$key1];
                    $data1['answer'] = $correctAnsDtlArr[$key1];
                    $data1['range1'] = '';
                    $data1['range2'] = '';
                    $data1['status'] = $statusArr[$key1];
                    //$data1['cause'] = $reasonArr[$key1];
                    if($allQuestTypeIds[$key1] == 1){
                        if($givenAnsDtlArr[$key1] != '-1'){
                            $data1['given_answer'] = $givenAnsDtlArr[$key1] + 1;
                        }else{

                            $data1['given_answer'] = '';
                        }
                    }else if($allQuestTypeIds[$key1] == 2){
                        $mulValArr = explode(":",$multiAnsArr[$key1]);
                        $mulValArr1 = array();
                        foreach($mulValArr as $item){
                            if($item != ''){

                                $mulValArr1[] = intval($item) + 1;
                            }else{
                                $mulValArr1[] = '';
                            }
                        }
                        //$data1['given_answer'] = $multiAnsArr[$key1] + 1;
                        $data1['given_answer'] = implode(":",$mulValArr1);
                    }else{
                        $rangeArr = explode("-",$correctAnsDtlArr[$key1]);
                        $data1['range1'] = $rangeArr[0];
                        $data1['range2'] = $rangeArr[1];
                        $data1['given_answer'] = $textAnsArr[$key1];
                    }
                    $data1['question_type'] = $allQuestTypeIds[$key1];
                    $r2[] =  $data1;
                    //array('tqnosc' => $tqcntccarray[$row['TOPIC_ID']]) + $row;
                }
                $data['ques_detail'] = $r2;

                if($questIdStr == ''){
                    $questIdStr .= '['.implode(", ",$questIdArr[$val]).']';
                    //$bulkQuestIdStr .= '['.implode(", ",$bulkQuestIdArr[$val]).']';
                    $quesTypeStr .= '['.implode(", ",$quesTypeArr[$val]).']';
                    $quesConsmTimStr .= '['.implode(", ",$quesTimeDetail[$val]).']';
                    $apearAnsStr .= '['.implode(", ",$apearAnsArr[$val]).']';
                    $givenAnsStr .= '['.implode(", ",$givenAnsArr[$val]).']';
                    $givenAnsMultiStr .= '['.implode(", ",$givenAnsMultiArr[$val]).']';
                    $givenTextStr .= '['.implode(", ",$givenTextArr[$val]).']';
                    $queStatDetailStr .= implode(",",$queStatDetail[$val]);
                    $correctAnsDetailStr .= implode(",",$correctAnsDetail[$val]);
                    $quesGivenDetailStr .= implode(",",$quesGivenDetail[$val]);
                }else{
                    $questIdStr .= ';['.implode(", ",$questIdArr[$val]).']';
                    //$bulkQuestIdStr .= ';['.implode(", ",$bulkQuestIdArr[$val]).']';
                    $quesTypeStr .= ';['.implode(", ",$quesTypeArr[$val]).']';
                    $quesConsmTimStr .= ';['.implode(", ",$quesTimeDetail[$val]).']';
                    $apearAnsStr .= ';['.implode(", ",$apearAnsArr[$val]).']';
                    $givenAnsStr .= ';['.implode(", ",$givenAnsArr[$val]).']';
                    $givenAnsMultiStr .= ';['.implode(", ",$givenAnsMultiArr[$val]).']';
                    $givenTextStr .= ';['.implode(", ",$givenTextArr[$val]).']';
                    $queStatDetailStr .= ';'.implode(",",$queStatDetail[$val]);
                    $correctAnsDetailStr .= ';'.implode(",",$correctAnsDetail[$val]);
                    $quesGivenDetailStr .= ';'.implode(",",$quesGivenDetail[$val]);
                }
                $r[] = $data;
            }
            /*** End ***/
            
            /*** following code is to make string of given answer form array according to section ***/
            $totalExamSecMarkstr = implode(",",$secTotMarkArray);
            $totalExamSecPlusMarkstr = implode(",",$secTotPlusMarkArray);
            $totalSecPlusMarkstr = implode(",",$secTotPlusMarkArray1);
            $totalExamSecMinusMarkstr = implode(",",$secTotMinusMarkArray);
            $totalExamEarnedMarkstr = implode(",",$secTotalEarnedMarkArr);
            $totalCorrectQuetr = implode(",",$sectionCorrect);
            $secpartialCorrectQuetr = implode(",",$partCorrQuestArr);
            $secWrongQuestr = implode(",",$sectionWrong);
            $secCorrectpartialMarkstr = implode(",",$partCorrMarkArr);
            $sectionIdStr = implode(",",$secIdArr);
            $sectionNameStr = implode(",",$secNameArr);
            $subAttemptTotStr = implode(",",$subAttemptTotArr);

           
            $resData = array(
                'RESULT_ID' => $resultId,
                'EXAM_TYPE_ID' => 1,
                'COURSE_ID' => $courseId,
                'SUBJECT_ID' => $subjectId,
                /*'BATCH_ID' => $batchId,*/
                'DYNAMIC_TEST_ID' => $examId,
                'STUDENT_ID' => $studentId,
                'TOPIC_ID' => $topicId,
				'STEP_ID' => $stepId,
                'ALL_QUESTION_IDS' => $questIdStr,
                'ALL_QUESTION_TYPE_IDS' => $quesTypeStr,
                'QUESTION_STATUS_DTL' => $queStatDetailStr,
                'QUESTION_CORRECT_DTL' => $correctAnsDetailStr,
                'QUESTION_GIVEN_DTL' => $quesGivenDetailStr,
                'APPEAR_ANSWER_OPTIONS' => $apearAnsStr,
                'APPEAR_QUESTION_TIME' => $quesConsmTimStr,
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
                'TOTAL_EXAM_MARKS' => $totalExamMark,
                'TOTAL_PLUS_MARKS' => $totalPlusMark,
                'TOTAL_MINUSE_MARKS' => $totalMinusMark,
                'TOTAL_MARKS' => $totalMark,
                'TOTAL_EXAM_MARKS_SECTION' => $totalExamSecMarkstr,
                'TOTAL_PLUS_MARKS_SECTION' => $totalSecPlusMarkstr,
                'TOTAL_MINUSE_MARKS_SECTION' => $totalExamSecMinusMarkstr,
                'TOTAL_MARKS_SECTION' => $totalExamEarnedMarkstr,
                'CORRECT_QUESTION_SECTION' => $totalCorrectQuetr,
                'PARTIAL_CORRECT_QUESTION_SECTION' => $secpartialCorrectQuetr,
                'WRONG_QUESTION_SECTION' => $secWrongQuestr,
                'CORRECT_PLUS_MARK_SECTION' => $totalExamSecPlusMarkstr,
                'CORRECT_PARTIAL_MARK_SECTION' => $secCorrectpartialMarkstr,
                'TIMESPENT' => $timeSpent,
                'TOTAL_DURATION' => $examDuration,
                'EXAM_SUBJECT_ID' => $sectionIdStr,
                'EXAM_SUBJECT_NAME' => $sectionNameStr,
                'EXAM_SUBJECT_ATTEMPT_TOTAL' => $subAttemptTotStr,
                'SEL_ACTIVITY' => 'ACTIVITY_DYNAMIC',
                'PLATFORM' => 'WEB',
                'CREATED_ON' => $createdOn
            );
            //print_r($values);exit;
            $sqlres = $this->db->query("SELECT count(*) as cnt FROM icad_student_result_dynamic_test_dtl WHERE STUDENT_ID = $studentId AND DYNAMIC_TEST_ID = $examId");
            $rowRes = $sqlres->getRowArray();
            $cnt = 0;
            if($rowRes){
            	$cnt = $rowRes['cnt'];
            }
            $existMessage = '';
            if($cnt == 0){
            	if($this->db->table('icad_student_result_dynamic_test_dtl')->insert($resData)){
					$stuUpdData['EXAM_COMPLETED'] = 'YES';
					$this->db->table('icad_dynamic_test_mst')->where('DYNAMIC_TEST_ID',$examId)->update($stuUpdData);
				}else{
					$existMessage = 'Not Inserted';
				}
            }else{
            	$existMessage = 'Exist';
            }
            $r1['data'] = $r;
            $r1['existMessage'] = $existMessage;
        }else{
            $r1['existMessage'] = 'Not Inserted';
        }
        print json_encode($r1);
    }
    public function dxresult($dtid){
    	/*if(!$this->session->has('icaduserid') ){
            return redirect()->to('/');
        }*/
        $data['tid'] = $dtid;
        return view('rewind/dxresult',$data);
    }

    public function viewdresult($id = '', $ttid = '')
    {
    	if(!$this->session->has('icaduserid') ){
            return redirect()->to('/');
        }
        $data['pagetitle'] = 'Rewind Test Result';
        $data['id'] = $ttid;
        $data['ttid'] = $id;
		$test = $this->rewindModel->testName($id);
		$data['test'] = $test['TEST_TITLE'];
        return view('rewind/viewdresult',$data);
    }

    /*public function fulltest_dresult_submit(){
       $txtdata = $_POST['txtdata'];
       $tid = $_POST['tid'];
       $sid = $_POST['userid'];
       $data['pagetitle'] = 'Tests';
       $data = $this->rewindModel->fulltest_dresult_submit($txtdata,$tid,$sid);
       return json_encode($data);
       exit;
    }*/
    
    public function submit_bdtest(){
        $userId = $this->session->get('icaduserid');
        $dataJson = $_POST['datatablejson'];
        $data = $this->rewindModel->submit_bdtest($userId,$dataJson);
        $DYNAMIC_TEST_ID = '';
		if($data != 0){
			$DYNAMIC_TEST_ID = $this->rewindModel->lastId();
		}
		$uid = $DYNAMIC_TEST_ID['DYNAMIC_TEST_ID'];
        return json_encode($uid);
        exit;
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

        $txtanstext=$data['QUESTION_DTL'].'<br/>';
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
                if($i == $correctAnswer){
                    $txtanstext .= '<span style="color:#00b085;">'.$alpha[$i].') '.$opt.'</span><br/>';
                }else{
                    $txtanstext .= $alpha[$i].') '.$opt.'<br/>';
                }
            }
        }else if($data['QUESTIONS_TYPE_ID'] == 2){
            for($i = 1; $i <= $numberOfOption; $i++){
                $optstr = 'ANSWER_OPTION_'.$i;
                $opt = str_replace("<p>","",$data[$optstr]); 
                $opt = str_replace("</p>","",$opt); 
                if(in_array($i,$correctAnswer)){
                    $txtanstext .= '<span style="color:#00b085;">'.$alpha[$i].') '.$opt.'</span><br/>';
                }else{
                    $txtanstext .= $alpha[$i].') '.$opt.'<br/>';
                }
            }
        }else{
            $txtanstext .= '<span style="color:#00b085;">'.$range1.'-'.$range2.'</span>';
        }
        return json_encode($txtanstext);
        exit;
    }

    public function deletedtest(){

        $userId = $this->session->get('icaduserid');
        $dtestid = $_POST['dtestid'];
        $data = $this->rewindModel->deletedtest($userId,$dtestid);
        return json_encode($data);
        exit;
    }

    public function getTopicBySubject(){
    	$userId = $this->session->get('icaduserid');
    	$courseId = $this->session->get('courseId');
    	$subid = $this->request->getPost('subId');
    	$topics = $this->rewindModel->topicsBySubject($userId, $courseId, $subid);
    	return json_encode($topics);
        exit; 
    }

    public function get_step_count_by_topics(){
    	$subject_id = $this->request->getPost('subject_id');
    	$topic_ids = $this->request->getPost('topic_ids');
    	$quesCounts = $this->rewindModel->step_count_by_topics($subject_id, $topic_ids);
    	return json_encode($quesCounts);
        exit; 
    }

    public function check_rewind_exist(){
    	$userId = $this->session->get('icaduserid');
    	$exam_title = $this->request->getPost('exam_title');
    	$checkStatus = $this->rewindModel->checkUniqueRewind($userId, $exam_title);
    	echo $checkStatus;
    	exit;
    }
}
