<!--
    Purpose:
        Replace front page content header of Optimizer plugin to include a slider (pro feature of Optimzer)
    Author: Kilian Speder
    Created At: 02.05.2023
    Last Modified: 02.05.2023
-->

<?php global $optimizer; ?>

<div id="stat_img" class="<?php if(!empty($optimizer['static_image_id']['url'])){ ?> stat_has_img<?php } ?><?php if(!empty($optimizer['static_gallery'])){ ?> stat_has_slideshow<?php } ?>">
    <?php
        //import "FrontPage slider" image slider from Smart Slider 3 Plugin
        echo do_shortcode('[smartslider3 slider="2"]');
    ?>
</div>