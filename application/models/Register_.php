<?php
class Register_ extends CI_Model{
    
    public function add_gymbranch($data_array){
        $query = $this->db->insert('branchdetails',$data_array);
        if($query){
            return TRUE;
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

    public function duplicate_checker($tbl,$column,$value,$id = NULL)
    {
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











































    public function update_user($data_array,$id)
    {
        $this->db->where('sys_id',$id);
        $query = $this->db->update('user',$data_array);
        if($query)
        {
            return TRUE;
        }
    }
    
    public function load_user($id=NULL)
    {
        if($id!=NULL)
        {
            $this->db->where('A.sys_id',$id);
        }
        $query = $this->db->select('A.*,B.role_type,C.division_name,D.title')
                ->from('user as A')
                ->join('user_role as B','B.sys_id = A.user_role_id','left')
                ->join('division as C','C.sys_id = A.division_id','left')
                ->join('user_title as D','D.sys_id = A.user_title_id','left')
                ->where('A.is_deleted','N')
                ->get();
        if($query)
        {
            if($query->num_rows() > 0)
            {
                return $query->result();
            }
        }
    }
    
    
    
    
}