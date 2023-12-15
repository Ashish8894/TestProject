<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\NoticeboardModel;

class Noticeboard extends BaseController
{
    public function __construct()
    {
        $this->noticeboardModel =  New NoticeboardModel();
    }

    public function index()
    {
        if(!$this->session->has('icaduserid') ){
            return redirect()->to('/');
        }
        $data['pagetitle'] = 'Noticeboard';
        return view('noticeboard/noticeboard',$data);
    }

    public function weekly_schedule(){

        if(!$this->session->has('icaduserid') ){
            return redirect()->to('/');
        }
        $userId = $_SESSION['icaduserid'];
        $data['detail'] = $this->noticeboardModel->weekly_schedule($userId);
        $data['pagetitle'] = 'Weekly Schedule';
        return view('noticeboard/weekly_schedule',$data);
    }

    public function test_schedule(){
        if(!$this->session->has('icaduserid') ){
            return redirect()->to('/');
        }
        $userId = $_SESSION['icaduserid'];
        $data['detail'] = $this->noticeboardModel->test_schedule($userId);
        $data['pagetitle'] = 'Test Schedule';
        return view('noticeboard/test_schedule',$data);
    }

    public function test_syllabus(){
        if(!$this->session->has('icaduserid') ){
            return redirect()->to('/');
        }
        $userId = $_SESSION['icaduserid'];
        $data['detail'] = $this->noticeboardModel->test_syllabus($userId);
        $data['pagetitle'] = 'Test Syllabus';
        return view('noticeboard/test_syllabus',$data);
    }

    public function event_schedule(){
        if(!$this->session->has('icaduserid') ){
            return redirect()->to('/');
        }
        $userId = $_SESSION['icaduserid'];
        $data = $this->noticeboardModel->event_schedule($userId);
        $data['pagetitle'] = 'Event Schedule';
        return view('noticeboard/event_schedule',$data);
    }

    public function loaddata($id){
        if(!$this->session->has('icaduserid') ){
            return redirect()->to('/');
        }
        $userId = $_SESSION['icaduserid'];
        $data['detail'] = $this->noticeboardModel->loaddata($id);
        $data['pagetitle'] = 'Event Schedule';
        return view('noticeboard/loaddata',$data);
    }
    
}
