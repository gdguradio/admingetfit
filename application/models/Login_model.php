<?php

class login_model extends CI_Model{
    private $table_name;
    private $table_role_access;
    public function __construct() {
        parent::__construct();
        $this->table_name = 'gymmainlogin';
        // $this->table_role_access = 'user_role';
        if(session_id() == ''){
            session_start();
        }
    }
    
    public function login($username,$password){
        $find_pass = $this->find_password($username);
        
        if($find_pass == FALSE){
            return FALSE;
        }else{
            if(password_verify($password, $find_pass)){
                $this->db->select('*');
                $this->db->from($this->table_name);
                $this->db->where(array('UserName'=> $username));
                $query = $this->db->get();
                if($query->num_rows() > 0){
                    $row = $query->row();
                    //create a session
                    $fullname = $row->FirstName.' '.$row->LastName;
                    // $roleID = $this->findRole($row->SysID);
                    
                    $this->session->set_userdata(
                            array(
                                "UserID"=> $row->SysID,
                                "UserName"=> $username,
                                "roleID"=> $row->MasterDataRoleID,
                                "FullName"=> $fullname,
                                "logged"=> 1)
                            );
                    return TRUE;
                }else{
                    return FALSE;
                }
            }else{
                return FALSE;
            }
        }
    }
    public function find_password($username){
        $this->db->where('UserName',$username);
        $query = $this->db->get($this->table_name)->row();
        if($query){
            return $query->Password;
        }else{
            return FALSE;
        }
    }
    
    function check_session(){
        if(($this->session->has_userdata('logged')) == 1){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    
    public function get_photo(){
        $this->db->where('sys_id',$this->session->userdata('user_id'));
        $query = $this->db->get($this->table_name)->row();
        if($query){
            $photo = $query->user_photo;
            if($photo){
                return $query->user_photo; 
            }else{
                return 'pcc_logo.png';
            }
            
        }else{
            return 'pcc_logo.png';
        }
    }
    
    public function get_page_access($page_id){
        $this->db->where('role_id',$this->session->userdata('role'));
        $this->db->where('page_id',$page_id);
        $query = $this->db->get($this->table_role_access)->row();
        if($query){
            $access = $query->access_option;
            if($access == 'none'){
                return FALSE;
            }else{
                //if the access option value is read or read and write, allow access
                return TRUE;
            }
        }else{
            return FALSE;
        }
    }
    
    public function action_restriction($page_id){
        $this->db->where('role_id',$this->session->userdata('role'));
        $this->db->where('page_id',$page_id);
        $query = $this->db->get($this->table_role_access)->row();
        if($query){
            $action = $query->access_option;
            if($action == 'read_and_write'){
                //allow action for read and write
                return TRUE;
            }else{
                return FALSE;
            }
        }else{
            return FALSE;
        }
    }
}