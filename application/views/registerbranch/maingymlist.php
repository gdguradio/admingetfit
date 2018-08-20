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
        <small>Main Gym List</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=site_url();?>"><i class="fa fa-dashboard"></i>Home</a></li>
        <li><a href="#" data-toggle='modal' data-target='#mainModal'><i class="fa fa-dashboard"></i>Register Main Gym Information</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
	
	<div class="box">
            <div class="box-header">
              <h3 class="box-title">Main Gym Lists</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="branchListTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th width="10">[#]</th>
                    <th width="150">Gym Name</th>
                    <th width="150">Gym CEO</th>
                    <th width="150">Branch Type</th>
                    <th width="200">Complete Address</th>
                    <th width="150">Gym Contact Person</th>
                    <th width="180">Gym Contact Number</th>
                    <th width="150">Gym Email Address</th>
                    <th>Created Date</th>
                    <th></th>
                    <th width="30"></th>
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


<!-- register start -->
<div class="modal fade" id="mainModal" role="dialog">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Main Gym Login</h4>
          </div>
          <div class="modal-body">
          <form role="form" id="registerBranch">
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
                    <input type="hidden" id="branchID" />
                    <label for="submenuname">Branch Type</label>
                    <select class="form-control" id="branchtype">
                        <option value='main'>Main</option>
                        <option value='franchise'>Franchise</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="username">Branch Name <span class="tcolor_red">*</span></label>
                  <input type="text" class="form-control" id="branchname" placeholder="Enter Branch Name">
                </div>
                <div class="form-group">
                  <label for="contactperson">Contact Person</label>
                  <input type="text" class="form-control" id="contactperson" placeholder="Enter Contact Person">
                </div>
                <div class="form-group">
                  <label for="emailaddress">Email Address <span class="tcolor_red">*</span></label>
                  <input type="text" class="form-control" id="emailaddress" placeholder="Enter Email Address">
                </div>
                <div class="form-group">
                  <label for="landlinenumber">Landline Number</label>
                  <input type="username" class="form-control" id="landlinenumber" placeholder="Enter Landline Number">
                </div>
                <div class="form-group">
                  <label for="mobilenumber">Mobile Number <span class="tcolor_red"></span></label>
                  <input type="text" class="form-control" id="mobilenumber" placeholder="Enter Mobile Number">
                </div>

               

                <!-- address start -->
                <div class="form-group">
                  <label for="housenumber">House Number <span class="tcolor_red"></span></label>
                  <input type="text" class="form-control" id="housenumber" placeholder="Enter House Number">
                </div>
                <div class="form-group">
                  <label for="lotnumber">Lot Number <span class="tcolor_red"></span></label>
                  <input type="text" class="form-control" id="lotnumber" placeholder="Enter Lot Number">
                </div>
                <div class="form-group">
                  <label for="blocknumber">Block Number <span class="tcolor_red"></span></label>
                  <input type="text" class="form-control" id="blocknumber" placeholder="Enter Block Number">
                </div>
                <div class="form-group">
                  <label for="phasenumber">Phase Number <span class="tcolor_red"></span></label>
                  <input type="text" class="form-control" id="phasenumber" placeholder="Enter Phase Number">
                </div>
                <div class="form-group">
                  <label for="floornumber">Floor Number <span class="tcolor_red"></span></label>
                  <input type="text" class="form-control" id="floornumber" placeholder="Enter Floor Number">
                </div>
                <div class="form-group">
                  <label for="buildingname">Building Name <span class="tcolor_red"></span></label>
                  <input type="text" class="form-control" id="buildingname" placeholder="Enter Building Name">
                </div>
                <div class="form-group">
                  <label for="streetname">Street Name <span class="tcolor_red"></span></label>
                  <input type="text" class="form-control" id="streetname" placeholder="Enter Street Name">
                </div>
                <div class="form-group">
                  <label for="purokname">Purok Name <span class="tcolor_red"></span></label>
                  <input type="text" class="form-control" id="purokname" placeholder="Enter Purok Name">
                </div>
                <div class="form-group">
                  <label for="subdivisionname">Subdivision Name <span class="tcolor_red"></span></label>
                  <input type="text" class="form-control" id="subdivisionname" placeholder="Enter Subdivision Name">
                </div>
                <div class="form-group">
                  <label for="barangayname">Barangay Name <span class="tcolor_red">*</span></label>
                  <input type="text" class="form-control" id="barangayname" placeholder="Enter Barangay Name">
                </div>
                <div class="form-group">
                  <label for="cityname">City Name <span class="tcolor_red">*</span></label>
                  <input type="text" class="form-control" id="cityname" placeholder="Enter City Name">
                </div>
                <div class="form-group">
                  <label for="provincename">Province Name <span class="tcolor_red">*</span></label>
                  <input type="text" class="form-control" id="provincename" placeholder="Enter Province Name">
                </div>
                <div class="form-group">
                  <label for="regionname">Region Name <span class="tcolor_red">*</span></label>
                  <input type="text" class="form-control" id="regionname" placeholder="Enter Region Name">
                </div>
                <div class="form-group">
                  <label for="countryname">Country Name <span class="tcolor_red">*</span></label>
                  <input type="text" class="form-control" id="countryname" placeholder="Enter Country Name">
                </div>
                <div class="form-group">
                  <label for="zipcode">Zip Code <span class="tcolor_red">*</span></label>
                  <input type="text" class="form-control" id="zipcode" placeholder="Enter Zip Code">
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
                <!-- address end -->
              </div>
              <!-- /.box-body -->
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" id="btnaddmaingym">Submit</button>
            <button type="button" class="btn btn-success" id="btnupdatemaingym" style="display:none;">Update</button>
            <button type="button" class="btn btn-danger" id="btndeletemaingym" style="display:none;">Delete</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <!-- register end -->
<!-- end modal -->  
<script src="<?=site_url();?>assets/adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?=site_url();?>assets/adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script>
    $(document).ready(function(){
        // loadRole();
        loadBranchdetails();
        $('#mainModal').on('shown.bs.modal', function (e) {
        // do something...
            action = $(e.relatedTarget).attr('data-action');
            
            console.log('user : ' + action)
            if(action === 'edit') {
                    $('#btnaddmaingym').hide();
                    $('#btnupdatemaingym').show();
                    $('#btndeletemaingym').hide();
                    $('#password').closest('.form-group').hide();
                    $('#password_confirmation').closest('.form-group').hide();
            }else if(action === 'delete'){
                    $('#btnupdatemaingym').hide();
                    $('#btndeletemaingym').show();
                    $('#password').closest('.form-group').hide();
                    $('#password_confirmation').closest('.form-group').hide();
            }else{
                $('#btnaddmaingym').show();
                $('#password').closest('.form-group').show();
                $('#password_confirmation').closest('.form-group').show();
                $('#btnupdatemaingym').hide();
                $('#btndeletemaingym').hide();
            }    
        })

        $(document).on('click','.user_action',function(){
            var action = $(this).attr('data-action');
            var obj = JSON.parse($(this).attr('data-obj'));
            $(":radio[name='activitystatus'][value='"+obj.BranchStatus+"']").prop('checked','checked');
            $(":radio[name='deletestatus'][value='"+obj.DeleteStatus+"']").prop('checked','checked');
            $('#branchID').val(obj.SysID);
            $('#branchname').val(obj.BranchName);
            $('#contactperson').val(obj.ContactPerson);
            $('#emailaddress').val(obj.EmailAddress);
            // $('#rolename').val(obj.MasterDataRoleID);
            // $('#fname').val(obj.FirstName);
            // $('#lname').val(obj.LastName);
            // $('#mname').val(obj.MiddleName);
            // $('#suffix').val(obj.Suffix);
            // $('#username').val(obj.UserName);
            // $('#email').val(obj.EmailAddress);
            // $('#landlinenumber').val(obj.LandLineNumber);
            // $('#mobilenumber').val(obj.MobileNumber);
            // $("#branchname").val(obj.BranchName);
            // $("#contactperson").val(obj.ContactPerson);
            // $("#emailaddress").val(obj.EmailAddress);
            $("#landlinenumber").val(obj.LandLineNumber);
            $("#mobilenumber").val(obj.MobileNumber);
            $("#housenumber").val(obj.HouseNumber);
            $("#lotnumber").val(obj.Lot);
            $("#blocknumber").val(obj.Block);
            $("#phasenumber").val(obj.Phase);
            $("#floornumber").val(obj.FloorNumber);
            $("#buildingname").val(obj.BuildingName);
            $("#streetname").val(obj.StreetName);
            $("#purokname").val(obj.PurokName);
            $("#subdivisionname").val(obj.SubdivisionName);
            $("#barangayname").val(obj.BarangayName);
            $("#cityname").val(obj.CityName);
            $("#provincename").val(obj.ProvinceName);
            $("#regionname").val(obj.RegionName);
            $("#countryname").val(obj.CountryName);
            $("#zipcode").val(obj.ZipCode);
            
        });
        
        
        
        $('#btnaddmaingym').click(regitermainGym);
        $('#btnupdatemaingym').click(updatemainGym);
        $('#branchtype').change(loadBranchNames).change();
        
    });
    function regitermainGym(e){
        e.preventDefault();
        const formData = new FormData();
        const site_url = "<?php echo site_url();?>";
        
        const branchtype = $("#branchtype option:selected").val();
        const branchname = $("#branchname").val();
        const contactperson = $("#contactperson").val();
        const emailaddress = $("#emailaddress").val();
        const landlinenumber = $("#landlinenumber").val();
        const mobilenumber = $("#mobilenumber").val();
        const housenumber = $("#housenumber").val();
        const lotnumber = $("#lotnumber").val();
        const blocknumber = $("#blocknumber").val();
        const phasenumber = $("#phasenumber").val();
        const floornumber = $("#floornumber").val();
        const buildingname = $("#buildingname").val();
        const streetname = $("#streetname").val();
        const purokname = $("#purokname").val();
        const subdivisionname = $("#subdivisionname").val();
        const barangayname = $("#barangayname").val();
        const cityname = $("#cityname").val();
        const provincename = $("#provincename").val();
        const regionname = $("#regionname").val();
        const countryname = $("#countryname").val();
        const zipcode = $("#zipcode").val();
        const branchstatus = $(":radio[name='activitystatus']:checked").val();
        const deletestatus = $(":radio[name='deletestatus']:checked").val();
        
        formData.append('branchtype',branchtype);
        formData.append('branchname',branchname);
        formData.append('contactperson',contactperson);
        formData.append('emailaddress',emailaddress);
        formData.append('landlinenumber',landlinenumber);
        formData.append('mobilenumber',mobilenumber);
        formData.append('housenumber',housenumber);
        formData.append('lotnumber',lotnumber);
        formData.append('blocknumber',blocknumber);
        formData.append('phasenumber',phasenumber);
        formData.append('floornumber',floornumber);
        formData.append('buildingname',buildingname);
        formData.append('streetname',streetname);
        formData.append('purokname',purokname);
        formData.append('subdivisionname',subdivisionname);
        formData.append('barangayname',barangayname);
        formData.append('cityname',cityname);
        formData.append('provincename',provincename);
        formData.append('regionname',regionname);
        formData.append('countryname',countryname);
        formData.append('zipcode',zipcode);
        formData.append('branchstatus',branchstatus);
        formData.append('deletestatus',deletestatus);
        $.ajax({
            type:'POST',
            url: site_url + 'registerbranch/MainGymInformation/insertBranchFromAjax' ,
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
                    call_alert_error(0,data.message);
                }else{
                  loadBranchdetails();
                  call_alert_success(0,data.message,'1');
                }
            }
        });
    }
    function updatemainGym(e){
        e.preventDefault();
        const formData = new FormData();
        const site_url = "<?php echo site_url();?>";
        const branchID = $('#branchID').val();
        const branchtype = $("#branchtype option:selected").val();
        const branchname = $("#branchname").val();
        const contactperson = $("#contactperson").val();
        const emailaddress = $("#emailaddress").val();
        const landlinenumber = $("#landlinenumber").val();
        const mobilenumber = $("#mobilenumber").val();
        const housenumber = $("#housenumber").val();
        const lotnumber = $("#lotnumber").val();
        const blocknumber = $("#blocknumber").val();
        const phasenumber = $("#phasenumber").val();
        const floornumber = $("#floornumber").val();
        const buildingname = $("#buildingname").val();
        const streetname = $("#streetname").val();
        const purokname = $("#purokname").val();
        const subdivisionname = $("#subdivisionname").val();
        const barangayname = $("#barangayname").val();
        const cityname = $("#cityname").val();
        const provincename = $("#provincename").val();
        const regionname = $("#regionname").val();
        const countryname = $("#countryname").val();
        const zipcode = $("#zipcode").val();
        const branchstatus = $(":radio[name='activitystatus']:checked").val();
        const deletestatus = $(":radio[name='deletestatus']:checked").val();
        

        formData.append('branchID',branchID);
        formData.append('branchtype',branchtype);
        formData.append('branchname',branchname);
        formData.append('contactperson',contactperson);
        formData.append('emailaddress',emailaddress);
        formData.append('landlinenumber',landlinenumber);
        formData.append('mobilenumber',mobilenumber);
        formData.append('housenumber',housenumber);
        formData.append('lotnumber',lotnumber);
        formData.append('blocknumber',blocknumber);
        formData.append('phasenumber',phasenumber);
        formData.append('floornumber',floornumber);
        formData.append('buildingname',buildingname);
        formData.append('streetname',streetname);
        formData.append('purokname',purokname);
        formData.append('subdivisionname',subdivisionname);
        formData.append('barangayname',barangayname);
        formData.append('cityname',cityname);
        formData.append('provincename',provincename);
        formData.append('regionname',regionname);
        formData.append('countryname',countryname);
        formData.append('zipcode',zipcode);
        formData.append('branchstatus',branchstatus);
        formData.append('deletestatus',deletestatus);
        $.ajax({
            type:'POST',
            url: site_url + 'registerbranch/MainGymInformation/updateBranchFromAjax' ,
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
                    call_alert_error(0,data.message);
                }else{
                  loadBranchdetails();
                  call_alert_success(0,data.message,'1');
                }
            }
        });
    }
    function loadBranchdetails(){
        var site_url = '<?=site_url()?>';
        $.fn.dataTable.ext.errMode = 'none';
        $.fn.dataTable.ext.classes.sPageButton = 'page-link';
        // $.fn.dataTable.ext.classes.sTable = '';
        // $.fn.dataTable.ext.classes.sNoFooter = '';
        $('#branchListTable').DataTable({
            destroy: true,
            lengthMenu: [[10, 20, -1], [10, 20, "All"]],
            "ajax": {
                "url": site_url +"registerbranch/MainGymInformation/ajaxLoadBranch" ,
                "type": "POST",
                "dataSrc": function (data) {
                    var ctr = 0;
                    for (var i = 0; i < data.length; i++){
                        ctr++;
                        var data_array = [];
                        var landline = data[i].LandLineNumber ? data[i].LandLineNumber : "";
                        var mobile = data[i].MobileNumber ?data[i].MobileNumber : "";
                        var lname = data[i].LastName ? data[i].LastName : "";
                        var suffix = data[i].Suffix ? ', ' + data[i].Suffix : "";
                        var contactnumber = "";
                        if(landline.length > 0 && mobile.length > 0){
                            contactnumber = landline+"/"+mobile
                        }else if(landline.length > 0 && mobile.length == 0){
                            contactnumber = landline
                        }else{
                            contactnumber = mobile
                        }
                        var userlist = data[i].userList;
                        data_array = JSON.stringify(data[i]);
                        
                        var ceoname = "No User is Added to this Branch";
                        if(userlist.length > 0){
                          for (var ii = 0; ii < userlist.length; ii++){
                            if(userlist[ii].PositionName.toLowerCase() == "ceo"){

                              var fname = userlist[ii].FirstName ? userlist[ii].FirstName : "";
                              var mname = userlist[ii].MiddleName ?userlist[ii].MiddleName.substring(0,1)+'. ' : "";
                              var lname = userlist[ii].LastName ? userlist[ii].LastName : "";
                              var suffix = userlist[ii].Suffix ? ', ' + userlist[ii].Suffix : "";
                              ceoname = fname  + ' ' + mname  + lname + suffix;
                            }
                          }
                        }
                        data[i]["num"] = ctr;
                        // data[i]["completeaddress"] = fullname
                        data[i]["contactnumber"] = contactnumber
                        data[i]["ceo"] = ceoname
                        data[i]["changepassword"] = "<button class='btn btn-warning changepass' data-obj='" + data_array + "' data-toggle='modal' data-target='#changepasswordModal'><i class='fa fa-key'></i> Change password</button>";
                        data[i]["edit"] = "<button class='btn btn-info user_action' data-action='edit' data-obj='" + data_array + "' data-toggle='modal' data-target='#mainModal'><i class='fa fa-edit'></i> Edit</button>";
                        data[i]["delete"] = "<button class='btn btn-danger user_action' data-action='delete' data-obj='" + data_array + "' data-toggle='modal' data-target='#mainModal'><i class='fa fa-times'></i> Deactivate</button>";
                    }

                    return data;
                }
            },
            "columns": [
                {"data": "num"},
                {"data": "BranchName"},
                {"data": "ceo"},
                {"data": "BranchType"},
                {"data": "CityName"},
                {"data": "ContactPerson"},
                {"data": "contactnumber"},
                {"data": "EmailAddress"},
                {"data": "AddedDate"},
                {"data": "edit"},
                {"data": "changepassword"},
                {"data": "delete"}
            ],
            "bInfo":false
        });
    }
    function loadBranchNames(e){
        var branchtype = $(e.target).val();
        var site_url = "<?php echo site_url();?>";
        $.ajax({
            type:'POST',
            url: site_url +"registerbranch/MainGymInformation/loadBranch" ,
            dataType:"json",
            data:{branchtype : branchtype},
            success:function(data)
            {
                var branchname_select = $('#branchname');
                branchname_select.empty();
                branchname_select.append('<option value="" selected disabled>Select...</option>');
                if(data.error === true){
                    branchname_select.append('<option>'+ data.message +'</option>');
                }else{
                    for(var x = 0; x < data.length; x++){
                        branchname_select.append('<option value='+ data[x].SysID+'>'+ data[x].BranchName  +'</option>');
                    }
                }
            }
        });
    }
    // function loadRole(){
    //     var site_url = "<?php echo site_url();?>";
    //     $.ajax({
    //         type:'POST',
    //         url: site_url +"registeruser/MainUserInformation/ajaxLoadRole" ,
    //         dataType:"json",
    //         success:function(data)
    //         {
    //             var rolename_select = $('#rolename');
    //             rolename_select.empty();
    //             rolename_select.append('<option value="" selected disabled>Select...</option>');
    //             if(data.error === true){
    //               rolename_select.append('<option>'+ data.message +'</option>');
    //             }else{
    //                 for(var x = 0; x < data.length; x++){
    //                   rolename_select.append('<option value='+ data[x].SysID+'>'+ data[x].RoleName  +'</option>');
    //                 }
    //             }
    //         }
    //     });
    // }
</script>
 
