<head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Portobuild</title>
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/app.css" />
        <link type="text/css" rel="stylesheet" media="all" href="<?php echo base_url(); ?>css/chat.css" />
        <link type="text/css" rel="stylesheet" media="all" href="<?php echo base_url(); ?>css/screen.css" />
		<link rel="stylesheet" media="all" href="<?php echo base_url(); ?>css/validationEngine.jquery.css" type="text/css"/>
        <script src="<?php echo base_url(); ?>bower_components/modernizr/modernizr.js"></script>
        <script src="<?php echo base_url(); ?>bower_components/jquery/dist/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>bower_components/foundation/js/foundation.min.js"></script>
        <script src="<?php echo base_url(); ?>js/app.js"></script>
        <script src="<?php echo base_url(); ?>js/bootstrap.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>js/chat.js"></script>
		<script src="<?php echo base_url(); ?>js/languages/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>
		<script src="<?php echo base_url(); ?>js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
		<script src="http://www.position-relative.net/creation/formValidator/js/jquery-1.6.min.js" type="text/
javascript"></script>


        

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