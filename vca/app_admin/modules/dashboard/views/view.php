<style>
.cards{
    padding:3px 20px 10px 20px;
    border-radius:10px;
    display:inline-block;
    color: #ffffff;
    text-align: left;
    min-height:130px;
}
.cards h5{
    color:#f1f1f1;
    text-align:left !important;
}
.cards label{
/*     margin-left:-25% !important; */
    text-align:left !important;
    font-size:1.4em;
}
.cards label b{
    font-size:2em;
}
</style>
<div class="col-sm-6 col-sm-offset-3 text-center">
<h1 style="tex-align:justify; background-color:#6e1b39; color:white; padding-top:5px; padding-bottom:5px;">Welcome to Dashboard</h1>
<br>
</div>
<div class="clearfix"></div>

    
   <a href="#/department"> <div class="col-sm-3 col-xs-12 cards" style="background: rgb(149,206,255)">
        <h5>Packages</h5>
        <label><b>{{department_row}}</b> Packages</label>
    </div>
    </a>
  
     <a href="#/gallery"><div class="col-sm-3 col-xs-12 cards" style="background: orange">
        <h5>Total Images in Gallery</h5>
        <label><b>{{gallery_row}}</b>  Images </label>
    </div>
    </a>
      <a href="#/contact"> <div class="col-sm-3 col-xs-12 cards" style="background: #de4f43">
        <h5>Total Contacts</h5>
        <label><b>{{contact_row}}</b> Contacts</label>
    </div>
    </a>
    <a href="#/guestbook"><div class="col-sm-3 col-xs-12 cards" style="background: orange">
        <h5>Total Testimonials</h5>
        <label><b>{{guestbook_row}}</b>  Testimonials </label>
    </div>
    </a>
    
