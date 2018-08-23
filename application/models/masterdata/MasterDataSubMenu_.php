<?php
class MasterDataSubMenu_ extends CI_Model{
    
    public function loadSubMenu($id=NULL){
        if($id!=NULL){
            $this->db->where('B.SysID',$id);
        }
        $this->db->where('A.SubmenuStatus',"yes");
        $this->db->where('A.DeleteStatus',"no");
        $query = $this->db->select('A.*,B.MenuName,A.FaIcon As SubFaIcon')
                ->from('masterdatasubmenu as A')
                ->join('masterdatamenu as B','B.SysID = A.MenuNameID','inner')
                ->get();
        if($query){
            if($query->num_rows() > 0){
                return $query->result();
            }
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
    public function addSubMenu($data_array){
        $query = $this->db->insert('masterdatasubmenu',$data_array);
        if ($query){
            return TRUE;
        }
    }
    public function updateSubMenu($data_array,$id){
        $this->db->where('SysID',$id);
        $query = $this->db->update('masterdatasubmenu',$data_array);
        if ($query){
            return TRUE;
        }
    }
    public function submenu_type_checker($submenu_type,$id = NULL){
        $this->db->where('SubMenuName',$submenu_type);
        if($id != NULL){
            $this->db->where('SysID !=',$id);
        }
        $query = $this->db->select('SubMenuName')
                ->from('masterdatasubmenu')
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