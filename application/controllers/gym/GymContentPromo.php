<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GymContentPromo extends CI_Controller {
        
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('gym/GymContentPromo_','gymcontentpromo');
    
    }

    public function index(){
        
        $data['title'] = 'Gym Content';
        $this->load->view('templates/header');
    	$this->load->view('templates/navigation');
        $this->load->view('gym/gymcontent',$data);
        $this->load->view('templates/footer');
    }
    public function loadBranch(){
        $id = $this->session->userdata('UserID');
        $query = $this->gymcontentpromo->loadBranch($id);
        if($query){
            echo json_encode($query,JSON_UNESCAPED_UNICODE);
        }else{
            echo json_encode(array('error'=> TRUE,'message'=> 'No result found'));
        }
    }
    public function ajaxLoadPromo(){
        $query = $this->gymcontentpromo->loadAllPromo();
        if($query){
            echo json_encode($query,JSON_UNESCAPED_UNICODE);
        }else{
            echo json_encode(array('error'=> TRUE,'message'=> 'No result found'));
        }
    }
    public function insertGymContentPromoFromAjax(){
        $this->form_validation->set_rules('promoname','Promo Name','required');
        $this->form_validation->set_rules('showtobranch','Show to Branch','required');
        $this->form_validation->set_rules('description','Promo Description','required');
        $this->form_validation->set_rules('promodates','Promo Dates','required');
        $this->form_validation->set_rules('promoduration','Promo Duration','required');
        $this->form_validation->set_rules('promoamount','Promo Amountk','required');
        if($this->gymcontentpromo->duplicate_checker('gymcontentpromo','PromoName',$this->input->post('promoname')) == TRUE){
            echo json_encode(array('error'=> TRUE,'message'=>  'Promo Name already existing!'));
        }else{
            $data_input = array(
                'PromoName' =>  $this->input->post('promoname'),
                'PromoDescription'   => $this->input->post('description'),
                'PromoRegistration'   => $this->input->post('promodates'),
                'PromoDuration'   => $this->input->post('promoduration'),
                'PromoAmount'   => $this->input->post('promoamount'),
                'PromoStatus'   => $this->input->post('promostatus'),
                'DeleteStatus'   => $this->input->post('deletestatus'),
                'AddedBy'=>  $this->session->userdata('UserID'),
                'AddedDate'=> date('Y-m-d')
            );
            // print_r($this->input->post('showtobranch'));die();
            // $showtobranch = explode(",", $this->input->post('showtobranch'));
            $showtobranch = $this->input->post('showtobranch');
            foreach($showtobranch AS $key=> $value){
                $data_show[$key] =   array(
                    'ShowToBranch' =>  $value,
                    'PromoStatus'   => $this->input->post('promostatus'),
                    'DeleteStatus'   => $this->input->post('deletestatus'),
                    'AddedBy'=>  $this->session->userdata('UserID'),
                    'AddedDate'=> date('Y-m-d')
                );
            }
            $result = $this->gymcontentpromo->addGymContentPromo($data_input,$data_show);
            if($result){
                echo json_encode(array('error'=> FALSE,'message'=> 'Promo added!'));
            }
        }
    }
    public function updateGymContentPromoFromAjax(){
        $this->form_validation->set_rules('promoname','Promo Name','required');
        $this->form_validation->set_rules('showtobranch','Show to Branch','required');
        $this->form_validation->set_rules('description','Promo Description','required');
        $this->form_validation->set_rules('promodates','Promo Dates','required');
        $this->form_validation->set_rules('promoduration','Promo Duration','required');
        $this->form_validation->set_rules('promoamount','Promo Amountk','required');

        $id =$this->input->post('promoID');
        if($this->gymcontentpromo->duplicate_checker('gymcontentpromo','PromoName',$this->input->post('promoname')) == TRUE){
            echo json_encode(array('error'=> TRUE,'message'=>  'Promo Name already existing!'));
        }else{
            $data_input = array(
                'PromoName' =>  $this->input->post('promoname'),
                'PromoDescription'   => $this->input->post('description'),
                'PromoRegistration'   => $this->input->post('promodates'),
                'PromoDuration'   => $this->input->post('promoduration'),
                'PromoAmount'   => $this->input->post('promoamount'),
                'PromoStatus'   => $this->input->post('promostatus'),
                'DeleteStatus'   => $this->input->post('deletestatus'),
                'UpdatedBy'=>  $this->session->userdata('UserID'),
                'UpdatedDate'=> date('Y-m-d')
            );
            // print_r($this->input->post('showtobranch'));die();
            // $showtobranch = explode(",", $this->input->post('showtobranch'));
            $showtobranch = $this->input->post('showtobranch');
            foreach($showtobranch AS $key=> $value){
                $data_show[$key] =   array(
                    'ShowToBranch' =>  $value,
                    'PromoStatus'   => $this->input->post('promostatus'),
                    'DeleteStatus'   => $this->input->post('deletestatus'),
                    'UpdatedBy'=>  $this->session->userdata('UserID'),
                    'UpdatedDate'=> date('Y-m-d')
                );
            }
            $result = $this->gymcontentpromo->updateGymContentPromo($data_input,$data_show,$id);
            if($result){
                echo json_encode(array('error'=> FALSE,'message'=> 'Promo updated!'));
            }
        }
    }
}