<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\SrbModel;

class Srb extends BaseController
{
    public function __construct()
    {
        $this->userModel =  New UserModel();
        $this->srbModel =  New SrbModel();
    }

    public function index()
    {
        if(!$this->session->has('icaduserid') ){
            return redirect()->to('/');
        }
        $data['pagetitle'] = 'Analysis';
        return view('srb/cs-srb',$data);
    }

    public function list_videos(){
        $userid = $_POST['userid'];
        $data = $this->srbModel->list_videos($userid);
        echo json_encode($data);
        exit;
    }

    public function subjectWiseList($id){
        if(!$this->session->has('icaduserid') ){
            return redirect()->to('/');
        }
        // $data = $this->srbModel->list_videos($userid);
        $data['sid'] = $id;
        $data['pagetitle'] = 'Analysis';
        return view('srb/cs-srb2',$data);
    }

    public function topicWiseList($tid){
        if(!$this->session->has('icaduserid') ){
            return redirect()->to('/');
        }
        $data['tid'] = $tid;
        $data['pagetitle'] = 'Analysis';
        return view('srb/cs-srb3',$data);
    }
        
}
