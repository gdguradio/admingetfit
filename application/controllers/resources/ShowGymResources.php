<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ShowGymResources extends CI_Controller {
        
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('resources/ShowGymResources_','showgymresources');
    }

    public function index(){
        
        $data['title'] = 'Gym Resources';
        $this->load->view('templates/header');
    	$this->load->view('templates/navigation');
        $this->load->view('resources/showgymresources',$data);
        $this->load->view('templates/footer');
    }

    public function ajaxLoadResources(){
        $roleid = $this->session->userdata('roleID');
        $branchid = $this->session->userdata('branchID');
        $query = $this->showgymresources->ajaxLoadResources($roleid,$branchid);
        if($query){
            echo json_encode($query,JSON_UNESCAPED_UNICODE);
        }else{
            echo json_encode(array('error'=> TRUE,'message'=> 'No result found'));
        }
    }
    
}