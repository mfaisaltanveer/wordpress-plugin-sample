<?php
/**
 * Plugin Name: PopUps for crud operations
 * Description: Displays a popup message on post create, update, and delete.
 * Version: 1.0
 * Author: Faisal
 */

if (!defined('ABSPATH')) {
    exit;
}

function enqueue_scripts_for_crud($hook)
{
    if ($hook === 'post.php' || $hook === 'post-new.php') {
        wp_enqueue_script('poc-popup', plugin_dir_url(__FILE__) . 'popup.js', array('jquery'), '1.0', true);
    }
}
add_action('admin_enqueue_scripts', 'enqueue_scripts_for_crud');


function handle_popup_script()
{
    ?>
        <script type="text/javascript">
            jQuery(document).ready(function($) {
                var message = '';

                if ($('#publish').length) {
                    $('#publish').on('click', function() {
                        message = 'Post created or updated!';
                    });
                }

                if ($('#delete-action a').length) {
                    $('#delete-action a').on('click', function() {
                        message = 'Post deleted!';
                    });
                }

                $(window).on('beforeunload', function() {
                    if (message !== '') {
                        alert(message);
                    }
                });
            });
        </script>
        <?php
}
add_action('admin_footer', 'handle_popup_script');