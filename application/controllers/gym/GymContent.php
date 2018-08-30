<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GymContent extends CI_Controller {
        
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
    
    }

    public function index(){
        
        $data['title'] = 'Gym Content';
        $this->load->view('templates/header');
    	$this->load->view('templates/navigation');
        $this->load->view('gym/gymcontent',$data);
        $this->load->view('templates/footer');
    }
    
}