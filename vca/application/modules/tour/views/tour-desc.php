<?php

if (@$_GET['department_id']) {
    $department_id = $_GET['department_id'];
    $this->db->where('department_id', $department_id);
    $qry = $this->db->get('department');
    foreach ($qry->result() as $row) {
        $pc = $qry->result();
        ?>
<section class="parallax-window" data-parallax="scroll"
	data-image-src="<?php echo base_url("assets/website/uploads/tour/$row->image")?>"
	data-natural-width="1400" data-natural-height="470">
	<div class="parallax-content-2">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-sm-8">
					<h1><?php echo $row->name?></h1>

				</div>
				<div class="col-md-4 col-sm-4">
					<div id="price_single_main">
						<?php echo $row->day?> Days <?php echo $row->night?> Night
						</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- End section -->

<main>
<div id="position">
	<div class="container">
		<ul>
			<li><a href="<?php echo site_url('home')?>">Home</a></li>
			<li><a href="<?php echo site_url('tour')?>">Tours</a></li>
			<li><?php echo $row->name?></li>
		</ul>
	</div>
</div>
<!-- End Position --> <!-- End Map -->

<div class="container margin_60">
	<div class="row">
		<div class="col-md-12" id="single_tour_desc">
			<div class="row">
				<div class="col-md-3">
					<h3>Price</h3>
				</div>
				<div class="col-md-9">
					<p><?php echo $row->price?></p>
				</div>
                <div class="clearfix"></div>
				<div class="col-md-3">
					<h3>Description</h3>
				</div>
				<div class="col-md-9">
					<p><?php echo strip_tags($row->description)?></p>
				</div>
				<!-- End row  -->

			</div>
		</div>

		<hr>


	</div>
	<!--End  single_tour_desc-->

</div>
<!--End row -->

<!--End container -->

<div id="overlay"></div>
<!-- Mask on input focus --> </main>
<!-- End main -->
<?php }}?>