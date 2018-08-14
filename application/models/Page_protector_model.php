<?php
class Page_protector_model extends CI_Model{
    
    public function page_access(){
        $link = (!empty($this->uri->segment(2)) ? $this->uri->segment(1).'/'.$this->uri->segment(2) : $this->uri->segment(1));
        // echo $link;
        $query = $this->db->select('RoleAccess')
                ->from('masterdatarolemapping')
                ->where('ItemLink',$link)
                ->get();
        if($query){
            if($query->num_rows() > 0){
                //if the page is registered, check if has an access
                $result = $query->row();
                if($result->RoleAccess === 'yes'){
                    return TRUE;
                }else if($result->RoleAccess === 'no'){
                    return FALSE;
                }
            }else{
                //if page is not registered to the menu, allow to load it
                return TRUE;
            }
        }else{
            return TRUE;
        }
    }
    
}

