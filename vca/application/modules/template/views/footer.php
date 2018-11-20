<div class="footer-clean">
<hr>
        <footer>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-sm-4 col-md-3 item">
                        <h3>Services</h3>
                        <ul>
                        <?php $os=$this->db->get('our_service','3');
                            foreach ($os->result() as $orow){
                        ?>
                            <li><a href="#"><?= $orow->title ?></a></li>
                         <?php }?>
                        </ul>
                    </div>
                    <div class="col-sm-4 col-md-3 item">
                        <h3>Courses</h3>
                        <ul>
                        <?php $c=$this->db->get('courses','3');
                            foreach ($c->result() as $crow){
                        ?>
                            <li><a href="#"><?= $crow->title ?></a></li>
                            <?php }?>
                        </ul>
                    </div>
                    <div class="col-sm-4 col-md-3 item">
                    </div>
                    <div class="col-lg-3 item social"><a href="<?= $this->profile['facebook']?>"><i class="icon ion-social-facebook"></i></a><a href="<?= $this->profile['twitter']?>"><i class="icon ion-social-twitter"></i></a><a href="<?= $this->profile['gplus']?>"><i class="icon ion-social-google"></i></a><a href="<?= $this->profile['instagram']?>"><i class="icon ion-social-instagram"></i></a>
                        <p class="copyright">&copy; <?= $this->profile['business_name']?> <?=date("Y/m/d")?></p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <script src="<?php echo base_url('assets')?>/js/jquery.min.js"></script>
    <script src="<?php echo base_url('assets')?>/js/jquery-3.3.1.min.js"></script>
    <script src="<?php echo base_url('assets')?>/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url('assets')?>/js/Contact-Form-v2-Modal--Full-with-Google-Map.js"></script>
    <script src="<?php echo base_url('assets')?>/js/Tabbed_slider.js"></script>
    <script src="<?php echo base_url('assets')?>/js/Bold-BS4-Jumbotron-with-Particles-js.js"></script>
    <script src="<?php echo base_url('assets')?>/js/Filterable-Gallery-with-Lightbox.js"></script>
    <script src="<?php echo base_url('assets')?>/js/Filterable-Gallery.js"></script>
    <script src="<?php echo base_url('assets')?>/js/owl.carousel.min.js"></script>
    <script src="<?php echo base_url('assets')?>/js/birthday.js"></script>
    <script src="<?php echo base_url('assets')?>/js/popper.min.js"></script>
    <script src="<?php echo base_url('assets')?>/js/mdb.min.js"></script>

</body>

</html>


