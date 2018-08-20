<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
        
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Login_model');
    }

    public function index(){
        $data['title'] = 'Getfit247';
        $this->load->view('login',$data);
    }
    public function indexadmin(){
        $data['title'] = 'Getfit247';
        $this->load->view('loginadmin',$data);
    }
    public function login(){
        $this->form_validation->set_rules('username','Username','trim');
        $this->form_validation->set_rules('password','Password','trim|callback_authentication');
        if($this->form_validation->run() == FALSE){
            $this->index();
        }else{
            redirect('Welcome');
        }
    }
    public function loginadmin(){
        $this->form_validation->set_rules('username','Username','trim');
        $this->form_validation->set_rules('password','Password','trim|callback_authentication');
        if($this->form_validation->run() == FALSE){
            $this->index();
        }else{
            redirect('Welcome');
        }
    }
    public function authentication($password){
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $query = $this->Login_model->login($username,$password);
        if($query){
            return TRUE;
        }else{
            $this->form_validation->set_message('authentication', 'Invalid account');
            return FALSE;
        }
    }  
}