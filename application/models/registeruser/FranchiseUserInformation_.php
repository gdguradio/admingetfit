<?php
class FranchiseUserInformation_ extends CI_Model{
    
    public function add_gymbranch($data_array){
        $query = $this->db->insert('gymfranchisebranchdetails',$data_array);
        if($query)
        {
            return TRUE;
        }
    }
    public function add_gymfranchiselogin($data_array){
        $query = $this->db->insert('gymfranchiselogin',$data_array);
        if($query)
        {
            return TRUE;
        }
    }

    
    public function update_user($data_array,$id){
        // print_r($data_array);
        $this->db->where('SysID',$id);
        $query = $this->db->update('gymfranchiselogin',$data_array);
        if($query){
            return TRUE;
        }
    }

    public function loadUser($id=NULL,$roleid=NULL, $branchid=NULL){
        if($id!=NULL){
            $this->db->where('A.SysID',$id);
        }
        if($branchid != NULL){
            $this->db->where('A.BranchDetailsID',$branchid);
            // $this->db->where('A.ShowToBranchRole',$roleid);
        }
        if($roleid != NULL && ($roleid != '2' )){
            $this->db->where('A.MasterDataRoleID !=', '2');
        }
        

        // $this->db->where('A.LoginStatus','yes');
        // $this->db->where('A.DeleteStatus','no');
        $query = $this->db->select('A.*,RoleName,PositionName')//,B.role_type,C.division_name,D.title
                ->from('gymmainlogin as A')
                ->join('masterdatarole as B','B.SysID = A.MasterDataRoleID','inner')
                ->join('masterdataposition as C','C.SysID = A.positionID','inner')
                // ->where('A.is_deleted','N')
                ->get();        
        if($query){
            if($query->num_rows() > 0)
            {
                return $query->result();
            }
        }

    }
    public function loadBranch(){
        $this->db->where('BranchStatus','yes');
        $this->db->where('DeleteStatus','no');     
        $this->db->where('BranchType','franchise');
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
    public function loadRole(){
        $this->db->where('RoleStatus','yes');
        $this->db->where('DeleteStatus','no');    
        $query = $this->db->from('masterdatarole')
                ->get();
        if($query){
            if($query->num_rows() > 0){
                $result = array();
                foreach($query->result() as $x){
                    array_push($result,array(
                        'SysID'    =>  $x->SysID,
                        'RoleName' => $x->RoleName
                    ));
                }
                return $result;
            }
        }
    }
    public function loadPosition(){
        $this->db->where('PositionStatus','yes');
        $this->db->where('DeleteStatus','no');
        $query = $this->db->from('masterdataposition')
                ->get();
        if($query){
            if($query->num_rows() > 0){
                $result = array();
                foreach($query->result() as $x){
                    array_push($result,array(
                        'SysID'    =>  $x->SysID,
                        'PositionName' => $x->PositionName
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