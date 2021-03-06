<?php
class GymResourcesMarketing_ extends CI_Model{
    

    public function loadBranch($id){

        $isuserfrommain = $this->selectBranches($id);

        if($isuserfrommain == "franchise"){
            // $this->db->where('A.SysID',$id);
            $this->db->where('A.BranchType',$isuserfrommain);
        }
        $this->db->where('BranchStatus','yes');
        $this->db->where('DeleteStatus','no');
        $query = $this->db->select('A.*')
                ->from('branchdetails as A')
                ->get();
                // print_r($query->result());die();
        if($query){
            if($query->num_rows() > 0){
                return $query->result();
            }
        }
    }
    public function selectBranches($id){
        // $this->db->where('A.BranchType',"main");
        $this->db->where('B.SysID',$id);
        $this->db->where('A.BranchStatus','yes');
        $this->db->where('A.DeleteStatus','no');
        $query = $this->db->select('A.BranchType')
                ->from('branchdetails as A')
                ->join('gymmainlogin as B','B.BranchDetailsID = A.SysID','inner')
                ->get();
        if ($query){
            return $query->row()->BranchType;
        }else{
            return FALSE;
        }
    }
    public function loadBranchRoles($id){
        $rolenames = array();
        if(!empty($id)){
            $roleID = $this->distinctBranchRole($id);
            
            for($x = 0; $x < COUNT($roleID); $x++){
                $res = $this->selectRoleNames($roleID[$x]->MasterDataRoleID);
                $rolenames[] = array("SysID"=>$res->SysID,"RoleName"=>$res->RoleName);
            }
        }
        
        // print_r($rolenames);
        return $rolenames;
    }
    public function selectRoleNames($MasterDataRoleID){
        $this->db->where('SysID',$MasterDataRoleID);
        $this->db->where('RoleStatus','yes');
        $this->db->where('DeleteStatus','no');    
        $query = $this->db->select('SysID,RoleName')
                ->from('masterdatarole')
                ->get();
        if($query){
            if($query->num_rows() > 0){
                return $query->row();
            }
        }
    }
    public function distinctBranchRole($id){
        if(!in_array("*", $id)){
            $this->db->where_in('BranchDetailsID',$id);
        }

        $this->db->distinct();
        $this->db->where('LoginStatus','yes');
        $this->db->where('DeleteStatus','no');
        $query = $this->db->select('MasterDataRoleID')
                ->from('gymmainlogin')
                ->get();
        if($query){
            // print_r($id);
            // echo $this->db->last_query();
            if($query->num_rows() > 0){
                
                return $query->result();
            }
        }
    }
    public function loadGymResourcesMarketing(){
        $this->db->where('ResourcesMarketingStatus',"yes");
        $this->db->where('DeleteStatus',"no");      
        $query = $this->db->select('*')
                ->from('gymresourcesmarketing')
                ->get();
          
        if($query){
            if($query->num_rows() > 0){
                $result = array();
                foreach($query->result() as $x){
                    array_push($result,array(
                        'SysID'    =>  $x->SysID,
                        'ResourcesMarketingName' => $x->ResourcesMarketingName,
                        'Description'   =>  $x->Description,
                        'DocumentLink'   =>  $x->DocumentLink,
                        'DisplayOrderIndex'   =>  $x->DisplayOrderIndex,
                        'AddedDate'   =>  $x->AddedDate,
                        'ResourcesMarketingStatus'   =>  $x->ResourcesMarketingStatus,
                        'DeleteStatus'   =>  $x->DeleteStatus,
                        'QueryInformation'   =>  $x->QueryInformation,
                        'BranchName' => $this->getbullenshowto_byid($x->SysID,"BranchName,B.SysID AS BranchID"),
                        'RoleName' => $this->getbullenshowto_byid($x->SysID,"RoleName,C.SysID AS roleID")
                    ));
                }
                return $result;
            }
        }
    }
    public function getbullenshowto_byid($SysID,$columnname,$roleid = NULL , $branchid= NULL ){
        if($SysID != NULL){
            $this->db->where('A.gymresourcesmarketingID',$SysID);
        }
        if($roleid != NULL && $branchid != NULL){
            $this->db->where('A.ShowToBranch',$branchid);
            $this->db->where('A.ShowToBranchRole',$roleid);
        }
        $this->db->distinct();
        $this->db->where('A.ResourcesMarketingStatus',"yes");
        $this->db->where('A.DeleteStatus',"no");
        $query = $this->db->select($columnname)
                ->from('gymresourcesmarketingshowto AS A')
                ->join('branchdetails as B ',' B.SysID = A.ShowToBranch','inner')
                ->join('masterdatarole as C ',' C.SysID = A.ShowToBranchRole','inner')
                ->get();
                // $this->output->enable_profiler(TRUE);
                
                
                // die();
        if($query){
            if($query->num_rows() > 0){
                return $query->result();
            }
        } 
    }

    public function addGymResourcesMarketing($details,$mapping){
        $this->db->trans_start();
        $this->db->insert('gymresourcesmarketing',$details);
        $last_id = $this->db->insert_id();
        $tmp = array();
        foreach($mapping AS $key=>$val){
            $mapping[$key]['gymresourcesmarketingID'] = $last_id;
        }
        // print_r($mapping);
        $this->db->insert_batch('gymresourcesmarketingshowto',$mapping);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE){
            return FALSE;
        }else{
            return TRUE;
        }
        // $query = $this->db->insert('masterdatagymphases',$data_array);
        // if ($query){
        //     return TRUE;
        // }
    }
    public function updateGymResourcesMarketing($details,$mapping,$id){
        $this->db->trans_start();

        $this->db->where('SysID',$id);
        $this->db->update('gymresourcesmarketing',$details); 
        foreach($mapping AS $key=>$val){
            $mapping[$key]['gymresourcesmarketingID'] = $id;
        }
        $this->db->where('gymresourcesmarketingID',$id);
        $this->db->delete('gymresourcesmarketingshowto');
        $this->db->insert_batch('gymresourcesmarketingshowto',$mapping);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE){
            return FALSE;
        }else{
            return TRUE;
        }
    }



    
    public function resourcesmarketingtype_checker($gymphase_type,$id = NULL){
        $this->db->where('ResourcesMarketingName',$gymphase_type);
        if($id != NULL){
            $this->db->where('SysID !=',$id);
        }
        $query = $this->db->select('ResourcesMarketingName')
                ->from('gymresourcesmarketing')
                ->get();
        if($query){
            if($query->num_rows() > 0){
                return TRUE;
                //role type exist
            }else{
                return FALSE;
            }
        }       
    }
    public function duplicate_checker($tbl,$column,$value,$id = NULL){
        if($id != NULL){
            $this->db->where('SysID !=',$id);
        }
        $this->db->where($column,$value);
        $query = $this->db->select($column)
                ->from($tbl)
                ->get();
        if($query){
            if($query->num_rows() > 0){
                return TRUE;
            }
        }
    }
}