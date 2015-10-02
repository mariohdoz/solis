<?php
   if(Yii::app()->session['activo']) {
       $estado = true;
       $url = '?r=access/logout';
       $label = 'Cerrar sesión';
   }else {
       $estado = false;
       $url = '?r=access/index';
       $label = 'Iniciar sesión';
   }
 ?>
<header class="cd-header">
		<div id="cd-logo"><a href="#0"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/LogoV2.png" width="150px" height="50px" alt="Logo"></a></div>
		<nav class="main-nav">
			<ul>
				<!-- inser more l inks her e -->
				<?php if(!Yii::app()->session['activo']) {
						echo '<li><a class="cd-signin " href="#0">Iniciar Sesión</a></li>';
					}else {
						echo '<li><a class="cd-signin " href="index.php/site/logout">Cerrar sesión</a></li>';
					}
				?>
			</ul>
		</nav>
</header>
<?php 		$form=$this->beginWidget('CActiveForm');
 ?>
<?php if(!Yii::app()->session['activo']){
		echo '<div class="cd-user-modal"> <!-- this is the entire modal form, including the background -->
			<div class="cd-user-modal-container"> <!-- this is the container wrapper -->
				<div id="cd-login"> <!-- log in form -->
					<div class="cd-form">';
		echo '  <p class="fieldset">
							<label class="image-replace cd-email" for="signin-email">E-mail</label>';
							echo $form->emailField($model,'username', array("class"=>"full-width has-padding has-border", "placeholder"=>"Correo electrónico"));
							echo $form->error($model,'username');
							echo '</p>
						<p class="fieldset">
							<label class="image-replace cd-password" >Password</label>';
							echo $form->passwordField($model,'password',array( "class"=>"full-width has-padding has-border", "placeholder"=>"Constraseña"));
				      echo $form->error($model,'password');
						echo'</p>

						<p class="fieldset">
							<input type="checkbox" id="remember-me" checked>
							<label for="remember-me">Guardar contraseña</label>
						</p>
						<p class="fieldset">
							<input class="full-width" type="submit" value="Iniciar sesión" />
						</p>
					</div>
					';
}
?>
<?php $this->endWidget(); ?>
					<p class="cd-form-bottom-message"><a href="#0">¿Olvidó su contraseña?</a></p>
					<!-- <a href="#0" class="cd-close-form">Close</a> -->
				</div>		<!-- termina el inicio de sesion -->
				<div id="cd-reset-password"> <!-- solicitar contrseña-->
					<p class="cd-form-message">¿Olvidó su contraseña?, Por favor ingrese su correo electrónico para solicitar una nueva contraseña.</p>
					<form class="cd-form">
						<p class="fieldset">
							<label class="image-replace cd-email" for="reset-email">E-mail</label>
							<input class="full-width has-padding has-border" id="reset-email" type="email" placeholder="Correo electrónico">
							<span class="cd-error-message">Ingrese su correo eletrónico!</span>
						</p>
						<p class="fieldset">
							<input class="full-width has-padding" type="submit" value="Solicitar nueva contraseña">
						</p>
					</form>
					<p class="cd-form-bottom-message"><a href="#0">Volver</a></p>
				</div> <!-- cd-reset-password -->
				<a href="#0" class="cd-close-form">Cerrar</a>
			</div> <!-- cd-user-modal-container -->
		</div> <!-- termin el inicio de sesion completo -->


<section id="cd-intro">
	<div id="cd-intro-tagline">
		<div class="changer">
			<div class="sub">Corredora de Propiedades</div>
			<h1>SOL Y COBRE</h1>

		</div>
		<div id="container"></div>
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
					<b>Misión</b>
					<span></span><!-- icon -->
				</a>
			</li>
			<li>
				<a href="#cd-placeholder-4">
					<b>Visión</b>
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
	<section id="cd-placeholder-1" class="cd-section cd-container">
    <h1>Buscar Propiedades</h1></br>

			<div class="container-fluid row-centered">
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
					<div class="col-md-3">
						<blanco>Venta/Arriendo</blanco>
						<?php echo $form->dropDownList($model2,'SERVICIO',
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
						<?php echo $form->dropDownList($model2,'COMUNAPROPIEDAD',
							array(
								'Antofagasta' => 'Antofagasta',
								'Arica' => 'Arica',
								'Calama' => 'Calama',
								'Iquique' => 'Iquique',
							),
							array("class"=>"form-control select2"),
							array('empty' => '(Tipo de propiedad)')); ?>
					</div>
					<div class="col-md-3">
						<blanco>Típo de propiedad</blanco>
						<?php echo $form->dropDownList($model2,'TIPO',
							array(
								'Departamento Habitación' => 'Departamento Habitación',
								'Local' => 'Local',
								'Oficina Casa' => 'Oficina Casa',
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
						<?php echo CHtml::submitButton('Buscar', array("class"=>"btn-warning") ); ?>
					</div>
				</div>
				<br><br>
				<?php $this->endWidget(); ?>
			</div>



	</section> <!-- #cd-placeholder-1 -->



	<section id="cd-placeholder-2" class="cd-section cd-container">
		<h1>¿Quiénes Sómos?</h1>
		<p>
			La empresa Propiedades sol y cobre es una empresa que se dedica a la venta y arriendo de propiedades tales como: casas, departamentos, locales y hospedaje. También presta servicios como: Obras menores y ampliaciones (pintura, cambio y lavado de alfombras, aseos, búsquedas de propiedades, etc.), y asesorías como: Regularización de Ampliaciones, asesorías de ventas, tasaciones y estudio de título. Actualmente trabaja con particulares y empresas las cuales por nombrar algunas son: Elecda, Komatsu, Mena y Ovalle, a los cuales presta los servicios mencionados anteriormente.

		</p>
	</section> <!-- #cd-placeholder-2 -->
	<section id="cd-placeholder-3" class="cd-section cd-container">
		<h1>Misión</h1>
		<p>
			Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem ab consequatur fugiat delectus sint in velit quo possimus, ullam aspernatur ipsa natus tenetur nulla distinctio doloremque totam. Earum enim sed dolorum, exercitationem temporibus quaerat eos, accusantium amet facilis facere eaque commodi optio quidem rem minima nisi laborum quae animi nostrum aut voluptates veniam. Cum neque quam fuga sapiente quidem eum necessitatibus nulla, cupiditate a, repudiandae iusto in dolor eaque commodi nostrum consequuntur dolores velit eligendi dolorem quae. Distinctio quae, cumque aliquid quos consequuntur perspiciatis voluptates, laboriosam velit qui et aut sint esse nemo voluptatibus, dolore veritatis natus facilis commodi sed. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias sunt mollitia atque tempore ea cum exercitationem, quisquam est consectetur tempora ipsam, obcaecati voluptate a. Autem minus cumque voluptatem eaque fugit nostrum reprehenderit incidunt officia. Nesciunt reiciendis delectus officiis fugit sint at totam nisi commodi repellendus iusto dolorum molestias dignissimos natus, impedit quam atque ex voluptas ut facere assumenda iure incidunt rerum vitae accusamus? Et voluptatibus unde, fugiat tenetur sed dolore, praesentium magni illo nobis incidunt, possimus doloremque dolorem sunt. Aliquid ducimus delectus esse voluptatem officia perferendis, a voluptate omnis adipisci expedita distinctio praesentium natus veniam accusamus iure, quasi, inventore reiciendis.
		</p>
	</section> <!-- #cd-placeholder-3 -->
	<section id="cd-placeholder-4" class="cd-section cd-container">
		<h1>Visión</h1>
		<p>
			Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem ab consequatur fugiat delectus sint in velit quo possimus, ullam aspernatur ipsa natus tenetur nulla distinctio doloremque totam. Earum enim sed dolorum, exercitationem temporibus quaerat eos, accusantium amet facilis facere eaque commodi optio quidem rem minima nisi laborum quae animi nostrum aut voluptates veniam. Cum neque quam fuga sapiente quidem eum necessitatibus nulla, cupiditate a, repudiandae iusto in dolor eaque commodi nostrum consequuntur dolores velit eligendi dolorem quae. Distinctio quae, cumque aliquid quos consequuntur perspiciatis voluptates, laboriosam velit qui et aut sint esse nemo voluptatibus, dolore veritatis natus facilis commodi sed. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam, minus nisi ipsam quasi. Reprehenderit quo dolorem ratione in, porro placeat nihil asperiores, ab earum excepturi sint non. Error officiis, sint expedita dolore fuga voluptates ipsam temporibus vero suscipit porro asperiores deserunt sapiente optio. Quas vero nam nihil, id suscipit, similique facere dicta velit, quis, commodi perspiciatis. Perferendis necessitatibus, in, sequi ipsum eum voluptates quisquam voluptatem, rerum fugiat deleniti voluptatum eius odio, expedita enim libero quaerat! Veniam eos, maiores nostrum mollitia reprehenderit, obcaecati repudiandae eius perspiciatis? Quo voluptatum ipsa voluptatem sequi esse eius consectetur, quae ea accusamus porro autem ipsum, quam dignissimos, nesciunt consequuntur quaerat. Numquam iure velit veniam saepe sunt enim asperiores hic nam aperiam illo officia molestias quis dicta autem incidunt consequatur dolor, explicabo corrupti nostrum odio ea laudantium magni, nulla. Eaque officiis, distinctio, dolores eligendi facilis tempore reiciendis illum iste sed temporibus rerum aliquid culpa dolor, et voluptatibus!
		</p>
	</section> <!-- #cd-placeholder-4 -->
	<section id="cd-placeholder-5" class="cd-section cd-container">
		<h1>Contáctenos</h1>
		<form class="cf">
			<div class="half left cf">
				<input type="text" id="input-name" placeholder="Name">
				<input type="email" id="input-email" placeholder="Email address">
				<input type="text" id="input-subject" placeholder="Subject">
			</div>
			<div class="half right cf">
				<textarea name="message" type="text" id="input-message" placeholder="Message"></textarea>
			</div>
			<input type="submit" value="Submit" id="input-submit">
		</form>
	</section> <!-- #cd-placeholder-5 -->
</main> <!-- .cd-main-content -->

<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-2.1.1.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/main.js"></script> <!-- Resource jQuery -->
