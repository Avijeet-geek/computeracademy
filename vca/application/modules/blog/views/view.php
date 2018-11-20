<style>
.blog{
padding: 40px 40px 40px 40px;
}
</style>
<div class="container blog">
    <div class="col-sm-12">
        <div class="blog_card">
            <h3><?=@$bquery[0]->title?></h3>
            <?php if (@$bquery[0]->image){?>
            <img alt="<?=@$bquery[0]->title?>" src="<?=$this->img_url."assets/website/uploads/blog/".$bquery[0]->image?>">
            <?php }?>
            <br><br>
            <small><b>By:</b><q><?=@$bquery[0]->author?></q></small>
            <small><b>Date:</b><?=@$bquery[0]->date?></small>
            <small><b>Time:</b><?=@$bquery[0]->time?></small>
            <p><?=@$bquery[0]->description?></p>
            
            
        </div>
    </div>
</div>