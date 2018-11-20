<style>
.blog{
padding: 40px 40px 40px 40px;
}
</style>
<div class="container blog">
    <div class="col-sm-12">
        <div class="blog_card">
            <h3><?=@$cquery[0]->title?></h3>
            <?php if (@$cquery[0]->image){?>
            <img alt="<?=@$cquery[0]->title?>" src="<?=$this->img_url."assets/website/uploads/courses/".$cquery[0]->image?>">
            <?php }?>
            <br><br>
            <small><b>Offers:</b><q><?=@$cquery[0]->name?></q></small>
            <p><?=@$cquery[0]->details?></p>
            
            
        </div>
    </div>
</div>