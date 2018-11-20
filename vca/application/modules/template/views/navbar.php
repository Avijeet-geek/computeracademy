<div>
<!--Navbar-->
<nav class="navbar navbar-expand-lg navbar-dark  sticky-top" style="background-color:#0d6eff">

    <!-- Navbar brand -->
    <a class="navbar-brand" href="<?=site_url('home') ?>"><?= $this->profile['business_name'] ?></a>

    <!-- Collapse button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav" aria-controls="basicExampleNav"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Collapsible content -->
    <div class="collapse navbar-collapse" id="basicExampleNav">

        <!-- Links -->
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link"  href=<?Php echo site_url('home/courses')?>>Courses
                    <span class="sr-only">(current)</span>
                </a>
            </li>
              <li class="nav-item active">
                <a class="nav-link"  href=<?Php echo site_url('home/services')?>>Services
                    <span class="sr-only">(current)</span>
                </a>
            </li>
            <?php 
            $mqry=$this->db->where('type',2)->order_by('order')->get('menu')->result();
		    foreach ($mqry as $m){
		        $target='';
		        if($m->link_type==1){
		            $mlink=$m->url;
		            $target="target='_blank'";
		        }else if($m->page_id){
		            $mlink=site_url('page/view/'.$m->name.'?page_id='.$m->page_id);
		        }else{
		            $mlink=site_url('page/view/'.$m->name.'?id='.$m->menu_id);
		        }
		        // $mlink=site_url('page/view/'.$m->name.'?id='.$m->menu_id);
		        	
		        $nqry=$this->db->where('menu_id',$m->menu_id)->get('service_head');
		        if($nqry->num_rows()>0)
		        {
		            $nqry=$nqry->result();
                    ?>
             <!-- Dropdown -->
             <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" <?=$target?>><?= $m->name?></a>
                <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                <?php 
					    foreach ($nqry as $n){
					    $nlink=site_url('page/view/'.$n->name.'?s_id='.$n->s_id);
					?>
                    <a class="dropdown-item " href="<?=$nlink?>"><?=$n->name?></a>
                     <?php }?>
                </div>
            </li>
            
            <?php }else{?>
            <li class="nav-item">
                <a class="nav-link"href="<?=$mlink?>" <?=$target?>><?=$m->name?></a>
            </li>
                <?php } 
					}?>
            </ul>
        <!-- Links -->
    </div>
    <!-- Collapsible content -->

</nav>
<!--/.Navbar-->

</div>


        
