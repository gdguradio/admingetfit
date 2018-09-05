<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GymResourcesAssetsArtwork extends CI_Controller {
        
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('resources/GymResourcesAssetsArtwork_','resourcesresourcesassetsartwork');
    
    }

    public function index(){
        $data['title'] = 'Master Data Resources AssetsArtwork Information';
        $this->load->view('templates/header');
    	$this->load->view('templates/navigation');
        $this->load->view('resources/resourcesassetsartworkinformation',$data);
        $this->load->view('templates/footer');
    }
    public function resourcesassetsartworklist(){
        $data['title'] = 'Master Data Resources AssetsArtwork List';
        $this->load->view('templates/header');
    	$this->load->view('templates/navigation');
        $this->load->view('resources/gymresourcesassetsartwork',$data);
        $this->load->view('templates/footer');

    }
    public function loadBranch(){
        $id = $this->session->userdata('UserID');
        $query = $this->resourcesresourcesassetsartwork->loadBranch($id);
        if($query){
            echo json_encode($query,JSON_UNESCAPED_UNICODE);
        }else{
            echo json_encode(array('error'=> TRUE,'message'=> 'No result found'));
        }
    }
    public function loadBranchRoles(){
        $id = $this->input->post('branchID');
        if(isset($id)){
            $query = $this->resourcesresourcesassetsartwork->loadBranchRoles($id);
            if($query){
                echo json_encode($query,JSON_UNESCAPED_UNICODE);
            }else{
                echo json_encode(array('error'=> TRUE,'message'=> 'No result found'));
            }
        }else{
            echo json_encode(array('error'=> TRUE,'message'=> 'No result found!!!'));
        }
        
    }
    public function ajaxLoadGymResourcesAssetsArtwork(){
        $query = $this->resourcesresourcesassetsartwork->loadGymResourcesAssetsArtwork();
        if($query){
            echo json_encode($query,JSON_UNESCAPED_UNICODE);
        }else{
            echo json_encode(array('error'=> TRUE,'message'=> 'No result found'));
        }
    }

    public function insertGymResourcesAssetsArtworkFromAjax(){
        $this->form_validation->set_rules('resourcesassetsartworkame','Resources AssetsArtwork Name','required');
        $this->form_validation->set_rules('description','Description','required');
        $this->form_validation->set_rules('showtobranchrole','Branch','required');
        $this->form_validation->set_rules('showtobranch','Role','required');
        $showtobranchrole = $this->input->post('showtobranchrole');
        $showtobranch = $this->input->post('showtobranch');
        $document = $this->uploadPhoto();
        $mapping = array();
        $details = array();
        $details['ResourcesAssetsArtworkName'] = $this->input->post('resourcesassetsartworkname');
        $details['Description'] = $this->input->post('description');
        $details['DocumentLink'] = $document;
        $details['DisplayOrderIndex'] = $this->input->post('displayorder');
        $details['DeleteStatus'] = $this->input->post('resourcesassetsartworkdeletestatus');
        $details['ResourcesAssetsArtworkStatus'] = $this->input->post('resourcesassetsartworkactivitystatus');
        $details['QueryInformation'] = $this->input->post('queryinformation');
        $details['AddedBy'] = $this->session->userdata('UserID');
        $details['AddedDate'] = date('Y-m-d');

        $showtobranch = explode(",", $this->input->post('showtobranch'));
        $showtobranchrole = explode(",", $this->input->post('showtobranchrole'));
        foreach($showtobranchrole AS $value){
            foreach($showtobranch AS $val){
                array_push($mapping,array(
                    'ShowToBranchRole' => $value,
                    'ShowToBranch' => $val,
                    'DeleteStatus' => $this->input->post('resourcesassetsartworkdeletestatus'),
                    'ResourcesAssetsArtworkStatus' => $this->input->post('resourcesassetsartworkactivitystatus'),
                    'AddedBy' => $this->session->userdata('UserID'),
                    'AddedDate' => date('Y-m-d')
                ));
            }
        }



        if(!empty(form_error('document'))){
            echo json_encode(array('error'=> TRUE,'message'=> form_error('document')));
        }else{    
            if($this->resourcesresourcesassetsartwork->duplicate_checker('gymresourcesassetsartwork','DocumentLink',$document) == TRUE){
                echo json_encode(array('error'=> TRUE,'message'=>  'Document Name already existing!'));
            }else{
                if($this->resourcesresourcesassetsartwork->resourcesassetsartworktype_checker($details['ResourcesAssetsArtworkName']) == TRUE){
                    echo json_encode(array('error'  => TRUE,'message'   =>  'Resources AssetsArtwork already existing!'));
                }else{
                    $result = $this->resourcesresourcesassetsartwork->addGymResourcesAssetsArtwork($details,$mapping);
                    if($result){
                        echo json_encode(array('error'  =>  FALSE,'message'  =>  'Resources AssetsArtwork successfully added!'));
                    }
                }
            }
        }







        
        
        
    }
    public function updateGymResourcesAssetsArtworkFromAjax(){
        $id = $this->input->post('assetsartworkresourcesID');
        $this->form_validation->set_rules('resourcesassetsartworkame','Resources AssetsArtwork Name','required');
        $this->form_validation->set_rules('description','Description','required');
        $this->form_validation->set_rules('showtobranchrole','Branch','required');
        $this->form_validation->set_rules('showtobranch','Role','required');
        $showtobranchrole = $this->input->post('showtobranchrole');
        $showtobranch = $this->input->post('showtobranch');
        $document = $this->uploadPhoto();
        $mapping = array();
        $details = array();
        $details['ResourcesAssetsArtworkName'] = $this->input->post('resourcesassetsartworkname');
        $details['Description'] = $this->input->post('description');
        $details['DocumentLink'] = $document;
        $details['DisplayOrderIndex'] = $this->input->post('displayorder');
        $details['DeleteStatus'] = $this->input->post('resourcesassetsartworkdeletestatus');
        $details['ResourcesAssetsArtworkStatus'] = $this->input->post('resourcesassetsartworkactivitystatus');
        $details['QueryInformation'] = $this->input->post('queryinformation');
        $details['AddedBy'] = $this->session->userdata('UserID');
        $details['AddedDate'] = date('Y-m-d');

        $showtobranch = explode(",", $this->input->post('showtobranch'));
        $showtobranchrole = explode(",", $this->input->post('showtobranchrole'));
        foreach($showtobranchrole AS $value){
            foreach($showtobranch AS $val){
                array_push($mapping,array(
                    'ShowToBranchRole' => $value,
                    'ShowToBranch' => $val,
                    'DeleteStatus' => $this->input->post('resourcesassetsartworkdeletestatus'),
                    'ResourcesAssetsArtworkStatus' => $this->input->post('resourcesassetsartworkactivitystatus'),
                    'AddedBy' => $this->session->userdata('UserID'),
                    'AddedDate' => date('Y-m-d')
                ));
            }
        }



        if(!empty(form_error('document'))){
            echo json_encode(array('error'=> TRUE,'message'=> form_error('document')));
        }else{    
            if($this->resourcesresourcesassetsartwork->duplicate_checker('gymresourcesassetsartwork','DocumentLink',$document) == TRUE){
                echo json_encode(array('error'=> TRUE,'message'=>  'Document Name already existing!'));
            }else{
                if($this->resourcesresourcesassetsartwork->resourcesassetsartworktype_checker($details['ResourcesAssetsArtworkName']) == TRUE){
                    echo json_encode(array('error'  => TRUE,'message'   =>  'Resources AssetsArtwork already existing!'));
                }else{
                    $result = $this->resourcesresourcesassetsartwork->updateGymResourcesAssetsArtwork($details,$mapping,$id);
                    if($result){
                        echo json_encode(array('error'  =>  FALSE,'message'  =>  'Resources AssetsArtwork successfully updated!'));
                    }
                }
            }
        }
    }



    public function uploadPhoto(){

        $config['upload_path']      = './assets/GymResourceAssetsArtwork/';
        $config['allowed_types']    = 'png|jpeg|jpg|pdf';
        $config['max_size']         = 2048;
        $config['encrypt_name']     = TRUE;//enncryp photo name
        // $config['file_name']            = $name;
        $config['max_size']         = '30000'; // Added Max Size
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
        
        if( ! empty($_FILES['document']['name'])){
            $this->load->library('upload', $config);
            if ( ! $this->upload->do_upload('document')){
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