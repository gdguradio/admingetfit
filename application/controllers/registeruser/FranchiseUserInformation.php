<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FranchiseUserInformation extends CI_Controller {
        
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Login_model');
        $this->load->model('registeruser/FranchiseUserInformation_','franchiseuserinformation');
    
    }
    public function index(){
        $data['title'] = 'Franchise Gym User Information';
        $this->load->view('templates/header');
    	$this->load->view('templates/navigation');
        $this->load->view('registeruser/franchiseuserinformation',$data);
        $this->load->view('templates/footer');
    }
    public function franchiseUserlist(){
        $data['title'] = 'Franchise Gym Userlist';
        $this->load->view('templates/header');
    	$this->load->view('templates/navigation');
        $this->load->view('registeruser/franchiseuserlist',$data);
        $this->load->view('templates/footer');

    }


    
    public function ChangeUserPassword(){
        $this->form_validation->set_rules('password','Password','trim|required');
        $this->form_validation->set_rules('password_confirmation','Confirm Password','trim|required');
        $this->form_validation->set_rules('userID','User','trim|required');

        if($this->form_validation->run() == FALSE){
            echo json_encode(array('error'=> TRUE,'message'=> 'All fields with * are required'));
        }else{
            $user_id = $this->input->post('userID');
            $password = $this->input->post('password');
            $confirm_password = $this->input->post('password_confirmation');
            if($password != $confirm_password){
                echo json_encode(array('error'=> TRUE,'message'=> 'Password did not matched'));
            }else{
                $datalist = array('password'=> password_hash($password,PASSWORD_DEFAULT));
                $result = $this->franchiseuserinformation->update_user($datalist,$user_id);
                if($result){
                    echo json_encode(array('error'=> FALSE,'message'=> 'Password changed'));
                }else{
                    echo json_encode(array('error'=> TRUE,'message'=> 'Failed. Please contact system administrator'));
                }
            }
            
        }


    }
    public function ajaxLoadUser(){
        // $query = $this->franchiseuserinformation->loadUser();
        $id= null;
        $roleid= $this->session->userdata('roleID');
        $branchid= $this->session->userdata('branchID');
        // print_r($this->session->userdata);die();
        $query = $this->franchiseuserinformation->loadUser($id,$roleid,$branchid);
        if($query){
            echo json_encode($query,JSON_UNESCAPED_UNICODE);
        }else{
            echo json_encode(array('error'=> TRUE,'message'=> 'No result found!'));
        }
    }
    public function ajaxLoadBranch(){
        $query = $this->franchiseuserinformation->loadBranch();
        if($query){
            echo json_encode($query,JSON_UNESCAPED_UNICODE);
        }else{
            echo json_encode(array('error'=> TRUE,'message'=> 'No result found!'));
        }
    }
    public function ajaxLoadRole(){
        $query = $this->franchiseuserinformation->loadRole();
        if($query){
            echo json_encode($query,JSON_UNESCAPED_UNICODE);
        }else{
            echo json_encode(array('error'=> TRUE,'message'=> 'No result found!'));
        }
    }
    public function ajaxLoadPosition(){
        $query = $this->franchiseuserinformation->loadPosition();
        if($query){
            echo json_encode($query,JSON_UNESCAPED_UNICODE);
        }else{
            echo json_encode(array('error'=> TRUE,'message'=> 'No result found!'));
        }
    }
    public function UpdateUserInformation(){
        $this->form_validation->set_rules('branchname','Branch Name','required');
        $this->form_validation->set_rules('positionname','Position Name','required');
        $this->form_validation->set_rules('firstname','First Name','required');
        $this->form_validation->set_rules('lastname','Last Name','required');
        $this->form_validation->set_rules('username','Username','required');
        $this->form_validation->set_rules('email','Email Address','required');
        // $this->form_validation->set_rules('mobilenumber','Mobile','required');
        $this->form_validation->set_rules('rolenameID','Role Name','required');
        if($this->form_validation->run() == FALSE){
            echo json_encode(array('error'=> TRUE,'message'=> 'All fields with * are required!'));
        }else{
            $username = $this->input->post('username');
            $photo = $this->uploadPhoto($username);
            $id = $this->input->post('userID');
            if($this->franchiseuserinformation->duplicate_checker('gymfranchiselogin','UserName',$username,$id) == TRUE){
                echo json_encode(array('error'=> TRUE,'message'=> 'Username already existing'));
            }else{
                $params = array(
                    'FirstName'=> $this->input->post('firstname'),
                    'MiddleName'=> $this->input->post('middlename'),
                    'LastName'=> $this->input->post('lastname'),
                    'Suffix'=> $this->input->post('suffix'),
                    'UserName'=> $this->input->post('username'),
                    'Password'=> password_hash($this->input->post('password'),PASSWORD_DEFAULT),
                    'EmailAddress'=> $this->input->post('email'),
                    'LandLineNumber'=> $this->input->post('landlinenumber'),
                    'MobileNumber'=> $this->input->post('mobilenumber'),
                    'BranchDetailsID'=> $this->input->post('branchname'),
                    'PositionID'=> $this->input->post('positionname'),
                    'MasterDataRoleID'=> $this->input->post('rolenameID'),
                    'UpdatedBy'=>  $this->session->userdata('UserID'),
                    'UpdatedDate'=> date('Y-m-d'),
                    'LoginStatus'=> $this->input->post('loginstatus'),
                    'DeleteStatus'=> $this->input->post('deletestatus')
                );
                $query = $this->franchiseuserinformation->update_user($params,$id);
                if($query){
                    echo json_encode(array('error'=> FALSE,'message'=> 'User updated'));
                }else{
                    echo json_encode(array('error'=> TRUE,'message'=> 'Failed'));
                }
            }
        }     
    }
    public function insertUserLoginFromAjax(){
        $this->form_validation->set_rules('branchname','Branch Name','trim|required');
        $this->form_validation->set_rules('positionname','Position Name','trim|required');
        $this->form_validation->set_rules('firstname','First Name','trim|required');
        $this->form_validation->set_rules('lastname','Last Name','trim|required');
        $this->form_validation->set_rules('username','Username','trim|required');
        $this->form_validation->set_rules('password','Password','trim|required');
        $this->form_validation->set_rules('email','Email Address','trim|required|valid_email');
        $this->form_validation->set_rules('rolenameID','Role Name','trim|required');
        // print_r($_POST);
        
        $uniqueusername = $this->franchiseuserinformation->duplicate_checker('gymfranchiselogin','UserName',$this->input->post('username'));
        $uniqueemail = $this->franchiseuserinformation->duplicate_checker('gymfranchiselogin','EmailAddress',$this->input->post('email'));

        $username = $this->input->post('username');
        $photo = $this->uploadPhoto($username);
        if($this->form_validation->run() == FALSE){
            echo json_encode(array('error'=> TRUE,'message'=> 'All fields with * are required!'));
        }else{
            if($this->input->post('password') != $this->input->post('confirmpassword')){
                echo json_encode(array('error'=> TRUE,'message'=> 'Password did not matched'));
            }else{
                if( $uniqueusername == TRUE ){
                    echo json_encode(array('error'=> TRUE,'message'=> 'Username already existing'));
                }else{
                    if( $uniqueemail == TRUE ){
                        echo json_encode(array('error'=> TRUE,'message'=> 'Email Address already existing'));
                    }else{
                        $params = array(
                            'FirstName'=> $this->input->post('firstname'),
                            'MiddleName'=> $this->input->post('middlename'),
                            'LastName'=> $this->input->post('lastname'),
                            'Suffix'=> $this->input->post('suffix'),
                            'UserName'=> $this->input->post('username'),
                            'Password'=> password_hash($this->input->post('password'),PASSWORD_DEFAULT),
                            'EmailAddress'=> $this->input->post('email'),
                            'LandLineNumber'=> $this->input->post('blocknumber'),
                            'MobileNumber'=> $this->input->post('landlinenumber'),
                            'BranchDetailsID'=> $this->input->post('branchname'),
                            'PositionID'=> $this->input->post('positionname'),
                            'MasterDataRoleID'=> $this->input->post('rolenameID'),
            
            
                            'AddedBy'=>  $this->session->userdata('UserID'),
                            'AddedDate'=> date('Y-m-d'),
                            'LoginStatus'=> $this->input->post('loginstatus'),
                            'DeleteStatus'=> $this->input->post('deletestatus')
                        );
            
                        $query = $this->franchiseuserinformation->add_gymfranchiselogin($params);
                        if($query){
            
                            echo json_encode(array('error'=> FALSE,'message'=> 'User added'));
                        }else{
                            echo json_encode(array('error'=> TRUE,'message'=> 'Failed'));
                        }
                    }
                }
            }
        }
    }
}