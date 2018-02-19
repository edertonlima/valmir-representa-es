
<?php if(is_single()){ ?>
	<h3><?php the_title(); ?></h3>
<?php }else{ ?>
	<h3><?php the_field('subtitulo'); ?></h3>
<?php } ?>

<div class="content-txt">
	<?php if((!is_page('trabalhe-conosco')) and (!is_page('cartao-bndes'))){
		$imagem = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium' );
			if($imagem[0]){ ?>
				<img src="<?php echo $imagem[0]; ?>" class="img-page col-5">
			<?php }
	} ?>

	<?php the_content(); ?>
</div>