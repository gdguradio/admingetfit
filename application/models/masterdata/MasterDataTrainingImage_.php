<?php
class MasterDataTrainingImage_ extends CI_Model{
    



    public function loadBranch($id){

        $isuserfrommain = $this->selectBranches($id);

        if($isuserfrommain == "franchise"){
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


    public function loadTrainingImage($id=NULL){
        if($id!=NULL){
            $this->db->where('A.SysID',$id);
        }
        $this->db->where('A.DeleteStatus','no');
        $this->db->where('A.ImageStatus','yes');
        $query = $this->db->select('A.*')
                ->from('masterdatatrainingimage as A')
                ->get();
        if($query){
            if($query->num_rows() > 0){
                return $query->result();
            }
        }

    }
    public function loadAllTrainingImage($id=NULL){
        if($id!=NULL){
            $this->db->where('A.SysID',$id);
        }
        // $this->db->where('A.DeleteStatus','no');
        // $this->db->where('A.ImageStatus','yes');
        $query = $this->db->select('A.*')
                ->from('masterdatatrainingimage as A')
                ->get();
        if($query){
            if($query->num_rows() > 0){
                return $query->result();
            }
        }

    }
    public function addTrainingImage($data_array){
        $query = $this->db->insert('masterdatatrainingimage',$data_array);
        if ($query){
            return TRUE;
        }
    }
    public function updateTrainingImage($data_array,$id){
        $this->db->where('SysID',$id);
        $query = $this->db->update('masterdatatrainingimage',$data_array);
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
    public function image_type_checker($menu_type,$id = NULL){
        $this->db->where('masterdatatrainingimage',$menu_type);
        if($id != NULL){
            $this->db->where('SysID !=',$id);
        }
        $query = $this->db->select('ImageTitle')
                ->from('masterdatatrainingimage')
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