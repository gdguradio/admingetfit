<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MasterDataMenu extends CI_Controller {
        
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('masterdata/MasterDataMenu_','masterdatamenu');
    
    }

    public function index(){
        $data['title'] = 'Master Data Menu Information';
        $this->load->view('templates/header');
    	$this->load->view('templates/navigation');
        $this->load->view('masterdata/menuinformation',$data);
        $this->load->view('templates/footer');
    }
    public function menulist(){
        $data['title'] = 'Master Data MenuList';
        $this->load->view('templates/header');
    	$this->load->view('templates/navigation');
        $this->load->view('masterdata/menulist',$data);
        $this->load->view('templates/footer');

    }
    public function loadlink(){
        // $class_methods = get_class_methods('MasterDataMenu');
        // echo json_encode(array_slice($class_methods, 2),JSON_UNESCAPED_UNICODE);
        $myObj = 'MasterDataMenu';
        $methods = array(
            "Welcome",
            "MainUserInformation/mainUserlist",
            "MainGymInformation/maingymlist",
            "FranchiseUserInformation/franchiseUserlist",
            "FranchiseGymInformation/franchisegymlist",
            "GymContent",
            "ShowGymPhases",
            "ShowGymResources",
            "GymResourcesMarketing/resourcesmarketinglist",
            "GymResourcesCampaign/resourcescampaignlist",
            "GymResourcesDigitalSocialMedia/resourcesdigitalsocialmedialist",
            "GymResourcesAssetsArtwork/resourcesassetsartworklist",
            "MasterDataGymPhase/gymphaselist",
            "MasterDataSubGymPhase/subgymphaselist",
            "MasterDataAdminImageGallery/imagelist",
            "MasterDataBulletinBoard/bulletinboardlist",
            "MasterDataTrainingImage/imagelist",
            "MasterDataTrainingVideo/videolist",
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
    public function ajaxLoadMenu(){
        $query = $this->masterdatamenu->loadMenu();
        if($query){
            echo json_encode($query,JSON_UNESCAPED_UNICODE);
        }else{
            echo json_encode(array('error'=> TRUE,'message'=> 'No result found'));
        }
    }

    public function insertMasterDataMenuFromAjax(){
        $this->form_validation->set_rules('menuname','Menu Name','required');
        $this->form_validation->set_rules('description','Description','required');
        $this->form_validation->set_rules('menulink','Link','required');
        $this->form_validation->set_rules('displayorder','Display Order','required');
        
        $data_input =   array(
            'MenuName' =>  $this->input->post('menuname'),
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
    public function updateMasterDataMenuFromAjax(){
        $this->form_validation->set_rules('menuname','Menu Name','required');
        $this->form_validation->set_rules('description','Description','required');
        $this->form_validation->set_rules('menulink','Link','required');
        $id = $this->input->post('menuID');
        $this->form_validation->set_rules('displayorder','Display Order','required');
        
        $data_input =   array(
            'MenuName' =>  $this->input->post('menuname'),
            'Description'   => $this->input->post('description'),
            'HasChild'   => $this->input->post('haschild'),
            'Link'   => $this->input->post('menulink'),
            'FaIcon'   => $this->input->post('menuicon'),
            'MenuStatus'   => $this->input->post('menustatus'),
            'DeleteStatus'   => $this->input->post('deletestatus'),
            'UpdatedBy'=>  $this->session->userdata('UserID'),
            'DisplayOrderIndex'   => $this->input->post('displayorder'),
            'UpdatedDate'=> date('Y-m-d')
        );
        if($this->masterdatamenu->duplicate_checker('masterdatamenu','MenuName',$data_input['MenuName']) == TRUE){
            echo json_encode(array('error'=> TRUE,'message'=>  'Menu Name already existing!'));
        }else{
            $result = $this->masterdatamenu->updateMenu($data_input,$id);
            if($result){
                echo json_encode(array('error'=> FALSE,'message'=> 'Menu Updated!'));
            }
        }
    }
    public function deleteMasterDataMenuFromAjax(){
        $id = $this->input->post('menuID');
        $data_input =   array(
            'DeleteStatus'   => "yes",
            'UpdatedBy'=>  $this->session->userdata('UserID'),
            'UpdatedDate'=> date('Y-m-d')
        );
        $result = $this->masterdatamenu->deleteMenu($data_input,$id);
        if($result){
            echo json_encode(array('error'=> FALSE,'message'=> 'Menu Deleted!'));
        }
    }

}