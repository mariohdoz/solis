<div class="busqueda" id="templatemo_banner_slide">
</div>
<div class="container_wapper">
   <div id="templatemo_banner_menu">
      <div class="container-fluid">
         <div class="col-xs-4 templatemo_logo">
            <a href="?r=site">
            <img src="images/LogoV1.png" id="logo_img"  title="" />
            </a>
         </div>
         <div class="col-xs-3 hidden-xs">
            <ul class="nav nav-justified">
               <li></li>
               <li><?php $this->widget('application.ext.data.EBackButtonWidget'); ?></li>
            </ul>
         </div>
      </div>
      <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
      <script src="js/index.js"></script>
      </ul>
   </div>
   <div class="col-xs-8 visible-xs">
      <a href="#" id="mobile_menu"><span class="glyphicon glyphicon-th-list"></span></a>
   </div>
</div>
<div id="templatemo_about" class="container_wapper">
   <div class="container-fluid">
      <div class="row">

         <?php $this->widget('zii.widgets.CListView', array(
            'dataProvider'=>$dataProvider,
            'itemView'=>'_vista',
            'summaryText' => '',
            )); ?>
      </div>
   </div>
</div>
<!--buscar-->
