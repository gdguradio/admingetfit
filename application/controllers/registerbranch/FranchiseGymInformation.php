<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FranchiseGymInformation extends CI_Controller {
        
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Login_model');
        $this->load->model('registerbranch/FranchiseGymInformation_','franchisegyminformation');
    
    }

    public function index(){
        $data['title'] = 'Franchise Gym Information';
        $this->load->view('templates/header');
    	$this->load->view('templates/navigation');
        $this->load->view('registerbranch/franchisegyminformation',$data);
        $this->load->view('templates/footer');
    }
    public function franchisegymlist(){
        $data['title'] = 'Franchise Gym Information';
        $this->load->view('templates/header');
    	$this->load->view('templates/navigation');
        $this->load->view('registerbranch/franchisegymlist',$data);
        $this->load->view('templates/footer');
    }
    public function searchBranchFromAjax(){
        $result = $this->franchisegyminformation->load_branch();
        if($result){
            echo json_encode($result,JSON_UNESCAPED_UNICODE);
        }else{
            echo json_encode(array('error'=> TRUE,'message'=> 'No result found.'));
        }
    }

    public function ajaxLoadBranch(){
        $result = $this->franchisegyminformation->loadFranchiseBranchInformation();
        if($result){
            echo json_encode($result,JSON_UNESCAPED_UNICODE);
        }else{
            echo json_encode(array('error'=> TRUE,'message'=> 'No result found.'));
        }
    }
    public function loadBranch(){
        $result = $this->franchisegyminformation->loadBranch();
        if($result){
            echo json_encode($result,JSON_UNESCAPED_UNICODE);
        }else{
            echo json_encode(array('error'=> TRUE,'message'=> 'No result found.'));
        }
    }

    public function loadfranchiseGymInformation(){
        $result = $this->franchisegyminformation->loadFranchiseBranchInformation();
        if($result){
            echo json_encode($result,JSON_UNESCAPED_UNICODE);
        }else{
            echo json_encode(array('error'=> TRUE,'message'=> 'No result found.'));
        }
    }

    
    public function updateBranchFromAjax(){

        $this->form_validation->set_rules('branchname','Branch Name','required');
        $this->form_validation->set_rules('contactperson','Contact Person','required');
        $this->form_validation->set_rules('emailaddress','Email Address','required');
        $this->form_validation->set_rules('barangayname','Barangay Name','required');
        $this->form_validation->set_rules('cityname','City Name','required');
        $this->form_validation->set_rules('provincename','Province Name','required');
        $this->form_validation->set_rules('regionname','Region Name','required');
        $this->form_validation->set_rules('countryname','Country Name','required');
        $this->form_validation->set_rules('zipcode','Zip Code','required');
        
        
        $id = $this->input->post('branchID');
        if($this->form_validation->run() == FALSE){
            echo json_encode(array('error'=> TRUE,'message'=> 'All fields with * are required'));
        }else{
            $params = array(
                'BranchName'=> $this->input->post('branchname'),
                'ContactPerson'=> $this->input->post('contactperson'),
                'EmailAddress'=> $this->input->post('emailaddress'),
                'LandlineNumber'=> $this->input->post('landlinenumber'),
                'MobileNumber'=> $this->input->post('mobilenumber'),
                'HouseNumber'=> $this->input->post('housenumber'),
                'Lot'=> $this->input->post('lotnumber'),
                'Block'=> $this->input->post('blocknumber'),
                'Phase'=> $this->input->post('phasenumber'),
                'FloorNumber'=> $this->input->post('floornumber'),
                'BuildingName'=> $this->input->post('buildingname'),
                'StreetName'=> $this->input->post('streetname'),
                'PurokName'=> $this->input->post('purokname'),
                'SubdivisionName'=> $this->input->post('subdivisionname'),
                'BarangayName'=> $this->input->post('barangayname'),
                'CityName'=> $this->input->post('cityname'),
                'ProvinceName'=> $this->input->post('provincename'),
                'RegionName'=> $this->input->post('regionname'),
                'CountryName'=> $this->input->post('countryname'),
                'ZipCode'=> $this->input->post('zipcode'),
                'BranchType'=> $this->input->post('branchtype'),


                'UpdatedBy'=>  $this->session->userdata('UserID'),
                'UpdatedDate'=> date('Y-m-d'),
                'BranchStatus'=> $this->input->post('branchstatus'),
                'DeleteStatus'=> $this->input->post('deletestatus')
            );

            $query = $this->franchisegyminformation->updategymbranch($params,$id);
            if($query){

                echo json_encode(array('error'=> FALSE,'message'=> 'Branch updated'));
            }else{
                echo json_encode(array('error'=> TRUE,'message'=> 'Failed'));
            }
        }
    }

    public function insertBranchFromAjax(){


        $this->form_validation->set_rules('branchname','Branch Name','required');
        $this->form_validation->set_rules('contactperson','Contact Person','required');
        $this->form_validation->set_rules('emailaddress','Email Address','required');
        $this->form_validation->set_rules('barangayname','Barangay Name','required');
        $this->form_validation->set_rules('cityname','City Name','required');
        $this->form_validation->set_rules('provincename','Province Name','required');
        $this->form_validation->set_rules('regionname','Region Name','required');
        $this->form_validation->set_rules('countryname','Country Name','required');
        $this->form_validation->set_rules('zipcode','Zip Code','required');
        
        
        
        if($this->form_validation->run() == FALSE){
            echo json_encode(array('error'=> TRUE,'message'=> 'All fields with * are required'));
        }else{
            $params = array(
                'BranchName'=> $this->input->post('branchname'),
                'ContactPerson'=> $this->input->post('contactperson'),
                'EmailAddress'=> $this->input->post('emailaddress'),
                'LandlineNumber'=> $this->input->post('landlinenumber'),
                'MobileNumber'=> $this->input->post('mobilenumber'),
                'HouseNumber'=> $this->input->post('housenumber'),
                'Lot'=> $this->input->post('lotnumber'),
                'Block'=> $this->input->post('blocknumber'),
                'Phase'=> $this->input->post('phasenumber'),
                'FloorNumber'=> $this->input->post('floornumber'),
                'BuildingName'=> $this->input->post('buildingname'),
                'StreetName'=> $this->input->post('streetname'),
                'PurokName'=> $this->input->post('purokname'),
                'SubdivisionName'=> $this->input->post('subdivisionname'),
                'BarangayName'=> $this->input->post('barangayname'),
                'CityName'=> $this->input->post('cityname'),
                'ProvinceName'=> $this->input->post('provincename'),
                'RegionName'=> $this->input->post('regionname'),
                'CountryName'=> $this->input->post('countryname'),
                'ZipCode'=> $this->input->post('zipcode'),
                'BranchType'=> $this->input->post('branchtype'),
                


                'AddedBy'=>  $this->session->userdata('UserID'),
                'AddedDate'=> date('Y-m-d'),
                'BranchStatus'=> $this->input->post('branchstatus'),
                'DeleteStatus'=> $this->input->post('deletestatus'),
            );

            $query = $this->franchisegyminformation->addgymbranch($params);
            if($query){

                echo json_encode(array('error'=> FALSE,'message'=> 'Branch added'));
            }else{
                echo json_encode(array('error'=> TRUE,'message'=> 'Failed'));
            }
        }
    }
}