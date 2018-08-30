<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GymContentBenefit extends CI_Controller {
        
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('gym/GymContentBenefit_','gymcontentbenefit');
        $this->load->model('gym/GymContent_','gymcontent');
    
    }

    public function loadBranch(){
        $id = $this->session->userdata('UserID');
        $query = $this->gymcontent->loadBranch($id);
        if($query){
            echo json_encode($query,JSON_UNESCAPED_UNICODE);
        }else{
            echo json_encode(array('error'=> TRUE,'message'=> 'No result found'));
        }
    }




    
    public function ajaxLoadBenefit(){
        $query = $this->gymcontentbenefit->loadAllBenefit();
        if($query){
            echo json_encode($query,JSON_UNESCAPED_UNICODE);
        }else{
            echo json_encode(array('error'=> TRUE,'message'=> 'No result found'));
        }
    }
    public function insertGymContentBenefitFromAjax(){
        $this->form_validation->set_rules('benefitname','Benefit Name','required');
        $this->form_validation->set_rules('showtobranch','Show to Branch','required');
        $this->form_validation->set_rules('description','Benefit Description','required');
        $this->form_validation->set_rules('category','Benefit Category','required');
        if($this->gymcontent->duplicate_checker('gymcontentbenefit','BenefitName',$this->input->post('benefitname')) == TRUE){
            echo json_encode(array('error'=> TRUE,'message'=>  'Benefit Name already existing!'));
        }else{
            $data_input = array(
                'BenefitName' =>  $this->input->post('benefitname'),
                'BenefitDescription'   => $this->input->post('description'),
                'BenefitCategory'   => $this->input->post('category'),
                'BenefitStatus'   => $this->input->post('benefitstatus'),
                'DeleteStatus'   => $this->input->post('deletestatus'),
                'AddedBy'=>  $this->session->userdata('UserID'),
                'AddedDate'=> date('Y-m-d')
            );
            $showtobranch = $this->input->post('showtobranch');
            $data_show = array();
            if(!empty($showtobranch)){
                foreach($showtobranch AS $key=> $value){
                    $data_show[$key] =   array(
                        'ShowToBranch' =>  $value,
                        'BenefitStatus'   => $this->input->post('benefitstatus'),
                        'DeleteStatus'   => $this->input->post('deletestatus'),
                        'AddedBy'=>  $this->session->userdata('UserID'),
                        'AddedDate'=> date('Y-m-d')
                    );
                }
            }
            
            $result = $this->gymcontentbenefit->addGymContentBenefit($data_input,$data_show);
            if($result){
                echo json_encode(array('error'=> FALSE,'message'=> 'Benefit added!'));
            }
        }
    }
    public function updateGymContentBenefitFromAjax(){
        $this->form_validation->set_rules('benefitname','Benefit Name','required');
        $this->form_validation->set_rules('showtobranch','Show to Branch','required');
        $this->form_validation->set_rules('description','Benefit Description','required');
        $this->form_validation->set_rules('category','Benefit Category','required');

        $id =$this->input->post('benefitID');
        if($this->gymcontent->duplicate_checker('gymcontentbenefit','BenefitName',$this->input->post('benefitname')) == TRUE){
            echo json_encode(array('error'=> TRUE,'message'=>  'Benefit Name already existing!'));
        }else{
            $data_input = array(
                'BenefitName' =>  $this->input->post('benefitname'),
                'BenefitDescription'   => $this->input->post('description'),
                'BenefitCategory'   => $this->input->post('category'),
                'BenefitStatus'   => $this->input->post('benefitstatus'),
                'DeleteStatus'   => $this->input->post('deletestatus'),
                'UpdatedBy'=>  $this->session->userdata('UserID'),
                'UpdatedDate'=> date('Y-m-d')
            );
            $data_show = array();
            $showtobranch = $this->input->post('showtobranch');
            if(!empty($showtobranch)){
                foreach($showtobranch AS $key=> $value){
                    $data_show[$key] =   array(
                        'ShowToBranch' =>  $value,
                        'BenefitStatus'   => $this->input->post('benefitstatus'),
                        'DeleteStatus'   => $this->input->post('deletestatus'),
                        'UpdatedBy'=>  $this->session->userdata('UserID'),
                        'UpdatedDate'=> date('Y-m-d')
                    );
                }
            }
            


            $result = $this->gymcontentbenefit->updateGymContentBenefit($data_input,$data_show,$id);
            if($result){
                echo json_encode(array('error'=> FALSE,'message'=> 'Benefit updated!'));
            }
        }
    }
}