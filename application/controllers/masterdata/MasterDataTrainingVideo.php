<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MasterDataTrainingVideo extends CI_Controller {
        
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('masterdata/MasterDataTrainingVideo_','trainingvideo');
    
    }

    public function index(){
        $data['title'] = 'Master Data Training Video Information';
        $this->load->view('templates/header');
    	$this->load->view('templates/navigation');
        $this->load->view('masterdata/menuinformation',$data);
        $this->load->view('templates/footer');
    }
    public function videolist(){
        $data['title'] = 'Master Data Training Video Gallery';
        $this->load->view('templates/header');
    	$this->load->view('templates/navigation');
        $this->load->view('masterdata/trainingvideolist',$data);
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
            "MasterDataScreen/screenlist",
            "MasterDataRole/rolelist",
            "MasterDataPosition/positionlist",
            "MainUserInformation/mainUserlist",
            "MainGymInformation/maingymlist",
            "FranchiseUserInformation/franchiseUserlist",
            "FranchiseGymInformation/franchisegymlist");
        // foreach (get_class_methods($myObj) as $method) {
        //     if ((strpos( $method, 'index' ) !== false || strpos( $method, 'list' ) !== false) && $method !== 'index' ) {
        //         $methods[] = $method;
        //     }
        // }
        // print_r($methods);
        echo json_encode($methods,JSON_UNESCAPED_UNICODE);
    }
    public function ajaxLoadTrainingVideo(){
        $query = $this->trainingvideo->loadAllTrainingVideo();
        if($query){
            echo json_encode($query,JSON_UNESCAPED_UNICODE);
        }else{
            echo json_encode(array('error'=> TRUE,'message'=> 'No result found'));
        }
    }
    public function loadTrainingVideoFromAjax(){
        $query = $this->trainingvideo->loadTrainingVideo();
        if($query){
            echo json_encode($query,JSON_UNESCAPED_UNICODE);
        }else{
            echo json_encode(array('error'=> TRUE,'message'=> 'No result found'));
        }
    }
    public function insertMasterDataTrainingVideoFromAjax(){
        $this->form_validation->set_rules('videotitle','Video Title','required');
        $this->form_validation->set_rules('videoorder','Display Order','required');
        if($this->trainingvideo->duplicate_checker('masterdatatrainingvideo','VideoLink',$this->input->post('videolink')) == TRUE){
            echo json_encode(array('error'=> TRUE,'message'=>  'Video Name already existing!'));
        }else{
            $data_input =   array(
                'VideoTitle' =>  $this->input->post('videotitle'),
                'VideoDescription'   => $this->input->post('description'),
                'VideoOrderIndex'   => $this->input->post('videoorder'),
                'VideoStatus'   => $this->input->post('videostatus'),
                'DeleteStatus'   => $this->input->post('deletestatus'),
                'VideoCategory'   => $this->input->post('videocategory'),
                'VideoLink'   => $this->input->post('videolink'),
                'AddedBy'=>  $this->session->userdata('UserID'),
                'AddedDate'=> date('Y-m-d'));
            $result = $this->trainingvideo->addTrainingVideo($data_input);
            if($result){
                echo json_encode(array('error'=> FALSE,'message'=> 'Video added!'));
            }
            
        }
    }
    public function updateMasterDataTrainingVideoFromAjax(){
        $this->form_validation->set_rules('videotitle','Video Title','required');
        $this->form_validation->set_rules('videoorder','Display Order','required');
        $id = $this->input->post('videogalleryID');
        $videolink = $this->input->post('videolink');
        $data_input =   array(
            'VideoTitle' =>  $this->input->post('videotitle'),
            'VideoDescription'   => $this->input->post('description'),
            'VideoOrderIndex'   => $this->input->post('videoorder'),
            'VideoStatus'   => $this->input->post('videostatus'),
            'DeleteStatus'   => $this->input->post('deletestatus'),
            'VideoCategory'   => $this->input->post('videocategory'),
            'VideoLink'   => $this->input->post('videolink'),
            'UpdatedBy'=>  $this->session->userdata('UserID'),
            'UpdatedDate'=> date('Y-m-d'));
        if($this->trainingvideo->duplicate_checker('masterdatatrainingvideo','VideoLink',$videolink) == TRUE){
            echo json_encode(array('error'=> TRUE,'message'=>  'Video Name already existing!'));
        }else{
            $result = $this->trainingvideo->updateTrainingVideo($data_input,$id);
            if($result){
                echo json_encode(array('error'=> FALSE,'message'=> 'Video Updated!'));
            }
        }
    }
}