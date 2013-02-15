<?php 
/*
Template Name: Contact Page (with contact form)
*/
if(isset($_POST['submitted'])) {
	if(trim($_POST['contactName']) === '') {
		$nameError = 'Please enter your name.';
		$hasError = true;
	} else {
		$name = trim($_POST['contactName']);
	}

	if(trim($_POST['email']) === '')  {
		$emailError = 'Please enter your email address.';
		$hasError = true;
	} else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($_POST['email']))) {
		$emailError = 'You entered an invalid email address.';
		$hasError = true;
	} else {
		$email = trim($_POST['email']);
	}
	
	if(trim($_POST['phone']) === '')  {
		$phoneError = 'Please enter your phone number.';
		$hasError = true;
	} else {
		$phone = trim($_POST['phone']);
	}

	if(trim($_POST['comments']) === '') {
		$commentError = 'Please enter a message.';
		$hasError = true;
	} else {
		if(function_exists('stripslashes')) {
			$comments = stripslashes(trim($_POST['comments']));
		} else {
			$comments = trim($_POST['comments']);
		}
	}

	if(!isset($hasError)) {
		$emailTo = get_option('tz_email');
		if (!isset($emailTo) || ($emailTo == '') ){
			$emailTo = get_option('admin_email');
		}
		$subject = 'Website contact submission from '.$name;
		$body = "Name: $name \n\nEmail: $email \n\nPhone: $phone \n\nComments: $comments";
		$headers = 'From: '.$name.' <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;

		mail($emailTo, $subject, $body, $headers);
		$emailSent = true;
	}
}
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
    
        <?php if(isset($emailSent) && $emailSent == true) { ?>
            <strong>Thanks, your email was sent successfully.</strong>
        <?php } else { 
					if(isset($hasError) || isset($captchaError)) { ?>
        		  
              		<strong class="big error">Sorry, an error occurred.</strong>
                    
              <?php }
			  the_content(); ?>
              
			  
        
        <form action="<?php the_permalink(); ?>" id="contact-form" method="post">
    
            <label for="contactName">Name</label>
            <input type="text" name="contactName" id="contactName" value="<?php if(isset($_POST['contactName'])) echo $_POST['contactName'];?>" class="required requiredField" />
                <?php if($nameError != '') { ?>
                    <p class="error"><?=$nameError;?></p>
                <?php } ?>
            
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="<?php if(isset($_POST['email'])) echo $_POST['email'];?>" class="required requiredField email" />
                <?php if($emailError != '') { ?>
                    <p class="error"><?=$emailError;?></p>
                <?php } ?>
            
            <label for="phone">Phone</label>
            <input type="tel" name="phone" id="phone" value="<?php if(isset($_POST['phone'])) echo $_POST['phone'];?>" class="required requiredField phone" />
                <?php if($phoneError != '') { ?>
                    <p class="error"><?=$phoneError;?></p>
                <?php } ?>
        
            <label for="commentsText">Message:</label>
            <textarea name="comments" id="commentsText" class="required requiredField"><?php if(isset($_POST['comments'])) { if(function_exists('stripslashes')) { echo stripslashes($_POST['comments']); } else { echo $_POST['comments']; } } ?></textarea>
                <?php if($commentError != '') { ?>
                    <p class="error"><?=$commentError;?></p>
            <?php } ?>
            
            <input type="submit" value="submit"></input>
            <input type="hidden" name="submitted" id="submitted" value="true" />
        </form>
    <?php } ?>
    
	<img id="map-static" src="<?php echo bloginfo('template_url'); ?>/images/map_markers.png" />
    
    <img id="map-interactive" class="hide-on-phones" src="<?php echo bloginfo('template_url'); ?>/images/map.png" width="450" height="391" />
    <div id="book" class="map-icon goright">
	    <img src="<?php echo bloginfo('template_url'); ?>/images/book.png" />
        <aside>
        	<span class="map-desc">Oak Park Public Library</span>
        </aside>
        <div class="photo">
	        <img src="<?php echo bloginfo('template_url'); ?>/images/library.jpg" width="160" height="auto"/>        
    	</div>
    </div>
    <div id="globe" class="map-icon goright">
    	<img src="<?php echo bloginfo('template_url'); ?>/images/school.png" />
        <aside>
        	<span class="map-desc">Oak Park &amp; River Forest High School</span>
        </aside>
        <div class="photo">
	        <img src="<?php echo bloginfo('template_url'); ?>/images/highschool.jpg" />        
    	</div>
    </div>
    <div id="phd" class="map-icon goleft">
    	<img src="<?php echo bloginfo('template_url'); ?>/images/phd.png" />
        <aside>
        	<span class="map-desc">Lisa Lombard, Clinical Psychologist</span>
        </aside>
        <div class="photo">
	        <img src="<?php echo bloginfo('template_url'); ?>/images/lombard.jpg" />        
    	</div>
    </div>
    <div id="tree" class="map-icon goleft">
    	<img src="<?php echo bloginfo('template_url'); ?>/images/tree.png" />
                <aside>
        	<span class="map-desc">Ridgeland Common Park</span>
        </aside>
        <div class="photo">
	        <img src="<?php echo bloginfo('template_url'); ?>/images/park.jpg" />        
    	</div>
    </div>
    
    
    <a class="button" target="_blank" href="http://maps.google.com/maps?oe=utf-8&rls=org.mozilla:en-US:official&client=firefox-a&q=332+n+scoville+ave+oak+park+il&um=1&ie=UTF-8&hq=&hnear=0x880e34b18d9426bf:0xbac368365f27befd,332+N+Scoville+Ave,+Oak+Park,+IL+60302&gl=us&daddr=332%20N%20Scoville%20Ave,%20Oak%20Park,%20IL%2060302&ei=muB4T4LfMpDAtge-6InaDg&sa=X&oi=geocode_result&ct=directions-to&resnum=1&ved=0CCYQwwUwAA" style="width:195px;">Get Google Directions</a>
    	    
    </article>

</section>

<?php get_template_part('quotes'); 
get_footer(); ?>