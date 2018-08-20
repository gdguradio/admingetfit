<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?=str_replace('_', ' ', $title);?>
        <small>Profile</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=site_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <!--<li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>-->
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-3">
                <!-- Profile Image -->
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url('assets/UserPhoto/'.$photo); ?>" alt="User profile picture">

                        <h3 class="profile-username text-center"><?=$userinfo[0]['FirstName']." ".$userinfo[0]['LastName']?></h3>

                        <p class="text-muted text-center"><?=$userinfo[0]['RoleName']?></p>

                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Change Password</b> <a class="pull-right">Click</a>
                            </li>
                            <li class="list-group-item">
                                <b>Change Profile Picture</b> <a class="pull-right">Click</a>
                            </li>
                            <li class="list-group-item">
                                <b>Secret Question</b> <a class="pull-right">Click</a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            
            <div class="col-md-9">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#branch" data-toggle="tab">Branch</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="active tab-pane" id="branch">
                            <table id="branchDetailsTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th width="20">#</th>
                                        <th width="120">Branch Name</th>
                                        <th width="340">Address</th>
                                        <th width="120">Contact Person</th>
                                        <th width="150">Contact Number</th>
                                        <th width="120">Email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	
		  
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
 
  
  
  
  
 
<script src="<?=site_url();?>assets/adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?=site_url();?>assets/adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>


<script>
$(document).ready(function(){
    loadBranchdetails();
})
function loadBranchdetails(){
    var site_url = '<?=site_url()?>';
    var userID = '<?=$this->uri->segment(4)?>';
    $.fn.dataTable.ext.errMode = 'none';
    $.fn.dataTable.ext.classes.sPageButton = 'page-link';
    // $.fn.dataTable.ext.classes.sTable = '';
    // $.fn.dataTable.ext.classes.sNoFooter = '';
    $('#branchDetailsTable').DataTable({
        destroy: true,
        lengthMenu: [[10, 20, -1], [10, 20, "All"]],
        "ajax": {
            "url": site_url +"registeruser/UserProfile/ajaxLoadBranch",
            "type": "POST",
            "data":{userID:userID},
            "dataSrc": function (data) {
                for (var i = 0; i < data.length; i++){
                    var mobile = data[i].MobileNumber ? data[i].MobileNumber : "";
                    var landline = data[i].LandLineNumber ? data[i].LandLineNumber : "";
                    var contact = "";
                    if(mobile.length > 0 && landline.length > 0){
                        contact = mobile+"/"+landline;
                    }else if(mobile.length > 0){
                        contact = mobile;
                    }else if(landline.length > 0){
                        contact = landline;
                    }
                    data[i]["ctr"] = i;
                }

                return data;
            }
        },
        "columns": [
            {"data": "ctr"},
            {"data": "BranchName"},
            {"data": "CityName"},
            {"data": "ContactPerson"},
            {"data": "MobileNumber"},
            {"data": "EmailAddress"}
        ],
        "bInfo":false
    });
}
</script>