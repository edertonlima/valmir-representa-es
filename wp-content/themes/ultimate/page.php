<?php get_header(); ?>

	<section class="box-content empresa">
		<div class="container">

			<div class="row">
				<div class="col-12">
					<h2>
						<?php if(($post->post_name == 'area-de-atuacao') or($post->post_name == 'qualidade')){ 
							the_title();						
						}else{ ?>
							<a href="<?php echo get_home_url(); ?>/empresa" title="EMPRESA">
								EMPRESA
							</a>
							<span>
								<i class="fa fa-angle-right" aria-hidden="true"></i>
								<?php the_title(); ?>
							</span>
						<?php } ?>
					</h2>
				</div>

				<div class="col-8">

					<?php
						while ( have_posts() ) : the_post(); 
							
							get_template_part( 'content', 'post' );

						endwhile;
						wp_reset_query();
					?>

					<?php if(is_page('empresa')){ ?>
						<div class="content-txt">
							<div class="col-4">
								<h4>Missão</h4>
								<p><?php the_field('missao'); ?></p>
							</div>

							<div class="col-4">
								<h4>Visão</h4>
								<p><?php the_field('visao'); ?></p>
							</div>

							<div class="col-4">
								<h4>Valores</h4>
								<p><?php the_field('valores'); ?></p>
							</div>
						</div>
					<?php }

					if(is_page('nossa-equipe')){
						if( have_rows('nossa_equipe') ): ?>
							<div class="content-txt nossa-equipe">
							<?php while ( have_rows('nossa_equipe') ) : the_row(); ?>
								<li class="col-4">
									<img src="<?php the_sub_field('imagem'); ?>" alt="<?php the_sub_field('nome'); ?>">
									<h4><?php the_sub_field('nome'); ?></h4>
								</li>
							<?php endwhile; ?>
							</div>
						<?php endif;
					} ?>

					<?php if(is_page('imprensa')){
						if( have_rows('imprensa') ): ?>
							<ul class="content-txt nossa-equipe download">
							<?php while ( have_rows('imprensa') ) : the_row(); ?>
								<li class="col-12">
									<?php /*if(get_sub_field('imagem')){ ?>
										<img src="<?php the_sub_field('imagem'); ?>" alt="<?php the_sub_field('nome'); ?>" class="col-4">
									<?php } */ ?>
									<!--<div class="col-8">-->
										<h4><?php the_sub_field('nome'); ?></h4>
										<?php if(get_sub_field('descricao')){ ?>
											<p><?php the_sub_field('descricao'); ?></p>
										<?php } ?>
										<a href="<?php the_sub_field('arquivo'); ?>" title="Download" class="mais-item" target="_blank">
											<i class="fa fa-caret-right" aria-hidden="true"></i> Download
										</a>
									<!--</div>-->
								</li>
							<?php endwhile; ?>
							</ul>
						<?php endif;
					} ?>

					<?php /*if(is_page('area-de-atuacao')){ ?>

						<ul id="map">

							<li class="rs" estado="rs"><a class="" id="rs" title="RS"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/null.gif" alt="RS" /></a></li>
							<li class="sc" estado="sc"><a class="" id="sc" title="SC"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/null.gif" alt="SC" /></a></li>
							<li class="pr" estado="pr"><a class="" id="pr" title="PR"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/null.gif" alt="PR" /></a></li>
							<li class="sp" estado="sp"><a class="" id="sp" title="SP"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/null.gif" alt="SP" /></a></li>
							<li class="ms" estado="ms"><a class="" id="ms" title="MS"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/null.gif" alt="MS" /></a></li>
							<li class="rj" estado="rj"><a class="" id="rj" title="RJ"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/null.gif" alt="RJ" /></a></li>
							<li class="es" estado="es"><a class="" id="es" title="ES"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/null.gif" alt="ES" /></a></li>
							<li class="mg" estado="mg"><a id="mg" title="MG"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/null.gif" alt="MG" /></a></li>
							<li class="go" estado="go"><a id="go" title="GO"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/null.gif" alt="GO" /></a></li>
							<li class="df" estado="df"><a id="df" title="DF"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/null.gif" alt="DF" /></a></li>
							<li class="ba" estado="ba"><a id="ba" title="BA"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/null.gif" alt="BA" /></a></li>
							<li class="mt" estado="mt"><a class="" id="mt" title="MT"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/null.gif" alt="MT" /></a></li>
							<li class="ro" estado="ro"><a id="ro" title="RO"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/null.gif" alt="RO" /></a></li>
							<li class="ac" estado="ac"><a id="ac" title="AC"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/null.gif" alt="AC" /></a></li>
							<li class="am" estado="am"><a id="am" title="AM"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/null.gif" alt="AM" /></a></li>
							<li class="rr" estado="rr"><a id="rr" title="RR"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/null.gif" alt="RR" /></a></li>
							<li class="pa" estado="pa"><a id="pa" title="PA"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/null.gif" alt="PA" /></a></li>
							<li class="ap" estado="ap"><a id="ap" title="AP"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/null.gif" alt="AP" /></a></li>
							<li class="ma" estado="ma"><a id="ma" title="MA"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/null.gif" alt="MA" /></a></li>
							<li class="to" estado="to"><a id="to" title="TO"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/null.gif" alt="TO" /></a></li>
							<li class="se" estado="se"><a id="se" title="SE"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/null.gif" alt="SE" /></a></li>
							<li class="al" estado="al"><a id="al" title="AL"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/null.gif" alt="AL" /></a></li>
							<li class="pe" estado="pe"><a id="pe" title="PE"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/null.gif" alt="PE" /></a></li>
							<li class="pb" estado="pb"><a id="pb" title="PB"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/null.gif" alt="PB" /></a></li>
							<li class="rn" estado="rn"><a id="rn" title="RN"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/null.gif" alt="RN" /></a></li>
							<li class="ce" estado="ce"><a id="ce" title="CE"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/null.gif" alt="CE" /></a></li>
							<li class="pi" estado="pi"><a id="pi" title="PI"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/null.gif" alt="PI" /></a></li>
						</ul>

					<?php } */?>
					
				</div>

				<div class="col-4 sidebar">

					<?php include 'sidebar-empresa.php'; ?>
					<?php include 'sidebar-noticias.php'; ?>

				</div>
			</div>

		</div>
	</section>

<?php get_footer(); ?>

<script type="text/javascript">
	<?php if($post->post_name == 'area-de-atuacao'){ ?>

		jQuery(document).ready(function(){
			jQuery('.nav ul li.menu-area-de-atuacao').addClass('active');
		});
	
	<?php }else{

		if($post->post_name == 'qualidade'){ ?>

			jQuery(document).ready(function(){
				jQuery('.nav ul li.menu-qualidade').addClass('active');
			});
		
		<?php }else{ ?>

			jQuery(document).ready(function(){
				jQuery('.nav ul li.menu-empresa').addClass('active');
			});

		<?php } 
	} ?>
</script>