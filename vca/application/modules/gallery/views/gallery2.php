<div class="container">
<div class="row-fluid">

        <br><br><br><br>
        <div class="col-lg-6 col-lg-offset-3">
          <h1 align="center">Our Gallery</h1>
          <h4 align="center">Bykers Thumpers</h4>
          <hr>
          <br><br><br>
         </div>
        
        <div class="clearfix"></div>
<div id="links">
 <?php $i=1;
		   foreach ($query ->result() as $row)
		   {?>
		   <div class="col-sm-3">		   	
          	 <a href="<?=$this->img_url.'assets'?>/uploads/gallery/<?=$row->image;?>" title="<?=$row->title?>" data-gallery>
          	 <img alt="<?=$row->title?>" src="<?=base_url('assets');?>/uploads/gallery/thumb/<?=$row->image?>" title="<?=$row->title?>" class="img-responsive"  style="margin:10px"></a>
          	 </div>
           <?php 
           if ($i%4==0 && $i!=1):
            echo "<div class='clearfix'></div>";
           endif;    
           $i++;
		   }?>
          	 <center>
						   <?php 
						 echo $this->pagination->create_links();
								    ?>
								    </center>
</div>
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
</div>
<link rel="stylesheet" href="//blueimp.github.io/Gallery/css/blueimp-gallery.min.css">
<script src="//blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>