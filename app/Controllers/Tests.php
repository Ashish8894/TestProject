<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\TestModel;

class Tests extends BaseController
{
    public function __construct()
    {
        $this->testModel =  New TestModel();
    }
    public function index()
    {
        if(!$this->session->has('icaduserid') ){
            return redirect()->to('/');
        }
        $data['pagetitle'] = 'On Stream';
        return view('tests/index');
    }
    public function tests()
    {
        if(!$this->session->has('icaduserid') ){
            return redirect()->to('/');
        }
        $data['pagetitle'] = 'On Stream';
        return view('tests/tests',$data);
    }

    public function spark()
    {
        if(!$this->session->has('icaduserid')){
            return redirect()->to('/');
        }
        $data['pagetitle'] = 'Spark';
        return view('tests/spark',$data);
    }

     public function instruction($examid = ''){
        if(!$this->session->has('icaduserid') ){
            return redirect()->to('/');
        }
        if($examid == ''){
            return redirect()->to('/tests/tests');
        }
        $data['pagetitle'] = 'Instructions';
        $data['examid'] = $examid;
        return view('tests/instructions',$data);
    }
    public function viewresult($id = '', $ttid = '')
    {
        if(!$this->session->has('icaduserid') ){
            return redirect()->to('/');
        }
        if($id == '' || $ttid == ''){
            return redirect()->to('/tests/tests');
        }
        $data['pagetitle'] = 'On Stream';
        $data['id'] = $id;
        $data['ttid'] = $ttid;
        // print_r($data);die;
        return view('tests/viewresult',$data);
    }
    public function on_stream($examId = ''){
        if(!$this->session->has('icaduserid') ){
            return redirect()->to('/');
        }
        if($examId == ''){
            return redirect()->to('/tests/tests');
        }
        $data['examId'] = $examId;
        $data['userId'] = $this->session->get('icaduserid');
        return view('tests/exam_panel',$data);
    }
    public function list_full_test()
    {
        $data = array();
        if($this->session->has('icaduserid') ){
            $userid = $this->session->get('icaduserid');
            $data = $this->testModel->list_full_test($userid);
        }
        echo json_encode($data);
        exit;
    }

    public function err_onstream()
    {
        $data['pagetitle'] = 'On Stream';
        return view('tests/err_onstream',$data);
    }

    public function check_user_exam_status()
    {
        $data = array();
        if($this->session->has('icaduserid')){
            if ($this->request->getMethod() === 'post'){
                $userId = $this->session->get('icaduserid');
                $testid = $this->request->getPost('testid');
                $data = $this->testModel->check_user_exam_status($testid,$userId);
            }
        }
        echo json_encode($data);
        exit;
    }

    public function view_question()
    {
        $qid = $this->request->getPost('qid');
        $txtamid = $this->request->getPost('txtamid');
        $data = $this->testModel->view_question($qid,$txtamid);
        //print_r($data);die;
        echo json_encode($data);
        exit;
    }

   
    public function get_subject_list(){
        $data = array();
        if($this->session->has('icaduserid')){
            $userId = $this->session->get('icaduserid');
            $testid = $this->request->getPost('testid');
            $isSection = $this->request->getPost('is_section');
            $subIds = $this->request->getPost('subIds');

            $data = $this->testModel->getExamSubject($testid,$isSection,$subIds);
        }
        echo json_encode($data);
        exit;
    }
    public function live_questions(){
        $testid = $this->request->getPost('testid');
        $questions = $this->testModel->getExamQuestionByExam($testid);
        $r = array();
        foreach($questions as $rowtest){ 
            $queStr = $rowtest["question"];
            $queStr = str_replace("\begin{array}","\begin{array}{cc}",$queStr);
            $queStr = str_replace("\begin{array}{cc}{cc}","\begin{array}{cc}",$queStr);
            $rowtest["question"] = '<span style="font-weight:300;">'.$queStr.'</span>';

            $opt1 = $rowtest["option1"];
            $opt1 = str_replace("\begin{array}","\begin{array}{cc}",$opt1);
            $opt1 = str_replace("\begin{array}{cc}{cc}","\begin{array}{cc}",$opt1);

            $opt2 = $rowtest["option2"];
            $opt2 = str_replace("\begin{array}","\begin{array}{cc}",$opt2);
            $opt2 = str_replace("\begin{array}{cc}{cc}","\begin{array}{cc}",$opt2);

            $opt3 = $rowtest["option3"];
            $opt3 = str_replace("\begin{array}","\begin{array}{cc}",$opt3);
            $opt3 = str_replace("\begin{array}{cc}{cc}","\begin{array}{cc}",$opt3);

            $opt4 = $rowtest["option4"];
            $opt4 = str_replace("\begin{array}","\begin{array}{cc}",$opt4);
            $opt4 = str_replace("\begin{array}{cc}{cc}","\begin{array}{cc}",$opt4);

            $opt5 = $rowtest["option5"];
            $opt5 = str_replace("\begin{array}","\begin{array}{cc}",$opt5);
            $opt5 = str_replace("\begin{array}{cc}{cc}","\begin{array}{cc}",$opt5);

            $opt6 = $rowtest["option6"];
            $opt6 = str_replace("\begin{array}","\begin{array}{cc}",$opt6);
            $opt6 = str_replace("\begin{array}{cc}{cc}","\begin{array}{cc}",$opt6);

            $opt7 = $rowtest["option7"];
            $opt7 = str_replace("\begin{array}","\begin{array}{cc}",$opt7);
            $opt7 = str_replace("\begin{array}{cc}{cc}","\begin{array}{cc}",$opt7);

            $opt8 = $rowtest["option8"];
            $opt8 = str_replace("\begin{array}","\begin{array}{cc}",$opt8);
            $opt8 = str_replace("\begin{array}{cc}{cc}","\begin{array}{cc}",$opt8);

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
            if($rowtest['IS_CANCELED'] == 'YES'){
                $rowtest['status'] = 'X'; 
            }else{
                $rowtest['status'] = 'U'; 
            }
               
            $rowtest = array('color' => 'default') + $rowtest;  
            $r[] = $rowtest; 
        }
        echo json_encode($r);
        exit;
    }


    public function exam_start_status(){
        $userId = $this->session->get('icaduserid');
        $device = $this->request->getPost('device');
        $browser = $this->request->getPost('browser');
        $osName = $this->request->getPost('osName');
        $examEndDate = $this->request->getPost('examEndDate');
        $examDuration = $this->request->getPost('examDuration');
        $examId = $this->request->getPost('testid');

        /*** for check exam status ***/

        $device_ses_id = $this->session->get('device_ses_id');

        $rowtest = $this->testModel->getExamScheduleDetail($examId);
        $rowChtime = $this->testModel->getExamExtraTimeByUser($examId, $userId);
        $endExamTime = '';
        if($rowChtime){
            $endExamTime = $rowChtime['EXAM_END_TIME'];
        }

        $curTime = date('Y-m-d H:i:s');
        $status = 'success';
        $errmsg = '';
        $err_msg = '';
        $endDuration = '';
        $msg = 'Not Exist';
        if($rowtest['IS_EXAM_SCHEDULE'] == 'YES'){
            if(strtotime($rowtest['SCHEDULE_DATE']) > strtotime($curTime)){
                $status = 'error';
                $errmsg = '3';
                $err_msg = 'Your exam will starts on: '.date('d-m-Y H:i:s', strtotime($rowtest['SCHEDULE_DATE']));
            }
            if(!empty($rowtest['SCHEDULE_END_DATE']) && $rowtest['SCHEDULE_END_DATE'] != '0000-00-00 00:00:00'){
                $examScheduelEndTime = $rowtest['SCHEDULE_END_DATE'];
                if($endExamTime != '' && strtotime($rowtest['SCHEDULE_END_DATE']) < strtotime($endExamTime)){
                    $msg = 'Exist';
                    $examScheduelEndTime = $endExamTime;
                    $to_time = strtotime($examScheduelEndTime);
                    $from_time = strtotime(date('Y-m-d H:i:s'));
                    $endDuration = round(abs($to_time - $from_time) / 60,2);
                    $data['end_duration'] = $endDuration;
                }
                if(strtotime($examScheduelEndTime) < strtotime($curTime)){
                    $status = 'error';
                    $errmsg = '4';
                    $err_msg = 'Your exam has expired ';
                }
            }
        }
        if($status == 'success'){

            $row = $this->testModel->getExamAttemptStatus($examId, $userId);
            if($row){
                if($row['EXAM_STATUS'] == 'STARTED' && $row['DEVICE_ID'] == $device_ses_id){
                    $status = 'success';
                    $delSql = "DELETE FROM icad_os_exam_attempt_status WHERE OS_EXAM_ATTEMPT_ID = '".$row['OS_EXAM_ATTEMPT_ID']."'";
                    $res1 = $con->query_sel($delSql);
                }else{
                    if($row['EXAM_STATUS'] == 'COMPLETED'){
                        $status = 'error';
                        $errmsg = '1';
                    }else{
                        $status = 'error';
                        $errmsg = '2';
                    }
                }
            }
            
        }

        $data['status'] = $status;
        $data['msg'] = $errmsg;
        $data['err_msg'] = $err_msg;

        /*** End ***/
        if($status == 'success'){
            
            $data['message'] = $msg;
            
            $courseId = $this->session->get('courseId');
            //$device_ses_id = $_SERVER['HTTP_COOKIE'];
            $createdOn = date('Y-m-d H:i:s');
            $insData = array(
                'STUDENT_ID' => $userId,
                'COURSE_ID' => $courseId,
                'EXAM_TYPE' => 'ACTIVITY_ONSTREAM',
                'EXAM_ID' => $examId,
                'EXAM_START_TIME' => $createdOn,
                'EXAM_STATUS' => 'STARTED',
                'DEVICE_ID' => $device_ses_id,
                'PLATFORM' => 'WEB',
                'DEVICE' => $device,
                'BROWSER' => $browser,
                'OS_NAME' => $osName,
                'CREATED_ON' => $createdOn
            );
            $this->db->table('icad_os_exam_attempt_status')->insert($insData);
        }
        print json_encode($data);
    }
    public function err_exam_inprocess(){
        return view('tests/err_exam_inprocess');
    }

    public function err_exam_submited(){
        return view('tests/err_exam_submited');
    }
    public function err_exam_expired(){
        return view('tests/err-exam-expired');
    }
    public function err_exam_not_started(){
        return view('tests/err-exam-not-started');
    }
    public function xresult($examId){
        $data['examId'] = $examId;
        //$data['userId'] = $this->session->get('icaduserid');
        return view('tests/xresult',$data);
    }
    public function update_exam_attemp_status(){

        $status = $this->request->getPost('status');
        $exam_id = $this->request->getPost('exam_id');
        $student_id = $this->request->getPost('student_id');
        $upData['EXAM_START_STATUS'] = $status;
        $this->db->table('icad_os_exam_attempt_status')->where(['STUDENT_ID' => $student_id, 'EXAM_ID' => $exam_id])->update($upData);
        $r['msg'] = 'success';
        print json_encode($r);  
    }

    public function fulltest_result_dt_submit(){
        if($this->request->getMethod() === 'post'){
            $studentId = $this->request->getPost('sid');
            $examId = $this->request->getPost('tid');
            $stuDetails = $this->testModel->getUserById($studentId);
            $courseId = $stuDetails['COURSE_ID'];
            $batchId = $stuDetails['BATCH_ID'];

            $objx = json_decode($_POST['txtdata'],true);

            /*echo "<pre>";
            print_r($objx);*/
            
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
            //$studentId = $_REQUEST['sid'];
            $sqlExmDtl = $this->db->query("SELECT QUESTION_ATTEMPT_RESTRICTION_STATUS, IS_QUESTION_ATTEMPT_RESTRICTED, QUESTION_RESTRICTED_COUNT, SUBJECT_IDS, EXAM_DURATION FROM icad_exam_mst WHERE EXAM_ID = $examId");
            $exRow = $sqlExmDtl->getRowArray();
            
            $que_Res_arr = array();
            if($exRow['IS_QUESTION_ATTEMPT_RESTRICTED'] == 'YES'){
                if($exRow['QUESTION_ATTEMPT_RESTRICTION_STATUS'] == 'SECTIONWISE'){
                    $queSql = $this->db->query("SELECT count(*) as cnt, EXAM_SUBJECT_SECTION_ID FROM `icad_question_mst` WHERE EXAM_ID = $examId AND IS_DELETED = 'NO' AND IS_CANCELED = 'NO' GROUP BY EXAM_SUBJECT_SECTION_ID");
                    $queRow = $queSql->getResultArray();
                    foreach($queRow as $val){
                        $que_Res_arr[$val['EXAM_SUBJECT_SECTION_ID']] = $val['cnt'];
                    }
                }
            }

            /*** following code is for exam section array ***/
            $sqlsec = $this->db->query("SELECT EXAM_SUBJECT_SECTION_ID, SUBJECT_SECTION_NAME, QUESTION_RESTRICTED_COUNT FROM icad_exam_subject_section_mst WHERE EXAM_ID = $examId AND IS_DELETED = 'NO'");
            
            $secDetails = $sqlsec->getResultArray();
            $secarray = array();
            $secaIdrray = array();
            $secRestrictCntArr = array();
            
            foreach($secDetails as $rowres){ 
                $secarray[$rowres['EXAM_SUBJECT_SECTION_ID']] = $rowres['SUBJECT_SECTION_NAME'];
                $secaIdrray[$rowres['EXAM_SUBJECT_SECTION_ID']] = $rowres['EXAM_SUBJECT_SECTION_ID'];
                if($exRow['IS_QUESTION_ATTEMPT_RESTRICTED'] == 'YES'){
                    if($exRow['QUESTION_ATTEMPT_RESTRICTION_STATUS'] == 'SECTIONWISE'){
                        $secRestrictCntArr[$rowres['EXAM_SUBJECT_SECTION_ID']] = $rowres['QUESTION_RESTRICTED_COUNT'];
                        if(!$rowres['QUESTION_RESTRICTED_COUNT']){
                            if(isset($que_Res_arr[$rowres['EXAM_SUBJECT_SECTION_ID']])){
                                $secRestrictCntArr[$rowres['EXAM_SUBJECT_SECTION_ID']] = $que_Res_arr[$rowres['EXAM_SUBJECT_SECTION_ID']];
                            }
                        }
                    }
                }
            }
            /*print_r($secRestrictCntArr);
            exit;*/
            if($exRow['IS_QUESTION_ATTEMPT_RESTRICTED'] == 'YES'){
                if($exRow['QUESTION_ATTEMPT_RESTRICTION_STATUS'] == 'SUBJECTWISE'){
                    $subjectIds = explode(",",$exRow['SUBJECT_IDS']);
                    $restCntArr = explode(",",$exRow['QUESTION_RESTRICTED_COUNT']);
                    foreach($subjectIds as $k => $v){
                        $secRestrictCntArr[$v] = $restCntArr[$k];
                    }
                }
            }
            /*** End ***/
            
            
            /*** follwing code is for make resultId ***/
            $datestr = date('YmdHis');
            $rand = rand(100,999);
            $resultId = $datestr.$studentId.$rand;
            /*** End Result id logic***/
            $totalQuest = count($objx); //find total question of exam
            if($exRow['IS_QUESTION_ATTEMPT_RESTRICTED'] == 'YES'){
                if($secRestrictCntArr){
                    $totalQuest = array_sum($secRestrictCntArr);
                }
            }
            $createdOn = date('Y-m-d H:i:s');
            //$submitDate = date('d/m/Y');
            $submitDate = date('d/m/Y', strtotime($enddate));
            
            //$submitTime = $createdOn;
            $submitTime = $enddate;
            //$courseId = 0;
            $subjectId = 0;

            $examDuration = $exRow['EXAM_DURATION'];

            $topicId = 0;
            $stepId = 0;
            $lectureId = 0;
            $quesTypeArr = array(); //this is for make all question type
            $questIdArr = array(); //this is for make all question id array
            $bulkQuestIdArr = array(); //this is for make all question id array
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

            
            $totalSubQueCnt = 0; //this is for total subjective question count
            $totalSubMarks = 0; //this is for total subjective marks
            $secSubjectiveQue = array(); //this array is for total subjective question of array
            $secSubjectiveMarks = array(); //this array is for total subjective marks of array
            $correctSecSubQue = array(); //this array is for total subjective correct question of section
            $correctSecSubMarks = array(); // this array is for total subjective marks of section

            $totalObjQueCnt = 0;
            $totalObjMarks = 0;
            $secObjectiveQue = array();
            $secObjectiveMarks = array();
            $secObjPlusQue = array();
            $secObjPlusMark = array();
            $secObjMinusQue = array();
            $secObjMinusMark = array();

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
                /*** following code is for to make subject section array according to condition
                 * if section is not in exam then subject id is section id ****/
                //if($value['subject_section_id'] > 0){
                if(isset($secarray[$value['subject_section_id']])){
                    $sectionId = $value['subject_section_id'];
                    $sectionName = $secarray[$value['subject_section_id']];
                }else{
                    $sectionId = $value['subject_id'];
                    $sectionName = $value['subject'];
                }
                /*** End ***/
                $totalSecQues[$sectionId][] = 1;
                $totalExamMark = $totalExamMark + $value['max_mark'];
                $totalSecMark[$sectionId][] = $value['max_mark'];
                
                $oneQueMarkArr[$sectionId] = $value['max_mark'];
                if(!in_array($sectionId,$secIdArr)){
                    $secIdArr[] = $sectionId;
                    $secNameArr[$sectionId] = $sectionName;
                }
                $questIdArr[$sectionId][] = $value['question_id'];
                $bulkQuestIdArr[$sectionId][] = $value['BULK_QUESTION_ID'];
                $quesTypeArr[$sectionId][] = $value['question_type'];

                $quesTimeDetail[$sectionId][] = $value['time_consume'];

                /*** following code is for make all array according to question ***/
                if($value['question_type'] == 1){
                    $givenAnsMultiArr[$sectionId][] = '';
                    $givenTextArr[$sectionId][] = '';
                    //$correctAnsDetail[$sectionId][] = $value['CORRECT_ANSWER_OPTION'];
                    $correctAnsDetail[$sectionId][] = $singleAnswer[$value['question_id']];
                    if($exRow['IS_QUESTION_ATTEMPT_RESTRICTED'] == 'YES'){
                        if(isset($secObjectiveQue[$sectionId])){
                            if(count($secObjectiveQue[$sectionId]) < $secRestrictCntArr[$sectionId]){
                                $totalObjQueCnt++;
                                $totalObjMarks = $totalObjMarks + $value['max_mark'];
                                $secObjectiveQue[$sectionId][] = 1;
                                $secObjectiveMarks[$sectionId][] = $value['max_mark'];
                            }
                        }else{
                            $totalObjQueCnt++;
                            $totalObjMarks = $totalObjMarks + $value['max_mark'];
                            $secObjectiveQue[$sectionId][] = 1;
                            $secObjectiveMarks[$sectionId][] = $value['max_mark'];
                        }
                        
                    }else{
                        $totalObjQueCnt++;
                        $totalObjMarks = $totalObjMarks + $value['max_mark'];
                        $secObjectiveQue[$sectionId][] = 1;
                        $secObjectiveMarks[$sectionId][] = $value['max_mark'];
                    }
                    
                    //$data['answer'] = $value['CORRECT_ANSWER_OPTION'];
                    if(!isset($value['given_answer']) || $value['given_answer'] == ''){
                        $apearAnsArr[$sectionId][] = '-1';
                        $quesGivenDetail[$sectionId][] = '-1';
                        $givenAnsArr[$sectionId][] = '-1';
                        if($value['IS_CANCELED'] == 'YES'){
                            $queStatDetail[$sectionId][] = 'X';
                        }else{
                            $queStatDetail[$sectionId][] = 'U';
                        }
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
                    //$correctAnsDetail[$sectionId][] = $value['CORRECT_ANSWER_MULTIPLE'];
                    $correctAnsDetail[$sectionId][] = $multipleAnswer[$value['question_id']];

                    if($exRow['IS_QUESTION_ATTEMPT_RESTRICTED'] == 'YES'){
                        if(isset($secObjectiveQue[$sectionId])){
                            if(count($secObjectiveQue[$sectionId]) < $secRestrictCntArr[$sectionId]){
                                $totalObjQueCnt++;
                                $totalObjMarks = $totalObjMarks + $value['max_mark'];
                                $secObjectiveQue[$sectionId][] = 1;
                                $secObjectiveMarks[$sectionId][] = $value['max_mark'];
                            }
                        }else{
                            $totalObjQueCnt++;
                            $totalObjMarks = $totalObjMarks + $value['max_mark'];
                            $secObjectiveQue[$sectionId][] = 1;
                            $secObjectiveMarks[$sectionId][] = $value['max_mark'];
                        }
                    }else{
                        $totalObjQueCnt++;
                        $totalObjMarks = $totalObjMarks + $value['max_mark'];
                        $secObjectiveQue[$sectionId][] = 1;
                        $secObjectiveMarks[$sectionId][] = $value['max_mark'];
                    }

                    if(!isset($value['given_answer']) || $value['given_answer'] == ''){
                        $givenAnsMultiArr[$sectionId][] = '';
                        $quesGivenDetail[$sectionId][] = '';
                        //$queStatDetail[$sectionId][] = 'U';
                        if($value['IS_CANCELED'] == 'YES'){
                            $queStatDetail[$sectionId][] = 'X';
                        }else{
                            $queStatDetail[$sectionId][] = 'U';
                        }
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
                    if($exRow['IS_QUESTION_ATTEMPT_RESTRICTED'] == 'YES'){
                        if(isset($secSubjectiveQue[$sectionId])){
                            if(count($secSubjectiveQue[$sectionId]) < $secRestrictCntArr[$sectionId]){
                                $totalSubQueCnt++;
                                $totalSubMarks = $totalSubMarks + $value['max_mark'];
                                $secSubjectiveQue[$sectionId][] = 1;
                                $secSubjectiveMarks[$sectionId][] = $value['max_mark'];
                            }
                        }else{
                            $totalSubQueCnt++;
                            $totalSubMarks = $totalSubMarks + $value['max_mark'];
                            $secSubjectiveQue[$sectionId][] = 1;
                            $secSubjectiveMarks[$sectionId][] = $value['max_mark'];
                        }
                        
                    }else{
                        $totalSubQueCnt++;
                        $totalSubMarks = $totalSubMarks + $value['max_mark'];
                        $secSubjectiveQue[$sectionId][] = 1;
                        $secSubjectiveMarks[$sectionId][] = $value['max_mark'];
                    }
                    
                    //$correctAnsDetail[$sectionId][] = $value['range1']."-".$value['range2'];
                    $correctAnsDetail[$sectionId][] = $range1Arr[$value['question_id']]."-".$range2Arr[$value['question_id']];
                    
                    if(!isset($value['given_answer']) || $value['given_answer'] == ''){
                        $givenTextArr[$sectionId][] = '';
                        $quesGivenDetail[$sectionId][] = '';

                        //$queStatDetail[$sectionId][] = 'U';
                        if($value['IS_CANCELED'] == 'YES'){
                            $queStatDetail[$sectionId][] = 'X';
                        }else{
                            $queStatDetail[$sectionId][] = 'U';
                        }
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

                        $correctSecSubQue[$sectionId][] = 1;
                        $correctSecSubMarks[$sectionId][] = $value['max_mark'];
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
            $bulkQuestIdStr = '';
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

            $sectionObjQuest = array();
            $sectionTotObjMark = array();
            $sectionObjPlusQue = array();
            $sectionObjPlusMark = array();
            $sectionObjMinusQue = array();
            $sectionObjMinusMark = array();

            
            /*** following code is to make array section wise ***/
            foreach($secIdArr as $val){
                $secTotMark = 0;
                $secTotPlusMark = 0;
                $secTotMinusMark = 0;
                $secEarnedMark = 0;
                $secPartMark = 0;

                $secSubTotMark = 0;
                $secSubCorrectMark = 0;

                $secObjTotMark = 0;
                $secObjTotPlusMark = 0;
                $secObjTotMinusMark = 0;
                $data = array();
                if($exRow['IS_QUESTION_ATTEMPT_RESTRICTED'] == 'YES'){
                    $secTotMark = intval($secRestrictCntArr[$val]) * intval($oneQueMarkArr[$val]);
                }else{
                    if(isset($totalSecMark[$val])){
                        foreach($totalSecMark[$val] as $stm){
                            $secTotMark = $secTotMark + $stm;
                        }
                    }
                }
                
                if(isset($secSubjectiveMarks[$val])){
                    foreach($secSubjectiveMarks[$val] as $ssm){
                        $secSubTotMark = $secSubTotMark + $ssm;
                    }
                }

                if(isset($correctSecSubMarks[$val])){
                    foreach($correctSecSubMarks[$val] as $scm){
                        $secSubCorrectMark = $secSubCorrectMark + $scm;
                    }
                }

                /*** FOllowing code is for objective calculation ***/
                if(isset($secObjectiveMarks[$val])){
                    foreach($secObjectiveMarks[$val] as $som){
                        $secObjTotMark = $secObjTotMark + $som;
                    }
                }

                if(isset($secObjPlusMark[$val])){
                    foreach($secObjPlusMark[$val] as $sopm){
                        $secObjTotPlusMark = $secObjTotPlusMark + $sopm;
                    }
                }

                if(isset($secObjMinusMark[$val])){
                    foreach($secObjMinusMark[$val] as $somm){
                        $secObjTotMinusMark = $secObjTotMinusMark + $somm;
                    }
                }
                /*** End ***/
                $data['subTotalMark'] = $secTotMark;
                $data['subName'] = $secNameArr[$val];
                if($exRow['IS_QUESTION_ATTEMPT_RESTRICTED'] == 'YES'){
                    $data['secQuestion'] = $secRestrictCntArr[$val];
                    $data['restricted_quest'] = $secRestrictCntArr[$val];
                }else{
                    $data['secQuestion'] = count($totalSecQues[$val]);
                }
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
                //$secTotPlusMark = $secTotPlusMark + $secPartMark;
                //$secTotPlusMark = $secTotPlusMark;

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
                
                /*** Subjective type question array ***/
                if(isset($secSubjectiveQue[$val])){//subject question for individual section
                    $sectionSubQuest[] = count($secSubjectiveQue[$val]);
                }else{
                    $sectionSubQuest[] = 0;
                }
                if(isset($correctSecSubQue[$val])){//correct question for individual section
                    $sectionCorectSubQuest[] = count($correctSecSubQue[$val]);
                }else{
                    $sectionCorectSubQuest[] = 0;
                }
                /*** End ***/

                /*** Objective type question array***/
                if(isset($secObjectiveQue[$val])){//subject question for individual section
                    $sectionObjQuest[] = count($secObjectiveQue[$val]);
                }else{
                    $sectionObjQuest[] = 0;
                }
                if(isset($secObjPlusQue[$val])){//correct question for individual section
                    $sectionObjPlusQue[] = count($secObjPlusQue[$val]);
                }else{
                    $sectionObjPlusQue[] = 0;
                }
                if(isset($secObjMinusQue[$val])){//correct question for individual section
                    $sectionObjMinusQue[] = count($secObjMinusQue[$val]);
                }else{
                    $sectionObjMinusQue[] = 0;
                }
                /*** End ***/
                $secTotMarkArray[] = $secTotMark; //individual section total mark
                $secTotPlusMarkArray[] = $secTotPlusMark;//individual section plus marks
                $secTotPlusMarkArray1[] = $secTotPlusMark + $secPartMark;//individual section plus marks
                $secTotMinusMarkArray[] = $secTotMinusMark;//individual section minus marks
                $secTotalEarnedMarkArr[] = $secTotPlusMark - $secTotMinusMark + $secPartMark; //individual section earned marks
                $partCorrMarkArr[] = $secPartMark;

                $secTotSubjectiveMark[] = $secSubTotMark;
                $secCorrectSubjectiveMark[] = $secSubCorrectMark;

                $sectionTotObjMark[] = $secObjTotMark;
                $sectionObjPlusMark[] = $secObjTotPlusMark;
                $sectionObjMinusMark[] = $secObjTotMinusMark;

                if($exRow['IS_QUESTION_ATTEMPT_RESTRICTED'] == 'YES'){
                    if(isset($secAttQuestArr[$val])){//attempt question for individual section
                        $subAttemptTotArr[] = count($secAttQuestArr[$val]).'/'.$secRestrictCntArr[$val];
                    }else{
                        $subAttemptTotArr[] = '0/'.$secRestrictCntArr[$val];
                    }
                }else{
                    if(isset($secAttQuestArr[$val])){//attempt question for individual section
                        $subAttemptTotArr[] = count($secAttQuestArr[$val]).'/'.count($totalSecQues[$val]);
                    }else{
                        $subAttemptTotArr[] = '0/'.count($totalSecQues[$val]);
                    }
                }

                if(isset($secPartCorrectQuestArr[$val])){
                    $partCorrQuestArr[] = count($secPartCorrectQuestArr[$val]);
                    $data['partialCorrectQue'] = count($secPartCorrectQuestArr[$val]);
                }else{
                    $partCorrQuestArr[] = 0;
                    $data['partialCorrectQue'] = 0;
                }
                //$partCorrQuestArr[] = 0;


                
                //$allQuestIds = explode(", ",$questIdArr[$val]);
                $allQuestIds = $questIdArr[$val];
                
                //$allQuestTypeIds = explode(", ",$quesTypeArr[$val]);
                $allQuestTypeIds = $quesTypeArr[$val];

                $allQuesConsumeTimes = $quesTimeDetail[$val];

                //$statusArr = explode(",",$queStatDetail[$val]);
                $statusArr = $queStatDetail[$val];
                
                //$correctAnsDtlArr = explode(",",$correctAnsDetail[$val]);
                $correctAnsDtlArr = $correctAnsDetail[$val];
                //$givenAnsDtlArr = explode(",",$quesGivenDetail[$val]);
                $givenAnsDtlArr = $quesGivenDetail[$val];
                
                
                //$multiAnsArr = explode(", ",$givenAnsMultiArr[$val]);
                $multiAnsArr = $givenAnsMultiArr[$val];

                //$textAnsArr = explode(", ",$givenTextArr[$val]);
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
                    $bulkQuestIdStr .= '['.implode(", ",$bulkQuestIdArr[$val]).']';
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
                    $bulkQuestIdStr .= ';['.implode(", ",$bulkQuestIdArr[$val]).']';
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
            if($exRow['IS_QUESTION_ATTEMPT_RESTRICTED'] == 'YES'){
                $secTotMarkArray = array();
                foreach($secRestrictCntArr as $k => $val){
                    $secTotMarkArray[] = intval($val) * intval($oneQueMarkArr[$k]);
                }
                $totalExamMark = array_sum($secTotMarkArray);
            }

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

            $sectionSubQuestStr = implode(",",$sectionSubQuest);
            $sectionCorectSubQuestStr = implode(",",$sectionCorectSubQuest);
            $secTotSubjectiveMarkStr = implode(",",$secTotSubjectiveMark);
            $secCorrectSubjectiveMarkStr = implode(",",$secCorrectSubjectiveMark);

            $sectionObjQuestStr = implode(",",$sectionObjQuest);
            $sectionTotObjMarkStr = implode(",",$sectionTotObjMark);
            $sectionObjPlusQueStr = implode(",",$sectionObjPlusQue);
            $sectionObjPlusMarkStr = implode(",",$sectionObjPlusMark);
            $sectionObjMinusQueStr = implode(",",$sectionObjMinusQue);
            $sectionObjMinusMarkStr = implode(",",$sectionObjMinusMark);
            $rest_que_sec_count = implode(",",$secRestrictCntArr);
           

            $resData = array(
                'RESULT_ID' => $resultId,
                'EXAM_TYPE_ID' => 2,
                'COURSE_ID' => $courseId,
                'BATCH_ID' => $batchId,
                'EXAM_ID' => $examId,
                'STUDENT_ID' => $studentId,
                'ALL_QUESTION_IDS' => $questIdStr,
                'BULK_QUESTION_IDS' => $bulkQuestIdStr,
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
                'TOTAL_QUESTIONS' => trim($totalQuest),
                'ATTEMPTED_QUESTIONS' => trim($attempted),
                'TOTAL_CORRECT_ANSWER' => trim($correctAns),
                'TOTAL_WRONG_ANSWER' => trim($wrongAns),
                'TOTAL_UNATTEMPTED_QUE' => trim($totalUnattempted),
                'TOTAL_EXAM_MARKS' => trim($totalExamMark),
                'TOTAL_PLUS_MARKS' => trim($totalPlusMark),
                'TOTAL_MINUSE_MARKS' => trim($totalMinusMark),
                'TOTAL_MARKS' => trim($totalMark),
                'TOTAL_EXAM_MARKS_SECTION' => $totalExamSecMarkstr,
                'TOTAL_PLUS_MARKS_SECTION' => $totalSecPlusMarkstr,
                'TOTAL_MINUSE_MARKS_SECTION' => $totalExamSecMinusMarkstr,
                'TOTAL_MARKS_SECTION' => $totalExamEarnedMarkstr,
                'CORRECT_QUESTION_SECTION' => $totalCorrectQuetr,
                'PARTIAL_CORRECT_QUESTION_SECTION' => $secpartialCorrectQuetr,
                'WRONG_QUESTION_SECTION' => $secWrongQuestr,
                'CORRECT_PLUS_MARK_SECTION' => $totalExamSecPlusMarkstr,
                'CORRECT_PARTIAL_MARK_SECTION' => $secCorrectpartialMarkstr,
                'TOTAL_SUBJECTIVE_QUE' => $totalSubQueCnt,
                'TOTAL_SUBJECTIVE_MARKS' => $totalSubMarks,
                'SECTION_SUBJECTIVE_QUE' => $sectionSubQuestStr,
                'SECTION_SUBJECTIVE_MARKS' => $secTotSubjectiveMarkStr,
                'CORRECT_SECTION_SUBJECTIVE_QUE' => $sectionCorectSubQuestStr,
                'CORRECT_SECTION_SUBJECTIVE_MARKS' => $secCorrectSubjectiveMarkStr,
                'TOTAL_OBJECTIVE_QUE' => $totalObjQueCnt,
                'TOTAL_OBJECTIVE_MARKS' => $totalObjMarks,
                'SECTION_OBJECTIVE_QUE' => $sectionObjQuestStr,
                'SECTION_OBJECTIVE_MARKS' => $sectionTotObjMarkStr,
                'POSITIVE_SECTION_OBJECTIVE_QUE' => $sectionObjPlusQueStr,
                'POSITIVE_SECTION_OBJECTIVE_MARKS' => $sectionObjPlusMarkStr,
                'NEGATIVE_SECTION_OBJECTIVE_QUE' => $sectionObjMinusQueStr,
                'NEGATIVE_SECTION_OBJECTIVE_MARKS' => $sectionObjMinusMarkStr,
                'TIMESPENT' => $timeSpent,
                'TOTAL_DURATION' => $examDuration,
                'EXAM_SUBJECT_ID' => $sectionIdStr,
                'EXAM_SUBJECT_NAME' => $sectionNameStr,
                'EXAM_SUBJECT_ATTEMPT_TOTAL' => $subAttemptTotStr,
                'QUESTION_RESTRICTED_COUNT_SECTION' => $rest_que_sec_count,
                'SEL_ACTIVITY' => 'ACTIVITY_ONSTREAM',
                'PLATFORM' => 'WEB',
                'CREATED_ON' => $createdOn
            );
            //print_r($resData);exit;


            /*** folowing code is to check this exam already submitted or not ***/
            $sqlres = $this->db->query("SELECT count(*) as cnt FROM icad_student_result_os_dtl WHERE STUDENT_ID = $studentId AND EXAM_ID = $examId");
            $rowRes = $sqlres->getRowArray();
            /*** End ***/
            $existMessage = '';
            if($rowRes['cnt'] == 0){
                if($this->db->table('icad_student_result_os_dtl')->insert($resData)){
                    $upData['EXAM_STATUS'] = 'COMPLETED';
                    $upData['EXAM_END_TIME'] = $createdOn;
                    $this->db->table('icad_os_exam_attempt_status')->where(['STUDENT_ID' => $studentId, 'EXAM_ID' => $examId])->update($upData);
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
}
