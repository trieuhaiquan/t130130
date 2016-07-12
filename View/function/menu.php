 <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
                  <p class="centered"><a href="profile.html"><i class="fa fa-clock-o" aria-hidden="true" style="font-size: 40px; color: #68dff0;"></i></a></p>
              	  <h5 class="centered">K19T1 - TEAM 3</h5>
              	  	
                  <li class="mt">
                      <a  class="<?php echo $this->current_action=='trangchu'?'active':'' ?>" href="<?php echo BASE_DIR?>index/trangchu">
                          <i class="fa fa-dashboard"></i>
                          <span>Index</span>
                      </a>
                  </li>
<!--                     echo BASE_DIR?>index/managetime-->

                    <li><a  href="<?=BASE_DIR?>index/managetag" class="<?php echo $this->current_action=='managetag'?'active':'' ?>"><i class="fa fa-tags" aria-hidden="true"></i> Manage Tags</a></li>
                    <li class="sub-menu"> <a  href="javascript:;" class="<?php echo $this->current_action=='managetime'?'active':'' ?>">
                            <i class="fa fa-calendar" aria-hidden="true"></i>Manage Time</a>
                            <ul class="sub">
                          <li class="<?php echo $this->current_action=='managetime'?'active':'' ?>"><a  href="<?=BASE_DIR?>index/managetime">Your Work List</a></li>
                          <li class="<?php echo $this->current_action=='workdone'?'active':'' ?>"><a  href="<?=BASE_DIR?>index/workdone">Your Work Done</a></li>
                             </ul>
                    
                    </li>
                    <li>
                      <a  class="<?php echo $this->current_action=='report'?'active':'' ?>" href="<?php echo BASE_DIR?>index/report">
                      <i class=" fa fa-bar-chart-o"></i>
                          <span>Report</span>
                      </a>
                  </li>
              </ul>
              <!-- sidebar menu end-->
          </div>