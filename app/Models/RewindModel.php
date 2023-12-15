<?php 
namespace App\Models;

use CodeIgniter\Model;

class RewindModel extends Model
{
    protected $DBGroup              = 'default';
	protected $table                = 'icad_dynamic_test_mst';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDelete        = false;
	protected $protectFields        = true;
	protected $allowedFields        = ['DYNAMIC_TEST_ID', 'TEST_TITLE', 'TEST_DATE_TIME', 'COURSE_ID', 'SUBJECT_ID', 'CENTER_ID', 'BATCH_ID', 'STUDENT_ID', 'TOPIC_IDS', 'STEP_IDS', 'ALL_QUESTION_IDS', 'NUMBER_OF_QUESTIONS', 'TEST_DURATION', 'PASS_PERCENT', 'EXAM_COMPLETED', 'STATUS', 'IS_DELETED', 'CREATED_ON', 'LAST_MODIFIED'];

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
    public function getTest($id = false){
		if ($id === false)
	    {
	        return $this->where(['IS_DELETED' => 0])->findAll();
	    }

	    return $this->asArray() 
	                ->where(['id' => $id])
	                ->first();
	}

    public function student_ranking($userId){
        $rank=0;
        $count=0;
        $sql = "SELECT `user_id`,count(*) FROM `answer_master` WHERE `answer`=`given_answer` GROUP BY `user_id` ORDER BY count(*) DESC";
        $newSql = $this->db->query($sql, [
            'userId'     => $userId
        ]);
        $data = $newSql->getResultArray();
        foreach($data as $row){
            $count++;
            if($_REQUEST['txtuserid']==$row['user_id']){
                $rank=$count;
            }
        }
        $myObj = array();
        $myObj['ranking'] = $rank;
        $myObj['registration_type'] = "inquiry";
        return $myObj;
    }

    public function dyn_questions($userId,$testid){
        $sql = "SELECT * FROM icad_dynamic_test_mst WHERE DYNAMIC_TEST_ID = :testid: AND IS_DELETED = 'NO' AND STATUS = 'ENABLE'";
        $resexamdetails = $this->db->query($sql, [
            'testid'     => $testid
        ]);
        $rowed = $resexamdetails->getRowArray();

        $sql3 = "SELECT q.QUESTION_ID as question_id, q.QUESTION_DTL as question, q.NUMBER_OF_OPTIONS as number_of_options, q.QUESTIONS_TYPE_ID as question_type, q.ANSWER_OPTION_1 as option1, q.ANSWER_OPTION_2 as option2, q.ANSWER_OPTION_3 as option3, q.ANSWER_OPTION_4 as option4, q.ANSWER_OPTION_5 as option5, q.ANSWER_OPTION_6 as option6, q.ANSWER_OPTION_7 as option7, q.ANSWER_OPTION_8 as option8, c.INSTRUCTION as instructions, c.MAX_FULL_MARK as max_mark, c.PARTIAL_MARKS as partial_mark, c.NEGATIVE_MARKS as negative_mark, s.SUBJECT_ID as subject_id, s.SUBJECT_NAME as subject FROM icad_question_mst as q LEFT JOIN icad_exam_marks_dtl as c ON q.EXAM_MARKS_DTL_ID = c.EXAM_MARKS_DTL_ID LEFT JOIN icad_subject_mst as s ON q.SUBJECT_ID = s.SUBJECT_ID WHERE q.QUESTION_ID IN (".$rowed['ALL_QUESTION_IDS'].") AND q.IS_DELETED = 'NO' AND q.STATUS = 'ENABLE'";
        $sqltest = $this->db->query($sql3);
        $resque = $sqltest->getResultArray();
        return $resque;

    }

    public function list_dynamic_tests($userId){
        $sql = "SELECT * FROM icad_dynamic_test_mst WHERE STUDENT_ID= :userId: AND IS_DELETED = 'NO' AND STATUS = 'ENABLE' ORDER BY DYNAMIC_TEST_ID DESC";
        $newSql = $this->db->query($sql, [
            'userId'     => $userId
        ]);
        $data = $newSql->getResultArray();
        $r=array();
        foreach($data as $row){
            $r[]=$row;
        }
        return $r;
    }

    public function testName($id){
        $sql = "SELECT TEST_TITLE FROM icad_dynamic_test_mst WHERE DYNAMIC_TEST_ID = :id:";
        $newSql = $this->db->query($sql, [
            'id'     => $id
        ]);
        $data = $newSql->getRowArray();
        return $data;
    }

    public function view_question($id,$ans){
        $sql = "SELECT * FROM icad_question_mst WHERE QUESTION_ID = :id:";
        $newSql = $this->db->query($sql, [
            'id'     => $id
        ]);
        $data = $newSql->getRowArray();
		
    }
    
    public function getSubject($userId){
        $sql = "SELECT COURSE_ID FROM icad_student_mst WHERE IS_DELETED = 'NO' AND STATUS = 'ENABLE' AND STUDENT_ID = :userId:";
        $newSql = $this->db->query($sql, [
            'userId'     => $userId
        ]);
        $data = $newSql->getRowArray();
		$subids = $data['COURSE_ID'];

		$sqllist = "SELECT s.* FROM icad_course_subject_allocation as cs LEFT JOIN icad_subject_mst as s ON cs.SUBJECT_ID = s.SUBJECT_ID WHERE cs.COURSE_ID = $subids AND cs.IS_DELETED = 'NO' AND cs.STATUS = 'ENABLE' ORDER BY s.SEQUENCE";
		$newSql1 = $this->db->query($sqllist, [
            'userId'     => $userId
        ]);
        $data1 = $newSql1->getResultArray();
        return $data1;		
    }

    public function topicsBySubject($userId, $courseId, $subid){
        $sqllist = "SELECT TOPIC_ID, TOPIC_NAME FROM icad_topic_mst WHERE TOPIC_ID IN (SELECT TOPIC_ID FROM icad_student_topic_allocation WHERE STUDENT_ID = :userId: AND COURSE_ID = :courseId: AND SUBJECT_ID = :subid: AND IS_DELETED = 'NO' AND STATUS = 'ENABLE') AND IS_DELETED = 'NO' AND STATUS = 'ENABLE'";
        $newSql1 = $this->db->query($sqllist, [
            'userId'     => $userId,
            'courseId'   => $courseId,
            'subid'      => $subid
        ]);
        $data1 = $newSql1->getResultArray();
        return $data1;      
    }

    public function submit_bdtest($userId,$dataJson){
        $obj=json_decode($dataJson,true);
        $table = 'icad_dynamic_test_mst';
        $fields=array();
        $values=array();
        $i=0;
        foreach($obj as $x=>$y){
            if($x=="exam_title")
                $exam_title=$y;
            if($x=="subject_id")
                $subject_id=$y;
            if($x=="topic"){
                if(is_array($y)){
                    $topic=implode(',',$y);
                }else{
                    $topic=$y;
                }
            }
            if($x=="level"){
                if(is_array($y)){
                    $level=implode(',',$y);
                }else{
                    $level=$y;
                }
            }
            if($x=="step"){
                if(is_array($y)){
                    $step=implode(',',$y);
                }else{
                    $step=$y;
                }
            }
            if($x=="no_of_question")
                $no_of_question=$y;
            /*	if($x=="business_category")
                $business_category=$y;

            if($x=="ben_id")
                $ben_id=$y;
                */
            $fields[$i]= $x;
            if (is_array($y)) {
                $y=implode(",",$y);
            }
            $values[$i]=$y;
            $i++;
        }
        $data = array();
        $created=Date('Y-m-d H:i:s');
        $sqllist = "SELECT QUESTION_ID FROM `icad_question_mst` WHERE `TOPIC_ID` in (".$topic.") AND `STEP_ID` in (".$step.") order by rand() limit 0,".$no_of_question;
		$newSql1 = $this->db->query($sqllist);
        $data1 = $newSql1->getResultArray();
        if(count($data1) > 0){
                $no_of_question = count($data1);
                $quesIdArr = array();
                foreach($data1 as $row1){
                    $quesIdArr[] = $row1['QUESTION_ID'];
                }
                $queStr = implode(",",$quesIdArr);

                
                $sqllist3 = "SELECT COURSE_ID, CENTER_ID, BATCH_ID FROM icad_student_mst WHERE STUDENT_ID = :userId:";
                $newSql3 = $this->db->query($sqllist3, [
                    'userId'     => $userId
                ]);
                $data3 = $newSql3->getRowArray();

                $insSubs = array();
                $insSubs['TEST_TITLE'] = $exam_title;
                $insSubs['COURSE_ID'] = $data3['COURSE_ID'];
                $insSubs['SUBJECT_ID'] = $subject_id;
                $insSubs['CENTER_ID'] = $data3['CENTER_ID'];
                $insSubs['BATCH_ID'] =  $data3['BATCH_ID'];
                $insSubs['STUDENT_ID'] = $userId;
                $insSubs['TOPIC_IDS'] =  $topic;
                $insSubs['STEP_IDS'] = $step;
                $insSubs['ALL_QUESTION_IDS'] = $queStr;
                $insSubs['NUMBER_OF_QUESTIONS'] = $no_of_question;
                $insSubs['TEST_DURATION'] = $no_of_question*2;
                $insSubs['PASS_PERCENT'] = 50;
                $insSubs['CREATED_ON'] = $created;
                $result = $this->db->table('icad_dynamic_test_mst')->insert($insSubs);
                if($result){
                    $data = $result;
                }else{
                    $data = 0;
                }
            }
        return $data;
    }

    public function deletedtest($userId,$dtestid){
        $this->db->table('icad_dynamic_test_mst')->where(['STUDENT_ID' => $userId, 'DYNAMIC_TEST_ID' => $dtestid])->delete(); 
        $this->db->table('icad_student_result_dynamic_test_dtl')->where(['STUDENT_ID' => $userId, 'DYNAMIC_TEST_ID' => $dtestid])->delete(); 
        $msg = 'success';
        $data['msg'] = $msg;
		return $data;
    }

    public function lastId(){
        $sqllist = "SELECT DYNAMIC_TEST_ID FROM icad_student_result_dynamic_test_dtl WHERE IS_DELETED = 'NO' AND STATUS = 'ENABLE' ORDER BY LAST_MODIFIED DESC LIMIT 1";
		$newSql1 = $this->db->query($sqllist);
        $data1 = $newSql1->getRowArray();
        return $data1;
    }
    
    public function dxresult($dtid,$userId){
      $sqllist = "SELECT TOTAL_CORRECT_ANSWER,TOTAL_WRONG_ANSWER,TOTAL_UNATTEMPTED_QUE FROM icad_student_result_dynamic_test_dtl WHERE DYNAMIC_TEST_ID = $dtid AND STUDENT_ID = $userId  AND IS_DELETED = 'NO' AND STATUS = 'ENABLE'";
		 $newSql1 = $this->db->query($sqllist //, [
        //     'dtid'     => $dtid,
        //     'userId'     => $userId
        // ]
    );
        // echo $sqllist;die;
        $data1 = $newSql1->getRowArray();
        return $data1;
    }

    /*public function fulltest_dresult_submit($txtdata,$tid,$sid){
        $objx=json_decode($txtdata,true);
        $ra=0;
        $startdate = $objx[0]['startTime'];
        $dt = date('Y-m-d H:i:s', strtotime($startdate));
        $to_time = strtotime(date('Y-m-d H:i:s'));
        $from_time = strtotime($dt);
        //$timeSpent = round(abs($to_time - $from_time) / 3600); if find timespent in minut 
        $timeSpent = $to_time - $from_time;
        

        $studentId = $sid;
        $examId = $tid;

        $sql = "SELECT TEST_DURATION FROM icad_dynamic_test_mst WHERE DYNAMIC_TEST_ID = :examId:";
        $newSql = $this->db->query($sql, [
            'examId'     => $examId
        ]);
        $data = $newSql->getRowArray();
		$subids = $data['TEST_DURATION'];

        $datestr = date('YmdHis');

        $rand = rand(100,999);

        $resultId = $datestr.$studentId.$rand;
        $totalQuest = count($objx);
        $createdOn = date('Y-m-d H:i:s');
        $submitDate = date('d/m/Y');
        $submitTime = $createdOn;
        $totMarks = $totalQuest * 4;
    }*/
    
    public function step_count_by_topics($subjectId, $topic_ids){
        $sql = "SELECT STEP_ID, count(STEP_ID) as stepCount FROM `icad_question_mst` WHERE SUBJECT_ID = $subjectId AND TOPIC_ID IN (".$topic_ids.") AND IS_DELETED = 'NO' AND STATUS = 'ENABLE' AND STEP_ID > 0 GROUP BY SUBJECT_ID, STEP_ID";
        $newSql1 = $this->db->query($sql);
        $data1 = $newSql1->getResultArray();
        return $data1;
    }

    public function checkUniqueRewind($userId, $exam_title){
        $sql = "SELECT count(*) as cnt FROM icad_dynamic_test_mst WHERE STUDENT_ID = :userId: AND TEST_TITLE = :exam_title: AND IS_DELETED = 'NO' AND STATUS = 'ENABLE'";
        $newSql1 = $this->db->query($sql, [
            'userId'     => $userId,
            'exam_title'   => $exam_title
        ]);
        $data1 = $newSql1->getRowArray();
        $cnt = 0;
        if($data1){
            $cnt = $data1['cnt'];
        }
        return $cnt;
    }
}