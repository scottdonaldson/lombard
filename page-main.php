<?php 
/*
Template Name: Main Page
*/
get_header();
the_post(); ?>

<div class="entry-content clearfix vollkorn big">
	<img src="<?php echo bloginfo('template_url'); ?>/images/lombard_web.jpg" class="alignleft" />
	<?php the_content(); ?>
</div>

<div class="roundborder"></div>

<h2 class="turquoise">Therapy Services</h2>

<div class="half column clearfix">
    <div class="services-holder">
        <a href="<?php echo home_url(); ?>/services/psychotherapy-adults">
        	<img src="<?php echo bloginfo('template_url'); ?>/images/adults.png" height="90" width="90" class="alignleft" />
        </a>
        <a class="desc" href="<?php echo home_url(); ?>/services/psychotherapy-adults">Psychology with Adults</a>
    </div>    

    <div class="services-holder">    
        <a href="<?php echo home_url(); ?>/services/therapy-children-adolescents">
        	<img src="<?php echo bloginfo('template_url'); ?>/images/children.png" height="90" width="90" class="alignleft" />
        </a>    
        <a class="desc" href="<?php echo home_url(); ?>/services/therapy-children-adolescents">Therapy with Children &amp; Adolescents</a>
    </div>   
    
    <div class="services-holder">    
        <a href="<?php echo home_url(); ?>/services/performance-management">
        	<img src="<?php echo bloginfo('template_url'); ?>/images/performance.png" height="90" width="90" class="alignleft" />
        </a>
        <a class="desc" href="<?php echo home_url(); ?>/services/performance-management">Performance<br />Management</a>
    </div>         
</div>

<div class="half column clearfix">
    <div class="services-holder">    
        <a href="<?php echo home_url(); ?>/services/hypnotherapy">
        	<img src="<?php echo bloginfo('template_url'); ?>/images/hypnotherapy.png" height="90" width="90" class="alignleft" />
        </a>
        <a class="desc" href="<?php echo home_url(); ?>/services/hypnotherapy">Hypnotherapy</a>
        </a>
    </div>    
    
    
    <div class="services-holder">    
        <a href="<?php echo home_url(); ?>/services/psychological-evaluations">
        	<img src="<?php echo bloginfo('template_url'); ?>/images/evaluations.png" height="90" width="90" class="alignleft" />
        </a>
        <a class="desc" href="<?php echo home_url(); ?>/services/psychological-evaluations">Psychological Evaluations</a>
    </div>    
    
    <div class="services-holder">    
        <a href="<?php echo home_url(); ?>/services/infertility-parenthood">
        	<img src="<?php echo bloginfo('template_url'); ?>/images/infertility.png" height="90" width="90" class="alignleft" />
        </a>
        <a class="desc" href="<?php echo home_url(); ?>/services/infertility-parenthood">Infertility &amp; Parenthood</a>
    </div>
</div>

<?php 
get_template_part('quotes'); 
get_footer(); ?>