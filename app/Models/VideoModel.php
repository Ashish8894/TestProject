<?php 
namespace App\Models;

use CodeIgniter\Model;

class VideoModel extends Model
{

    public function list_stories(){
        $sql = "SELECT m.MOTIVATIONAL_VIDEO_ID, m.MOTIVATIONAL_VIDEO_NAME FROM icad_motivational_video_dtl as md LEFT JOIN icad_motivational_video_mst as m ON md.MOTIVATIONAL_VIDEO_ID = m.MOTIVATIONAL_VIDEO_ID WHERE md.IS_DELETED = 'NO' AND md.STATUS = 'ENABLE' GROUP BY m.MOTIVATIONAL_VIDEO_ID ORDER BY md.MOTIVATIONAL_VIDEO_ID";
        $newSql = $this->db->query($sql);
        $data = $newSql->getResultArray();
        $r=array();
        foreach($data as $row){
            $r[]=$row;
        }		
        return $r;
    }

    public function storievideos($id){
        $sql = "SELECT * FROM icad_motivational_video_dtl WHERE IS_DELETED = 'NO' AND STATUS = 'ENABLE' AND MOTIVATIONAL_VIDEO_ID =:id: ORDER BY MOTIVATIONAL_VIDEO_ID";
        $newSql = $this->db->query($sql, [
            'id' => $id
        ]);
        $data = $newSql->getResultArray();
        $r=array();
        foreach($data as $row){
            $r[]=$row;
        }		
        return $r;
    }

    public function videosdetails($id){
        $sql = "SELECT MOTIVATIONAL_VIDEO_DTL_FILEPATH,MOTIVATIONAL_VIDEO_ID FROM icad_motivational_video_dtl WHERE IS_DELETED = 'NO' AND STATUS = 'ENABLE' AND MOTIVATIONAL_VIDEO_DTL_ID =:id: ORDER BY MOTIVATIONAL_VIDEO_ID";
        $newSql = $this->db->query($sql, [
            'id' => $id
        ]);
        $data = $newSql->getRowArray();
        return $data;
    }
    
}