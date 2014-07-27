<!doctype html>
<html class="no-js" lang="en">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Portobuild</title>
        <link rel="stylesheet" href="css/app.css" />
        <link rel="stylesheet" href="css/foundation-datepicker.css" />
        <link href="http://netdna.bootstrapcdn.com/font-awesome/3.0.2/css/font-awesome.css" rel="stylesheet">
        <script src="bower_components/modernizr/modernizr.js"></script>
    </head>

    <body id="imageUploaderContainer">
    
        <form action="/file-upload" class="dropzone" id="my-awesome-dropzone">
            <div class="fallback">
                <input name="file" type="file" multiple />
            </div>
        </form>
        
       <section class="uploadContainer">
           <div class="uploadButtonContainer">
               
           </div>
           <div class="uploadedImageContainer">
               
           </div>
       </section>
       
        <script>
            function submitform() { document.themeSelectionForm.submit(); }
        </script>
        <script src="js/dropzone.js"></script>
        <script src="bower_components/jquery/dist/jquery.min.js"></script>
        <script src="bower_components/foundation/js/foundation.min.js"></script>
        <script src="js/app.js"></script>
    </body>

</html>
