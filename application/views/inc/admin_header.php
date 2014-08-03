<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title><?php echo $this->config->item('site_title'); ?></title>
        <link rel="stylesheet" href="<?php echo base_url(); ?>_lib/bootstrap/css/bootstrap.css" />
        <?php if (isset($css)): ?>
            <?php foreach ($css as $stylesheet): ?>
                <link rel="stylesheet" href="<?php echo base_url(); ?>css/<?php echo $stylesheet; ?>">
            <?php endforeach; ?>
        <?php endif; ?>
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/admin-style.css">
        <link rel="shortcut icon" href="<?php echo base_url(); ?>images/favicon.ico">

        <?php if (isset($js)): ?>
            <?php foreach ($js as $script): ?>
                <script type="text/javascript" src="<?php echo base_url(); ?>js/<?php echo $script; ?>"></script>
            <?php endforeach; ?>
        <?php endif; ?>
    </head>