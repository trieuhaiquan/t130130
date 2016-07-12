
  <section class="wrapper" style="margin-top:0px;">
    <h3><i class="fa fa-tags" aria-hidden="true"></i>Your Work Done</h3>
  <div class="row mt">
    <div class="col-lg-12">
              <div class="content-panel">
              <h4><i class="fa fa-angle-right"></i> List Work Done</h4>
                  <section id="unseen">
                    <table class="display">
                      <thead>
                      <tr>
                          <th style="text-align: center;" class="numeric">Number</th>
                          <th style="text-align: center;" class="numeric">Name Of Tag</th>
                          <th style="text-align: center;" class="numeric">Real Time End</th>
                          <th style="text-align: center;" class="numeric">Total Time Used</th>
                          <th style="text-align: center;" class="numeric">Status</th>
                          <th class="numeric">Edit</th>
                      </tr>
                      </thead>
                      <tbody>
                      
               <?php 
               $stt=1;
               foreach($workdone as $t)
               {
                   $endreal = strtotime($t['timeendreal']);
                   $timest = strtotime($t['timestartreal']);
                   $timee = strtotime($t['timeend']);
                   $total = $endreal - $timest;
                   $total2 = floor((($total)/60/60))." Hours ".Round((($total)/60%60))." Mins";
                   
                    ?>
                        <tr>
                            <td style="text-align: center;"><?php echo $stt++;?></td>
                            <td style="text-align: center;"><?php echo $t['tentag'];?></td>
                            <td style="text-align: center;"><?php echo $t['timeendreal'];?></td>
                            <td style="text-align: center;"><?php echo $total2 ?></td>
                    
                            <td style="text-align: center;">
                               <?php if($t['totaltime']<=$t['totalestimate'])
                                   echo '<i class="fa fa-smile-o" aria-hidden="true" style="color:green;"> Congratulations!! You are doing well</i>!';
                                   else echo '<i class="fa fa-frown-o" aria-hidden="true" style="color:red;"> Sorry you are late!!! Get better</i>';
                                   ?>
                            </td>
                            <td> 
                                <a href='#' class="xoa" id="<?php echo $t['id']; ?>"> <i class="fa fa-trash-o" aria-hidden="true" style="font-size: 20px; color: red;"></i> </a>
                               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                               <a href='#' class="check" id="<?php echo $t['id']; ?>"> <i class="fa fa-check" aria-hidden="true" style="font-size: 20px; color: green;"></i> </a>
                               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                               <a data-toggle="modal" data-target="#<?php echo $t['id'];?>a" style="cursor: pointer;" > <i class="fa fa-cog" aria-hidden="true" style="font-size: 20px; color: #00c5de;"></i></a>
                                <div class="modal fade" id="<?php echo $t['id'];?>a" role="dialog">
                                    <div class="modal-dialog">

                                    <!-- Modal content-->
                                     <form action="<?php echo BASE_DIR?>index/fixtime/<?php echo $t['id']; ?>" method="post">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title" style="color: #333333; font-weight: bolder;"><i class="fa fa-tags" aria-hidden="true"></i> Create Work</h4>
                                      </div>
                                      <div class="modal-body">
                                                    <span style="font-weight: bolder">Tag's Name: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                                    <select style="border-radius: 8px;" name="tag">
                                                          <?php  foreach($tag as $t2)
                                                             { ?>
                                                          <option value="<?php echo $t2['id']; ?>" <?php if($t2['id']==$t['idtag']) echo 'selected';?>><?php echo $t2['tentag'];?></option>
                                                             <?php }?>
                                                      </select>
                                                    <br><br>
                                                     <span style="font-weight: bolder">Time Start: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> 
                                                     <input type="datetime-local" name="timestart" value="<?php echo $t['timestart2'];?>"  id="timestart"  style="height: 25px; border-radius: 8px;" required>
                                                     <br><br>
                                                     <span style="font-weight: bolder">Time End:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> 
                                                     <input type="datetime-local" name="timeend"  value="<?php echo $t['timeend2'];?>" id="timeend"  style="height: 25px; border-radius: 8px;"  required>
                                                     <br><br>
                                                     <span style="font-weight: bolder">Priority: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                                      <select style="border-radius: 8px; width: 100px;" name="priority">
                                                          <option value="1" <?php if($t['priority']==1) echo 'selected';?>> High </option>
                                                          <option value="2" <?php if($t['priority']==2) echo 'selected';?>> Medium </option>
                                                          <option value="3" <?php if($t['priority']==3) echo 'selected';?>> Low </option>
                                                      </select>
                                      </div>
                                      <div class="modal-footer">

                                        <button type="button" class="btn btn-default" data-dismiss="modal" id="btnadd">Close</button>
                                        <button type="submit" name="add" id="add" class="btn btn-dropbox">Update</button>
                                      </div>
                                    </div>
                                           </form>

                                    </div>

                                    </div>
                            </td>
                        </tr>
               <?php }?>
                  
                          
                     

                    
                      </tbody>
                  </table>
                  </section>
          </div><!-- /content-panel -->
       </div><!-- /col-lg-4 -->     
</div><!-- /row -->


</section>
<script>
$(document).ready(function() {
$('table.display').DataTable();
} );
</script>
<script>
                 $(document).ready(function() {
                    $(".xoa").click(function(){
                       var id = $(this).attr("id");
                       var hoi =confirm("Are you sure to delete??");
                       if(hoi==true)
                       {
                       window.location="<?php echo BASE_DIR?>index/xoatime/" +id;
                   }
                   else  return false;
                    });
                   $(".check").click(function(){
                       var id = $(this).attr("id");
                       var hoi =confirm("Are you sure to update??");
                       if(hoi==true)
                       {
                       window.location="<?php echo BASE_DIR?>index/updatetime/" +id;
                   }
                   else  return false;
                    });
                 });
                        </script>
