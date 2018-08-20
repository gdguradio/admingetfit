<?php
class MasterDataAdminImageGallery_ extends CI_Model{
    
    public function loadAdminImageGallery($id=NULL){
        if($id!=NULL){
            $this->db->where('A.SysID',$id);
        }
        $this->db->where('A.DeleteStatus','no');
        $this->db->where('A.ImageStatus','yes');
        $query = $this->db->select('A.*')
                ->from('masterdataadminimagegallery as A')
                ->get();
        if($query){
            if($query->num_rows() > 0){
                return $query->result();
            }
        }

    }
    public function loadAllAdminImageGallery($id=NULL){
        if($id!=NULL){
            $this->db->where('A.SysID',$id);
        }
        // $this->db->where('A.DeleteStatus','no');
        // $this->db->where('A.ImageStatus','yes');
        $query = $this->db->select('A.*')
                ->from('masterdataadminimagegallery as A')
                ->get();
        if($query){
            if($query->num_rows() > 0){
                return $query->result();
            }
        }

    }
    public function addAdminImageGallery($data_array){
        $query = $this->db->insert('masterdataadminimagegallery',$data_array);
        if ($query){
            return TRUE;
        }
    }
    public function updateAdminImageGallery($data_array,$id){
        $this->db->where('SysID',$id);
        $query = $this->db->update('masterdataadminimagegallery',$data_array);
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