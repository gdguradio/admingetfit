<?php
class MasterDataBaseUrl_ extends CI_Model{
    
    public function ajaxLoadResources($roleid,$branchid){
        $result = array();
        array_push($result,array(
            'Marketing'   =>  $this->ajaxLoadMarketing($roleid,$branchid),
            'Campaign'   =>  $this->ajaxLoadCampaign($roleid,$branchid),
            'AssetsArtwork'   =>  $this->ajaxLoadAssetsArtwork($roleid,$branchid),
            'DigitalSocialMedia'   =>  $this->ajaxLoadDigitalSocialMedia($roleid,$branchid)
        ));
        return $result;
    }
    public function ajaxLoadMarketing($roleid,$branchid){
        $this->db->where('A.ResourcesMarketingStatus',"yes");
        $this->db->where('A.DeleteStatus',"no");
        $this->db->where('B.ShowToBranch',$branchid);
        $this->db->where('B.ShowToBranchRole',$roleid);
        $query = $this->db->select('*,A.SysID AS DetailsID,B.SysID AS sysID')
                ->from('gymresourcesmarketing as A')
                ->join('gymresourcesmarketingshowto as B ',' A.SysID = B.gymresourcesmarketingID','inner')
                ->get();
        if($query){
            if($query->num_rows() > 0){
                $result = array();
                foreach($query->result() as $x){
                    array_push($result,array(
                        'ResourcesMarketingName'    =>  $x->ResourcesMarketingName,
                        'sysID'    =>  $x->sysID,
                        'Description' => $x->Description,
                        'DocumentLink'   =>  $x->DocumentLink,
                        'AddedDate'   =>  $x->AddedDate,
                        'QueryInformation'   =>  $x->QueryInformation,
                        'BranchName' => $this->getbullenshowto_byid($x->DetailsID,"BranchName,B.SysID AS BranchID,EmailAddress,ContactPerson,BranchType",$roleid,$branchid,"gymresourcesmarketingshowto","gymresourcesmarketingID","resourcesmarketingStatus"),
                        'RoleName' => $this->getbullenshowto_byid($x->DetailsID,"RoleName,C.SysID AS roleID",$roleid,$branchid,"gymresourcesmarketingshowto","gymresourcesmarketingID","resourcesmarketingStatus"),
                        'Access' => $this->getbullenshowto_byid($x->DetailsID,"BranchName,RoleName,C.SysID AS roleID,B.SysID AS BranchID",$roleid,$branchid,"gymresourcesmarketingshowto","gymresourcesmarketingID","resourcesmarketingStatus")
                    ));
                }
                // $this->output->enable_profiler(TRUE);      
                return $result;
            }
        }
    }
    public function ajaxLoadCampaign($roleid,$branchid){
        $this->db->where('A.resourcescampaignStatus',"yes");
        $this->db->where('A.DeleteStatus',"no");
        $this->db->where('B.ShowToBranch',$branchid);
        $this->db->where('B.ShowToBranchRole',$roleid);
        $query = $this->db->select('*,A.SysID AS DetailsID,B.SysID AS sysID')
                ->from('gymresourcescampaign as A')
                ->join('gymresourcescampaignshowto as B ',' A.SysID = B.gymresourcescampaignID','inner')
                ->get();
        if($query){
            if($query->num_rows() > 0){
                $result = array();
                foreach($query->result() as $x){
                    array_push($result,array(
                        'ResourcesCampaignName'    =>  $x->ResourcesCampaignName,
                        'sysID'    =>  $x->sysID,
                        'Description' => $x->Description,
                        'DocumentLink'   =>  $x->DocumentLink,
                        'AddedDate'   =>  $x->AddedDate,
                        'QueryInformation'   =>  $x->QueryInformation,
                        'BranchName' => $this->getbullenshowto_byid($x->DetailsID,"BranchName,B.SysID AS BranchID,EmailAddress,ContactPerson,BranchType",$roleid,$branchid,"gymresourcescampaignshowto","gymresourcescampaignID","resourcescampaignStatus"),
                        'RoleName' => $this->getbullenshowto_byid($x->DetailsID,"RoleName,C.SysID AS roleID",$roleid,$branchid,"gymresourcescampaignshowto","gymresourcescampaignID","resourcescampaignStatus"),
                        'Access' => $this->getbullenshowto_byid($x->DetailsID,"BranchName,RoleName,C.SysID AS roleID,B.SysID AS BranchID",$roleid,$branchid,"gymresourcescampaignshowto","gymresourcescampaignID","resourcescampaignStatus")
                    ));
                }
                // $this->output->enable_profiler(TRUE);      
                return $result;
            }
        }
    }
    public function ajaxLoadAssetsArtwork($roleid,$branchid){
        $this->db->where('A.resourcesassetsartworkStatus',"yes");
        $this->db->where('A.DeleteStatus',"no");
        $this->db->where('B.ShowToBranch',$branchid);
        $this->db->where('B.ShowToBranchRole',$roleid);
        $query = $this->db->select('*,A.SysID AS DetailsID,B.SysID AS sysID')
                ->from('gymresourcesassetsartwork as A')
                ->join('gymresourcesassetsartworkshowto as B ',' A.SysID = B.gymresourcesassetsartworkID','inner')
                ->get();
        if($query){
            if($query->num_rows() > 0){
                $result = array();
                foreach($query->result() as $x){
                    array_push($result,array(
                        'ResourcesAssetsArtworkName'    =>  $x->ResourcesAssetsArtworkName,
                        'sysID'    =>  $x->sysID,
                        'Description' => $x->Description,
                        'DocumentLink'   =>  $x->DocumentLink,
                        'AddedDate'   =>  $x->AddedDate,
                        'QueryInformation'   =>  $x->QueryInformation,
                        'BranchName' => $this->getbullenshowto_byid($x->DetailsID,"BranchName,B.SysID AS BranchID,EmailAddress,ContactPerson,BranchType",$roleid,$branchid,"gymresourcesassetsartworkshowto","gymresourcesassetsartworkID","resourcesassetsartworkStatus"),
                        'RoleName' => $this->getbullenshowto_byid($x->DetailsID,"RoleName,C.SysID AS roleID",$roleid,$branchid,"gymresourcesassetsartworkshowto","gymresourcesassetsartworkID","resourcesassetsartworkStatus"),
                        'Access' => $this->getbullenshowto_byid($x->DetailsID,"BranchName,RoleName,C.SysID AS roleID,B.SysID AS BranchID",$roleid,$branchid,"gymresourcesassetsartworkshowto","gymresourcesassetsartworkID","resourcesassetsartworkStatus")
                    ));
                }
                // $this->output->enable_profiler(TRUE);      
                return $result;
            }
        }
    }
    public function ajaxLoadDigitalSocialMedia($roleid,$branchid){
        $this->db->where('A.resourcesdigitalsocialmediaStatus',"yes");
        $this->db->where('A.DeleteStatus',"no");
        $this->db->where('B.ShowToBranch',$branchid);
        $this->db->where('B.ShowToBranchRole',$roleid);
        $query = $this->db->select('*,A.SysID AS DetailsID,B.SysID AS sysID')
                ->from('gymresourcesdigitalsocialmedia as A')
                ->join('gymresourcesdigitalsocialmediashowto as B ',' A.SysID = B.gymresourcesdigitalsocialmediaID','inner')
                ->get();
        if($query){
            if($query->num_rows() > 0){
                $result = array();
                foreach($query->result() as $x){
                    array_push($result,array(
                        'ResourcesDigitalSocialMediaName'    =>  $x->ResourcesDigitalSocialMediaName,
                        'sysID'    =>  $x->sysID,
                        'Description' => $x->Description,
                        'DocumentLink'   =>  $x->DocumentLink,
                        'AddedDate'   =>  $x->AddedDate,
                        'QueryInformation'   =>  $x->QueryInformation,
                        'BranchName' => $this->getbullenshowto_byid($x->DetailsID,"BranchName,B.SysID AS BranchID,EmailAddress,ContactPerson,BranchType",$roleid,$branchid,"gymresourcesdigitalsocialmediashowto","gymresourcesdigitalsocialmediaID","resourcesdigitalsocialmediaStatus"),
                        'RoleName' => $this->getbullenshowto_byid($x->DetailsID,"RoleName,C.SysID AS roleID",$roleid,$branchid,"gymresourcesdigitalsocialmediashowto","gymresourcesdigitalsocialmediaID","resourcesdigitalsocialmediaStatus"),
                        'Access' => $this->getbullenshowto_byid($x->DetailsID,"BranchName,RoleName,C.SysID AS roleID,B.SysID AS BranchID",$roleid,$branchid,"gymresourcesdigitalsocialmediashowto","gymresourcesdigitalsocialmediaID","resourcesdigitalsocialmediaStatus")
                    ));
                }
                // $this->output->enable_profiler(TRUE);      
                return $result;
            }
        }
    }
    public function getbullenshowto_byid($SysID,$columnname,$roleid = NULL , $branchid= NULL, $table,$tableID,$status ){
        if($SysID != NULL){
            $this->db->where('A.'.$tableID,$SysID);
        }
        if($roleid != NULL && $branchid != NULL){
            $this->db->where('A.ShowToBranch',$branchid);
            $this->db->where('A.ShowToBranchRole',$roleid);
        }
        $this->db->distinct();
        $this->db->where('A.'.$status,"yes");
        $this->db->where('A.DeleteStatus',"no");
        $query = $this->db->select($columnname)
                ->from($table.' AS A')
                ->join('branchdetails as B ',' B.SysID = A.ShowToBranch','inner')
                ->join('masterdatarole as C ',' C.SysID = A.ShowToBranchRole','inner')
                ->get();
        if($query){
            if($query->num_rows() > 0){
                return $query->result();
            }
        } 
    }
}