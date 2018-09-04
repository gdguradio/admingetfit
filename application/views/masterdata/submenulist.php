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
        <small>Submenulist</small>
      </h1>
      <ol class="breadcrumb">
      <li><a href="<?=site_url().''.'Welcome';?>"><i class="fa fa-dashboard"></i>Home</a></li>
        <li><a href="#" data-toggle='modal' data-target='#SubMenuModal'><i class="fa fa-keyboard-o"></i>Register Sub Menu Information</a></li>      
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
              <table id="submenuListTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th width="10">[#]</th>
                    <th width="150">Menu Name</th>
                    <th width="150">Sub Menu Name</th>
                    <th width="50">Has Child</th>
                    <th width="100">Controller</th>
                    <th width="100">Function</th>
                    <th width="180">Icon</th>
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
<div class="modal fade" id="SubMenuModal" role="dialog">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Sub Menu</h4>
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
                    <input type="hidden" id="submenuID"/>
                    <div class="form-group">
                      <label for="menuname">Menu Name</label>
                      <select class="form-control" id="menuname">

                      </select>
                    </div>
                    <div class="form-group">
                      <label for="submenuname">Sub Menu Name</label>
                      <input type="text" class="form-control" id="submenuname" placeholder="Enter Sub Menu">
                    </div>
                    <div class="form-group">
                        <label for="">Has child?</label>
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="haschildno" name="haschild" value="no" checked>
                            <label class="custom-control-label" for="defaultChecked">No</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="haschildyes" name="haschild" value="yes" >
                            <label class="custom-control-label" for="defaultUnchecked">Yes</label>
                        </div>
                    </div>
                    <div class="form-group">
                      <label for="submenulink">Link</label>
                      <select class="form-control" name="submenulink" id="submenulink">
                            
                        </select>
                    </div>
                    <div class="form-group">
                      <label for="submenuicon">Font-awesome Icon</label>
                      <input type="text" class="form-control" id="submenuicon" placeholder="Font awesome Icon">
                    </div>
                    <div class="form-group">
                      <label for="description">Description</label>
                      <input type="text" class="form-control" id="description" placeholder="Enter Description">
                    </div>
                    <div class="form-group">
                      <label for="displayorder">Display Order</label>
                      <input type="text" class="form-control" id="displayorder" placeholder="Enter Display Order">
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
            <button type="button" class="btn btn-primary" id="btnaddsubmenu">Submit</button>
            <button type="button" class="btn btn-success" id="btnupdatesubmenu" style="display:none;">Update</button>
            <button type="button" class="btn btn-danger" id="btndeletesubmenu" style="display:none;">Delete</button>
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
        loadSubLink();
        loadSubMenu();
        $('#SubMenuModal').on('shown.bs.modal', function (e) {
        // do something...
        action = $(e.relatedTarget).attr('data-action');
        if(action === 'edit') {
                $('#btnupdatesubmenu').show();
                $('#btndeletesubmenu').hide();
            }else if(action === 'delete'){
                $('#btnupdatesubmenu').hide();
                $('#btndeletesubmenu').show();
        }else{
            $('#btnaddsubmenu').show();
            $('#btnupdatesubmenu').hide();
            $('#btndeletesubmenu').hide();
        }    
        
        })
        $(':radio[name=haschild]').change(function(){
            if($(this).is(':checked') && $(this).val()=='yes'){
                $('#submenulink').attr('disabled',true)
            }else{
                $('#submenulink').attr('disabled',false)
            }
            


        }).change();
        $(document).on('click','.user_action',function(){
            $('#btnaddsubmenu').hide();
            var action = $(this).attr('data-action');
            var obj = JSON.parse($(this).attr('data-obj'));
            var hasChild = obj.HasChild ? obj.HasChild.toLowerCase() : "";
            console.log(obj.MenuNameID)
            $('#menuname').val(obj.MenuNameID);
            $('#submenuID').val(obj.SysID);
            $('#submenuname').val(obj.SubMenuName);
            $(':radio[name=haschild][value='+hasChild+']').prop('checked','checked').change();
            $('#submenulink').val(obj.Link);
            $('#submenuicon').val(obj.FaIcon);
            $('#description').val(obj.Description);
            $('#displayorder').val(obj.DisplayOrderIndex);
            $(":radio[name='activitystatus'][value='"+obj.SubmenuStatus+"']").prop('checked','checked');
            $(":radio[name='deletestatus'][value='"+obj.DeleteStatus+"']").prop('checked','checked');
            
        });
        $('#btnaddsubmenu').click(addSubMenu);
        $('#btnupdatesubmenu').click(updateSubMenu);
        $('#btndeletesubmenu').click(deleteSubMenu);
        
    });
    function addSubMenu(){
       
        var site_url = '<?=site_url()?>';
        var menuid = $('#menuname option:selected').val();
        var submenuname = $('#submenuname').val();
        var haschild = $(':radio[name=haschild]:checked').val();
        var submenulink = $('#submenulink option:selected').val();
        var submenuicon = $('#submenuicon').val();
        var description = $('#description').val();
        const submenustatus = $(":radio[name='activitystatus']:checked").val();
        const deletestatus = $(":radio[name='deletestatus']:checked").val();
        const displayorder =  $('#displayorder').val();
        $.ajax({
            type:'POST',
            url:site_url +'masterdata/MasterDataSubMenu/insertMasterDataSubMenuFromAjax',
            dataType:"json",
            data:{
                submenuname:submenuname,
                haschild:haschild,
                submenulink:submenulink,
                submenuicon:submenuicon,
                description:description,
                menuid:menuid,
               submenustatus:submenustatus,
                deletestatus:deletestatus,
                displayorder:displayorder
            },
            success:function(data)
            {
                if(data.error === true){
                    call_alert_error('SubMenuModal',data.message);
                }else{
                    loadSubMenu();
                    loadMenu();
                    call_alert_success('SubMenuModal',data.message,'1');
                }
            }
        });
    }
    function updateSubMenu(){
       
       var site_url = '<?=site_url()?>';
       var submenuname = $('#submenuname').val();
       var haschild = $(':radio[name=haschild]:checked').val();
       var submenulink = $('#submenulink option:selected').val();
       var submenuicon = $('#submenuicon').val();
       var description = $('#description').val();
       var submenuID = $('#submenuID').val();
       var menuid = $('#menuname option:selected').val();
       const submenustatus = $(":radio[name='activitystatus']:checked").val();
        const deletestatus = $(":radio[name='deletestatus']:checked").val();
        const displayorder =  $('#displayorder').val();
       $.ajax({
           type:'POST',
           url:site_url +'masterdata/MasterDataSubMenu/updateMasterDataSubMenuFromAjax',
           dataType:"json",
           data:{
                submenuname:submenuname,
               haschild:haschild,
               submenulink:submenulink,
               submenuicon:submenuicon,
               description:description,
               submenuID:submenuID,
               menuid:menuid,
               submenustatus:submenustatus,
                deletestatus:deletestatus,
                displayorder:displayorder
           },
           success:function(data)
           {
               if(data.error === true){
                   call_alert_error('SubMenuModal',data.message);
               }else{
                   loadSubMenu();
                   // load_menu_select();
                   call_alert_success('SubMenuModal',data.message,'1');
               }
           }
       });
   }
    
    function deleteSubMenu(){
        var base_url = "<?php echo site_url();?>";
        var submenuID = $('#submenuID').val();
        var menuid = $('#menuname option:selected').val();
         $.ajax({
            type:'POST',
            url: base_url + 'masterdata/MasterDataSubMenu/deleteMasterDataSubMenuFromAjax',
            dataType:"json",
            data:{
                submenuID:submenuID,
                menuid:menuid
            },
            success:function(data)
            {
                if(data.error === true){
                    call_alert_error('SubMenuModal',data.message);
                }else{
                    loadSubMenu();
                    call_alert_success('SubMenuModal',data.message);
                }
            }
        });
    }
    
    function loadSubMenu(){
        var site_url = '<?=site_url()?>';
        $.fn.dataTable.ext.errMode = 'none';
        $.fn.dataTable.ext.classes.sPageButton = 'page-link';
        // $.fn.dataTable.ext.classes.sTable = '';
        // $.fn.dataTable.ext.classes.sNoFooter = '';
        $('#submenuListTable').DataTable({
            destroy: true,
            lengthMenu: [[10, 20, -1], [10, 20, "All"]],
            "ajax": {
                "url": site_url +"masterdata/MasterDataSubMenu/ajaxLoadSubMenu" ,
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
                        data[i]["edit"] = "<button class='btn btn-info user_action' data-action='edit' data-obj='" + data_array + "' data-toggle='modal' data-target='#SubMenuModal'><i class='fa fa-edit'></i> Edit</button>";
                        data[i]["delete"] = "<button class='btn btn-danger user_action' data-action='delete' data-obj='" + data_array + "' data-toggle='modal' data-target='#SubMenuModal'><i class='fa fa-times'></i> Deactivate</button>";
                    }

                    return data;
                }
            },
            "columns": [
                {"data": "num"},
                {"data": "MenuName"},
                {"data": "SubMenuName"},
                {"data": "HasChild"},
                {"data": "Contoller"},
                {"data": "Function"},
                {"data": "SubFaIcon"},
                {"data": "Description"},
                {"data": "AddedDate"},
                {"data": "edit"},
                {"data": "delete"}
            ],
            "bInfo":false
        });
    }
    function loadSubLink(){
        const site_url = "<?php echo site_url();?>";
        $.ajax({
            type:'POST',
            url: site_url + 'masterdata/MasterDataSubMenu/loadlink',
            dataType:"json",
            async: true,
            cache: false,
            contentType: false,
            enctype: 'multipart/form-data',
            processData: false,
            success:function(data)
            {
                var submenulink_select = $('#submenulink');
                    submenulink_select.empty();
                    submenulink_select.append('<option value="" selected disabled>Select...</option>');
                if(data.length > 0){
                    for(var x = 0; x < data.length; x++){
                        submenulink_select.append('<option value='+ data[x]+'>'+ data[x]  +'</option>');
                    }
                }else{
                    submenulink_select.append('<option>No Result Found!</option>');
                    // call_alert_success(0,data.message,'1');
                }
            }
        });    
    }   
    function loadMenu(){
        const site_url = "<?php echo site_url();?>";
        $.ajax({
            type:'POST',
            url: site_url + 'masterdata/MasterDataSubMenu/loadmenu',
            dataType:"json",
            async: true,
            cache: false,
            contentType: false,
            enctype: 'multipart/form-data',
            processData: false,
            success:function(data)
            {
                var menuname_select = $('#menuname');
                menuname_select.empty();
                menuname_select.append('<option value="" selected disabled>Select...</option>');
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
    };
</script>
 
