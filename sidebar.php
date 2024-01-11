<?php

 if ( is_active_sidebar( 'right-column' ) ) : ?>
    <div id="right-sidebar" class="widget-area span3">
        <?php dynamic_sidebar( 'right-column' ); ?>
    </div>
<?php endif; ?>
