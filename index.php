<?php get_header(); ?>

<div class="entry-content">
<?php while ( have_posts()) : the_post(); ?>

    <article <?php post_class('excerpt'); ?>>
        <h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
        <?php the_excerpt(); ?>
        <p><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" rel="bookmark">read more...</a></p>
    </article>

	<?php endwhile; ?>

    <div class="navigation clearfix">
        <span class="older vollkorn">
            &nbsp;<?php next_posts_link('&#xab; Older'); ?>
        </span>
        <span class="newer vollkorn">    
            <?php previous_posts_link('Newer &#187;'); ?>&nbsp;
        </span>
    </div>    

</div>

<?php
get_template_part('quotes');
get_footer(); ?>