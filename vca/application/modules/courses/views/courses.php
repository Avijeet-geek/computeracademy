<div class="jumbotron jumbotron-fluid jumbotron-main"><script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script> 
<script src="https://threejs.org/examples/js/libs/stats.min.js"></script>
    <div id="particles-js">
	<canvas class="particles-js-canvas-el" width="1409" height="319" style="width: 100%; height: 100%;"></canvas>
	</div>
        <div class="container center-vertically-holder" style="margin-top:-20px;">
            <div class="row center-vertically">
                <div class="col-md-8 offset-sm-0 offset-md-2 text-center" style="margin-top:100px;margin-bottom:100px;">
                    <h1>Courses<br><br></h1>
                    <hr style="border-top:1px;color:rgba(255,255,255,0.9);width:60%;margin:0px;margin-top:-50px;margin-bottom:10px;margin-left:20%;">
                    <p><br>Siliguri's No.1 Computer Institute<br><br></p>
                    <p><a class="btn btn-primary" role="button" href="#">See Full</a></p>
                </div>
            </div>
        </div>
        </div>
<br>
<div class="container">
    
    <div class="row">
     <?php 
    $bl=$this->db->get('courses');
    foreach ($bl->result() as $crow){
    ?>
        <div class="col-sm-4 col-md-4">
            <div class="pricingTable purple">
                <div class="pricingTable-header">
                    <h3><?= $crow->title ?> </h3><span><?= $crow->name ?></span></div>
                <div class="pricing-plans"><span class="price-value"></span><span class="month"><?= $crow->details ?> </span></div>
                <div class="pricingContent">
                </div>
                <div class="pricingTable-sign-up"><a href="<?=site_url('courses/view/'.$crow->c_id)?>" class="btn btn-block">Link</a></div>
            </div>
        </div>
        <?php }?>
    </div>

<br>
 

</div>