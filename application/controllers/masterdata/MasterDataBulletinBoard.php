<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MasterDataBulletinBoard extends CI_Controller {
        
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('masterdata/MasterDataBulletinBoard_','bulletinboard');
    
    }

    public function index(){
        $data['title'] = 'Master Data Bulletin Board Information';
        $this->load->view('templates/header');
    	$this->load->view('templates/navigation');
        $this->load->view('masterdata/menuinformation',$data);
        $this->load->view('templates/footer');
    }
    public function bulletinboardlist(){
        $data['title'] = 'Master Data Bulletin Board';
        $this->load->view('templates/header');
    	$this->load->view('templates/navigation');
        $this->load->view('masterdata/bulletinboardlist',$data);
        $this->load->view('templates/footer');

    }


    public function loadAllusers(){
        $query = $this->bulletinboard->loadAllusers();
        if($query){
            echo json_encode($query,JSON_UNESCAPED_UNICODE);
        }else{
            echo json_encode(array('error'=> TRUE,'message'=> 'No result found'));
        }
    }
    public function loadBranch(){
        $id = $this->session->userdata('UserID');
        $query = $this->bulletinboard->loadBranch($id);
        if($query){
            echo json_encode($query,JSON_UNESCAPED_UNICODE);
        }else{
            echo json_encode(array('error'=> TRUE,'message'=> 'No result found'));
        }
    }
    public function loadBranchRoles(){
        $id = $this->input->post('branchID');
        if(isset($id)){
            $query = $this->bulletinboard->loadBranchRoles($id);
            if($query){
                echo json_encode($query,JSON_UNESCAPED_UNICODE);
            }else{
                echo json_encode(array('error'=> TRUE,'message'=> 'No result found'));
            }
        }else{
            echo json_encode(array('error'=> TRUE,'message'=> 'No result found!!!'));
        }
        
    }
    public function ajaxLoadBulletinBoard(){
        $query = $this->bulletinboard->loadBulletinBoard();
        if($query){
            echo json_encode($query,JSON_UNESCAPED_UNICODE);
        }else{
            echo json_encode(array('error'=> TRUE,'message'=> 'No result found'));
        }
        
    }
    public function loadBulletinBoardFromAjax(){
        $query = $this->bulletinboard->loadBulletinBoardFromAjax();
        if($query){
            echo json_encode($query,JSON_UNESCAPED_UNICODE);
        }else{
            echo json_encode(array('error'=> TRUE,'message'=> 'No result found'));
        }
    }

    
    public function ajaxLoadMenu(){
        $query = $this->bulletinboard->loadMenu();
        if($query){
            echo json_encode($query,JSON_UNESCAPED_UNICODE);
        }else{
            echo json_encode(array('error'=> TRUE,'message'=> 'No result found'));
        }
    }

    public function insertMasterDataBulletinBoardFromAjax(){

        $data = $this->input->post('data');
        $showtobranchrole = $this->input->post('showtobranchrole');
        $showtobranch = $this->input->post('showtobranch');
        $entrytype = $this->input->post('entrytype');
        $entrytitle = $this->input->post('entrytitle');
        $entryfrom = $this->input->post('entryfrom');
        $entryindex = $this->input->post('entryindex');
        $description = $this->input->post('description');
        $deletestatus = $this->input->post('deletestatus');
        $bulletinboardstatus = $this->input->post('bulletinboardstatus');

        

        $this->form_validation->set_rules('entrytype','Entry Type','required');
        $this->form_validation->set_rules('entrytitle','Entry Title','required');
        $this->form_validation->set_rules('entryfrom','Entry From','required');
        $this->form_validation->set_rules('entryindex','Display Order','required');
        $this->form_validation->set_rules('description','Description','required');
        $this->form_validation->set_rules('showtobranchrole','Branch','required');
        $this->form_validation->set_rules('showtobranch','Branch Role','required');
        $mapping = array();
        $details = array();
        $details['EntryType'] = $entrytype;
        $details['EntryTitle'] = $entrytitle;
        $details['EntryFrom'] = $entryfrom;
        $details['EntryDescription'] = $description;
        $details['EntryOrderIndex'] = $entryindex;
        $details['DeleteStatus'] = $deletestatus;
        $details['EntryStatus'] = $bulletinboardstatus;
        $details['AddedBy'] = $this->session->userdata('UserID');
        $details['AddedDate'] = date('Y-m-d');
        foreach($showtobranchrole AS $value){
            foreach($showtobranch AS $val){
                array_push($mapping,array(
                    'ShowToBranchRole' => $value,
                    'EntryShowToBranch' => $val,
                    // 'EntryType' => $entrytype,
                    // 'EntryTitle' => $entrytitle,
                    // 'EntryFrom'=> $entryfrom,
                    // 'EntryDescription' => $description,
                    'EntryStatus' => $bulletinboardstatus,
                    'DeleteStatus' => $deletestatus,
                    'AddedBy' => $this->session->userdata('UserID'),
                    'AddedDate' => date('Y-m-d')
                ));
            }
        }
        if($this->bulletinboard->duplicate_checker('masterdatabulletinboarddetails','EntryTitle',$details['EntryTitle']) == TRUE){
            echo json_encode(array('error'=> TRUE,'message'=>  'Entry Title Name already existing!'));
        }else{
            $result = $this->bulletinboard->addBulletinBoard($details,$mapping);
            if($result){
                echo json_encode(array('error'=> FALSE,'message'=> 'Entry added!'));
            }
        }
        
    }
    public function updateMasterDataBulletinBoardFromAjax(){
        $data = $this->input->post('data');
        $showtobranchrole = $this->input->post('showtobranchrole');
        $showtobranch = $this->input->post('showtobranch');
        $entrytype = $this->input->post('entrytype');
        $entrytitle = $this->input->post('entrytitle');
        $entryfrom = $this->input->post('entryfrom');
        $entryindex = $this->input->post('entryindex');
        $description = $this->input->post('description');
        $bulletinboardID = $this->input->post('bulletinboardID');
        $deletestatus = $this->input->post('deletestatus');
        $bulletinboardstatus = $this->input->post('bulletinboardstatus');



        $this->form_validation->set_rules('entrytype','Entry Type','required');
        $this->form_validation->set_rules('entrytitle','Entry Title','required');
        $this->form_validation->set_rules('entryfrom','Entry From','required');
        $this->form_validation->set_rules('entryindex','Display Order','required');
        $this->form_validation->set_rules('description','Description','required');
        $this->form_validation->set_rules('showtobranchrole','Branch','required');
        $this->form_validation->set_rules('showtobranch','Branch Role','required');

        $mapping = array();
        $details = array();
        $details['EntryType'] = $entrytype;
        $details['EntryTitle'] = $entrytitle;
        $details['EntryFrom'] = $entryfrom;
        $details['EntryDescription'] = $description;
        $details['EntryOrderIndex'] = $entryindex;
        $details['EntryStatus'] = $bulletinboardstatus;
        $details['DeleteStatus'] = $deletestatus;
        $details['UpdatedBy'] = $this->session->userdata('UserID');
        $details['UpdatedDate'] = date('Y-m-d');
        foreach($showtobranchrole AS $value){
            foreach($showtobranch AS $val){
                array_push($mapping,array(
                    'ShowToBranchRole' => $value,
                    'EntryShowToBranch' => $val,
                    // 'EntryType' => $entrytype,
                    // 'EntryTitle' => $entrytitle,
                    // 'EntryFrom'=> $entryfrom,
                    // 'EntryDescription' => $description,
                    'EntryStatus' => $bulletinboardstatus,
                    'DeleteStatus' => $deletestatus,
                    'AddedBy' => $this->session->userdata('UserID'),
                    'AddedDate' => date('Y-m-d'),
                    'UpdatedBy' => $this->session->userdata('UserID'),
                    'UpdatedDate' => date('Y-m-d')
                ));
            }
        }
        if($this->bulletinboard->bulletinboard_type_checker($details['EntryTitle'],$bulletinboardID) == TRUE){
            echo json_encode(array('error'  => TRUE,'message'   =>  'Entry Title already existing!'));
        }else{
            $result = $this->bulletinboard->updateBulletinBoard($details,$mapping,$bulletinboardID);
            if($result){
                echo json_encode(array('error'  =>  FALSE,'message'  =>  'Entry Title successfully updated!'));
            }
        } 
    }
}