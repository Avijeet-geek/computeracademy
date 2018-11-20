					
		<!--============================== content =================================-->
 <div id="content"><div class="ic">More Website Templates @ TemplateMonster.com. November19, 2012!</div>
    <div class="container">
          <div class="row">
        <article class="span12">
        <h3>Folio</h3>
         </article>
        <div class="clear"></div>
         <ul class="portfolio clearfix">           
          <?php 
		   foreach ($query ->result() as $row){

		   echo $row->image; 
		   
		   }?>
          	 <div class="span12">
						   <?php 
						 echo $this->pagination->create_links();
								    ?>
								    </div> 
          </ul> 
           
      </div>
        </div>
  </div>
    </div>