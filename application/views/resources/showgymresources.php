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
        <small>Resources</small>
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
                        <a href="#" class="list-group-item active text-center" data-data="marketing">
                        <h4 class="glyphicon glyphicon-credit-card"></h4><br/>Marketing
                        </a>
                        <a href="#" class="list-group-item text-center" data-data="campaign">
                        <h4 class="glyphicon glyphicon-bullhorn"></h4><br/>Campaings
                        </a>
                        <a href="#" class="list-group-item text-center" data-data="assetsartwork">
                        <h4 class="glyphicon glyphicon-picture"></h4><br/>Assets and Artwork
                        </a>
                        <a href="#" class="list-group-item text-center" data-data="digitalsocialmedia">
                        <h4 class="glyphicon glyphicon-facetime-video"></h4><br/>Digital and Social Medial
                        </a>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 bhoechie-tab">
                    <div class="bhoechie-tab-content active" data-data="marketing">
                        
                    </div>
                    <div class="bhoechie-tab-content" data-data="campaign">
                    <center>
                        <h1 class="glyphicon glyphicon-home" style="font-size:12em;color:#55518a"></h1>
                        <h2 style="margin-top: 0;color:#55518a">Cooming Soon</h2>
                        <h3 style="margin-top: 0;color:#55518a">Hotel Directory</h3>
                        </center>
                    </div>
        
                    <div class="bhoechie-tab-content" data-data="assetsartwork">

                    </div>

                    <div class="bhoechie-tab-content" data-data="digitalsocialmedia">

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
    div.listbar{
        z-index: 10;
        height: 100%;
        width: 100%;
        background-color: #ffffff;
        padding: 0 !important;
        border-radius: 4px;
        -moz-border-radius: 4px;
        border:1px solid #ddd;
        margin-top: 10px;
        margin-bottom: 10px;
        /* margin-left: 50px; */
        -webkit-box-shadow: 0 6px 12px rgba(0,0,0,.175);
        box-shadow: 0 6px 12px rgba(0,0,0,.175);
        -moz-box-shadow: 0 6px 12px rgba(0,0,0,.175);
        background-clip: padding-box;
        opacity: 0.97;
        filter: alpha(opacity=97);
    }
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
        /* color: #5A55A3; */
        color: #333;
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
        /* background-color: #5A55A3;
        background-image: #5A55A3; */
        background-color: #333;
        background-image: #333;
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
        /* border-left: 10px solid #5A55A3; */
        border-left: 10px solid #333;
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

        loadResources();


        $(".bhoechie-tab-content").on('click','.emailLink', function (event) {
            // event.preventDefault();
            var email = $(this).text();
            var subject = $(this).closest('center').find('h2').text();
            var emailBody = ' ';
            $(this).attr('href', 'mailto:' + email + '?subject=' + subject + '&body=' +   emailBody);
        });
        $("div.bhoechie-tab-menu>div.list-group").on("click",">a",function(e) {
            e.preventDefault();
            $(this).siblings('a.active').removeClass("active");
            $(this).addClass("active");
            // var $thismenu = $(this).attr('data-menuid');
            // var $thishassub = $(this).attr('data-hassub');
            // var $thislevel = $(this).attr('data-level');
            
            // if($thislevel.toLowerCase() == 'main'){
            //     $(".list-group-item.text-center.sub").hide();
            //     if($thishassub.toLowerCase() == 'yes' ){
            //         $(this).nextUntil(".list-group-item[data-level='main']").css('display','block');
            //     }
            // }

            // $("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
            // $("div.bhoechie-tab>div.bhoechie-tab-content[data-contentid="+$thismenu+"]").addClass("active");

            var index = $(this).index();
            console.log(index)
            $("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
            $("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");
        });
    });
    function loadResources(){
        var site_url = '<?=site_url()?>';
        $.ajax({
            type: 'POST',
            url: site_url + 'resources/ShowGymResources/ajaxLoadResources',
            dataType: "json",
            success: function(data) {
                
                $thismanu = $(".bhoechie-tab-menu .list-group");
                $thismarketingcontent = $(".bhoechie-tab div[data-data='marketing']");
                $thiscampaigncontent = $(".bhoechie-tab div[data-data='campaign']");
                $thisassetsartworkcontent = $(".bhoechie-tab div[data-data='assetsartwork']");
                $thisdigitalsocialmediacontent = $(".bhoechie-tab div[data-data='digitalsocialmedia']");
                // $thismanu.empty();
                // $thiscontent.empty();

                for(var i = 0; i < data.length; i++){

                    var marketing = "";
                    var marketingtype = "";

                    var campaign = "";
                    var campaigntype = "";

                    var assetsartwork = "";
                    var assetsartworktype = "";

                    var digitalsocialmedia = "";
                    var digitalsocialmediatype = "";


                    
                    var marketingfold = "<?php echo site_url('assets/GymResourceMarketing/');?>";
                    var campaignfold  = "<?php echo site_url('assets/GymResourceCampaign/');?>";
                    var assetsartworkfold  = "<?php echo site_url('assets/GymResourceAssetsArtwork/');?>";
                    var digitalsocialmediafold  = "<?php echo site_url('assets/GymResourceDigitalSocialMedia/');?>";
                    
                    var marketingarr = data[i].Marketing;
                    if(marketing != null){
                        for(var x = 0; x < marketingarr.length; x++){
                            var $thisqueryinfo = "";
                            var branch = marketingarr[x].BranchName
                            if(marketingarr[x].QueryInformation == 1 ){
                                for(var y = 0; y < branch.length; y++){
                                    $thisqueryinfo = "Please email <a href='#' name='emailLink' class='emailLink'>" + branch[y].EmailAddress + "</a> if you have any queries."
                                }
                            }


                            if(marketingarr[x].Access != null){
                                var marketingtype = marketingarr[x].DocumentLink.substring(marketingarr[x].DocumentLink.lastIndexOf('.')+1, marketingarr[x].DocumentLink.length) || marketingarr[x].DocumentLink;
                                if(marketingtype == "pdf"){
                                    marketing = '<a href="'+marketingfold+''+marketingarr[x].DocumentLink+'" target="_blank">Show '+marketingarr[x].ResourcesMarketingName+'</a>';
                                }else{
                                    marketing = '<img src="'+marketingfold+''+marketingarr[x].DocumentLink+'" />';
                                }
                                
                                $thismarketingcontent.append('<center>'+marketing+'<h2 style="margin-top: 0;color:#1a2226">'+marketingarr[x].Description+'</h2><h3 style="margin-top: 0;color:#1a2226">'+ $thisqueryinfo +'</h3></center><div class="listbar"></div>');
                            }
                        }
                    }
                    var campaignarr = data[i].Campaign;
                    if(campaign != null){
                        for(var x = 0; x < campaign.length; x++){
                            if(campaignarr[x].Access != null){
                                var campaigntype = campaignarr[x].DocumentLink.substring(campaignarr[x].DocumentLink.lastIndexOf('.')+1, campaignarr[x].DocumentLink.length) || campaignarr[x].DocumentLink;
                                if(campaigntype == "pdf"){
                                    campaign = '<a href="'+campaignfold+''+campaignarr[x].DocumentLink+'" target="_blank">Show '+campaignarr[x].ResourcesCampaignName+'</a>';
                                }else{
                                    campaign = '<img src="'+campaignfold+''+campaignarr[x].DocumentLink+'" />';
                                }
                                $thiscampaigncontent.append('<center>'+campaign+'<h2 style="margin-top: 0;color:#1a2226">'+campaignarr[x].Description+'</h2><h3 style="margin-top: 0;color:#1a2226">'+campaignarr[x].Details+'</h3></center>');
                            }
                        }
                    }

                    var assetsartworkarr = data[i].AssetsArtwork;
                    if(assetsartworkarr != null){
                        for(var x = 0; x < assetsartworkarr.length; x++){
                            if(assetsartworkarr[x].Access != null){
                                var assetsartworktype = assetsartworkarr[x].DocumentLink.substring(assetsartworkarr[x].DocumentLink.lastIndexOf('.')+1, assetsartworkarr[x].DocumentLink.length) || assetsartworkarr[x].DocumentLink;
                                if(assetsartworktype == "pdf"){
                                    assetsartwork = '<a href="'+assetsartworkfold+''+assetsartworkarr[x].DocumentLink+'" target="_blank">Show '+assetsartworkarr[x].ResourcesAssetsArtworkName+'</a>';
                                }else{
                                    assetsartwork = '<img src="'+assetsartworkfold+''+assetsartworkarr[x].DocumentLink+'" />';
                                }
                                $thisassetsartworkcontent.append('<center>'+assetsartwork+'<h2 style="margin-top: 0;color:#1a2226">'+assetsartworkarr[x].Description+'</h2><h3 style="margin-top: 0;color:#1a2226">'+assetsartworkarr[x].Details+'</h3></center>');
                            }
                        }
                    }

                    var digitalsocialmediaarr = data[i].DigitalSocialMedia;
                    if(digitalsocialmediaarr != null){
                        for(var x = 0; x < digitalsocialmediaarr.length; x++){
                            if(digitalsocialmediaarr[x].Access != null){
                                var digitalsocialmediatype = digitalsocialmediaarr[x].DocumentLink.substring(digitalsocialmediaarr[x].DocumentLink.lastIndexOf('.')+1, digitalsocialmediaarr[x].DocumentLink.length) || digitalsocialmedia[x].DocumentLink;
                                if(digitalsocialmediatype == "pdf"){
                                    digitalsocialmedia = '<a href="'+digitalsocialmediafold+''+digitalsocialmediaarr[x].DocumentLink+'" target="_blank">Show '+digitalsocialmediaarr[x].ResourcesDigitalSocialMediaName+'</a>';
                                }else{
                                    digitalsocialmedia = '<img src="'+digitalsocialmediafold+''+digitalsocialmediaarr[x].DocumentLink+'" />';
                                }
                                $thisdigitalsocialmediacontent.append('<center>'+digitalsocialmedia+'<h2 style="margin-top: 0;color:#1a2226">'+digitalsocialmediaarr[x].Description+'</h2><h3 style="margin-top: 0;color:#1a2226">'+digitalsocialmediaarr[x].Details+'</h3></center>');
                            }
                        }
                    }















                    // if(data[i].Access != null){
                    //     var marketingtype = data[i].DocumentLink.substring(data[i].DocumentLink.lastIndexOf('.')+1, data[i].DocumentLink.length) || data[i].DocumentLink;
                    //     if(marketingtype == "pdf"){
                    //         marketing = '<a href="'+mainfold+''+data[i].DocumentLink+'" target="_blank">Show '+data[i].PhaseName+'</a>';
                    //     }else{
                    //         marketing = '<img src="'+mainfold+''+data[i].DocumentLink+'" />';
                    //     }

                    //     $thiscontent.append('<div class="bhoechie-tab-content '+activeclass+'" data-level="main" data-contentid='+data[i].sysID+'><center>'+marketing+'</h1><h2 style="margin-top: 0;color:#1a2226">'+data[i].Description+'</h2><h3 style="margin-top: 0;color:#1a2226">Flight Reservation</h3></center></div>');
                        
                    // }  
                    
                }
            }
        });
    }
</script>