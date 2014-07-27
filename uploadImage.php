<!doctype html>
<html class="no-js" lang="en">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Portobuild</title>
        <link rel="stylesheet" href="css/app.css" />
        <link href="http://netdna.bootstrapcdn.com/font-awesome/3.0.2/css/font-awesome.css" rel="stylesheet">
        <script src="bower_components/modernizr/modernizr.js"></script>
    </head>

    <body id="imageUploaderContainer">
        <form id="upload" method="post" action="upload.php" enctype="multipart/form-data">
            <div id="drop">
                Drop Here
                <a>Browse</a>
                <input type="file" name="upl" multiple />
            </div>
            <ul>
                <!-- The file uploads will be shown here -->
            </ul>
        </form>
        
        <script>
            function submitform() { document.themeSelectionForm.submit(); }
        </script>
       
        <script src="bower_components/jquery/dist/jquery.min.js"></script>
        <script src="bower_components/foundation/js/foundation.min.js"></script>
        <script src="js/app.js"></script>
        
        <!-- JavaScript Includes -->
        <script src="js/uploadScripts/jquery.knob.js"></script>

        <!-- jQuery File Upload Dependencies -->
        <script src="js/uploadScripts/jquery.ui.widget.js"></script>
        <script src="js/uploadScripts/jquery.iframe-transport.js"></script>
        <script src="js/uploadScripts/jquery.fileupload.js"></script>

        <!-- Our main JS file -->
        <script src="js/uploadScripts/script.js"></script>
        
        <script>

        </script>
    </body>

</html>
