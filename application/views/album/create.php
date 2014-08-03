<!doctype html>
<html class="no-js" lang="en">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Portobuild</title>
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/app.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/foundation-datepicker.css" />
        <link href="http://netdna.bootstrapcdn.com/font-awesome/3.0.2/css/font-awesome.css" rel="stylesheet">
        <script src="<?php echo base_url(); ?>bower_components/modernizr/modernizr.js"></script>
    </head>

    <body id="createAlbumContainer">
        <section class="createAlbumSection">
		<?php echo form_open('album/add'); ?>
            
                <div id="formArea">
                    <h1>Add Album</h1>
                    <div id="nameContainer">
					<label>Album Name
                        <?PHP echo form_input('album_name');?>
					</label>
                    </div>
                    <div id="submitButton">
                        <?PHP echo form_button(array('id' => 'submit', 'value' => 'Create Album', 'name' => 'submit', 'type' => 'submit', 'content' => 'Add','class' => 'button')); ?>
                    </div>
                </div>
				<?PHP echo form_close(); ?>
            </form>
        </section>
        
        <script>
            function submitform() { document.albumSubmitForm.submit(); }
        </script>
        <script src="<?php echo base_url(); ?>bower_components/jquery/dist/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>bower_components/foundation/js/foundation.min.js"></script>
        <script src="<?php echo base_url(); ?>js/app.js"></script>

    </body>

</html>
