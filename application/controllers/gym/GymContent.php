<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GymContent extends CI_Controller {
        
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('gym/GymContent_','gymcontent');
    
    }

    public function index(){
        
        $data['title'] = 'Gym Content';
        $this->load->view('templates/header');
    	$this->load->view('templates/navigation');
        $this->load->view('gym/gymcontent',$data);
        $this->load->view('templates/footer');
    }

    public function insertGymContentFromAjax(){
        $this->form_validation->set_rules('menuname','Menu Name','required');
        $this->form_validation->set_rules('description','Description','required');
        $this->form_validation->set_rules('menulink','Link','required');
        
        $data_input =   array(
            'MenuName' =>  $this->input->post('menuname'),
            'Description'   => $this->input->post('description'),
            'HasChild'   => $this->input->post('haschild'),
            'Link'   => $this->input->post('menulink'),
            'FaIcon'   => $this->input->post('menuicon'),
            'MenuStatus'   => $this->input->post('menustatus'),
            'DeleteStatus'   => $this->input->post('deletestatus'),
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
}