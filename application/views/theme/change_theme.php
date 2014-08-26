<!doctype html>
<html class="no-js" lang="en">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Portobuild</title>
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/app.css" />
        <script src="<?php echo base_url(); ?>bower_components/modernizr/modernizr.js"></script>
    </head>
    
    
    
    <body id="themeSelectionPage">
        <section class="themeSelection">
            <h2 class="themeSelectionTitle">Select Theme</h2>
            <div class="themeContainer">
               
                
                <div class="flip-container theme" ontouchstart="this.classList.toggle('hover');">
                    <div class="flipper">
                        
                        <div class="front" >
                            <img src="<?php echo base_url(); ?>images/themePage/onePage.svg" alt="" class="" id="theme1-f" onclick="check1()">
                        </div>
                        <div class="back" >
                            <img src="<?php echo base_url(); ?>images/themePage/onePage-back.svg" alt="" class="" id="theme1-b" onclick="check1()">
                        </div>
                    </div>
                </div>
                
               
                <div class="flip-container theme" ontouchstart="this.classList.toggle('hover');">
                    <div class="flipper">
                        
                        <div class="front" >
                            <img src="<?php echo base_url(); ?>images/themePage/SideMenu.svg" alt="" class="" id="theme2-f" onclick="check2()">
                        </div>
                        <div class="back" >
                            <img src="<?php echo base_url(); ?>images/themePage/SideMenu-back.svg" alt="" class="" id="theme2-b" onclick="check2()">
                        </div>
                    </div>
                </div>
                
                
                <div class="flip-container theme" ontouchstart="this.classList.toggle('hover');">
                    <div class="flipper">
                        
                        <div class="front" >
                            <img src="<?php echo base_url(); ?>images/themePage/tabular.svg" alt="" class="" id="theme3-f" onclick="check3()">
                        </div>
                        <div class="back" >
                            <img src="<?php echo base_url(); ?>images/themePage/tabular-back.svg" alt="" class="" id="theme3-b" onclick="check3()">
                        </div>
                    </div>
                </div>
            </div>
            <form name="themeSelectionForm" method="post" action="<?php echo site_url('theme/replace_theme'); ?>">
                <div id="checkboxes">
                    <input type="radio" name="theme" value="theme1" id="tc1">
                    <input type="radio" name="theme" value="theme2" id="tc2">
                    <input type="radio" name="theme" value="theme3" id="tc3">
                </div>
                
                <div id="proceedThemeSelection"><a href="javascript: submitform()" class="button secondary">Proceed</a></div>
            </form>
            
        </section>
        
        <script src="<?php echo base_url(); ?>bower_components/jquery/dist/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>bower_components/foundation/js/foundation.min.js"></script>
        <script src="<?php echo base_url(); ?>js/app.js"></script>
        
        <script type="text/javascript">
            function submitform() { document.themeSelectionForm.submit(); }
            // Theme 1 selection
            function check1() {
                $('#tc1').attr('checked',true);
            }
            function check2() {
                $('#tc2').attr('checked',true);
            }
            function check3() {
                $('#tc3').attr('checked',true);
            }
//            $( "#theme1-f" ).on( "click", function() {
//                $('#tc1').attr('checked',true);
//            });
//            $( "#theme1-b" ).on( "click", function() {
//                $('#tc1').attr('checked',true);
//            });
//            // theme 2 selection
//            $( "#theme2-f" ).on( "click", function() {
//                $('#tc2').attr('checked',true);
//            });
//            $( "#theme2-b" ).on( "click", function() {
//                $('#tc2').attr('checked',true);
//            });
//            // theme3 selection
//            $( "#theme3-f" ).on( "click", function() {
//                $('#tc3').attr('checked',true);
//            });
//            $( "#theme3-b" ).on( "click", function() {
//                $('#tc3').attr('checked',true);
//            });
        </script>
    </body>
</html>