	<footer class="footer">
		<div class="container">

			<div class="row">
				<div class="col-3">
					<h3>SEJA BEM VINDO!</h3>
					<ul class="menu-footer">
						<li>
							<a href="<?php echo get_home_url(); ?>/empresa" title="Empresa">- Empresa</a>
						</li>

						<li>
							<a href="<?php echo get_home_url(); ?>/produtos" title="Produtos">- Produtos</a>
						</li>

						<li>
							<a href="<?php echo get_home_url(); ?>/qualidade" title="Qualidade">- Qualidade</a>
						</li>

						<li>
							<a href="<?php echo get_home_url(); ?>/area-de-atuacao" title="Área de Atuação">- Área de Atuação</a>
						</li>

						<li>
							<a href="<?php echo get_home_url(); ?>/noticias" title="Notícias">- Notícias</a>
						</li>

						<li>
							<a href="<?php echo get_home_url(); ?>/fale-conosco" title="Fale Conosco">- Fale Conosco</a>
						</li>

						<li>
							<a href="<?php echo get_home_url(); ?>/minha-area" title="Minha Área">- Minha Área</a>
						</li>

						<li>
							<a href="<?php echo get_home_url(); ?>/trabalhe-conosco" title="<?php echo get_page_by_path('trabalhe-conosco')->post_title; ?>">
								- <?php echo get_page_by_path('trabalhe-conosco')->post_title; ?>
							</a>
						</li>	
					</ul>
				</div>

				<div class="col-3" style="display: none;">
					<h3>EMPRESA</h3>

					<ul class="menu-footer">
						<li>
							<a href="<?php echo get_home_url(); ?>/empresa" title="<?php echo get_page_by_path('empresa')->post_title; ?>">
								<?php echo get_page_by_path('empresa')->post_title; ?>
							</a>
						</li>

						<li>
							<a href="<?php echo get_home_url(); ?>/nossa-equipe" title="<?php echo get_page_by_path('nossa-equipe')->post_title; ?>">
								<?php echo get_page_by_path('nossa-equipe')->post_title; ?>
							</a>
						</li>

						<li>
							<a href="<?php echo get_home_url(); ?>/logistica" title="<?php echo get_page_by_path('logistica')->post_title; ?>">
								<?php echo get_page_by_path('logistica')->post_title; ?>
							</a>
						</li>

						<li>
							<a href="<?php echo get_home_url(); ?>/responsavel-tecnico" title="<?php echo get_page_by_path('responsavel-tecnico')->post_title; ?>">
								<?php echo get_page_by_path('responsavel-tecnico')->post_title; ?>
							</a>
						</li>

						<li>
							<a href="<?php echo get_home_url(); ?>/responsabilidade-social" title="<?php echo get_page_by_path('responsabilidade-social')->post_title; ?>">
								<?php echo get_page_by_path('responsabilidade-social')->post_title; ?>
							</a>
						</li>

						<li>
							<a href="<?php echo get_home_url(); ?>/responsabilidade-ambiental" title="<?php echo get_page_by_path('responsabilidade-ambiental')->post_title; ?>">
								<?php echo get_page_by_path('responsabilidade-ambiental')->post_title; ?>
							</a>
						</li>

						<li>
							<a href="<?php echo get_home_url(); ?>/projeto-ecoeter" title="<?php echo get_page_by_path('projeto-ecoeter')->post_title; ?>">
								<?php echo get_page_by_path('projeto-ecoeter')->post_title; ?>
							</a>
						</li>

						<li>
							<a href="<?php echo get_home_url(); ?>/representantes" title="<?php echo get_page_by_path('representantes')->post_title; ?>">
								<?php echo get_page_by_path('representantes')->post_title; ?>
							</a>
						</li>

						<li>
							<a href="<?php echo get_home_url(); ?>/qualidade" title="<?php echo get_page_by_path('qualidade')->post_title; ?>">
								- <?php echo get_page_by_path('qualidade')->post_title; ?>
							</a>
						</li>	
					</ul>
				</div>

				<div class="col-3">
					<h3>NOTÍCIAS</h3>

					<ul class="menu-footer">
						<?php query_posts(
							array(
								'post_type' => 'post',
								'posts_per_page' => 3
							)
						);

						if(have_posts()){
							while ( have_posts() ) : the_post(); ?>
								<li>
									<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">- <?php the_title(); ?></a>
								</li>
							<?php endwhile;
							wp_reset_query(); 
						}else{ ?>
							<p style="color: #fff;">Nenhuma notícia encontrada.</p>
						<?php } ?>
					</ul>
				</div>

				<div class="col-3">
					<h3>PRODUTOS</h3>

					<ul class="menu-footer">
						<?php
							$args = array(
							    'taxonomy'      => 'produtos_taxonomy',
							    'parent'        => 0,
							    'orderby'       => 'name',
							    'order'         => 'ASC',
							    'hierarchical'  => 1,
							    'pad_counts'    => true,
							    'hide_empty'    => 0
							);
							$categories = get_categories( $args );
							foreach ( $categories as $categoria ){ ?>

								<li>
									<a href="<?php echo get_category_link($categoria->term_id); ?>" title="<?php echo $categoria->name; ?>">
										- <?php echo $categoria->name; ?>
									</a>
								</li>

								<?php
							}
						?>
					</ul>
				</div>

				<div class="col-3 contato-footer">
					<h3>FALE CONOSCO</h3>

					<?php if(get_field('telefone','option')){ ?>
						<span class="tel">
							<?php the_field('telefone','option');
							/*if(get_field('info_telefone','option')){ ?>
								<span class="footer-info"><?php the_field('info_telefone','option'); ?></span>
							<?php } */?>
						</span>
					<?php } ?>

					<?php if(get_field('celular','option')){ ?>
						<span class="tel">
							<?php the_field('celular','option');
							/*if(get_field('info_celular','option')){ ?>
								<span class="footer-info"><?php the_field('info_celular','option'); ?></span>
							<?php } */?>
						</span>
					<?php } ?>

					<?php if(get_field('email','option')){ ?>
						<span class="email"><?php the_field('email','option'); ?></span>
					<?php } ?>

					<?php if(get_field('horario_atendimento','option')){ ?>
						<h4>Horário de Atendimento</h4>
						<p><?php the_field('horario_atendimento','option'); ?></p>
					<?php } ?>

					<?php if( have_rows('filiais','option') ): ?>
						<?php while ( have_rows('filiais','option') ) : the_row(); ?>
							<div class="maps-filiais-footer">
								<h4><?php the_sub_field('nome','option'); ?></h4>
								<p><?php the_sub_field('endereco'); ?></p>
							</div>
						<?php endwhile; ?>
					<?php endif;  ?>

					<?php if( have_rows('redes_sociais','option') ): ?>
						<div class="redes">						
							<?php while ( have_rows('redes_sociais','option') ) : the_row(); ?>
								<a href="<?php the_sub_field('url','option'); ?>" title="<?php the_sub_field('nome','option'); ?>" target="_blank">
									<?php the_sub_field('icone','option'); ?>
								</a>
							<?php endwhile; ?>
						</div>
					<?php endif; ?>
		
				</div>
			</div>

			<div class="copy">
				<div class="row">
					<div class="col-6">
						<p><i class="fa fa-copyright" aria-hidden="true"></i> <?php echo date('Y') ?> <?php the_field('titulo','option'); ?>. All rights reserved.</p>
					</div>

					<div class="col-6 ultimate">
						<a href="http://www.ultimate.com.br" target="_blank" title="ULTIMATE">ULTIMATE! tecnologia e design</a>
					</div>
				</div>
			</div>
		
		</div>
	</footer>

	<div class="bg-modal" id="modal-erro">
		<div class="box-modal">
			<div class="modal-conteudo">

				<i class="fa fa-times close-modal" aria-hidden="true"></i>
				<h2>Desculpe!</h2>
				<p class="msg center"></p>

			</div>
		</div>
	</div>

	<div class="bg-modal" id="modal-orcamento">
		<div class="box-modal">
			<div class="modal-conteudo">

				<i class="fa fa-times close-modal" aria-hidden="true"></i>
				<h2>Lista de Produtos para Orçamento</h2>
				<p class="msg center"></p>

				<div class="content-modal">					
					<table id="confirmar-orcamento">
						<thead>
							<tr>
								<th width="120" class="center">Código</th>
								<th>Produto</th>
								<th width="80" class="center">Qtd.</th>
								<th></th>
							</tr>
						</thead>
						<tbody id="add-linha-orcamento">

							<?php
								if(isset($_SESSION['orcamento'])){
									if(isset($_SESSION['orcamento']) > 0){

										$qtd_cart_orcamento = 0;
										foreach ($_SESSION['orcamento'] as $key => $value) { 
											$qtd_cart_orcamento = $qtd_cart_orcamento+$value['quantidade']; ?>

											<tr id="item-<?php echo $value['id']; ?>">
												<td class="center"><?php echo $value['codigo']; ?></td>
												<td><strong><?php echo $value['nome']; ?></strong></td>
												<td class="qtd" class="center"><input name="qtd<?php echo $value['id']; ?>" placeholder="1" value="<?php echo $value['quantidade']; ?>" type="text"></td>
												<td class="center"><a href="javascript:" class="remove-item" qtd-prod="<?php echo $value['quantidade']; ?>" id-prod="<?php echo $value['id']; ?>"><i class="fa fa-times-circle" aria-hidden="true"></i></a></td>
											</tr>

										<?php }

										if($qtd_cart_orcamento == 0){
											echo '<tr id="qtd-0" class="fixo"><td colspan="4">Nenhum produto adicionado.</td></tr>';
										}else{
											echo '<tr id="qtd-0" class="fixo" style="display: none;"><td colspan="4">Nenhum produto adicionado.</td></tr>';
										}

									}else{
										echo '<tr id="qtd-0" class="fixo"><td colspan="4">Nenhum produto adicionado.</td></tr>';
									}
								}else{
									echo '<tr id="qtd-0" class="fixo"><td colspan="4">Nenhum produto adicionado.</td></tr>';
								}
							?>

						</tbody>
						<tfoot>
							<tr>
								<th></th>
								<th class="right">TOTAL DE PRODUTOS: </th>
								<th class="center" id="qtd_orcamento"><?php echo $qtd_cart_orcamento; ?></th>
								<th></th>
							</tr>
						</tfoot>
					</table>
				</div>

				<div class="dados-cliente row" style="<?php if($qtd_cart_orcamento == 0){ echo 'display: none;'; } ?>">
					<fieldset class="col-4">
						<input type="text" name="nome-orcamento" id="nome-orcamento" placeholder="Nome">
					</fieldset>

					<fieldset class="col-4">
						<input type="text" name="email-orcamento" id="email-orcamento" placeholder="E-mail">
					</fieldset>

					<fieldset class="col-4">
						<input type="text" class="mask-telefone" name="tel-orcamento" id="tel-orcamento" placeholder="Telefone">
					</fieldset>
				</div>

				<a href="javascript:" title="Solicitar Orçamento" id="enviar-orcamento" class="btn orcamento <?php if($qtd_cart_orcamento == 0){ echo 'off'; } ?>">
					<i class="fa fa-shopping-cart" aria-hidden="true"></i> Enviar Orçamento
				</a>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		
		jQuery.noConflict();

		var qtd_cart_orcamento = '<?php echo $qtd_cart_orcamento; ?>';

		jQuery(document).ready(function(){
			jQuery(".scroll").click(function(event){
				event.preventDefault();
				jQuery('.menu-mobile').removeClass('active');
				jQuery('.header').removeClass('active');
				jQuery('.nav').css('top','-110vh');
				jQuery('html,body').animate( { scrollTop:jQuery(this.hash).offset().top } , 1000);
			});

			jQuery("#gotop").click(function(event){
				event.preventDefault();
				jQuery('html,body').animate( { scrollTop: 0 } , 1000);
			});

			jQuery('.close-modal').click(function(){
				jQuery(this).parents('.bg-modal').hide();
				jQuery('.msg').html('');
			});

			jQuery('.cart-orcamento').click(function(){
				jQuery('.bg-modal').css('display','none');
				jQuery('#modal-orcamento').css('display','table');
			});
		});

		
		function logOff(){

			jQuery.ajax({
				url: "<?php echo get_template_directory_uri(); ?>/session.php",
				context: document.body
			}).done(function() {
				window.location.href = '<?php echo get_home_url(); ?>/minha-area'; 
			});

		};

			jQuery(document).on('click', '.remove-item', function(){
				id = jQuery(this).attr('id-prod');
				qtd_prod = jQuery(this).attr('qtd-prod');

				jQuery.getJSON("<?php echo get_template_directory_uri(); ?>/remove-orcamento.php", { id:id }, function(result){		
					if(result=='ok'){
						jQuery('#modal-orcamento .msg').html('Item removido com sucesso!');
						qtd_cart_orcamento = qtd_cart_orcamento-parseInt(qtd_prod);
						jQuery('#item-'+id).remove();
						jQuery('#qtd_orcamento').html(qtd_cart_orcamento);
						if(qtd_cart_orcamento == 0) {
							jQuery('#qtd_cart_orcamento').html('');
							jQuery('#qtd-0').show();
							jQuery('#enviar-orcamento').addClass('off');
							jQuery('.dados-cliente').hide();
						}else{							
							jQuery('#qtd_cart_orcamento').html('<span>'+qtd_cart_orcamento+'</span>');
						}
					}else{
						jQuery('#modal-orcamento .msg').html('Não foi possível remover esse item!');
					}

				});
			});

		jQuery('#enviar-orcamento').click(function(){
			nome_cliente = jQuery('#nome-orcamento').val();
			email_cliente = jQuery('#email-orcamento').val();
			tel_cliente = jQuery('#tel-orcamento').val();

			envia_orcamento = true;
			if(nome_cliente == ''){
				jQuery('#nome-orcamento').parent().addClass('erro');
				envia_orcamento = false;
			}

			if(email_cliente == ''){
				jQuery('#email-orcamento').parent().addClass('erro');
				envia_orcamento = false;
			}

			if(tel_cliente == ''){
				jQuery('#tel-orcamento').parent().addClass('erro');
				envia_orcamento = false;
			}

			para = '<?php the_field('email', 'option'); ?>';
			nome_site = '<?php the_field('titulo', 'option'); ?>';
			//produtos = JSON.stringify(produtos);

			///console.log(produtos);
			//console.log(JSON.stringify(produtos));

			//url = '<?php echo get_home_url(); ?>/?produtos=' + produtos;
			//window.location.replace(url);

			if(envia_orcamento){
				jQuery.getJSON("<?php echo get_template_directory_uri(); ?>/orcamento.php", { nome_cliente:nome_cliente, email_cliente:email_cliente, tel_cliente:tel_cliente, para:para, nome_site:nome_site }, function(result){		
					if(result=='ok'){
						jQuery('#modal-orcamento .msg').html('Orçamento enviado com sucesso! <strong>Aguarde, logo entraremos em contato.</strong>');

						jQuery('#add-linha-orcamento tr').each(function(){
							if(!(jQuery(this).hasClass('fixo'))){
								jQuery(this).remove();
							}
						});

								jQuery('#qtd_cart_orcamento').html('');
								jQuery('#qtd_orcamento').html('0');
								jQuery('#qtd-0').show();
								jQuery('#enviar-orcamento').addClass('off');
								jQuery('.dados-cliente').hide();

					}else{
						jQuery('#modal-orcamento .msg').html('Desculpe, não foi possível enviar o seu orçamento. Por favor, tente mais tarde.');
					}
				});
			}

		});

	</script>

	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/maskedinput.js"></script>
	<script type="text/javascript">
		jQuery(function(jQuery){
		   jQuery(".mask-telefone").mask("(99) 9999-9999?9");
		});
	</script>

</body>
</html>