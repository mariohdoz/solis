<?php
/* @var $this ClienteController */
/* @var $model Cliente */

$this->breadcrumbs=array(
	'Clientes'=>array('index'),
	'Create',
);
?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>Configuración<small>Registrar Propietario</small></h1>
        <ol class="breadcrumb">
            <li><a href="?r=intra/index">
            <i class="fa fa-dashboard"></i>Inicio</a></li>
            <li class="active">Clientes</li>
            <li><a href="?r=intra/index">Gestión</a></li>
            <li class="active">Registrar Propietario</li>
        </ol>
    </section>
    <section class="content">
			<?php $this->renderPartial('_form', array('model'=>$model)); ?>
		</section>
</div>
