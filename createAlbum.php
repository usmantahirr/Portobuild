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

    <body id="createAlbumContainer">
        <section class="createAlbumSection">
            <form action="uploadImage.php" id="albumSubmitForm">
                <div id="formArea">
                    <h1>Add Album</h1>
                    <div id="nameContainer">
                        <label>Album Name
                            <input type="text" placeholder="Name" />
                        </label>
                    </div>
                    <div id="submitButton">
                        <a href="javascript: submitform()" class="button">Create Album</a>
                    </div>
                </div>
            </form>
        </section>
        
        <script>
            function submitform() { document.albumSubmitForm.submit(); }
        </script>
        <script src="bower_components/jquery/dist/jquery.min.js"></script>
        <script src="bower_components/foundation/js/foundation.min.js"></script>
        <script src="js/app.js"></script>

    </body>

</html>
