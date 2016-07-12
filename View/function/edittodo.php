             <div class="modal fade" id="a<?php echo $do['id']?>" role="dialog">
                                              <div class="modal-dialog">


                                                <!-- Modal content-->
                                                <form class="form-horizontal tasi-form" action="<?php echo BASE_DIR?>index/edittodo/<?php echo $do['id']?>" method="post" id="sm">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">Edit To Do List  </h4>
                                                  </div>
                                                  <div class="modal-body">
                                                    
                                                     
                                                            <div class="form-group has-success">
                                                                <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Your Work</label>

                                                                <div class="col-lg-10">
                                                                    <input type="text" class="form-control" id="NoiDung" name="NoiDung" value="<?php echo $do['work']?>" required>
                                                                    

                                                                </div>
                                                            </div>
                                                            <div class="form-group has-success">
                                                                <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Your Time Start</label>
                                                                <div class="col-lg-10">     

                                                                    <input type="time" class="form-control" id="NoiDung" name="stime" value="<?php echo $do['stime']?>" style="width: 150px;" required>  
                                                                    
                                                                </div>
                                                            </div>
                                                            <div class="form-group has-success">
                                                                <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Your Time End</label>
                                                                <div class="col-lg-10">     

                                                                    <input type="time" class="form-control" id="NoiDung" name="etime" value="<?php echo $do['etime']?>" style="width: 150px;" required>   
                                                                </div>
                                                            </div>

                                                             <div class="form-group has-success">
                                                                <label style="margin-top: 15px;" class="col-sm-2 control-label col-lg-2" for="inputSuccess">Date</label>
                                                                <div class="col-lg-10">     

                                                                    <select class="form-panel" name="date" id="ThuTu">
                                                                                  <option value="1">Today</option>
                                                                                    <option value="2">Tomorrow</option>

                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group has-success">
                                                                <label style="margin-top: 15px;" class="col-sm-2 control-label col-lg-2" for="inputSuccess">Work's Priority </label>
                                                                <div class="col-lg-10">
                                                                  <select class="form-panel" name="ThuTu" id="ThuTu">
                                                                                    <option value="1" <?php if($do['capdo']==1) echo'selected';?> >High</option>
                                                                                    <option value="2" <?php if($do['capdo']==2) echo'selected';?>>Normal</option>
                                                                                    <option value="3" <?php if($do['capdo']==3) echo'selected';?>>Low</option>
                                                                  </select>
                                                                </div>
                                                                
                                                            </div>
                                                       
                                                        

                                                      
                                                  </div>
                                                  <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                     <input type="submit" class="btn btn-success pull-right" href="#"  name="sm" id="sm" style="width: 100px; margin-right: 10px;" value="Update">
                                                    
                                                  
                                                  </div>
                                                </div>
                                                   </form>                             
                                              </div>
                                            </div>