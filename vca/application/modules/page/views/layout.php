<?=@$query[0]->header?>
<style>
.breadcroumb-bg-7 {
    background-image: url(<?="http://127.0.0.1/flex/assets/website/uploads/page"?>/<?=$query[0]->image?>);
}
.content_area{min-height:300px;padding:20px 8px;}
</style>




<?php 

if($query[0]->slider_id){
    $sdata['slider_data']=$this->db->where('slider_id',$query[0]->slider_id)->get('slider')->result();
    $sdata['sliderimg_data']=$this->db->where('parent_slider',$query[0]->slider_id)->where('status',1)->get('slider_img');
    $this->load->view('template/slide',$sdata);

}
?>
<div class="container content_area">
<?=$query[0]->content?>
</div>
<div class="clearfix"></div>
<?=@$query[0]->footer?>