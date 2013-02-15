<?php 
	$callout1 = get_field('callout_1'); 
	$callout2 = get_field('callout_2');
	$callout3 = get_field('callout_3');

if ( $callout1 || $callout2 || $callout3 ) { ?>

<section id="callout" class="vollkorn turquoise hide-on-phones">
	<?php if ( ($callout1 && !$callout2 && !$callout3) ||
			   (!$callout1 && $callout2 && !$callout3) ||
			   (!$callout1 && !$callout2 && $callout3) ) 	{ 
		  	  echo '<p>'.$callout1.$callout2.$callout3.'</p>';
		  } else { ?>
    <ul id="rotator">
    	<?php if ($callout1) { echo '<li>'.$callout1.'</li>'; } ?>
        <?php if ($callout2) { echo '<li>'.$callout2.'</li>'; } ?>
        <?php if ($callout3) { echo '<li>'.$callout3.'</li>'; } ?>
    </ul>
    
    <ul id="circles">
    	<?php if ($callout1) { echo '<li class="circ active"></li>'; } ?>
        <?php if ($callout2) { echo '<li class="circ"></li>'; } ?>
        <?php if ($callout3) { echo '<li class="circ"></li>'; } ?>
    	<?php } ?>
    </ul>    

</section>

<?php } ?>