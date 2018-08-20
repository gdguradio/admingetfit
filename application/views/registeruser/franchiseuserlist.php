<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!-- Left side column. contains the sidebar -->
<!-- Left side column. contains the sidebar -->
    
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?=str_replace('_', ' ', $title);?>
        <small>Userlist</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=site_url();?>"><i class="fa fa-dashboard"></i>Home</a></li>
        <!-- <li><a href="#" data-toggle='modal' data-target='#franchiseUserModal'><i class="fa fa-dashboard"></i>Register User Information</a></li> -->
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
	
	<div class="box">
            <div class="box-header">
              <h3 class="box-title">User Lists</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="userListTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th width="10">[#]</th>
                    <th width="50">Username</th>
                    <th width="200">Complete Name</th>
                    <th width="150">Role Type</th>
                    <th width="150">Position/Title</th>
                    <th>Created Date</th>
                    <th></th>
                    <th width="30"></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
		  
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  
  
  
  
    
<!-- start modal -->

<!-- update start -->
<!-- <div class="modal fade" id="updateModal" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Edit User</h4>
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
                    <input type="hidden" id="user_id"/>
                  <div class="form-group">
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
                    <label for="suffix">Suffix <span class="tcolor_red">*</span></label>
                    <input type="text" class="form-control" id="suffix" placeholder="Enter Suffix">
                  </div>
                  <div class="form-group">
                    <label for="username">Username <span class="tcolor_red">*</span></label>
                    <input type="text" class="form-control" id="username" placeholder="Enter Username">
                  </div>


                  <div class="form-group">
                    <label for="user_role">Role <span class="tcolor_red">*</span></label>
                    <select class="form-control" name="user_role" id="role">
                      <option>Select Role..</option>
                      <option>Chair person</option>
                      <option>Disposal Committee Secretariat</option>
                      <option>Supply Officer</option>
                      <option>Inspection Committee</option>
                      <option>Messenger</option>
                      <option>Cashier</option>
                    </select>
                  </div>
                <div class="form-group">
                  <label for="user_division">Title/Position <span class="tcolor_red">*</span></label>
                  <select class="form-control" name="user_title" id="user_title">
                    
                  </select>
                </div> 

                   <div class="form-group">
                    <div id="image_preview"><img id="previewing" style="display:block;margin:auto" src="<?=site_url();?>assets/dist/img/noimage.png" /></div>
                    <label for="photo">Profile Picture</label>
                    <input class="form-control" type="file" id="photo" name="photo">
                  </div>

                </div>
          /.box-body
        </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success" id="btn_update_user" style="display:none;">Update</button>
            <button type="button" class="btn btn-danger" id="btn_delete_user" style="display:none;">Deactivate</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div> -->

<!-- update end -->

<!-- change password start  -->
<div class="modal fade" id="changepasswordModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">User - Change Password</h4>
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
<div class="modal fade" id="franchiseUserModal" role="dialog">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Franchise Gym Login</h4>
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
                    <input type="hidden" id="branchID" />
                    <label for="submenuname">Branch Type</label>
                    <select class="form-control" id="branchtype">
                        <option value='main'>Main</option>
                        <option value='franchise'>Franchise</option>
                    </select>
                </div>
                <div class="form-group">
                  <label for="branchname">Select Branch Name <span class="tcolor_red">*</span></label>
                  <select class="form-control" name="branchname" id="branchname">
                    
                  </select>
                </div>   
                <div class="form-group">
                  <label for="positionname">Select Position Name <span class="tcolor_red">*</span></label>
                  <select class="form-control" name="positionname" id="positionname">
                    
                  </select>
                </div>   
                <div class="form-group">
                    <input type="hidden" id="userID"/>
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
                  <label for="rolename">Select Role Name <span class="tcolor_red">*</span></label>
                  <select class="form-control" name="rolename" id="rolename">
                    
                  </select>
                </div>   
                <div class="form-group">
                  <label for="username">Username <span class="tcolor_red">*</span></label>
                  <input type="text" class="form-control" id="username" placeholder="Enter Username">
                </div>

                <div class="form-group">
                  <label for="password">Password <span class="tcolor_red">*</span></label>
                  <input type="password" class="form-control" id="password" placeholder="Password">
                </div>

                <div class="form-group">
                  <label for="password_confirmation">Confirm Password <span class="tcolor_red">*</span></label>
                  <input type="password" class="form-control" id="password_confirmation" placeholder="Confirm Password">
                </div>
                <div class="form-group">
                  <label for="email">Email Address <span class="tcolor_red">*</span></label>
                  <input type="text" class="form-control" id="email" placeholder="Enter Email Address">
                </div>
                <div class="form-group">
                  <label for="landlinenumber">Landline Number <span class="tcolor_red"></span></label>
                  <input type="text" class="form-control" id="landlinenumber" placeholder="Enter Landline Number">
                </div>
                <div class="form-group">
                  <label for="mobilenumber">Mobile Number <span class="tcolor_red"></span></label>
                  <input type="text" class="form-control" id="mobilenumber" placeholder="Enter Mobile Number">
                </div>
                <div class="form-group">
                    <label for="">Activity Status</label>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="activitystatusno" name="activitystatus" value="no" >
                        <label class="custom-control-label" for="defaultUnchecked">No</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="activitystatusyes" name="activitystatus" value="yes" checked>
                        <label class="custom-control-label" for="defaultChecked">Yes</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Delete Status</label>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="deletestatusno" name="deletestatus" value="no" checked>
                        <label class="custom-control-label" for="defaultChecked">No</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="deletestatusyes" name="deletestatus" value="yes" >
                        <label class="custom-control-label" for="defaultUnchecked">Yes</label>
                    </div>
                </div>
              </div>
              <!-- /.box-body -->
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" id="btnaddfranchiseuser">Submit</button>
            <button type="button" class="btn btn-success" id="btnupdatefranchiseuser" style="display:none;">Update</button>
            <button type="button" class="btn btn-danger" id="btndeletefranchiseuser" style="display:none;">Delete</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <!-- register end -->
<!-- end modal -->  
<script src="<?=site_url();?>assets/adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?=site_url();?>assets/adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script>
    $(document).ready(function(){
        loadUser();
        loadRole();
        loadPosition();
        $('#franchiseUserModal').on('shown.bs.modal', function (e) {
        // do something...
            action = $(e.relatedTarget).attr('data-action');
            if(action === 'edit') {
                    $('#btnaddfranchiseuser').hide();
                    $('#btnupdatefranchiseuser').show();
                    $('#btndeletefranchiseuser').hide();
                    $('#password').closest('.form-group').hide();
                    $('#password_confirmation').closest('.form-group').hide();
            }else if(action === 'delete'){
                    $('#btnupdatefranchiseuser').hide();
                    $('#btndeletefranchiseuser').show();
                    $('#password').closest('.form-group').hide();
                    $('#password_confirmation').closest('.form-group').hide();
            }else{
                $('#btnaddfranchiseuser').show();
                $('#password').closest('.form-group').show();
                $('#password_confirmation').closest('.form-group').show();
                $('#btnupdatefranchiseuser').hide();
                $('#btndeletefranchiseuser').hide();
            }    
        })

        $(document).on('click','.user_action',function(){
            var action = $(this).attr('data-action');
            var obj = JSON.parse($(this).attr('data-obj'));
            // $('#user_id').val(obj.SysID);
            // $('#fname').val(obj.FirstName);
            // $('#lname').val(obj.LastName);
            // $('#mname').val(obj.MiddleName);
            // $('#suffix').val(obj.Suffix);
            $('#positionname').val(obj.PositionID);
            $(":radio[name='activitystatus'][value='"+obj.LoginStatus+"']").prop('checked','checked');
            $(":radio[name='deletestatus'][value='"+obj.DeleteStatus+"']").prop('checked','checked');
            $('#userID').val(obj.SysID);
            $('#branchname').val(obj.BranchDetailsID);
            $('#rolename').val(obj.MasterDataRoleID);
            $('#fname').val(obj.FirstName);
            $('#lname').val(obj.LastName);
            $('#mname').val(obj.MiddleName);
            $('#suffix').val(obj.Suffix);
            $('#username').val(obj.UserName);
            $('#email').val(obj.EmailAddress);
            $('#landlinenumber').val(obj.LandLineNumber);
            $('#mobilenumber').val(obj.MobileNumber);
        });
        
        
        
        $(document).on('click','.changepass',function(){
            var obj = JSON.parse($(this).attr('data-obj'));
            $('#userID1').val(obj.SysID);
            $('#username1').val(obj.UserName);
        });
        // $('#btn_changepassword').click(function(){
        //     change_user_password();
        // });
        $('#btnaddfranchiseuser').click(regiterFranchiseLogin);
        $('#btnupdatefranchiseuser').click(updateUser);
        $('#btn_delete_user').click(function(){
            delete_user();
        });
        $('#branchtype').change(loadBranchdetails).change();
        $('#btnchangepassword').click(changeUserPassword);
    });
    function regiterFranchiseLogin(e){
        e.preventDefault();
        const formData = new FormData();
        const site_url = "<?php echo site_url();?>";

        const branchtype = $('#branchtype option:selected').val();
        const branchID = $('#branchname option:selected').val();
        const positionID = $('#positionname option:selected').val();
        const rolenameID = $('#rolename option:selected').val();
        const firstname = $('#fname').val();
        const lastname = $('#lname').val();
        const middlename = $('#mname').val();
        const suffix = $('#suffix').val();
        const username = $('#username').val();
        const password = $('#password').val();
        const confirmpassword = $('#password_confirmation').val();
        const email = $('#email').val();
        const landlinenumber = $('#landlinenumber').val();
        const mobilenumber = $('#mobilenumber').val();
        const loginstatus = $(":radio[name='activitystatus']:checked").val();
        const deletestatus = $(":radio[name='deletestatus']:checked").val();


        formData.append('branchname',branchID);
        formData.append('positionname',positionID);
        formData.append('firstname',firstname);
        formData.append('lastname',lastname);
        formData.append('middlename',middlename);
        formData.append('suffix',suffix);
        formData.append('username',username);
        formData.append('password',password);
        formData.append('confirmpassword',confirmpassword);
        formData.append('email',email);
        formData.append('landlinenumber',landlinenumber);
        formData.append('mobilenumber',mobilenumber);
        formData.append('rolenameID',rolenameID);
        formData.append('loginstatus',loginstatus);
        formData.append('deletestatus',deletestatus);
        formData.append('branchtype',branchtype);
        $.ajax({
            type:'POST',
            url: site_url + 'registeruser/FranchiseUserInformation/insertGymLoginFromAjax' ,
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
                    call_alert_error(0,data.message);
                }else{
                    loadUser();
                    call_alert_success(0,data.message,'1');
                }
            }
        });
    }
    function updateUser(e){
        var formData = new FormData();
        var site_url = "<?php echo site_url();?>";
        var userID =  $('#userID').val();
        const branchtype = $('#branchtype option:selected').val();
        const branchID = $('#branchname option:selected').val();
        const positionID = $('#positionname option:selected').val();
        const rolenameID = $('#rolename option:selected').val();
        const firstname = $('#fname').val();
        const lastname = $('#lname').val();
        const middlename = $('#mname').val();
        const suffix = $('#suffix').val();
        const username = $('#username').val();
        const email = $('#email').val();
        const landlinenumber = $('#landlinenumber').val();
        const mobilenumber = $('#mobilenumber').val();
        const loginstatus = $(":radio[name='activitystatus']:checked").val();
        const deletestatus = $(":radio[name='deletestatus']:checked").val();

        formData.append('branchname',branchID);
        formData.append('positionname',positionID);
        formData.append('firstname',firstname);
        formData.append('lastname',lastname);
        formData.append('middlename',middlename);
        formData.append('suffix',suffix);
        formData.append('username',username);
        formData.append('email',email);
        formData.append('landlinenumber',landlinenumber);
        formData.append('mobilenumber',mobilenumber);
        formData.append('rolenameID',rolenameID);
        formData.append('userID',userID);
        formData.append('loginstatus',loginstatus);
        formData.append('deletestatus',deletestatus);
        formData.append('branchtype',branchtype);

        $.ajax({
            type:'POST',
            url: site_url + 'registeruser/FranchiseserInformation/UpdateUserInformation' ,
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
                    call_alert_error('franchiseUserModal',data.message);
                }else{
                    loadUser();
                    call_alert_success('franchiseUserModal',data.message);
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
            url: base_url + 'registeruser/FranchiseUserInformation/ChangeUserPassword' ,
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
                    loadUser();
                    call_alert_success('changepasswordModal',data.message);
                }
            }
        });
    }
    
    function delete_user()
    {
        var base_url = "<?php echo site_url();?>";
        var userID = $('#userID').val();
         $.ajax({
            type:'POST',
            url: base_url + 'User_management/ajax_delete_user',
            dataType:"json",
            data:{
                userID:userID
            },
            success:function(data)
            {
                if(data.error === true)
                {
                    call_alert_error('franchiseUserModal',data.message);
                }
                else
                {
                    loadUser();
                    call_alert_success('franchiseUserModal',data.message);
                }
            }
        });
    }
    
    function loadUser(){
        var site_url = '<?=site_url()?>';
        $.fn.dataTable.ext.errMode = 'none';
        $.fn.dataTable.ext.classes.sPageButton = 'page-link';
        // $.fn.dataTable.ext.classes.sTable = '';
        // $.fn.dataTable.ext.classes.sNoFooter = '';
        $('#userListTable').DataTable({
            destroy: true,
            lengthMenu: [[10, 20, -1], [10, 20, "All"]],
            "ajax": {
                "url": site_url +"registeruser/FranchiseUserInformation/ajaxLoadUser" ,
                "type": "POST",
                "dataSrc": function (data) {
                    var ctr = 0;
                    for (var i = 0; i < data.length; i++){
                        ctr++;
                        var data_array = [];
                        var fname = data[i].FirstName ? data[i].FirstName : "";
                        var mname = data[i].MiddleName ?data[i].MiddleName.substring(0,1)+'. ' : "";
                        var lname = data[i].LastName ? data[i].LastName : "";
                        var suffix = data[i].Suffix ? ', ' + data[i].Suffix : "";
                        const fullname = fname  + ' ' + mname  + lname + suffix;
                        data_array = JSON.stringify(data[i]);
                        
                        data[i]["num"] = ctr;
                        data[i]["name"] = fullname
                        data[i]["changepassword"] = "<button class='btn btn-warning changepass' data-obj='" + data_array + "' data-toggle='modal' data-target='#changepasswordModal'><i class='fa fa-key'></i> Change password</button>";
                        data[i]["edit"] = "<button class='btn btn-info user_action' data-action='edit' data-obj='" + data_array + "' data-toggle='modal' data-target='#franchiseUserModal'><i class='fa fa-edit'></i> Edit</button>";
                        data[i]["delete"] = "<button class='btn btn-danger user_action' data-action='delete' data-obj='" + data_array + "' data-toggle='modal' data-target='#franchiseUserModal'><i class='fa fa-times'></i> Deactivate</button>";
                    }

                    return data;
                }
            },
            "columns": [
                {"data": "num"},
                {"data": "UserName"},
                {"data": "name"},
                {"data": "RoleName"},
                {"data": "PositionName"},
                {"data": "AddedDate"},
                {"data": "edit"},
                {"data": "changepassword"},
                {"data": "delete"}
            ],
            "bInfo":false
        });
    }
    function loadBranchdetails(e){
        branchtype = $(e.target).val();
        var site_url = "<?php echo site_url();?>";
        $.ajax({
            type:'POST',
            url: site_url +"registeruser/FranchiseUserInformation/ajaxLoadBranch" ,
            dataType:"json",
            data:{
                branchtype:branchtype
            },
            success:function(data)
            {
                var branchname_select = $('#branchname');
                branchname_select.empty();
                branchname_select.append('<option value="" selected disabled>Select...</option>');
                if(data.error === true){
                    branchname_select.append('<option>'+ data.message +'</option>');
                }else{
                    for(var x = 0; x < data.length; x++){
                        branchname_select.append('<option value='+ data[x].SysID+'>'+ data[x].BranchName  +'</option>');
                    }
                }
            }
        });
    }
    function loadRole(){
        var site_url = "<?php echo site_url();?>";
        $.ajax({
            type:'POST',
            url: site_url +"registeruser/FranchiseUserInformation/ajaxLoadRole" ,
            dataType:"json",
            success:function(data)
            {
                var rolename_select = $('#rolename');
                rolename_select.empty();
                rolename_select.append('<option value="" selected disabled>Select...</option>');
                if(data.error === true){
                  rolename_select.append('<option>'+ data.message +'</option>');
                }else{
                    for(var x = 0; x < data.length; x++){
                      rolename_select.append('<option value='+ data[x].SysID+'>'+ data[x].RoleName  +'</option>');
                    }
                }
            }
        });
    }
    function loadPosition(){
        var site_url = "<?php echo site_url();?>";
        $.ajax({
            type:'POST',
            url: site_url +"registeruser/FranchiseUserInformation/ajaxLoadPosition" ,
            dataType:"json",
            success:function(data)
            {
                var positionname_select = $('#positionname');
                positionname_select.empty();
                positionname_select.append('<option value="" selected disabled>Select...</option>');
                if(data.error === true){
                    positionname_select.append('<option>'+ data.message +'</option>');
                }else{
                    for(var x = 0; x < data.length; x++){
                    positionname_select.append('<option value='+ data[x].SysID+'>'+ data[x].PositionName  +'</option>');
                    }
                }
            }
        });
    }
</script>
 
