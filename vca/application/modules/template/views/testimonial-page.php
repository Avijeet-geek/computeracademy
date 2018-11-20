<div class="white_bg">

			<div class="container margin_60">
			<?php 
                               $this->db->order_by("guest_id", "desc");
                               $query2=$this->db->get('guestbook','3');
                               foreach ($query2->result() as $row2)
                                {
                                    ?>
				<div class="col-md-4">
                    <div class="well">
                    
                    <blockquote class="blockquote">
                    <img class="round" src="<?php echo base_url("assets/website/uploads/testimonial/$row2->image")?>"> <cite title="Source Title"><?php echo $row2->name;?></cite>
                <p class="mb-0"> <br> <?php echo $row2->description;?></p>
  <footer class="blockquote-footer nobg-footer"></footer>
</blockquote>
                    </div>
				</div>
				<?php }?>
				</div>
				 
					
				<!-- End row -->
			</div>
			<!-- End container -->
		