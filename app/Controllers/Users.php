<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\UserModel;

class Users extends BaseController
{
	public function __construct(){
		$this->userModel = new UserModel(); 
	}
	
	public function index(){
		if($this->session->has('icaduserid')){
			return redirect()->to('/users/dashboard'); 
		}
        return view('login');
    }

	public function login_after_confirm(){
		$msg = '';
		//$device_ses_id = $_SERVER['HTTP_COOKIE'];
		if(!$this->session->has('temp_data')){
			$msg = 'error';
		}else{
			$sesData = $this->session->get('temp_data');
			//print_r($sesData);
			$data['device_ses_id'] = $sesData['device_ses_id'];
			$userId = $sesData['icaduserid'];
			$data['icaduserid'] = $userId;
			$data['courseId'] = $sesData['courseId'];
			$this->session->set($data);
			$this->session->remove('temp_data');
			$msg = 'success';
			$udata['SES_ID'] = $sesData['device_ses_id'];
			$this->db->table('icad_student_mst')->where('STUDENT_ID', $userId)->update($udata);
			$Ndata = $this->callAttemptLogin($userId,$sesData['device_ses_id']);
		}
		$sendData['token'] = csrf_hash();
		$sendData['msg'] = $msg;
		echo json_encode($sendData);
		exit;
	}

	public function check_login(){
		if($this->request->getPost()){

			$data = $this->request->getPost();	
			//print_r($data);exit;		
		 	$username = trim($data['USERNAME']);
			$pass = trim($data['PASSWORD']);
			$user = $this->userModel->check_login($username);
			
			if($user){
				$needle   = 'proton.me';
				if(strpos($user['ROLL_NUMBER'], $needle) !== false){
					$this->session->setFlashdata('login_error', 'Invalid user.');
					return redirect()->to('/');
				}
			}
			$loginExist = 0;
			$appLoggedIn = 0;
			$device_ses_id = '';
			$status = 0;
			if(isset($_SERVER['HTTP_COOKIE'])){
				//$device_ses_id = $_SERVER['HTTP_COOKIE'];
				$deviceStr = $_SERVER['HTTP_COOKIE'];
				$deviceArr = explode(";",$deviceStr);
				$str = 'ci_session=';
				foreach($deviceArr as $key => $val){
					if (strpos($val, $str) !== false) { // Yoshi version
				        $dvArr = explode('ci_session=',$deviceArr[$key]);
				        $device_ses_id = $dvArr[1];
				    }
				}
				if($device_ses_id == ''){
					$device_ses_id = $this->generateRandomString(32);
				}
				
			}else{
				$device_ses_id = $this->generateRandomString(32);
			}

			if($user){
				$hash = $user['PASSWORD'];
				//if(password_verify($pass, $hash)) {
				if($pass == $hash) {
					
					if($user['APP_ID']){
						$appLoggedIn = 1;
					}else{

						if($user['SES_ID']){
							$loginExist = 1;
						}
					}
					$crData = [
						'icaduserid' => $user['STUDENT_ID'],
						'courseId' => $user['COURSE_ID'],
						'device_ses_id' => $device_ses_id
					];
					if($appLoggedIn == 1){
						$this->session->setFlashdata('app_login_error', 'You are logged in with Mobile app. If you want to login here then first logout from App.');
						return redirect()->to('/');
					}else if($loginExist == 1){
						//echo 'Here';exit;
						//$senData['icaduserid'] = $user['STUDENT_ID'];
						$tempData['temp_data'] = $crData;
						$this->session->set($tempData);
						$this->session->setFlashdata('login_exist_error', 'You are logged in with other device. If you want to login here then press continue');
						return redirect()->to('/');
					}else{
						//$crData['device_session_id'] = $device_ses_id;
						$this->session->set($crData);
						$udata['SES_ID'] = $device_ses_id;
						$udata['app_login'] = 0;
						$this->db->table('icad_student_mst')->where('STUDENT_ID', $user['STUDENT_ID'])->update($udata);
						$Ndata = $this->callAttemptLogin($user['STUDENT_ID'],$device_ses_id);
						return redirect()->to('/users/dashboard');
					}
				}else{
					$this->session->setFlashdata('login_error', 'Invalid User credentials.');
					return redirect()->to('/');
					
				}
			}else{
				$this->session->setFlashdata('login_error', 'Invalid User credentials.');
				return redirect()->to('/');
			}
			return view('dashboard');
		}
	}

	public function callAttemptLogin($userId, $device_ses_id){
		/*$device_ses_id = '';
		if(isset($_SERVER['HTTP_COOKIE'])){
			$device_ses_id = $_SERVER['HTTP_COOKIE'];
		}*/
		$agent = $this->request->getUserAgent();
		
		if ($agent->isBrowser()) {
		    $currentAgent = $agent->getBrowser() . ' ' . $agent->getVersion();
		}elseif ($agent->isRobot()) {
		    $currentAgent = $agent->getRobot();
		}elseif ($agent->isMobile()) {
		    $currentAgent = $agent->getMobile();
		}else {
		    $currentAgent = 'Unidentified User Agent';
		}

		$device = 'Desktop';
		if ($agent->isMobile('iphone')) {
		    $device = 'Iphone';
		} elseif ($agent->isMobile()) {
		    $device = 'Mobile';
		} else {
		    $device = 'Desktop';
		}
		$localIP = getIPAddress();
		
		$osname =  $agent->getPlatform(); // Platform info (Windows, Linux, Mac, etc.)
		$logindata = array();
		$logindata = array(
			'STUDENT_ID' => $userId,
			'DEVICE_ID' => $device_ses_id,
			'LOGIN_TIME' => date('Y-m-d H:i:s'),
			'PLATFORM' => 'WEB',
			'DEVICE' => $device,
			'BROWSER' => $currentAgent,
			'OS_NAME' => $osname,
			'USER_ROLE' => 'S',
			'IP_ADDRESS' => $localIP
		);
		$this->userModel->saveLoginAttempt($logindata);
	}

	public function dashboard(){
		$data['pagetitle'] = 'Dashboard';
		return view('dashboard',$data);
	}

	public function profile(){
		if(!$this->session->has('icaduserid') ){
            return redirect()->to('/');
        }
		$data['pagetitle'] = 'Profile';
		$sql = 'SELECT ism.*,ibm.BATCH_NAME,icm.COURSE_NAME,icem.NAME,igm.DESCRIPTION from icad_student_mst as ism LEFT JOIN icad_batches_mst as ibm ON ism.BATCH_ID = ibm.BATCH_ID LEFT JOIN icad_course_mst as icm ON ism.COURSE_ID = icm.COURSE_ID LEFT JOIN icad_center_mst as icem ON ism.CENTER_ID = icem.CENTER_ID LEFT JOIN icad_gender_mst as igm ON igm.GENDER_ID = ism.GENDER_ID WHERE ism.STUDENT_ID  = :icaduserid:';
		$ures = $this->db->query($sql,[
			'icaduserid' => $_SESSION['icaduserid']
		]);
		$urow = $ures->getRowArray();
		$data['usernamex'] = $urow['FIRST_NAME']." ".$urow['LAST_NAME'];
		$data['rno'] = $urow['ROLL_NUMBER'];
		$data['batch'] = $urow['BATCH_NAME'] ? $urow['BATCH_NAME'] : '';
		$data['course'] = $urow['COURSE_NAME'] ? $urow['COURSE_NAME'] : '';
		// $photo = $urow['PROFILE_PHOTO'] ? $urow['PROFILE_PHOTO'] : '';
		$data['contact'] = $urow['CONTACT'] ? $urow['CONTACT'] : '';
		$data['center'] = $urow['NAME'] ? $urow['NAME'] : '';
		$data['email'] = $urow['EMAIL'] ? $urow['EMAIL'] : '';
		$gender = $urow['DESCRIPTION'] ? $urow['DESCRIPTION'] : '';
		$data['sesId'] = $urow['SES_ID'] ? $urow['SES_ID'] : '';
		if($gender == "FEMALE"){
			$data['photo']= base_url().'images/female.png';
		}else{
			$data['photo'] = base_url().'images/male.png';
		}
		return view('users/profile',$data);
	}

	public function logout() {
		
		if($this->session->has('icaduserid')){
			$userId = $this->session->get('icaduserid');
			$deviceSesId = $this->session->get('device_session_id');
			$attData['logout_time'] = date('Y-m-d H:i:s');
			$attData['session_status'] = 'login';
			//$this->db->table('login_attempt')->where('device_id', $deviceSesId)->update($attData);
			$data['SES_ID'] = null;
			$this->db->table('icad_student_mst')->where('STUDENT_ID', $userId)->update($data);
			$this->session->destroy();
		}
		return redirect()->to("/");
	}

	public function check_other_device(){
		$errmsg = '';
		if($this->session->has('icaduserid')){
			$userId = $this->session->get('icaduserid');
			//$device_ses_id = $_SERVER['HTTP_COOKIE'];
			$device_ses_id = $this->session->get('device_ses_id');
			$sql = $this->db->query("SELECT SES_ID FROM icad_student_mst WHERE STUDENT_ID = $userId");
			$res = $sql->getRowArray();
			if($res['SES_ID'] != $device_ses_id){
				$errmsg = 1;
			}
		}else{
			$errmsg = 1;
		}
		if($errmsg == 1){
			$this->session->destroy();
		}
		$r['msg'] = $errmsg;
		echo json_encode($r);
        exit;
	}

	public function change_password(){
		$data['pagetitle'] = 'Change Password';
		if(!$this->session->has('icaduserid')){
			return redirect()->to('users/profile');
		}else{
			$userId = $this->session->get('user_id');
			return view('/users/change_password',$data);
		}
	}

	public function change_password_save(){
		if($this->request->getMethod() === 'post'){
			$id = $this->session->get('user_id');
			$userPassword = $_POST['new_password'];
			$user = $this->userModel->check_password($id);
			$rules=[
				'old_password' => 'required',
				'new_password' => 'required|min_length[6]|max_length[16]',
				'confirm_password' => 'required|min_length[6]|max_length[16]|matches[new_password]',
			];
			if($this->validate($rules)){
				$old_password = $this->request->getVar('old_password');
				$new_password = $this->request->getVar('new_password');
				if($old_password != $userPassword){
					if($old_password == $user['PASSWORD']){
						if($user = $this->userModel->update_password($new_password,$_SESSION['icaduserid'])){
							$this->session->setFlashdata('success','password update Successfully.');
							return redirect()->to(current_url());
						}else{
							$this->session->setFlashdata('error','Sorry, Unable to update password,try again.');
							return redirect()->to(current_url());
						}
					}else{
						$this->session->setFlashdata('error','Wrong old password.');
						return redirect()->to(current_url());
					}	
				}else{
					$this->session->setFlashdata('error','old password same as new password.');
					return redirect()->to(current_url());
				}
			}else{
				$data['validation'] = $this->validator;
			}
			return redirect()->to('/users/profile');
		}	
		$data['token'] = csrf_hash();
		return view('/users/change_password',$data);	 
	}
	public function generateRandomString($length = 20) {
        $characters = '0123456789abcdefghijkmnopqrstuvwxyzABCDEFGHJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}