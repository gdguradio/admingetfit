<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {
        
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Login_model');
        $this->load->model('Register_','register');
    
    }

    public function index(){
        $data['title'] = 'Getfit247 Register Login';
        $this->load->view('templates/header');
    	$this->load->view('templates/navigation');
        $this->load->view('Register/registergymmainlogin',$data);
        $this->load->view('templates/footer');
    }


    public function branch(){
        $data['title'] = 'Getfit247 Register Branch';
        $this->load->view('templates/header');
    	$this->load->view('templates/navigation');
        $this->load->view('Register/registergymmainbranch',$data);
        $this->load->view('templates/footer');
    }

    public function searchBranchFromAjax(){
        $result = $this->register->load_branch();
        if($result){
            echo json_encode($result,JSON_UNESCAPED_UNICODE);
        }else{
            echo json_encode(array('error'=> TRUE,'message'=> 'No result found.'));
        }
    }


    public function insertGymLoginFromAjax(){
        $this->form_validation->set_rules('branchid','Branch Name','required');
        $this->form_validation->set_rules('firstname','First Name','required');
        $this->form_validation->set_rules('lastname','Last Name','required');
        // $this->form_validation->set_rules('middlename','Middle Name','required');
        // $this->form_validation->set_rules('suffix','Suffix','required');
        $this->form_validation->set_rules('username','Username','required');
        $this->form_validation->set_rules('password','Password','required');
        $this->form_validation->set_rules('email','Email Address','required');
        $this->form_validation->set_rules('landlinenumber','Landline Number','required');
        $this->form_validation->set_rules('mobilenumber','Mobile','required');
        
        
        $uniqueusername = $this->register->duplicate_checker('gymmainlogin','UserName',$this->input->post('username'));
        $uniqueemail = $this->register->duplicate_checker('gymmainlogin','EmailAddress',$this->input->post('email'));

        if($this->form_validation->run() == FALSE){
            echo json_encode(array('error'=> TRUE,'message'=> 'All fields with * are required'));
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
                            'BranchDetailsID'=> $this->input->post('mobilenumber'),
            
            
            
                            'AddedBy'=> 1,
                            'AddedDate'=> date('Y-m-d'),
                            'UpdatedBy'=> 0,
                            'UpdatedDate'=> "-",
                            'LoginStatus'=> "-",
                            'DeleteStatus'=> "-"
                        );
            
                        $query = $this->register->add_gymmainlogin($params);
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
    public function insertBranchFromAjax(){
        $this->form_validation->set_rules('branchname','Branch Name','required');
        $this->form_validation->set_rules('contactperson','Contact Person','required');
        $this->form_validation->set_rules('emailaddress','Email Address','required');
        $this->form_validation->set_rules('landlinenumber','Landline Number','required');
        $this->form_validation->set_rules('mobilenumber','Mobile Number','required');
        $this->form_validation->set_rules('housenumber','House Number','required');
        $this->form_validation->set_rules('lotnumber','Lot Number','required');
        $this->form_validation->set_rules('blocknumber','Block Number','required');
        $this->form_validation->set_rules('phasenumber','Phase Number','required');
        $this->form_validation->set_rules('floornumber','Floor Number','required');
        $this->form_validation->set_rules('buildingname','Building Name','required');
        $this->form_validation->set_rules('streetname','Street Name','required');
        $this->form_validation->set_rules('purokname','Purok Name','required');
        $this->form_validation->set_rules('subdivisionname','Subdivision Name','required');
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




                'AddedBy'=> 1,
                'AddedDate'=> date('Y-m-d'),
                'UpdatedBy'=> 0,
                'UpdatedDate'=> "-",
                'BranchStatus'=> "-",
                'DeleteStatus'=> "-"
            );

            $query = $this->register->add_gymbranch($params);
            if($query){

                echo json_encode(array('error'=> FALSE,'message'=> 'Branch added'));
            }else{
                echo json_encode(array('error'=> TRUE,'message'=> 'Failed'));
            }
        }
    }
}