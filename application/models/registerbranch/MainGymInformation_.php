<?php
class MainGymInformation_ extends CI_Model{
    
    public function addgymbranch($data_array){
        $query = $this->db->insert('branchdetails',$data_array);
        if($query){
            return TRUE;
        }
    }
    public function updategymbranch($data_array,$id){
        $this->db->where('SysID',$id);
        $query = $this->db->update('branchdetails',$data_array);
        if ($query){
            return TRUE;
        }
    }
    public function loadMainBranchInformation(){
        // $this->db->where('BranchType',"main");
        // $query = $this->db->from('Branchdetails')
        $query = $this->db->select('A.*')
                ->from('Branchdetails as A')
                // ->join('gymmainlogin as B','A.SysID = B.BranchDetailsID','inner left')
                ->get();
        $result = array();        
        if($query){
            if($query->num_rows() > 0){
                // return $query->result();
                foreach($query->result() as $x){
                    array_push($result,array(
                        'SysID'    =>  $x->SysID,
                        'HouseNumber' => $x->HouseNumber,
                        'Lot'   =>  $x->Lot,
                        'Block'   =>  $x->Block,
                        'Phase'   =>  $x->Phase,
                        'FloorNumber'   =>  $x->FloorNumber,
                        'BuildingName'   =>  $x->BuildingName,
                        'StreetName'   =>  $x->StreetName,
                        'PurokName'   =>  $x->PurokName,
                        'SubdivisionName'   =>  $x->SubdivisionName,
                        'BarangayName'   =>  $x->BarangayName,
                        'CityName'   =>  $x->CityName,
                        'ProvinceName'   =>  $x->ProvinceName,
                        'RegionName'   =>  $x->RegionName,
                        'CountryName'   =>  $x->CountryName,
                        'ZipCode'   =>  $x->ZipCode,
                        'BranchName'   =>  $x->BranchName,
                        'EmailAddress'   =>  $x->EmailAddress,
                        'LandLineNumber'   =>  $x->LandLineNumber,
                        'MobileNumber'   =>  $x->MobileNumber,
                        'ContactPerson'   =>  $x->ContactPerson,
                        'BranchStatus'   =>  $x->BranchStatus,
                        'BranchType'   =>  $x->BranchType,
                        'DeleteStatus'   =>  $x->DeleteStatus,
                        'AddedDate'   =>  $x->AddedDate,
                        'UpdatedBy'   =>  $x->UpdatedBy,
                        'UpdatedDate'   =>  $x->UpdatedDate,
                        'userList' => $this->getUserListByID($x->SysID)
                    ));
                }
            }
        } 
        return $result;
    }

    public function getUserListByID($id){

        $this->db->where('BranchDetailsID',$id);
        $query = $this->db->select('A.*,B.PositionName')
        ->from('gymmainlogin as A')
        ->join('masterdataposition as B','A.PositionID = B.SysID','inner')
        ->get();

        // $query = $this->db->from('gymmainlogin')
        // ->where('BranchDetailsID',$id)
        // ->get();
        if($query){
            return $query->result();
        }else{
            return false;
        }
    }
    public function loadBranch($branchtype,$usertable){
        $this->db->where('A.BranchType',$branchtype);
        $query = $this->db->select('A.*,B.SysID AS maingymloginID,A.SysID As mainbranchID')
                ->from('Branchdetails as A')
                ->join($usertable.' as B','A.SysID = B.BranchDetailsID','inner')
                ->get();
        if($query){
            if($query->num_rows() > 0){
                $result = array();
                foreach($query->result() as $x){
                    array_push($result,array(
                        'SysID'    =>  $x->SysID,
                        'BranchName' => $x->BranchName
                    ));
                }
                return $result;
            }
        }
    }
    public function add_gymmainlogin($data_array){
        $query = $this->db->insert('gymmainlogin',$data_array);
        if($query){
            return TRUE;
        }
    }
    public function load_branch(){
        $query = $this->db->from('Branchdetails')
                ->get();
        if($query){
            if($query->num_rows() > 0){
                $result = array();
                foreach($query->result() as $x){
                    array_push($result,array(
                        'SysID'    =>  $x->SysID,
                        'BranchName' => $x->BranchName
                    ));
                }
                return $result;
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











































    public function update_user($data_array,$id){
        $this->db->where('sys_id',$id);
        $query = $this->db->update('user',$data_array);
        if($query){
            return TRUE;
        }
    }
    
    public function load_user($id=NULL){
        if($id!=NULL){
            $this->db->where('A.sys_id',$id);
        }
        $query = $this->db->select('A.*,B.role_type,C.division_name,D.title')
                ->from('user as A')
                ->join('user_role as B','B.sys_id = A.user_role_id','left')
                ->join('division as C','C.sys_id = A.division_id','left')
                ->join('user_title as D','D.sys_id = A.user_title_id','left')
                ->where('A.is_deleted','N')
                ->get();
        if($query){
            if($query->num_rows() > 0){
                return $query->result();
            }
        }
    }
    
    
    
    
}