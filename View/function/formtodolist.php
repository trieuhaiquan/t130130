 <?php if(isset($_SESSION['err'])) echo $_SESSION['err'];?>
                <h3 style="margin-left: 20px;margin-bottom: 20px;"> <i class="fa fa-pencil"></i> Create Your To Do List</h3>
          		<div class="col-lg-12">
          			<div class="form-panel">
                  	  <h4 class="mb"><i class="fa fa-angle-right"></i> Create List</h4>
                          <form class="form-horizontal tasi-form" action="addtodolist" method="post" id="createlist">
                              <div class="form-group has-success">
                                  <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Your Work</label>
                                  
                                  <div class="col-lg-10">
                                      <input type="text" class="form-control" id="NoiDung" name="NoiDung" placeholder="input your new work" required>
                                 
                                  </div>
                              </div>
                              <div class="form-group has-success">
                                  <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Your Time Start</label>
                                  <div class="col-lg-10">     
                                  
                                      <input type="time" class="form-control" id="NoiDung" name="stime" style="width: 150px;" required>   
                                  </div>
                              </div>
                              <div class="form-group has-success">
                                  <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Your Time End</label>
                                  <div class="col-lg-10">     
                                  
                                      <input type="time" class="form-control" id="NoiDung" name="etime" style="width: 150px;" required>   
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
                              <div class="form-group has-warning">
                                  <label style="margin-top: 15px;" class="col-sm-2 control-label col-lg-2" for="inputWarning">Work's Priority</label>
                                  <div class="col-lg-10">
                                    <select class="form-panel" name="ThuTu" id="ThuTu">
                                                    <option value="1">High</option>
                                                      <option value="2">Normal</option>
                                                      <option value="3">Low</option>
                                    </select>
                                  </div>
                                    <div class="add-task-row" style="margin-right: 20px;">
                                  <a href="javascript:document.getElementById('createlist').reset()" style="width: 100px;" class="btn btn-warning pull-right">Cancel</a>
                                  <input type="submit" class="btn btn-success pull-right" href="#"  name="sm" id="sm" style="width: 100px; margin-right: 10px;" value="Save">
                                 </div>
                              </div>
                     
                          </form>
          			</div><!-- /form-panel -->
          		</div><!-- /col-lg-12 -->
          	