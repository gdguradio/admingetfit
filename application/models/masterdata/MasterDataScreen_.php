<?php
class MasterDataScreen_ extends CI_Model{
    
    public function loadScreen($id=NULL){
        if($id!=NULL){
            $this->db->where('A.SysID',$id);
        }
        $this->db->where('A.ScreenStatus',"yes");
        $this->db->where('A.DeleteStatus',"no");
        $query = $this->db->select('A.*,A.SysID AS screenID,B.SysID as submenuID, B.SubMenuName AS submenuname, C.SysID AS menuID,C.MenuName AS menuname')
                ->from('masterdatascreen as A')
                ->join('masterdatasubmenu as B','B.SysID = A.SubMenuNameID','inner')
                ->join('masterdatamenu as C','C.SysID = B.MenuNameID','inner')
                ->get();
        if($query){
            if($query->num_rows() > 0){
                return $query->result();
            }
        }

    }
    public function selectActiveParentSubMenu($submenuid){
        $this->db->where('SubmenuStatus',"yes");
        $this->db->where('DeleteStatus',"no");
        $this->db->where('SysID',$id);
        $query = $this->db->select('A.*')
                ->from('masterdatasubmenu as A')
                ->get();
        if($query){
            if($query->num_rows() > 0){
                return true;
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
    public function deleteScreen($data_array,$id){
        $this->db->where('SysID',$id);
        $query = $this->db->update('masterdatascreen',$data_array);
        // $this->db->where('SysID',$id);
        // $query = $this->db->delete('masterdatascreen');
        if($query){
            return TRUE;
        }
    }
    public function loadMenu($id=NULL){
        if($id!=NULL){
            $this->db->where('A.SysID',$id);
        }
        $this->db->where('MenuStatus',"yes");
        $this->db->where('DeleteStatus',"no");
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
        $this->db->where('A.SubmenuStatus',"yes");
        $this->db->where('A.DeleteStatus',"no");
        $query = $this->db->select('A.SysID AS submenuID,B.sysID AS menuID,A.SubMenuName')
                ->from('masterdatasubmenu as A')
                ->join('masterdatamenu as B','B.SysID = A.MenuNameID','inner')
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