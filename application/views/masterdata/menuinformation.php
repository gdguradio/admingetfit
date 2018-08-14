<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!-- Left side column. contains the sidebar -->

    
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?=str_replace('_', ' ', $title);?>
        <small>Register Menu Information</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=site_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?= site_url('masterdatarole/MasterDataMenu/menulist') ?>"><i class="fa fa-list"></i> Menu List</a></li>
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
            <form role="form" id="registerMenu">
                <div class="col-sm-12 focus_top" tabindex="1">
                    <div class="alert alert-success" id="af_alert" role="alert" style="display:none">
                        <span class="af_alert_message"></span>
                    </div>
                    <div class="alert alert-danger" id="af_alert" role="alert" style="display:none">
                        <span class="af_alert_message"></span>
                    </div>
                </div>
                <div class="box-body">
                    <input type="hidden" id="MenuID"/>
                    <div class="form-group">
                      <label for="role_type">Main menu</label>
                      <input type="text" class="form-control" id="menuname" placeholder="Enter Menu">
                    </div>
                    <div class="form-group">
                      <label for="role_type">Has child?</label>
                      <select class="form-control" id="menuhaschild">
                          <option value="no" selected>No</option>
                          <option value="yes">Yes</option>
                      </select>
                    </div>
                    <!-- <div class="form-group">
                      <label for="role_type">Link</label>
                      <input type="text" class="form-control" id="menulink" placeholder="Controller/method">
                    </div> -->
                    <div class="form-group">
                        <label for="menulink">Link <span class="tcolor_red">*</span></label>
                        <select class="form-control" name="menulink" id="menulink">
                            
                        </select>
                    </div>    
                    <div class="form-group">
                      <label for="role_type">Font-awesome Icon</label>
                      <input type="text" class="form-control" id="menuicon" placeholder="Font awesome Icon">
                    </div>
                </div>
                <!-- <div class="col-sm-12 focus_top" tabindex="1">
                    <div class="alert alert-success" id="af_alert" role="alert" style="display:none">
                        <span class="af_alert_message"></span>
                    </div>
                    <div class="alert alert-danger" id="af_alert" role="alert" style="display:none">
                        <span class="af_alert_message"></span>
                    </div>
                </div>
                <div class="box-body">  
                    <div class="form-group">
                        <label for="rolename">Menu name <span class="tcolor_red">*</span></label>
                    <input type="text" class="form-control" id="menuname" placeholder="Enter Menu name">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" class="form-control" id="description" placeholder="Enter Description">
                    </div>
                </div> -->
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
        loadLink();
        $('#registerMenu').submit(regiterMainLogin);
    });
    
    
    
    function regiterMainLogin(e){
        e.preventDefault();
        const formData = new FormData();
        const site_url = "<?php echo site_url();?>";

        const target = e.target;
        const firstname = target.querySelector('#menuname').value;
        const lastname = target.querySelector('#description').value;
        
        formData.append('menuname',menuname);
        formData.append('description',description);
        
        $.ajax({
            type:'POST',
            url: site_url + 'masterdata/insertMasterDataMenuFromAjax',
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
    function loadLink(){
        const site_url = "<?php echo site_url();?>";
        $.ajax({
            type:'POST',
            url: site_url + 'masterdata/MasterDataMenu/loadlink',
            dataType:"json",
            async: true,
            cache: false,
            contentType: false,
            enctype: 'multipart/form-data',
            processData: false,
            success:function(data)
            {
                var menulink_select = $('#menulink');
                    menulink_select.empty();
                    menulink_select.append('<option value="" selected disabled>Select...</option>');
                if(data.length > 0){
                    for(var x = 0; x < data.length; x++){
                        menulink_select.append('<option value=MasterDataMenu/'+ data[x]+'>'+ data[x]  +'</option>');
                    }
                }else{
                    menulink_select.append('<option>No Result Found!</option>');
                    // call_alert_success(0,data.message,'1');
                }
            }
        });    
    }    
 
</script>