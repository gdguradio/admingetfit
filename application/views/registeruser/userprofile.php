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
        <li><a href="<?=site_url().''.'Welcome';?>"><i class="fa fa-dashboard"></i>Home</a></li>
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
                                <b>Change Password</b> <a href="#" class="pull-right useraction" data-action="pass" data-toggle='modal' data-target='#changepasswordModal'><i class="fa fa-lock"></i>Click</a>
                            </li>
                            <li class="list-group-item">
                                <b>Update Profile</b> <a href="#" class="pull-right useraction" data-action="profile" data-toggle='modal' data-target='#mainUserModal'><i class="fa fa-user"></i>Click</a>
                            </li>
                            <li class="list-group-item">
                                <b>Secret Question</b> <a href="#" class="pull-right useraction" data-toggle='modal' data-target='#'><i class="fa fa-dashboard"></i>Click</a>
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
                                        <!-- <th width="20">#</th> -->
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
<!-- change password start  -->
<div class="modal fade" id="changepasswordModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Profile - Change Password</h4>
        </div>
        <div class="modal-body">
            <form role="form">
            <div class="col-sm-12 focus_top" tabindex="1">
                <div class="alert alert-success" id="af_alert" role="alert" style="display:none">
                <span class="af_alert_message"></span>
                </div>
                <div class="alert alert-danger" id="af_alert" role="alert" style="display:none">
                <span class="af_alert_message"></span>
                </div>
            </div>
            <div class="box-body">
                <input type="hidden" id="userID1" />
                <div class="form-group">
                <label for="username">Username</label>
                <input type="username" class="form-control" name="username1" id="username1" disabled="true">
                </div>

                <div class="form-group">
                <label for="password">Password <span class="tcolor_red">*</span></label>
                <input type="password" class="form-control" id="password1" placeholder="Password">
                </div>

                <div class="form-group">
                <label for="password_confirmation">Confirm Password <span class="tcolor_red">*</span></label>
                <input type="password" class="form-control" id="password_confirmation1" placeholder="Confirm Password">
                </div>

            </div>
                <!-- /.box-body -->
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-success" id="btnchangepassword">Change password</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
</div>
<!-- change password end -->
<!-- register start -->
<div class="modal fade" id="mainUserModal" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Profile</h4>
            </div>
            <div class="modal-body">
            <form role="form" id="registerUser">
                <div class="col-sm-12 focus_top" tabindex="1">
                    <div class="alert alert-success" id="af_alert" role="alert" style="display:none">
                        <span class="af_alert_message"></span>
                    </div>
                    <div class="alert alert-danger" id="af_alert" role="alert" style="display:none">
                        <span class="af_alert_message"></span>
                    </div>
                </div>
                <div class="box-body">  
                    <div class="form-group">
                        <input type="hidden" id="userID"/>
                        <input type="hidden" id="username" />
                        <label for="username">First name <span class="tcolor_red">*</span></label>
                    <input type="text" class="form-control" id="fname" placeholder="Enter First name">
                    </div>
                    <div class="form-group">
                        <label for="mname">Middle name</label>
                        <input type="text" class="form-control" id="mname" placeholder="Enter Middle name">
                    </div>
                    <div class="form-group">
                        <label for="lname">Last name <span class="tcolor_red">*</span></label>
                        <input type="text" class="form-control" id="lname" placeholder="Enter Last name">
                    </div>
                    <div class="form-group">
                        <label for="suffix">Suffix</label>
                        <input type="username" class="form-control" id="suffix" placeholder="Enter Suffix">
                    </div>
                    <div class="form-group">
                        <label for="photo">Profile Picture</label>
                        <input class="form-control" type="file" id="photo" name="photo">
                    </div>
                    <div class="form-group">
                        <label for="landlinenumber">Landline Number <span class="tcolor_red"></span></label>
                        <input type="text" class="form-control" id="landlinenumber" placeholder="Enter Landline Number">
                    </div>
                    <div class="form-group">
                        <label for="mobilenumber">Mobile Number <span class="tcolor_red"></span></label>
                        <input type="text" class="form-control" id="mobilenumber" placeholder="Enter Mobile Number">
                    </div>
                </div>
              <!-- /.box-body -->
            </form>
        </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="btnupdatemainuser" >Update</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- register end --> 
  
  
  
  
 
<script src="<?=site_url();?>assets/adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?=site_url();?>assets/adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>


<script>
$(document).ready(function(){
    loadBranchdetails();

    $('.useraction').on('click', function (e) {
        // do something...
        action = $(this).attr('data-action');
        obj = JSON.parse($(this).attr('data-obj'));
        console.log(obj);    
        if(action === 'pass') {
            $('#userID1').val(obj[0].loginSysID);
            $('#username1').val(obj[0].UserName);
        }else if(action === 'profile'){
            $('#userID').val(obj[0].loginSysID);
            $('#username').val(obj.UserName);
            $('#fname').val(obj[0].FirstName);
            $('#lname').val(obj[0].LastName);
            $('#mname').val(obj[0].MiddleName);
            $('#suffix').val(obj[0].Suffix);
            $('#landlinenumber').val(obj[0].LandLineNumber);
            $('#mobilenumber').val(obj[0].MobileNumber);
        } 
    })
    $('#btnupdatemainuser').click(updateUser);
    $('#btnchangepassword').click(changeUserPassword);
})
function updateUser(e){
    var formData = new FormData();
    var site_url = "<?php echo site_url();?>";
    var userID =  $('#userID').val();
    var username =  $('#username').val();
    const firstname = $('#fname').val();
    const lastname = $('#lname').val();
    const middlename = $('#mname').val();
    const suffix = $('#suffix').val();
    const landlinenumber = $('#landlinenumber').val();
    const mobilenumber = $('#mobilenumber').val();
    var photo = $('#photo')[0].files[0];

    formData.append('firstname',firstname);
    formData.append('lastname',lastname);
    formData.append('middlename',middlename);
    formData.append('suffix',suffix);
    formData.append('landlinenumber',landlinenumber);
    formData.append('mobilenumber',mobilenumber);
    formData.append('userID',userID);
    formData.append('username',username);
    formData.append('photo',photo);

    $.ajax({
        type:'POST',
        url: site_url + 'registeruser/UserProfile/UpdateUserInformation' ,
        dataType:"json",
        data:formData,
        async: true,
        cache: false,
        contentType: false,
        enctype: 'multipart/form-data',
        processData: false,
        success:function(data)
        {
            if(data.error === true){
                call_alert_error('mainUserModal',data.message);
            }else{
                location.reload();
                call_alert_success('mainUserModal',data.message);
            }
        }
    });
}
    
function changeUserPassword(e){
    // const target = e.target.closest("div").previousSibling;
    var base_url = "<?php echo site_url();?>";
    var userID = $(e.target).closest("div.modal-dialog").find('#userID1').val();
    var password = $(e.target).closest("div.modal-dialog").find('#password1').val();
    var password_confirmation = $(e.target).closest("div.modal-dialog").find('#password_confirmation1').val();
        
    $.ajax({
        type:'POST',
        url: base_url + 'registeruser/UserProfile/ChangeUserPassword' ,
        dataType:"json",
        data:{
            userID:userID,
            password:password,
            password_confirmation:password_confirmation
        },
        success:function(data)
        {
            if(data.error === true){
                call_alert_error('changepasswordModal',data.message);
            }else{
                call_alert_success('changepasswordModal',data.message);
            }
        }
    });
}
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
                $("a[data-target='#changepasswordModal']").attr("data-obj",JSON.stringify(data));
                $("a[data-target='#mainUserModal']").attr("data-obj",JSON.stringify(data));
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
            // {"data": "ctr"},
            {"data": "BranchName"},
            {"data": "CityName"},
            {"data": "ContactPerson"},
            {"data": "MobileNumber"},
            {"data": "EmailAddress"}
        ],
        "bInfo":false,
        "searching": false, "paging": false, "info": false
    });
}
</script>