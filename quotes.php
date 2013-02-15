<div id="quotes" class="vollkorn big hide-on-phones">
	<?php 
	query_posts('post_type=quote&posts_per_page=1&orderby=rand');
	while (have_posts()) : the_post(); ?>
	
		<?php the_content(); ?>
</div>
<div class="quotes-arrow hide-on-phones"></div>  
	
<p class="attribute turquoise vollkorn hide-on-phones"><?php the_title(); ?></p>
	
<?php endwhile;
wp_reset_query(); ?>