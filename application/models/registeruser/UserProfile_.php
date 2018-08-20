<?php
class UserProfile_ extends CI_Model{
    
    public function getPhoto($id = NULL){
        $this->db->where('SysID',$id);
        $query = $this->db->get('gymmainlogin')->row();
        if($query){
            $photo = $query->UserPhoto;
            if($photo){
                return $query->UserPhoto; 
            }else{
                return 'profile.png';
            }
            
        }else{
            return 'profile.png';
        }
    }
    
    
    public function userInfo($id){
        $query = $this->db->select("A.*,B.RoleName,C.Positionname,D.*,A.SysID AS loginSysID,D.SysID AS branchSysID,'NULL' AS Password")
                ->from('gymmainlogin as A')
                ->join('masterdatarole as B','B.SysID = A.	MasterDataRoleID','INNER')
                ->join('masterdataposition as C','C.SysID = A.PositionID','INNER')
                ->join('branchdetails as D','D.SysID = A.BranchDetailsID','INNER')
                ->where('A.SysID',$id)
                ->get();
                
        if($query){
            return $query->result_array();
        }else{
            return FALSE;
        }
    }
    // public function AjaxLoadBranch($id){


    //     $query = $this->db->select('A.*,B.RoleName,C.Positionname,D.*,A.SysID AS loginSysID,D.SysID AS branchSysID')
    //             ->from('gymmainlogin as A')
    //             ->join('masterdatarole as B','B.SysID = A.	MasterDataRoleID','left')
    //             ->join('masterdataposition as C','C.SysID = A.PositionID','left')
    //             ->join('branchdetails as D','D.SysID = A.BranchDetailsID','left')
    //             ->where('A.SysID',$id)
    //             ->get();
                
    //     if($query){
    //         return $query->row();
    //     }else{
    //         return FALSE;
    //     }
    // }
}

