<?php
class MasterDataAdminImageGallery_ extends CI_Model{
    


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




    public function loadAdminImageGallery($id=NULL){
        $branchid = $this->session->userdata('branchID');
        if($id!=NULL){
            $this->db->where('A.SysID',$id);
        }
        $this->db->where('A.DeleteStatus','no');
        $this->db->where('A.ImageStatus','yes');
        // $this->db->where('A.ShowToBranch',$branchid);
        $query = $this->db->select('A.*')
                ->from('masterdataadminimagegallery as A')
                ->get();
        if($query){
            if($query->num_rows() > 0){
                $result = array();
                foreach($query->result() as $x){
                    array_push($result,array(
                        'SysID'    =>  $x->SysID,
                        'ShowToBranch' => $x->ShowToBranch,
                        'ImageTitle'   =>  $x->ImageTitle,
                        'ImageDescription'   =>  $x->ImageDescription,
                        'ImageLink'   =>  $x->ImageLink,
                        'ImageOrderIndex'   =>  $x->ImageOrderIndex,
                        'AddedDate'   =>  $x->AddedDate,
                        'ImageStatus'   =>  $x->ImageStatus,
                        'Access' => $this->getshowto_byid($x->SysID,"BranchName,B.SysID AS BranchID",$branchid)
                    ));
                }
                return $result;
            }
        }

    }
    
    public function getshowto_byid($SysID,$columnname,$roleid = NULL , $branchid= NULL ){
        if($SysID != NULL){
            $this->db->where('A.masterdataadminimagegalleryID',$SysID);
        }
        if($branchid != NULL){
            $this->db->where('A.ShowToBranch',$branchid);
        }

        $this->db->distinct();
        $this->db->where('A.ImageStatus',"yes");
        $this->db->where('A.DeleteStatus',"no");
        $query = $this->db->select($columnname)
                ->from('masterdataadminimagegalleryshowto AS A')
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



    public function loadAllAdminImageGallery($id=NULL){

        $branchid = $this->session->userdata('branchID');
        if($id!=NULL){
            $this->db->where('A.SysID',$id);
        }
        $this->db->distinct('ImageTitle');
        // $this->db->where('A.DeleteStatus','no');
        // $this->db->where('A.ImageStatus','yes');
        
        $query = $this->db->select('A.*')
                ->from('masterdataadminimagegallery as A')
                ->get();
        if($query){
            if($query->num_rows() > 0){
                $result = array();
                foreach($query->result() as $x){
                    array_push($result,array(
                        'SysID'    =>  $x->SysID,
                        'ShowToBranch' => $x->ShowToBranch,
                        'ImageTitle'   =>  $x->ImageTitle,
                        'ImageDescription'   =>  $x->ImageDescription,
                        'ImageLink'   =>  $x->ImageLink,
                        'ImageOrderIndex'   =>  $x->ImageOrderIndex,
                        'AddedDate'   =>  $x->AddedDate,
                        'EntryStatus'   =>  $x->ImageStatus,
                        'BranchName' => $this->getbullenshowto_byid($x->SysID,"BranchName,B.SysID AS BranchID")
                    ));
                }
                return $result;
            }
        }

    }
    public function getbullenshowto_byid($SysID,$columnname,$branchid= NULL ){
        if($SysID != NULL){
            $this->db->where('A.masterdataadminimagegalleryID',$SysID);
        }
        if($branchid != NULL){
            $this->db->where('A.ShowToBranch',$branchid);
        }
        $this->db->distinct();
        $this->db->where('A.ImageStatus',"yes");
        $this->db->where('A.DeleteStatus',"no");
        $query = $this->db->select($columnname)
                ->from('masterdataadminimagegalleryshowto AS A')
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
    public function addAdminImageGallery($data_array,$data_show){

        $this->db->trans_start();
        $this->db->insert('masterdataadminimagegallery',$data_array);
        $last_id = $this->db->insert_id();
        $tmp = array();
        foreach($data_show AS $key=>$val){
            $data_show[$key]['masterdataadminimagegalleryID'] = $last_id;
        }
        // print_r($mapping);
        $this->db->insert_batch('masterdataadminimagegalleryshowto',$data_show);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE){
            return FALSE;
        }else{
            return TRUE;
        }
        // $query = $this->db->insert_batch('masterdataadminimagegallery',$data_array);
        // if ($query){
        //     return TRUE;
        // }
    }
    public function updateAdminImageGallery($data_array,$data_show,$id){
        $this->db->trans_start();
        $this->db->where('SysID',$id);
        $this->db->update('masterdataadminimagegallery',$data_array); 
        foreach($data_show AS $key=>$val){
            $data_show[$key]['masterdataadminimagegalleryID'] = $id;
        }
        $this->db->where('masterdataadminimagegalleryID',$id);
        $this->db->delete('masterdataadminimagegalleryshowto');
        $this->db->insert_batch('masterdataadminimagegalleryshowto',$data_show);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE){
            return FALSE;
        }else{
            return TRUE;
        }
        // $this->db->where('SysID',$id);
        // $query = $this->db->update('masterdataadminimagegallery',$data_array);
        // if ($query){
        //     return TRUE;
        // }
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
    public function image_type_checker($menu_type,$id = NULL){
        $this->db->where('masterdataadminimagegallery',$menu_type);
        if($id != NULL){
            $this->db->where('SysID !=',$id);
        }
        $query = $this->db->select('ImageTitle')
                ->from('masterdataadminimagegallery')
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
}