<?php
class GymContentBenefit_ extends CI_Model{
    
    
    public function loadAllBenefit($id=NULL){
        $branchid = $this->session->userdata('branchID');
        if($id!=NULL){
            $this->db->where('A.SysID',$id);
        }
        $this->db->where('A.DeleteStatus','no');
        $this->db->where('A.BenefitStatus','yes');
        // $this->db->where('A.ShowToBranch',$branchid);
        $query = $this->db->select('A.*')
                ->from('gymcontentbenefit as A')
                ->get();
        if($query){
            if($query->num_rows() > 0){
                $result = array();
                foreach($query->result() as $x){
                    array_push($result,array(
                        'SysID'    =>  $x->SysID,
                        'BenefitName'   =>  $x->BenefitName,
                        'BenefitDescription'   =>  $x->BenefitDescription,
                        'BenefitCategory'   =>  $x->BenefitCategory,
                        'AddedDate'   =>  $x->AddedDate,
                        'BenefitStatus'   =>  $x->BenefitStatus,
                        'Access' => $this->getshowto_byid($x->SysID,"BranchName,B.SysID AS BranchID",$branchid)
                    ));
                }
                return $result;
            }
        }

    }
    
    public function getshowto_byid($SysID,$columnname,$roleid = NULL , $branchid= NULL ){
        if($SysID != NULL){
            $this->db->where('A.gymcontentbenefitID',$SysID);
        }
        if($branchid != NULL){
            $this->db->where('A.ShowToBranch',$branchid);
        }

        $this->db->distinct();
        $this->db->where('A.BenefitStatus',"yes");
        $this->db->where('A.DeleteStatus',"no");
        $query = $this->db->select($columnname)
                ->from('gymcontentbenefitshowto AS A')
                ->join('branchdetails as B ',' B.SysID = A.ShowToBranch','inner')
                ->get();
                // $this->output->enable_profiler(TRUE);
                
                
                // die();
        if($query){
            if($query->num_rows() > 0){
                return $query->result();
            }
        } 
    }
    
    public function addGymContentBenefit($data_array,$data_show){

        $this->db->trans_start();
        $this->db->insert('gymcontentbenefit',$data_array);
        $last_id = $this->db->insert_id();
        $tmp = array();
        foreach($data_show AS $key=>$val){
            $data_show[$key]['gymcontentbenefitID'] = $last_id;
        }
        // print_r($mapping);
        $this->db->insert_batch('gymcontentbenefitshowto',$data_show);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE){
            return FALSE;
        }else{
            return TRUE;
        }
    }
    public function updateGymContentBenefit($data_array,$data_show,$id){
        $this->db->trans_start();
        $this->db->where('SysID',$id);
        $this->db->update('gymcontentbenefit',$data_array); 
        foreach($data_show AS $key=>$val){
            $data_show[$key]['gymcontentbenefitID'] = $id;
        }
        $this->db->where('gymcontentbenefitID',$id);
        $this->db->delete('gymcontentbenefitshowto');
        $this->db->insert_batch('gymcontentbenefitshowto',$data_show);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE){
            return FALSE;
        }else{
            return TRUE;
        }
    }
}