<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\VideoModel;


class Telegenic extends BaseController
{
    public function __construct(){
		$this->userModel = new UserModel();
        $this->videoModel = new VideoModel(); 
	}

    public function index(){
        if(!$this->session->has('icaduserid') ){
            return redirect()->to('/');
        }
        $data['pagetitle'] = 'Telegenic';
        return view('telegenic/telegenic',$data);
    }

}
