<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MasterDataBaseUrl extends CI_Controller {
        
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('masterdata/MasterDataBaseUrl_','masterdatabaseurl');
    }

    public function index(){
        
        $data['title'] = 'Gym Phases';
        $this->load->view('templates/header');
    	$this->load->view('templates/navigation');
        $this->load->view('masterdata/baseurl',$data);
        $this->load->view('templates/footer');
    }
    public function insertGymLoginFromAjax(){
        $this->form_validation->set_rules('baseurl','Base Url','required');
        
        $data_input =   array(
            'MenuName' =>  $this->input->post('baseurl'),
            'Description'   => $this->input->post('description'),
            'HasChild'   => $this->input->post('haschild'),
            'Link'   => $this->input->post('menulink'),
            'FaIcon'   => $this->input->post('menuicon'),
            'MenuStatus'   => $this->input->post('menustatus'),
            'DeleteStatus'   => $this->input->post('deletestatus'),
            'DisplayOrderIndex'   => $this->input->post('displayorder'),
            'AddedBy'=>  $this->session->userdata('UserID'),
            'AddedDate'=> date('Y-m-d')
        );
        if($this->masterdatamenu->duplicate_checker('masterdatamenu','MenuName',$data_input['MenuName']) == TRUE){
            echo json_encode(array('error'=> TRUE,'message'=>  'Menu Name already existing!'));
        }else{
            $result = $this->masterdatamenu->addMenu($data_input);
            if($result){
                echo json_encode(array('error'=> FALSE,'message'=> 'Menu added!'));
            }
        }
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