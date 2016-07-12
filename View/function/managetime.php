
  <section class="wrapper" style="margin-top:0px;">
      

    <h3><i class="fa fa-tags" aria-hidden="true"></i>Your Work </h3>
    <?php  if(isset($_SESSION['errtime'])) echo $_SESSION['errtime'];?>

     <button type="button" class="btn btn-info " data-toggle="modal" data-target="#myModal" style="float:right; margin:-10px 20px 10px 0;">Create Work</button>

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
<div class="modal-dialog">

<!-- Modal content-->
 <form action="<?php echo BASE_DIR?>index/addtime" method="post">
<div class="modal-content">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title" style="color: #333333; font-weight: bolder;"><i class="fa fa-tags" aria-hidden="true"></i> Create Work</h4>
  </div>
  <div class="modal-body">
      <span style="font-weight: bolder">Tag's Name: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
      <select style="border-radius: 8px;" name="tag">
            <?php  foreach($tag as $t)
               { ?>
            <option value="<?php echo $t['id']; ?>"><?php echo $t['tentag'];?></option>
               <?php }?>
        </select>
      <br><br>
       <span style="font-weight: bolder">Time Start: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> 
       <input type="datetime-local" name="timestart" id="timestart"  style="height: 25px; border-radius: 8px; width: 180px;" required>
       <br><br>
       <span style="font-weight: bolder">Time End: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> 
       <input type="datetime-local" name="timeend" id="timeend"  style="height: 25px; border-radius: 8px;width: 180px;" required>
       <br><br>
       <span style="font-weight: bolder">Priority: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
        <select style="border-radius: 8px; width: 100px;" name="priority">
            <option value="1"> High </option>
            <option value="2"> Medium </option>
            <option value="3"> Low </option>
        </select>
  </div>
  <div class="modal-footer">
    
    <button type="button" class="btn btn-default" data-dismiss="modal" id="btnadd">Close</button>
    <button type="submit" name="add" id="add" class="btn btn-dropbox">Create</button>
  </div>
</div>
       </form>

</div>

</div>



  <div class="row mt">
    <div class="col-lg-12">
              <div class="content-panel">
              <h4><i class="fa fa-angle-right"></i> List Tags</h4>
                  <section id="unseen">
                    <table id="example" class="display" cellspacing="0" width="100%">
                      <thead>
                      <tr>
                          <th style="text-align: center;" class="numeric">Number</th>
                          <th style="text-align: center;" class="numeric">Name Of Tag</th>
                          <th style="text-align: center;" class="numeric">Time Start</th>
                          <th style="text-align: center;" class="numeric">Time End</th>
                          <th style="text-align: center;" class="numeric">Remaining Time</th>
                          <th style="text-align: center;" class="numeric">Priority</th>
                          <th class="numeric">Edit</th>
                      </tr>
                      </thead>
                      <tbody>
                      
               <?php 
               $stt=1;
               foreach($managetime as $t)
               {
                   $timeend = strtotime($t['timeend']);
                   $timenow = time();
                   $trangthai = $timeend -$timenow;
                   $time = floor((($trangthai)/60/60))." Hours ".Round((($trangthai)/60%60))." Mins";
                   if($t['status'] ==1 )
                   {
                    ?>
                        <tr>
                            <td style="text-align: center;"><?php echo $stt++;?></td>
                            <td style="text-align: center;"><?php echo $t['tentag'];?></td>
                            <td style="text-align: center;"><?php echo $t['timestart'];?></td>
                            <td style="text-align: center;"><?php echo $t['timeend'];?></td>
                            <td style="text-align: center;"><?php echo $time;?></td>
                            <td style="text-align: center;">
                                <?php 
                                if($t['priority']==1) echo '<i class="fa fa-exclamation-triangle" aria-hidden="true" style="color:red;"> High</i>';
                                elseif($t['priority']==2) echo '<i class="fa fa-pied-piper" aria-hidden="true" style="color: #269abc;"> Medium</i>';   
                                elseif($t['priority']==3) echo '<i class="fa fa-child" aria-hidden="true" style="color: green;"> Low</i>';
                                    ?></td>
                            <td> 
                                <a href='#' class="xoa" onclick="myFunction(this)" id="<?php echo $t['id']; ?>"> <i class="fa fa-trash-o" aria-hidden="true" style="font-size: 20px; color: red;"></i> </a>
                               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                               <a href='#' class="check" onclick="myFunction2(this)" id="<?php echo $t['id']; ?>"> <i class="fa fa-play" aria-hidden="true" style="font-size: 20px; color: green;"></i> </a>
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
               <?php }
               
               elseif($t['status'] ==2) { ?>
               
                        
                    <tr>
                            <td style="text-align: center;color: red; font-weight: bolder;"><?php echo $stt++;?></td>
                            <td style="text-align: center;color: red;font-weight: bolder;"><?php echo $t['tentag'];?></td>
                            <td style="text-align: center;color: red;font-weight: bolder;"><?php echo $t['timestart'];?></td>
                            <td style="text-align: center;color: red;font-weight: bolder;"><?php echo $t['timeend'];?></td>
                            <td style="text-align: center;color: red;font-weight: bolder;"><?php echo $time;?></td>
                            <td style="text-align: center;color: red;font-weight: bolder;">
                                <?php 
                                if($t['priority']==1) echo '<i class="fa fa-exclamation-triangle" aria-hidden="true" style="color:red;"> High</i>';
                                elseif($t['priority']==2) echo '<i class="fa fa-pied-piper" aria-hidden="true" style="color: #269abc;"> Medium</i>';   
                                elseif($t['priority']==3) echo '<i class="fa fa-child" aria-hidden="true" style="color: green;"> Low</i>';
                                    ?></td>
                            <td> 
                              
                               <a href='#' onclick="myFunction3(this)" class="check" id="<?php echo $t['id']; ?>"> <i class="fa fa-check" aria-hidden="true" style="font-size: 20px; color: green;"></i> </a>
                            
                           
                            </td>
                        </tr>
                        
                        
                        
               <?php }}?>
                  
                          
                     

                    
                      </tbody>
                  </table>
                  </section>
          </div><!-- /content-panel -->
       </div><!-- /col-lg-4 -->     
</div><!-- /row -->


</section>
<script>
$(document).ready(function() {
$('table.display2').DataTable();
} );
</script>
<script>
//                 $(document).ready(function() {
//                    $(".xoa").click(function(){
//                       var id = $(this).attr("id");
//                       var hoi =confirm("Are you sure to delete??");
//                       if(hoi==true)
//                       {
//                       window.location="<?php echo BASE_DIR?>index/xoatime/" +id;
//                   }
//                   else  return false;
//                    });
//                   $(".check").click(function(){
//                       var id = $(this).attr("id");
//                       var hoi =confirm("Are you sure to Start??");
//                       if(hoi==true)
//                       {
//                       window.location="<?php echo BASE_DIR?>index/updatetime/" +id;
//                   }
//                   else  return false;
//                    });
//                 });
//                 
                  function myFunction(oObject)
                 {
                       var id = oObject.id;
                       var hoi =confirm("Are you sure to delete?");
                       if(hoi==true)
                       {
                       window.location="<?php echo BASE_DIR?>index/xoatime/" +id;
                        }
                        else return false;
                 }
                 function myFunction2(oObject)
                 {
                       var id = oObject.id;
                       var hoi =confirm("Are you sure to Start?");
                       if(hoi==true)
                       {
                       window.location="<?php echo BASE_DIR?>index/updatetime/" +id;
                        }
                        else return false;
                 }
                 function myFunction3(oObject)
                 {
                       var id = oObject.id;
                       var hoi =confirm("Are you sure you have completed?");
                       if(hoi==true)
                       {
                       window.location="<?php echo BASE_DIR?>index/endtime/" +id;
                        }
                        else return false;
                 }
                        </script>
                        <script>
  webshims.setOptions('waitReady', false);
  webshims.setOptions('forms-ext', {types: 'datetime-local'});
  webshims.polyfill('forms forms-ext');
  
  $(document).ready(function() {
    $('#example').DataTable( {
        columnDefs: [ {
            targets: [ 0 ],
            orderData: [ 0, 1 ]
        }, {
            targets: [ 1 ],
            orderData: [ 1, 0 ]
        }, {
            targets: [ 4 ],
            orderData: [ 4, 0 ]
        } ]
    } );
} );
</script>
