<?php get_header(); ?>

<section class="box-content noticias">
	<div class="container">

			<div class="row">
				<div class="col-12">
					<h2>
						<a href="<?php echo get_home_url(); ?>/empresa" title="EMPRESA">
							NOTÍCIAS
						</a>
						<span>
							<i class="fa fa-angle-right" aria-hidden="true"></i>
							<?php echo the_title(); ?>
						</span>
					</h2>
				</div>

				<div class="col-8">

					<?php
						while ( have_posts() ) : the_post(); 
							
							get_template_part( 'content', 'post' );

						endwhile;
						wp_reset_query();
					?>

					<?php if(is_page(124)){ ?>
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
					<?php } ?>

					<?php
						$produto = get_previous_post();
						if($produto){ $terms = get_the_category($produto->ID); ?>
	
							<a href="<?php the_permalink($produto->ID); ?>" title="<?php echo $produto->post_title; ?>" class="col-6 prev-post mais-item">
								<i class="fa fa-caret-right" aria-hidden="true"></i> <?php echo $produto->post_title; ?>
								<i class="fa fa-long-arrow-left" aria-hidden="true"></i>
							</a>

						<?php }
					?>

					<?php
						$produto = get_next_post();
						if($produto){ $terms = get_the_category($produto->ID); ?>

							<a href="<?php the_permalink($produto->ID); ?>" title="<?php echo $produto->post_title; ?>" class="col-6 next-post mais-item">
								<i class="fa fa-caret-right" aria-hidden="true"></i> <?php echo $produto->post_title; ?>
								<i class="fa fa-long-arrow-right" aria-hidden="true"></i>
							</a>

						<?php }
					?>
					
				</div>

				<div class="col-4 sidebar">

					<?php include 'sidebar-noticias.php'; ?>
					<?php include 'sidebar-projeto-ecoeter.php'; ?>
					<?php include 'sidebar-responsabilidade-social.php'; ?>

				</div>
			</div>

		</div>

	</div>
</section>

<?php get_footer(); ?>

<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('.nav ul li.menu-noticias').addClass('active');
	});
</script>