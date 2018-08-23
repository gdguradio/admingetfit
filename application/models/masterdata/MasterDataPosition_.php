<?php
class MasterDataPosition_ extends CI_Model{
    
    public function loadPosition($id=NULL){
        if($id!=NULL){
            $this->db->where('A.SysID',$id);
        }
        $this->db->where('PositionStatus',"yes");
        $this->db->where('DeleteStatus',"no");
        $query = $this->db->select('A.*')
                ->from('masterdataposition as A')
                ->get();
        if($query){
            if($query->num_rows() > 0){
                return $query->result();
            }
        }

    }
    
    public function addPosition($data_array){
        $query = $this->db->insert('masterdataposition',$data_array);
        if ($query){
            return TRUE;
        }
    }
    public function updatePosition($data_array,$id){
        $this->db->where('SysID',$id);
        $query = $this->db->update('masterdataposition',$data_array);
        if ($query){
            return TRUE;
        }
    }
    public function positiontype_checker($position_type,$id = NULL){
        $this->db->where('PositionName',$position_type);
        if($id != NULL){
            $this->db->where('SysID !=',$id);
        }
        $query = $this->db->select('PositionName')
                ->from('masterdataposition')
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