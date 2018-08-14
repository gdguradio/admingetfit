<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!-- Left side column. contains the sidebar -->

    
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?=str_replace('_', ' ', $title);?>
        <small>Register User Information</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=site_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?= site_url('registeruser/MainUserInformation/mainUserlist') ?>"><i class="fa fa-list"></i> Userlist</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      
<!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              
            </div>
            <!-- /.box-header -->
            <!-- form start -->
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
                  <label for="branchname">Select Branch Name <span class="tcolor_red">*</span></label>
                  <select class="form-control" name="branchname" id="branchname">
                    
                  </select>
                </div>    
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
                  <label for="landlinenumber">Landline Number <span class="tcolor_red">*</span></label>
                  <input type="text" class="form-control" id="landlinenumber" placeholder="Enter Landline Number">
                </div>
                <div class="form-group">
                  <label for="mobilenumber">Mobile Number <span class="tcolor_red">*</span></label>
                  <input type="text" class="form-control" id="mobilenumber" placeholder="Enter Mobile Number">
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary" id="btn_submit">Submit</button>
              </div>
            </form>
          </div>
          <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 
<script>
    $(document).ready(function(){
        load_branchdetails();
        load_role();
        $('#registerUser').submit(regiterMainLogin);
    });
    
    
    
    function regiterMainLogin(e){
        e.preventDefault();
        const formData = new FormData();
        const site_url = "<?php echo site_url();?>";

        const target = e.target;
        const branchselect = target.querySelector('#branchname')
        const branchID = branchselect.options[branchselect.selectedIndex].text;
        const firstname = target.querySelector('#fname').value;
        const lastname = target.querySelector('#lname').value;
        const middlename = target.querySelector('#mname').value;
        const suffix = target.querySelector('#suffix').value;
        const username = target.querySelector('#username').value;
        const password = target.querySelector('#password').value;
        const confirmpassword = target.querySelector('#password_confirmation').value;
        const email = target.querySelector('#email').value;
        const landlinenumber = target.querySelector('#landlinenumber').value;
        const mobilenumber = target.querySelector('#mobilenumber').value;
        
        formData.append('branchid',branchID);
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
        
        $.ajax({
            type:'POST',
            url: site_url + 'Register/insertGymLoginFromAjax',
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
                    call_alert_success(0,data.message,'1');
                }
            }
        });
    }
    
    function load_branchdetails(){
        var site_url = "<?php echo site_url();?>";
        $.ajax({
            type:'POST',
            url: site_url +'Register/ajaxLoadBranch',
            dataType:"json",
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
    function load_role(){
        var site_url = "<?php echo site_url();?>";
        $.ajax({
            type:'POST',
            url: site_url +'Register/ajaxLoadRole',
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
</script>