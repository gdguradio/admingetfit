<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!-- Left side column. contains the sidebar -->

    
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?=str_replace('_', ' ', $title);?>
        <small>Register Gym Information</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=site_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <!--<li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>-->
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      
<!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              
            </div>
            <!-- /.box-header -->
            <!-- form start -->
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
                  <label for="mobilenumber">Mobile Number <span class="tcolor_red">*</span></label>
                  <input type="text" class="form-control" id="mobilenumber" placeholder="Enter Mobile Number">
                </div>

               

                <!-- address start -->
                <div class="form-group">
                  <label for="housenumber">House Number <span class="tcolor_red">*</span></label>
                  <input type="text" class="form-control" id="housenumber" placeholder="Enter House Number">
                </div>
                <div class="form-group">
                  <label for="lotnumber">Lot Number <span class="tcolor_red">*</span></label>
                  <input type="text" class="form-control" id="lotnumber" placeholder="Enter Lot Number">
                </div>
                <div class="form-group">
                  <label for="blocknumber">Block Number <span class="tcolor_red">*</span></label>
                  <input type="text" class="form-control" id="blocknumber" placeholder="Enter Block Number">
                </div>
                <div class="form-group">
                  <label for="phasenumber">Phase Number <span class="tcolor_red">*</span></label>
                  <input type="text" class="form-control" id="phasenumber" placeholder="Enter Phase Number">
                </div>
                <div class="form-group">
                  <label for="floornumber">Floor Number <span class="tcolor_red">*</span></label>
                  <input type="text" class="form-control" id="floornumber" placeholder="Enter Floor Number">
                </div>
                <div class="form-group">
                  <label for="buildingname">Building Name <span class="tcolor_red">*</span></label>
                  <input type="text" class="form-control" id="buildingname" placeholder="Enter Building Name">
                </div>
                <div class="form-group">
                  <label for="streetname">Street Name <span class="tcolor_red">*</span></label>
                  <input type="text" class="form-control" id="streetname" placeholder="Enter Street Name">
                </div>
                <div class="form-group">
                  <label for="purokname">Purok Name <span class="tcolor_red">*</span></label>
                  <input type="text" class="form-control" id="purokname" placeholder="Enter Purok Name">
                </div>
                <div class="form-group">
                  <label for="subdivisionname">Subdivision Name <span class="tcolor_red">*</span></label>
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
                <!-- address end -->
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary" id="btn_submit">Update</button>
              </div>
            </form>
          </div>
          <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 
<script>
    $(document).ready(function(){
        loadMainGymInformation();
        $('#registerBranch').submit(updateBranch);
    });
    
    function updateBranch(e){
        e.preventDefault();


        const formData = new FormData();
        const site_url = "<?php echo site_url();?>";
        const branchname = e.target.querySelector("#branchname").value;
        const contactperson = e.target.querySelector("#contactperson").value;
        const emailaddress = e.target.querySelector("#emailaddress").value;
        const landlinenumber = e.target.querySelector("#landlinenumber").value;
        const mobilenumber = e.target.querySelector("#mobilenumber").value;
        const housenumber = e.target.querySelector("#housenumber").value;
        const lotnumber = e.target.querySelector("#lotnumber").value;
        const blocknumber = e.target.querySelector("#blocknumber").value;
        const phasenumber = e.target.querySelector("#phasenumber").value;
        const floornumber = e.target.querySelector("#floornumber").value;
        const buildingname = e.target.querySelector("#buildingname").value;
        const streetname = e.target.querySelector("#streetname").value;
        const purokname = e.target.querySelector("#purokname").value;
        const subdivisionname = e.target.querySelector("#subdivisionname").value;
        const barangayname = e.target.querySelector("#barangayname").value;
        const cityname = e.target.querySelector("#cityname").value;
        const provincename = e.target.querySelector("#provincename").value;
        const regionname = e.target.querySelector("#regionname").value;
        const countryname = e.target.querySelector("#countryname").value;
        const zipcode = e.target.querySelector("#zipcode").value;
        
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
        
        $.ajax({
            type:'POST',
            url: site_url + 'registerbranch/MainGymInformation/updateBranchFromAjax',
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
                    call_alert_success(0,data.message,'1');
                }
            }
        });
    }
    
    function registerBranch(e){
        e.preventDefault();


        const formData = new FormData();
        const site_url = "<?php echo site_url();?>";
        const branchname = e.target.querySelector("#branchname").value;
        const contactperson = e.target.querySelector("#contactperson").value;
        const emailaddress = e.target.querySelector("#emailaddress").value;
        const landlinenumber = e.target.querySelector("#landlinenumber").value;
        const mobilenumber = e.target.querySelector("#mobilenumber").value;
        const housenumber = e.target.querySelector("#housenumber").value;
        const lotnumber = e.target.querySelector("#lotnumber").value;
        const blocknumber = e.target.querySelector("#blocknumber").value;
        const phasenumber = e.target.querySelector("#phasenumber").value;
        const floornumber = e.target.querySelector("#floornumber").value;
        const buildingname = e.target.querySelector("#buildingname").value;
        const streetname = e.target.querySelector("#streetname").value;
        const purokname = e.target.querySelector("#purokname").value;
        const subdivisionname = e.target.querySelector("#subdivisionname").value;
        const barangayname = e.target.querySelector("#barangayname").value;
        const cityname = e.target.querySelector("#cityname").value;
        const provincename = e.target.querySelector("#provincename").value;
        const regionname = e.target.querySelector("#regionname").value;
        const countryname = e.target.querySelector("#countryname").value;
        const zipcode = e.target.querySelector("#zipcode").value;
        
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
        
        $.ajax({
            type:'POST',
            url: site_url + 'registerbranch/MainGymInformation/insertBranchFromAjax',
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
                    call_alert_success(0,data.message,'1');
                }
            }
        });
    }
    function loadMainGymInformation(){
      const site_url = "<?php echo site_url();?>";
      $.ajax({
            type:'POST',
            url: site_url + 'registerbranch/MainGymInformation/loadMainGymInformation',
            dataType:"json",
            async: true,
            cache: false,
            contentType: false,
            enctype: 'multipart/form-data',
            processData: false,
            success:function(data)
            {
                if(data.error === true){
                    // call_alert_error(0,data.message);
                }else{
                    // call_alert_success(0,data.message,'1');
                    console.log(data[0].BranchName)
                  $("#branchname").val(data[0].BranchName);
                  $("#contactperson").val(data[0].ContactPerson);
                  $("#emailaddress").val(data[0].EmailAddress);
                  $("#landlinenumber").val(data[0].LandLineNumber);
                  $("#mobilenumber").val(data[0].MobileNumber);
                  $("#housenumber").val(data[0].HouseNumber);
                  $("#lotnumber").val(data[0].Lot);
                  $("#blocknumber").val(data[0].Block);
                  $("#phasenumber").val(data[0].Phase);
                  $("#floornumber").val(data[0].FloorNumber);
                  $("#buildingname").val(data[0].BuildingName);
                  $("#streetname").val(data[0].StreetName);
                  $("#purokname").val(data[0].PurokName);
                  $("#subdivisionname").val(data[0].SubdivisionName);
                  $("#barangayname").val(data[0].BarangayName);
                  $("#cityname").val(data[0].CityName);
                  $("#provincename").val(data[0].ProvinceName);
                  $("#regionname").val(data[0].RegionName);
                  $("#countryname").val(data[0].CountryName);
                  $("#zipcode").val(data[0].ZipCode);
                    // call_alert_success(0,data.message,'1');
                }
            }
        });
    }
</script>