
	<section class="parallax-window" data-parallax="scroll" data-image-src="<?php echo base_url('assets')?>/images/NewPic/headerpic.jpg" data-natural-width="1400" data-natural-height="470">
		<div class="parallax-content-1">
			<div class="animated fadeInDown">
				<h1>Tour Packages</h1>
				
			</div>
		</div>
	</section>
	<!-- End section -->
 
	<main>
		<div id="position">
			<div class="container">
				<ul>
					<li><a href="<?php echo site_url("home")?>">Home</a>
					</li>
					<li><a href="<?php echo site_url("tour")?> ">Tours</a>
					</li>
				
				</ul>
			</div>
		</div>
		<!-- Position -->

	
		<!-- End Map -->

		<div class="container margin_60">
			<div class="row">
		

				<div class="col-lg-12 col-md-12">

				
					<!--End tools -->

			

						<div class="row">
						<?php 
                               $this->db->order_by("department_id", "desc");
                               $query2=$this->db->get('department');
                               foreach ($query2->result() as $row2)
                                {
                                    ?>
						<div class="col-md-4 col-sm-4 wow zoomIn" data-wow-delay="0.1s">
							<div class="tour_container">
								
								<div class="img_container" style="height: 200px;">
									<a href="<?php echo site_url("tour/view?department_id=$row2->department_id")?>">
										<img src="<?php echo base_url("assets/website/uploads/tour/thumb/$row2->image")?>" class="img-responsive" style="height: 200px; width: 100%" alt="<?php echo $row2->name?>">
										<span class="short_info">
											 <span class="price"><?php echo $row2->day;?> Day <?php echo $row2->night;?> Night</span>
										</span>
									</a>
								</div>
								
								<div class="tour_title">
								<?php 
								$str=$row2->name;
								
								?>
									<h3><strong><a href="<?php echo site_url("tour/view?department_id=$row2->department_id")?>"><?php echo $str?></a></strong></h3>
									
									
									
									<div>
									<?php 
								$str1=strip_tags($row2->description);
								$str1=character_limiter($str1,100);
								
								?>
									
									   <?php echo $str1?>
									
									</div>
									
									<div class="wishlist" style="position: relative">
									<a href="<?php echo site_url("tour/view?department_id=$row2->department_id")?>" class="btn_1">Read More</a>
									</div>
									<!-- End wish list-->
								</div>
							</div>
							<!-- End box tour -->
						</div>
						<?php }?>
					</div>

				

				

				</div>
				<!-- End col lg 9 -->
			</div>
			<!-- End row -->
		</div>
		<!-- End container -->
	</main>
	<!-- End main -->
