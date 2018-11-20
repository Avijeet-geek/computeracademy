
	<section class="parallax-window" data-parallax="scroll" data-image-src="<?php echo base_url('assets')?>/images/testimonials.jpg" data-natural-width="1400" data-natural-height="470">
		<div class="parallax-content-1">
			<div class="animated fadeInDown">
				<h1>Testimonials</h1>
				
			</div>
		</div>
	</section>
	<!-- End section -->
<main>
	
		<div id="position">
			<div class="container">
				<ul>
					<li><a href="<?php echo site_url('home')?>">Home</a>
					</li>
					<li><a href="<?php echo site_url('testimonial')?>">Testimonials</a>
					</li>
					
				</ul>
			</div>
		</div>
		<!-- End position -->
		<div class="container margin_60">
			<div class="row">

				<div class="col-md-12">
					<?php 
                               $this->db->order_by("guest_id", "desc");
                               $query2=$this->db->get('guestbook');
                               foreach ($query2->result() as $row2)
                                {
                                    ?>

					

					<div id="comments">
						<ol>
							<li>
								<div class="avatar">
									<a href="#"><img src="<?php echo base_url("assets/website/uploads/testimonial/$row2->image")?>" style="width: 100px" alt="Image">
									</a>
								</div>
								<div class="comment_right clearfix">
									
									<p>
									<?php echo $row2->description;?>
									</p>
									<div class="comment_info">
										 by <b> <?php echo $row2->name;?></b>
									</div>
								</div>
							
							</li>
						</ol>
					</div>
					<!-- End Comments -->
					<hr>
<style>
p {margin:0 0  10px !important;}
</style>
					
				<!-- End col-md-8-->

			
				<!-- End aside -->
				 <?php }?>

			</div>
			<!-- End row-->
		</div>
		<!-- End container -->
	</div>
	<!-- End main -->
	</main>