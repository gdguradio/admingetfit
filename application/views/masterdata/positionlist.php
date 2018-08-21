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
        <small>Positionlist</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=site_url();?>"><i class="fa fa-dashboard"></i>Home</a></li>
        <li><a href="#" data-toggle='modal' data-target='#PositionModal'><i class="fa fa-keyboard-o"></i>Register Position Information</a></li>      
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
	
	<div class="box">
            <div class="box-header">
              <h3 class="box-title">Position Lists</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="positionListTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th width="10">[#]</th>
                    <th width="150">Position Name</th>
                    <th width="150">Activity Status</th>
                    <th width="150">Delete Status</th>
                    <th width="200">Description</th>
                    <th>Created Date</th>
                    <th></th>
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
<div class="modal fade" id="PositionModal" role="dialog">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Position</h4>
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
                    <input type="hidden" id="positionID"/>
                    <div class="form-group">
                      <label for="positionname">Position Name</label>
                      <input type="text" class="form-control" id="positionname" placeholder="Enter Position Name">
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
                    <div class="form-group">
                      <label for="description">Description</label>
                      <input type="text" class="form-control" id="description" placeholder="Enter Description">
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
            <button type="button" class="btn btn-primary" id="btnaddposition">Submit</button>
            <button type="button" class="btn btn-success" id="btnupdateposition" style="display:none;">Update</button>
            <button type="button" class="btn btn-danger" id="btndeleteposition" style="display:none;">Delete</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
<!-- end modal -->  
  

  
<script src="<?=site_url();?>assets/adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?=site_url();?>assets/adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script>
    $(document).ready(function(){
        loadPosition();
        $('#PositionModal').on('shown.bs.modal', function (e) {
        action = $(e.relatedTarget).attr('data-action');
        if(action === 'edit') {
                $('#btnupdateposition').show();
                $('#btndeleteposition').hide();
            }else if(action === 'delete'){
                $('#btnupdateposition').hide();
                $('#btndeleteposition').hide();
        }else{
            $('#btnaddposition').show();
            $('#btnupdateposition').hide();
            $('#btndeleteposition').hide();
        }    
        
        })
        $(document).on('click','.user_action',function(){
            $('#btnaddposition').hide();
            var action = $(this).attr('data-action');
            var obj = JSON.parse($(this).attr('data-obj'));
            // var hasChild = obj.HasChild ? obj.HasChild.toLowerCase() : "";
            // var changedata = {type:"change",submenuID:obj.submenuID};
            // $('#menuname').val(obj.menuID).trigger(changedata);
            
            $('#positionID').val(obj.SysID);
            $('#positionname').val(obj.PositionName);
            $('#description').val(obj.Description);
            $(":radio[name='activitystatus'][value='"+obj.PositionStatus+"']").prop('checked','checked');
            $(":radio[name='deletestatus'][value='"+obj.DeleteStatus+"']").prop('checked','checked');
            
            
        });
        $('#btnaddposition').click(addPosition);
        $('#btnupdateposition').click(updatePosition);
        // $('#btndeleteuser').click(deletePosition);
        
    });
    function addPosition(){
       
        var site_url = '<?=site_url()?>';
        var positionname = $('#positionname').val();
        var positionactivitystatus = $(":radio[name='activitystatus']:checked").val();
        var positiondeletestatus = $(":radio[name='deletestatus']:checked").val();
        var description = $('#description').val();
        const positionstatus = $(":radio[name='activitystatus']:checked").val();
        const deletestatus = $(":radio[name='deletestatus']:checked").val();
        $.ajax({
            type:'POST',
            url:site_url +'masterdata/MasterDataPosition/insertMasterDataPositionFromAjax',
            dataType:"json",
            data:{
                positionname:positionname,
                positionactivitystatus:positionactivitystatus,
                positiondeletestatus:positiondeletestatus,
                description:description
            },
            success:function(data)
            {
                if(data.error === true){
                    call_alert_error('PositionModal',data.message);
                }else{
                    loadPosition();
                    call_alert_success('PositionModal',data.message,'1');
                }
            }
        });
    }
    function updatePosition(){
       
       var site_url = '<?=site_url()?>';
       var positionname = $('#positionname').val();
        var positionactivitystatus = $(":radio[name='activitystatus']:checked").val();
        var positiondeletestatus = $(":radio[name='deletestatus']:checked").val();
        var description = $('#description').val();
        var positionID = $('#positionID').val();
        const positionstatus = $(":radio[name='activitystatus']:checked").val();
        const deletestatus = $(":radio[name='deletestatus']:checked").val();
       $.ajax({
           type:'POST',
           url:site_url +'masterdata/MasterDataPosition/updateMasterDataPositionFromAjax',
           dataType:"json",
           data:{
                positionname:positionname,
                positionactivitystatus:positionactivitystatus,
                positiondeletestatus:positiondeletestatus,
                description:description,
                positionid:positionID
           },
           success:function(data)
           {
               if(data.error === true){
                   call_alert_error('PositionModal',data.message);
               }else{
                    loadPosition();
                   call_alert_success('PositionModal',data.message,'1');
               }
           }
       }).done(function(){
            // $('#submenuname > option').empty()
        });
   }
    
    function deleteScreen(){
        var base_url = "<?php echo site_url();?>";
        var user_id = $('#user_id').val();
         $.ajax({
            type:'POST',
            url: base_url + 'User_management/ajax_delete_user',
            dataType:"json",
            data:{
                user_id:user_id
            },
            success:function(data)
            {
                if(data.error === true)
                {
                    call_alert_error('myModal',data.message);
                }
                else
                {
                    load_user();
                    call_alert_success('myModal',data.message);
                }
            }
        }).done(function(){
            // $('#submenuname > option').empty()
        });
    }
    
    function loadPosition(){
        var site_url = '<?=site_url()?>';
        $.fn.dataTable.ext.errMode = 'none';
        $.fn.dataTable.ext.classes.sPageButton = 'page-link';
        // $.fn.dataTable.ext.classes.sTable = '';
        // $.fn.dataTable.ext.classes.sNoFooter = '';
        $('#positionListTable').DataTable({
            destroy: true,
            lengthMenu: [[10, 20, -1], [10, 20, "All"]],
            "ajax": {
                "url": site_url +"masterdata/MasterDataPosition/ajaxLoadPosition" ,
                "type": "POST",
                "dataSrc": function (data) {
                    var ctr = 0;
                    for (var i = 0; i < data.length; i++){
                        ctr++;
                        var data_array = [];
                        data_array = JSON.stringify(data[i]);
                        data[i]["num"] = ctr;
                        data[i]["Contoller"] = data[i].Link ? data[i].Link.split('/')[0] : "";
                        data[i]["Function"] = data[i].Link ? data[i].Link.split('/')[1] : "";
                        // data[i]["changepassword"] = "<button class='btn btn-warning changepass' data-obj='" + data_array + "' data-toggle='modal' data-target='#changepasswordModal'><i class='fa fa-key'></i> Change password</button>";
                        data[i]["edit"] = "<button class='btn btn-info user_action' data-action='edit' data-obj='" + data_array + "' data-toggle='modal' data-target='#PositionModal'><i class='fa fa-edit'></i> Edit</button>";
                        data[i]["delete"] = "<button class='btn btn-danger user_action' data-action='delete' data-obj='" + data_array + "' data-toggle='modal' data-target='#PositionModal'><i class='fa fa-times'></i> Deactivate</button>";
                    }

                    return data;
                }
            },
            "columns": [
                {"data": "num"},
                {"data": "PositionName"},
                {"data": "PositionStatus"},
                {"data": "DeleteStatus"},
                {"data": "Description"},
                {"data": "AddedDate"},
                {"data": "edit"},
                {"data": "delete"}
            ],
            "bInfo":false
        });
    }
</script>
 
