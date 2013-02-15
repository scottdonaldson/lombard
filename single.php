<?php 
get_header();
the_post(); ?>

<div class="entry-content">

    <article <?php post_class(); ?>>
        <h1 class="entry-title"><?php the_title(); ?></h1>
        <?php the_content(); ?>
    </article> 

</div>

<?php
get_template_part('quotes');
get_footer(); ?>