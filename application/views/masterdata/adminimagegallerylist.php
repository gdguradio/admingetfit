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
        <small>Image Gallery List</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=site_url();?>"><i class="fa fa-dashboard"></i>Home</a></li>
        <li><a href="#" data-toggle='modal' data-target='#ImageGalleryModal'><i class="fa fa-keyboard-o"></i>Register Image Information</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
	
	<div class="box">
            <div class="box-header">
              <h3 class="box-title">Image Gallery Lists</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="imagegalleryListTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th width="10">[#]</th>
                    <th width="150">Show To Branch</th>
                    <th width="150">Image Title</th>
                    <th width="250">Description</th>
                    <th width="200">Image Link</th>
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
<div class="modal fade" id="ImageGalleryModal" role="dialog">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Image Gallery</h4>
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
                    <input type="hidden" id="imagegalleryID"/>
                    <div class="form-group">
                        <label for="showtobranch">Show to Branch</label>
                        <select class="form-control" name="showtobranch" id="showtobranch" multiple>
                        
                        </select>

                    </div>
                    <div class="form-group">
                      <label for="imagegalleryname">Image Title</label>
                      <input type="text" class="form-control" id="imagegalleryname" placeholder="Enter Image Name">
                    </div>
                    <!-- <div class="form-group">
                        <label for="">Has child?</label>
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="haschildno" name="haschild" value="no" checked>
                            <label class="custom-control-label" for="defaultChecked">No</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="haschildyes" name="haschild" value="yes" >
                            <label class="custom-control-label" for="defaultUnchecked">Yes</label>
                        </div>
                      <select class="form-control" id="menuhaschild">
                          <option value="no" selected>No</option>
                          <option value="yes">Yes</option>
                      </select>
                    </div> -->
                    <!-- <div class="form-group">
                      <label for="imagegallerylink">Link</label>
                      <input type="text" class="form-control" id="imagegallerylink" placeholder="Enter Image Link">
                    </div> -->
                    <div class="form-group">
                      <label for="imagedgalleryisplayorder">Image Display Order</label>
                      <input type="number" class="form-control" id="imagegallerydisplayorder" placeholder="Enter Display Order">
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
            <button type="button" class="btn btn-primary" id="btnaddimagegallery">Submit</button>
            <button type="button" class="btn btn-success" id="btnupdateimagegallery" style="display:none;">Update</button>
            <button type="button" class="btn btn-danger" id="btndeleteimagegallery" style="display:none;">Delete</button>
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
        loadImageGallery();
        loadBranch();
        $('#ImageGalleryModal').on('shown.bs.modal', function (e) {
        // do something...
        action = $(e.relatedTarget).attr('data-action');
        
        if(action === 'edit') {
                $('#btnupdateimagegallery').show();
                $('#btndeleteimagegallery').hide();
                // $(".form-group.image").show();
            }else if(action === 'delete'){
                // $(".form-group.image").show();
                $('#btnupdateimagegallery').hide();
                $('#btndeleteimagegallery').show();
        }else{
            $('.form-group.image img').attr('src', "");
            // $(".form-group.image").hide();
            $('#btnaddimagegallery').show();
            $('#btnupdateimagegallery').hide();
            $('#btndeleteimagegallery').hide();
        }    
        
        })
        $('#photo').change(function(){
            var filesize = $(this)[0].files[0].size;
            var filetype = $(this)[0].files[0].type;
            var imgtype = ["image/jpg","image/jpeg","image/png"];
            // console.log(filesize)
            // console.log($(this).val() != "")
            if($(this).val() == ""){
                $('.form-group.image img').attr('src', "");
            }else{
                if(jQuery.inArray(filetype, imgtype) !== -1 && filesize < 2048000){
                    readURL(this);
                }else{
                    if(jQuery.inArray(filetype, imgtype) === -1){
                        call_alert_error('ImageGalleryModal',"File Type: " + filetype + " is not acceptable");
                    }
                    if(filesize > 2048){
                        call_alert_error('ImageGalleryModal',"File Size: " + filesize + " is greater than the acceptable size of 2048KB");
                    }
                    if(jQuery.inArray(filetype, imgtype) === -1 && filesize > 2048000){
                        call_alert_error('ImageGalleryModal',"File Type: " + filetype + " is not acceptable and File Size: " + filesize + " is greater than the acceptable size of 2048KB");
                    }
                }
            }
            
            


        });
        $(document).on('click','.user_action',function(){
            $('#btnaddimagegallery').hide();
            var action = $(this).attr('data-action');
            var obj = JSON.parse($(this).attr('data-obj'));
            var imageurl = "<?php echo site_url('assets/AdminImageGallery/');?>";
            console.log(obj.BranchName)
            $.each(obj.BranchName, function(i,e){
                $('#showtobranch option[value="' + e.BranchID + '"]').prop("selected", true);
            })
            $('#imagegalleryID').val(obj.SysID);
            $('#imagegalleryname').val(obj.ImageTitle);
            $('#imagegallerydisplayorder').val(obj.ImageOrderIndex);
            $('#description').val(obj.ImageDescription);
            $('.form-group.image img').attr('src', imageurl+""+obj.ImageLink);
            $(":radio[name='activitystatus'][value='"+obj.ImageStatus+"']").prop('checked','checked');
            $(":radio[name='deletestatus'][value='"+obj.DeleteStatus+"']").prop('checked','checked');
            
        });
        $('#btnaddimagegallery').click(addImageGallery);
        $('#btnupdateimagegallery').click(updateImageGallery);
        $('#btndeleteimagegallery').click(deleteImageGallery);
        
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
    function addImageGallery(){
       
        var site_url = '<?=site_url()?>';
        var imagetitle = $('#imagegalleryname').val();
        var imageorder = $('#imagegallerydisplayorder').val();
        var photo = $('#photo')[0].files[0];
        var description = $('#description').val();
        const imagestatus = $(":radio[name='activitystatus']:checked").val();
        const deletestatus = $(":radio[name='deletestatus']:checked").val();
        // var showtobranch = [];
        var showtobranch = $('#showtobranch').val();
        if(jQuery.inArray("*", showtobranch) !== -1){
            showtobranch = $("select#showtobranch option").slice(2).map(function() {
                return this.value;
            }).get();
        }
        var arr = [];
        let formData = new FormData();
            formData.append('imagetitle',imagetitle);
            formData.append('imageorder',imageorder);
            formData.append('description',description);
            formData.append('imagestatus',imagestatus);
            formData.append('deletestatus',deletestatus);
            formData.append('photo',photo);
            formData.append('showtobranch',showtobranch);
        var imgtype = ["image/jpg","image/jpeg","image/png"];
        if($('#photo').val() == ""){
            $('.form-group.image img').attr('src', "");
        }else{
            if(jQuery.inArray(photo.type, imgtype) !== -1 && photo.size < 2048000){
                $.ajax({
                    type:'POST',
                    url:site_url +'masterdata/MasterDataAdminImageGallery/insertMasterDataAdminImageGalleryFromAjax',
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
                            call_alert_error('ImageGalleryModal',data.message);
                        }else{
                            loadImageGallery();
                            $('.form-group.image img').attr('src', "");
                            call_alert_success('ImageGalleryModal',data.message,'1');
                        }
                    }
                });
            }else{
                if(jQuery.inArray(photo.type, imgtype) === -1){
                    call_alert_error('ImageGalleryModal',"File Type: " + photo.type + " is not acceptable");
                }
                if(photo.size > 2048000){
                    call_alert_error('ImageGalleryModal',"File Size: " + photo.size + " is greater than the acceptable size of 2048KB");
                }
                if(jQuery.inArray(photo.type, imgtype) === -1 && photo.size > 2048000){
                    call_alert_error('ImageGalleryModal',"File Type: " + photo.type + " is not acceptable and File Size: " + photo.size + " is greater than the acceptable size of 2048KB");
                }
            }
        }     
    }
    function updateImageGallery(){
       
        var site_url = '<?=site_url()?>';
        var imagegalleryID = $('#imagegalleryID').val();
        var imagetitle = $('#imagegalleryname').val();
        var imageorder = $('#imagegallerydisplayorder').val();
        var photo = $('#photo')[0].files[0];
        var description = $('#description').val();
        const imagestatus = $(":radio[name='activitystatus']:checked").val();
        const deletestatus = $(":radio[name='deletestatus']:checked").val();
        const formData = new FormData();
        var showtobranch = $('#showtobranch').val();
        if(jQuery.inArray("*", showtobranch) !== -1){
            showtobranch = $("select#showtobranch option").slice(2).map(function() {
                return this.value;
            }).get();
        }
        var arr = [];
        var showtobranch = $('#showtobranch').val();
        if(jQuery.inArray("*", showtobranch) !== -1){
            showtobranch = $("select#showtobranch option").slice(2).map(function() {
                return this.value;
            }).get();
        }
        var arr = [];
        let formData = new FormData();
        formData.append('imagetitle',imagetitle);
        formData.append('imageorder',imageorder);
        formData.append('description',description);
        formData.append('imagestatus',imagestatus);
        formData.append('deletestatus',deletestatus);
        formData.append('photo',photo);
        formData.append('showtobranch',showtobranch);
        formData.append('imagegalleryID',imagegalleryID);

        var imgtype = ["image/jpg","image/jpeg","image/png"];
        console.log($('#photo').val())
        if($('#photo').val() == ""){
            $.ajax({
                type:'POST',
                url:site_url +'masterdata/MasterDataAdminImageGallery/updateMasterDataAdminImageGalleryFromAjax',
                dataType:"json",
                data:formData,
                async: true,
                cache: false,
                contentType: false,
                enctype: 'multipart/form-data',
                processData: false,
                success:function(data){
                    if(data.error === true){
                        call_alert_error('ImageGalleryModal',data.message);
                    }else{
                        loadImageGallery();
                        $('.form-group.image img').attr('src', "");
                        call_alert_success('ImageGalleryModal',data.message,'1');
                    }
                }
            });
        }else{
            if(jQuery.inArray(photo.type, imgtype) !== -1 && photo.size < 2048000){
                $.ajax({
                    type:'POST',
                    url:site_url +'masterdata/MasterDataAdminImageGallery/updateMasterDataAdminImageGalleryFromAjax',
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
                            call_alert_error('ImageGalleryModal',data.message);
                        }else{
                            loadImageGallery();
                            $('.form-group.image img').attr('src', "");
                            call_alert_success('ImageGalleryModal',data.message,'1');
                        }
                    }
                });
            }else{
                if(jQuery.inArray(photo.type, imgtype) === -1){
                    call_alert_error('ImageGalleryModal',"File Type: " + photo.type + " is not acceptable");
                }
                if(photo.size > 2048000){
                    call_alert_error('ImageGalleryModal',"File Size: " + photo.size + " is greater than the acceptable size of 2048KB");
                }
                if(jQuery.inArray(photo.type, imgtype) === -1 && photo.size > 2048000){
                    call_alert_error('ImageGalleryModal',"File Type: " + photo.type + " is not acceptable and File Size: " + photo.size + " is greater than the acceptable size of 2048KB");
                }
            }
        }     
   }
    
    function deleteImageGallery(){
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
    
    function loadImageGallery (){
        var site_url = '<?=site_url()?>';
        $.fn.dataTable.ext.errMode = 'none';
        $.fn.dataTable.ext.classes.sPageButton = 'page-link';
        // $.fn.dataTable.ext.classes.sTable = '';
        // $.fn.dataTable.ext.classes.sNoFooter = '';
        $('#imagegalleryListTable').DataTable({
            destroy: true,
            lengthMenu: [[10, 20, -1], [10, 20, "All"]],
            "ajax": {
                "url": site_url +"masterdata/MasterDataAdminimageGallery/ajaxLoadImageGallery" ,
                "type": "POST",
                "dataSrc": function (data) {
                    var ctr = 0;
                    for (var i = 0; i < data.length; i++){
                        ctr++;
                        var data_array = [];
                        data_array = JSON.stringify(data[i]);

                        var branchname = [];
                        for (var ii = 0; ii < data[i].BranchName.length; ii++){
                            branchname.push(data[i].BranchName[ii].BranchName)
                        }
                        data[i]["num"] = ctr;
                        data[i]["branchname"] = branchname;
                        data[i]["Contoller"] = data[i].Link ? data[i].Link.split('/'[0]) : "";
                        data[i]["Function"] = data[i].Link ? data[i].Link.split('/'[1]) : "";
                        // data[i]["changepassword"] = "<button class='btn btn-warning changepass' data-obj='" + data_array + "' data-toggle='modal' data-target='#changepasswordModal'><i class='fa fa-key'></i> Change password</button>";
                        data[i]["edit"] = "<button class='btn btn-info user_action' data-action='edit' data-obj='" + data_array + "' data-toggle='modal' data-target='#ImageGalleryModal'><i class='fa fa-edit'></i> Edit</button>";
                        data[i]["delete"] = "<button class='btn btn-danger user_action' data-action='delete' data-obj='" + data_array + "' data-toggle='modal' data-target='#ImageGalleryModal'><i class='fa fa-times'></i> Deactivate</button>";
                    }

                    return data;
                }
            },
            "columns": [
                {"data": "num"},
                {"data": "branchname"},
                {"data": "ImageTitle"},
                {"data": "ImageDescription"},
                {"data": "ImageLink"},
                {"data": "ImageStatus"},
                {"data": "DeleteStatus"},
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
            url: site_url + 'masterdata/MasterDataAdminimageGallery/loadBranch',
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
 
