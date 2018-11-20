<style>
.panel-list li ul li {
	padding: 5px 20px 5px 20px;
}
</style>
<div id="hoeapp-container" hoe-lpanel-effect="default">
	<aside id="hoe-left-panel" hoe-position-type="absolute"
		style="height: 50px; overflow: scroll">
		<div class="profile-box">
			<div class="media">
				<a class="pull-left" href="#/home" style="text-decoration: none">
					<div class="media-body">
						<h5 class="media-heading">
							Welcome! <b style="color: #06f"><?=$this->session->userdata('name');?></b>
						</h5>
						<small style="color: #06f"><?php if($this->session->userdata('type')=='A') echo "Administrator"; else echo 'User'?></small>
					</div>
				</a>
			</div>
		</div>
		<ul class="nav panel-list">
			
			<li><a accesskey="h" href="#/home"><i
					class="fa fa-dashboard"></i><span class="menu-text">Das<u><b>h</b></u>board
				</span><span class="selected"></span></a></li>
			<li class="sidepadding"><a accesskey="a" href="#/menu"><i
					class="fa fa-edit"></i><span class="menu-text">Menu</span><span
					class="selected"></span></a></li>
					
			<li ><a accesskey="h" href="#/service_head"><i
					class="fa fa-dashboard"></i><span class="menu-text">SubMenu
				</span><span class="selected"></span></a></li>
				
				<li><a data-toggle="collapse" data-target="#pages" aria-expanded="true" aria-controls="pages" accesskey="a" class=""><i class="fa fa-check-circle"></i><span class="menu-text">Slider <i class="fa fa-sort-down right"></i></span><span class="selected"></span></a> <span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span>
				<ul class="collapse" id="pages" aria-expanded="true" style="">
					<li><a accesskey="p" href="#/slider"><i class="fa fa-check-circle"></i><span class="menu-text"> Slider</span><span class="selected"></span></a></li>
					<li><a accesskey="a" href="#/slider_img"><i class="fa fa-check-circle"></i><span class="menu-text"> Slider Images</span><span class="selected"></span></a>
				</li></ul></li>
				
				
			<!-- <li class="sidepadding"><a accesskey="a" href="#/plans"><i
					class="fa fa-edit"></i><span class="menu-text">Plans</span><span
					class="selected"></span></a></li> -->
					
		      <li class="sidepadding"><a accesskey="a" href="#/page"><i
					class="fa fa-edit"></i><span class="menu-text">Page</span><span
					class="selected"></span></a></li>
					
					 <li class="sidepadding"><a accesskey="a" href="#/testimonial"><i
					class="fa fa-edit"></i><span class="menu-text">testimonial</span><span
					class="selected"></span></a></li>
					
<!-- 					 <li class="sidepadding"><a accesskey="a" href="#/blocks"><i -->
<!-- 					class="fa fa-edit"></i><span class="menu-text">Blocks</span><span -->
<!-- 					class="selected"></span></a></li> -->
					
<!-- 					 <li class="sidepadding"><a accesskey="a" href="#/socialmedia"><i -->
<!-- 					class="fa fa-edit"></i><span class="menu-text">socialmedia</span><span -->
<!-- 					class="selected"></span></a></li> -->
					
			 <li class="sidepadding"><a accesskey="a" href="#/blog"><i
					class="fa fa-edit"></i><span class="menu-text">Blog</span><span
					class="selected"></span></a></li>
					
					 <li class="sidepadding"><a accesskey="a" href="#/courses"><i
					class="fa fa-edit"></i><span class="menu-text">Courses</span><span
					class="selected"></span></a></li>
					
					 <li class="sidepadding"><a accesskey="a" href="#/our_services"><i
					class="fa fa-edit"></i><span class="menu-text">Our Services</span><span
					class="selected"></span></a></li>
					
		       <li class="sidepadding"><a accesskey="a" href="#/contact"><i
					class="fa fa-edit"></i><span class="menu-text">Contact</span><span
					class="selected"></span></a></li>
					
					<li class="sidepadding"><a accesskey="a" href="#/career"><i
					class="fa fa-edit"></i><span class="menu-text">Career</span><span
					class="selected"></span></a></li>	
					
					
					<li class="sidepadding"><a accesskey="a" href="#/gallery"><i
					class="fa fa-edit"></i><span class="menu-text">Gallery</span><span
					class="selected"></span></a></li>	
					
							
		     <li class="sidepadding"><a accesskey="a" href="#/admin_profile"><i
					class="fa fa-edit"></i><span class="menu-text">Admin Profile</span><span
					class="selected"></span></a></li>	 
					
					<li class="sidepadding"><a accesskey="a" href="#/enquiry"><i
					class="fa fa-edit"></i><span class="menu-text">Enquiry</span><span
					class="selected"></span></a></li>	

		</ul>
	</aside>
	<section id="main-content">