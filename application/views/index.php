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
          <!-- end carousel -->

          <!-- inside getfit content start -->
          
          <!-- inside getfit content end -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
         
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<style>
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
  .carousel-indicators li {
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
  }
  .carousel-indicators .active {
      width: 20px;
      height: 20px;
      margin: 3px;
      background-color: red;
  }
</style>  
<script>
   $(document).ready(function(){
     
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
              console.log(tallest)
              $(this).css('min-height',tallest + 'px');
          });
      };

      normalizeHeights();

      $(window).on('resize orientationchange', function () {
          //reset vars
          tallest = 0;
          heights.length = 0;

          items.each(function() {
              $(this).css('min-height','0'); //reset min-height
          }); 
          normalizeHeights(); //run it again 
      });

      };
    
    $('.carousel').carousel();
    $('.carousel-inner .item').carouselHeights();
    loadAdminImageGallery();


  });
  function loadAdminImageGallery(){
    var site_url = "<?php echo site_url();?>";
    var imageurl = "<?php echo site_url('assets/AdminImageGallery/');?>";
    $.ajax({
      type:'POST',
      url: site_url+'masterdata/MasterDataAdminImageGallery/loadAdminImageGalleryFromAjax',
      dataType:"json",
      success:function(data){
        console.log(data)
        if(data.error === true){
          
        }else{
          $(".carousel-inner").empty();
          $(".carousel-indicators").empty();
          var imagegallery = "";
          var imagegallerylink = "";
          for(var x = 0; x < data.length; x++){
            if(x ==0){
              imagegallerylink = "<li data-target='#myCarousel' data-slide-to='"+x+"' class='active'></li>"
              imagegallery = 
              "<div class='item active'>"+
                "<img src='"+imageurl+""+data[x].ImageLink+"' alt='"+data[x].ImageTitle+"'>"+
                "<div class='carousel-caption d-none d-md-block'>"+
                "<h5>"+data[x].ImageTitle+"</h5>"+
                "<p>"+data[x].ImageDescription+"</p>"+
                "</div>"+
              "</div>";
            }else{
              imagegallerylink = "<li data-target='#myCarousel' data-slide-to='"+x+"'></li>"
              imagegallery = 
              "<div class='item '>"+
                  "<img src='"+imageurl+""+data[x].ImageLink+"' alt='"+data[x].ImageTitle+"'>"+
                  "<div class='carousel-caption d-none d-md-block'>"+
                  "<h5>"+data[x].ImageTitle+"</h5>"+
                  "<p>"+data[x].ImageDescription+"</p>"+
                  "</div>"+
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