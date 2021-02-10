<?php

/**
 * Class providing helper methods for mail & mail address concerns.
 *
 * @link       bitski.de
 * @since      1.0.0
 *
 * @package    Bitski_Wp_Boilerplate
 * @subpackage Bitski_Wp_Boilerplate/includes/global-helpers
 */

class Bitski_Wp_Boilerplate_Mail_Helper
{

    // Return HTTP redirect header
    public function mail_http_redirect(string $mail, string $subject): string
    {
        // Create the HTTP redirect file
        $file_name = 'mail-http-redirect-' . $subject . '.php';

        if ( ! file_exists($file_name)) {
            $file_handle = fopen(
                plugin_dir_path(__FILE__) . 'mail-http-redirects/' . $file_name,
                'w'
            );
            $content     = '<?php header("Location: mailto:' . $mail . '?subject=' . $subject . '");';
            fwrite($file_handle, $content);
            fclose($file_handle);
        }

        // Return URL directory path for the HTTP redirect file
        return plugin_dir_url(__FILE__) . 'mail-http-redirects/' . $file_name;
    }
}