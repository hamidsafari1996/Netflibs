<?php
$subtitle_options=woolearn_get_option('coagex_404_group');
?>
<div class="not-found" style="background: url('<?php echo $subtitle_options[0]['not']; ?>');">
<div class="container text-center">
<div class="404-found text-center">
    <img src="<?php echo $subtitle_options[0]['foundslid']; ?>" alt="<?php echo $subtitle_options[0]['title']; ?>" class="w-100">
</div>
<a href="<?php echo $subtitle_options[0]['link']; ?>"><button type="button" class="btn btn-danger btn-lg mt-5"><?php echo $subtitle_options[0]['title']; ?></button></a>
</div>

</div>