<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MasterDataScreen extends CI_Controller {
        
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('masterdata/MasterDataScreen_','masterdatascreen');
    
    }

    public function index(){
        $data['title'] = 'Master Data Screen Information';
        $this->load->view('templates/header');
    	$this->load->view('templates/navigation');
        $this->load->view('masterdata/screeninformation',$data);
        $this->load->view('templates/footer');
    }
    public function screenlist(){
        $data['title'] = 'Master Data Screen List';
        $this->load->view('templates/header');
    	$this->load->view('templates/navigation');
        $this->load->view('masterdata/screenlist',$data);
        $this->load->view('templates/footer');

    }



    public function loadlink(){
        // $class_methods = get_class_methods('MasterDataMenu');
        // echo json_encode(array_slice($class_methods, 2),JSON_UNESCAPED_UNICODE);
        $myObj = 'MasterDataMenu';
        $methods = array(
            "Welcome",
            "MasterDataAdminImageGallery/imagelist",
            "MasterDataBulletinBoard/bulletinboardlist",
            "MasterDataTrainingImage/imagelist",
            "MasterDataTrainingVideo/videolist",
            "MainUserInformation/mainUserlist",
            "MainGymInformation/maingymlist",
            "FranchiseUserInformation/franchiseUserlist",
            "FranchiseGymInformation/franchisegymlist",
            "MasterDataMenu/menulist",
            "MasterDataSubMenu/submenulist",
            "MasterDataScreen/screenlist",
            "MasterDataRole/rolelist",
            "MasterDataPosition/positionlist");
        // foreach (get_class_methods($myObj) as $method) {
        //     if ((strpos( $method, 'index' ) !== false || strpos( $method, 'list' ) !== false) && $method !== 'index' ) {
        //         $methods[] = $method;
        //     }
        // }
        // print_r($methods);
        echo json_encode($methods,JSON_UNESCAPED_UNICODE);
    }
    public function loadmenu(){
        $query = $this->masterdatascreen->loadMenu();
        if($query){
            echo json_encode($query,JSON_UNESCAPED_UNICODE);
        }else{
            echo json_encode(array('error'=> TRUE,'message'=> 'No result found'));
        }
    }
    public function loadsubmenu(){
        $id = $this->input->post('id');
        $query = $this->masterdatascreen->loadSubMenu($id);
        if($query){
            echo json_encode($query,JSON_UNESCAPED_UNICODE);
        }else{
            echo json_encode(array('error'=> TRUE,'message'=> 'No result found'));
        }
    }

    public function ajaxLoadScreen(){
        $query = $this->masterdatascreen->loadScreen();
        if($query){
            echo json_encode($query,JSON_UNESCAPED_UNICODE);
        }else{
            echo json_encode(array('error'=> TRUE,'message'=> 'No result found'));
        }
    }

    public function insertMasterDataScreenFromAjax(){
        $this->form_validation->set_rules('screenname','Screen Name','required');
        $this->form_validation->set_rules('description','Description','required');
        $this->form_validation->set_rules('screenlink','Screen Link','required');
        $this->form_validation->set_rules('submenuid','SubMenu Name','required');
        
        $data_input =   array(
            'ScreenName' =>  $this->input->post('screenname'),
            'Description'   => $this->input->post('description'),
            'Link'   => $this->input->post('screenlink'),
            'SubMenuNameID'   => $this->input->post('submenuid'),
            'FaIcon'   => $this->input->post('screenicon'),
            'ScreenStatus'   => $this->input->post('screenstatus'),
            'DeleteStatus'   => $this->input->post('deletestatus'),
            'AddedBy'=>  $this->session->userdata('UserID'),
            'AddedDate'=> date('Y-m-d')
        );
        $screen_list = $this->input->post('screen_list');
        if($this->masterdatascreen->screentype_checker($data_input['ScreenName']) == TRUE){
            echo json_encode(array('error'  => TRUE,'message'   =>  'Screen Name already existing!'));
        }else{
            $result = $this->masterdatascreen->addScreen($data_input,$screen_list);
            if($result){
                echo json_encode(array('error'  =>  FALSE,'message'  =>  'Screen successfully added!'));
            }
        }
        
    }
    public function updateMasterDataScreenFromAjax(){
        $id = $this->input->post('screenid');
        $this->form_validation->set_rules('screenname','Screen Name','required');
        $this->form_validation->set_rules('description','Description','required');
        $this->form_validation->set_rules('screenlink','Screen Link','required');
        $this->form_validation->set_rules('submenuid','SubMenu Name','required');
        
        $data_input =   array(
            'ScreenName' =>  $this->input->post('screenname'),
            'Description'   => $this->input->post('description'),
            'Link'   => $this->input->post('screenlink'),
            'SubMenuNameID'   => $this->input->post('submenuid'),
            'FaIcon'   => $this->input->post('screenicon'),
            'ScreenStatus'   => $this->input->post('screenstatus'),
            'DeleteStatus'   => $this->input->post('deletestatus'),
            'UpdatedBy'=>  $this->session->userdata('UserID'),
            'UpdatedDate'=> date('Y-m-d')
        );
        if($this->masterdatascreen->duplicate_checker('masterdatascreen','ScreenName',$data_input['ScreenName']) == TRUE){
            echo json_encode(array('error'=> TRUE,'message'=>  'Screen Name already existing!'));
        }else{
            $result = $this->masterdatascreen->updateScreen($data_input,$id);
            if($result){
                echo json_encode(array('error'=> FALSE,'message'=> 'Screen Updated!'));
            }
        }
    }
}