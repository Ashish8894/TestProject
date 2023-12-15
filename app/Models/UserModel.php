<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'icad_student_mst';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDelete        = false;
	protected $protectFields        = true;
	protected $allowedFields        = ['COURSE_ID', 'ADMISSION_COURSE_ID', 'CENTER_ID', 'BATCH_ID', 'BATCH_ALLOCATION_DATE', 'STUDENT_ID', 'REGISTRATION_ID', 'REGISTRATION_NUMBER', 'ROLL_NUMBER', 'FIRST_NAME', 'MIDDLE_NAME', 'LAST_NAME', 'DOB', 'CAST_CATEGORY_ID', 'CONTACT', 'GENDER_ID', 'EMAIL', 'ADDRESS', 'LANDMARK', 'CITY', 'DISTRICT', 'STATE', 'AADHAR_NO', 'PINCODE', 'STANDARD_ID', 'USERNAME', 'PASSWORD', 'PASSWORD_CHANGED', 'PASSWORD_CHANGED_DATE', 'PROFILE_PHOTO', 'STUDENT_PHOTO_PATH', 'MEDIUM_OF_STUDY', 'SCHOOL_NAME', 'SCHOOL_ADDRESS', 'EDUCATION_BOARD_NAME', 'PREFER_OF_11STD_BOARD', 'REGISTRATION_FEE', 'FEES_ID', 'FEES_INSTALLMENT_ID', 'INSTALLMENT_1_AMOUNT', 'INSTALLMENT_2_AMOUNT', 'INSTALLMENT_3_AMOUNT', 'INSTALLMENT_4_AMOUNT', 'INSTALLMENT_5_AMOUNT', 'SCHOLARSHIP_DISCOUNT_ID', 'TOTAL_FEES_AFTER_SCHOLARSHIP', 'INSTALLMENT_1_AMOUNT_PAID_STATUS', 'INSTALLMENT_2_AMOUNT_PAID_STATUS', 'INSTALLMENT_3_AMOUNT_PAID_STATUS', 'INSTALLMENT_4_AMOUNT_PAID_STATUS', 'INSTALLMENT_5_AMOUNT_PAID_STATUS', 'INSTALLMENT_1_AMOUNT_PAID', 'INSTALLMENT_2_AMOUNT_PAID', 'INSTALLMENT_3_AMOUNT_PAID', 'INSTALLMENT_4_AMOUNT_PAID', 'INSTALLMENT_5_AMOUNT_PAID', 'INSTALLMENT_1_AMOUNT_PAID_DATE', 'INSTALLMENT_2_AMOUNT_PAID_DATE', 'INSTALLMENT_3_AMOUNT_PAID_DATE', 'INSTALLMENT_4_AMOUNT_PAID_DATE', 'INSTALLMENT_5_AMOUNT_PAID_DATE', 'STUDENT_REGISTRATION_DATE', 'TOTAL_AMOUNT_PAID', 'TOTAL_AMOUNT_BALANCE', 'APPROVAL_STATUS', 'APPROVAL_DATE', 'APPROVED_BY', 'ADMISSION_CANCEL', 'ADMISSION_CANCEL_REASON_ID', 'ADMISSION_CANCEL_REASON_OTHER', 'ADMISSION_CANCEL_DATE', 'ADMISSION_CANCEL_TIME', 'FATHER_PARENT_FIRST_NAME', 'FATHER_PARENT_MIDDLE_NAME', 'FATHER_PARENT_LAST_NAME', 'FATHER_PARENT_CONTACT', 'FATHER_PARENT_EMAIL', 'FATHER_PARENT_AGE', 'FATHER_PARENT_OCCUPATION', 'PARENT_USERNAME', 'PARENT_PASSWORD', 'PARENT_PASSWORD_CHANGED', 'PARENT_PASSWORD_CHANGED_DATE', 'MOTHER_CONTACT', 'MOTHER_FIRST_NAME', 'MOTHER_MIDDLE_NAME', 'MOTHER_LAST_NAME', 'MOTHER_EMAIL', 'MOTHER_AGE', 'MOTHER_OCCUPATION', 'PARENTS_TOTAL_ANNUAL_INCOME', 'STUDENT_LOGIN_ATTEMPTS', 'STUDENT_DEVICE_UNIQUE_ID', 'IS_ACTIVATED', 'IS_SUSPENDED', 'SUSPENDED_ON', 'FCM_REG_ID', 'IS_SYNC', 'EXPIRY_DATE', 'STATUS', 'REMARKS', 'DECODE_SUBJECT_STATUS', 'DECODE_TOPIC_STATUS', 'STRONGBOX_COURSE_SUBJECT_STATUS', 'STRONGBOX_TOPIC_STATUS', 'IS_DELETED', 'CREATED_ON', 'LAST_MODIFIED', 'APP_ID', 'IS_DEVICE_CHECK', 'SES_ID', 'registration_from', 'registration_type', 'gender', 'altcontact', 'std_standard', 'jee_reg_no', 'doadmin', 'course', 'admission', 'status_old', 'activation_flag', 'session_id', 'otp', 'device_id', 'app_version', 'app_login', 'status_active', 'BN_ID'];

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

	/*public function __construct(){
	    $this->request = \Config\Services::request();
	}*/

	public function getUsers($id = false){
		if ($id === false)
	    {
	        return $this->where(['is_deleted' => 0])->findAll();
	    }

	    return $this->asArray() 
	                ->where(['id' => $id])
	                ->first();
	}

	public function updateData($device_ses_id,$icaduserid){
		$sql = "UPDATE icad_student_mst SET SES_ID = :device_ses_id: WHERE STUDENT_ID = :icaduserid:";
        $newSql = $this->db->query($sql, [
            'device_ses_id'     => $device_ses_id,
            'icaduserid'		=> $icaduserid
        ]);
        $data = $newSql->getRowArray();
	}

	public function check_login($rollnumber) { 

		$sql = "SELECT * FROM icad_student_mst WHERE IS_DELETED = 'NO' AND STATUS = 'ENABLE' AND USERNAME = :rollnumber:";
        $newSql = $this->db->query($sql, [
            'rollnumber'     => $rollnumber
        ]);
        $data = $newSql->getRowArray();
        return $data;		
	} 

	public function saveLoginAttempt($data){
		$sql = "INSERT INTO icad_login_attempt (STUDENT_ID, DEVICE_ID, LOGIN_TIME,PLATFORM , DEVICE, BROWSER, OS_NAME, USER_ROLE, IP_ADDRESS) VALUES ('$data[STUDENT_ID]', '$data[DEVICE_ID]', '$data[LOGIN_TIME]', '$data[PLATFORM]', '$data[DEVICE]', '$data[BROWSER]', '$data[OS_NAME]', '$data[USER_ROLE]', '$data[IP_ADDRESS]')";
        // $newSql = $this->db->query($sql);
		return $this->db->query($sql);	
	}

	public function check_password($id){
		$userId= $_SESSION['icaduserid'];
		$sql = "SELECT STUDENT_ID,USERNAME, PASSWORD from icad_student_mst WHERE STUDENT_ID = :userId: AND IS_DELETED = 'NO'";
        $newSql = $this->db->query($sql, [
            'userId'     => $userId
        ]);
        $data = $newSql->getRowArray();
		return $data;						
	}

	public function update_password($newpassword,$Id){
		$sql = "UPDATE icad_student_mst SET `PASSWORD`= :newpassword: where STUDENT_ID= :Id: AND IS_DELETED = 'NO'";
        $newSql = $this->db->query($sql, [
            'newpassword'     => $newpassword,
			'Id'			  => $Id
        ]);
		if($newSql){
			return true;
		}else{
			return false;
		}

	}
}