<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\VideoModel;


class Video extends BaseController
{
    public function __construct(){
		$this->userModel = new UserModel();
        $this->videoModel = new VideoModel(); 
	}

    public function index(){
        if(!$this->session->has('icaduserid') ){
            return redirect()->to('/');
        }
        $data['list'] = $this->videoModel->list_stories();
        $data['pagetitle'] = 'Descover Stories';
        return view('video/video',$data);
    }

    public function storievideos($id){
        if(!$this->session->has('icaduserid') ){
            return redirect()->to('/');
        }
        $data['datalist'] = $this->videoModel->storievideos($id);
        $data['id'] = $id;
        $data['pagetitle'] = 'Descover Stories';
        return view('video/storievideos',$data);
    }

    public function videods($vid){
        if(!$this->session->has('icaduserid') ){
            return redirect()->to('/');
        }
        $data['datalist'] = $this->videoModel->videosdetails($vid);
        $data['vid'] = $data['datalist']['MOTIVATIONAL_VIDEO_ID'];
        $data['pagetitle'] = 'Descover Stories';
        return view('video/videods',$data);
    }
}
