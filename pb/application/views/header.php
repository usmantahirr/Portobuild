<head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Portobuild</title>
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/app.css" />
        <script src="<?php echo base_url(); ?>bower_components/modernizr/modernizr.js"></script>
        <script src="<?php echo base_url(); ?>bower_components/jquery/dist/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>bower_components/foundation/js/foundation.min.js"></script>
        <script src="<?php echo base_url(); ?>js/app.js"></script>
        

</head>
<body>

<nav class="top-bar" data-topbar>
    <ul class="title-area">
        <li class="name">
            <h1><a href="index.php">Portobuild</a></h1>
        </li>
        <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
        <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
    </ul>
    <section class="top-bar-section">
        <!-- Right Nav Section -->
        <ul class="right">
            <li <?php if ($this->uri->segment(2) == "trends") echo ' class="active"'; ?>><a href="<?php echo site_url('trends'); ?>">Trends</a></li>
            <li <?php if ($this->uri->segment(2) == "signup") echo ' class="active"'; ?>><a href="<?php echo site_url('auth/signup'); ?>">Signup</a></li>
            <li <?php if ($this->uri->segment(2) == "login") echo ' class="active"'; ?>><a href="<?php echo site_url('auth/login'); ?>">Login</a></li>
        </ul>
    </section> 
</nav>