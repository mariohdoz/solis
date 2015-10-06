<!doctype html>
<html lang="en" class="no-js">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
      <link rel="import" href="https://www.polymer-project.org/0.5/components/paper-ripple/paper-ripple.html">
      <link rel="stylesheet" href="/nuevo/css/reset.css"> <!-- CSS reset -->
      <link rel="stylesheet" href="/nuevo/css/style.css"> <!-- Resource style -->
      <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/modernizr.js"></script> <!-- Modernizr -->
      <title>Buscar propiedad</title>
  </head>
  <body>
    <header class="cd-header2">
      <div id="cd-logo"><a href="#0"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logoV2.png" width="150px" height="50px" alt="Logo"></a></div>
      <nav class="main-nav">
      <ul>
      <!-- inser more links here -->
      <li><?php echo CHtml::link('Volver', array('site'), array('class'=>'cd-signin'))?></li>
      </ul>
      </nav>
    </header>
    <main class="cd-main-content">
      <div class="cd-tab-filter-wrapper">
        <div class="cd-tab-filter">
          <ul class="cd-filters">
            <li class="placeholder">
              <a data-type="all" href="#0">Buscar Propiedades</a> <!-- selected option on mobile -->
            </li>
            <li class="filter">
              <a class="selected" href="#0" data-type="all">Buscar Propiedades</a>
            </li>
          </ul> <!-- cd-filters -->
        </div> <!-- cd-tab-filter -->
      </div>
      <section class="cd-gallery">
        <ul>
          <li class="mix color-1 check1 radio2 option3"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/p2.jpg" alt="Image 1"></li>
          <li class="mix color-2 check2 radio2 option2"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/p3.jpg" alt="Image 2"></li>
          <li class="mix color-1 check3 radio3 option1"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/p4.jpg" alt="Image 3"></li>
          <li class="mix color-1 check3 radio2 option4"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/p2.jpg" alt="Image 4"></li>
          <li class="mix color-1 check1 radio3 option2"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/p3.jpg" alt="Image 5"></li>
          <li class="mix color-2 check2 radio3 option3"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/p4.jpg" alt="Image 6"></li>
          <li class="mix color-2 check2 radio2 option1"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/p2.jpg" alt="Image 7"></li>
          <li class="mix color-1 check1 radio3 option4"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/p3.jpg" alt="Image 8"></li>
          <li class="mix color-2 check1 radio2 option3"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/p2.jpg" alt="Image 9"></li>
          <li class="gap"></li>
          <li class="gap"></li>
          <li class="gap"></li>
        </ul>
      <div class="cd-fail-message">No hay resultados</div>
      </section> <!-- cd-gallery -->
      <?php echo $content; ?>
      <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-2.1.1.js"></script>
      <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.mixitup.min.js"></script>
      <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/mainb.js"></script> <!-- Resource jQuery -->
    </main>
  </body>
</html>
