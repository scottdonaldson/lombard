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
    
    <div class="form-holder clearfix">
		<span class="vollkorn">Patient History Form (Adult)</span>
		<a class="button gradient" href="<?php the_field('patient_history_form_adult'); ?>">Download PDF</a>
    </div>
    
    <div class="form-holder clearfix">
    	<span class="vollkorn">Patient History Form (Child)</span>
        <a class="button gradient" href="<?php the_field('patient_history_form_child'); ?>">Download PDF</a>
    </div>
    
    <div class="form-holder clearfix">
    	<span class="vollkorn">Notice of Privacy Form</span>
        <a class="button gradient" href="<?php the_field('notice_of_privacy_form'); ?>">Download PDF</a>
    </div>
    
    <div class="form-holder clearfix">
    	<span class="vollkorn">Policies &amp; Fees</span>
        <a class="button gradient" href="<?php the_field('policies_fees'); ?>">Download PDF</a>
    </div>	 
    
</article>

<?php
if ($children) { ?>

</section>

<?php }
get_template_part('quotes'); 
get_footer(); ?>