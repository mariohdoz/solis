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
                            <?php echo CHtml::link("<i class='fa fa-pencil'></i>&nbsp;&nbsp;Editar ", '#', array(
                                    'submit'=>array('/propiedad/generarpdf'),
                                    'class'=>'btn btn-primary',
                                )
                            );?>

                        </div><!-- /.box-tools -->
                    </div><!-- /.box-header -->
                    <div class="box-body" >
                        <div class="col-md-2">
                            <div class="center-block imagen">
                                <img src="<?php echo Yii::app()->request->baseUrl; ?>/<?php echo Yii::app()->session['admin_img']; ?>"  class="img-thumbnail" alt="Imagen de usuario" />
                                </br>
                                </br>
                                <?php $this->widget('ext.EAjaxUpload.EAjaxUpload', array(
                                    'id' => 'uploadFile',
                                    'config' => array(
                                        'action' => Yii::app()->createUrl('propiedad/upload/',array('id'=>$model->rut_admin)),
                                        'allowedExtensions' => array("jpg","jpeg","gif","png"), //array("jpg","jpeg","gif","exe","mov" and etc...
                                        'sizeLimit' => 10 * 1024 * 1024, // maximum file size in bytes
                                        'buttonText' => 'Selección',
                                        //'minSizeLimit'=>10*1024*1024,// minimum file size in bytes
                                        //'onComplete'=>"js:function(id, fileName, responseJSON){ alert(fileName); }",
                                        'messages' => array(
                                            'typeError' => "{file} posee una extención invalida. se acepta solamente {extensions}.",
                                            'sizeError' => "{file} is too large, maximum file size is {sizeLimit}.",
                                            'minSizeError' => "{file} is too small, minimum file size is {minSizeLimit}.",
                                            'emptyError' => "{file} is empty, please select files again without it.",
                                            'onLeave' => "Los archivos seleccionados se están subiendo al servidor. si usted deja la página la carga será cancelada."
                                        ),
                                        'showMessage' => "js:function(message){ alert(message); }"
                                    )
                                ));
                                ?>
                            </div>
                            <script>
                                $("#Funcionario_rut_funcionario").Rut({
                                    on_error: function(){
                                        alert('El RUT ingresado es incorrecto.');
                                        $("#Funcionario_rut_funcionario").val('');
                                    },
                                })
                                $("#Funcionario_rut_funcionario").click(function(){
                                    $("#Funcionario_rut_funcionario").val('');
                                })

                                $("#Funcionario_repeat_pass").keyup(function(){
                                    if ($("#Funcionario_repeat_pass").val()!== $('#Funcionario_contrasena_funcionario').val() ) {
                                        if (!$("#box").hasClass('has-error')) {
                                            $("#box").toggleClass(' has-error');
                                        }
                                        if ($("#box").hasClass('has-success')) {
                                            $("#box").toggleClass('has-success');
                                        }
                                    }else {
                                        if ($("#box").hasClass('has-error')) {
                                            $("#box").toggleClass(' has-error');
                                        }
                                        if (!$("#box").hasClass('has-success')) {
                                            $("#box").toggleClass('has-success');
                                        }
                                    }
                                });
                            </script>
                        </div>
                        <div class="col-md-10">
                            <div class="input-group col-xs-12 col-md-6 col-lg-6" style="margin-bottom: 20px">
                                <span class="input-group-addon" id="basic-addon1">Nombres: </span>
                                <?php echo $form->textField($model,'nombres_admin',array('class'=>'form-control','disabled'=>'true', 'placeholder'=>Yii::app()->session['admin_nombre'])); ?>
                            </div>
                            <div class="input-group col-xs-12 col-md-6 col-lg-6" style="margin-bottom: 20px">
                                <span class="input-group-addon" id="basic-addon1">Apellidos: </span>
                                <?php echo $form->textField($model,'nombres_admin',array('class'=>'form-control','disabled'=>'true', 'placeholder'=>Yii::app()->session['admin_ape'])); ?>
                            </div>
                            <div class="input-group col-xs-12 col-md-6 col-lg-6" style="margin-bottom: 20px">
                                <span class="input-group-addon" id="basic-addon1"><i class="fa fa-lock"></i></span>
                                <?php echo $form->textField($model,'nombres_admin', array('class'=>'form-control','disabled'=>'true', 'placeholder'=>Yii::app()->session['admin_ape'], 'tabindex'=>3)); ?>
                            </div>
                            <div class="input-group col-xs-12 col-md-6 col-lg-6" style="margin-bottom: 20px">
                                <span class="input-group-addon" id="basic-addon1"><i class="fa fa-lock"></i></span>
                                <?php echo $form->textField($model,'nombres_admin', array('class'=>'form-control','disabled'=>'true', 'tabindex'=>4)); ?>
                            </div>
                            <div class="input-group col-xs-12 col-md-6 col-lg-6" style="margin-bottom: 20px">
                                <span class="input-group-addon" id="basic-addon1"><i class="fa fa-lock"></i></span>
                                <?php echo $form->textField($model,'apellidos_admin', array('class'=>'form-control','disabled'=>'true', 'tabindex'=>5)); ?>
                            </div>
                        </div>



                    </div><!-- /.box-body -->
                    <div class="box-footer">
                        <?php echo CHtml::link("Guardar &nbsp;&nbsp;<i class='fa fa-save'></i>", '#', array(
                                'submit'=>array('/propiedad/generarpdf'),
                                'class'=>'btn btn-success',
                            )
                        );?>
                    </div><!-- box-footer -->
                </div><!-- /.box -->
            </div>
        </div>
            <div class="row">

            </div>
        <?php $this->endWidget(); ?>
    </section>
</div>

