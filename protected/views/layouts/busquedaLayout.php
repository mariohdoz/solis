<!doctype html>
<html lang="en" class="no-js">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
      <link rel="import" href="https://www.polymer-project.org/0.5/components/paper-ripple/paper-ripple.html">
      <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/reset.css"> <!-- CSS reset -->
      <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css"> <!-- Resource style -->
      <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/modernizr.js"></script> <!-- Modernizr -->
      <title>Buscar propiedad</title>
  </head>
  <body>
    <header class="cd-header2">
      <div id="cd-logo"><a href="#0"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logoV2.png" width="150px" height="50px" alt="Logo"></a></div>
     
    </header>
    <main class="cd-main-content">
      <div class="cd-tab-filter-wrapper">
        <div class="cd-tab-filter">
          <ul class="cd-filters">
            <li class="placeholder">
              <a data-type="all" href="#0">Buscar</a> <!-- selected option on mobile -->
            </li>
            <li class="filter">
              <a class="selected" href="#0" data-type="all">Buscar</a>
            </li>
          </ul> <!-- cd-filters -->
        </div> <!-- cd-tab-filter -->
      </div>

      </section> <!-- cd-gallery -->
      <?php echo $content; ?>
      <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-2.1.1.js"></script>
      <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.mixitup.min.js"></script>
      <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/mainb.js"></script> <!-- Resource jQuery -->
    </main>
  </body>
</html>
