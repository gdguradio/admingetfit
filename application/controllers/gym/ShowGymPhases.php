<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ShowGymPhases extends CI_Controller {
        
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('gym/ShowGymPhases_','showgymphases');
    }

    public function index(){
        
        $data['title'] = 'Gym Phases';
        $this->load->view('templates/header');
    	$this->load->view('templates/navigation');
        $this->load->view('gym/showgymphases',$data);
        $this->load->view('templates/footer');
    }

    public function ajaxLoadPhases(){
        $roleid = $this->session->userdata('roleID');
        $branchid = $this->session->userdata('branchID');
        $query = $this->showgymphases->ajaxLoadPhases($roleid,$branchid);
        if($query){
            echo json_encode($query,JSON_UNESCAPED_UNICODE);
        }else{
            echo json_encode(array('error'=> TRUE,'message'=> 'No result found'));
        }
    }
    
}