<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width" />
	<title><?php wp_title(''); ?></title>
	<meta http-equiv="content-type" content="<?php bloginfo('html_type') ?>; charset=<?php bloginfo('charset') ?>" />
	
    <link rel="icon" type="image/png" href="<?php echo bloginfo('template_url'); ?>/images/favicon.ico" />
    
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url') ?>" />
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url') ?>/css/reset.css" />
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url') ?>/css/type.css" />
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url') ?>/css/lombard.css" />

	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
    <!--[if gte IE 9]>
      <style type="text/css">
        .gradient {
           filter: none;
        }
      </style>
	<![endif]-->
    
	<?php wp_head(); ?>    
    
</head>

<body <?php body_class(); ?>>

    <header class="vollkorn">
    	<?php wp_nav_menu(); ?>
    </header>          
    
    <div id="main" role="main" class="clearfix">

        <a href="<?php echo home_url(); ?>" rel="home">
        	<img id="logo" src="<?php echo bloginfo('template_url'); ?>/images/logo.png" alt="Lisa Lombard, Ph.D." />
        </a>
        
        <hgroup id="site-title" class="maroon">
			<?php if (is_home() ) { ?>
                <h1>Lisa Lombard, Ph.D.</h1>
                <h2>Licensed Clinical Psychologist</h2>
            <?php } else { ?>
                <h3>Lisa Lombard, Ph.D.</h3>
                <h4>Licensed Clinical Psychologist</h4>
            <?php } ?>
        </hgroup>
        
        <div class="mobile-menu vollkorn">
			<?php wp_nav_menu(); ?>
        </div>
        
      	<?php get_template_part('callout'); ?>   