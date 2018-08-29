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
        <small>Menulist</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=site_url();?>"><i class="fa fa-dashboard"></i>Home</a></li>
        <li><a href="#" data-toggle='modal' data-target='#MenuModal'><i class="fa fa-keyboard-o"></i>Register Menu Information</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
	
	<div class="box">
            <div class="box-header">
              <h3 class="box-title">Menu Lists</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="menuListTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th width="10">[#]</th>
                    <th width="250">Menu Name</th>
                    <th width="100">Has Child</th>
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
<div class="modal fade" id="MenuModal" role="dialog">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Menu</h4>
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
                    <input type="hidden" id="menuID"/>
                    <div class="form-group">
                      <label for="menuname">Menu Name</label>
                      <input type="text" class="form-control" id="menuname" placeholder="Enter Menu">
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
                      <!-- <select class="form-control" id="menuhaschild">
                          <option value="no" selected>No</option>
                          <option value="yes">Yes</option>
                      </select> -->
                    </div>
                    <div class="form-group">
                      <label for="menulink">Link</label>
                      <select class="form-control" name="menulink" id="menulink">
                            
                        </select>
                    </div>
                    <div class="form-group">
                      <label for="menuicon">Font-awesome Icon</label>
                      <input type="text" class="form-control" id="menuicon" placeholder="Font awesome Icon">
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
            <button type="button" class="btn btn-primary" id="btnaddmenu">Submit</button>
            <button type="button" class="btn btn-success" id="btnupdatemenu" style="display:none;">Update</button>
            <button type="button" class="btn btn-danger" id="btndeletemenu" style="display:none;">Delete</button>
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
        loadLink();
        loadMenu();
        $('#MenuModal').on('shown.bs.modal', function (e) {
        // do something...
        action = $(e.relatedTarget).attr('data-action');
        if(action === 'edit') {
                $('#btnupdatemenu').show();
                $('#btndeletemenu').hide();
            }else if(action === 'delete'){
                $('#btnupdatemenu').hide();
                $('#btndeletemenu').show();
        }else{
            $('#btnaddmenu').show();
            $('#btnupdatemenu').hide();
            $('#btndeletemenu').hide();
        }    
        
        })
        $(':radio[name=haschild]').change(function(){
            if($(this).is(':checked') && $(this).val()=='yes'){
                $('#menulink').attr('disabled',true)
            }else{
                $('#menulink').attr('disabled',false)
            }
            


        }).change();
        $(document).on('click','.user_action',function(){
            $('#btnaddmenu').hide();
            var action = $(this).attr('data-action');
            var obj = JSON.parse($(this).attr('data-obj'));
            console.log(obj.SysID)
            $('#menuID').val(obj.SysID);
            $('#menuname').val(obj.MenuName);
            $(':radio[name=haschild][value='+obj.HasChild.toLowerCase()+']').prop('checked','checked').change();
            $('#menulink').val(obj.Link);
            $('#menuicon').val(obj.FaIcon);
            $('#description').val(obj.Description);
            $(":radio[name='activitystatus'][value='"+obj.MenuStatus+"']").prop('checked','checked');
            $(":radio[name='deletestatus'][value='"+obj.DeleteStatus+"']").prop('checked','checked');
            
        });
        $('#btnaddmenu').click(addMenu);
        $('#btnupdatemenu').click(updateMenu);
        $('#btndeleteuser').click(deleteMenu);
        
    });
    function addMenu(){
       
        var site_url = '<?=site_url()?>';
        var menuname = $('#menuname').val();
        var haschild = $(':radio[name=haschild]:checked').val();
        var menulink = $('#menulink option:selected').val();
        var menuicon = $('#menuicon').val();
        var description = $('#description').val();
        const menustatus = $(":radio[name='activitystatus']:checked").val();
        const deletestatus = $(":radio[name='deletestatus']:checked").val();
        $.ajax({
            type:'POST',
            url:site_url +'masterdata/MasterDataMenu/insertMasterDataMenuFromAjax',
            dataType:"json",
            data:{
                menuname:menuname,
                haschild:haschild,
                menulink:menulink,
                menuicon:menuicon,
                description:description,
                menustatus:menustatus,
                deletestatus:deletestatus
            },
            success:function(data)
            {
                if(data.error === true){
                    call_alert_error('MenuModal',data.message);
                }else{
                    loadMenu();
                    // load_menu_select();
                    call_alert_success('MenuModal',data.message,'1');
                }
            }
        });
    }
    function updateMenu(){
       
       var site_url = '<?=site_url()?>';
       var menuname = $('#menuname').val();
       var haschild = $(':radio[name=haschild]:checked').val();
       var menulink = $('#menulink option:selected').val();
       var menuicon = $('#menuicon').val();
       var description = $('#description').val();
       var menuID = $('#menuID').val();
       const menustatus = $(":radio[name='activitystatus']:checked").val();
        const menustatus = $(":radio[name='deletestatus']:checked").val();
       $.ajax({
           type:'POST',
           url:site_url +'masterdata/MasterDataMenu/updateMasterDataMenuFromAjax',
           dataType:"json",
           data:{
               menuname:menuname,
               haschild:haschild,
               menulink:menulink,
               menuicon:menuicon,
               description:description,
               menuID:menuID,
                menustatus:menustatus,
                deletestatus:deletestatus
           },
           success:function(data)
           {
               if(data.error === true){
                   call_alert_error('MenuModal',data.message);
               }else{
                   loadMenu();
                   // load_menu_select();
                   call_alert_success('MenuModal',data.message,'1');
               }
           }
       });
   }
    
    function deleteMenu(){
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
        });
    }
    
    function loadMenu(){
        var site_url = '<?=site_url()?>';
        $.fn.dataTable.ext.errMode = 'none';
        $.fn.dataTable.ext.classes.sPageButton = 'page-link';
        // $.fn.dataTable.ext.classes.sTable = '';
        // $.fn.dataTable.ext.classes.sNoFooter = '';
        $('#menuListTable').DataTable({
            destroy: true,
            lengthMenu: [[10, 20, -1], [10, 20, "All"]],
            "ajax": {
                "url": site_url +"masterdata/MasterDataMenu/ajaxLoadMenu" ,
                "type": "POST",
                "dataSrc": function (data) {
                    var ctr = 0;
                    for (var i = 0; i < data.length; i++){
                        ctr++;
                        var data_array = [];
                        data_array = JSON.stringify(data[i]);
                        data[i]["num"] = ctr;
                        data[i]["Contoller"] = data[i].Link ? data[i].Link.split('/'[0]) : "";
                        data[i]["Function"] = data[i].Link ? data[i].Link.split('/'[1]) : "";
                        // data[i]["changepassword"] = "<button class='btn btn-warning changepass' data-obj='" + data_array + "' data-toggle='modal' data-target='#changepasswordModal'><i class='fa fa-key'></i> Change password</button>";
                        data[i]["edit"] = "<button class='btn btn-info user_action' data-action='edit' data-obj='" + data_array + "' data-toggle='modal' data-target='#MenuModal'><i class='fa fa-edit'></i> Edit</button>";
                        data[i]["delete"] = "<button class='btn btn-danger user_action' data-action='delete' data-obj='" + data_array + "' data-toggle='modal' data-target='#MenuModal'><i class='fa fa-times'></i> Deactivate</button>";
                    }

                    return data;
                }
            },
            "columns": [
                {"data": "num"},
                {"data": "MenuName"},
                {"data": "HasChild"},
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
                        menulink_select.append('<option value='+ data[x]+'>'+ data[x]  +'</option>');
                    }
                }else{
                    menulink_select.append('<option>No Result Found!</option>');
                    // call_alert_success(0,data.message,'1');
                }
            }
        });    
    }   
    
</script>
 
