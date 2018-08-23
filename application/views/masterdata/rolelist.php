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
        <small>Rolelist</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=site_url();?>"><i class="fa fa-dashboard"></i>Home</a></li>
        <li><a href="#" data-toggle='modal' data-target='#RoleModal'><i class="fa fa-keyboard-o"></i>Register Role Information</a></li>      
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
              <table id="roleListTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th width="10">[#]</th>
                    <th width="250">Role Name</th>
                    <th width="200">Role Access</th>
                    <th width="280">Description</th>
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
<div class="modal fade" id="RoleModal" role="dialog">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Role</h4>
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
                    <input type="hidden" id="roleID"/>
                    <div class="form-group">
                        <label for="rolename">Role name <span class="tcolor_red">*</span></label>
                        <input type="text" class="form-control" id="rolename" placeholder="Enter Role name">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" class="form-control" id="description" placeholder="Enter Description">
                    </div>
                    <div class="form-group">
                        <label for="accessrights">Select Access Rights <span class="tcolor_red">*</span></label>
                        <select class="form-control" name="accessrights" id="accessrights">
                            <option value="yes">All Acess</option>   
                            <option value="no">No Access</option>           
                        </select>
                    </div>  
                    <!-- start menu list     -->

                    <div class="form-group">
                        <label for="role_menu">Role Menu</label>
                        <div class="row">
                            <div class="col-lg-12">
                                <?php foreach($menu as $i):?>
                                    <div class="form-check form-check-inline menu" data-menulevel='1'>
                                        <input class="form-check-input menu_list" id="menu_<?=$i->SysID?>" type="checkbox" data-level="menu" data-link="<?=$i->Link?>" value="<?=$i->SysID?>">
                                        <label for="menu_<?=$i->SysID?>" class="form-check-label label-checkbox"><?=$i->MenuName?></label>
                                    </div>
                                    <?php if( strtolower($i->HasChild) === 'yes'):?>
                                        <?php foreach($i->child_list as $j):?>
                                            <div class="form-check form-check-inline checkbox-midparent submenu" data-menulevel='2'>
                                                <input class="form-check-input menu_list" data-parent="menu_<?=$i->SysID?>" id="submenu_<?=$j->SysID?>" type="checkbox" data-level="submenu" data-link="<?=$j->Link?>" value="<?=$j->SysID?>">
                                                <label for="submenu_<?=$i->SysID?>" class="form-check-label label-checkbox"><?=$j->SubMenuName?></label>
                                            </div>
                                            <?php if( strtolower($j->HasChild) === 'yes'): ?>
                                                <?php foreach($j->child_list as $k):?>
                                                    <div class="form-check form-check-inline checkbox-child screen" data-menulevel='3'>
                                                        <input class="form-check-input menu_list" data-parent="menu_<?=$i->SysID?>" data-parent2="submenu_<?=$j->SysID?>" id="screen_<?=$k->SysID?>" type="checkbox" data-level="screen" data-link="<?=$k->Link?>" value="<?=$k->SysID?>">
                                                        <label for="screen_<?=$i->SysID?>" class="form-check-label label-checkbox"><?=$k->ScreenName?></label>
                                                    </div>
                                                <?php endforeach;?>
                                            <?php endif;?>
                                        <?php endforeach;?>
                                    <?php endif;?>
                                <?php endforeach;?>
                            </div>
                            <div class="col-md-6">

                            </div>
                        </div>
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

                    <!-- end menu list   -->
              </div>
              
            <!-- /.box-body -->
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" id="btnaddrole">Submit</button>
            <button type="button" class="btn btn-success" id="btnupdaterole" style="display:none;">Update</button>
            <button type="button" class="btn btn-danger" id="btndeleterole" style="display:none;">Delete</button>
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

        loadRole();
        $('#RoleModal').on('shown.bs.modal', function (e) {
        // do something...
            action = $(e.relatedTarget).attr('data-action');
            console.log(action)
            // if(action == undefined ){
            //     $(e.target).find('div[data-menulevel = 2],div[data-menulevel = 3]').hide();
            // }
            $("input.menu_list").trigger("change");
            if(action === 'edit') {
                    $('#btnaddrole').hide();
                    $('#btnupdaterole').show();
                    $('#btndeleterole').hide();
                }else if(action === 'delete'){
                    $('#btnaddrole').hide();
                    $('#btnupdaterole').hide();
                    $('#btndeleterole').show();
            }else{
                
                $('#btnaddrole').show();
                $('#btnupdaterole').hide();
                $('#btndeleterole').hide();
            }    
        })
        $(document).on('change','input.menu_list',function(){
            var datamenulevel = +$(this).parent().attr('data-menulevel');
            if($(this).is(':checked') == false){
                var this_parent = $(this).attr('id');
                $('input.menu_list[data-parent ='+ this_parent+']').prop('checked',false);
                $('input.menu_list[data-parent2 ='+ this_parent+']').prop('checked',false);


                $(this).parent().nextUntil(function () {
                    return $(this).attr("data-menulevel") <= datamenulevel;
                }, "div").hide();
            }
            else{
                var this_parent = $(this).attr('data-parent');
                var this_parent2 = $(this).attr('data-parent2');
                $('input.menu_list[id='+ this_parent+']').prop('checked',true);
                $('input.menu_list[id='+ this_parent2+']').prop('checked',true);
                

                if(datamenulevel == 2){
                    console.log(datamenulevel)
                    $(this).parent().nextUntil('div[data-menulevel='+datamenulevel+']').show();
                }
                if(datamenulevel == 1){
                    // $(this).parent().nextUntil('div[data-menulevel='+datamenulevel+']').show();
                    $(this).parent().nextUntil('div[data-menulevel='+datamenulevel+']').filter(function() {
                        return $(this).attr("data-menulevel") <= parseInt(datamenulevel+1);
                    }).show();
                }
                
            }
        });
        $(document).on('click','.user_action',function(){
            var action = $(this).attr('data-action');
            var obj = JSON.parse($(this).attr('data-obj'));
            $('#roleID').val(obj.SysID);
            $('#rolename').val(obj.RoleName);
            $('#description').val(obj.Description);
            $('#accessrights').val(obj.RoleAccess);
            console.log(obj.menu_list)
            $.each(obj.menu_list,function(index,obj){
                return $('input.menu_list[id='+ obj.ItemNumber +']').prop('checked',true).trigger("change");   
            });
        });
        
        $('#btnaddrole').click(addRoles);
        $('#btnupdaterole').click(updateRole);
    });
    function addRoles(){
        var site_url = '<?=site_url()?>';
        var menu_list = [];
        var access = $("#accessrights option:selected").val();
        $('.menu_list:checked').each(function(index,obj){
            
            
            menu_list.push({
                code_id:$(this).attr('id'),
                level:$(this).attr('data-level'),
                page_name:$(this).val(),
                link:$(this).attr('data-link'),
                access: access
            })
        });
        const rolestatus = $(":radio[name='activitystatus']:checked").val();
        const deletestatus = $(":radio[name='deletestatus']:checked").val();
        $.ajax({
            type:'POST',
            url:site_url +'masterdata/MasterDataRole/insertMasterDataRoleFromAjax',
            dataType:"json",
            data:{
                rolename:$('#rolename').val(),
                description:$('#description').val(),
                menu_list:menu_list,
                access:access,
                rolestatus:rolestatus,
                deletestatus:deletestatus
            },
            success:function(data)
            {
                if(data.error === true){
                    call_alert_error('RoleModal',data.message);
                }else{
                    loadRole();
                    $("input.menu_list").trigger("change");
                    call_alert_success('RoleModal',data.message,'1');
                }
            }
        });
    }
    function updateRole(e){
        var site_url = '<?=site_url()?>';
        var menu_list = [];
        var access = $("#accessrights option:selected").val();
        $('.menu_list:checked').each(function(index,obj){
            
            
            menu_list.push({
                code_id:$(this).attr('id'),
                level:$(this).attr('data-level'),
                page_name:$(this).val(),
                link:$(this).attr('data-link'),
                access: access
            })
        });
        const rolestatus = $(":radio[name='activitystatus']:checked").val();
        const deletestatus = $(":radio[name='deletestatus']:checked").val();
        $.ajax({
            type:'POST',
            url:site_url +'masterdata/MasterDataRole/updateMasterDataRoleFromAjax',
            dataType:"json",
            data:{
                rolename:$('#rolename').val(),
                description:$('#description').val(),
                menu_list:menu_list,
                access:access,
                id:$('#roleID').val(),
                rolestatus:rolestatus,
                deletestatus:deletestatus
            },
            success:function(data)
            {
                if(data.error === true){
                    call_alert_error('RoleModal',data.message);
                }
                else{
                    loadRole();
                    $("input.menu_list[data-level=screen]").closest('div.form-check').hide();
                    $("input.menu_list[data-level=submenu]").closest('div.form-check').hide();
                    call_alert_success('RoleModal',data.message,'1');
                }
            }
        });
    }
    
    function delete_user()
    {
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
                    $("input.menu_list").trigger("change");
                    call_alert_success('myModal',data.message);
                }
            }
        });
    }
    
    function loadRole(){
        var site_url = '<?=site_url()?>';
        $.fn.dataTable.ext.errMode = 'none';
        $.fn.dataTable.ext.classes.sPageButton = 'page-link';
        // $.fn.dataTable.ext.classes.sTable = '';
        // $.fn.dataTable.ext.classes.sNoFooter = '';
        $('#roleListTable').DataTable({
            destroy: true,
            lengthMenu: [[10, 20, -1], [10, 20, "All"]],
            "ajax": {
                "url": site_url +"masterdata/MasterDataRole/ajaxLoadRole" ,
                "type": "POST",
                "dataSrc": function (data) {
                    var ctr = 0;
                    var arr=['Read Onyl','Write Only','Read and Write'];
                    for (var i = 0; i < data.length; i++){
                        ctr++;
                        var data_array = [];
                        data_array = JSON.stringify(data[i]);
                        
                        data[i]["num"] = ctr;
                        // data[i]["AccessName"] = arr[parseInt(data[i].Access)-1];
                        data[i]["AccessName"] = data[i].RoleAccess.substr(0,1).toUpperCase() + data[i].RoleAccess.substr(1);
                        // data[i]["changepassword"] = "<button class='btn btn-warning changepass' data-obj='" + data_array + "' data-toggle='modal' data-target='#changepasswordModal'><i class='fa fa-key'></i> Change password</button>";
                        data[i]["edit"] = "<button class='btn btn-info user_action' data-action='edit' data-obj='" + data_array + "' data-toggle='modal' data-target='#RoleModal'><i class='fa fa-edit'></i> Edit</button>";
                        data[i]["delete"] = "<button class='btn btn-danger user_action' data-action='delete' data-obj='" + data_array + "' data-toggle='modal' data-target='#RoleModal'><i class='fa fa-times'></i> Deactivate</button>";
                    }

                    return data;
                }
            },
            "columns": [
                {"data": "num"},
                {"data": "RoleName"},
                {"data": "AccessName"},
                {"data": "Description"},
                {"data": "AddedDate"},
                {"data": "edit"},
                {"data": "delete"}
            ],
            "bInfo":false
        });
    }
    
    
</script>
 
