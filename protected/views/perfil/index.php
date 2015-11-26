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
                        <h3 class="box-title">Perfil de usuario : </h3><b> <?php echo $model->nombres_admin, $model->apellidos_admin ?></b>
                        <div class="box-tools pull-right">
                            <input class="btn btn-primary" type="button" value="Editar" onclick="habilitar()"/>

                        </div><!-- /.box-tools -->
                    </div><!-- /.box-header -->
                    <div class="box-body" >
                        <div class="col-md-2">
                            <div class="center-block imagen">
                                <img src="<?php echo Yii::app()->request->baseUrl; ?>/<?php echo $model->perfil_admin ?>"  class="img-thumbnail" alt="Imagen de usuario" />
                                </br>
                                </br>
                                <?php $this->widget('ext.EAjaxUpload.EAjaxUpload', array(
                                    'id' => 'uploadFile',
                                    'config' => array(
                                        'action' => Yii::app()->createUrl('perfil/upload/',array('id'=>$model->rut_admin)),
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

                            <script>
                                function habilitar(){
                                    document.getElementById('uno').disabled=false;
                                    document.getElementById('dos').disabled=false;
                                    document.getElementById('tres').disabled=false;
                                    document.getElementById('cuatro').disabled=false;
                                    document.getElementById('cinco').disabled=false;
                                    document.getElementById('seis').disabled=false;
                                    document.getElementById('siete').disabled=false;
                                }
                            </script>
                        </div>
                        <div class="col-md-10">
                            <div class="input-group col-xs-12 col-md-6 col-lg-6" style="margin-bottom: 20px">
                                <span class="input-group-addon" id="basic-addon1">Nombres: </span>
                                <?php echo $form->textField($model,'nombres_admin',array('class'=>'form-control','disabled'=>'true','tabindex'=>2,'id'=>'uno' )); ?>
                            </div>
                            <div class="input-group col-xs-12 col-md-6 col-lg-6" style="margin-bottom: 20px">
                                <span class="input-group-addon" id="basic-addon1">Apellidos: </span>
                                <?php echo $form->textField($model,'apellidos_admin',array('class'=>'form-control','disabled'=>'true','tabindex'=>2,'id'=>'dos' )); ?>
                            </div>
                            <div class="input-group col-xs-12 col-md-6 col-lg-6" style="margin-bottom: 20px">
                                <span class="input-group-addon" id="basic-addon1"><i class="fa fa-lock"></i></span>
                                <?php echo $form->passwordField($model,'contrasena_admin', array('class'=>'form-control','disabled'=>'true', 'tabindex'=>3,'id'=>'tres')); ?>
                            </div>
                            <div class="input-group col-xs-12 col-md-6 col-lg-6" style="margin-bottom: 20px">
                                <span class="input-group-addon" id="basic-addon1"><i class="fa fa-lock"></i></span>
                                <?php echo $form->textField($model,'nombres_admin', array('class'=>'form-control','disabled'=>'true', 'tabindex'=>4, 'placeholder'=>'Ingrese la nueva contraseña','id'=>'cuatro')); ?>
                            </div>
                            <div class="input-group col-xs-12 col-md-6 col-lg-6" style="margin-bottom: 20px">
                                <span class="input-group-addon" id="basic-addon1"><i class="fa fa-lock"></i></span>
                                <?php echo $form->textField($model,'apellidos_admin', array('class'=>'form-control','disabled'=>'true', 'tabindex'=>5, 'placeholder'=>'Repita la nueva contraseña','id'=>'cinco')); ?>
                            </div>
                            <div class="input-group col-xs-12 col-md-6 col-lg-6" style="margin-bottom: 20px">
                                <span class="input-group-addon" id="basic-addon1"><i class="fa fa-at"></i></span>
                                <?php echo $form->textField($model,'correo_admin', array('class'=>'form-control','disabled'=>'true', 'tabindex'=>5, 'placeholder'=>'Repita la nueva contraseña','id'=>'seis')); ?>
                            </div>
                            <div class="input-group col-xs-12 col-md-6 col-lg-6" style="margin-bottom: 20px">
                                <span class="input-group-addon" id="basic-addon1"><i class="fa fa-phone"></i></span>
                                <?php echo $form->textField($model,'telefono_admin', array('class'=>'form-control','disabled'=>'true', 'tabindex'=>5, 'placeholder'=>'Repita la nueva contraseña','id'=>'siete')); ?>
                            </div>
                        </div>



                    </div><!-- /.box-body -->
                    <div class="box-footer">
                        <?php
                        $data = explode('-',$model->rut_admin);

                        echo CHtml::link("Actualzar", array("update",'id'=>$data[0]), array('class'=>'btn btn-primary')); ?>


                    </div><!-- box-footer -->
                </div><!-- /.box -->
            </div>
        </div>
            <div class="row">

            </div>
        <?php $this->endWidget(); ?>
    </section>
</div>

