<?=@$query[0]->header?>
<style>
.blog{
padding: 40px 40px 40px 40px;
}
.blog_card{
margin:2px;background:#f9f9f9;padding:5px
}
.blog_card:hover{
background:#f1f1f1;
}

</style>

<div class="container blog">

<?=@$query[0]->content?>
<?php 
$this->load->helper('text');
$bl=$this->db->get('blog');
foreach ($bl->result() as $brows){
?>
    <div class="col-sm-4">
        <div class="blog_card">
            <a href="<?=site_url('blog/view/'.$brows->b_id)?>">
            <?php if ($brows->image){?>
            <img alt="<?=$brows->title?>" src="<?=$this->img_url."assets/website/uploads/blog/".$brows->image?>" style="max-height:250px;width:100%">
            <?php }?>
             <small><b>Date:</b><?=$brows->date?></small>
              <small><b>Time:</b><?=$brows->time?></small>
              <h3><?=character_limiter(strip_tags($brows->title),30);?></h3>
            <p><?=character_limiter(strip_tags($brows->description),100);?></p>
            <h5 class="text-right"><b>-</b><?=$brows->author?></h5>
            </a>
        </div>
    </div>
<?php }?>

</div>

   
<?=@$query[0]->footer?>