<?php get_header(); ?>

	<div class="main-title" style="">
		<div class="container">
			<h3 class="titulo"><?php the_title(); ?></h3>
			<p class="subtitulo"><?php the_field('subtitulo'); ?></p>
		</div>
	</div>

	<section class="box-content">
		<div class="container">

			<div class="row">
				<div class="col-12">
					<?php
						while ( have_posts() ) : the_post(); ?>
							
							<?php $imagem = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), '' ); ?>

							<?php if($imagem[0]){ ?>
								<div class="col-6">						
									<img src="<?php echo $imagem[0]; ?>" class="img-page">
								</div>
							<?php } ?>	

							<div class="col-<?php if($imagem[0]){ echo '6'; }else{ echo '12'; } ?>">
								<div class="content-txt">
									<?php the_content(); ?>
								</div>
							</div>					

						<?php endwhile;
						wp_reset_query();
					?>

					<?php if(have_rows('colunas')):
						$count_colunas = 12/(count(get_field('colunas'))); ?>
						<div class="content-txt <?php if(get_the_content()){ echo 'margin-60'; } ?>">
							<?php while ( have_rows('colunas') ) : the_row(); ?>

								<div class="col-<?php echo $count_colunas; ?>">
									<p class="justify"><?php the_sub_field('texto'); ?></p>
								</div>

							<?php endwhile; ?>
						</div>
					<?php endif; ?>	
				</div>
			</div>

			<div class="row">
				<div class="col-12">

						<form action="<?php echo get_template_directory_uri(); ?>/mail_trabalhe.php" class="form-padrao" enctype="multipart/form-data" method="POST">
							<fieldset class="col-12">
								<p class="msg-form">
									<?php 
										if($_GET['form']){
											if($_GET['form'] == 'success'){
												echo 'Enviado com sucesso! Obrigado.';
											}
										}

										if($_GET['form']){
											if($_GET['form'] == 'error'){
												echo 'Desculpe, não foi possível enviar seu formulário. <br>Por favor, tente novamente mais tarde';
											}
										}

										if($_GET['form']){
											if($_GET['form'] == 'error-upload'){
												echo 'Não foi possível enviar o arquivo, tente novamente.';
											}
										}

										if($_GET['form']){
											if($_GET['form'] == 'error-size'){
												echo 'O arquivo enviado é muito grande, envie arquivos de até 2Mb.';
											}
										}

										if($_GET['form']){
											if($_GET['form'] == 'error-extensao'){
												echo 'Por favor, envie apenas arquivo em PDF';
											}
										}
									?>
								</p>
							</fieldset>
							<fieldset class="col-12">
								<input type="text" name="nome" id="nome" placeholder="Nome: *">
							</fieldset>
							<fieldset class="col-12">
								<input type="text" name="email" id="email" placeholder="E-mail: *">
							</fieldset>

							<fieldset class="col-6">
								<input type="text" name="tel_princ" id="tel_princ" class="mask-telefone" placeholder="Telefone: *">
							</fieldset>
							<fieldset class="col-6">
								<input type="text" name="tel_sec" id="tel_sec" class="mask-telefone" placeholder="Celular:">
							</fieldset>

							<fieldset class="col-12">
								<input type="text" name="endereco" id="endereco" placeholder="Endereço: *">
							</fieldset>
							<fieldset class="col-6">
								<input type="text" name="estado" id="estado" placeholder="Estado: *">
							</fieldset>
							<fieldset class="col-6">
								<input type="text" name="cidade" id="cidade" placeholder="Cidade: *">
							</fieldset>
							<fieldset class="col-12">
								<input type="file" name="arquivo" id="arquivo" placeholder="" style="margin-top: 11px;">
								<div class="info-campo">Apenas arquivo em PDF.*</div>
							</fieldset>
							<fieldset class="col-12">
								<textarea name="mensagem" id="mensagem" cols="30" rows="10" placeholder="Mensagem: *"></textarea>
							</fieldset>
							<fieldset class="col-12">
								<input type="hidden" name="para" value="<?php the_field('email', 'option'); ?>">
								<input type="hidden" name="nome_site" value="<?php bloginfo('name'); ?>">
								<input type="hidden" name="url" value="<?php echo get_home_url(); ?>/trabalhe-conosco">
								<input type="hidden" name="url_curriculo" value="<?php echo get_template_directory_uri(); ?>">
								<button class="btn btn-saiba-mais enviar" type="submit">Enviar</button>
							</fieldset>
						</form>
					
				</div>
			</div>

		</div>
	</section>

<?php get_footer(); ?>

<script type="text/javascript">
	jQuery('.form-padrao').submit(function() {
		
		jQuery('.msg-form').html('');
		var nome = jQuery('#nome').val();
		var email = jQuery('#email').val();
		var tel_princ = jQuery('#tel_princ').val();
		var endereco = jQuery('#endereco').val();
		var estado = jQuery('#estado').val();
		var cidade = jQuery('#cidade').val();
		var arquivo = jQuery('#arquivo').val();
		var mensagem = jQuery('#mensagem').val();

		if(nome == ''){
			jQuery('#nome').parent().addClass('erro');
		}

		if(email == ''){
			jQuery('#email').parent().addClass('erro');
		}

		if(tel_princ == ''){
			jQuery('#tel_princ').parent().addClass('erro');
		}

		if(endereco == ''){
			jQuery('#endereco').parent().addClass('erro');
		}

		if(cidade == ''){
			jQuery('#cidade').parent().addClass('erro');
		}

		if(estado == ''){
			jQuery('#estado').parent().addClass('erro');
		}

		if(arquivo == ''){
			jQuery('#arquivo').parent().addClass('erro');
		}

		if(mensagem == ''){
			jQuery('#mensagem').parent().addClass('erro');
		}

		if((nome == '') || (email == '') || (tel_princ == '') || (endereco == '') || (cidade == '') || (estado == '') || (arquivo == '') || (mensagem == '')){
			jQuery('.msg-form').html('Campos obrigatórios não podem estar vazios.');
			return false;
		}else{
			return true;
		}

	});

	jQuery(document).ready(function(){
		jQuery('input').change(function(){
			if(jQuery(this).parent().hasClass('erro')){
				jQuery(this).parent().removeClass('erro');
			}
		});

		jQuery('textarea').change(function(){
			if(jQuery(this).parent().hasClass('erro')){
				jQuery(this).parent().removeClass('erro');
			}
		});
	})
</script>

<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/maskedinput.js"></script>
<script type="text/javascript">
	jQuery(function(jQuery){
	   jQuery(".mask-telefone").mask("(99) 9999-9999?9");
	});
</script>