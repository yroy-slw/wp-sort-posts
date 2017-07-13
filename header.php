<!DOCTYPE html>
<html lang="fr">
<head>
<title><?php wp_title(''); ?></title>
<meta content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>"/>
<meta content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0" name="viewport">
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />

<?php wp_enqueue_script('jquery'); ?>
<?php wp_enqueue_script('jquery-ui-sortable'); ?>
<?php wp_head(); ?>

<script>
jQuery(document).ready(function($) {

	var itemList = $('#sortable');

    itemList.sortable({
        update: function(event, ui) {
            $('#loading-animation').show(); // Show the animate loading gif while waiting

            opts = {
                url: ajaxurl, // ajaxurl is defined by WordPress and points to /wp-admin/admin-ajax.php
                type: 'POST',
                async: true,
                cache: false,
                dataType: 'json',
                data:{
                    action: 'item_sort', // Tell WordPress how to handle this ajax request
                    order: itemList.sortable('toArray').toString() // Passes ID's of list items in  1,3,2 format
                },
                success: function(response) {
                    $('#loading-animation').hide(); // Hide the loading animation
                    return; 
                },
                error: function(xhr,textStatus,e) {  // This can be expanded to provide more information
                    alert(e);
                    // alert('There was an error saving the updates');
                    $('#loading-animation').hide(); // Hide the loading animation
                    return; 
                }
            };
            $.ajax(opts);
        }
    }); 

});
</script>
</head>
<body>
					