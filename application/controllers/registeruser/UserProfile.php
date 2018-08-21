<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserProfile extends CI_Controller 
{
    public function __construct() {
        parent::__construct();
        $this->load->model('registeruser/UserProfile_','userprofile');
    }
    public function userProfile($userID){
        $data['title'] = 'User Profile';
        $data['photo'] = $this->userprofile->getPhoto($userID);
        $data['userinfo'] = $this->userprofile->userInfo($userID);
        $this->commonView('registeruser/userprofile',$data);
    }
    public function ajaxLoadBranch(){
        $userID = $this->input->post('userID');
        $result = $this->userprofile->userInfo($userID);
        if($result){
            echo json_encode($result,JSON_UNESCAPED_UNICODE);
        }else {
            echo json_encode(array('error'=> TRUE,'message'=> 'No result found'));
        }
    }
    //render common view
    private function commonView($view,$data){
        $this->load->view('templates/header');
        $this->load->view('templates/navigation');
        $this->load->view($view,$data);
        $this->load->view('templates/footer');


        
    }
    public function UpdateUserInformation(){
        $this->form_validation->set_rules('firstname','First Name','required');
        $this->form_validation->set_rules('lastname','Last Name','required');
        if($this->form_validation->run() == FALSE){
            echo json_encode(array('error'=> TRUE,'message'=> 'All fields with * are required!'));
        }else{
            $username = $this->input->post('username');
            $photo = $this->uploadPhoto($username);
            $id = $this->input->post('userID');
            $params = array(
                'FirstName'=> $this->input->post('firstname'),
                'MiddleName'=> $this->input->post('middlename'),
                'LastName'=> $this->input->post('lastname'),
                'Suffix'=> $this->input->post('suffix'),
                'UserPhoto'=> $photo,
                'LandLineNumber'=> $this->input->post('landlinenumber'),
                'MobileNumber'=> $this->input->post('mobilenumber'),
                'UpdatedBy'=>  $this->session->userdata('UserID'),
                'UpdatedDate'=> date('Y-m-d')
            );    
            $query = $this->userprofile->update_user($params,$id);
            if($query){
                echo json_encode(array('error'=> FALSE,'message'=> 'User updated'));
            }else{
                echo json_encode(array('error'=> TRUE,'message'=> 'Failed'));
            }
        }
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
                $result = $this->userprofile->update_user($datalist,$user_id);
                if($result){
                    echo json_encode(array('error'=> FALSE,'message'=> 'Password changed'));
                }else{
                    echo json_encode(array('error'=> TRUE,'message'=> 'Failed. Please contact system administrator'));
                }
            }
            
        }


    }
    
    
    
    
    public function uploadPhoto($name = 'new'){
        $config['upload_path']          = './assets/UserPhoto/';
        $config['allowed_types']    = 'png|jpeg|jpg';
        $config['max_size']         = 2048;
        // $config['encrypt_name']     = TRUE;//enncryp photo name
        $config['file_name']            = $name;
        $config['max_size'] = '30000'; // Added Max Size
        $config['overwrite']        = TRUE;
        $config['max_width']        = 0;
        $config['max_height']       = 0;
        
        //load upload library
        
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        
        // check if folder exists
        
        if( ! is_dir($config['upload_path'])) {
        @mkdir($config['upload_path'], 0755, true);
        }
        
        if( ! empty($_FILES['photo']['name'])){
            $this->load->library('upload', $config);
            if ( ! $this->upload->do_upload('photo')){
                return FALSE;
            }
            else{
                return $this->upload->data('file_name');
            }
        }else{
            return NULL;
        }
    }
    
}