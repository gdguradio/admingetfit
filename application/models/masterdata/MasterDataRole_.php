<?php
class MasterDataRole_ extends CI_Model{
    
    public function loadRole($id=NULL){
        $this->db->where('RoleStatus',"yes");
        $this->db->where('DeleteStatus',"no");
        $query = $this->db->from('masterdatarole')
                ->get();
        if($query){
            if($query->num_rows() > 0){
                $result = array();
                foreach($query->result() as $x){
                    array_push($result,array(
                        'SysID'    =>  $x->SysID,
                        'RoleName' => $x->RoleName,
                        'Description'   =>  $x->Description,
                        'RoleAccess'   =>  $x->RoleAccess,
                        'AddedBy'   =>  $x->AddedBy,
                        'AddedDate'   =>  $x->AddedDate,
                        'UpdatedBy'   =>  $x->UpdatedBy,
                        'UpdatedDate'   =>  $x->UpdatedDate,
                        'menu_list' => $this->getmenulist_byid($x->SysID)
                    ));
                }
                return $result;
            }
        }
        // if($id!=NULL){
        //     $this->db->where('A.SysID',$id);
        // }
        // $query = $this->db->select('A.*')
        //         ->from('masterdatarole as A')
        //         ->get();
        // if($query){
        //     if($query->num_rows() > 0){
        //         return $query->result();
        //     }
        // }
    }

    public function getmenulist_byid($id){
        $query = $this->db->from('masterdatarolemapping')
                ->where('MasterDataRoleID',$id)
                ->get();
        if($query){
            return $query->result();
        }
    }
    public function addRole($data_array,$tmp_menulist){
        $this->db->trans_start();
        $this->db->insert('masterdatarole',$data_array);
        $last_id = $this->db->insert_id();
        $menu_list = array();
        foreach($tmp_menulist as $i){
            array_push($menu_list,array(
                'MasterDataRoleID' => $last_id,
                'ItemNumber' => $i['code_id'],
                'ItemLevel' => $i['level'],
                'ItemSysID' => $i['page_name'],
                'ItemLink'=> $i['link'],
                'RoleAccess' => $i['access'],
                'AddedBy' => $i['AddedBy'],
                'AddedDate' => $i['AddedDate']
            ));
        }
        $this->db->insert_batch('masterdatarolemapping',$menu_list);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE){
            return FALSE;
        }
        else{
            return TRUE;
        }
    }
    public function updateRole($data_array,$tmp_menulist,$id){
        $this->db->trans_start();
        $this->db->where('SysID',$id);
        $this->db->update('masterdatarole',$data_array); 
        $menu_list = array();
        foreach($tmp_menulist as $i){
            array_push($menu_list,array(
                'MasterDataRoleID' => $id,
                'ItemNumber' => $i['code_id'],
                'ItemLevel' => $i['level'],
                'ItemSysID' => $i['page_name'],
                'ItemLink'=> $i['link'],
                'RoleAccess' => $i['access'],
                'UpdatedDate' => $i['UpdatedDate'],
                'UpdatedBy' => $i['UpdatedBy']
            ));
        }
        $this->db->where('MasterDataRoleID',$id);
        $this->db->delete('masterdatarolemapping');
        $this->db->insert_batch('masterdatarolemapping',$menu_list);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE){
            return FALSE;
        }else{
            return TRUE;
        }
    }
    //menu
    public function loadMenu($haschild = NULL){
        if($haschild !== NULL){
            $this->db->where('HasChild',$haschild);
        }
        $this->db->where('MenuStatus',"yes");
        $this->db->where('DeleteStatus',"no");
        $this->db->order_by('DisplayOrderIndex', 'ASC');
        $query = $this->db->get('masterdatamenu');
        if($query){
            if($query->num_rows() > 0){
                $arr = $query->result();
                for($x = 0; $x < COUNT($arr); $x++){
                    if(strtolower($arr[$x]->HasChild) == 'yes'){
                        $arr[$x]->child_list = $this->loadSubmenu($arr[$x]->SysID);
                    }
                }
                return $arr;
                
                //return $query->result();
            }
        }
    }
	//submenu
    public function loadSubmenu($menuid = NULL,$haschild = NULL)
    {
        if($menuid != NULL)
        {
            $this->db->where('MenuNameID',$menuid);
        }
        if($haschild != NULL){
            $this->db->where('HasChild',$haschild);
        }
        $this->db->where('SubmenuStatus',"yes");
        $this->db->where('DeleteStatus',"no");
        $this->db->order_by('DisplayOrderIndex', 'ASC');
        $query = $this->db->get('masterdatasubmenu');
        if($query){
            if($query->num_rows() > 0){
                $arr = $query->result();
                for($x = 0; $x < COUNT($arr); $x++){
                    if(strtolower($arr[$x]->HasChild) == 'yes'){
                        $arr[$x]->child_list = $this->loadScreen($arr[$x]->SysID);
                    }
                }
                return $arr;
                
                //return $query->result();
            }
        }
    }
	//screen
    public function loadScreen($submenuid = NULL){
        if($submenuid != NULL){
            $this->db->where('SubMenuNameID',$submenuid);
        }
        $this->db->where('ScreenStatus',"yes");
        $this->db->where('DeleteStatus',"no");
        $this->db->order_by('DisplayOrderIndex', 'ASC');
        $query = $this->db->get('masterdatascreen');
        if($query){
            if($query->num_rows() > 0){
                return $query->result();
            }
        }
    }
    //check access rights
    public function hasAccess($page_id,$level){
        $query = $this->db->select('RoleAccess')
                ->from('masterdatarolemapping')
                ->where('ItemLevel',$level)
                ->where('ItemSysID',$page_id)
                ->where('MasterDataRoleID',$this->session->userdata('roleID'))
                ->get();
        if($query){
            if($query->num_rows() > 0){
                $data = $query->row();
                return $data->RoleAccess;
            }
        }
   
    }





    public function role_type_checker($role_type,$id = NULL){
        $this->db->where('RoleName',$role_type);
        if($id != NULL){
            $this->db->where('SysID !=',$id);
        }
        $query = $this->db->select('RoleName')
                ->from('masterdatarole')
                ->get();
        if($query){
            if($query->num_rows() > 0){
                return TRUE;
                //role type exist
            }else{
                return FALSE;
            }
        }       
    }

    public function get_menu()
    {
        $menu = array(
            /*SYSTEM MANAGEMENT*/
            array('code_id'=> 'm-1','level'=> 1,'page_name'=> 'System Management','has_child'=> 'yes','parent_code'=> 'none','link'=> '',
                'child_list'=> array(
                    /*User Management*/
                    array('code_id'=> 'm-1-1','level'=> 2,'page_name'=> 'User Management','has_child'=> 'yes','parent_code'=> 'm-1','link'=> '',
                        'child_list'=> array(
                            /*User Registration*/
                            array('code_id'=> 'm-1-1-1','level'=> 3,'page_name'=> 'User Registration','has_child'=> 'no','parent_code'=> 'm-1-1','link'=> 'User_management/user_registration',),
                            /*User List*/ 
                            array('code_id'=> 'm-1-1-2','level'=> 3,'page_name'=> 'User List','has_child'=> 'no','parent_code'=> 'm-1-1','link'=> 'User_management/user_list',)
                        )
                    ),
                    /*Role Management*/
                    array('code_id'=> 'm-1-2','level'=> 2,'page_name'=> 'Role Management','has_child'=> 'no','parent_code'=> 'm-1','link'=> 'Role_management',)
                )
            ),
            /*Master Data Management*/
            array('code_id'=> 'm-2','id'=> 2,'level'=> 1,'page_name'=> 'Master Data Management','has_child'=> 'yes','parent_code'=> 'none','link'=> '',
                'child_list'=> array(
                    /*Organization Master*/
                    array('code_id'=> 'm-2-1','level'=> 2,'page_name'=> 'Organization Master','has_child'=> 'yes','parent_code'=> 'm-2','link'=> '',
                        'child_list'=> array(
                            /*Entity Registration*/
                            array('code_id'=> 'm-2-1-1','level'=> 3,'page_name'=> 'Entity Registration','has_child'=> 'no','parent_code'=> 'm-2-1','link'=> 'Organization_master/entity',),
                            /*Division Registration*/ 
                            array('code_id'=> 'm-2-1-2','level'=> 3,'page_name'=> 'Division Registration','has_child'=> 'no','parent_code'=> 'm-2-1','link'=> 'Organization_master/division',),
                            /*Office Registration*/ 
                            array('code_id'=> 'm-2-1-3','level'=> 3,'page_name'=> 'Office Registration','has_child'=> 'no','parent_code'=> 'm-2-1','link'=> 'Organization_master/office',),
                            /*Responsibility Center Code Registration*/ 
                            array('code_id'=> 'm-2-1-4','level'=> 3,'page_name'=> 'RC Code Registration','has_child'=> 'no','parent_code'=> 'm-2-1','link'=> 'Organization_master/rc_code',),
                            /*Title/Position Management*/ 
                            array('code_id'=> 'm-2-1-5','level'=> 3,'page_name'=> 'Title/Position Management','has_child'=> 'no','parent_code'=> 'm-2-1','link'=> 'Organization_master/user_title',)
                        )
                    )
                )
            )
            
        );
        
        return $menu;
    }
}