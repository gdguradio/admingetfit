<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!-- Left side column. contains the sidebar -->

    
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?=str_replace('_', ' ', $title);?>
        <small>Register Role Information</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=site_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?= site_url('masterdatarole/MasterDataRole/rolelist') ?>"><i class="fa fa-list"></i> Role List</a></li>
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
            <form role="form" id="registerRole">
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
                    <label for="rolename">Role name <span class="tcolor_red">*</span></label>
                  <input type="text" class="form-control" id="rolename" placeholder="Enter Role name">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" class="form-control" id="description" placeholder="Enter Description">
                  </div>
                <div class="form-group">
                    <label for="branchname">Select Access Right <span class="tcolor_red">*</span></label>
                    <select class="form-control" name="branchname" id="branchname">
                        <option value="1">Read Only</option>   
                        <option value="2">Write Only</option>  
                        <option value="3">Read and Write</option>            
                    </select>
                </div>  
                
               

              <!-- start menu list     -->

                <div class="form-group">
                    <label for="role_menu">Role Menu</label>
                    <div class="row">
                        <div class="col-md-6">
                            <?php foreach($menu as $i):?>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input menu_list" id="menu_<?=$i->sys_id?>" type="checkbox" data-level="menu" data-link="<?=$i->link?>" value="<?=$i->sys_id?>">
                                    <label class="form-check-label label-checkbox"><?=$i->name?></label>
                                </div>
                                <?php if($i->has_child == 'yes'): ?>
                                    <?php foreach($i->child_list as $j):?>
                                        <div class="form-check form-check-inline checkbox-midparent">
                                            <input class="form-check-input menu_list" data-parent="menu_<?=$i->sys_id?>" id="submenu_<?=$j->sys_id?>" type="checkbox" data-level="submenu" data-link="<?=$j->link?>" value="<?=$j->sys_id?>">
                                            <label class="form-check-label label-checkbox"><?=$j->name?></label>
                                        </div>
                                        <?php if($j->has_child == 'yes'): ?>
                                            <?php foreach($j->child_list as $k):?>
                                                <div class="form-check form-check-inline checkbox-child">
                                                    <input class="form-check-input menu_list" data-parent="menu_<?=$i->sys_id?>" data-parent2="submenu_<?=$j->sys_id?>" id="screen_<?=$k->sys_id?>" type="checkbox" data-level="screen" data-link="<?=$k->link?>" value="<?=$k->sys_id?>">
                                                    <label class="form-check-label label-checkbox"><?=$k->name?></label>
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


              <!-- end menu list   -->
                
                
                
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary" id="btn_submit">Submit</button>
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
      $('#registerRole').submit(regiterMainLogin);
    });
    
    
    
    function regiterMainLogin(e){
        e.preventDefault();
        const formData = new FormData();
        const site_url = "<?php echo site_url();?>";

        const target = e.target;
        const firstname = target.querySelector('#rolename').value;
        const lastname = target.querySelector('#description').value;
        
        formData.append('rolename',rolename);
        formData.append('description',description);
        
        $.ajax({
            type:'POST',
            url: site_url + 'masterdatarole/insertMasterDataRoleFromAjax',
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
    
 
</script>