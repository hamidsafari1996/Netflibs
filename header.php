<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <?php wp_head(); ?>
    
    <script><?php $script_text_head = woolearn_get_option('script-text'); echo $script_text_head; ?></script>
    <?php get_template_part('template/style','color') ?>
</head>
<body>