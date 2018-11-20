<div class="jumbotron jumbotron-fluid jumbotron-main"><script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script> 
<script src="https://threejs.org/examples/js/libs/stats.min.js"></script>
    <div id="particles-js">
	<canvas class="particles-js-canvas-el" width="1409" height="319" style="width: 100%; height: 100%;"></canvas>
	</div>
        <div class="container center-vertically-holder" style="margin-top:-20px;">
            <div class="row center-vertically">
                <div class="col-md-8 offset-sm-0 offset-md-2 text-center" style="margin-top:100px;margin-bottom:100px;">
                    <h1>Services<br><br></h1>
                    <hr style="border-top:1px;color:rgba(255,255,255,0.9);width:60%;margin:0px;margin-top:-50px;margin-bottom:10px;margin-left:20%;">
                    <p><br> the different technologies efficiently, with a wide range of skills ranging from the simple use of computers to high level programming and advanced problem solving is quickly catching up.
                        Being a computer illiterate these days pushes you far behind than the age that is currently in vogue. One needs to have at least a basic comfort level with computers.<br><br></p>
                    <p><a class="btn btn-primary" role="button" href="#">See Full</a></p>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
        <?php $os=$this->db->get('our_service');
            foreach ($os->result() as $orow){
        ?>
            <div class="col-sm-12 col-md-12 ">
                <div class="card">
                    <div class="card-header">
                        <h3><?= $orow->title ?></h3>
                    </div>
                    <div class="card-content">
                    <div class="row">
                    <div class="col-md-1 col-sm-1"><img src="<?=$this->img_url."assets/website/uploads/our_services/".$orow->image?>"></div>        
                    <div class="col-md-11 col-sm-11"><?= $orow->description ?></div>
                    </div>
                    </div>
                  
                </div>
            </div>
            <?php }?>
        </div>
    </div>