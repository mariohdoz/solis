<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Configuración
            <small>Perfil de usuario.</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="?r=intra/index">
                    <i class="fa fa-dashboard"></i>Inicio</a></li>
            <li class="active">Configuración Usuario</li>
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
                <div class="box  box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Perfil de usuario   <?php echo $model->rut_admin; ?></h3>
                        <div class="box-tools pull-right">
                            <!-- Buttons, labels, and many other things can be placed here! -->
                            <!-- Here is a label for example -->

                        </div><!-- /.box-tools -->
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <div class="pull-right image">
                            <img src="<?php echo Yii::app()->request->baseUrl; ?>/<?php echo Yii::app()->session['admin_img']; ?>" style="margin-right: 50px" class="img-thumbnail" alt="Imagen de usuario" />

                        </div>
                        <div class="input-group col-md-4" style="margin-bottom: 20px">
                            <span class="input-group-addon" id="basic-addon1"><i class="fa fa-user"></i></span>
                            <input type="text" class="form-control" placeholder="Nombres" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group col-md-4" style="margin-bottom: 20px">
                            <span class="input-group-addon" id="basic-addon1"><i class="fa fa-user"></i></span>
                            <input type="text" class="form-control" placeholder="Apellidos" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group col-md-4" style="margin-bottom: 20px">
                            <span class="input-group-addon" id="basic-addon1"><i class="fa fa-lock"></i></span>
                            <input type="text" class="form-control" placeholder="Contraseña actual" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group col-md-4" style="margin-bottom: 20px">
                            <span class="input-group-addon" id="basic-addon1"><i class="fa fa-lock"></i></span>
                            <input type="text" class="form-control" placeholder="Nueva contraseña" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group col-md-4" style="margin-bottom: 20px">
                            <span class="input-group-addon" id="basic-addon1"><i class="fa fa-lock"></i></span>
                            <input type="text" class="form-control" placeholder="Confirmar Contraseña" aria-describedby="basic-addon1">
                        </div>




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

