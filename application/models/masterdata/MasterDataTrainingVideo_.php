<?php
class MasterDataTrainingVideo_ extends CI_Model{
    
    public function loadTrainingVideo($id=NULL){
        if($id!=NULL){
            $this->db->where('A.SysID',$id);
        }
        $this->db->where('A.DeleteStatus','no');
        $this->db->where('A.VideoStatus','yes');
        $query = $this->db->select('A.*')
                ->from('masterdatatrainingvideo as A')
                ->get();
        if($query){
            if($query->num_rows() > 0){
                return $query->result();
            }
        }

    }
    public function loadAllTrainingVideo($id=NULL){
        if($id!=NULL){
            $this->db->where('A.SysID',$id);
        }
        // $this->db->where('A.DeleteStatus','no');
        // $this->db->where('A.VideoStatus','yes');
        $query = $this->db->select('A.*')
                ->from('masterdatatrainingvideo as A')
                ->get();
        if($query){
            if($query->num_rows() > 0){
                return $query->result();
            }
        }

    }
    public function addTrainingVideo($data_array){
        $query = $this->db->insert('masterdatatrainingvideo',$data_array);
        if ($query){
            return TRUE;
        }
    }
    public function updateTrainingVideo($data_array,$id){
        $this->db->where('SysID',$id);
        $query = $this->db->update('masterdatatrainingvideo',$data_array);
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
    public function video_type_checker($menu_type,$id = NULL){
        $this->db->where('masterdatatrainingvideo',$menu_type);
        if($id != NULL){
            $this->db->where('SysID !=',$id);
        }
        $query = $this->db->select('VideoTitle')
                ->from('masterdatatrainingvideo')
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