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
        <small>DigitalSocialMediaResourceslist</small>
      </h1>
      <ol class="breadcrumb">
      <li><a href="<?=site_url().''.'Welcome';?>"><i class="fa fa-dashboard"></i>Home</a></li>
        <li><a href="#" data-toggle='modal' data-target='#DigitalSocialMediaResourcesModal'><i class="fa fa-keyboard-o"></i>Register Digital and Social Media Resources Information</a></li>      
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
	
	<div class="box">
            <div class="box-header">
              <h3 class="box-title">Digital and Social Media Resources Lists</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="digitalsocialmediaresourcesListTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th width="10">[#]</th>
                    <th width="250">Branch</th>
                    <th width="200">Role</th>
                    <th width="120">Name</th>
                    <th width="120">Query Info</th>
                    <th width="100">Display #</th>
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
<div class="modal fade" id="DigitalSocialMediaResourcesModal" role="dialog">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Digital and Social Media Resources</h4>
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
                    <input type="hidden" id="digitalsocialmediaresourcesID"/>
                    <div class="form-group">
                        <label for="showtobranch">Show to Branch</label>
                        <!-- <select class="form-control" name="showtobranch" id="showtobranch">
                                
                        </select> -->
                        <select class="form-control" name="showtobranch" id="showtobranch" multiple>
                        
                        </select>

                    </div>
                    <div class="form-group">
                        <label for="showtobranchrole">Show to Branch Role</label>
                        <select class="form-control" name="showtobranchrole" id="showtobranchrole" multiple>
                                
                        </select>
                    </div>
                    <div class="form-group">
                      <label for="digitalsocialmediaresourcesname">DigitalSocialMedia Resources Name</label>
                      <input type="text" class="form-control" id="digitalsocialmediaresourcesname" placeholder="Enter DigitalSocialMedia Resources Name">
                    </div>
                    <div class="form-group">
                      <label for="description">Description</label>
                      <!-- <input type="text" class="form-control" id="description" placeholder="Enter Description"> -->
                      <Textarea class="form-control" rows="5" style="resize: vertical;" id="description"></Textarea>
                    </div>
                    <div class="form-group">
                        <label for="document">Document</label>
                        <input class="form-control" type="file" id="document" name="document">
                    </div>
                    <div class="form-group">
                      <label for="displayorder">Display Order</label>
                      <input type="text" class="form-control" id="displayorder" placeholder="Enter Display Order">
                    </div>
                    <div class="form-group">
                        <label for="queryinformation">Query Information</label>
                        <select class="form-control" name="queryinformation" id="queryinformation">
                            <option value="1">Main Branch</option>
                            <option value="2">Franchise Branch</option>
                            <option value="3">Main and Franchise Branch</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Activity Status</label>
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="activitystatusno" name="activitystatus" value="no" >
                            <label class="custom-control-label" for="activitystatusno">No</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="activitystatusyes" name="activitystatus" value="yes" checked>
                            <label class="custom-control-label" for="activitystatusyes">Yes</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Delete Status</label>
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="deletestatusno" name="deletestatus" value="no" checked>
                            <label class="custom-control-label" for="deletestatusno">No</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="deletestatusyes" name="deletestatus" value="yes" >
                            <label class="custom-control-label" for="deletestatusyes">Yes</label>
                        </div>
                    </div>
                </div>
          <!-- /.box-body -->
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" id="btnadddigitalsocialmediaresources">Submit</button>
            <button type="button" class="btn btn-success" id="btnupdatedigitalsocialmediaresources" style="display:none;">Update</button>
            <button type="button" class="btn btn-danger" id="btndeletedigitalsocialmediaresources" style="display:none;">Delete</button>
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
        loadDigitalSocialMediaResources();
        loadBranch();
        $('#DigitalSocialMediaResourcesModal').on('shown.bs.modal', function (e) {
        action = $(e.relatedTarget).attr('data-action');
        if(action === 'edit') {
                $('#btnupdatedigitalsocialmediaresources').show();
                $('#btndeletedigitalsocialmediaresources').hide();
            }else if(action === 'delete'){
                $('#btnupdatedigitalsocialmediaresources').hide();
                $('#btndeletedigitalsocialmediaresources').hide();
        }else{
            $('#btnadddigitalsocialmediaresources').show();
            $('#btnupdatedigitalsocialmediaresources').hide();
            $('#btndeletedigitalsocialmediaresources').hide();
        }    
        
        })
        $(document).on('click','.user_action',function(){
            $('#btnadddigitalsocialmediaresources').hide();
            var action = $(this).attr('data-action');
            var obj = JSON.parse($(this).attr('data-obj'));
            $.each(obj.BranchName, function(i,e){
                $('#showtobranch option[value="' + e.BranchID + '"]').prop("selected", true);
            })
            var changedata = {type:"change",RoleName:obj.RoleName};
            $('#showtobranch').trigger(changedata);
            $('#digitalsocialmediaresourcesID').val(obj.SysID);
            $('#digitalsocialmediaresourcesname').val(obj.ResourcesDigitalSocialMediaName);
            $('#description').val(obj.Description);
            $('#displayorder').val(obj.DisplayOrderIndex);
            $('#queryinformation').val(obj.QueryInformation);
            $(":radio[name='activitystatus'][value='"+obj.PositionStatus+"']").prop('checked','checked');
            $(":radio[name='deletestatus'][value='"+obj.DeleteStatus+"']").prop('checked','checked');
        });
        $('#btnadddigitalsocialmediaresources').click(addDigitalSocialMediaResources);
        $('#btnupdatedigitalsocialmediaresources').click(updateDigitalSocialMediaResources);
        // $('#btndeleteuser').click(deletePosition);
        $('#showtobranch').change(loadBranchroles);
        
    });
    function addDigitalSocialMediaResources(){
       
        var site_url = '<?=site_url()?>';
        var digitalsocialmediaresourcesname = $('#digitalsocialmediaresourcesname').val();
        var digitalsocialmediaresourcesactivitystatus = $(":radio[name='activitystatus']:checked").val();
        var digitalsocialmediaresourcesdeletestatus = $(":radio[name='deletestatus']:checked").val();
        var description = $('#description').val();
        var document = $('#document')[0].files[0];
        var showtobranch = $('#showtobranch').val();
        var showtobranchrole = $('#showtobranchrole').val();
        const displayorder =  $('#displayorder').val();
        var queryinformation = $('#queryinformation option:selected').val();
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

        let formData = new FormData();
            formData.append('resourcesdigitalsocialmedianame',digitalsocialmediaresourcesname);
            formData.append('resourcesdigitalsocialmediaactivitystatus',digitalsocialmediaresourcesactivitystatus);
            formData.append('resourcesdigitalsocialmediadeletestatus',digitalsocialmediaresourcesdeletestatus);
            formData.append('description',description);
            formData.append('document',document);
            formData.append('displayorder',displayorder);
            formData.append('showtobranch',showtobranch);
            formData.append('showtobranchrole',showtobranchrole);
            formData.append('queryinformation',queryinformation);
        var imgtype = ["image/jpg","image/jpeg","image/png","application/pdf"];
        console.log(document.type)
        if($('#photo').val() == ""){
            $('.form-group.image img').attr('src', "");
        }else{
            if(jQuery.inArray(document.type, imgtype) !== -1 && document.size < 2048000){
                $.ajax({
                    type:'POST',
                    url:site_url +'resources/GymResourcesDigitalSocialMedia/insertGymResourcesDigitalSocialMediaFromAjax',
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
                            call_alert_error('DigitalSocialMediaResourcesModal',data.message);
                        }else{
                            loadDigitalSocialMediaResources();
                            call_alert_success('DigitalSocialMediaResourcesModal',data.message,'1');
                        }
                    }
                });
        }else{
            if(jQuery.inArray(document.type, imgtype) === -1){
                call_alert_error('DigitalSocialMediaResourcesModal',"File Type: " + document.type + " is not acceptable");
            }
            if(document.size > 2048000){
                call_alert_error('DigitalSocialMediaResourcesModal',"File Size: " + document.size + " is greater than the acceptable size of 2048KB");
            }
            if(jQuery.inArray(document.type, imgtype) === -1 && document.size > 2048000){
                call_alert_error('DigitalSocialMediaResourcesModal',"File Type: " + document.type + " is not acceptable and File Size: " + document.size + " is greater than the acceptable size of 2048KB");
            }
            }
        }  
    }
    function updateDigitalSocialMediaResources(){
       
       var site_url = '<?=site_url()?>';
        var digitalsocialmediaresourcesID = $('#digitalsocialmediaresourcesID').val();
        var site_url = '<?=site_url()?>';
        var digitalsocialmediaresourcesname = $('#digitalsocialmediaresourcesname').val();
        var digitalsocialmediaresourcesactivitystatus = $(":radio[name='activitystatus']:checked").val();
        var digitalsocialmediaresourcesdeletestatus = $(":radio[name='deletestatus']:checked").val();
        var description = $('#description').val();
        var document = $('#document')[0].files[0];
        var showtobranch = $('#showtobranch').val();
        var showtobranchrole = $('#showtobranchrole').val();
        const displayorder =  $('#displayorder').val();
        var queryinformation = $('#queryinformation option:selected').val();
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
        console.log(digitalsocialmediaresourcesID)
        let formData = new FormData();
            formData.append('resourcesdigitalsocialmedianame',digitalsocialmediaresourcesname);
            formData.append('resourcesdigitalsocialmediaactivitystatus',digitalsocialmediaresourcesactivitystatus);
            formData.append('resourcesdigitalsocialmediadeletestatus',digitalsocialmediaresourcesdeletestatus);
            formData.append('description',description);
            formData.append('document',document);
            formData.append('displayorder',displayorder);
            formData.append('showtobranch',showtobranch);
            formData.append('showtobranchrole',showtobranchrole);
            formData.append('queryinformation',queryinformation);
            formData.append('digitalsocialmediaresourcesID',digitalsocialmediaresourcesID);
        var imgtype = ["image/jpg","image/jpeg","image/png","application/pdf"];
        // console.log(document.type)
        if($('#photo').val() == ""){
            $('.form-group.image img').attr('src', "");
        }else{
            if($('#document').val().length > 0 ){
                if(jQuery.inArray(document.type, imgtype) !== -1 && document.size < 2048000){
                    $.ajax({
                        type:'POST',
                        url:site_url +'resources/GymResourcesDigitalSocialMedia/updateGymResourcesDigitalSocialMediaFromAjax',
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
                                call_alert_error('DigitalSocialMediaResourcesModal',data.message);
                            }else{
                                loadDigitalSocialMediaResources();
                                call_alert_success('DigitalSocialMediaResourcesModal',data.message,'1');
                            }
                        }
                    });
                }else{
                    if(jQuery.inArray(document.type, imgtype) === -1){
                        call_alert_error('DigitalSocialMediaResourcesModal',"File Type: " + document.type + " is not acceptable");
                    }
                    if(document.size > 2048000){
                        call_alert_error('DigitalSocialMediaResourcesModal',"File Size: " + document.size + " is greater than the acceptable size of 2048KB");
                    }
                    if(jQuery.inArray(document.type, imgtype) === -1 && document.size > 2048000){
                        call_alert_error('DigitalSocialMediaResourcesModal',"File Type: " + document.type + " is not acceptable and File Size: " + document.size + " is greater than the acceptable size of 2048KB");
                    }
                }
            }else{
                $.ajax({
                    type:'POST',
                    url:site_url +'resources/GymResourcesDigitalSocialMedia/updateGymResourcesDigitalSocialMediaFromAjax',
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
                            call_alert_error('DigitalSocialMediaResourcesModal',data.message);
                        }else{
                            loadDigitalSocialMediaResources();
                            call_alert_success('DigitalSocialMediaResourcesModal',data.message,'1');
                        }
                    }
                }); 
            }
        }  
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
                if(data.error === true){
                    call_alert_error('myModal',data.message);
                }else{
                    load_user();
                    call_alert_success('myModal',data.message);
                }
            }
        }).done(function(){
        });
    }
    
    function loadDigitalSocialMediaResources(){
        var site_url = '<?=site_url()?>';
        $.fn.dataTable.ext.errMode = 'none';
        $.fn.dataTable.ext.classes.sPageButton = 'page-link';
        // $.fn.dataTable.ext.classes.sTable = '';
        // $.fn.dataTable.ext.classes.sNoFooter = '';
        $('#digitalsocialmediaresourcesListTable').DataTable({
            destroy: true,
            lengthMenu: [[10, 20, -1], [10, 20, "All"]],
            "ajax": {
                "url": site_url +"resources/GymResourcesDigitalSocialMedia/ajaxLoadGymResourcesDigitalSocialMedia" ,
                "type": "POST",
                "dataSrc": function (data) {
                    var ctr = 0;
                    for (var i = 0; i < data.length; i++){
                        ctr++;
                        var data_array = [];
                        data_array = JSON.stringify(data[i]);

                        var branchname = [];
                        var rolename = [];
                        for (var ii = 0; ii < data[i].BranchName.length; ii++){
                            branchname.push(data[i].BranchName[ii].BranchName)
                        }
                        for (var v = 0; v < data[i].RoleName.length; v++){
                            rolename.push(data[i].RoleName[v].RoleName)
                        }

                        var queryarr=["Main Branch","Franchise Branch","Main and Franchise Branch"]
                        data[i]["rolename"] = rolename;
                        data[i]["branchname"] = branchname;
                        data[i]["num"] = ctr;
                        data[i]["queryinfo"] = queryarr[ data[i].QueryInformation - 1 ]
                        data[i]["edit"] = "<button class='btn btn-info user_action' data-action='edit' data-obj='" + data_array + "' data-toggle='modal' data-target='#DigitalSocialMediaResourcesModal'><i class='fa fa-edit'></i> Edit</button>";
                        data[i]["delete"] = "<button class='btn btn-danger user_action' data-action='delete' data-obj='" + data_array + "' data-toggle='modal' data-target='#DigitalSocialMediaResourcesModal'><i class='fa fa-times'></i> Deactivate</button>";
                    }

                    return data;
                }
            },
            "columns": [
                {"data": "num"},
                {"data": "branchname"},
                {"data": "rolename"},
                {"data": "ResourcesDigitalSocialMediaName"},
                {"data": "queryinfo"},
                {"data": "DisplayOrderIndex"},
                {"data": "Description"},
                {"data": "AddedDate"},
                {"data": "edit"},
                {"data": "delete"}
            ],
            "bInfo":false
        });
    }
    function loadBranchroles(e){
        const site_url = "<?php echo site_url();?>";
        $.ajax({
           type:'POST',
           url:site_url +'resources/GymResourcesDigitalSocialMedia/loadBranchRoles',
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
            url: site_url + 'resources/GymResourcesDigitalSocialMedia/loadBranch',
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
                    for(var x = 0; x < data.length; x++){
                        branch_select.append('<option value='+ data[x].SysID+'>'+ data[x].BranchName  +'</option>');
                    }
                }else{
                    branch_select.append('<option>No Result Found!</option>');
                }
            }
        });   
    }   
</script>
 
