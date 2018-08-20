<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MasterDataRole extends CI_Controller {
        
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('masterdata/MasterDataRole_','masterdatarole');
    
    }

    public function index(){
        
        $data['title'] = 'Master Data Role Information';
        $this->load->view('templates/header');
    	$this->load->view('templates/navigation');
        $this->load->view('masterdata/roleinformation',$data);
        $this->load->view('templates/footer');
    }

    
    public function rolelist(){
        $data['menu']= $this->masterdatarole->loadMenu();
        $data['title'] = 'Master Data Role List';
        $this->load->view('templates/header');
    	$this->load->view('templates/navigation');
        $this->load->view('masterdata/rolelist',$data);
        $this->load->view('templates/footer');

    }

    public function ajaxLoadRole(){
        $query = $this->masterdatarole->loadRole();
        if($query){
            echo json_encode($query,JSON_UNESCAPED_UNICODE);
        }else{
            echo json_encode(array('error'=> TRUE,'message'=> 'No result found'));
        }
    }

    public function insertMasterDataRoleFromAjax(){
        $this->form_validation->set_rules('rolename','Role Name','required');
        $this->form_validation->set_rules('description','Description','required');
        $this->form_validation->set_rules('access','Access Rights','required');
        $data_input =   array(
            'RoleName' =>  $this->input->post('rolename'),
            'Description'   => $this->input->post('description'),
            'RoleAccess'   => $this->input->post('access'),
            'AddedBy'=>  $this->session->userdata('UserID'),
            'AddedDate'=> date('Y-m-d')
        );
        $menu_list = $this->input->post('menu_list');

        $menu_list = $this->input->post('menu_list');
        foreach($menu_list as $key=>$value){
            $menu_list[$key]['AddedBy'] = $this->session->userdata('UserID');
            $menu_list[$key]['AddedDate'] = date('Y-m-d');
        }
        if($this->masterdatarole->role_type_checker($data_input['RoleName']) == TRUE){
            echo json_encode(array('error'  => TRUE,'message'   =>  'Role Name already existing!'));
        }else{
            $result = $this->masterdatarole->addRole($data_input,$menu_list);
            if($result){
                echo json_encode(array('error'  =>  FALSE,'message'  =>  'Role successfully added!'));
            }
        }
        
    }
    public function updateMasterDataRoleFromAjax(){
        $id =   $this->input->post('id');
        $data_input =   array(
            'RoleName' =>  $this->input->post('rolename'),
            'Description'   => $this->input->post('description'),
            'RoleAccess'   => $this->input->post('access'),
            'UpdatedBy'=>  $this->session->userdata('UserID'),
            'UpdatedDate'=> date('Y-m-d')
        ); 
        $menu_list = $this->input->post('menu_list');
        foreach($menu_list as $key=>$value){
            $menu_list[$key]['UpdatedBy'] = $this->session->userdata('UserID');
            $menu_list[$key]['UpdatedDate'] = date('Y-m-d');
        }
        if($this->masterdatarole->role_type_checker($data_input['RoleName'],$id) == TRUE){
            echo json_encode(array('error'  => TRUE,'message'   =>  'Role Name already existing!'));
        }else{
            $result = $this->masterdatarole->updateRole($data_input,$menu_list,$id);
            if($result){
                echo json_encode(array('error'  =>  FALSE,'message'  =>  'Role successfully updated!'));
            }
        } 
    }
}