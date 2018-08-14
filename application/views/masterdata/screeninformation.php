<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!-- Left side column. contains the sidebar -->

    
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?=str_replace('_', ' ', $title);?>
        <small>Register Role Information</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=site_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?= site_url('masterdata/MasterDataRole/rolelist') ?>"><i class="fa fa-list"></i> Role List</a></li>
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
            <form role="form" id="registerRole">
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
                    <label for="rolename">Role name <span class="tcolor_red">*</span></label>
                  <input type="text" class="form-control" id="rolename" placeholder="Enter Role name">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" class="form-control" id="description" placeholder="Enter Description">
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
      $('#registerRole').submit(regiterMainLogin);
    });
    
    
    
    function regiterMainLogin(e){
        e.preventDefault();
        const formData = new FormData();
        const site_url = "<?php echo site_url();?>";

        const target = e.target;
        const firstname = target.querySelector('#rolename').value;
        const lastname = target.querySelector('#description').value;
        
        formData.append('rolename',rolename);
        formData.append('description',description);
        
        $.ajax({
            type:'POST',
            url: site_url + 'masterdatarole/insertMasterDataRoleFromAjax',
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
    
 
</script>