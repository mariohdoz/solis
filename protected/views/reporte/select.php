<div class="content-wrapper" style="min-height: 1126px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Ganacias
            <small> Propiedad </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li><a href="#" class="active">Ganancias</a></li>
        </ol>
    </section>



    <!-- Main content -->
    <section class="invoice">
        <!-- title row -->
        <div class="row">
            <div class="col-xs-12">
                <h2 class="page-header">
                    <span class="logo-lg"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/LogoV2.png" width="150px" height="50px"></span> Propiedades Sol y Cobre.
                    <small class="pull-right"> <?php
                        setlocale(LC_TIME, 'Spanish_Chile'); Echo iconv('ISO-8859-1', 'UTF-8', strftime('Calama, %A %d de %B de %Y '))
                        ?></small>
                </h2>
            </div>
            <!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">
            <div class="col-sm-6 invoice-col">
                Desde
                <address>
                    <strong>Propiedades Sol y Cobre.</strong><br>
                    Dirección : Pasaje Laatorre N°#1291 Villa Chica<br>
                    Calama.<br>
                    Teléfono: (+56) 9 88357413<br>
                    Email: solycobre@gmail.com
                </address>
            </div>
            <!-- /.col -->

            <!-- /.col -->
            <div class="col-sm-6 invoice-col">
                <b>Arriendo #007612</b><br>
                <br>
                <b>ID Arriendo:</b> 4F3S8J<br>
                <b>Fecha:</b><?php setlocale(LC_TIME, 'Spanish_Chile'); Echo iconv('ISO-8859-1', 'UTF-8', strftime('  %d/ %m/ %Y ')) ?>
                <br>

            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- Table row -->
        <div class="row">
            <div class="col-xs-12 table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Qty</th>
                        <th>Product</th>
                        <th>Serial #</th>
                        <th>Description</th>
                        <th>Subtotal</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td>Call of Duty</td>
                        <td>455-981-221</td>
                        <td>El snort testosterone trophy driving gloves handsome</td>
                        <td>$64.50</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Need for Speed IV</td>
                        <td>247-925-726</td>
                        <td>Wes Anderson umami biodiesel</td>
                        <td>$50.00</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Monsters DVD</td>
                        <td>735-845-642</td>
                        <td>Terry Richardson helvetica tousled street art master</td>
                        <td>$10.70</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Grown Ups Blue Ray</td>
                        <td>422-568-642</td>
                        <td>Tousled lomo letterpress</td>
                        <td>$25.99</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
            <!-- accepted payments column -->
            <div class="col-xs-6">
                <p class="lead">Métodos de pago</p>
                Sandra Marisol Campusano Araya<br>
                Cuenta Vista o Chequera  Electrónica<br>
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/cuentarut.png" alt="Cuenta" width="40px" height="25px"> Banco Estado  N° 021-7-090293-1<br>


                <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                    Los valores son expresados en pesos chilenos
                </p>
            </div>
            <!-- /.col -->
            <div class="col-xs-6">
                <p class="lead">Detalle a la fecha <?php setlocale(LC_TIME, 'Spanish_Chile'); Echo iconv('ISO-8859-1', 'UTF-8', strftime('  %d/ %m/ %Y ')) ?></p>

                <div class="table-responsive">
                    <table class="table">
                        <tbody><tr>
                            <th style="width:50%">Subtotal:</th>
                            <td>$250.30</td>
                        </tr>
                        <tr>
                            <th>comisión (10%)</th>
                            <td>$10.34</td>
                        </tr>
                        <tr>
                            <th>Gastos:</th>
                            <td>$5.80</td>
                        </tr>
                        <tr>
                            <th>Total:</th>
                            <td>$265.24</td>
                        </tr>
                        </tbody></table>
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- this row will not appear when printing -->
        <div class="row no-print">
            <div class="col-xs-12">
                <a href="·" target="_blank" onclick="javascript:window.print()" class="btn btn-default"><i class="fa fa-print"></i> Imprimir</a>

                <div ><?php echo CHtml::link("<i class='fa fa-download'></i> &nbsp;&nbsp; Descargar PDF", '#', array(
                            'submit'=>array('/reporte/gananciapdf'),
                            'class'=>'btn btn-primary pull-right',
                        )
                    );?>

                 </div>
        </div>
    </section>
    <!-- /.content -->
    <div class="clearfix"></div>
</div>
