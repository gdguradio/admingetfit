<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!-- Left side column. contains the sidebar -->

    
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?=str_replace('_', ' ', $title);?>
        <small>Register Base URL Information</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=site_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
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
                    <input type="hidden" id="baseurlID"/>
                    <label for="username">Base URL <span class="tcolor_red">*</span></label>
                  <input type="text" class="form-control" id="baseurl" placeholder="Enter Base URL">
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
              <div class="box-footer">
                <button type="submit" class="btn btn-primary" id="registerBaseUrl">Submit</button>
                <button type="submit" class="btn btn-primary" id="updatedBaseUrl">Update</button>
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
        $('#registerBaseUrl').click(regiterBaseURL);
        $('#updatedBaseUrl').click(updateBaseURL);
    });
    
    
    
    function regiterBaseURL(e){
        e.preventDefault();
        const formData = new FormData();
        const site_url = "<?php echo site_url();?>";

        var baseurl = $('#baseurl').val();
        var baseurlstatus = $(":radio[name='activitystatus']:checked").val();
        var deletestatus = $(":radio[name='deletestatus']:checked").val();
        
        formData.append('baseurl',baseurl);
        formData.append('baseurlstatus',baseurlstatus);
        formData.append('deletestatus',deletestatus);
        
        $.ajax({
            type:'POST',
            url:site_url +'masterdata/MasterDataBaseUrl/insertGymLoginFromAjax',
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