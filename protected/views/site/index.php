<header id="cd-placeholder-1" class="cd-header">
	<div id="cd-logo"><?php echo CHtml::link('<img src="'.Yii::app()->request->baseUrl.'/images/LogoV2.png" width="150px" height="50px" alt="Logo">',array('index')); ?></div>
	<nav class="main-nav">
		<ul>
			<!-- inser more l inks her e -->
			<?php if(!Yii::app()->session['activo']) {
				echo '<a class="cd-signin" href="#"><i class="fa fa-user"></i> | Iniciar Sesión</a>';
			}else {
				echo CHtml::link('<i class="fa fa-times"></i> | Cerrar sesión', array('Site/logout'), array('class'=>'cd-signin2'));
			}
			?>
		</ul>
	</nav>
</header>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.

)); ?>
<?php if(!Yii::app()->session['activo']){
	echo '<div class="cd-user-modal"> <!-- this is the entire modal form, including the background -->
			<div class="cd-user-modal-container"> <!-- this is the container wrapper -->
				<div id="cd-login"> <!-- log in form -->
					<div class="cd-form">';
	echo '  <p class="fieldset">
							<label class="image-replace cd-email" for="signin-email">E-mail</label>';
	echo $form->emailField($model,'correo', array("class"=>"full-width has-padding has-border", "placeholder"=>"Correo electrónico"));
	echo $form->error($model,'correo');
	echo '</p>
						<p class="fieldset">
							<label class="image-replace cd-password" >Password</label>';
	echo $form->passwordField($model,'password',array( "class"=>"full-width has-padding has-border", "placeholder"=>"Constraseña"));
	echo $form->error($model,'password');
	echo'</p>

						<p class="fieldset">
							<input class="full-width" type="submit" value="Iniciar sesión" />
						</p>
					</div>
					';
}
?>
<?php $this->endWidget(); ?>

<!-- <a href ="#0" class="cd-close-form">Close</a> -->
</div>		<!-- te rmina el inicio de sesion -->

<a href="#0" class="cd-close-form">Cerrar</a>
</div> <!-- cd-user-modal-container -->
</div> <!-- termin el inicio de sesion completo -->
<section id="cd-intro">
	<div id="cd-intro-tagline">
		<video autoplay loop id="video-background"  muted>
			<source  src="<?php echo Yii::app()->request->baseUrl; ?>/dist/video/video.mp4" type="video/mp4">
		</video>
		<div id="ent">

			<div id="content">

				<div class="container-fluid ">

					<?php $form=$this->beginWidget('CActiveForm', array(
						'id'=>'busqueda-form',
						'action'=>Yii::app()->createUrl('/site/busqueda'),
						// Please note: When you enable ajax validation, make sure the corresponding
						// controller action is handling ajax validation correctly.
						// There is a call to performAjaxValidation() commented in generated controller code.
						// See class documentation of CActiveForm for details on this.
						'enableAjaxValidation'=>false,
					)); ?>
					<div class="row">
						<h1>Buscar Propiedades</h1>

						<div class="col-md-3">
							<blanco>Venta/Arriendo</blanco>
							<?php echo $form->dropDownList($model2,'servicio_propiedad',
								array(
									'Todas' => 'Todas',
									'Venta' => 'Venta',
									'Arriendo' => 'Arriendo',
								),
								array("class"=>"form-control select2"),
								array('empty' => '(Tipo de propiedad)')); ?>
						</div>
						<div class="col-md-3">
							<blanco>Ciudad</blanco>
							<?php echo $form->dropDownList($model2,'comuna_propiedad',
								array(
									'Calama' => 'Calama',
									'Antofagasta' => 'Antofagasta',
									'Arica' => 'Arica',
									'Iquique' => 'Iquique',
								),
								array("class"=>"form-control select2"),
								array('empty' => '(Tipo de propiedad)')); ?>
						</div>
						<div class="col-md-3">
							<blanco>Típo de propiedad</blanco>
							<?php echo $form->dropDownList($model2,'tipo_propiedad',
								array(
									'Casa' => 'Casa',
									'Departamento Habitación' => 'Departamento Habitación',
									'Local' => 'Local',
									'Galpón' => 'Galpón',
									'Oficina Departamento' => 'Oficina Departamento',
									'Sitio Comercial' => 'Sitio Comercial',
									'Sitio Recidencial' => 'Sitio Recidencial',
									'Propiedad de inversión' => 'Propiedad de inversión',
									'Terreno' => 'Terreno'
								),
								array("class"=>"form-control select2"),
								array('empty' => '(Tipo de propiedad)')); ?>
						</div>
						<div class="col-md-3">
							<label> </label>
							<?php echo CHtml::submitButton('Buscar', array("class"=>" btn-buscar") ); ?>
						</div>
					</div>
					<br><br>
					<?php $this->endWidget(); ?>
				</div>
			</div>
		</div>


	</div> <!-- #cd-intro-tagline -->
</section> <!-- #cd-intro -->
<div class="cd-secondary-nav">
	<a href="#0" class="cd-secondary-nav-trigger">Menú<span></span></a> <!-- button visible on small devices -->
	<nav>
		<ul>
			<li>
				<a href="#cd-placeholder-1">
					<b>Buscar Propiedades</b>
					<span></span><!-- icon -->
				</a>
			</li>
			<li>
				<a href="#cd-placeholder-2">
					<b>¿Quiénes Somos?</b>
					<span></span><!-- icon -->
				</a>
			</li>
			<li>
				<a href="#cd-placeholder-3">
					<b>Servicios</b>
					<span></span><!-- icon -->
				</a>
			</li>
			<li>
				<a href="#cd-placeholder-5">
					<b>Contáctenos</b>
					<span></span><!-- icon -->
				</a>
			</li>

		</ul>
	</nav>
</div> <!-- .cd-secondary-nav -->
<main class="cd-main-content">

	<section id="cd-placeholder-2" class="sec-services">
		<div class="container">
			<h1>¿Quiénes Somos?</h1>
			<p>La empresa Propiedades sol y cobre es una empresa que se dedica a la venta y arriendo de propiedades tales como: casas, departamentos, locales y hospedaje. También presta servicios como: Obras menores y ampliaciones (pintura, cambio y lavado de alfombras, aseos, búsquedas de propiedades, etc.), y asesorías como: Regularización de Ampliaciones, asesorías de ventas, tasaciones y estudio de título. Actualmente trabaja con particulares y empresas las cuales por nombrar algunas son: Elecda, Komatsu, Mena y Ovalle, a los cuales presta los servicios mencionados anteriormente.</p>
			<hr />
			<div class="row">
				<div class="col-sm-6 ">
					<i class="fa fa-4x fa-bullseye"></i>
					<h2 class="letra">Misión</h2>
					<p>“Entregar excelencia en servicios de Corretaje de Propiedades, Administración de Condominios, Edificios y Tasaciones de Bienes Raíces y Capacitación. Consolidándonos como una organización joven, moderna, eficiente y eficaz.
						atender a nuestros clientes entregando seguridad, información y tranquilidad en el proceso de compra venta o arrendamiento de su propiedad. Esto apoyado en el conocimiento y profesionalismo de nuestro equipo de trabajo y de las políticas de control de gestión de la empresa, entregando como resultado un servicio de alta calidad y adecuada eficiencia en cada etapa de la cadena.”</p>
				</div>
				<div class="col-sm-6">
					<i class="fa fa-4x fa-eye"></i>
					<h2 class="letra">Visión</h2>
					<p >“Creemos en un proceso de mejora continua, ser un equipo multidisciplinario profesional y comercialmente consolidado, manteniendo la excelencia en la atención de nuestros clientes. Expandir nuestro mercado a nivel nacional, mediante la captación de asociados y la apertura de nuevos mercados y negocios. Que nuestros clientes se sientan plenamente acompañados y asesorados durante todo el proceso de compra venta o arrendamiento de su propiedad por nosotros como corredores de propiedades, generando así relaciones de largo plazo.”</p>
				</div>
			</div>
		</div>
	</section>
	<section id="cd-placeholder-3" class="cd-section cd-container servicios">
		<h1>Nuestros Servicios</h1>
		<div class="services">
			<div class="container">
				<div class="row">
					<div class="col-md-4">
						<div class="services-box">
							<span class="icon"><i class="fa fa-money"></i></span><!-- .Icon ends here -->

							<div class="service-content">
								<p><h4>Compraventa</h4>
								La corredora de propiedades realiza compras de propiedades para su posterior reventa.
								</p>
							</div><!-- .Service-content ends here -->
						</div><!-- .Services-box ends here -->

						<div class="services-box">
							<span class="icon"><i class="fa fa-dollar"></i></span><!-- .Icon ends here -->

							<div class="service-content">
								<p><h4>Tasaciones</h4>
								La empresa conoce y realiza los procedimientos y los aspectos que influyen en el precio de una propiedad.
								</p>
							</div><!-- .Service-content ends here -->
						</div><!-- .Services-box ends here -->
						<div class="services-box">
							<span class="icon"><i class="fa fa-search"></i></span><!-- .Icon ends here -->

							<div class="service-content">
								<p><h4>Estudio de Títulos</h4>
								Nuestra empresa se encarga de la búsqueda y validación de la documentación necesaria para la venta o compra de alguna propiedad.
								</p>
							</div><!-- .Service-content ends here -->
						</div><!-- .Services-box ends here -->
					</div><!-- .Col ends here -->

					<div class="col-md-4">
						<img class="img-responsive" src="<?php echo Yii::app()->request->baseUrl; ?>/images/servicios.png" alt="" />
					</div>

					<div class="col-md-4">
						<div class="services-box">
							<span class="icon"><i class="fa fa-building-o"></i></span><!-- .Icon ends here -->

							<div class="service-content">
								<p><h4>Ampliaciones Menores</h4>
								La empresa se encarga de administrar construcciones pequeñas (piezas, casas pequeñas, ampliaciones en general.
								</p>
							</div><!-- .Service-content ends here -->
						</div><!-- .Services-box ends here -->

						<div class="services-box">
							<span class="icon"><i class="fa fa-bug"></i></span><!-- .Icon ends here -->

							<div class="service-content">
								<p><h4>Servicios de Aseo</h4>
								Aseos de propiedades: La corredora de propiedades presta servicios de limpiezas, ya sea a empresas como particulares, los cuales se pueden pactar de forma mensual, como en algún caso en particular.
								</p>
							</div><!-- .Service-content ends here -->
						</div><!-- .Services-box ends here -->

					</div><!-- .Col ends here -->
				</div><!-- .Row ends here -->
			</div><!-- .Container ends here -->
		</div><!-- .Services ends here -->
	</section> <!-- #cd-placeholder-3 -->
	<!--	<section id="cd-placeholder-4" class="cd-section cd-container">
            <h1>Visión</h1>
            <p>
                texto
            </p>
        </section> <!-- #cd-placeholder-4 -->
	<section id="cd-placeholder-5" class="cd-section cd-container">
		<h1>Contáctenos</h1>

		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'solicitud-form',
			// Please note: When you enable ajax validation, make sure the corresponding
			// controller action is handling ajax validation correctly.
			// There is a call to performAjaxValidation() commented in generated controller code.
			// See class documentation of CActiveForm for details on this.
			'enableAjaxValidation'=>true,
			'clientOptions'=>array('validateOnSubmit'=>true),
		)); ?>

		<div class="col-md-12">
			<div class="form-horizontal col-md-4">
				<form role="form">
					<div class="form-group">
						<label style="float: left">Nombres</label>
						<?php echo $form->textField($model1,'nombres_solicitud', array("class"=>"form-control2", "placeholder"=>"Nombres")); ?>
					</div>
					<div  class="form-group">
						<label style="float: left">Apellidos</label>
						<?php echo $form->textField($model1,'apellidos_solicitud', array("class"=>"form-control2", "placeholder"=>"Apellidos")); ?>
					</div>
					<div class="form-group">
						<label style="float: left">Servicio a solicitar</label>
						<?php echo $form->dropDownList($model1,'servicio_solicitud',
							array(
								'Venta' => 'Venta',
								'Arriendo' => 'Arriendo',
								'Tasación' => 'Tasación',
								'Estudio de título' => 'Estudio de título',
								'Ampliaciones menores' => 'Ampliaciones menores',
								'Aseo de propiedad' => 'Aseo de propiedad',
							),
							array("class"=>"form-control2 "),
							array('empty' => '(Seleccione tipo de servicio)')); ?>
						<?php echo $form->error($model1,'servicio_solicitud'); ?>
					</div>
					<div  class="form-group">
						<label style="float: left">Teléfono de contacto</label>
						<?php echo $form->textField($model1,'telefono_solicitud', array("class"=>"form-control2", "placeholder"=>"Teléfono de contacto")); ?>
					</div>
					<div  class="form-group">
						<label style="float: left">Correo electrónico</label>
						<?php echo $form->emailField($model1,'correo_solicitud', array("class"=>"form-control2", "placeholder"=>"Correo de contacto")); ?>
					</div>
					<div  class="form-group">
						<label style="float: left">Comentario</label>
						<?php echo $form->textArea($model1,'descripcion_solicitud',array("rows"=>"3"), array("class"=>"form-control2", "placeholder"=>"Comentario")); ?>
						<?php echo $form->error($model1,'descripcion_solicitud'); ?>

					</div>
					<div  class="form-group">
						<?php echo CHtml::submitButton('Enviar', array('class' =>'btn btn-buscar' , )); ?>
					</div>
			</div>
			</form>
			<div class="form-horizontal col-md-8">
				<div class="google-map">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3686.9261630980636!2d-68.92730228543036!3d-22.469408828058047!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x96ac09cb682b12fb%3A0x1ee576cc2844eb60!2sPropiedades+Sol+y+Cobre!5e0!3m2!1ses-419!2scl!4v1447907073915"  allowfullscreen></iframe>
				</div>
			</div>
		</div>
		</div>
		<?php $this->endWidget(); ?>
	</section> <!-- #cd-placeholder-5 -->

</main> <!-- .cd-main-content -->
<footer id="footer">
	<div >
		<ul class="soc-media-ul">
			<li><a href="http://twitter.com/AlexDevero" class="fa fa-twitter" target="_blank"></a></li>
			<li><a href="https://plus.google.com/u/0/+AlexDevero" class="fa  fa-facebook" target="_blank"></a></li>
			<li><a href="mailto:solycobre@gmail.com" class="fa fa-envelope"></a></li>

		</ul>
		Tratar con :Sandra Campusano Araya<BR>
		PROPIEDADES SOL Y COBRE CALAMA © 2015<br>
		Dirección : PASAJE LATORRE N° 1291 VILLA CHICA
	</div>
</footer>

<!-- Preloads, super old-school -->
<div style="display:none;">
	<img src="http://www.braksoftware.com/codepen/bruce/v1/join-our-team-button-over-large.png" />
	<img src="http://www.braksoftware.com/codepen/bruce/v1/join-our-team-button-over-medium.png" />
</div>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-2.1.1.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/main.js"></script> <!-- Resource jQuery -->

