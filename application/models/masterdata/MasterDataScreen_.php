<?php
class MasterDataScreen_ extends CI_Model{
    
    public function loadScreen($id=NULL){
        if($id!=NULL){
            $this->db->where('A.SysID',$id);
        }
        $query = $this->db->select('A.*,A.SysID AS screenID,B.SysID as submenuID, B.SubMenuName AS submenuname, C.SysID AS menuID,C.MenuName AS menuname')
                ->from('masterdatascreen as A')
                ->join('masterdatasubmenu as B','B.SysID = A.SubMenuNameID','inner left')
                ->join('masterdatamenu as C','C.SysID = B.MenuNameID','inner left')
                ->get();
        if($query){
            if($query->num_rows() > 0){
                return $query->result();
            }
        }

    }
    
    public function addScreen($data_array){
        $query = $this->db->insert('masterdatascreen',$data_array);
        if ($query){
            return TRUE;
        }
    }
    public function updateScreen($data_array,$id){
        $this->db->where('SysID',$id);
        $query = $this->db->update('masterdatascreen',$data_array);
        if ($query){
            return TRUE;
        }
    }
    public function loadMenu($id=NULL){
        if($id!=NULL){
            $this->db->where('A.SysID',$id);
        }
        $query = $this->db->select('A.*')
                ->from('masterdatamenu as A')
                ->get();
        if($query){
            if($query->num_rows() > 0){
                return $query->result();
            }
        }

    }
    public function loadSubMenu($id=NULL){
        if($id!=NULL){
            $this->db->where('A.MenuNameID',$id);
        }
        $query = $this->db->select('A.SysID AS submenuID,B.sysID AS menuID,A.SubMenuName')
                ->from('masterdatasubmenu as A')
                ->join('masterdatamenu as B','B.SysID = A.MenuNameID','inner left')
                ->get();
        if($query){
            if($query->num_rows() > 0){
                return $query->result();
            }
        }

    }


    public function screentype_checker($screen_type,$id = NULL){
        $this->db->where('ScreenName',$screen_type);
        if($id != NULL){
            $this->db->where('SysID !=',$id);
        }
        $query = $this->db->select('ScreenName')
                ->from('masterdatascreen')
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