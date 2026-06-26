<?php
   $scroll_to_top = renuma_get_opt('scroll_to_top', true);
   $cursor_helper = renuma_get_opt('cursor_helper', true);
?>

</div>
<!-- end content section -->

<?php 
    renuma_footer_layout_home6();
?>

</div>
<!-- end main-wrapper section -->

<?php if (isset($scroll_to_top) && $scroll_to_top) : ?>
    <div class="scroll-top-percentage"><span id="scroll-value"></span></div>
<?php endif; ?>

<?php wp_footer(); ?>

<?php if (isset($cursor_helper) && $cursor_helper) : ?>
    <!-- cursor helper -->
    <div class="cursor-helper">
        <div class="cursor-helper-outer"></div>
        <div class="cursor-helper-inner"></div>
    </div>
<?php endif; ?>
    
</body>
</html>
