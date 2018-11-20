<?php
$mdata=$marksheetDetails->result();
?>
<table class="table">
   <tr><td><img src="<?=$this->bios_path."assets/website_uploads/school_logo/".$this->profile['web_school_logo']?>" alt="Snowdrops School"></td>
   <td  align='left'><h3><?=$this->profile["school_name"]?></h3>
           <div><?=$this->profile['web_address']?></div></td></tr>
</table>

<div class="col-sm-8 col-sm-offset-2 table-responsivse">
      <h3><?php $exam=$this->db->where('exam_id',$mdata[0]->exam_id)->get('exam_master')->result(); 
              echo $exam[0]->exam_name;?></h3>
              <br>
              <table class="table table-bordered">
                <tr>
                    <td><?=$mdata[0]->student_name?></td><td><?=$mdata[0]->class."(". $mdata[0]->section.")"?></td><td><?="Roll:".$mdata[0]->roll_no?></td>
                </tr>
              
              </table>
                <h5><small> &nbsp; </small></h5>
                <table class="table table-bordered table-striped table-hover">
                    <tr class="success">
                        <th>Subject Name <b>Code</b> <small>(Prefix)</small></th>
                        <th>Marks Obtained</th>
                   </tr>
                    <?php foreach ($resultData->result() as $rd):?>
                        <tr>
                        <td style="width:90%; word-break:break-all;text-align:left"><?=$rd->subject_name?>  <div><b><?=$rd->subject_code?></b> <small>(<?=$rd->subject_prefix?>)</small></div></td>
                        <td><?=$rd->obtain_marks?></td>
                        </tr>
                    <?php endforeach;?>
                </table>
      <br><br>
            <table class="table table-bordered">
                <?php foreach ($marksheetDetails->result() as $md):?>
                <tr>
                    <th class="active">Total Marks Obtained</th>
                    <td><?=$md->total?></td>
                </tr>
                <tr>
                    <th class="active">Percentage</th>
                    <td><?=$md->percentage?></td>
                </tr>
                <tr>
                    <th class="active">Grade</th>
                    <td><?=$md->grade?></td>
                </tr>
                <tr>
                    <th class="active">Attendance</th>
                    <td><?=$md->attendance?></td>
                </tr>
                <tr>
                    <th class="active">Rank</th>
                    <td><?=$md->rank?></td>
                </tr>
                <tr>
                    <th class="active">Remarks</th>
                    <td><?=$md->remarks?></td>
                </tr>
                <?php endforeach;?>
            </table>
            <br><br><br>
</div>