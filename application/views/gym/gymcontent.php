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
        <!-- <li><a href="#" data-toggle='modal' data-target='#GymContentModal'><i class="fa fa-keyboard-o"></i>Promo</a></li> -->
      </ol>
    </section>

    <!-- Main content -->
    <!-- promo section start -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">

          <!-- <h3 class="box-title">Promo</h3> -->
          <ol class="breadcrumb">
            <li><h3 class="box-title">Promo</h3></li>
            <li><a href="#" data-toggle='modal' data-target='#GymContentPromoModal' data-action="promo"><i class="fa fa-keyboard-o"></i>Add Promo</a></li>
          </ol>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          <table id="promoListTable" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th width="10">[#]</th>
                <th width="150">Show to Branch</th>
                <th width="150">Name</th>
                <th width="250">Description</th>
                <th width="150">Dates</th>
                <th width="150">Duration</th>
                <th width="50">Amount</th>
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
      <!-- /.box -->
    </section>
    <!-- promo section end -->





    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<!-- start modal -->
<!-- register start -->
<div class="modal fade" id="GymContentPromoModal" role="dialog">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Promo</h4>
          </div>
          <div class="modal-body">
          <form role="form" id="">
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
                  <label for="showtobranch">Show to Branch</label>
                  <select class="form-control" name="showtobranch" id="showtobranch" multiple>
                        
                  </select>

                </div>
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
            <button type="button" class="btn btn-primary" id="btnaddpromo">Submit</button>
            <button type="button" class="btn btn-success" id="btnupdatepromo" style="display:none;">Update</button>
            <button type="button" class="btn btn-danger" id="btndeletepromo" style="display:none;">Delete</button>
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
<style>
  #promoListTable tbody td {
    word-break: break-word;
    vertical-align: top;
  }
</style>
<script>
    $(document).ready(function(){
        loadPromo();
        // loadAllusers();
        loadBranch();
        //Date range picker
        $('#promodates').daterangepicker()
        $('#GymContentPromoModal').on('shown.bs.modal', function (e) {
        // do something...
        action = $(e.relatedTarget).attr('data-action');
        if(action === 'editpromo') {
                $('#btnupdatepromo').show();
                $('#btndeletepromo').hide();
        }else if(action === 'editpromo'){
                $('#btnupdatepromo').hide();
                $('#btndeletepromo').show();
        }else if(action === 'promo'){
            $('#btnaddpromo').show();
            $('#btnupdatepromo').hide();
            $('#btndeletepromo').hide();
        }    
        })
        $(document).on('click','.user_action',function(){
            $('#btnaddpromo').hide();
            var action = $(this).attr('data-action');
            var obj = JSON.parse($(this).attr('data-obj'));
            if(action.indexOf("promo") != -1){
              $('#promoID').val(obj.SysID);
              $.each(obj.Access, function(i,e){
                  $('#showtobranch option[value="' + e.BranchID + '"]').prop("selected", true);
              })
              // var changedata = {type:"change",RoleName:obj.RoleName};
              // $('#showtobranch').trigger(changedata);
              $('#promoname').val(obj.PromoName);
              $('#description').val(obj.PromoDescription);
              $('#promodates').val(obj.PromoRegistration);
              $('#promoduration').val(obj.PromoDuration);
              $('#promoamount').val(obj.PromoAmount);
              $(":radio[name='activitystatus'][value='"+obj.PromoStatus+"']").prop('checked','checked');
              $(":radio[name='deletestatus'][value='"+obj.DeleteStatus+"']").prop('checked','checked');
            }
            
            
            
        });
        $('#btnaddpromo').click(addPromo);
        $('#btnupdatepromo').click(updatePromo);
        $('#btndeletepromo').click(deletePromo);
        // var changedata = {type:"change",submenuID:obj.submenuID};
        // $('#menuname').val(obj.menuID).trigger(changedata);
        $('#showtobranch').change(loadBranchroles);
    });
    function addPromo(){
       
        var site_url = '<?=site_url()?>';
        var promoname = $('#promoname').val();
        var showtobranch = $('#showtobranch').val();
        var description = $('#description').val();
        var promodates = $('#promodates').val();
        var promoduration = $('#promoduration').val();
        var promoamount = $('#promoamount').val();
        const promostatus = $(":radio[name='activitystatus']:checked").val();
        const deletestatus = $(":radio[name='deletestatus']:checked").val();
        if(jQuery.inArray("*", showtobranch) !== -1){
            showtobranch = $("select#showtobranch option").slice(2).map(function() {
                return this.value;
            }).get();
        }
        $.ajax({
            type:'POST',
            url:site_url +'gym/GymContentPromo/insertGymContentPromoFromAjax',
            dataType:"json",
            data:{
              promoname: promoname,
              showtobranch: showtobranch,
              description: description,
              promodates: promodates,
              promoduration:promoduration,
              promoamount:promoamount,
              promostatus:promostatus,
              deletestatus:deletestatus
            },
            success:function(data)
            {
                if(data.error === true){
                    call_alert_error('GymContentPromoModal',data.message);
                }else{
                  loadPromo();
                  call_alert_success('GymContentPromoModal',data.message,'1');
                }
            }
        });
    }
    function updatePromo(){
       
        var site_url = '<?=site_url()?>';
        var promoID = $('#promoID').val();
        var promoname = $('#promoname').val();
        var showtobranch = $('#showtobranch').val();
        var description = $('#description').val();
        var promodates = $('#promodates').val();
        var promoduration = $('#promoduration').val();
        var promoamount = $('#promoamount').val();
        const promostatus = $(":radio[name='activitystatus']:checked").val();
        const deletestatus = $(":radio[name='deletestatus']:checked").val();
        if(jQuery.inArray("*", showtobranch) !== -1){
            showtobranch = $("select#showtobranch option").slice(2).map(function() {
                return this.value;
            }).get();
        }
        $.ajax({
            type:'POST',
            url:site_url +'gym/GymContentPromo/updateGymContentPromoFromAjax',
            dataType:"json",
            data:{
              promoname: promoname,
              showtobranch: showtobranch,
              description: description,
              promodates: promodates,
              promoduration:promoduration,
              promoamount:promoamount,
              promostatus:promostatus,
              deletestatus:deletestatus,
              promoID:promoID
            },
            success:function(data)
            {
                if(data.error === true){
                    call_alert_error('GymContentPromoModal',data.message);
                }else{
                  loadPromo();
                  call_alert_success('GymContentPromoModal',data.message,'1');
                }
            }
        });
   }
    
    function deletePromo(){
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
                    loadPromo();
                    call_alert_success('BulletinBoardModal',data.message);
                }
            }
        });
    }
    
    function loadPromo(){
        var site_url = '<?=site_url()?>';
        $.fn.dataTable.ext.errMode = 'none';
        $.fn.dataTable.ext.classes.sPageButton = 'page-link';
        // $.fn.dataTable.ext.classes.sTable = '';
        // $.fn.dataTable.ext.classes.sNoFooter = '';
        $('#promoListTable').DataTable({
            destroy: true,
            autoWidth: false,
            lengthMenu: [[10, 20, -1], [10, 20, "All"]],
            "ajax": {
                "url": site_url +"gym/GymContentPromo//ajaxLoadPromo" ,
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
                        for (var ii = 0; ii < data[i].Access.length; ii++){
                            branchname.push(data[i].Access[ii].BranchName)
                        }
                        var PromoStatus = data[i].PromoStatus.toLowerCase().replace(/\b[a-z]/g, function(letter) {
                            return letter.toUpperCase();
                        });
                        data[i]["rolename"] = rolename;
                        data[i]["branchname"] = branchname;     
                        data[i]["active"] = PromoStatus;      
                        // data[i]["changepassword"] = "<button class='btn btn-warning changepass' data-obj='" + data_array + "' data-toggle='modal' data-target='#changepasswordModal'><i class='fa fa-key'></i> Change password</button>";
                        data[i]["edit"] = "<button class='btn btn-info user_action' data-action='editpromo' data-obj='" + data_array + "' data-toggle='modal' data-target='#GymContentPromoModal'><i class='fa fa-edit'></i> Edit</button>";
                        data[i]["delete"] = "<button class='btn btn-danger user_action' data-action='deletepromo' data-obj='" + data_array + "' data-toggle='modal' data-target='#GymContentPromoModal'><i class='fa fa-times'></i> Deactivate</button>";
                    }

                    return data;
                }
            },
            "columns": [
              // {"width" : '10px' },
              // {"width" : '150px' },
              // {"width" : '150px' },
              // {"width" : '150px' },        
              // {"width" : '150px' },
              // {"width" : '150px' },
              // {"width" : '50px' },
              // {"width" : '50px' },
              {"data": "num"},
              {"data": "branchname"},
              {"data": "PromoName"},
              {"data": "PromoDescription"},
              {"data": "PromoRegistration"},
              {"data": "PromoDuration"},
              {"data": "PromoAmount"},
              {"data": "active"},
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
            url: site_url + 'gym/GymContentPromo/loadBranch',
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
 
