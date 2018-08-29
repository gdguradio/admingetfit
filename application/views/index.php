<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!-- Left side column. contains the sidebar -->
    
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>GetFit247</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=site_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <!--<li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>-->
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">GetFit247</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">

          <!-- start carousel   -->
          <div class="c-wrapper">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                  <li data-target="#myCarousel" data-slide-to="1"></li>
                  <li data-target="#myCarousel" data-slide-to="2"></li>
                  <li data-target="#myCarousel" data-slide-to="3"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                  <div class="item active">
                    <img src="<?php echo site_url('assets/img/logo/logo1.png');?>" alt="User Image">
                    <div class="carousel-caption d-none d-md-block">
                      <h5>First Image Title</h5>
                      <p>First Image Description</p>
                    </div>
                  </div>

                  <div class="item">
                    <img src="<?php echo site_url('assets/img/logo/logo2.jpg');?>" alt="User Image">
                    <div class="carousel-caption d-none d-md-block">
                      <h5>Second Image Title</h5>
                      <p>Second Image Description</p>
                    </div>
                  </div>

                  <div class="item">
                    <img src="<?php echo site_url('assets/img/logo/logo3.png');?>" alt="Flower" class="img-responsive">
                    <div class="carousel-caption d-none d-md-block">
                      <h5>Third Image Title</h5>
                      <p>Third Image Description</p>
                    </div>
                  </div>

                  <div class="item">
                    <img src="<?php echo site_url('assets/img/logo/logo4.png');?>" alt="Flower" class="img-responsive">
                    <div class="carousel-caption d-none d-md-block">
                      <h5>Fourth Image Title</h5>
                      <p>Fourth Image Description</p>
                    </div>
                  </div>
                </div>

                <!-- Left and right controls -->
                <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                  <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                  <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
          </div>
          <br><br>
          <!-- end carousel -->
          
          <!-- inside getfit content start -->
          <!-- start news,announce,event -->
          <div class="container" id="bulletinboard">
            <div class="well">
                <div class="media">
                  <a class="pull-left" href="#">
                    <img class="media-object" src="http://placekitten.com/150/150">
                  </a>
                <div class="media-body">
                  <h4 class="media-heading">Receta 1</h4>
                    <p class="text-right">By Francisco</p>
                    <p>Lorem ipsum </p>
                    <ul class="list-inline list-unstyled">
                      <li>
                        <span>
                          <i class="glyphicon glyphicon-calendar"></i> 2 days, 8 hours 
                        </span>
                      </li>
                      <li>|</li>
                      <span><i class="glyphicon glyphicon-comment"></i> 2 comments</span>
                      <li>|</li>
                      <li>
                        <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star-empty"></span>
                      </li>
                      <li>|</li>
                      <li>
                      <!-- Use Font Awesome http://fortawesome.github.io/Font-Awesome/ -->
                        <span><i class="fa fa-facebook-square"></i></span>
                        <span><i class="fa fa-twitter-square"></i></span>
                        <span><i class="fa fa-google-plus-square"></i></span>
                      </li>
                    </ul>
                </div>
              </div>
            </div>
            <!-- <ul id="pagination-demo" class="pagination-lg pull-right"></ul> -->
            <div id="pager">
              <!-- <ul id="pagination" class="pagination-sm"></ul> -->
              <ul id="pagination" class="pagination-lg pull-right"></ul>
            </div>
          </div>
          <!-- end news,announce,event -->
          <!-- inside getfit content end -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
         
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
      <!-- start double box -->
      <div>
        <div class="row docs-premium-template" id="leftBoxContainer">
          <div class="col-sm-12 col-md-6" id="leftBoxContent">
            <div class="box box-solid">
              <div class="box-body">
                <h4 id="leftBoxContentHeader" style="background-color:#f7f7f7; font-size: 18px; text-align: center; padding: 7px 10px; margin-top: 0;">
                  
                </h4>
                <div class="media">
                  <div class="media-left">
                    <a href="#" class="ad-click-event">
                      <img src="" alt="MaterialPro" class="media-object" style="width: 150px;height: 100px;border-radius: 4px;box-shadow: 0 1px 3px rgba(0,0,0,.15);">
                    </a>
                  </div>
                  <div class="media-body">
                    <div class="clearfix">
                      <p class="pull-right">
                        <a href="#" class="btn btn-success btn-sm ad-click-event">LEARN MORE</a>
                      </p>
                      <h4 id="leftBoxContenttitle" style="margin-top: 0"></h4>
                      <p id="leftBoxContentdescription"></p>
                      <p style="margin-bottom: 0">
                        <i class="fa fa-shopping-cart margin-r5"></i> Order Product
                      </p>
                    </div>
                  </div>
                </div>
              </div> 
          </div>
        </div>
        <div class="col-sm-12 col-md-6" id="rightBoxContainer">
          <div class="box box-solid" id="rightBoxContent">
          <div class="box-body">
                <h4 id="rightBoxContentHeader" style="background-color:#f7f7f7; font-size: 18px; text-align: center; padding: 7px 10px; margin-top: 0;">
                  
                </h4>
                <div class="media">
                  <div class="media-left">
                    <a href="#" class="ad-click-event">
                      <img src="" alt="Ample Admin" class="media-object" style="width: 150px;height: 100px;border-radius: 4px;box-shadow: 0 1px 3px rgba(0,0,0,.15);">
                    </a>
                  </div>
                  <div class="media-body">
                    <div class="clearfix">
                      <p class="pull-right">
                        <a href="#" class="btn btn-success btn-sm ad-click-event">LEARN MORE</a>
                      </p>
                      <h4 id="rightBoxContenttitle" style="margin-top: 0"></h4>
                      <p id="rightBoxContentdescription"></p>
                      <p style="margin-bottom: 0">
                        <i class="fa fa-shopping-cart margin-r5"></i> Order Product
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>    
          </div>
        </div>
      </div>      
      <!-- end double box -->
    </section>
    <!-- /.content -->
  </div>
  
  <!-- /.content-wrapper -->
  <script src="<?=site_url();?>assets/custom_js/jquery.twbsPagination.min.js"></script>
<style>
  /* pagination style start  */
  .container {
  margin-top: 20px;
  }
  .page {
    display: none;
  }
  .page-active {
    display: block;
  }


  /* pagination style end */
  div.c-wrapper{
    width: 50%; /* for example */
    margin: auto;
  }
  .carousel-inner img {
    /* width: 100%; */
    margin: auto;
  }
  #myCarousel {
  margin-left: 50px;
  margin-right: 50px;
  background-color: #222d32;
  }

  /* .item img {
    margin-left: auto;
    margin-right: auto;
  } */

  .selected img {
    opacity:0.5;
  }

  .carousel-caption {
      position: relative;
      left: auto;
      right: auto;
  }

  .carousel-control.left,
  .carousel-control.right {
    background: none;
    border: none;
    
  }

  .carousel-control.left {
    margin-left: -25px;
  }

  .carousel-control.right {
    margin-right: -25px;
  }

  .carousel-control {
    width: 0%;
  }

  .glyphicon-chevron-left, 
  .glyphicon-chevron-right{
    color: red;
    font-size: 40px;
  }
  /* .carousel-indicators li {
      display: inline-block;
      width: 20px;
      height: 20px;
      margin: 3px;
      text-indent: 0;
      cursor: pointer;
      border: none;
      border-radius: 50%;
      background-color: orange;
      box-shadow: inset 1px 1px 1px 1px rgba(0,0,0,0.5);    
  } */
  /* .carousel-indicators .active {
      width: 20px;
      height: 20px;
      margin: 3px;
      background-color: red;
  } */
</style>  
<script>
   $(document).ready(function() {
    // Normalize Carousel Heights - pass in Bootstrap Carousel items.
    $.fn.carouselHeights = function() {

      var items = $(this), //grab all slides
        heights = [], //create empty array to store height values
        tallest; //create variable to make note of the tallest slide

      var normalizeHeights = function() {

        items.each(function() { //add heights to array
          heights.push($(this).height());
        });
        tallest = Math.max.apply(null, heights); //cache largest value
        items.each(function() {
          // console.log(tallest)
          $(this).css('min-height', tallest + 'px');
        });
      };

      normalizeHeights();

      $(window).on('resize orientationchange', function() {
        //reset vars
        tallest = 0;
        heights.length = 0;

        items.each(function() {
          $(this).css('min-height', '0'); //reset min-height
        });
        normalizeHeights(); //run it again 
      });

    };

    $('.carousel').carousel();
    $('.carousel-inner .item').carouselHeights();
    loadAdminImageGallery();
    loadAdminNewsEvents();
    loadTrainingImage();
    });
    function loadAdminNewsEvents(){
      var 
      totalRecords = 0,
      recPerPage = 10,
      records = [],
      totalPages = 0;
      var site_url = "<?php echo site_url();?>";
      $.ajax({
        type: 'POST',
        url: site_url + 'masterdata/MasterDataBulletinBoard/loadBulletinBoardFromAjax',
        dataType: "json",
        success: function(data) {
          // console.log(data)
          if (data.error === true) {

          } else {
            records = data;
            
            totalRecords = records.length;
            totalPages = Math.ceil(totalRecords / recPerPage);
            apply_pagination(totalPages,records,recPerPage);
            // generate_table(records);
          }
        }
      });
    }
    function generate_table(displayRecords) {
      var row;
      $('#bulletinboard .well').remove();
      var site_url = "<?php echo site_url();?>";
      var roleid = "<?php echo $this->session->userdata('roleID'); ?>";
      var branchid = "<?php echo $this->session->userdata('branchID'); ?>";
      for (var i = 0; i < displayRecords.length; i++) {
        // <img class="profile-user-img img-responsive img-circle" src="<?php //echo base_url('assets/UserPhoto/'.$photo); ?>" alt="User profile picture">
        // <img class="media-object" src="">
            var image = "";
            var fullname = displayRecords[i].EntryFrom[0].FirstName + " " + displayRecords[i].EntryFrom[0].LastName;
            displayRecords[i].EntryFrom[0].UserPhoto ? image =  site_url+'assets/UserPhoto/'+displayRecords[i].EntryFrom[0].UserPhoto : image =  site_url+'assets/UserPhoto/profile.png';
            
            var EntryType = displayRecords[i].EntryType.toLowerCase().replace(/\b[a-z]/g, function(letter) {
                return letter.toUpperCase();
            });
            if(displayRecords[i].Access != null){
              row = $('<div class="well"><div class="media"><a class="pull-left" href="#"><img class="media-object" src=" '+ image +' " ></a><div class="media-body"><h4 class="media-heading">'+displayRecords[i].EntryTitle+'</h4><p class="text-right">'+EntryType+'</p><p>'+displayRecords[i].EntryDescription+'</p><ul class="list-inline list-unstyled"><li><span><i class="glyphicon glyphicon-calendar"></i> '+displayRecords[i].AddedDate+' </span></li><li>|</li><span><i class="glyphicon glyphicon-comment"></i> '+ fullname +' </span><li>|</li><li><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star-empty"></span></li><li>|</li><li><span><i class="fa fa-facebook-square"></i></span><span><i class="fa fa-twitter-square"></i></span><span><i class="fa fa-google-plus-square"></i></span></li></div></div></div>');
            }
              
            $('#bulletinboard').prepend(row);
      }
    }
    
    function apply_pagination(totalPages,records,recPerPage,page) {
      console.log(records);
      var displayRecords = [],page = 1;
      var $pagination = $('#pagination');
      $pagination.twbsPagination({
            totalPages: totalPages,
            visiblePages: 5,
            onPageClick: function (event, page) {
                  displayRecordsIndex = Math.max(page - 1, 0) * recPerPage;
                  endRec = (displayRecordsIndex) + recPerPage;
                  
                  displayRecords = records.slice(displayRecordsIndex, endRec);
                  generate_table(displayRecords);
            }
      });
    }
    function loadTrainingImage(){
      var site_url = "<?php echo site_url();?>";
      var imageurl = "<?php echo site_url('assets/TrainingImage/');?>";
      $.ajax({
        type: 'POST',
        url: site_url + 'masterdata/MasterDataTrainingImage/loadTrainingImageFromAjax',
        dataType: "json",
        success: function(data) {
          // console.log(data)
          if (data.error === true) {

          } else {
            
            for (var x = 0; x < data.length; x++) {
              if (data[x].ImageCategory == 1) {
                var category = ["Training Machine","Training Products","Training Coaches","Training Locations"];
                var imagecategory= category[ parseInt(data[x].ImageCategory) - 1 ];
                $("#rightBoxContentHeader").text(imagecategory);
                $("#rightBoxContenttitle").text(imagecategory);
                $("#rightBoxContentdescription").text(data[x].ImageDescription);
                $("#rightBoxContent img").attr('src',imageurl + "" + data[x].ImageLink);
                // var image = "";
                // var category = ["Training Machine","Training Products","Training Coaches","Training Locations"];
                // var imagecategory= category[ parseInt(data[x].ImageCategory) - 1 ];
                // console.log(imageurl + "" + data[x].ImageLink)
                // image =
                // '<div class="box box-solid">'+
                // '  <div class="box-body">'+
                // '    <h4  style="background-color:#f7f7f7; font-size: 18px; text-align: center; padding: 7px 10px; margin-top: 0;">'+
                // '      '+imagecategory+''+
                // '    </h4>'+
                // '    <div class="media">'+
                // '      <div class="media-left">'+
                // '        <a href="#" class="ad-click-event">'+
                // '          <img src="'+ imageurl + "" + data[x].ImageLink +'" alt="'+data[x].ImageTitle+'" class="media-object" style="width: 150px;height: auto;border-radius: 4px;box-shadow: 0 1px 3px rgba(0,0,0,.15);"></a>'+
                // '      </div>'+
                // '      <div class="media-body">'+
                // '        <div class="clearfix">'+
                // '          <p class="pull-right">'+
                // '            <a href="#" class="btn btn-success btn-sm ad-click-event">LEARN MORE</a>'+
                // '          </p>'+
                // '          <h4 style="margin-top: 0">'+data[x].ImageDescription+'</h4>'+
                // '          <p>'+imagecategory+'</p>'+
                // '          <p style="margin-bottom: 0">'+
                // '            <i class="fa fa-shopping-cart margin-r5"></i> Order Product'+
                // '          </p>'+
                // '        </div>'+
                // '      </div>'+
                // '    </div>'+
                // '</div>';
                // $("#leftBoxContent").append(image);
              } 
              if (data[x].ImageCategory == 4) {
                var category = ["Training Machine","Training Products","Training Coaches","Training Locations"];
                var imagecategory= category[ parseInt(data[x].ImageCategory) - 1 ];
                $("#leftBoxContentHeader").text(imagecategory);
                $("#leftBoxContenttitle").text(imagecategory);
                $("#leftBoxContentdescription").text(data[x].ImageDescription);
                $("#leftBoxContent img").attr('src',imageurl + "" + data[x].ImageLink);
                // var image = "";
                // var category = ["Training Machine","Training Products","Training Coaches","Training Locations"];
                // var imagecategory= category[ parseInt(data[x].ImageCategory) - 1 ];
                // console.log(imageurl + "" + data[x].ImageLink)
                // image =
                // '<div class="box box-solid">'+
                // '  <div class="box-body">'+
                // '    <h4  style="background-color:#f7f7f7; font-size: 18px; text-align: center; padding: 7px 10px; margin-top: 0;">'+
                // '      '+imagecategory+''+
                // '    </h4>'+
                // '    <div class="media">'+
                // '      <div class="media-left">'+
                // '        <a href="#" class="ad-click-event">'+
                // '          <img src="'+ imageurl + "" + data[x].ImageLink +'" alt="'+data[x].ImageTitle+'" class="media-object" style="width: 150px;height: auto;border-radius: 4px;box-shadow: 0 1px 3px rgba(0,0,0,.15);"></a>'+
                // '      </div>'+
                // '      <div class="media-body">'+
                // '        <div class="clearfix">'+
                // '          <p class="pull-right">'+
                // '            <a href="#" class="btn btn-success btn-sm ad-click-event">LEARN MORE</a>'+
                // '          </p>'+
                // '          <h4 style="margin-top: 0">'+data[x].ImageDescription+'</h4>'+
                // '          <p>'+imagecategory+'</p>'+
                // '          <p style="margin-bottom: 0">'+
                // '            <i class="fa fa-shopping-cart margin-r5"></i> Order Product'+
                // '          </p>'+
                // '        </div>'+
                // '      </div>'+
                // '    </div>'+
                // '</div>';
                // $("#leftBoxContent").append(image);
              }
              
            }
            
          }
        }
      });
    }
    function loadAdminImageGallery() {
      var site_url = "<?php echo site_url();?>";
      var imageurl = "<?php echo site_url('assets/AdminImageGallery/');?>";
      $.ajax({
        type: 'POST',
        url: site_url + 'masterdata/MasterDataAdminImageGallery/loadAdminImageGalleryFromAjax',
        dataType: "json",
        success: function(data) {
          // console.log(data)
          if (data.error === true) {

          } else {
            $(".carousel-inner").empty();
            $(".carousel-indicators").empty();
            var imagegallery = "";
            var imagegallerylink = "";
            for (var x = 0; x < data.length; x++) {
              
              if (x == 0) {
                imagegallerylink = "<li data-target='#myCarousel' data-slide-to='" + x + "' class='active'></li>"
                imagegallery =
                  "<div class='item active'>" +
                  "<img src='" + imageurl + "" + data[x].ImageLink + "' alt='" + data[x].ImageTitle + "'>" +
                  "<div class='carousel-caption d-none d-md-block'>" +
                  "<h5>" + data[x].ImageTitle + "</h5>" +
                  "<p>" + data[x].ImageDescription + "</p>" +
                  "</div>" +
                  "</div>";
              } else {
                imagegallerylink = "<li data-target='#myCarousel' data-slide-to='" + x + "'></li>"
                imagegallery =
                  "<div class='item '>" +
                  "<img src='" + imageurl + "" + data[x].ImageLink + "' alt='" + data[x].ImageTitle + "'>" +
                  "<div class='carousel-caption d-none d-md-block'>" +
                  "<h5>" + data[x].ImageTitle + "</h5>" +
                  "<p>" + data[x].ImageDescription + "</p>" +
                  "</div>" +
                  "</div>";
              }

              $(".carousel-inner").append(imagegallery);
              $(".carousel-indicators").append(imagegallerylink);
            }
          }
        }
      });
    }
</script>