<style>
.highlight a{
    color: #06f;
    font-weight:bold;
    font-size:1.7em;
    text-decoration:none;
}
.highlight a div{
    font-size:9px;
}
.event_day a{
    color: #5ba5af;
    font-weight:bold;
    font-size:1.7em;
    text-decoration:none;
}
.event_day a div{
    color: #000  !important;
    font-size:9px;
}
th{
    font-weight:bold;
    font-size:1.5em;
    text-align:center;
}
.center {
    margin: auto;
    width: 60%;
    border: 3px solid #73AD21;
    padding: 10px;
}
/* small mobile :320px. */
@media (max-width: 767px) {
     td{
        padding-left:10px !important;
        max-height:70px;
        max-width:60px;
        font-size:1em;
    }
}
@media only screen and (min-width: 767px) and (max-width: 4000px) {
     td{
        margin:auto;
        height:70px;
        width:70px;
        text-align:center;
        font-size:1.5em;
        transition: .2s all ease;
    }
    td:hover{
        font-weight:bold;
        background:#E59866;
    }
} 
</style>   
          <div class="courses_area courses_padding wow fadeIn borderimg">
     <div class="title" style="margin-top:110px;margin-bottom:20px">
			<h2 style="text-align: center;font-size:3em">
			<br>
			   <span>Calendar</span>
			</h2>
			<br>						
		</div> 
    <div class="container">
       <div class="col-lg-4" >
       <div class="row"> 
       
         <div class="title" style="margin-top:-40px;margin-bottom:20px">
			 <form id="header" onsubmit="return false">
            <div class="col-sm-4">
                <select name="year" class="form-control  btn-xs" id="year" style="width:110%;">
                    <?php for($i=2016;$i<=2030;$i++):?>
                	   <option <?php if(@$this->uri->segment(3)==$i) echo " selected";elseif (date('Y')==$i) echo " selected"?>><?=$i?></option>
                	<?php endfor;?>
                </select>
            </div>
            <div class="col-sm-4">
                <select name="month" class="form-control  btn-xs" id="month" style="width:110%;">
                  <option value="01"<?php if(@$this->uri->segment(4)=='01') echo " selected"?>>January</option>
                  <option value="02"<?php if(@$this->uri->segment(4)=='02') echo " selected"?>>February</option>
                  <option value="03"<?php if(@$this->uri->segment(4)=='03') echo " selected"?>>March</option>
            	  <option value="04"<?php if(@$this->uri->segment(4)=='04') echo " selected"?>>April</option>
                  <option value="05"<?php if(@$this->uri->segment(4)=='05') echo " selected"?>>May</option>
                  <option value="06"<?php if(@$this->uri->segment(4)=='06') echo " selected"?>>June</option>
            	  <option value="07"<?php if(@$this->uri->segment(4)=='07') echo " selected"?>>July</option>
                  <option value="08"<?php if(@$this->uri->segment(4)=='08') echo " selected"?>>August</option>
                  <option value="09"<?php if(@$this->uri->segment(4)=='09') echo " selected"?>>September</option>
            	  <option value="10"<?php if(@$this->uri->segment(4)=='10') echo " selected"?>>October</option>
                  <option value="11"<?php if(@$this->uri->segment(4)=='11') echo " selected"?>>November</option>
                  <option value="12"<?php if(@$this->uri->segment(4)=='12') echo " selected"?>>December</option>
                </select>
            </div>
            <div class="col-sm-4">
                <button id="sbt_btn" class="btn btn-default blue " onclick="header_submit()">Submit</button>
            </div>
         </form>						
		</div>
       </div> 
       </div>
        <div class="col-lg-4" >
       
       
        </div> 
        
        <div class="col-lg-5" >
        </div>
    
        
      <div class="clearfix"></div> 
        <div style="background:#fff;padding:0px;" class="well"> 
        <img src="http://www.groveus.com/assets/calendar/<?=$month?>.jpg" class="img-responsive"> 
        <div class="table-responsive">   
        <?php echo $calendar;?>
        </div>
</div> 
</div> 
	
	
	
<!-- Button trigger modal -->
<button type="button" id="modalbtn" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal" style="display:none">
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content ">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Calendar Event</h4>
      </div>
      <div class="modal-body col-xs-offset-1 col-xs-10" id="result"></div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>

<script>
$("#calendar").each(function(){
	html:true
});
function getEvent(day)
{
	$("#modalbtn").trigger("click");
	$("#result").html('<img src="<?php echo base_url()?>assets/img/ajax-loaders/ajax-loader-7.gif" />');
	var url="<?=site_url()?>calendar/get_events?day="+day+"&month="+<?=$month?>+"&year="+<?=$year?>;
	console.log(url); 
	$.ajax({
	    url: url,  
	    success:function(data) {
	      $("#result").html(data); 
	    }
	  });
}
function header_submit()
{
	var year=document.getElementById("year").value;
	var month=document.getElementById("month").value;
	var url="<?=site_url("calendar/display")?>/"+year+"/"+month;
	window.location.assign(url);
}
</script>	

<style>
.table>tbody>tr.active>td, .table>tbody>tr.active>th, .table>tbody>tr>td.active, .table>tbody>tr>th.active, .table>tfoot>tr.active>td, .table>tfoot>tr.active>th, .table>tfoot>tr>td.active, .table>tfoot>tr>th.active, .table>thead>tr.active>td, .table>thead>tr.active>th, .table>thead>tr>td.active, .table>thead>tr>th.active {
    background-color:#D5D8DC  ;
}
</style>