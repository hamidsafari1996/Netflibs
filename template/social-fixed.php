<div class="social-inside-net position-fixed">
      <?php $coagex_social = woolearn_get_option("coagex_social_group"); if(  is_array($coagex_social) ) { ?>
      <ul class="text-center">
            <?php foreach( $coagex_social as $i => $social_item) { ?>
            <li><a href="<?php echo @$social_item['link']; ?>"><i class="fab <?php echo @$social_item['title']; ?>"></i></a></li>
            <?php } ?>
      </ul>
      <?php } ?>
</div>