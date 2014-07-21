<?php 
/*
Template Name: Forms Page
*/
get_header();
the_post(); ?>

<?php if ($post->post_parent)
        	{ $children = wp_list_pages('title_li=&child_of='.$post->post_parent.'&echo=0'); 
			  $parent_link = get_permalink($post->post_parent); 
			  $parent = get_the_title($post->post_parent); }
    	else
    		{ $children = wp_list_pages('title_li=&child_of='.$post->ID.'&echo=0'); 
			  $parent_link = get_permalink($post->ID); 
			  $parent = get_the_title($post->ID); }
    	if ($children) { 
		?>

<section>
    <ul id="left-nav" class="vollkorn">
     	<?php echo $children; ?>
  	</ul>
</section>        

<section id="right">
<?php } ?>

<h1 class="visuallyhidden"><?php the_title(); ?></h1>
<article class="entry-content clearfix">
	<?php the_content(); ?>

    <?php
    $forms = get_field('forms');
    foreach ($forms as $form) { ?>
        
        <div class="form-holder clearfix">
            <span class="vollkorn"><?= $form['name']; ?></span>
            <a class="button gradient" href="<?= $form['file']; ?>">Download PDF</a>
        </div>

    <?php } ?> 
    
</article>

<?php
if ($children) { ?>

</section>

<?php }
get_template_part('quotes'); 
get_footer(); ?>