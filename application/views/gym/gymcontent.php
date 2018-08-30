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
        <li><a href="<?=site_url().''.'Welcome';?>"><i class="fa fa-dashboard"></i>Home</a></li>
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
    <!-- member benefits section start -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">

          <!-- <h3 class="box-title">Promo</h3> -->
          <ol class="breadcrumb">
            <li><h3 class="box-title">Member Benefits</h3></li>
            <li><a href="#" data-toggle='modal' data-target='#GymContentBenefitsModal' data-action="promo"><i class="fa fa-keyboard-o"></i>Add Member Benefits</a></li>
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
          <table id="memberbenefitsListTable" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th width="10">[#]</th>
                <th width="150">Show to Branch</th>
                <th width="150">Category</th>
                <th width="150">Name</th>
                <th width="250">Description</th>
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
    <!-- benefits end -->
    <!-- faqs section start -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">

          <!-- <h3 class="box-title">Promo</h3> -->
          <ol class="breadcrumb">
            <li><h3 class="box-title">FAQs</h3></li>
            <li><a href="#" data-toggle='modal' data-target='#GymContentFaqsModal' data-action="promo"><i class="fa fa-keyboard-o"></i>Add FAQs</a></li>
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
          <table id="faqsListTable" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th width="10">[#]</th>
                <th width="150">Show to Branch</th>
                <th width="350">Question</th>
                <th width="350">Description</th>
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
    <!-- faqs end -->



    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<!-- start modal -->
<!-- promo start -->
<div class="modal fade GymContentModal" data-id="promo" id="GymContentPromoModal" role="dialog">
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
<!-- promo end -->
<!-- Benefits start -->
<div class="modal fade GymContentModal" data-id="benefit" id="GymContentBenefitsModal" role="dialog">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Member Benefits</h4>
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
                  <select class="form-control" name="showtobranch" id="showtobranchbenefit" multiple>
                        
                  </select>

                </div>
                <div class="form-group">
                  <label for="benefitcategory">Benefit Category</label>
                  <select class="form-control" id="benefitcategory">
                    <option value="1" selected>Equipment</option>
                    <option value="2">Lifestyle</option>
                    <option value="3">Services</option>
                  </select>
                </div>
                <div class="form-group">
                    <input type="hidden" id="benefitID"/>
                    <label for="benefitname">Benefit name <span class="tcolor_red">*</span></label>
                    <input type="text" class="form-control" id="benefitname" placeholder="Enter Benefit name">
                </div>
                <div class="form-group">
                  <label for="benefitdescription">Benefit description</label>
                  <Textarea class="form-control" rows="5" style="resize: vertical;" id="benefitdescription" ></Textarea>
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
            <button type="button" class="btn btn-primary" id="btnaddbenefit">Submit</button>
            <button type="button" class="btn btn-success" id="btnupdatebenefit" style="display:none;">Update</button>
            <button type="button" class="btn btn-danger" id="btndeletebenefit" style="display:none;">Delete</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
<!-- benefits end -->
<!-- faqs start -->
<div class="modal fade GymContentModal" data-id="faqs" id="GymContentFaqsModal" role="dialog">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">FAQs</h4>
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
                  <label for="showtobranch">Show to Branch <span class="tcolor_red">*</span></label>
                  <select class="form-control" name="showtobranch" id="showtobranchfaqs" multiple>
                        
                  </select>

                </div>
                <div class="form-group">
                    <input type="hidden" id="faqsID"/>
                    <label for="question">Question <span class="tcolor_red">*</span></label>
                    <input type="text" class="form-control" id="question" placeholder="Enter Question">
                </div>
                <div class="form-group">
                  <label for="faqsdescription">Description <span class="tcolor_red">*</span></label>
                  <Textarea class="form-control" rows="5" style="resize: vertical;" id="faqsdescription" ></Textarea>
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
            <button type="button" class="btn btn-primary" id="btnaddfaqs">Submit</button>
            <button type="button" class="btn btn-success" id="btnupdatefaqs" style="display:none;">Update</button>
            <button type="button" class="btn btn-danger" id="btndeletefaqs" style="display:none;">Delete</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
<!-- faqs end -->
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
    $(document).ready(function() {
        loadPromo();
        loadBenefit();
        loadBranch();
        loadFaqs();
        //Date range picker
        $('#promodates').daterangepicker()
        $('.GymContentModal').on('shown.bs.modal', function(e) {
            // do something...
            action = $(e.relatedTarget).attr('data-action');
            modalof = $(this).attr('data-id');
            console.log(modalof)
            $('.btn-primary').hide();
            if (action.indexOf("edit") != -1) {
                $('select[name=showtobranch] option').removeAttr("selected");
                $('#btnupdate' + modalof).show();
                $('#btndelete' + modalof).hide();
            } else if (action.indexOf("delete") != -1) {
                $('#btnupdate' + modalof).hide();
                $('#btndelete' + modalof).show();
            } else {
                $('#btnadd' + modalof).show();
                $('#btnupdate' + modalof).hide();
                $('#btndelete' + modalof).hide();
            }
        })
        $(document).on('click', '.user_action', function() {
            var action = $(this).attr('data-action');
            console.log(JSON.stringify($(this).attr('data-obj')))
            var obj = JSON.parse($(this).attr('data-obj'));
            if (action.indexOf("promo") != -1) {
                $('#promoID').val(obj.SysID);
                
                $.each(obj.Access, function(i, e) {
                    $('#showtobranch option[value="' + e.BranchID + '"]').prop("selected", "selected");
                })
                // var changedata = {type:"change",RoleName:obj.RoleName};
                // $('#showtobranch').trigger(changedata);
                $('#promoname').val(obj.PromoName);
                $('#description').val(obj.PromoDescription);
                $('#promodates').val(obj.PromoRegistration);
                $('#promoduration').val(obj.PromoDuration);
                $('#promoamount').val(obj.PromoAmount);
                $(":radio[name='activitystatus'][value='" + obj.PromoStatus + "']").prop('checked', 'checked');
                $(":radio[name='deletestatus'][value='" + obj.DeleteStatus + "']").prop('checked', 'checked');
            }
            if (action.indexOf("benefit") != -1) {
                $('#benefitID').val(obj.SysID);
                $.each(obj.Access, function(i, e) {
                    $('#showtobranchbenefit option[value="' + e.BranchID + '"]').prop("selected", true);
                })
                $('#benefitname').val(obj.BenefitName);
                $('#benefitdescription').val(obj.BenefitDescription);
                $('#benefitcategory').val(obj.BenefitCategory);
                $(":radio[name='activitystatus'][value='" + obj.BenefitStatus + "']").prop('checked', 'checked');
                $(":radio[name='deletestatus'][value='" + obj.DeleteStatus + "']").prop('checked', 'checked');
            }
            if (action.indexOf("faqs") != -1) {
                $('#faqsID').val(obj.SysID);
                $.each(obj.Access, function(i, e) {
                    $('#showtobranchfaqs option[value="' + e.BranchID + '"]').prop("selected", true);
                })
                $('#question').val(obj.Question);
                $('#faqsdescription').val(obj.Description);
                $(":radio[name='activitystatus'][value='" + obj.FaqsStatus + "']").prop('checked', 'checked');
                $(":radio[name='deletestatus'][value='" + obj.DeleteStatus + "']").prop('checked', 'checked');
            }

        });
        $('#btnaddpromo').click(addPromo);
        $('#btnupdatepromo').click(updatePromo);
        $('#btndeletepromo').click(deletePromo);

        $('#btnaddbenefit').click(addBenefit);
        $('#btnupdatebenefit').click(updateBenefit);
        $('#btndeletebenefit').click(deleteBenefit);

        $('#btnaddfaqs').click(addFaqs);
        $('#btnupdatefaqs').click(updateFaqs);
        $('#btndeletefaqs').click(deleteFaqs);




        // var changedata = {type:"change",submenuID:obj.submenuID};
        // $('#menuname').val(obj.menuID).trigger(changedata);
        // $('#showtobranch').change(loadBranchroles);
    });

    function addPromo() {

        var site_url = '<?=site_url()?>';
        var promoname = $('#promoname').val();
        var showtobranch = $('#showtobranch').val();
        var description = $('#description').val();
        var promodates = $('#promodates').val();
        var promoduration = $('#promoduration').val();
        var promoamount = $('#promoamount').val();
        const promostatus = $(":radio[name='activitystatus']:checked").val();
        const deletestatus = $(":radio[name='deletestatus']:checked").val();
        if (jQuery.inArray("*", showtobranch) !== -1) {
            showtobranch = $("select#showtobranch option").slice(1).map(function() {
                return this.value;
            }).get();
        }
        $.ajax({
            type: 'POST',
            url: site_url + 'gym/GymContentPromo/insertGymContentPromoFromAjax',
            dataType: "json",
            data: {
                promoname: promoname,
                showtobranch: showtobranch,
                description: description,
                promodates: promodates,
                promoduration: promoduration,
                promoamount: promoamount,
                promostatus: promostatus,
                deletestatus: deletestatus
            },
            success: function(data) {
                if (data.error === true) {
                    call_alert_error('GymContentPromoModal', data.message);
                } else {
                    loadPromo();
                    call_alert_success('GymContentPromoModal', data.message, '1');
                }
            }
        });
    }

    function updatePromo() {

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
        if (jQuery.inArray("*", showtobranch) !== -1) {
            showtobranch = $("select#showtobranch option").slice(1).map(function() {
                return this.value;
            }).get();
        }
        $.ajax({
            type: 'POST',
            url: site_url + 'gym/GymContentPromo/updateGymContentPromoFromAjax',
            dataType: "json",
            data: {
                promoname: promoname,
                showtobranch: showtobranch,
                description: description,
                promodates: promodates,
                promoduration: promoduration,
                promoamount: promoamount,
                promostatus: promostatus,
                deletestatus: deletestatus,
                promoID: promoID
            },
            success: function(data) {
                if (data.error === true) {
                    call_alert_error('GymContentPromoModal', data.message);
                } else {
                    loadPromo();
                    call_alert_success('GymContentPromoModal', data.message, '1');
                }
            }
        });
    }

    function deletePromo() {
        var base_url = "<?php echo site_url();?>";
        var user_id = $('#user_id').val();
        $.ajax({
            type: 'POST',
            url: base_url + 'User_management/ajax_delete_user',
            dataType: "json",
            data: {
                user_id: user_id
            },
            success: function(data) {
                if (data.error === true) {
                    call_alert_error('BulletinBoardModal', data.message);
                } else {
                    loadPromo();
                    call_alert_success('BulletinBoardModal', data.message);
                }
            }
        });
    }


    function addBenefit() {

        var site_url = '<?=site_url()?>';
        var benefitname = $('#benefitname').val();
        var showtobranch = $('#showtobranchbenefit').val();
        var category = $('#benefitcategory option:selected').val();
        var description = $('#benefitdescription').val();
        const benefitstatus = $(":radio[name='activitystatus']:checked").val();
        const deletestatus = $(":radio[name='deletestatus']:checked").val();
        if (jQuery.inArray("*", showtobranch) !== -1) {
            showtobranch = $("select#showtobranchbenefit option").slice(1).map(function() {
                return this.value;
            }).get();
        }


        $.ajax({
            type: 'POST',
            url: site_url + 'gym/GymContentBenefit/insertGymContentBenefitFromAjax',
            dataType: "json",
            data: {
                benefitname: benefitname,
                showtobranch: showtobranch,
                category: category,
                description: description,
                benefitstatus: benefitstatus,
                deletestatus: deletestatus
            },
            success: function(data) {
                if (data.error === true) {
                    call_alert_error('GymContentBenefitsModal', data.message);
                } else {
                    loadBenefit();
                    call_alert_success('GymContentBenefitsModal', data.message, '1');
                }
            }
        });
    }

    function updateBenefit() {

        var site_url = '<?=site_url()?>';
        var benefitID = $('#benefitID').val();
        var benefitname = $('#benefitname').val();
        var showtobranch = $('#showtobranchbenefit').val();
        var category = $('#benefitcategory option:selected').val();
        var description = $('#benefitdescription').val();
        const benefitstatus = $(":radio[name='activitystatus']:checked").val();
        const deletestatus = $(":radio[name='deletestatus']:checked").val();
        if (jQuery.inArray("*", showtobranch) !== -1) {
            showtobranch = $("select#showtobranchbenefit option").slice(1).map(function() {
                return this.value;
            }).get();
        }
        $.ajax({
            type: 'POST',
            url: site_url + 'gym/GymContentBenefit/updateGymContentBenefitFromAjax',
            dataType: "json",
            data: {
                benefitname: benefitname,
                showtobranch: showtobranch,
                category: category,
                description: description,
                benefitstatus: benefitstatus,
                deletestatus: deletestatus,
                benefitID: benefitID
            },
            success: function(data) {
                if (data.error === true) {
                    call_alert_error('GymContentBenefitsModal', data.message);
                } else {
                    loadBenefit();
                    call_alert_success('GymContentBenefitsModal', data.message, '1');
                }
            }
        });
    }

    function deleteBenefit() {
        var base_url = "<?php echo site_url();?>";
        var user_id = $('#user_id').val();
        $.ajax({
            type: 'POST',
            url: base_url + 'User_management/ajax_delete_user',
            dataType: "json",
            data: {
                user_id: user_id
            },
            success: function(data) {
                if (data.error === true) {
                    call_alert_error('GymContentBenefitsModal', data.message);
                } else {
                    loadBenefit();
                    call_alert_success('GymContentBenefitsModal', data.message);
                }
            }
        });
    }


    function addBenefit() {
        var site_url = '<?=site_url()?>';
        var benefitname = $('#benefitname').val();
        var showtobranch = $('#showtobranchbenefit').val();
        var category = $('#benefitcategory option:selected').val();
        var description = $('#benefitdescription').val();
        const benefitstatus = $(":radio[name='activitystatus']:checked").val();
        const deletestatus = $(":radio[name='deletestatus']:checked").val();
        if (jQuery.inArray("*", showtobranch) !== -1) {
            showtobranch = $("select#showtobranchbenefit option").slice(1).map(function() {
                return this.value;
            }).get();
        }


        $.ajax({
            type: 'POST',
            url: site_url + 'gym/GymContentBenefit/insertGymContentBenefitFromAjax',
            dataType: "json",
            data: {
                benefitname: benefitname,
                showtobranch: showtobranch,
                category: category,
                description: description,
                benefitstatus: benefitstatus,
                deletestatus: deletestatus
            },
            success: function(data) {
                if (data.error === true) {
                    call_alert_error('GymContentBenefitsModal', data.message);
                } else {
                    loadBenefit();
                    call_alert_success('GymContentBenefitsModal', data.message, '1');
                }
            }
        });
    }

    function updateBenefit() {

        var site_url = '<?=site_url()?>';
        var benefitID = $('#benefitID').val();
        var benefitname = $('#benefitname').val();
        var showtobranch = $('#showtobranchbenefit').val();
        var category = $('#benefitcategory option:selected').val();
        var description = $('#benefitdescription').val();
        const benefitstatus = $(":radio[name='activitystatus']:checked").val();
        const deletestatus = $(":radio[name='deletestatus']:checked").val();
        if (jQuery.inArray("*", showtobranch) !== -1) {
            showtobranch = $("select#showtobranchbenefit option").slice(1).map(function() {
                return this.value;
            }).get();
        }
        $.ajax({
            type: 'POST',
            url: site_url + 'gym/GymContentBenefit/updateGymContentBenefitFromAjax',
            dataType: "json",
            data: {
                benefitname: benefitname,
                showtobranch: showtobranch,
                category: category,
                description: description,
                benefitstatus: benefitstatus,
                deletestatus: deletestatus,
                benefitID: benefitID
            },
            success: function(data) {
                if (data.error === true) {
                    call_alert_error('GymContentBenefitsModal', data.message);
                } else {
                    loadBenefit();
                    call_alert_success('GymContentBenefitsModal', data.message, '1');
                }
            }
        });
    }

    function deleteBenefit() {
        var base_url = "<?php echo site_url();?>";
        var user_id = $('#user_id').val();
        $.ajax({
            type: 'POST',
            url: base_url + 'User_management/ajax_delete_user',
            dataType: "json",
            data: {
                user_id: user_id
            },
            success: function(data) {
                if (data.error === true) {
                    call_alert_error('GymContentBenefitsModal', data.message);
                } else {
                    loadBenefit();
                    call_alert_success('GymContentBenefitsModal', data.message);
                }
            }
        });
    }


    function addFaqs() {
        var site_url = '<?=site_url()?>';
        var question = $('#question').val();
        var showtobranch = $('#showtobranchfaqs').val();
        var faqsdescription = $('#faqsdescription').val();
        const faqsstatus = $(":radio[name='activitystatus']:checked").val();
        const deletestatus = $(":radio[name='deletestatus']:checked").val();
        if (jQuery.inArray("*", showtobranch) !== -1) {
            showtobranch = $("select#showtobranchfaqs option").slice(1).map(function() {
                return this.value;
            }).get();
        }

        console.log(showtobranch)
        $.ajax({
            type: 'POST',
            url: site_url + 'gym/GymContentFaqs/insertGymContentFaqsFromAjax',
            dataType: "json",
            data: {
                question: question,
                showtobranch: showtobranch,
                faqsdescription: faqsdescription,
                faqsstatus: faqsstatus,
                deletestatus: deletestatus
            },
            success: function(data) {
                if (data.error === true) {
                    call_alert_error('GymContentFaqsModal', data.message);
                } else {
                    loadFaqs();
                    call_alert_success('GymContentFaqsModal', data.message, '1');
                }
            }
        });
    }

    function updateFaqs() {

        var site_url = '<?=site_url()?>';
        var faqsID = $('#faqsID').val();
        var question = $('#question').val();
        var showtobranch = $('#showtobranchfaqs').val();
        var faqsdescription = $('#faqsdescription').val();
        const faqsstatus = $(":radio[name='activitystatus']:checked").val();
        const deletestatus = $(":radio[name='deletestatus']:checked").val();
        if (jQuery.inArray("*", showtobranch) !== -1) {
            showtobranch = $("select#showtobranchfaqs option").slice(1).map(function() {
                return this.value;
            }).get();
        }
        $.ajax({
            type: 'POST',
            url: site_url + 'gym/GymContentFaqs/updateGymContentFaqsFromAjax',
            dataType: "json",
            data: {
                question: question,
                showtobranch: showtobranch,
                faqsdescription: faqsdescription,
                faqsstatus: faqsstatus,
                deletestatus: deletestatus,
                faqsID: faqsID
            },
            success: function(data) {
                if (data.error === true) {
                    call_alert_error('GymContentFaqsModal', data.message);
                } else {
                    loadFaqs();
                    call_alert_success('GymContentFaqsModal', data.message, '1');
                }
            }
        });
    }

    function deleteFaqs() {
        var base_url = "<?php echo site_url();?>";
        var user_id = $('#user_id').val();
        $.ajax({
            type: 'POST',
            url: base_url + 'User_management/ajax_delete_user',
            dataType: "json",
            data: {
                user_id: user_id
            },
            success: function(data) {
                if (data.error === true) {
                    call_alert_error('GymContentFaqsModal', data.message);
                } else {
                    loadBenefit();
                    call_alert_success('GymContentFaqsModal', data.message);
                }
            }
        });
    }




    function loadPromo() {
        var site_url = '<?=site_url()?>';
        $.fn.dataTable.ext.errMode = 'none';
        $.fn.dataTable.ext.classes.sPageButton = 'page-link';
        // $.fn.dataTable.ext.classes.sTable = '';
        // $.fn.dataTable.ext.classes.sNoFooter = '';
        $('#promoListTable').DataTable({
            destroy: true,
            autoWidth: false,
            lengthMenu: [
                [5,10, 20, -1],
                [5,10, 20, "All"]
            ],
            "ajax": {
                "url": site_url + "gym/GymContentPromo/ajaxLoadPromo",
                "type": "POST",
                "dataSrc": function(data) {
                    var ctr = 0;
                    var name = "";
                    for (var i = 0; i < data.length; i++) {
                        ctr++;
                        var data_array = [];

                        data_array = JSON.stringify(data[i]).replace(/"/g, '&quot;');
                        data[i]["num"] = ctr;
                        var branchname = [];
                        for (var ii = 0; ii < data[i].Access.length; ii++) {
                            branchname.push(data[i].Access[ii].BranchName)
                        }
                        var PromoStatus = data[i].PromoStatus.toLowerCase().replace(/\b[a-z]/g, function(letter) {
                            return letter.toUpperCase();
                        });
                        data[i]["branchname"] = branchname;
                        data[i]["active"] = PromoStatus;
                        data[i]["edit"] = '<button class="btn btn-info user_action" data-action="edit_promo" data-obj="'+data_array+'" data-toggle="modal" data-target="#GymContentPromoModal"><i class="fa fa-edit"></i> Edit</button>';
                        data[i]["delete"] = '<button class="btn btn-danger user_action" data-action="delete_promo" data-obj="'+data_array+'" data-toggle="modal" data-target="#GymContentPromoModal"><i class="fa fa-times"></i> Deactivate</button>';
                        // data[i]["edit"] = "<button class='btn btn-info user_action' data-action='edit_promo' data-obj='" + data_array + "' data-toggle='modal' data-target='#GymContentPromoModal'><i class='fa fa-edit'></i> Edit</button>";
                        // data[i]["delete"] = "<button class='btn btn-danger user_action' data-action='delete_promo' data-obj='" + data_array + "' data-toggle='modal' data-target='#GymContentPromoModal'><i class='fa fa-times'></i> Deactivate</button>";
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
            "bInfo": false
        });
    }

    function loadBenefit() {
        var site_url = '<?=site_url()?>';
        $.fn.dataTable.ext.errMode = 'none';
        $.fn.dataTable.ext.classes.sPageButton = 'page-link';
        // $.fn.dataTable.ext.classes.sTable = '';
        // $.fn.dataTable.ext.classes.sNoFooter = '';
        $('#memberbenefitsListTable').DataTable({
            destroy: true,
            // autoWidth: false,
            lengthMenu: [
                [5,10, 20, -1],
                [5,10, 20, "All"]
            ],
            "ajax": {
                "url": site_url + "gym/GymContentBenefit/ajaxLoadBenefit",
                "type": "POST",
                "dataSrc": function(data) {
                    var ctr = 0;
                    var name = "";
                    for (var i = 0; i < data.length; i++) {
                        ctr++;
                        var data_array = [];

                        data_array = JSON.stringify(data[i]).replace(/"/g, '&quot;');
                        data[i]["num"] = ctr;
                        var branchname = [];
                        for (var ii = 0; ii < data[i].Access.length; ii++) {
                            branchname.push(data[i].Access[ii].BranchName)
                        }
                        var BenefitStatus = data[i].BenefitStatus.toLowerCase().replace(/\b[a-z]/g, function(letter) {
                            return letter.toUpperCase();
                        });

                        var catarr = ['Equipment', 'Lifestyle', 'Services']
                        data[i]["branchname"] = branchname;
                        data[i]["active"] = BenefitStatus;
                        data[i]["benefitCategory"] = catarr[data[i].BenefitCategory - 1];
                        data[i]["edit"] = '<button class="btn btn-info user_action" data-action="edit_benefit" data-obj="'+data_array+'" data-toggle="modal" data-target="#GymContentBenefitsModal"><i class="fa fa-edit"></i> Edit</button>';
                        data[i]["delete"] = '<button class="btn btn-danger user_action" data-action="delete_benefit" data-obj="'+data_array+'" data-toggle="modal" data-target="#GymContentBenefitsModal"><i class="fa fa-times"></i> Deactivate</button>';
                        // data[i]["edit"] = "<button class='btn btn-info user_action' data-action='edit_benefit' data-obj='" + data_array + "' data-toggle='modal' data-target='#GymContentBenefitsModal'><i class='fa fa-edit'></i> Edit</button>";
                        // data[i]["delete"] = "<button class='btn btn-danger user_action' data-action='delete_benefit' data-obj='" + data_array + "' data-toggle='modal' data-target='#GymContentBenefitsModal'><i class='fa fa-times'></i> Deactivate</button>";
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
                {"data": "benefitCategory"},
                {"data": "BenefitName"},
                {"data": "BenefitDescription"},
                {"data": "active"},
                {"data": "AddedDate"},
                {"data": "edit"},
                {"data": "delete"}
            ],
            "bInfo": false
        });
    }
    function loadFaqs() {
        var site_url = '<?=site_url()?>';
        $.fn.dataTable.ext.errMode = 'none';
        $.fn.dataTable.ext.classes.sPageButton = 'page-link';
        // $.fn.dataTable.ext.classes.sTable = '';
        // $.fn.dataTable.ext.classes.sNoFooter = '';
        $('#faqsListTable').DataTable({
            destroy: true,
            // autoWidth: false,
            lengthMenu: [
                [5,10, 20, -1],
                [5,10, 20, "All"]
            ],
            "ajax": {
                "url": site_url + "gym/GymContentFaqs/ajaxLoadFaqs",
                "type": "POST",
                "dataSrc": function(data) {
                    var ctr = 0;
                    var name = "";
                    for (var i = 0; i < data.length; i++) {
                        ctr++;
                        var data_array = [];

                        data_array = JSON.stringify(data[i]).replace(/"/g, '&quot;');
                        data[i]["num"] = ctr;
                        var branchname = [];
                        for (var ii = 0; ii < data[i].Access.length; ii++) {
                            branchname.push(data[i].Access[ii].BranchName)
                        }
                        var FaqsStatus = data[i].FaqsStatus.toLowerCase().replace(/\b[a-z]/g, function(letter) {
                            return letter.toUpperCase();
                        });

                        var catarr = ['Equipment', 'Lifestyle', 'Services']
                        data[i]["branchname"] = branchname;
                        data[i]["active"] = FaqsStatus;
                        // data[i]["changepassword"] = "<button class='btn btn-warning changepass' data-obj='" + data_array + "' data-toggle='modal' data-target='#changepasswordModal'><i class='fa fa-key'></i> Change password</button>";
                        data[i]["edit"] = '<button class="btn btn-info user_action" data-action="edit_faqs" data-obj="'+data_array+'" data-toggle="modal" data-target="#GymContentFaqsModal"><i class="fa fa-edit"></i> Edit</button>';
                        data[i]["delete"] = '<button class="btn btn-danger user_action" data-action="delete_faqs" data-obj="'+data_array+'" data-toggle="modal" data-target="#GymContentFaqsModal"><i class="fa fa-times"></i> Deactivate</button>';
                        // data[i]["delete"] = "<button class='btn btn-danger user_action' data-action='delete_faqs' data-obj='" + data_array + "' data-toggle='modal' data-target='#GymContentFaqsModal'><i class='fa fa-times'></i> Deactivate</button>";
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
                {"data": "Question"},
                {"data": "Description"},
                {"data": "active"},
                {"data": "AddedDate"},
                {"data": "edit"},
                {"data": "delete"}
            ],
            "bInfo": false
        });
    }
    

    function loadAllusers() {
        const site_url = "<?php echo site_url();?>";
        $.ajax({
            type: 'POST',
            url: site_url + 'masterdata/MasterDataBulletinBoard/loadAllusers',
            dataType: "json",
            success: function(data) {
                var users_select = $('#entryfrom');
                users_select.empty();
                users_select.append('<option value="" selected disabled>Select...</option>');
                if (data.length > 0) {
                    for (var x = 0; x < data.length; x++) {
                        var firstlast = data[x].FirstName + " " + data[x].LastName
                        users_select.append('<option value=' + data[x].SysID + '>' + firstlast + '</option>');
                    }
                } else {
                    users_select.append('<option>No Result Found!</option>');
                    // call_alert_success(0,data.message,'1');
                }
            }
        });
    }

    function loadBranch(e) {
        const site_url = "<?php echo site_url();?>";

        $.ajax({
            type: 'POST',
            url: site_url + 'gym/GymContentPromo/loadBranch',
            dataType: "json",
            async: true,
            cache: false,
            contentType: false,
            enctype: 'multipart/form-data',
            processData: false,
            success: function(data) {
                var branch_select = $('select[name=showtobranch]');
                branch_select.empty();
                // branch_select.append('<option value="" selected disabled>Select...</option>');
                if (data.length > 0) {
                    branch_select.append('<option value="*" selected>All</option>');
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
                    for (var x = 0; x < data.length; x++) {
                        // branch_select.append('<option value='+ data[x].SysID+'>'+ data[x].BranchName  +'</option>');
                        branch_select.append('<option value=' + data[x].SysID + '>' + data[x].BranchName + '</option>');
                    }
                } else {
                    branch_select.append('<option>No Result Found!</option>');
                    // call_alert_success(0,data.message,'1');
                }
            }
        });
    }
</script>