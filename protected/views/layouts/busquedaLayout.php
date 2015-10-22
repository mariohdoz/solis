<!doctype html>
<html lang="es" class="no-js">
  <head>

      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
      <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/reset.css"> <!-- CSS reset -->
      <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css"> <!-- Resource style -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
      <title>Buscar propiedad</title>
  </head>
  <body>
    <header class="cd-header2">
        <button class="btn btn-primary" data-toggle="modal" data-target="#filtrar">
            Filtrar Resultados
        </button>

        <div class="modal fade" id="filtrar" tabindex="-1" role="dialog" aria-labelledby="myModallabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4>Filtrar Resultados</h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal">

                            <div class="form-group form-group">
                                <label class="col-sm-4 control-label" for="formGroupInputLarge">Ciudad :</label>
                                <div class="col-sm-8">
                                    <select class="form-control" >
                                        <option >Calama</option>
                                        <option >Antofagasta</option>
                                        <option >Iquique</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group form-group">
                                <label class="col-sm-4 control-label" for="formGroupInputLarge">Estado </label>
                                <div class="col-sm-8">
                                    <select class="form-control" >
                                        <option >Todas</option>
                                        <option >En Venta</option>
                                        <option >En Arriendo</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group form-group">
                                <label class="col-sm-4 control-label" for="formGroupInputLarge">T&#237;po</label>
                                <div class="col-sm-8">
                                    <select class="form-control" >
                                        <option >Casa</option>
                                        <option >Departamento</option>
                                        <option >Oficina o casa Oficina</option>
                                        <option >Local o casa comercial</option>
                                        <option >Negocios</option>
                                        <option >Estacionamiento</option>
                                        <option >Bodega / Galp&#243;n</option>
                                        <option >Fundo / Parcela</option>
                                        <option >Sitio / Terreno</option>
                                        <option >Recidencial / Pieza</option>
                                        <option >Consultas</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group form-group">
                                <label class="col-sm-4 control-label" for="formGroupInputLarge">Ba&#241;os</label>
                                <div class="col-sm-8">
                                    <select class="form-control" >
                                        <option >1</option>
                                        <option >2</option>
                                        <option >3</option>
                                        <option >4</option>
                                        <option >5</option>
                                        <option >6</option>
                                        <option >7</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group form-group">
                                <label class="col-sm-4 control-label" for="formGroupInputLarge">Dormitorios</label>
                                <div class="col-sm-8">
                                    <select class="form-control" >
                                        <option >1</option>
                                        <option >2</option>
                                        <option >3</option>
                                        <option >4</option>
                                        <option >5</option>
                                        <option >6</option>
                                        <option >7</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group form-group">
                                <label class="col-sm-4 control-label" for="formGroupInputLarge">M2 Construidos</label>
                                <div class="col-sm-8">
                                    <select class="form-control" >
                                        <option >Todos</option>
                                        <option >60 +</option>
                                        <option >260 +</option>
                                        <option >360 +</option>
                                        <option >470 +</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group form-group">
                                <label class="col-sm-4 control-label" for="formGroupInputLarge">M2 Construidos</label>
                                <div class="col-sm-8">

                                </div>
                            </div>

                            <div class="form-group form-group">
                                <label class="col-sm-4 control-label" for="formGroupInputLarge">Amoblado</label>
                                <div class="col-sm-8">
                                    <label class="checkbox-inline">
                                        <input type="checkbox" id="inlineCheckbox1" value="option1">
                                    </label>
                                </div>
                            </div>

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary">Buscar</button>
                    </div>
                </div>
            </div>
        </div>
      <div id="cd-logo"><a href="#0"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logoV2.png" width="150px" height="50px" alt="Logo"></a></div>

    </header>
    <main class="cd-main-content">



      <?php echo $content; ?>

    </main>
  </body>
</html>
