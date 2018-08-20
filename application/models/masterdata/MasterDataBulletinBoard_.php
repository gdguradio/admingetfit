<?php
class MasterDataBulletinBoard_ extends CI_Model{
    

    public function loadAllusers(){
        $query = $this->db->select('*')
                ->from('gymmainlogin')
                ->get();
        if($query){
            if($query->num_rows() > 0){
                return $query->result();
            }
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
    public function loadBranch($id){

        $isuserfrommain = $this->selectBranches($id);

        if($isuserfrommain == "franchise"){
            $this->db->where('A.BranchType',$isuserfrommain);
        }

        $query = $this->db->select('A.*')
                ->from('branchdetails as A')
                ->get();
        if($query){
            if($query->num_rows() > 0){
                return $query->result();
            }
        }
    }
    public function selectBranches($id){
        // $this->db->where('A.BranchType',"main");
        $this->db->where('B.SysID',$id);
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
    public function loadBulletinBoard(){
        $query = $this->db->select('*')
                ->from('masterdatabulletinboarddetails')
                ->get();
        if($query){
            if($query->num_rows() > 0){
                $result = array();
                foreach($query->result() as $x){
                    array_push($result,array(
                        'SysID'    =>  $x->SysID,
                        'EntryType' => $x->EntryType,
                        'EntryDescription'   =>  $x->EntryDescription,
                        'EntryTitle'   =>  $x->EntryTitle,
                        'EntryFrom'   =>  $this->getbullenusername_byid($x->EntryFrom),
                        'EntryOrderIndex'   =>  $x->EntryOrderIndex,
                        'AddedDate'   =>  $x->AddedDate,
                        'BranchName' => $this->getbullenshowto_byid($x->SysID,"BranchName,B.SysID AS BranchID"),
                        'RoleName' => $this->getbullenshowto_byid($x->SysID,"RoleName,C.SysID AS roleID")
                    ));
                }
                return $result;
            }
        }
    }
    public function getbullenusername_byid($SysID){
        if($SysID != NULL){
            $this->db->where('A.EntryFrom',$SysID);
        }
        $this->db->distinct();
        $query = $this->db->select('B.FirstName,B.LastName,B.SysID AS userID')
                ->from('masterdatabulletinboarddetails AS A')
                ->join('gymmainlogin as B ',' B.SysID = A.EntryFrom','inner')
                ->get();
        if($query){
            if($query->num_rows() > 0){
                return $query->result();
            }
        } 
    }
    public function getbullenshowto_byid($SysID,$columnname){
        if($SysID != NULL){
            $this->db->where('A.MasterDataBulletinBoardDetailsID',$SysID);
        }
        $this->db->distinct();
        $query = $this->db->select($columnname)
                ->from('masterdatabulletinboard AS A')
                ->join('branchdetails as B ',' B.SysID = A.EntryShowToBranch','inner')
                ->join('masterdatarole as C ',' C.SysID = A.ShowToBranchRole','inner')
                ->get();
        if($query){
            if($query->num_rows() > 0){
                return $query->result();
            }
        } 
    }
    public function addBulletinBoard($details,$mapping){
        $this->db->trans_start();
        $this->db->insert('masterdatabulletinboarddetails',$details);
        $last_id = $this->db->insert_id();
        $tmp = array();
        foreach($mapping AS $key=>$val){
            $mapping[$key]['MasterDataBulletinBoardDetailsID'] = $last_id;
        }
        // print_r($mapping);
        $this->db->insert_batch('masterdatabulletinboard',$mapping);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE){
            return FALSE;
        }else{
            return TRUE;
        }
    }
    public function updateMenu($data_array,$id){
        $this->db->where('SysID',$id);
        $query = $this->db->update('masterdatamenu',$data_array);
        if ($query){
            return TRUE;
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
    public function menu_type_checker($menu_type,$id = NULL){
        $this->db->where('MenuName',$menu_type);
        if($id != NULL){
            $this->db->where('SysID !=',$id);
        }
        $query = $this->db->select('MenuName')
                ->from('masterdatamenu')
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