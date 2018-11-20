<?=@$content?>

<div class="container mainarea">
  
</div>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css">

<div class="jumbotron jumbotron-fluid jumbotron-main"><script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script> 
<script src="https://threejs.org/examples/js/libs/stats.min.js"></script>
    <div id="particles-js">
	<canvas class="particles-js-canvas-el" width="1409" height="319" style="width: 100%; height: 100%;"></canvas>
	</div>
        <div class="container center-vertically-holder" style="margin-top:-20px;">
            <div class="row center-vertically">
                <div class="col-md-8 offset-sm-0 offset-md-2 text-center" style="margin-top:100px;margin-bottom:100px;">
                    <h1><?=$this->profile['business_name']?><br><br></h1>
                    <hr style="border-top:1px;color:rgba(255,255,255,0.9);width:60%;margin:0px;margin-top:-50px;margin-bottom:10px;margin-left:20%;">
                    <p><br><?= $this->profile['moto'] ?></p>
                    <p><?= $this->profile['about'] ?><br><br></p>
                </div>
            </div>
        </div>
  <!-- <div class="carousel slide" data-ride="carousel" id="carousel-1">
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active"><img class="w-100 d-block" src="<?php echo base_url('assets')?>/img/baneer1.jpg" alt="Slide Image"></div>
                <div class="carousel-item"><img class="w-100 d-block" src="<?php echo base_url('assets')?>/img/banner2.png" alt="Slide Image"></div>
                <div class="carousel-item"><img class="w-100 d-block" src="<?php echo base_url('assets')?>/img/banner3.jpg" alt="Slide Image"></div>
                <div class="carousel-item"><img class="w-100 d-block" src="<?php echo base_url('assets')?>/img/banner4.jpg" alt="Slide Image"></div>
            </div>
            <div><a class="carousel-control-prev" href="#carousel-1" role="button" data-slide="prev"><span class="carousel-control-prev-icon"></span><span class="sr-only">Previous</span></a><a class="carousel-control-next" href="#carousel-1" role="button"
                    data-slide="next"><span class="carousel-control-next-icon"></span><span class="sr-only">Next</span></a></div>
            <ol class="carousel-indicators">
                <li data-target="#carousel-1" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-1" data-slide-to="1"></li>
                <li data-target="#carousel-1" data-slide-to="2"></li>
            </ol>
        </div> -->
    </div>

    <div class="features-boxed">
        <div class="container">
            <div class="intro">
                <h2 class="text-center" style="">Courses </h2>
                <p class="text-center">Nunc luctus in metus eget fringilla. Aliquam sed justo ligula. Vestibulum nibh erat, pellentesque ut laoreet vitae.</p>
            </div>
            <div class="row justify-content-center features">
            <?php 
                $bl=$this->db->get('courses','6');
                foreach ($bl->result() as $crow){
            ?>
                <div class="col-sm-6 col-md-5 col-lg-4 item">
                    <div class="box "><i class="fa fa-map-marker icon"></i>
                        <h3 class="name"><?= $crow->title ?></h3>
                        <p class="description"><?= $crow->name ?></p>
                        <a href="<?=site_url('courses/view/'.$crow->c_id)?>" class="btn btn-block">Link</a>
                        </div>
                </div>
              <?php }?>
            </div>
        </div>
    </div>
    <div class="article-list">
        <div class="container">
            <div class="intro">
                <h2 class="text-center">Latest Articles</h2>
                <p class="text-center">Nunc luctus in metus eget fringilla. Aliquam sed justo ligula. Vestibulum nibh erat, pellentesque ut laoreet vitae. </p>
            </div>
            <div class="row articles">
                <div class="col-sm-6 col-md-4 item"><a href="#"><img class="img-fluid" src="<?php echo base_url('assets')?>/img/desk.jpg"></a>
                    <h3 class="name">Article Title</h3>
                    <p class="description">Aenean tortor est, vulputate quis leo in, vehicula rhoncus lacus. Praesent aliquam in tellus eu gravida. Aliquam varius finibus est, interdum justo suscipit id.</p><a href="#" class="action"><i class="fa fa-arrow-circle-right"></i></a></div>
                <div
                    class="col-sm-6 col-md-4 item"><a href="#"><img class="img-fluid" src="<?php echo base_url('assets')?>/img/building.jpg"></a>
                    <h3 class="name">Article Title</h3>
                    <p class="description">Aenean tortor est, vulputate quis leo in, vehicula rhoncus lacus. Praesent aliquam in tellus eu gravida. Aliquam varius finibus est, interdum justo suscipit id.</p><a href="#" class="action"><i class="fa fa-arrow-circle-right"></i></a></div>
            <div
                class="col-sm-6 col-md-4 item"><a href="#"><img class="img-fluid" src="<?php echo base_url('assets')?>/img/loft.jpg"></a>
                <h3 class="name">Article Title</h3>
                <p class="description">Aenean tortor est, vulputate quis leo in, vehicula rhoncus lacus. Praesent aliquam in tellus eu gravida. Aliquam varius finibus est, interdum justo suscipit id.</p><a href="#" class="action"><i class="fa fa-arrow-circle-right"></i></a></div>
    </div>
    </div>
    </div>


       
<div class="container-fluid testdiv" >
<div class="intro article-list testdiv">
                <h2 class="text-center">Testimonial</h2>
                <p class="text-center">Nunc luctus in metus eget fringilla. Aliquam sed justo ligula. Vestibulum nibh erat, pellentesque ut laoreet vitae. </p>
            </div>
    <div class="row ">
        <div class="offset-md-3 col-md-9 col-sm  ">
                  <!-- TESTIMONIALS -->
                
        <div class="testbody">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-offset-2 col-md-8">
                             
                                    <div id="testimonial-slider" class="owl-carousel">
                                    <?php
                                                           $query1= $this->db->get('testimonial');
                                                           foreach($query1->result() as $row1)
                                                                {
                                                        ?>
                                                    <div class="testimonial">
                                                      
                                                        <div class="pic">
                                                            <img src="<?= base_url('assets')?>/img/3.jpg" >
                                                        </div>
                                                        <div class="testimonial-content">
                                                        </div>
                                                        <h3 class="testimonial-title"    >
                                                            <a href="#"><?php echo $row1->title; ?></a>
                                                            <small>- <?php echo $row1->description; ?></small>
                                                        </h3>
                                                                
                                                    </div>
                                                    <?php } ?>

                                    </div>
                                  
                                </div>
                             
                            </div>
                        </div>
                        </div>
                       <!-- END OF TESTIMONIALS -->
                      
        </div>
    
        
</div>
</div>

    <div>


<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script>
    $(document).ready(function(){
        $('#testimonial-slider').owlCarousel({
            items:1,
            itemsDesktop:[1000,1],
            itemsDesktopSmall:[979,1],
            itemsTablet:[768,1],
            pagination: false,
            navigation:true,
            navigationText:["",""],
            slideSpeed:1000,
            autoPlay:true
        });
    });
</script>




    </div>
 