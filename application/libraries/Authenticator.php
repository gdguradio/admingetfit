<?php
class Authenticator{
    
    protected $CI;

    // We'll use a constructor, as you can't directly call a function
    // from a property definition.
    public function __construct()
    {
            // Assign the CodeIgniter super-object
            $this->CI =& get_instance();
            $this->CI->load->model('Page_protector_model','protector');
            $this->webticator();            
    }

    
    public function webticator()
    {
        $active_controller = strtolower($this->CI->uri->segment(1));
        $active_function = strtolower($this->CI->uri->segment(2));
            
        if(empty($this->CI->session->userdata('UserID'))){
            if($active_controller != 'login' && ($active_function != '' || $active_function != 'index')){
                redirect('Login');
            }
        }
        else{
            if($active_controller == 'login' && ($active_function == '' || $active_function == 'index')){
                redirect('Welcome');
            }else{
                if($this->CI->protector->page_access() == FALSE){
                    redirect('Not_found');
                }
            }
        }
    }
}

