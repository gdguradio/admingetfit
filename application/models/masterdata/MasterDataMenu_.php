<?php
class MasterDataMenu_ extends CI_Model{
    
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
    public function addMenu($data_array){
        $query = $this->db->insert('masterdatamenu',$data_array);
        if ($query){
            return TRUE;
        }
    }
    public function deleteMenu($data_array,$id){
        $this->db->where('SysID',$id);
        $query = $this->db->update('masterdatamenu',$data_array);
        // $this->db->where('SysID',$id);
        // $query = $this->db->delete('masterdatamenu');
        if($query){
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