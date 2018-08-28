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
        <small>PromoList</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=site_url();?>"><i class="fa fa-dashboard"></i>Home</a></li>
        <li><a href="#" data-toggle='modal' data-target='#GymContentModal'><i class="fa fa-keyboard-o"></i>Promo</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
	
	<div class="box">
            <div class="box-header">
              <h3 class="box-title">Bulletin Board Lists</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="bulletinboardListTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th width="10">[#]</th>
                    <th width="150">Entry Title</th>
                    <th width="150">Entry Type</th>
                    <th width="150">Show To Role </th>
                    <th width="150">Show To Branch </th>
                    <th width="150">Entry From</th>
                    <th width="50">Active</th>
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
<!-- register start -->
<div class="modal fade" id="GymContentModal" role="dialog">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Main Gym Login</h4>
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
                    <input type="hidden" id="promoID"/>
                    <label for="promoname">Promo name <span class="tcolor_red">*</span></label>
                    <input type="text" class="form-control" id="promoname" placeholder="Enter Promo name">
                </div>
                <div class="form-group">
                  <label for="description">Promo description</label>
                  <Textarea class="form-control" rows="5" style="resize: vertical;" id="description"></Textarea>
                </div>
                <div class="form-group">
                  <label for="lname">Promo Registration Dates <span class="tcolor_red">*</span></label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control pull-right" id="promodates">
                  </div>
                </div>
                <div class="form-group">
                  <label for="promoduration">Promo Duration</label>
                  <input type="text" class="form-control" id="promoduration" placeholder="Enter Duration">
                </div>
                <div class="form-group">
                  <label for="promoamount">Promo Amount<span class="tcolor_red">*</span></label>
                  <input type="text" class="form-control" id="promoamount" placeholder="Enter Amount">
                </div>   
                
              </div>
              <!-- /.box-body -->
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" id="btnadd">Submit</button>
            <button type="button" class="btn btn-success" id="btnupdate" style="display:none;">Update</button>
            <button type="button" class="btn btn-danger" id="btndelete" style="display:none;">Delete</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <!-- register end -->
<!-- end modal -->
  
  
    
<script src="<?=site_url();?>assets/adminlte/bower_components/moment/min/moment.min.js"></script>
<script src="<?=site_url();?>assets/adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>  
<script src="<?=site_url();?>assets/adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?=site_url();?>assets/adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script>
    $(document).ready(function(){
        loadBulletinBoard();
        loadAllusers();
        loadBranch();
        //Date range picker
        $('#promodates').daterangepicker()
        $('#BulletinBoardModal').on('shown.bs.modal', function (e) {
        // do something...
        action = $(e.relatedTarget).attr('data-action');
        if(action === 'edit') {
                $('#btnupdatebulletinboard').show();
                $('#btndeletebulletinboard').hide();
            }else if(action === 'delete'){
                $('#btnupdatebulletinboard').hide();
                $('#btndeletebulletinboard').show();
        }else{
            $('#btnaddbulletinboard').show();
            $('#btnupdatebulletinboard').hide();
            $('#btndeletebulletinboard').hide();
        }    
        })
        $(document).on('click','.user_action',function(){
            $('#btnaddbulletinboard').hide();
            var action = $(this).attr('data-action');
            var obj = JSON.parse($(this).attr('data-obj'));
            console.log(obj)
            
            $('#bulletinboardID').val(obj.SysID);
            $('#entrytype').val(obj.EntryType);
            console.log(obj.BranchName)
            $.each(obj.BranchName, function(i,e){
                $('#showtobranch option[value="' + e.BranchID + '"]').prop("selected", true);
            })
            // $('#showtobranch').trigger("change");
            var changedata = {type:"change",RoleName:obj.RoleName};
            $('#showtobranch').trigger(changedata);
            $('#entryfrom').val(obj.EntryFrom[0].userID);
            $('#entrytitle').val(obj.EntryTitle);
            $('#entryindex').val(obj.EntryOrderIndex);
            $('#description').val(obj.EntryDescription);
            
            
        });
        $('#btnaddbulletinboard').click(addBulletinBoard);
        $('#btnupdatebulletinboard').click(updateBulletinBoard);
        $('#btndeletebulletinboard').click(deleteMenu);
        // var changedata = {type:"change",submenuID:obj.submenuID};
        // $('#menuname').val(obj.menuID).trigger(changedata);
        $('#showtobranch').change(loadBranchroles);
    });
    function addBulletinBoard(){
       
        var site_url = '<?=site_url()?>';
        var entrytype = $('#entrytype option:selected').val();
        var showtobranch = $('#showtobranch').val();
        var showtobranchrole = $('#showtobranchrole').val();
        var entryfrom = $('#entryfrom option:selected').val();
        var entrytitle = $('#entrytitle').val();
        var entrytitle = $('#entrytitle').val();
        var entryindex = $('#entryindex').val();
        var description = $('#description').val();
        if(jQuery.inArray("*", showtobranch) !== -1){
            showtobranch = $("select#showtobranch option").slice(2).map(function() {
                return this.value;
            }).get();
        }
        if(jQuery.inArray("*", showtobranchrole) !== -1){
            showtobranchrole = $("select#showtobranchrole option").slice(2).map(function() {
                return this.value;
            }).get();
        }
        var arr = [];
        $.each(showtobranchrole,function(i,v){
            $.each(showtobranch,function(ii,vv){
                arr.push({
                    "ShowToBranchRole": v,
                    "EntryShowToBranch": vv,
                    "EntryType": entrytype,
                    "EntryTitle": entrytitle,
                    "EntryFrom": entryfrom,
                    "EntryDescription": description,
                });

            });

        });
        const bulletinboardstatus = $(":radio[name='activitystatus']:checked").val();
        const deletestatus = $(":radio[name='deletestatus']:checked").val();
        $.ajax({
            type:'POST',
            url:site_url +'masterdata/MasterDataBulletinBoard/insertMasterDataBulletinBoardFromAjax',
            dataType:"json",
            data:{
                data : arr,
                entrytype: entrytype,
                entrytitle: entrytitle,
                entryfrom: entryfrom,
                description: description,
                showtobranchrole:showtobranchrole,
                showtobranch:showtobranch,
                entryindex:entryindex,
                deletestatus:deletestatus,
                bulletinboardstatus:bulletinboardstatus
            },
            success:function(data)
            {
                if(data.error === true){
                    call_alert_error('BulletinBoardModal',data.message);
                }else{
                    loadBulletinBoard();
                    // load_menu_select();
                    call_alert_success('BulletinBoardModal',data.message,'1');
                }
            }
        });
    }
    function updateBulletinBoard(){
       
        var site_url = '<?=site_url()?>';
        var bulletinboardID = $('#bulletinboardID').val();
        var entrytype = $('#entrytype option:selected').val();
        var showtobranch = $('#showtobranch').val();
        var showtobranchrole = $('#showtobranchrole').val();
        var entryfrom = $('#entryfrom option:selected').val();
        var entrytitle = $('#entrytitle').val();
        var entrytitle = $('#entrytitle').val();
        var entryindex = $('#entryindex').val();
        var description = $('#description').val();
        if(jQuery.inArray("*", showtobranch) !== -1){
            showtobranch = $("select#showtobranch option").slice(2).map(function() {
                return this.value;
            }).get();
        }
        if(jQuery.inArray("*", showtobranchrole) !== -1){
            showtobranchrole = $("select#showtobranchrole option").slice(2).map(function() {
                return this.value;
            }).get();
        }
        var arr = [];
        $.each(showtobranchrole,function(i,v){
            $.each(showtobranch,function(ii,vv){
                arr.push({
                    "ShowToBranchRole": v,
                    "EntryShowToBranch": vv,
                    "EntryType": entrytype,
                    "EntryTitle": entrytitle,
                    "EntryFrom": entryfrom,
                    "EntryDescription": description,
                });

            });

        });
        const bulletinboardstatus = $(":radio[name='activitystatus']:checked").val();
        const deletestatus = $(":radio[name='deletestatus']:checked").val();
        $.ajax({
            type:'POST',
            url:site_url +'masterdata/MasterDataBulletinBoard/updateMasterDataBulletinBoardFromAjax',
            dataType:"json",
            data:{
                data : arr,
                entrytype: entrytype,
                entrytitle: entrytitle,
                entryfrom: entryfrom,
                description: description,
                showtobranchrole:showtobranchrole,
                showtobranch:showtobranch,
                entryindex:entryindex,
                bulletinboardID:bulletinboardID,
                deletestatus:deletestatus,
                bulletinboardstatus:bulletinboardstatus
            },
            success:function(data)
            {
                if(data.error === true){
                    call_alert_error('BulletinBoardModal',data.message);
                }else{
                    loadBulletinBoard();
                    // load_menu_select();
                    call_alert_success('BulletinBoardModal',data.message,'1');
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
                    call_alert_error('BulletinBoardModal',data.message);
                }
                else
                {
                    load_user();
                    call_alert_success('BulletinBoardModal',data.message);
                }
            }
        });
    }
    
    function loadBulletinBoard(){
        var site_url = '<?=site_url()?>';
        $.fn.dataTable.ext.errMode = 'none';
        $.fn.dataTable.ext.classes.sPageButton = 'page-link';
        // $.fn.dataTable.ext.classes.sTable = '';
        // $.fn.dataTable.ext.classes.sNoFooter = '';
        $('#bulletinboardListTable').DataTable({
            destroy: true,
            lengthMenu: [[10, 20, -1], [10, 20, "All"]],
            "ajax": {
                "url": site_url +"masterdata/MasterDataBulletinBoard/ajaxLoadBulletinBoard" ,
                "type": "POST",
                "dataSrc": function (data) {
                    var ctr = 0;
                    var name = "";
                    for (var i = 0; i < data.length; i++){
                        ctr++;
                        var data_array = [];
                        
                        data_array = JSON.stringify(data[i]);
                        data[i]["num"] = ctr;
                        var branchname = [];
                        var rolename = [];
                        for (var ii = 0; ii < data[i].BranchName.length; ii++){
                            branchname.push(data[i].BranchName[ii].BranchName)
                        }
                        for (var v = 0; v < data[i].RoleName.length; v++){
                            rolename.push(data[i].RoleName[v].RoleName)
                        }
                        name = data[i].EntryFrom[0].FirstName +" "+ data[i].EntryFrom[0].LastName; 
                        var EntryStatus = data[i].EntryStatus.toLowerCase().replace(/\b[a-z]/g, function(letter) {
                            return letter.toUpperCase();
                        });
                        data[i]["rolename"] = rolename;
                        data[i]["branchname"] = branchname;   
                        data[i]["EntryFromName"] = name;      
                        data[i]["active"] = EntryStatus;      
                        // data[i]["changepassword"] = "<button class='btn btn-warning changepass' data-obj='" + data_array + "' data-toggle='modal' data-target='#changepasswordModal'><i class='fa fa-key'></i> Change password</button>";
                        data[i]["edit"] = "<button class='btn btn-info user_action' data-action='edit' data-obj='" + data_array + "' data-toggle='modal' data-target='#BulletinBoardModal'><i class='fa fa-edit'></i> Edit</button>";
                        data[i]["delete"] = "<button class='btn btn-danger user_action' data-action='delete' data-obj='" + data_array + "' data-toggle='modal' data-target='#BulletinBoardModal'><i class='fa fa-times'></i> Deactivate</button>";
                    }

                    return data;
                }
            },
            "columns": [
                {"data": "num"},
                {"data": "EntryTitle"},
                {"data": "EntryType"},
                {"data": "rolename"},
                {"data": "branchname"},
                {"data": "EntryFromName"},
                {"data": "active"},
                {"data": "AddedDate"},
                {"data": "edit"},
                {"data": "delete"}
            ],
            "bInfo":false
        });
    }

    function loadAllusers(){
        const site_url = "<?php echo site_url();?>";
        $.ajax({
           type:'POST',
           url:site_url +'masterdata/MasterDataBulletinBoard/loadAllusers',
           dataType:"json",
           success:function(data){
            var users_select = $('#entryfrom');
                users_select.empty();
                users_select.append('<option value="" selected disabled>Select...</option>');
            if(data.length > 0){
                for(var x = 0; x < data.length; x++){
                    var firstlast = data[x].FirstName + " " + data[x].LastName
                    users_select.append('<option value='+ data[x].SysID+'>'+ firstlast +'</option>');
                }
            }else{
                users_select.append('<option>No Result Found!</option>');
                // call_alert_success(0,data.message,'1');
            }
           }
       });
    }
    function loadBranchroles(e){
        const site_url = "<?php echo site_url();?>";
        $.ajax({
           type:'POST',
           url:site_url +'masterdata/MasterDataBulletinBoard/loadBranchRoles',
           dataType:"json",
           data:{
               branchID:$(e.target).val()
           },
           success:function(data){
            var branchrole_select = $('#showtobranchrole');
                branchrole_select.empty();
                branchrole_select.append('<option value="" selected disabled>Select...</option>');
            if(data.length > 0){
                branchrole_select.append('<option value="*">All</option>');
                for(var x = 0; x < data.length; x++){
                    branchrole_select.append('<option value='+ data[x].SysID+'>'+ data[x].RoleName  +'</option>');
                }
            }else{
                branchrole_select.append('<option>No Result Found!</option>');
                // call_alert_success(0,data.message,'1');
            }
           }
       }).done(function(){
            if(e.RoleName !== undefined && e.RoleName !== '' ){
                $.each(e.RoleName, function(i,v){
                    $('#showtobranchrole option[value="' + v.roleID + '"]').prop("selected", true);
                })
                
            }
        
       });
    }
    function loadBranch(e){
        const site_url = "<?php echo site_url();?>";
        
        $.ajax({
            type:'POST',
            url: site_url + 'masterdata/MasterDataBulletinBoard/loadBranch',
            dataType:"json",
            async: true,
            cache: false,
            contentType: false,
            enctype: 'multipart/form-data',
            processData: false,
            success:function(data){
                var branch_select = $('#showtobranch');
                    branch_select.empty();
                    branch_select.append('<option value="" selected disabled>Select...</option>');
                if(data.length > 0){
                    branch_select.append('<option value="*">All</option>');
                    // <optgroup label="Condiments" data-max-options="2">
                    //         <option>Mustard</option>
                    //         <option>Ketchup</option>
                    //         <option>Relish</option>
                    //     </optgroup>
                    //     <optgroup label="Breads" data-max-options="2">
                    //         <option>Plain</option>
                    //         <option>Steamed</option>
                    //         <option>Toasted</option>
                    //     </optgroup>
                    for(var x = 0; x < data.length; x++){
                        // branch_select.append('<option value='+ data[x].SysID+'>'+ data[x].BranchName  +'</option>');
                        branch_select.append('<option value='+ data[x].SysID+'>'+ data[x].BranchName  +'</option>');
                    }
                }else{
                    branch_select.append('<option>No Result Found!</option>');
                    // call_alert_success(0,data.message,'1');
                }
            }
        });   
    }   
    
</script>
 
