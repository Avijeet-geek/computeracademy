<style>
.album_box{
	display:table;
	padding:20px;
	display: block;
	list-style:none;
}
.folder{
    display: inline-block;
    margin:20px;
    padding:10px;
    max-width:150px;
}
.folder:hover{
    background: #f1f1f1;
    border:1px solid #f1f1f1;
    border-radius: 10px;
    color: #000000;
}



</style>
<div class="container">
<div class="row-fluid">

        <br><br><br><br>
        <div class="col-lg-6 col-lg-offset-3">
              <h1 align="center">Our Gallery</h1>
              <hr>
              <br><br><br>
         </div>
        <div class="clearfix"></div> 
          <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                              <?php 
                              if (isset($_GET['id'])){
                              ?>
                              <li role="presentation"><a href="<?=site_url('gallery')?>">Gallery</a></li>
                              <li role="presentation" ><a href="#profile" role="tab" data-toggle="tab">Album</a></li>
                              <li role="presentation" class="active"><a href="#album_picture" role="tab" data-toggle="tab"><?=$album_name?></a></li>
                              <?php }else {?>
                              <li role="presentation" <?php if(@$_GET['album']!='1') echo "class='active'";?>><a href="<?=site_url('gallery')?>">Gallery</a></li>
                              <li role="presentation" <?php if(@$_GET['album']=='1') echo "class='active'";?>><a href="#profile" role="tab" data-toggle="tab">Album</a></li>
                              <?php }?>
                            </ul>
                     <!-- Tab panes -->
<div class="tab-content">
          <div role="tabpanel" class="tab-pane <?php if(@$_GET['album']=='1') echo "active";?>" id="profile">
                <div class="album_box">
                    <?php foreach ($album_qry->result() as $row){?>
    				<a href="<?=site_url("gallery?id=$row->album_id")?>" title="<?=$row->title?>" class="folder">
    				     <img src="<?=base_url("assets/img/folder1.png")?>" alt="Teesta Thumpers Folders" class="img-responsive">
        			     <figcaption><?=$row->title?></figcaption>
        			</a>
                  	<?php }?>
                </div>
          </div>
  <?php if (isset($_GET['id'])){?>
    <div role="tabpanel" class="tab-pane active" id="album_picture">
        <div id="links" class="album_box">
            <?php foreach ($album_picture->result() as $album_image){?>
              	 <a href="<?=$this->img_url."assets/website/uploads/gallery/$album_image->image"?>"  title="<?=$album_image->title?>"   data-gallery>
              	 <img alt="<?=$album_image->title?>" src="<?=$this->img_url."assets/website/uploads/gallery/thumb/$album_image->image"?>"  title="<?=$album_image->title?>" class="img-responsive img-thumbnail" style="border:none"></a>
          	 <?php }?>
        </div>
    </div>
  <?php }else {?>
  <div role="tabpanel" class="tab-pane <?php if(@$_GET['album']!='1') echo "active";?>" id="home">
        <div id="links" class="album_box" >
            <?php foreach ($gallery_qry ->result() as $row){?>
              	 <a href="<?=$this->img_url."assets/website/uploads/gallery/$row->image"?>"  title="<?=$row->title?>" title="<?=$row->title?>" data-gallery>
              	 <img alt="<?=$row->title?>" src="<?=$this->img_url."assets/website/uploads/gallery/thumb/$row->image"?>" title="<?=$row->title?>"  class="img-responsive img-thumbnail" style="border:none"></a>
          	 <?php }?>
        </div>
  </div>
  <?php }?>
        
        
</div>


<div id="blueimp-gallery" class="blueimp-gallery">
    <div class="slides"></div>
    <h3 class="title"></h3>
    <a class="prev"><</a>
    <a class="next">></a>
    <a class="close">x</a>
    <a class="play-pause"></a>
    <ol class="indicator"></ol>
    <div class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body next"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left prev">
                        <i class="glyphicon glyphicon-chevron-left"></i>
                        Previous
                    </button>
                    <button type="button" class="btn btn-primary next">
                        Next
                        <i class="glyphicon glyphicon-chevron-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div> 
</div>
<br><br><br><br>
</div></div>
<link rel="stylesheet" href="<?=base_url("assets")?>/css/blueimp-gallery.min.css">
<script src="<?=base_url("assets")?>/js/jquery.blueimp-gallery.min.js"></script>