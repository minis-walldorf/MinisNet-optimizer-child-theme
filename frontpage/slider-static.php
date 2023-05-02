<?php global $optimizer; ?>

<div id="stat_img" class="<?php if(!empty($optimizer['static_image_id']['url'])){ ?> stat_has_img<?php } ?><?php if(!empty($optimizer['static_gallery'])){ ?> stat_has_slideshow<?php } ?>">
    

	<?php $statimg = $optimizer['static_image_id']; ?>
    <?php
        echo do_shortcode('[smartslider3 slider="2"]');
    ?>


</div>