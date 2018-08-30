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
        <small>Screenlist</small>
      </h1>
      <ol class="breadcrumb">
      <li><a href="<?=site_url().''.'Welcome';?>"><i class="fa fa-dashboard"></i>Home</a></li>
        <li><a href="#" data-toggle='modal' data-target='#ScreenModal'><i class="fa fa-keyboard-o"></i>Register Screen Information</a></li>      
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
	
	<div class="box">
            <div class="box-header">
              <h3 class="box-title">Screen Lists</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="screenListTable" class="table table-bordered table-striped">
                <thead>
                <tr>


                    <th width="10">[#]</th>
                    <th width="150">Menu Name</th>
                    <th width="150">Sub Menu Name</th>
                    <th width="80">Screen Name</th>
                    <th width="100">Controller</th>
                    <th width="100">Function</th>
                    <th width="150">Icon</th>
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
<div class="modal fade" id="ScreenModal" role="dialog">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Screen</h4>
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
                    <input type="hidden" id="screenID"/>
                    <div class="form-group">
                      <label for="menuname">Menu Name</label>
                      <select class="form-control" id="menuname">

                      </select>
                    </div>
                    <div class="form-group">
                      <label for="submenuname">SubMenu Name</label>
                      <select class="form-control" id="submenuname">

                      </select>
                    </div>
                    <div class="form-group">
                      <label for="screenname">Screen Name</label>
                      <input type="text" class="form-control" id="screenname" placeholder="Enter Screen">
                    </div>
                    <div class="form-group">
                      <label for="screenlink">Link</label>
                      <select class="form-control" name="screenlink" id="screenlink">
                            
                        </select>
                    </div>
                    <div class="form-group">
                      <label for="screenicon">Font-awesome Icon</label>
                      <input type="text" class="form-control" id="screenicon" placeholder="Font awesome Icon">
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
            <button type="button" class="btn btn-primary" id="btnaddscreen">Submit</button>
            <button type="button" class="btn btn-success" id="btnupdatescreen" style="display:none;">Update</button>
            <button type="button" class="btn btn-danger" id="btndeletescreen" style="display:none;">Delete</button>
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
        loadMenu();
        loadScreen();
        loadScreenLink();
        $('#ScreenModal').on('shown.bs.modal', function (e) {
        // do something...
        action = $(e.relatedTarget).attr('data-action');
        if(action === 'edit') {
                $('#btnupdatescreen').show();
                $('#btndeletescreen').hide();
            }else if(action === 'delete'){
                $('#btnupdatescreen').hide();
                $('#btndeletescreen').show();
        }else{
            $('#btnaddscreen').show();
            $('#btnupdatescreen').hide();
            $('#btndeletescreen').hide();
        }    
        
        })
        $(document).on('click','.user_action',function(){
            $('#btnaddscreen').hide();
            var action = $(this).attr('data-action');
            var obj = JSON.parse($(this).attr('data-obj'));
            var hasChild = obj.HasChild ? obj.HasChild.toLowerCase() : "";
            var changedata = {type:"change",submenuID:obj.submenuID};
            $('#menuname').val(obj.menuID).trigger(changedata);
            
            $('#screenID').val(obj.SysID);
            $('#screenname').val(obj.ScreenName);
            $('#screenlink').val(obj.Link);
            $('#screenicon').val(obj.FaIcon);
            $('#description').val(obj.Description);
            $(":radio[name='activitystatus'][value='"+obj.ScreenStatus+"']").prop('checked','checked');
            $(":radio[name='deletestatus'][value='"+obj.DeleteStatus+"']").prop('checked','checked');
            
        });
        $('#btnaddscreen').click(addScreen);
        $('#btnupdatescreen').click(updateScreen);
        $('#btndeleteuser').click(deleteScreen);
        $('#menuname').change(loadSubMenu);
        
    });
    function addScreen(){
       
        var site_url = '<?=site_url()?>';
        var menuid = $('#menuname option:selected').val();
        var submenuid = $('#submenuname option:selected').val();
        var screenname = $('#screenname').val();
        var screenlink = $('#screenlink option:selected').val();
        var screenicon = $('#screenicon').val();
        var description = $('#description').val();
        const screenstatus = $(":radio[name='activitystatus']:checked").val();
        const deletestatus = $(":radio[name='deletestatus']:checked").val();
        $.ajax({
            type:'POST',
            url:site_url +'masterdata/MasterDataScreen/insertMasterDataScreenFromAjax',
            dataType:"json",
            data:{
                screenname:screenname,
                screenlink:screenlink,
                screenicon:screenicon,
                description:description,
                menuid:menuid,
                submenuid:submenuid,
                screenstatus:screenstatus,
                deletestatus:deletestatus
            },
            success:function(data)
            {
                if(data.error === true){
                    call_alert_error('ScreenModal',data.message);
                }else{
                    loadScreen();
                    // load_menu_select();
                    call_alert_success('ScreenModal',data.message,'1');
                }
            }
        });
    }
    function updateScreen(){
       
       var site_url = '<?=site_url()?>';
       var screenname = $('#screenname').val();
       var screenlink = $('#screenlink option:selected').val();
       var screenicon = $('#screenicon').val();
       var description = $('#description').val();
       var screenID = $('#screenID').val();
       var menuid = $('#menuname option:selected').val();
       var submenuid = $('#submenuname option:selected').val();
       var screenid = $('#screenID').val();
       const screenstatus = $(":radio[name='activitystatus']:checked").val();
        const deletestatus = $(":radio[name='deletestatus']:checked").val();
       $.ajax({
           type:'POST',
           url:site_url +'masterdata/MasterDataScreen/updateMasterDataScreenFromAjax',
           dataType:"json",
           data:{
                screenname:screenname,
               screenlink:screenlink,
               screenicon:screenicon,
               description:description,
               screenID:screenID,
               menuid:menuid,
               submenuid:submenuid,
               screenid:screenid,
                screenstatus:screenstatus,
                deletestatus:deletestatus
           },
           success:function(data)
           {
               if(data.error === true){
                   call_alert_error('ScreenModal',data.message);
               }else{
                   loadScreen();
                   loadMenu();
                   call_alert_success('ScreenModal',data.message,'1');
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
    
    function loadScreen(){
        var site_url = '<?=site_url()?>';
        $.fn.dataTable.ext.errMode = 'none';
        $.fn.dataTable.ext.classes.sPageButton = 'page-link';
        // $.fn.dataTable.ext.classes.sTable = '';
        // $.fn.dataTable.ext.classes.sNoFooter = '';
        $('#screenListTable').DataTable({
            destroy: true,
            lengthMenu: [[10, 20, -1], [10, 20, "All"]],
            "ajax": {
                "url": site_url +"masterdata/MasterDataScreen/ajaxLoadScreen" ,
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
                        data[i]["edit"] = "<button class='btn btn-info user_action' data-action='edit' data-obj='" + data_array + "' data-toggle='modal' data-target='#ScreenModal'><i class='fa fa-edit'></i> Edit</button>";
                        data[i]["delete"] = "<button class='btn btn-danger user_action' data-action='delete' data-obj='" + data_array + "' data-toggle='modal' data-target='#ScreenModal'><i class='fa fa-times'></i> Deactivate</button>";
                    }

                    return data;
                }
            },
            "columns": [
                {"data": "num"},
                {"data": "menuname"},
                {"data": "submenuname"},
                {"data": "ScreenName"},
                {"data": "Contoller"},
                {"data": "Function"},
                {"data": "FaIcon"},
                {"data": "Description"},
                {"data": "AddedDate"},
                {"data": "edit"},
                {"data": "delete"}
            ],
            "bInfo":false
        });
    }
    function loadScreenLink(){
        const site_url = "<?php echo site_url();?>";
        $.ajax({
            type:'POST',
            url: site_url + 'masterdata/MasterDataScreen/loadlink',
            dataType:"json",
            async: true,
            cache: false,
            contentType: false,
            enctype: 'multipart/form-data',
            processData: false,
            success:function(data)
            {
                var screenlink_select = $('#screenlink');
                    screenlink_select.empty();
                    screenlink_select.append('<option value="" selected disabled>Select...</option>');
                if(data.length > 0){
                    for(var x = 0; x < data.length; x++){
                        screenlink_select.append('<option value='+ data[x]+'>'+ data[x]  +'</option>');
                    }
                }else{
                        screenlink_select.append('<option>No Result Found!</option>');
                    // call_alert_success(0,data.message,'1');
                }
            }
        });    
    }   
    function loadMenu(){
        const site_url = "<?php echo site_url();?>";
        $.ajax({
            type:'POST',
            url: site_url + 'masterdata/MasterDataScreen/loadmenu',
            dataType:"json",
            async: true,
            cache: false,
            contentType: false,
            enctype: 'multipart/form-data',
            processData: false,
            success:function(data)
            {
                var menuname_select = $('#menuname');
                var submenuname_select = $('#submenuname');
                menuname_select.empty();
                submenuname_select.empty();
                menuname_select.append('<option value="" selected disabled>Select...</option>');
                submenuname_select.append('<option value="" selected disabled>Select...</option>');
                if(data.length > 0){
                    for(var x = 0; x < data.length; x++){
                        menuname_select.append('<option value='+ data[x].SysID+'>'+ data[x].MenuName  +'</option>');
                    }
                }else{
                    menuname_select.append('<option>No Result Found!</option>');
                    // call_alert_success(0,data.message,'1');
                }
            }
        });
    }
    function loadSubMenu(e){
        const site_url = "<?php echo site_url();?>";
        var id = null;
        if( e !== undefined){
            id =  $(e.target).val();
            $.ajax({
            type:'POST',
            url: site_url + 'masterdata/MasterDataScreen/loadsubmenu',
            dataType:"json",
            data:{
                id:id
            },
            success:function(data){
                var submenuname_select = $('#submenuname');
                submenuname_select.empty();
                
                submenuname_select.append('<option value="" selected disabled>Select...</option>');
                if(data.length > 0){
                    for(var x = 0; x < data.length; x++){
                        submenuname_select.append('<option value='+ data[x].submenuID+'>'+ data[x].SubMenuName  +'</option>');
                    }
                }else{
                    submenuname_select.append('<option>No Result Found!</option>');
                    // call_alert_success(0,data.message,'1');
                }
            }
        }).done(function(){
            if(e.submenuID !== undefined && e.submenuID !== '' ){
                $('#submenuname > option[value='+e.submenuID+']').attr('selected','selected')
            }
        });
        }
    }
</script>
 
