<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\NotificationsModel;

class Notifications extends BaseController
{
    public function __construct()
    {
        $this->notificationsModel =  New NotificationsModel();
    }

    public function index()
    {
    	if(!$this->session->has('icaduserid') ){
            return redirect()->to('/');
        }
        $data['pagetitle'] = 'Notifications';
        $userid = $_SESSION['icaduserid'];
        $data['notifications'] = $this->notificationsModel->notifications($userid);
        return view('notifications/notifications',$data);
    }
    
    public function notification_detail(){
		$data = array();
		$list = '';
		if ($this->request->getMethod() === 'post'){
			$id = $_POST["notificationid"];
			$notificationdata = $this->notificationsModel->getNotification($id);
        //    print_r($notificationdata);die;
			foreach($notificationdata as $val){
				$data['title'] = $val['PUSH_NOTIFICATION_DTL_TITLE'];
				// if(!empty($val['notification_image'])){
                //     $imgpath="http://localhost:8080/upload/";
                //     //$imgpath="https://www.icadjee.com/icadadmin/upload/";
				// 	$image = $imgpath.$val['notification_image'];
				// 	$path = base64_encode(file_get_contents($image));
				// 	$src = 'data: ' . mime_content_type($image) . ';base64,' . $path;
				// 	$list = '<html><div style="text-align: center;"><img src="'.$src.'" alt="'.$val['notification_image'].'" width="300" height="200" align="text:center"></div></html>';
				// }else{
				// 	$list = '';
				// }
				$data['desc'] = $list.'<p>'.$val['PUSH_NOTIFICATION_DTL_MESSAGE'].'</p>';
			}
		}
		$data['token'] = csrf_hash();
		echo json_encode($data);
	}
}
