<?php
class ShowGymPhases_ extends CI_Model{
    
    public function ajaxLoadPhases($roleid,$branchid){
        $this->db->where('A.PhaseStatus',"yes");
        $this->db->where('A.DeleteStatus',"no");
        $this->db->where('B.ShowToBranch',$branchid);
        $this->db->where('B.ShowToBranchRole',$roleid);
        $query = $this->db->select('*,A.SysID AS DetailsID,B.SysID AS sysID')
                ->from('masterdatagymphases as A')
                ->join('masterdatagymphasesshowto as B ',' A.SysID = B.masterdatagymphasesID','inner')
                ->get();
        if($query){
            if($query->num_rows() > 0){
                $result = array();
                foreach($query->result() as $x){
                    array_push($result,array(
                        'PhaseName'    =>  $x->PhaseName,
                        'sysID'    =>  $x->sysID,
                        'Description' => $x->Description,
                        'DocumentLink'   =>  $x->DocumentLink,
                        'HasSub'   =>  $x->HasSub,
                        'AddedDate'   =>  $x->AddedDate,
                        'SubPhases'   =>  $this->ajaxLoadSubPhases($roleid,$branchid,$x->DetailsID),
                        'BranchName' => $this->getbullenshowto_byid($x->DetailsID,"BranchName,B.SysID AS BranchID",$roleid,$branchid,"masterdatagymphasesshowto"),
                        'RoleName' => $this->getbullenshowto_byid($x->DetailsID,"RoleName,C.SysID AS roleID",$roleid,$branchid,"masterdatagymphasesshowto"),
                        'Access' => $this->getbullenshowto_byid($x->DetailsID,"BranchName,RoleName,C.SysID AS roleID,B.SysID AS BranchID",$roleid,$branchid,"masterdatagymphasesshowto")
                    ));
                }
                // $this->output->enable_profiler(TRUE);      
                return $result;
            }
        }
    }
    public function ajaxLoadSubPhases($roleid,$branchid,$id){
        $this->db->where('A.SubPhaseStatus',"yes");
        $this->db->where('A.DeleteStatus',"no");
        $this->db->where('A.maingymphaseID',$id);
        $this->db->where('B.ShowToBranch',$branchid);
        $this->db->where('B.ShowToBranchRole',$roleid);
        $query = $this->db->select('*,A.SysID AS DetailsID,B.SysID AS sysID')
                ->from('masterdatasubgymphases as A')
                ->join('masterdatasubgymphasesshowto as B ',' A.SysID = B.masterdatasubgymphasesID','inner')
                ->get();
        if($query){
            if($query->num_rows() > 0){
                $result = array();
                foreach($query->result() as $x){
                    array_push($result,array(
                        'PhaseName'    =>  $x->PhaseName,
                        'sysID'    =>  $x->sysID,
                        'Description' => $x->Description,
                        'Details' => $x->Details,
                        'DocumentLink'   =>  $x->DocumentLink,
                        'AddedDate'   =>  $x->AddedDate,
                        'BranchName' => $this->getbullenshowto_byid($x->DetailsID,"BranchName,B.SysID AS BranchID",$roleid,$branchid,"masterdatasubgymphasesshowto"),
                        'RoleName' => $this->getbullenshowto_byid($x->DetailsID,"RoleName,C.SysID AS roleID",$roleid,$branchid,"masterdatasubgymphasesshowto"),
                        'Access' => $this->getbullenshowto_byid($x->DetailsID,"BranchName,RoleName,C.SysID AS roleID,B.SysID AS BranchID",$roleid,$branchid,"masterdatasubgymphasesshowto")
                    ));
                }
                // $this->output->enable_profiler(TRUE);      
                return $result;
            }
        }
    }

    public function getbullenshowto_byid($SysID,$columnname,$roleid = NULL , $branchid= NULL , $table = null){
        $tableID = 'masterdatagymphasesID';
        $PhasesStatus = 'PhaseStatus';
        if($table=="masterdatasubgymphasesshowto"){
            $tableID = 'masterdatasubgymphasesID';
            $PhasesStatus = 'SubPhaseStatus';
        }
        if($SysID != NULL){
            $this->db->where('A.'.$tableID,$SysID);
        }
        if($roleid != NULL && $branchid != NULL){
            $this->db->where('A.ShowToBranch',$branchid);
            $this->db->where('A.ShowToBranchRole',$roleid);
        }
        $this->db->distinct();
        $this->db->where('A.'.$PhasesStatus,"yes");
        $this->db->where('A.DeleteStatus',"no");
        $query = $this->db->select($columnname)
                ->from($table.' AS A')
                ->join('branchdetails as B ',' B.SysID = A.ShowToBranch','inner')
                ->join('masterdatarole as C ',' C.SysID = A.ShowToBranchRole','inner')
                ->get();
        if($query){
            if($query->num_rows() > 0){
                return $query->result();
            }
        } 
    }
}