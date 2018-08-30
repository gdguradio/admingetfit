<?php
class GymContentFaqs_ extends CI_Model{
    
    
    public function loadAllFaqs($id=NULL){
        $branchid = $this->session->userdata('branchID');
        if($id!=NULL){
            $this->db->where('A.SysID',$id);
        }
        $this->db->where('A.DeleteStatus','no');
        $this->db->where('A.FaqsStatus','yes');
        // $this->db->where('A.ShowToBranch',$branchid);
        $query = $this->db->select('A.*')
                ->from('gymcontentfaqs as A')
                ->get();
        if($query){
            if($query->num_rows() > 0){
                $result = array();
                foreach($query->result() as $x){
                    array_push($result,array(
                        'SysID'    =>  $x->SysID,
                        'Question'   =>  $x->Question,
                        'Description'   =>  $x->Description,
                        'AddedDate'   =>  $x->AddedDate,
                        'FaqsStatus'   =>  $x->FaqsStatus,
                        'Access' => $this->getshowto_byid($x->SysID,"BranchName,B.SysID AS BranchID",$branchid)
                    ));
                }
                return $result;
            }
        }

    }
    
    public function getshowto_byid($SysID,$columnname,$roleid = NULL , $branchid= NULL ){
        if($SysID != NULL){
            $this->db->where('A.gymcontentfaqsID',$SysID);
        }
        if($branchid != NULL){
            $this->db->where('A.ShowToBranch',$branchid);
        }

        $this->db->distinct();
        $this->db->where('A.FaqsStatus',"yes");
        $this->db->where('A.DeleteStatus',"no");
        $query = $this->db->select($columnname)
                ->from('gymcontentfaqsshowto AS A')
                ->join('branchdetails as B ',' B.SysID = A.ShowToBranch','inner')
                ->get();
        if($query){
            if($query->num_rows() > 0){
                return $query->result();
            }
        } 
    }
    
    public function addGymContentFaqs($data_array,$data_show){

        $this->db->trans_start();
        $this->db->insert('gymcontentfaqs',$data_array);
        $last_id = $this->db->insert_id();
        $tmp = array();
        foreach($data_show AS $key=>$val){
            $data_show[$key]['gymcontentfaqsID'] = $last_id;
        }
        // print_r($mapping);
        $this->db->insert_batch('gymcontentfaqsshowto',$data_show);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE){
            return FALSE;
        }else{
            return TRUE;
        }
    }
    public function updateGymContentFaqs($data_array,$data_show,$id){
        $this->db->trans_start();
        $this->db->where('SysID',$id);
        $this->db->update('gymcontentfaqs',$data_array); 
        foreach($data_show AS $key=>$val){
            $data_show[$key]['gymcontentfaqsID'] = $id;
        }
        $this->db->where('gymcontentfaqsID',$id);
        $this->db->delete('gymcontentfaqsshowto');
        $this->db->insert_batch('gymcontentfaqsshowto',$data_show);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE){
            return FALSE;
        }else{
            return TRUE;
        }
    }
}