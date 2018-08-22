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
        <small>Training Image List</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=site_url();?>"><i class="fa fa-dashboard"></i>Home</a></li>
        <li><a href="#" data-toggle='modal' data-target='#TrainingImageModal'><i class="fa fa-keyboard-o"></i>Register Image Information</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
	
	<div class="box">
            <div class="box-header">
              <h3 class="box-title">Training Image Lists</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="trainingimageListTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th width="10">[#]</th>
                    <th width="150">Image Title</th>
                    <th width="250">Description</th>
                    <th width="200">Image Link</th>
                    <th width="200">Image Category </th>
                    <th width="120">Image Status </th>
                    <th width="120">Delete Status </th>
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
<div class="modal fade" id="TrainingImageModal" role="dialog">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Training Image</h4>
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
                    <input type="hidden" id="trainingimageID"/>
                    <div class="form-group">
                      <label for="trainingimagename">Image Title</label>
                      <input type="text" class="form-control" id="trainingimagename" placeholder="Enter Image Name">
                    </div>
                    <div class="form-group">
                      <label for="trainingimagedisplayorder">Image Display Order</label>
                      <input type="number" class="form-control" id="trainingimagedisplayorder" placeholder="Enter Display Order">
                    </div>
                    <div class="form-group">
                      <label for="trainingimagecategory">Image Category</label>
                      <select class="form-control" id="trainingimagecategory">
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
                        <label for="photo">Image</label>
                        <input class="form-control" type="file" id="photo" name="photo">
                    </div>
                    <div class="form-group image">
                        <img src=""alt="Image" style="max-width:100%;">
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
            <button type="button" class="btn btn-primary" id="btnaddtrainingimage">Submit</button>
            <button type="button" class="btn btn-success" id="btnupdatetrainingimage" style="display:none;">Update</button>
            <button type="button" class="btn btn-danger" id="btndeletetrainingimage" style="display:none;">Delete</button>
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
        loadTrainingImage();
        $('#TrainingImageModal').on('shown.bs.modal', function (e) {
        // do something...
        action = $(e.relatedTarget).attr('data-action');
        
        if(action === 'edit') {
                $('#btnupdatetrainingimage').show();
                $('#btndeletetrainingimage').hide();
                // $(".form-group.image").show();
            }else if(action === 'delete'){
                // $(".form-group.image").show();
                $('#btnupdatetrainingimage').hide();
                $('#btndeletetrainingimage').show();
        }else{
            $('.form-group.image img').attr('src', "");
            // $(".form-group.image").hide();
            $('#btnaddtrainingimage').show();
            $('#btnupdatetrainingimage').hide();
            $('#btndeletetrainingimage').hide();
        }    
        
        })
        $('#photo').change(function(){
            var filesize = $(this)[0].files[0].size;
            var filetype = $(this)[0].files[0].type;
            var imgtype = ["image/jpg","image/jpeg","image/png"];
            console.log(filesize)
            console.log($(this).val() != "")
            if($(this).val() == ""){
                $('.form-group.image img').attr('src', "");
            }else{
                if(jQuery.inArray(filetype, imgtype) !== -1 && filesize < 2048000){
                    readURL(this);
                }else{
                    if(jQuery.inArray(filetype, imgtype) === -1){
                        call_alert_error('TrainingImageModal',"File Type: " + filetype + " is not acceptable");
                    }
                    if(filesize > 2048){
                        call_alert_error('TrainingImageModal',"File Size: " + filesize + " is greater than the acceptable size of 2048KB");
                    }
                    if(jQuery.inArray(filetype, imgtype) === -1 && filesize > 2048000){
                        call_alert_error('TrainingImageModal',"File Type: " + filetype + " is not acceptable and File Size: " + filesize + " is greater than the acceptable size of 2048KB");
                    }
                }
            }
            
            


        });
        $(document).on('click','.user_action',function(){
            $('#btnaddtrainingimage').hide();
            var action = $(this).attr('data-action');
            var obj = JSON.parse($(this).attr('data-obj'));
            var imageurl = "<?php echo site_url('assets/TrainingImage/');?>";
            $('#trainingimageID').val(obj.SysID);
            $('#trainingimagename').val(obj.ImageTitle);
            $('#trainingimagedisplayorder').val(obj.ImageOrderIndex);
            $('#description').val(obj.ImageDescription);
            $('.form-group.image img').attr('src', imageurl+""+obj.ImageLink);
            
            
        });
        $('#btnaddtrainingimage').click(addTrainingImage);
        $('#btnupdatetrainingimage').click(updateTrainingImage);
        $('#btndeletetrainingimage').click(deleteTrainingImage);
        
    });
    function readURL(input) {
        if (input.files && input.files[0]) {
        var reader = new FileReader();
            reader.onload = function(e) {
                $('.form-group.image img').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    function addTrainingImage(){
       
        var site_url = '<?=site_url()?>';
        var imagetitle = $('#trainingimagename').val();
        var imageorder = $('#trainingimagedisplayorder').val();
        var photo = $('#photo')[0].files[0];
        var description = $('#description').val();
        const imagestatus = $(":radio[name='activitystatus']:checked").val();
        const deletestatus = $(":radio[name='deletestatus']:checked").val();
        const imagecategory = $("#trainingimagecategory option:selected").val();
        const formData = new FormData();
        formData.append('imagetitle',imagetitle);
        formData.append('imageorder',imageorder);
        formData.append('description',description);
        formData.append('imagestatus',imagestatus);
        formData.append('deletestatus',deletestatus);
        formData.append('imagecategory',imagecategory);
        formData.append('photo',photo);


        var imgtype = ["image/jpg","image/jpeg","image/png"];
        console.log($('#photo').val())
        if($('#photo').val() == ""){
            $('.form-group.image img').attr('src', "");
        }else{
            if(jQuery.inArray(photo.type, imgtype) !== -1 && photo.size < 2048000){
                $.ajax({
                    type:'POST',
                    url:site_url +'masterdata/MasterDataTrainingImage/insertMasterDataTrainingImageFromAjax',
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
                            call_alert_error('TrainingImageModal',data.message);
                        }else{
                            loadTrainingImage();
                            $('.form-group.image img').attr('src', "");
                            call_alert_success('TrainingImageModal',data.message,'1');
                        }
                    }
                });
            }else{
                if(jQuery.inArray(photo.type, imgtype) === -1){
                    call_alert_error('TrainingImageModal',"File Type: " + photo.type + " is not acceptable");
                }
                if(photo.size > 2048000){
                    call_alert_error('TrainingImageModal',"File Size: " + photo.size + " is greater than the acceptable size of 2048KB");
                }
                if(jQuery.inArray(photo.type, imgtype) === -1 && photo.size > 2048000){
                    call_alert_error('TrainingImageModal',"File Type: " + photo.type + " is not acceptable and File Size: " + photo.size + " is greater than the acceptable size of 2048KB");
                }
            }
        }     
    }
    function updateTrainingImage(){
       
        var site_url = '<?=site_url()?>';
        var trainingimageID = $('#trainingimageID').val();
        var imagetitle = $('#trainingimagename').val();
        var imageorder = $('#trainingimagedisplayorder').val();
        var photo = $('#photo')[0].files[0];
        var description = $('#description').val();
        const imagestatus = $(":radio[name='activitystatus']:checked").val();
        const deletestatus = $(":radio[name='deletestatus']:checked").val();
        const imagecategory = $("#trainingimagecategory option:selected").val();
        const formData = new FormData();
        formData.append('trainingimageID',trainingimageID);
        formData.append('imagetitle',imagetitle);
        formData.append('imageorder',imageorder);
        formData.append('description',description);
        formData.append('imagestatus',imagestatus);
        formData.append('deletestatus',deletestatus);
        formData.append('imagecategory',imagecategory);
        formData.append('photo',photo);


        var imgtype = ["image/jpg","image/jpeg","image/png"];
        console.log($('#photo').val())
        if($('#photo').val() == ""){
            $.ajax({
                type:'POST',
                url:site_url +'masterdata/MasterDataTrainingImage/updateMasterDataTrainingImageFromAjax',
                dataType:"json",
                data:formData,
                async: true,
                cache: false,
                contentType: false,
                enctype: 'multipart/form-data',
                processData: false,
                success:function(data){
                    if(data.error === true){
                        call_alert_error('TrainingImageModal',data.message);
                    }else{
                        loadTrainingImage();
                        $('.form-group.image img').attr('src', "");
                        call_alert_success('TrainingImageModal',data.message,'1');
                    }
                }
            });
        }else{
            if(jQuery.inArray(photo.type, imgtype) !== -1 && photo.size < 2048000){
                $.ajax({
                    type:'POST',
                    url:site_url +'masterdata/MasterDataTrainingImage/updateMasterDataTrainingImageFromAjax',
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
                            call_alert_error('TrainingImageModal',data.message);
                        }else{
                            loadTrainingImage();
                            $('.form-group.image img').attr('src', "");
                            call_alert_success('TrainingImageModal',data.message,'1');
                        }
                    }
                });
            }else{
                if(jQuery.inArray(photo.type, imgtype) === -1){
                    call_alert_error('TrainingImageModal',"File Type: " + photo.type + " is not acceptable");
                }
                if(photo.size > 2048000){
                    call_alert_error('TrainingImageModal',"File Size: " + photo.size + " is greater than the acceptable size of 2048KB");
                }
                if(jQuery.inArray(photo.type, imgtype) === -1 && photo.size > 2048000){
                    call_alert_error('TrainingImageModal',"File Type: " + photo.type + " is not acceptable and File Size: " + photo.size + " is greater than the acceptable size of 2048KB");
                }
            }
        }     
   }
    
    function deleteTrainingImage(){
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
    
    function loadTrainingImage (){
        var site_url = '<?=site_url()?>';
        $.fn.dataTable.ext.errMode = 'none';
        $.fn.dataTable.ext.classes.sPageButton = 'page-link';
        // $.fn.dataTable.ext.classes.sTable = '';
        // $.fn.dataTable.ext.classes.sNoFooter = '';
        $('#trainingimageListTable').DataTable({
            destroy: true,
            lengthMenu: [[10, 20, -1], [10, 20, "All"]],
            "ajax": {
                "url": site_url +"masterdata/MasterDataTrainingImage/ajaxLoadTrainingImage" ,
                "type": "POST",
                "dataSrc": function (data) {
                    var ctr = 0;
                    var category = ["Training Machine","Training Products","Training Coaches","Training Locations"];
                    for (var i = 0; i < data.length; i++){
                        ctr++;
                        var data_array = [];
                        data_array = JSON.stringify(data[i]);
                        data[i]["num"] = ctr;
                        data[i]["Category"] = category[ parseInt(data[i].ImageCategory) - 1 ];
                        data[i]["Contoller"] = data[i].Link ? data[i].Link.split('/'[0]) : "";
                        data[i]["Function"] = data[i].Link ? data[i].Link.split('/'[1]) : "";
                        // data[i]["changepassword"] = "<button class='btn btn-warning changepass' data-obj='" + data_array + "' data-toggle='modal' data-target='#changepasswordModal'><i class='fa fa-key'></i> Change password</button>";
                        data[i]["edit"] = "<button class='btn btn-info user_action' data-action='edit' data-obj='" + data_array + "' data-toggle='modal' data-target='#TrainingImageModal'><i class='fa fa-edit'></i> Edit</button>";
                        data[i]["delete"] = "<button class='btn btn-danger user_action' data-action='delete' data-obj='" + data_array + "' data-toggle='modal' data-target='#TrainingImageModal'><i class='fa fa-times'></i> Deactivate</button>";
                    }

                    return data;
                }
            },
            "columns": [
                {"data": "num"},
                {"data": "ImageTitle"},
                {"data": "ImageDescription"},
                {"data": "ImageLink"},
                {"data": "Category"},
                {"data": "ImageStatus"},
                {"data": "DeleteStatus"},
                {"data": "AddedDate"},
                {"data": "edit"},
                {"data": "delete"}
            ],
            "bInfo":false
        });
    }
    
</script>
 
