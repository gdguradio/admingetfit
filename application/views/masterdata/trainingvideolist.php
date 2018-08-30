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
        <small>Training Video List</small>
      </h1>
      <ol class="breadcrumb">
      <li><a href="<?=site_url().''.'Welcome';?>"><i class="fa fa-dashboard"></i>Home</a></li>
        <li><a href="#" data-toggle='modal' data-target='#TrainingVideoModal'><i class="fa fa-keyboard-o"></i>Register Video Information</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
	
	<div class="box">
            <div class="box-header">
              <h3 class="box-title">Training Video Lists</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="trainingvideoListTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th width="10">[#]</th>
                    <th width="150">Show To Branch</th>
                    <th width="150">Video Title</th>
                    <th width="250">Description</th>
                    <th width="200">Video Link</th>
                    <th width="200">Video Category </th>
                    <th width="120">Video Status </th>
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
<div class="modal fade" id="TrainingVideoModal" role="dialog">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Training Video</h4>
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
                    <input type="hidden" id="trainingvideoID"/>
                    <div class="form-group">
                        <label for="showtobranch">Show to Branch</label>
                        <!-- <select class="form-control" name="showtobranch" id="showtobranch">
                                
                        </select> -->
                        <select class="form-control" name="showtobranch" id="showtobranch" multiple>
                        
                        </select>

                    </div>
                    <div class="form-group">
                      <label for="trainingvideoname">Video Title</label>
                      <input type="text" class="form-control" id="trainingvideoname" placeholder="Enter Video Name">
                    </div>
                    <div class="form-group">
                      <label for="trainingvideodisplayorder">Video Display Order</label>
                      <input type="number" class="form-control" id="trainingvideodisplayorder" placeholder="Enter Display Order">
                    </div>
                    <div class="form-group">
                      <label for="trainingvideocategory">Video Category</label>
                      <select class="form-control" id="trainingvideocategory">
                          <option value="1" selected>Training Machine</option>
                          <option value="2">Training Products</option>
                          <option value="3">Training Coaches</option>
                          <option value="4">Training Locations</option>
                      </select>
                    </div>
                    
                    <div class="form-group">
                      <label for="description">Description</label>
                      <input type="text" class="form-control" id="description" placeholder="Enter Description">
                    </div>
                    <div class="form-group">
                        <label for="videolink">Video Link</label>
                        <input class="form-control" type="text" id="videolink" name="videolink"/>
                    </div>
                    <div class="form-group video">
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
            <button type="button" class="btn btn-primary" id="btnaddtrainingvideo">Submit</button>
            <button type="button" class="btn btn-success" id="btnupdatetrainingvideo" style="display:none;">Update</button>
            <button type="button" class="btn btn-danger" id="btndeletetrainingvideo" style="display:none;">Delete</button>
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
        loadTrainingVideo();
        loadBranch();
        

        var tag = document.createElement('script');
        tag.id = 'iframe-demo';
        tag.src = 'https://www.youtube.com/iframe_api';
        var firstScriptTag = document.getElementsByTagName('script')[0];
        firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

        var player;
        function onYouTubeIframeAPIReady() {
            player = new YT.Player('existing-iframe-example', {
                events: {
                'onReady': onPlayerReady,
                'onStateChange': onPlayerStateChange
                }
            });
        }
        $('#TrainingVideoModal').on('shown.bs.modal', function (e) {
        // do something...
        action = $(e.relatedTarget).attr('data-action');
        
        if(action === 'edit') {
                $('#btnupdatetrainingvideo').show();
                $('#btndeletetrainingvideo').hide();
            }else if(action === 'delete'){
                $('#btnupdatetrainingvideo').hide();
                $('#btndeletetrainingvideo').show();
        }else{
            $('.form-group.video iframe').attr('src', "");
            // $(".form-group.video").hide();
            $('#btnaddtrainingvideo').show();
            $('#btnupdatetrainingvideo').hide();
            $('#btndeletetrainingvideo').hide();
        }    
        
        })
        $(document).on('click','.user_action',function(){
            $('#btnaddtrainingvideo').hide();
            var action = $(this).attr('data-action');
            var obj = JSON.parse($(this).attr('data-obj'));
            console.log(obj.VideoLink)
            $('#trainingvideoID').val(obj.SysID);
            $('#trainingvideoname').val(obj.VideoTitle);
            $('#trainingvideodisplayorder').val(obj.VideoOrderIndex);
            $('#description').val(obj.VideoDescription);
            $('.form-group.video').html(obj.VideoLink);
            $('.form-group.video iframe').attr('width',"250").attr('height',"200");
            $(":radio[name='activitystatus'][value='"+obj.VideoStatus+"']").prop('checked','checked');
            $(":radio[name='deletestatus'][value='"+obj.DeleteStatus+"']").prop('checked','checked');
            
        });
        $('#btnaddtrainingvideo').click(addTrainingVideo);
        $('#btnupdatetrainingvideo').click(updateTrainingVideo);
        $('#btndeletetrainingvideo').click(deleteTrainingVideo);
        
        
    });
    function readURL(input) {
        if (input.files && input.files[0]) {
        var reader = new FileReader();
            reader.onload = function(e) {
                $('.form-group.video iframe').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    function addTrainingVideo(){
       
        var site_url = '<?=site_url()?>';
        var videotitle = $('#trainingvideoname').val();
        var videoorder = $('#trainingvideodisplayorder').val();
        var videolink = $('#videolink').val()
        var description = $('#description').val();
        const videostatus = $(":radio[name='activitystatus']:checked").val();
        const deletestatus = $(":radio[name='deletestatus']:checked").val();
        const videocategory = $("#trainingvideocategory option:selected").val();
        var showtobranch = $('#showtobranch').val();
        if(jQuery.inArray("*", showtobranch) !== -1){
            showtobranch = $("select#showtobranch option").slice(2).map(function() {
                return this.value;
            }).get();
        }
        const formData = new FormData();
        console.log(videotitle)
        formData.append('videotitle',videotitle);
        formData.append('videoorder',videoorder);
        formData.append('description',description);
        formData.append('videostatus',videostatus);
        formData.append('deletestatus',deletestatus);
        formData.append('videocategory',videocategory);
        formData.append('videolink',videolink);
        formData.append('showtobranch',showtobranch);
        $.ajax({
            type:'POST',
            url:site_url +'masterdata/MasterDataTrainingVideo/insertMasterDataTrainingVideoFromAjax',
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
                    call_alert_error('TrainingVideoModal',data.message);
                }else{
                    loadTrainingVideo();
                    $('.form-group.video iframe').attr('src', "");
                    call_alert_success('TrainingVideoModal',data.message,'1');
                }
            }
        });
                
    }
    function updateTrainingVideo(){
       
        var site_url = '<?=site_url()?>';
        var trainingvideoID = $('#trainingvideoID').val();
        var videotitle = $('#trainingvideoname').val();
        var videoorder = $('#trainingvideodisplayorder').val();
        var videolink = $('#videolink').val();
        var description = $('#description').val();
        const videostatus = $(":radio[name='activitystatus']:checked").val();
        const deletestatus = $(":radio[name='deletestatus']:checked").val();
        const videocategory = $("#trainingvideocategory option:selected").val();
        var showtobranch = $('#showtobranch').val();
        if(jQuery.inArray("*", showtobranch) !== -1){
            showtobranch = $("select#showtobranch option").slice(2).map(function() {
                return this.value;
            }).get();
        }
        const formData = new FormData();
        formData.append('trainingvideoID',trainingvideoID);
        formData.append('videotitle',videotitle);
        formData.append('videoorder',videoorder);
        formData.append('description',description);
        formData.append('videostatus',videostatus);
        formData.append('deletestatus',deletestatus);
        formData.append('videocategory',videocategory);
        formData.append('videolink',videolink);
        formData.append('showtobranch',showtobranch);


        $.ajax({
            type:'POST',
            url:site_url +'masterdata/MasterDataTrainingVideo/updateMasterDataTrainingVideoFromAjax',
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
                    call_alert_error('TrainingVideoModal',data.message);
                }else{
                    loadTrainingVideo();
                    $('.form-group.video img').attr('src', "");
                    call_alert_success('TrainingVideoModal',data.message,'1');
                }
            }
        });     
   }
    
    function deleteTrainingVideo(){
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
        });
    }
    
    function loadTrainingVideo (){
        var site_url = '<?=site_url()?>';
        $.fn.dataTable.ext.errMode = 'none';
        $.fn.dataTable.ext.classes.sPageButton = 'page-link';
        // $.fn.dataTable.ext.classes.sTable = '';
        // $.fn.dataTable.ext.classes.sNoFooter = '';
        $('#trainingvideoListTable').DataTable({
            destroy: true,
            lengthMenu: [[10, 20, -1], [10, 20, "All"]],
            "ajax": {
                "url": site_url +"masterdata/MasterDataTrainingVideo/ajaxLoadTrainingVideo" ,
                "type": "POST",
                "dataSrc": function (data) {
                    var ctr = 0;
                    var category = ["Training Machine","Training Products","Training Coaches","Training Locations"];
                    for (var i = 0; i < data.length; i++){
                        ctr++;
                        var data_array = [];
                        data_array = JSON.stringify(data[i]);
                        var branchname = [];
                        for (var ii = 0; ii < data[i].BranchName.length; ii++){
                            branchname.push(data[i].BranchName[ii].BranchName)
                        }
                        data[i]["branchname"] = branchname;
                        data[i]["num"] = ctr;
                        data[i]["Category"] = category[ parseInt(data[i].VideoCategory) - 1 ];
                        data[i]["Contoller"] = data[i].Link ? data[i].Link.split('/'[0]) : "";
                        data[i]["Function"] = data[i].Link ? data[i].Link.split('/'[1]) : "";
                        // data[i]["changepassword"] = "<button class='btn btn-warning changepass' data-obj='" + data_array + "' data-toggle='modal' data-target='#changepasswordModal'><i class='fa fa-key'></i> Change password</button>";
                        data[i]["edit"] = "<button class='btn btn-info user_action' data-action='edit' data-obj='" + data_array + "' data-toggle='modal' data-target='#TrainingVideoModal'><i class='fa fa-edit'></i> Edit</button>";
                        data[i]["delete"] = "<button class='btn btn-danger user_action' data-action='delete' data-obj='" + data_array + "' data-toggle='modal' data-target='#TrainingVideoModal'><i class='fa fa-times'></i> Deactivate</button>";
                    }

                    return data;
                }
            },
            "columns": [
                {"data": "num"},
                {"data": "branchname"},
                {"data": "VideoTitle"},
                {"data": "VideoDescription"},
                {"data": "VideoLink"},
                {"data": "Category"},
                {"data": "VideoStatus"},
                {"data": "AddedDate"},
                {"data": "edit"},
                {"data": "delete"}
            ],
            "bInfo":false
        });
    }
    function loadBranch(e){
        const site_url = "<?php echo site_url();?>";
        
        $.ajax({
            type:'POST',
            url: site_url + 'masterdata/MasterDataTrainingVideo/loadBranch',
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
 
