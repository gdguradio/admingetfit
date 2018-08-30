<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GymContentFaqs extends CI_Controller {
        
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('gym/GymContentFaqs_','gymcontentfaqs');
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




    
    public function ajaxLoadFaqs(){
        $query = $this->gymcontentfaqs->loadAllFaqs();
        if($query){
            echo json_encode($query,JSON_UNESCAPED_UNICODE);
        }else{
            echo json_encode(array('error'=> TRUE,'message'=> 'No result found'));
        }
    }
    public function insertGymContentFaqsFromAjax(){
        $this->form_validation->set_rules('question','Question','required');
        $this->form_validation->set_rules('showtobranch','Show to Branch','required');
        $this->form_validation->set_rules('description','Description','required');
        if($this->gymcontent->duplicate_checker('gymcontentfaqs','Question',$this->input->post('question')) == TRUE){
            echo json_encode(array('error'=> TRUE,'message'=>  'Question already existing!'));
        }else{
            $data_input = array(
                'Question' =>  $this->input->post('question'),
                'Description'   => $this->input->post('faqsdescription'),
                'FaqsStatus'   => $this->input->post('faqsstatus'),
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
                        'FaqsStatus'   => $this->input->post('faqsstatus'),
                        'DeleteStatus'   => $this->input->post('deletestatus'),
                        'AddedBy'=>  $this->session->userdata('UserID'),
                        'AddedDate'=> date('Y-m-d')
                    );
                }
            }
            $result = $this->gymcontentfaqs->addGymContentFaqs($data_input,$data_show);
            if($result){
                echo json_encode(array('error'=> FALSE,'message'=> 'Faqs added!'));
            }
        }
    }
    public function updateGymContentFaqsFromAjax(){
        $this->form_validation->set_rules('question','Question','required');
        $this->form_validation->set_rules('description','Description','required');

        $id =$this->input->post('faqsID');
        if($this->gymcontent->duplicate_checker('gymcontentfaqs','Question',$this->input->post('question')) == TRUE){
            echo json_encode(array('error'=> TRUE,'message'=>  'Question already existing!'));
        }else{
            $data_input = array(
                'Question' =>  $this->input->post('question'),
                'Description'   => $this->input->post('faqsdescription'),
                'FaqsStatus'   => $this->input->post('faqsstatus'),
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
                        'FaqsStatus'   => $this->input->post('faqsstatus'),
                        'DeleteStatus'   => $this->input->post('deletestatus'),
                        'UpdatedBy'=>  $this->session->userdata('UserID'),
                        'UpdatedDate'=> date('Y-m-d')
                    );
                }
            }
            


            $result = $this->gymcontentfaqs->updateGymContentFaqs($data_input,$data_show,$id);
            if($result){
                echo json_encode(array('error'=> FALSE,'message'=> 'Faqs updated!'));
            }
        }
    }
}