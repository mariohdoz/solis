<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Configuraci�n
            <small>Perfil de usuario.</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="?r=intra/index">
                    <i class="fa fa-dashboard"></i>Inicio</a></li>
            <li class="active">Configuraci�n Usuario</li>
        </ol>
    </section>
    <section class="content">
        <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'admin-form',
            // Please note: When you enable ajax validation, make sure the corresponding
            // controller action is handling ajax validation correctly.
            // There is a call to performAjaxValidation() commented in generated controller code.
            // See class documentation of CActiveForm for details on this.
            'enableAjaxValidation'=>false,
        )); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="box box-solid box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Default Box Example</h3>
                        <div class="box-tools pull-right">
                            <!-- Buttons, labels, and many other things can be placed here! -->
                            <!-- Here is a label for example -->

                        </div><!-- /.box-tools -->
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        The body of the box
                    </div><!-- /.box-body -->
                    <div class="box-footer">
                        The footer of the box
                    </div><!-- box-footer -->
                </div><!-- /.box -->
            </div>
        </div>
            <div class="row">

            </div>
        <?php $this->endWidget(); ?>
    </section>
</div>

