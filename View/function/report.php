              

  <section class="wrapper" style="margin-top:0px;">
      <h3 class="h3"> <i class="fa fa-arrow-right" aria-hidden="true"></i> Choose Time Or Tag To Report</h3>
      <form action="<?=BASE_DIR?>index/searchreport" method="post">
          
        <span style="font-weight: bolder">Tag: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> 
        <select name="tag" >
            <option value=""> </option>
            <?php foreach($tag as $t){?>
            <option value="<?=$t['id']?>"> <?=$t['tentag']?> </option>
            <?php }?>
        </select> 
        <br>
        <br>
        <span style="font-weight: bolder">Time Start: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> 
        <input type="date" name="start" id="start"  style="height: 25px; border-radius: 8px; width: 180px;" required>
        <br>
        <br>
        <span style="font-weight: bolder">Time Start: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> 
        <input type="date" name="end" id="end"  style="height: 25px; border-radius: 8px; width: 180px;" required>
        <br>
        <br>
        <input type="submit" name="submit" value=" Report " class="btn btn-dropbox" style="background-color: #68dff0; color:white;" >
        
      </form>
      <?php  if(isset($_SESSION['search']))
      {
          ?>
      <a href="<?=BASE_URL?>index/export" class="btn btn-dropbox" style="background-color: red; color:white; float: right;margin-bottom: 10px;" >Export Excel </a>
      <?php }
?>
<div id="morris">
                  <div class="row mt">

                      <div class="col-lg-12">
                          <div class="content-panel">
                              <h4><i class="fa fa-angle-right"></i> Chart Example 2</h4>
                              <div class="panel-body">
                                  <div id="hero-bar" class="graph"></div>
                              </div>
                          </div>
                      </div>
                  </div>

</div>
  </section>    
<script>
      webshims.setOptions('waitReady', false);
      webshims.setOptions('forms-ext', {types: 'date'});
      webshims.polyfill('forms forms-ext');
    </script>
    
    <?php if(isset($_SESSION['search'])) {
        $search = $_SESSION['search'];
        
        ?>
    <script>
        var Script = function () {

    //morris chart

    $(function () {
      Morris.Bar({
        element: 'hero-bar',
        data: [
            <?php foreach($search as $s) {
                $timereal = round(($s['totaltimereal']/3600),1);
                $timeestimate = round(($s['totalestimate']/3600),1);
                ?>
                { y: "<?=$s['datestart']?>", a: <?=$timereal?>, b: <?=$timeestimate?> },
            <?php }?>
        ],
        xkey: 'y',
        ykeys: ['a', 'b'],
        labels: ['Time Real', 'Time Estimate']
      });
    });

}();

        </script>
    <?php } ?>

