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
    
    
    
    
    
    
    
    
}