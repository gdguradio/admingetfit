<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MasterDataTrainingImage extends CI_Controller {
        
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('masterdata/MasterDataTrainingImage_','trainingimage');
    
    }

    public function index(){
        $data['title'] = 'Master Data Training Image Information';
        $this->load->view('templates/header');
    	$this->load->view('templates/navigation');
        $this->load->view('masterdata/menuinformation',$data);
        $this->load->view('templates/footer');
    }
    public function imagelist(){
        $data['title'] = 'Master Data Training Image Gallery';
        $this->load->view('templates/header');
    	$this->load->view('templates/navigation');
        $this->load->view('masterdata/trainingimagelist',$data);
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

    public function loadBranch(){
        $id = $this->session->userdata('UserID');
        $query = $this->trainingimage->loadBranch($id);
        if($query){
            echo json_encode($query,JSON_UNESCAPED_UNICODE);
        }else{
            echo json_encode(array('error'=> TRUE,'message'=> 'No result found'));
        }
    }
    public function ajaxLoadTrainingImage(){
        $query = $this->trainingimage->loadAllTrainingImage();
        if($query){
            echo json_encode($query,JSON_UNESCAPED_UNICODE);
        }else{
            echo json_encode(array('error'=> TRUE,'message'=> 'No result found'));
        }
    }
    public function loadTrainingImageFromAjax(){
        $query = $this->trainingimage->loadTrainingImage();
        if($query){
            echo json_encode($query,JSON_UNESCAPED_UNICODE);
        }else{
            echo json_encode(array('error'=> TRUE,'message'=> 'No result found'));
        }
    }
    public function insertMasterDataTrainingImageFromAjax(){
        $this->form_validation->set_rules('imagetitle','Image Title','required');
        $this->form_validation->set_rules('imageorder','Display Order','required');
        $photo = $this->uploadPhoto();
        if(!empty(form_error('photo'))){
            echo json_encode(array('error'=> TRUE,'message'=> form_error('photo')));
        }else{    
            if($this->trainingimage->duplicate_checker('masterdatatrainingimage','ImageLink',$photo) == TRUE){
                echo json_encode(array('error'=> TRUE,'message'=>  'Image Name already existing!'));
            }else{
                $data_input =   array(
                    'ImageTitle' =>  $this->input->post('imagetitle'),
                    'ImageDescription'   => $this->input->post('description'),
                    'ImageOrderIndex'   => $this->input->post('imageorder'),
                    'ImageStatus'   => $this->input->post('imagestatus'),
                    'DeleteStatus'   => $this->input->post('deletestatus'),
                    'ImageCategory'   => $this->input->post('imagecategory'),
                    'ImageLink'   => $photo,
                    'AddedBy'=>  $this->session->userdata('UserID'),
                    'AddedDate'=> date('Y-m-d')
                );
                $showtobranch = explode(",", $this->input->post('showtobranch'));
                foreach($showtobranch AS $key=> $value){
                    $data_show[$key] =   array(
                        'ShowToBranch' =>  $value,
                        'ImageStatus'   => $this->input->post('imagestatus'),
                        'DeleteStatus'   => $this->input->post('deletestatus'),
                        'AddedBy'=>  $this->session->userdata('UserID'),
                        'AddedDate'=> date('Y-m-d')
                    );
                }

                $result = $this->trainingimage->addTrainingImage($data_input,$data_show);
                if($result){
                    echo json_encode(array('error'=> FALSE,'message'=> 'Image added!'));
                }
            }
        }
    }
    public function updateMasterDataTrainingImageFromAjax(){
        $this->form_validation->set_rules('imagetitle','Image Title','required');
        $this->form_validation->set_rules('imageorder','Display Order','required');
        $id = $this->input->post('imagegalleryID');
        if(!empty(form_error('photo'))){
            // echo json_encode(array('error'=> TRUE,'message'=> form_error('photo')));
            $data_input =   array(
                'ImageTitle' =>  $this->input->post('imagetitle'),
                'ImageDescription'   => $this->input->post('description'),
                'ImageOrderIndex'   => $this->input->post('imageorder'),
                'ImageStatus'   => $this->input->post('imagestatus'),
                'DeleteStatus'   => $this->input->post('deletestatus'),
                'ImageCategory'   => $this->input->post('imagecategory'),
                'ImageLink'   => $photo,
                'UpdatedBy'=>  $this->session->userdata('UserID'),
                'UpdatedDate'=> date('Y-m-d')
            );
            $showtobranch = explode(",", $this->input->post('showtobranch'));
            foreach($showtobranch AS $key=> $value){
                $data_show[$key] =   array(
                    'ShowToBranch' =>  $value,
                    'ImageStatus'   => $this->input->post('imagestatus'),
                    'DeleteStatus'   => $this->input->post('deletestatus'),
                    'UpdatedBy'=>  $this->session->userdata('UserID'),
                    'UpdatedDate'=> date('Y-m-d')
                );
            }
            if($this->trainingimage->duplicate_checker('masterdatatrainingimage','ImageLink',$photo) == TRUE){
                echo json_encode(array('error'=> TRUE,'message'=>  'Image Name already existing!'));
            }else{
                $result = $this->trainingimage->updateTrainingImage($data_input,$data_show,$id);
                if($result){
                    echo json_encode(array('error'=> FALSE,'message'=> 'Image Updated!'));
                }
            }
        }else{    
            $photo = $this->uploadPhoto();
            if($this->trainingimage->duplicate_checker('masterdatatrainingimage','ImageLink',$photo) == TRUE){
                echo json_encode(array('error'=> TRUE,'message'=>  'Image Name already existing!'));
            }else{
                $data_input =   array(
                    'ImageTitle' =>  $this->input->post('imagetitle'),
                    'ImageDescription'   => $this->input->post('description'),
                    'ImageOrderIndex'   => $this->input->post('imageorder'),
                    'ImageStatus'   => $this->input->post('imagestatus'),
                    'DeleteStatus'   => $this->input->post('deletestatus'),
                    'ImageLink'   => $photo,
                    'UpdatedBy'=>  $this->session->userdata('UserID'),
                    'UpdatedDate'=> date('Y-m-d')
                );
                $showtobranch = explode(",", $this->input->post('showtobranch'));
                foreach($showtobranch AS $key=> $value){
                    $data_show[$key] =   array(
                        'ShowToBranch' =>  $value,
                        'ImageStatus'   => $this->input->post('imagestatus'),
                        'DeleteStatus'   => $this->input->post('deletestatus'),
                        'UpdatedBy'=>  $this->session->userdata('UserID'),
                        'UpdatedDate'=> date('Y-m-d')
                    );
                }
                if($this->trainingimage->duplicate_checker('masterdatatrainingimage','ImageLink',$photo) == TRUE){
                    echo json_encode(array('error'=> TRUE,'message'=>  'Image Name already existing!'));
                }else{
                    $result = $this->trainingimage->updateTrainingImage($data_input,$data_show,$id);
                    if($result){
                        echo json_encode(array('error'=> FALSE,'message'=> 'Image Updated!'));
                    }
                }
            }
        }
    }

    public function uploadPhoto(){

        $config['upload_path']      = './assets/TrainingImage/';
        $config['allowed_types']    = 'png|jpeg|jpg';
        $config['max_size']         = 2048;
        $config['encrypt_name']     = TRUE;//enncryp photo name
        // $config['file_name']            = $name;
        $config['max_size']         = '30000'; // Added Max Size
        $config['overwrite']        = TRUE;
        $config['max_width']        = 0;
        $config['max_height']       = 0;
        
        //load upload library
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        
        // check if folder exists
        
        if( ! is_dir($config['upload_path'])) {
        @mkdir($config['upload_path'], 0755, true);
        }
        
        if( ! empty($_FILES['photo']['name'])){
            $this->load->library('upload', $config);
            if ( ! $this->upload->do_upload('photo')){
                return FALSE;
            }
            else{
                return $this->upload->data('file_name');
            }
        }else{
            return NULL;
        }
    }
}