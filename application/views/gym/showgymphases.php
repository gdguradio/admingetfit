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
        <small>GymPhase</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=site_url().''.'Welcome';?>"><i class="fa fa-dashboard"></i>Home</a></li>
        <!-- <li><a href="#" data-toggle='modal' data-target='#GymContentModal'><i class="fa fa-keyboard-o"></i>Promo</a></li> -->
      </ol>
    </section>

    <!-- Main content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-8 col-xs-9 bhoechie-tab-container">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 bhoechie-tab-menu">
                    <div class="list-group">
                        <a href="#" class="list-group-item active text-center">
                        <h4 class="glyphicon glyphicon-plane"></h4><br/>Flight
                        </a>
                        <a href="#" class="list-group-item text-center">
                        <h4 class="glyphicon glyphicon-road"></h4><br/>Train
                        </a>
                        <a href="#" class="list-group-item text-center">
                        <h4 class="glyphicon glyphicon-home"></h4><br/>Hotel
                        </a>
                        <a href="#" class="list-group-item text-center">
                        <h4 class="glyphicon glyphicon-cutlery"></h4><br/>Restaurant
                        </a>
                        <a href="#" class="list-group-item text-center">
                        <h4 class="glyphicon glyphicon-credit-card"></h4><br/>Credit Card
                        </a>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 bhoechie-tab">
                    <!-- flight section -->
                    <div class="bhoechie-tab-content active">
                        <center>
                        <h1 class="glyphicon glyphicon-plane" style="font-size:14em;color:#55518a"></h1>
                        <h2 style="margin-top: 0;color:#55518a">Cooming Soon</h2>
                        <h3 style="margin-top: 0;color:#55518a">Flight Reservation</h3>
                        </center>
                    </div>
                    <!-- train section -->
                    <div class="bhoechie-tab-content">
                        <center>
                        <h1 class="glyphicon glyphicon-road" style="font-size:12em;color:#55518a"></h1>
                        <h2 style="margin-top: 0;color:#55518a">Cooming Soon</h2>
                        <h3 style="margin-top: 0;color:#55518a">Train Reservation</h3>
                        </center>
                    </div>
        
                    <!-- hotel search -->
                    <div class="bhoechie-tab-content">
                        <center>
                        <h1 class="glyphicon glyphicon-home" style="font-size:12em;color:#55518a"></h1>
                        <h2 style="margin-top: 0;color:#55518a">Cooming Soon</h2>
                        <h3 style="margin-top: 0;color:#55518a">Hotel Directory</h3>
                        </center>
                    </div>
                    <div class="bhoechie-tab-content">
                        <center>
                        <h1 class="glyphicon glyphicon-cutlery" style="font-size:12em;color:#55518a"></h1>
                        <h2 style="margin-top: 0;color:#55518a">Cooming Soon</h2>
                        <h3 style="margin-top: 0;color:#55518a">Restaurant Diirectory</h3>
                        </center>
                    </div>
                    <div class="bhoechie-tab-content">
                        <center>
                        <h1 class="glyphicon glyphicon-credit-card" style="font-size:12em;color:#55518a"></h1>
                        <h2 style="margin-top: 0;color:#55518a">Cooming Soon</h2>
                        <h3 style="margin-top: 0;color:#55518a">Credit Card</h3>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>
    



    <!-- Main content -->
  </div>
  <!-- /.content-wrapper -->


  
  
    
<script src="<?=site_url();?>assets/adminlte/bower_components/moment/min/moment.min.js"></script>
<script src="<?=site_url();?>assets/adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>  
<script src="<?=site_url();?>assets/adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?=site_url();?>assets/adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<style>
    
    /*  bhoechie tab */
    div.bhoechie-tab-container{
        z-index: 10;
        height: 100%;
        width: 100%;
        background-color: #ffffff;
        padding: 0 !important;
        border-radius: 4px;
        -moz-border-radius: 4px;
        border:1px solid #ddd;
        margin-top: 20px;
        margin-left: 50px;
        -webkit-box-shadow: 0 6px 12px rgba(0,0,0,.175);
        box-shadow: 0 6px 12px rgba(0,0,0,.175);
        -moz-box-shadow: 0 6px 12px rgba(0,0,0,.175);
        background-clip: padding-box;
        opacity: 0.97;
        filter: alpha(opacity=97);
    }
    div.bhoechie-tab-menu{
        padding-right: 0;
        padding-left: 0;
        padding-bottom: 0;
    }
    div.bhoechie-tab-menu div.list-group{
        margin-bottom: 0;
    }
    div.bhoechie-tab-menu div.list-group>a{
        margin-bottom: 0;
    }
    div.bhoechie-tab-menu div.list-group>a .glyphicon,
    div.bhoechie-tab-menu div.list-group>a .fa {
        color: #5A55A3;
    }
    div.bhoechie-tab-menu div.list-group>a:first-child{
        border-top-right-radius: 0;
        -moz-border-top-right-radius: 0;
    }
    div.bhoechie-tab-menu div.list-group>a:last-child{
        border-bottom-right-radius: 0;
        -moz-border-bottom-right-radius: 0;
    }
    div.bhoechie-tab-menu div.list-group>a.active,
    div.bhoechie-tab-menu div.list-group>a.active .glyphicon,
    div.bhoechie-tab-menu div.list-group>a.active .fa{
        background-color: #5A55A3;
        background-image: #5A55A3;
        color: #ffffff;
    }
    div.bhoechie-tab-menu div.list-group>a.active:after{
        content: '';
        position: absolute;
        left: 100%;
        top: 50%;
        margin-top: -13px;
        border-left: 0;
        border-bottom: 13px solid transparent;
        border-top: 13px solid transparent;
        border-left: 10px solid #5A55A3;
    }

    div.bhoechie-tab-content{
        background-color: #ffffff;
        /* border: 1px solid #eeeeee; */
        padding-left: 20px;
        padding-top: 10px;
    }

    div.bhoechie-tab div.bhoechie-tab-content:not(.active){
        display: none;
    }
    .list-group-item.text-center.sub{
        display: none;
    }
    img {
        max-width:100%;
    }
</style>
<script>
    $(document).ready(function() {

        loadPhases();
        $("div.bhoechie-tab-menu>div.list-group").on("click",">a",function(e) {
            e.preventDefault();
            $(this).siblings('a.active').removeClass("active");
            $(this).addClass("active");
            var $thismenu = $(this).attr('data-menuid');
            var $thishassub = $(this).attr('data-hassub');
            var $thislevel = $(this).attr('data-level');
            
            if($thislevel.toLowerCase() == 'main'){
                $(".list-group-item.text-center.sub").hide();
                if($thishassub.toLowerCase() == 'yes' ){
                    $(this).nextUntil(".list-group-item[data-level='main']").css('display','block');
                }
            }

            $("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
            $("div.bhoechie-tab>div.bhoechie-tab-content[data-contentid="+$thismenu+"]").addClass("active");

            // var index = $(this).index();
            // console.log(e.target)
            // $("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
            // $("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");
        });
    });
    function loadPhases(){
        var site_url = '<?=site_url()?>';
        $.ajax({
            type: 'POST',
            url: site_url + 'gym/ShowGymPhases/ajaxLoadPhases',
            dataType: "json",
            success: function(data) {
                
                $thismanu = $(".bhoechie-tab-menu .list-group");
                $thiscontent = $(".bhoechie-tab");
                $thismanu.empty();
                $thiscontent.empty();

                for(var i = 0; i < data.length; i++){
                    var activeclass = "active";
                    var hassub = "";
                    var document = "";
                    var subdocument = "";
                    var documenttype = "";
                    var subdocumenttype = "";
                    var mainfold = "<?php echo site_url('assets/MainGymPhase/');?>";
                    var subfold  = "<?php echo site_url('assets/MainSubGymPhase/');?>";
                    var subdata = data[i].SubPhases;
                    i == 0 ? activeclass = "active" : activeclass = "";
                    if(data[i].Access != null){
                        var documenttype = data[i].DocumentLink.substring(data[i].DocumentLink.lastIndexOf('.')+1, data[i].DocumentLink.length) || data[i].DocumentLink;
                        if(documenttype == "pdf"){
                            document = '<a href="'+mainfold+''+data[i].DocumentLink+'" target="_blank">Show '+data[i].PhaseName+'</a>';
                        }else{
                            document = '<img src="'+mainfold+''+data[i].DocumentLink+'" />';
                        }

                        // $thismanu.append('<a href="#" class="list-group-item '+activeclass+' text-center" data-level="main" data-menuid='+data[i].sysID+' data-hassub='+data[i].HasSub+'><h4 class="glyphicon glyphicon-plane"></h4><br/>'+data[i].PhaseName+'</a>');
                        // $thiscontent.append('<div class="bhoechie-tab-content '+activeclass+'" data-level="main" data-contentid='+data[i].sysID+'><center><h1 class="glyphicon glyphicon-plane" style="font-size:14em;color:#55518a"></h1><h2 style="margin-top: 0;color:#55518a">'+data[i].Description+'</h2><h3 style="margin-top: 0;color:#55518a">Flight Reservation</h3></center></div>');
                        // console.log(data[i].HasSub.toLowerCase())
                        $thismanu.append('<a href="#" class="list-group-item '+activeclass+' text-center" data-level="main" data-menuid='+data[i].sysID+' data-hassub='+data[i].HasSub+'></h4><br/>'+data[i].PhaseName+'</a>');
                        $thiscontent.append('<div class="bhoechie-tab-content '+activeclass+'" data-level="main" data-contentid='+data[i].sysID+'><center>'+document+'</h1><h2 style="margin-top: 0;color:#55518a">'+data[i].Description+'</h2><h3 style="margin-top: 0;color:#55518a">Flight Reservation</h3></center></div>');
                        
                        if(data[i].HasSub.toLowerCase() == 'yes' && subdata != null){
                            for(var x = 0; x < subdata.length; x++){
                                if(subdata[x].Access != null){
                                    var subdocumenttype = subdata[x].DocumentLink.substring(subdata[x].DocumentLink.lastIndexOf('.')+1, subdata[x].DocumentLink.length) || subdata[x].DocumentLink;
                                    if(subdocumenttype == "pdf"){
                                        subdocument = '<a href="'+subfold+''+subdata[x].DocumentLink+'" target="_blank">Show '+subdata[x].PhaseName+'</a>';
                                    }else{
                                        subdocument = '<img src="'+subfold+''+subdata[x].DocumentLink+'" />';
                                    }
                                    $thismanu.append('<a href="#" class="list-group-item text-center sub" data-level="sub" data-menuid='+subdata[x].sysID+' ></h4><br/>'+subdata[x].PhaseName+'</a>');
                                    $thiscontent.append('<div class="bhoechie-tab-content sub" data-level="sub" data-contentid='+subdata[x].sysID+'><center>'+subdocument+'<h2 style="margin-top: 0;color:#55518a">'+subdata[x].Description+'</h2><h3 style="margin-top: 0;color:#55518a">'+subdata[x].Details+'</h3></center></div>');
                                }
                            }
                        }
                    }  
                    
                }
            }
        });
    }
</script>