<?php
/**
 * Globally-accessible helper functions.
 *
 * @link       bitski.de
 * @since      1.0.0
 *
 * @package    Bitski_Wp_Boilerplate
 * @subpackage Bitski_Wp_Boilerplate/includes
 */

/**
 * Global helper function returning HTTP redirect header
 */
function mail_http_redirect(string $mail, string $subject)
{
    /**
     * Stores the mail helper object.
     *
     * @since    1.0.0
     * @access   private
     * @var      object $obj_mail_helper Stores the mail helper object.
     */
    $obj_mail_helper = new Bitski_Wp_Boilerplate_Mail_Helper;

    Bitski_Wp_Boilerplate_Global_Functions::get_mail_http_redirect(
        $mail,
        $subject,
        $obj_mail_helper
    );
}


/**
 * Class providing static getter helper functions.
 **/
class Bitski_Wp_Boilerplate_Global_Functions
{

    // Getter for mail helper returning HTTP redirect header
    public static function get_mail_http_redirect(
        string $mail,
        string $subject,
        object $obj_mail_helper
    ) {
        echo $obj_mail_helper->mail_http_redirect($mail, $subject);
    }
}
