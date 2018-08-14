<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MasterDataPosition extends CI_Controller {
        
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('masterdata/MasterDataPosition_','masterdataposition');
    
    }

    public function index(){
        $data['title'] = 'Master Data Position Information';
        $this->load->view('templates/header');
    	$this->load->view('templates/navigation');
        $this->load->view('masterdata/positioninformation',$data);
        $this->load->view('templates/footer');
    }
    public function positionlist(){
        $data['title'] = 'Master Data Position List';
        $this->load->view('templates/header');
    	$this->load->view('templates/navigation');
        $this->load->view('masterdata/positionlist',$data);
        $this->load->view('templates/footer');

    }



    public function loadlink(){
        // $class_methods = get_class_methods('MasterDataMenu');
        // echo json_encode(array_slice($class_methods, 2),JSON_UNESCAPED_UNICODE);
        $myObj = 'MasterDataMenu';
        $methods = array(
            "Welcome",
            "MasterDataMenu/menulist",
            "MasterDataSubMenu/submenulist",
            "MasterDataPosition/positionlist",
            "MasterDataRole/rolelist",
            "MainUserInformation/mainUserlist",
            "MainGymInformation/maingymlist");
        // foreach (get_class_methods($myObj) as $method) {
        //     if ((strpos( $method, 'index' ) !== false || strpos( $method, 'list' ) !== false) && $method !== 'index' ) {
        //         $methods[] = $method;
        //     }
        // }
        // print_r($methods);
        echo json_encode($methods,JSON_UNESCAPED_UNICODE);
    }
    public function loadmenu(){
        $query = $this->masterdataposition->loadMenu();
        if($query){
            echo json_encode($query,JSON_UNESCAPED_UNICODE);
        }else{
            echo json_encode(array('error'=> TRUE,'message'=> 'No result found'));
        }
    }
    public function loadsubmenu(){
        $id = $this->input->post('id');
        $query = $this->masterdataposition->loadSubMenu($id);
        if($query){
            echo json_encode($query,JSON_UNESCAPED_UNICODE);
        }else{
            echo json_encode(array('error'=> TRUE,'message'=> 'No result found'));
        }
    }

    public function ajaxLoadPosition(){
        $query = $this->masterdataposition->loadPosition();
        if($query){
            echo json_encode($query,JSON_UNESCAPED_UNICODE);
        }else{
            echo json_encode(array('error'=> TRUE,'message'=> 'No result found'));
        }
    }

    public function insertMasterDataPositionFromAjax(){
        $this->form_validation->set_rules('positionname','Position Name','required');
        $this->form_validation->set_rules('description','Description','required');
        $data_input =   array(
            'PositionName' =>  $this->input->post('positionname'),
            'Description'   => $this->input->post('description'),
            'PositionStatus'   => $this->input->post('positionactivitystatus'),
            'DeleteStatus'   => $this->input->post('positiondeletestatus'),
            'AddedBy'=>  $this->session->userdata('UserID'),
            'AddedDate'=> date('Y-m-d')
        );
        if($this->masterdataposition->positiontype_checker($data_input['PositionName']) == TRUE){
            echo json_encode(array('error'  => TRUE,'message'   =>  'Position already existing!'));
        }else{
            $result = $this->masterdataposition->addPosition($data_input);
            if($result){
                echo json_encode(array('error'  =>  FALSE,'message'  =>  'Position successfully added!'));
            }
        }
        
    }
    public function updateMasterDataPositionFromAjax(){
        $id = $this->input->post('positionid');
        $this->form_validation->set_rules('positionname','Position Name','required');
        $this->form_validation->set_rules('description','Description','required');
        $data_input =   array(
            'PositionName' =>  $this->input->post('positionname'),
            'Description'   => $this->input->post('description'),
            'PositionStatus'   => $this->input->post('positionactivitystatus'),
            'DeleteStatus'   => $this->input->post('positiondeletestatus'),
            'UpdatedBy'=>  $this->session->userdata('UserID'),
            'UpdatedDate'=> date('Y-m-d')
        );
        if($this->masterdataposition->duplicate_checker('masterdataposition','PositionName',$data_input['PositionName']) == TRUE){
            echo json_encode(array('error'=> TRUE,'message'=>  'Position name already existing!'));
        }else{
            $result = $this->masterdataposition->updatePosition($data_input,$id);
            if($result){
                echo json_encode(array('error'=> FALSE,'message'=> 'Position Updated!'));
            }
        }
    }
}