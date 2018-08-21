<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MasterDataSubMenu extends CI_Controller {
        
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('masterdata/MasterDataSubMenu_','masterdatasubmenu');
    
    }

    public function index(){
        $data['title'] = 'Master Data Sub-Menu Information';
        $this->load->view('templates/header');
    	$this->load->view('templates/navigation');
        $this->load->view('masterdata/submenuinformation',$data);
        $this->load->view('templates/footer');
    }
    
    public function submenulist(){
        $data['title'] = 'Master Data Sub MenuList';
        $this->load->view('templates/header');
    	$this->load->view('templates/navigation');
        $this->load->view('masterdata/submenulist',$data);
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
            "MasterDataAdminImageGallery/imagelist",
            "MasterDataBulletinBoard/bulletinboardlist",
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
    public function loadmenu(){
        $query = $this->masterdatasubmenu->loadMenu();
        if($query){
            echo json_encode($query,JSON_UNESCAPED_UNICODE);
        }else{
            echo json_encode(array('error'=> TRUE,'message'=> 'No result found'));
        }
    }
    public function ajaxLoadSubMenu(){
        $query = $this->masterdatasubmenu->loadSubMenu();
        if($query){
            echo json_encode($query,JSON_UNESCAPED_UNICODE);
        }else{
            echo json_encode(array('error'=> TRUE,'message'=> 'No result found'));
        }
    }

    public function insertMasterDataSubMenuFromAjax(){
        $this->form_validation->set_rules('menuid','Menu Name','required');
        $this->form_validation->set_rules('submenuname','SubMenu Name','required');
        $this->form_validation->set_rules('description','Description','required');
        
        $data_input =   array(
            'SubMenuName' =>  $this->input->post('submenuname'),
            'Description'   => $this->input->post('description'),
            'HasChild'   => $this->input->post('haschild'),
            'Link'   => $this->input->post('submenulink'),
            'FaIcon'   => $this->input->post('submenuicon'),
            'MenuNameID'   => $this->input->post('menuid'),
            'SubmenuStatus'   => $this->input->post('submenustatus'),
            'DeleteStatus'   => $this->input->post('deletestatus'),
            'AddedBy'=>  $this->session->userdata('UserID'),
            'AddedDate'=> date('Y-m-d')
        );
        $submenu_list = $this->input->post('submenu_list');
        if($this->masterdatasubmenu->submenu_type_checker($data_input['SubMenuName']) == TRUE){
            echo json_encode(array('error'  => TRUE,'message'   =>  'SubMenu Name already existing!'));
        }else{
            $result = $this->masterdatasubmenu->addSubMenu($data_input);
            if($result){
                echo json_encode(array('error'  =>  FALSE,'message'  =>  'SubMenu successfully added!'));
            }
        }
        
    }
    public function updateMasterDataSubMenuFromAjax(){
        $this->form_validation->set_rules('menuid','Menu Name','required');
        $this->form_validation->set_rules('submenuname','SubMenu Name','required');
        $this->form_validation->set_rules('description','Description','required');
        $id = $this->input->post('submenuID');
        $data_input =   array(
            'SubMenuName' =>  $this->input->post('submenuname'),
            'Description'   => $this->input->post('description'),
            'HasChild'   => $this->input->post('haschild'),
            'Link'   => $this->input->post('submenulink'),
            'FaIcon'   => $this->input->post('submenuicon'),
            'MenuNameID'   => $this->input->post('menuid'),
            'SubmenuStatus'   => $this->input->post('submenustatus'),
            'DeleteStatus'   => $this->input->post('deletestatus'),
            'UpdatedBy'=>  $this->session->userdata('UserID'),
            'UpdatedDate'=> date('Y-m-d')
        );
        if($this->masterdatasubmenu->duplicate_checker('masterdatasubmenu','SubMenuName',$data_input['SubMenuName']) == TRUE){
            echo json_encode(array('error'=> TRUE,'message'=>  'Sub Menu Name already existing!'));
        }else{
            $result = $this->masterdatasubmenu->updateSubMenu($data_input,$id);
            if($result){
                echo json_encode(array('error'=> FALSE,'message'=> 'Sub Menu Updatead!'));
            }
        }
    }
}